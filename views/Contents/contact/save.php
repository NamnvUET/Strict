<?php
    include_once "../../PDO_Connection.php";
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $message = isset($_POST["message"]) ? $_POST["message"] : "";
        $is_subcribe = isset($_POST["check"]) ? $_POST["check"] : 0;
        if($is_subcribe == "on")
        {
            $is_subcribe = 1;
        }
        $sql = "INSERT INTO contact_message (fullname,email,message, is_subcribe)
                VALUES ('$fullname','$email','$message','$is_subcribe')";
        $query = $conn->prepare($sql);
        $query->execute();

        header("Location: ../../../index.php");
        }
?>