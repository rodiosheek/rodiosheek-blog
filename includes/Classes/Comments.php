<?php


class Comments
{
    public function addComment() {
        $connect = new DB_Connection();
        $mysqli = $connect->getConnect();

        if (!($stmt = $mysqli->prepare("INSERT INTO comments (author, comment, date, record_id)
                                        VALUES (?, ?, ?, ?)"))) {
            echo "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        $date = time();
        if (!$stmt->bind_param('ssis',
            $_POST['author'],
            $_POST['comment'],
            $date,
            $_POST['record_id']))
        {
            echo "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            echo "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error;
        }
        header('Location: ?action=view-record&id=' . $_POST['record_id']);
    }
    public function delComment($id) {
        $connect = new DB_Connection();
        $mysqli = $connect->getConnect();
        $mysqli->query("DELETE FROM comments WHERE id = " . $id)
        or die("Cannot delete comment");
        header('Location: . ');
    }
}