<h1>太棒了</h1>

<?php

include_once "./db.php";

$seat_id = $_GET['seat_id'];

// 根據 seat_id 查詢 members 資料表的 vote_result 欄位資料
$vote_result = $pdo->query("SELECT `vote_result` FROM `members` WHERE `seat_id`='$seat_id'")->fetchColumn();
$name = $pdo->query("SELECT `name` FROM `members` WHERE `seat_id`='$seat_id'")->fetchColumn();

// 查詢所有具有相同 vote_result 的 seat_id
$matchingSeatIds = $pdo->query("SELECT seat_id FROM members WHERE vote_result = '$vote_result'")->fetchAll(PDO::FETCH_COLUMN);
// $matchingSeatIds = $pdo->query("SELECT seat_id 
//                                 FROM members 
//                                 WHERE vote_result = '$vote_result' 
//                                 GROUP BY seat_id 
//                                 HAVING COUNT(*) >= 2")
//                         ->fetchAll(PDO::FETCH_COLUMN);

// 顯示結果
echo"$name 已成功選擇了< $vote_result >這項清潔任務。";


echo "<p>" . $name . "將與以下隊友組隊：</p>";
echo "<ul>";
foreach ($matchingSeatIds as $matchingSeatId) {
    // 根據 seat_id 查詢對應的 name
    $name = $pdo->query("SELECT name FROM members WHERE seat_id = '$matchingSeatId'")->fetchColumn();

    echo "<li>隊員：$name</li>";
}
echo "</ul>";


