<?php
if($_SERVER['REQUEST_METHOD'] == "GET"){
    include_once("../../PDO_Connection.php");
    $subpage_id = isset($_GET['subpage_id']) ? $_GET['subpage_id'] : "";
    $sql = "DELETE FROM subpage where subpage_id = $subpage_id";
    $queryData = $conn->prepare($sql);
    $queryData->execute();
    header('Location: ../../admin.php?feature=subpage');
}
?>