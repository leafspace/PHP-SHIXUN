<?php
    function generateStr($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $str;
    }

    error_reporting(E_ALL^E_NOTICE^E_WARNING^E_DEPRECATED);
    header("Content-type: text/html; charset=utf-8");
    $title = $_POST['title'];
    $username = $_POST['username'];
    $innerCode = $_POST['innerCode'];
    $type = $_POST['newsType'];
    $dateTime = date("Y-m-d H:i:s");
    $image = "";
    $fileName = "../upload/".date("YmdHis").generateStr();
    
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: ".$_FILES["file"]["error"]."<br/>";
        } else {
            echo "Upload: ".$_FILES["file"]["name"]."<br/>";
            echo "Type: ".$_FILES["file"]["type"]."<br/>";
            echo "Size: ".($_FILES["file"]["size"] / 1024)."Kb<br/>";
            echo "Temp file: ".$_FILES["file"]["tmp_name"]."<br/>";
            
            if (file_exists("../upload/".$_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. <br/>";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $fileName.$_FILES["file"]["name"]);
                echo "Stored in: ".$fileName.$_FILES["file"]["name"]."<br/>";
                $image = substr($fileName. $_FILES["file"]["name"], 3);
            }
        }
    } else {
        echo "Invalid file";
    }

    if ($username == "") {
        $username = "无差别在线新闻网-游客";
    }

    require_once 'Classes/MysqlConnect.php';
    require_once 'Classes/StringHandle.php';
    $stringHandle = new StringHandle();
    $mysql_Connect = new MysqlConnect();
    $mysqli = $mysql_Connect->connect();
    $sqlStr = "INSERT INTO news(title, time, opened, information, state, image, type, username) 
                    VALUES('".$title."', '".$dateTime."', 0, '".$stringHandle->findDivString($innerCode)."', 0, '".$image."', '".$type."', '".$username."');";
    $result = $mysql_Connect->query($mysqli, $sqlStr);
    $mysql_Connect->freeresourse($mysqli);

    $url = "../index.php";
    Header("Location: $url");
?>