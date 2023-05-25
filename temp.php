<?php

include_once "../db.php";

$opt = $_POST['desc'];

/* 選項類型：
   1. 單選：$_POST['desc'] = 3;
   2. 多選：$_POST['desc'] = [1, 3, 6]; */

$subject_id = $_POST['subject_id'];
$subject_type = $pdo->query("select `type` from `topics` where `id`='$subject_id'")->fetchColumn();

switch ($subject_type) {
    case 1:
        // 單選題
        $pdo->exec("update `options` set `total`=`total`+1 where `id`='$opt'");
        break;
    case 2:
        // 多選題
        foreach ($opt as $opt_id) {
            $pdo->exec("update `options` set `total`=`total`+1 where `id`='$opt_id'");
        }
        break;
}

// 記錄使用者投票狀況
if (isset($_SESSION['login'])) {
    // 使用者已登入，從資料庫中查詢使用者 ID
    $mem_id = $pdo->query("select `id` from `members` where `acc`='{$_SESSION['login']}'")->fetchColumn();
} else {
    // 使用者未登入，將使用者 ID 設為 0
    $mem_id = 0;
}

$topic_id = $_POST['subject_id'];
$vote_time = date("Y-m-d H:i:s");
/*
    serialize()：將陣列轉換為可儲存的字串格式
    json_encode()：將陣列轉換為 JSON 字串格式
*/
$records = serialize([$_POST['subject_id'] => $opt]);

$sql = "insert into `logs`(`mem_id`, `topic_id`, `vote_time`, `records`) 
                  values ('$mem_id', '$topic_id', '$vote_time', '$records')";
$pdo->exec($sql);


header("location:../index.php?do=result&id=$subject_id");


POST取得
Array
(
    [desc] => 9
    [seat_id] => 18
)

使用post取得的seat_id數值做索引，查詢members資料表內欄位seat_id，檢視欄位vote_state的資料是否狀態是否為1，
如果是1顯示你已投選過，跳回index.php。
如果為0繼續使用post取得的desc數值做索引，查詢options資料表內id欄位，檢視欄位total的資料是否為0，
如果是0顯示該選項已額滿，點擊後跳回vote.php頁面，並帶有seat_id的變數。
如果不為0，則修改欄位total的資料，使數值減少1。
繼續修改members資料表內資料，索引seat_id欄位數值使vote_state欄位設為1。
使用post取得的desc數值做索引，查詢options資料表內id欄位，並取得description欄位的資料，然後更新資料在members資料表seat_id索引的vote_result欄位內。
然後跳回index.php帶有desc參數與表示成功參數。

使用get得到seat_id=的數值做索引，查詢members資料表內seat_id欄位，並取得vote_result欄位的資料，顯示在網頁上 例如；你成功選擇了vote_result資料。

使用get得到seat_id=的數值做索引，查詢members資料表內seat_id欄位，查詢vote_result欄位的資料 取得vote_result相同資料的所有seat_id顯示在網頁上 例如；你與誰跟誰的相同。