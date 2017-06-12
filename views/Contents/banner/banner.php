<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
//        var_dump($_FILES);
//        echo basename($_FILES['image']['name']);
        $uploaddir = "./";
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        
        if($_FILES['image']['error'] < 0)
        {
            echo "Looxi";
        }
        else{
            echo "khong loi";
            move_uploaded_file($_FILES['image']["tmp_name"], $uploadfile);
        }
//        $title = $_POST['title'];
//        echo $title;
    }
?>