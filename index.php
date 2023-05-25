<!DOCTYPE html>
<html>

<head>
    <title>下拉選單</title>
    <style>
        .container {
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>05/26教室1113自選打掃頁面</h1>
<?php
include_once "./db.php";
        if(isset($_GET['msg'])){
    echo "<span style='color:orange'>";
    echo $msg[$_GET['msg']];
    echo "</span>";
}
?>
        <form action="vote.php" method="get">
            <h3>你的名子</h3>
            <select id="dropdown" name="selection">
                <optgroup label="我是?">
                <option value="" selected>請選擇</option>
                    <option value="1">文翰</option>
                    <option value="2">淑敏</option>
                    <option value="3">博宏</option>
                    <option value="4">聆韻</option>
                    <option value="5">品君</option>
                    <option value="6">仕庭</option>
                    <option value="8">威安</option>
                    <option value="9">可瑞</option>
                    <option value="10">育成</option>
                    <option value="11">家茜</option>
                    <option value="12">亮均</option>
                    <option value="13">劉錠</option>
                    <option value="14">承昉</option>
                    <option value="15">凱迪</option>
                    <option value="16">勝皇</option>
                    <option value="17">嘉慶</option>
                    <option value="18">厚任</option>
                    <option value="19">郁國</option>
                    <option value="20">靖雅</option>
                    <option value="21">有志</option>
                    <option value="22">展志</option>
                    <option value="23">哲源</option>
                </optgroup>
            </select>
            <br><br>
            <!-- <input type="submit" value="繼續"> -->
        </form>
    </div>

    <script>
        // 在選單改變時觸發事件，跳轉到 vote.php 分頁
        document.getElementById('dropdown').addEventListener('change', function() {
            var selection = this.value;
            window.location.href = 'vote.php?selection=' + encodeURIComponent(selection);
        });
    </script>
</body>

</html>