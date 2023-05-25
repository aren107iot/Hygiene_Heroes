<?php
include_once "./db.php";
$selection = $_GET['selection'];
echo "座號 " . $selection ." 號同學你好&nbsp!<br>請在下方列表自選打掃工作" ;

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
                echo "<input type='radio' name='desc' value='{$opt['id']}'>";
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
        <input type="submit" value="投票">
        <input type="button" value="取消">
    </div>
</form>










