<?php

require_once dirname(__FILE__, 2).'/vendor/autoload.php';

class COMMON
{
    public static function  FILE_UPLOAD($files)
    {
        $uploads_dir = dirname(__FILE__, 2).'/img/room';
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

        $error = $files['file']['error'];
        $name = $files['file']['name'];
        $time = time();

        $array = explode('.', $name);
        $ext = array_pop($array);

        if ($error != UPLOAD_ERR_OK) {
            switch ($error) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo "파일이 너무 큽니다. ($error)";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "파일이 첨부되지 않았습니다. ($error)";
                    break;
                default:
                    echo "파일이 제대로 업로드되지 않았습니다. ($error)";
            }
            exit;
        }

        if (!in_array($ext, $allowed_ext)) {
            echo "허용되지 않는 확장자입니다.";
            exit;
        }
        move_uploaded_file($files['file']['tmp_name'], "$uploads_dir/$time.$ext");

        return "$time.$ext";
    }
}


?>