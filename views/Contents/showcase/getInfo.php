<?php
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        include_once("../../PDO_Connection.php");
        $showcase_id = isset($_GET['showcase_id']) ? $_GET['showcase_id'] : "";
        $sql = "SELECT showcase_name,showcase_description FROM showcases where showcase_id = $showcase_id";
        $queryData = $conn->prepare($sql);
        $queryData->execute();
        $result = $queryData->fetch();
        $array = array(
            'showcase_name' => $result["showcase_name"],
            'showcase_description' => $result["showcase_description"]
        );
        echo json_encode($array);
    }
?>