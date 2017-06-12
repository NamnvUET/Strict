<?php
    try {
    // Kết nối
        $conn = new PDO("mysql:host=localhost;dbname=strict", 'phpmyadmin', 'nguyen979vannam');
    // Thiết lập chế độ lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
?>