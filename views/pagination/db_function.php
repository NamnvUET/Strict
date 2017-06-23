<?php
function get_total_number($conn, $pri_key, $table){
    $queryData = $conn->prepare("SELECT count($pri_key) as total FROM $table");
    $queryData->execute();
    $result  = $queryData->fetch();
    return $result['total'];
}

function get_all_record($conn, $table, $limit, $start){
    $queryData = $conn->prepare("SELECT * FROM $table LIMIT $start, $limit");
    $queryData->execute();
    $result = $queryData->fetchAll();
    $arr = array();
    foreach ($result as $row)
    {
        $arr[] = $row;
    }
    return json_encode($arr);
}
?>