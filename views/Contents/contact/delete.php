<?php
if($_SERVER['REQUEST_METHOD'] == "GET"){
    include_once("../../PDO_Connection.php");
    $message_id = isset($_GET['message_id']) ? $_GET['message_id'] : "";
    $sql = "DELETE FROM contact_message where message_id = $message_id";
    $queryData = $conn->prepare($sql);
    $queryData->execute();
    header('Location: ../../admin.php?feature=contact');
}
?>