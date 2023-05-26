<link rel="stylesheet" href="./css/style.css">
<?php
include_once "./db.php";
$selection = $_GET['selection'];

$vote_state = $pdo->query("SELECT `vote_state` FROM `members` WHERE `seat_id`='$selection'")->fetchColumn();

if ($vote_state == 1) {
    header("location: ./success.php?seat_id=$selection");
    exit;
}

$name = $pdo->query("SELECT `name` FROM `members` WHERE `seat_id`='$selection'")->fetchColumn();
echo "座號 " . $selection ." 號同學你好&nbsp!" ;

if(isset($_GET['msg'])){
    echo "<span style='color:orange'>";
    echo $msg[$_GET['msg']];
    echo "</span>";
}

echo "<br>請在下方列表自選打掃工作<br><br>";

// 取得該主題的選項清單
$options = $pdo->query("select * from `options` where `subject_id`='0'")->fetchAll(PDO::FETCH_ASSOC);

?>

<form action="./api/vote.php" method="post">
    <ul>
        <?php
        foreach ($options as $idx => $opt) {
            echo "<li>";
               // 單選題
               
            //    echo "<span>".($idx+1).". </span>";
               if ($opt['total']!=0) {
                echo "<input type='radio' name='desc' value='{$opt['id']}' class='radio-btn'>";
               }else{
                echo "&nbsp&nbsp&nbsp&nbsp";
               }
            echo "<span>缺額{$opt['total']}人，</span>";
            echo "<span>{$opt['description']}</span>";
            echo "</li>";
        }
        ?>
    </ul>

    <div>
        <input type="hidden" name="seat_id" value="<?=$_GET['selection'];?>">
        <input type="submit" value="確定click me!" class="await">
        <!-- <input type="button" value="取消"> -->
    </div>
    <br>
    <a href="/">我不是<?=$name . '(?)'; ?></a>

</form>










