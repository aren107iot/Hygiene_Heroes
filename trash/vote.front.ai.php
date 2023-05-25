<h1>投票</h1>
<?php
// 從資料庫中取得該主題的資訊
$topic = $pdo->query("select * from `topics` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
if ($topic['login'] == 1) {
    // 若該主題需要登入，但使用者尚未登入，導向登入頁面
    if (!isset($_SESSION['login'])) {
        $_SESSION['position'] = "/index.php?do=vote&id={$_GET['id']}";
        header("location:index.php?do=login&msg=1");
    }
}

// 取得該主題的選項清單
$options = $pdo->query("select * from `options` where `subject_id`='{$_GET['id']}'")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2><?=$topic['subject'];?></h2>
<form action="./api/vote.php" method="post">
    <ul>
        <?php
        foreach ($options as $idx => $opt) {
            echo "<li>";
            switch ($topic['type']) {
                case 1:
                    // 單選題
                    echo "<input type='radio' name='desc' value='{$opt['id']}'>";
                    break;
                case 2:
                    // 複選題
                    echo "<input type='checkbox' name='desc[]' value='{$opt['id']}'>";
                    break;
            }

            echo "<span>".($idx+1).". </span>";
            echo "<span>{$opt['description']}</span>";
            echo "</li>";
        }
        ?>
    </ul>

    <div>
        <input type="hidden" name="subject_id" value="<?=$_GET['id'];?>">
        <input type="submit" value="投票">
        <input type="button" value="取消">
    </div>
</form>
