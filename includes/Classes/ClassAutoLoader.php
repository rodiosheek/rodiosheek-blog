<?php


class ClassAutoLoader
{
    public function loadClass($className)
    {
        switch ($className) {
            case ("MainController"):
                $path_to_class = ROOT . '/include/Classes/MainController.php';
                break;
            case ("Records"):
                $path_to_class = ROOT . '/includes/Classes/Records.php';
                break;
            case ("DB_Connection"):
                $path_to_class = ROOT . '/includes/Classes/DB_Connection.php';
                break;
            case ("LoginLogout"):
                $path_to_class = ROOT . '/includes/Classes/LoginLogout.php';
                break;
            case ("Comments"):
                $path_to_class = ROOT . '/includes/Classes/Comments.php';
                break;
            default:
                die("Nor such Class");
        }
        if (is_file($path_to_class)) {
            require_once $path_to_class;
        }
    }
}