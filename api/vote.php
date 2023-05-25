<?php
include_once "../db.php";

$desc = $_POST['desc'];
$seat_id = $_POST['seat_id'];

// 檢查該座位是否已經投選過
$vote_state = $pdo->query("SELECT `vote_state` FROM `members` WHERE `seat_id`='$seat_id'")->fetchColumn();

if ($vote_state == 1) {
    // 已經投選過，跳回 index.php
    header("location: ../index.php?msg=已投選過");
    exit;
}

// 檢查選項是否額滿
$total = $pdo->query("SELECT `total` FROM `options` WHERE `id`='$desc'")->fetchColumn();

if ($total == 0) {
    // 選項已額滿，跳回 vote.php 頁面
    header("location: vote.php?msg=該選項已額滿");
    exit;
}

// 修改 options 資料表中選項的總數
$pdo->exec("UPDATE `options` SET `total`=`total`-1 WHERE `id`='$desc'");

// 修改 members 資料表中的資料
$pdo->exec("UPDATE `members` SET `vote_state`=1 WHERE `seat_id`='$seat_id'");

// 根據 desc 查詢 options 資料表的 id 項目
$option = $pdo->query("SELECT `id` FROM `options` WHERE `id`='$desc'")->fetchColumn();

if ($option) {
    // 成功修改 members 資料表後，跳轉到 vote.php 分頁，並使用 GET 帶入選項的 id
    header("location: vote.php?id=$option");
    exit;
} else {
    // 若無法找到選項，跳回首頁或其他處理方式
    header("location: ../index.php?msg=錯誤訊息");
    exit;
}
