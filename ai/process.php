<?php
// 建立與資料庫的連線
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}

// 檢查表格是否存在，若不存在則建立
$sql = "CREATE TABLE IF NOT EXISTS projects (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    project VARCHAR(50) NOT NULL,
    student INT(2) NULL
)";
$conn->query($sql);

// 取得已選擇的座號
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seat = $_POST["seat"];

    // 檢查該座號是否已經選擇項目
    $sql = "SELECT * FROM projects WHERE student = $seat";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "您已經選擇過項目，請勿重複選擇。";
    } else {
        // 取得可用項目
        $sql = "SELECT project FROM projects WHERE student IS NULL";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $project = $row["project"];

            // 更新項目的座號
            $sql = "UPDATE projects SET student = $seat WHERE project = '$project'";
            $conn->query($sql);

            echo "您已成功選擇項目：$project";
        } else {
            echo "目前所有項目已被選擇，請稍後再試。";
        }
    }
}

// 關閉資料庫連線
$conn->close();
?>
