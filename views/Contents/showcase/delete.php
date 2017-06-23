<?php
if($_SERVER['REQUEST_METHOD'] == "GET"){
    include_once("../../PDO_Connection.php");
    $showcase_id = isset($_GET['showcase_id']) ? $_GET['showcase_id'] : "";
    $sql = "DELETE FROM showcases where showcase_id = $showcase_id";
    $queryData = $conn->prepare($sql);
    $queryData->execute();
    header('Location: ../../admin.php?feature=showcase');
}
?>