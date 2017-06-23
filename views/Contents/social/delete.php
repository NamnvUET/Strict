<?php
if($_SERVER['REQUEST_METHOD'] == "GET"){
    include_once("../../PDO_Connection.php");
    $social_network = isset($_GET['social_network']) ? $_GET['social_network'] : "";
    $sql = "DELETE FROM social_links where social_network = '$social_network' ";
    $queryData = $conn->prepare($sql);
    $queryData->execute();
    header('Location: ../../admin.php?feature=social');
}
?>