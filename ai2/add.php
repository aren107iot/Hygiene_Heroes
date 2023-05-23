<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "1113cleaning";

$conn = new mysqli($servername, $username, $password, $dbname);

// 处理学生座号提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['seat_number'])) {
        $seatNumber = $_POST['seat_number'];

        // 查询学生是否已经选择了项目
        $query = "SELECT * FROM students WHERE seat_number = '$seatNumber'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // 学生已经选择了项目
            $row = $result->fetch_assoc();
            $selectedItem = $row['selected_item'];
            echo "您已选择项目：$selectedItem";
        } else {
            // 查询可选择的项目列表
            $query = "SELECT * FROM items";
            $result = $con~n->query($query);

            if ($result->num_rows > 0) {
                echo "<h2>学生识别与选择页面</h2>";
                echo "<form method='post' action='select_item.php'>";
                echo "请输入座号：<input type='text' name='seat_number'><br><br>";
                echo "<strong>请选择一个项目：</strong><br>";
                while ($row = $result->fetch_assoc()) {
                    $item = $row['item'];
                    $selectState = $row['select_state'];
                    $disabled = $selectState == 1 ? "disabled" : "";
                    $style = $selectState == 1 ? "color:red" : "";
                    echo "<input type='radio' name='selected_item' value='$item' $disabled> <span style='$style'>$item</span><br>";
                }
                echo "<br>";
                echo "<input type='submit' value='提交'>";
                echo "</form>";
            } else {
                echo "无可选择的项目。";
            }
        }
    }
}

// $conn->close();
?>



<!-- `$result->num_rows` 是一个用于获取查询结果中的行数的方法。在PHP中，当您执行数据库查询并获取结果集后，可以使用`$result->num_rows` 来获取结果集中的行数。

具体来说，`$result->num_rows` 返回一个表示结果集中行数的整数值。如果结果集中有至少一行数据，则 `$result->num_rows` 的值大于0；如果结果集为空，则其值为0。

您可以使用 `$result->num_rows` 来检查查询是否返回了结果行，从而进行相应的逻辑处理。在示例代码中，条件 `$result->num_rows > 0` 用于检查是否有查询结果返回。

例如，以下代码片段展示了如何使用 `$result->num_rows` 来判断是否有查询结果，并遍历结果集中的行：

```php
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // 处理结果集中的每一行
    while ($row = $result->fetch_assoc()) {
        // 执行逻辑操作
    }
} else {
    // 没有查询结果的逻辑操作
}
```

在上述示例中，如果 `$result->num_rows` 大于0，则进入 `if` 条件，表示有查询结果。然后，通过循环遍历结果集中的每一行，并执行相应的逻辑操作。如果 `$result->num_rows` 等于0，则进入 `else` 条件，表示没有查询结果，可以执行相应的逻辑操作。

希望这个解释能帮助您理解 `$result->num_rows` 的作用。如果您有任何进一步的问题，请随时提问。 -->