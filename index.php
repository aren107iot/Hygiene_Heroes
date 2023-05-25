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
        <h1>0526教室1113自選打掃頁面</h1>
        <form action="vote.php" method="get">
            <select id="dropdown" name="selection">
                <optgroup label="請選擇座號">
                    <option value="1">1 號</option>
                    <option value="2">2 號</option>
                    <option value="3">3 號</option>
                    <option value="4">4 號</option>
                    <option value="5">5 號</option>
                    <option value="6">6 號</option>
                    <option value="8">8 號</option>
                    <option value="9">9 號</option>
                    <option value="10">10 號</option>
                    <option value="11">11 號</option>
                    <option value="12">12 號</option>
                    <option value="13">13 號</option>
                    <option value="14">14 號</option>
                    <option value="15">15 號</option>
                    <option value="16">16 號</option>
                    <option value="17">17 號</option>
                    <option value="18">18 號</option>
                    <option value="19">19 號</option>
                    <option value="20">20 號</option>
                    <option value="21">21 號</option>
                    <option value="22">22 號</option>
                    <option value="23">23 號</option>
                </optgroup>
            </select>
            <br><br>
            <input type="submit" value="提交">
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