<?php

class Records
{
    public function getRecords() {
        $connect = new DB_Connection();
        $mysqli = $connect->getConnect();
        //постраничная навигация
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $limit = 3;
        $result_page = $mysqli->query("SELECT COUNT(*) AS page_count FROM records")->fetch_assoc();
        $pages = $result_page['page_count'];
        $total = intval(($pages - 1) / $limit) + 1;
        $page = intval($page);
        if(empty($page) or $page < 0) $page = 1;
        if($page > $total) $page = $total;
        $offset = $page * $limit - $limit;

        //
        $result = $mysqli->query("SELECT records.*, COUNT(comments.id) AS comments
                                  FROM records
                                  LEFT JOIN comments
                                  ON records.id = comments.record_id
                                  GROUP BY records.id
                                  ORDER BY date DESC
                                  LIMIT $offset, $limit");
        $records  = array();
        while ($row = $result ->fetch_assoc()) {
            if(mb_strlen($row['content']) > 200) {
                $row['content'] = mb_substr(strip_tags($row['content']), 0, 197) . '';
            }
            $row['content'] = nl2br($row['content']);
            $row['date']    = date('Y-m-d H:i:s', $row['date']);
            $records []  = $row;
        }
        include ROOT . '/views/list.php';
    }
    public function getOneRecord($record_id) {
        $connect = new DB_Connection();
        $mysqli = $connect->getConnect();
        $result = $mysqli->query("SELECT * FROM records WHERE id = " . $record_id)->fetch_assoc();
        $result['content'] = nl2br($result['content']);
        $result['date']    = date('Y-m-d H:i:s', $result['date']);

        $comments = array();
        $result_comments = $mysqli->query("SELECT * FROM comments WHERE record_id = " . $record_id
                                           . " ORDER BY date DESC");
        while($row = $result_comments->fetch_assoc()){
            $row['date'] = date('Y-m-d H:i:s', $row['date']);
            $comments [] = $row;
        }
        include ROOT . '/views/record.php';
    }
    public function addRecord() {
        $connect = new DB_Connection();
        $mysqli = $connect->getConnect();

        if (!($stmt = $mysqli->prepare("INSERT INTO records (author, date, header, content)
                                        VALUES (?, ?, ?, ?)"))) {
            echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        $date = time();
        if (!$stmt->bind_param('ssss',
            $_POST['author'],
            $date,
            $_POST['header'],
            $_POST['content']))
        {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        }
        header('Location: .');
    }
    public function delRecord($id) {
        $connect = new DB_Connection();
        $mysqli = $connect->getConnect();
        $mysqli->query("DELETE FROM records WHERE id = " . $id)
        or die("Cannot delete record");
        $mysqli->query("DELETE FROM comments WHERE record_id = " . $id)
        or die("Cannot delete comment");
        header("Location: . ");

    }

}