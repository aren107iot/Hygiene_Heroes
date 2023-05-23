<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "1113cleaning";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['seat_number']) && isset($_POST['selected_item'])) {
    $seatNumber = $_POST['seat_number'];
    $selectedItem = $_POST['selected_item'];

    // 查询学生是否已经选择了项目
    $query = "SELECT * FROM students WHERE seat_number = '$seatNumber'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // 学生已经选择了项目，更新选项
        $row = $result->fetch_assoc();
        $studentId = $row['id'];

        $query = "UPDATE students SET selected_item = '$selectedItem' WHERE id = '$studentId'";
        $conn->query($query);
    } else {
        // 学生尚未选择项目，插入新记录
        $query = "INSERT INTO students (seat_number, selected_item) VALUES ('$seatNumber', '$selectedItem')";
        $conn->query($query);
    }

    // 更新项目的选择状态
    $query = "UPDATE items SET select_state = 1 WHERE item = '$selectedItem'";
    $conn->query($query);

    echo "您選擇了：$selectedItem";
}

// $conn->close();
?>
