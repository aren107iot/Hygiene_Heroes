<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=1113cleaning";
$pdo=new PDO($dsn, 'root', '');

date_default_timezone_set("Asia/Taipei");

session_start();

$msg=[
    1=>"小朋友，你有道光從天靈蓋噴出來，你知道嗎? 我看你跟我有緣，第二份打掃工作就送給你吧",
    2=>"<br>0時0秒已被搶購一空，請先點擊radio選項"
];

?>