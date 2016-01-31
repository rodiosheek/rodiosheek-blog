<?php


class MainController
{
    public function __construct() {
        require ROOT . '/includes/Classes/ClassAutoLoader.php';
        $loadclass = new ClassAutoLoader();
        spl_autoload_register([$loadclass, 'loadClass']);
    }
    public function controller($action) {

        switch($action) {
            case ('login'):
                $login = new LoginLogout();
                $login->logIn();
                break;
            case ('do-login'):
                $login = new LoginLogout();
                $login->doLogin();
                break;
            case ('logout'):
                $login = new LoginLogout();
                $login->logOut();
                break;
            case ('list'):
                $records = new Records();
                $records->getRecords();
                break;
            case ('view-record'):
                $records = new Records();
                $records->getOneRecord(intval($_GET['id']));
                break;
            case ('add-record'):
                $records = new Records();
                $records->addRecord();
                break;
            case ('delete-record'):
                $records = new Records();
                $records->delRecord(intval($_GET['id']));
                break;
            case ('add-comment'):
                $comment = new Comments();
                $comment->addComment();
                break;
            case ('delete-comment'):
                $comment = new Comments();
                $comment->delComment(intval($_GET['id']));
                break;
            case ('about'):
                require ROOT . '/views/about.php';
                break;
            default:
                die("No action");
        }
    }
}