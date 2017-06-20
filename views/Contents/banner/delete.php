<?php
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        include_once("../../PDO_Connection.php");
        $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
        $sql = "DELETE FROM banners where banner_id = $banner_id";
        $queryData = $conn->prepare($sql);
        $queryData->execute();
        header('Location: ../../admin.php?page=banner/banner');
    }
?>