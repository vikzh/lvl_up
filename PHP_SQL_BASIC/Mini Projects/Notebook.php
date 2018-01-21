<?php
$host = 'localhost';
$name = 'root';
$password = 'root';
$db_name = 'noteBook';

$conn = mysqli_connect($host, $name, $password, $db_name);
if (!$conn) {
    die("connection failed :( " . mysqli_connect_error());
}
if (isset($_POST['newRecord'])) {
    $newName = trim(strip_tags($_POST['record_name']));
    $newDescription = trim(strip_tags($_POST['record_description']));
    $newText = trim(strip_tags($_POST['record_text']));
    $addQuery = "INSERT INTO records (name, description, text) VALUES('$newName','$newDescription','$newText')";
    if (mysqli_query($conn, $addQuery)) {
        echo "Новая запись успешно добавлена";
    } else {
        echo "Error in: $addQuery ," . mysqli_error($conn);
    }
}

if (isset($_POST['editRecord'])) {
    $editName = trim(strip_tags($_POST['record_name']));
    $editDescription = trim(strip_tags($_POST['record_description']));
    $editText = trim(strip_tags($_POST['record_text']));
    $editQuery = "UPDATE records SET name = '$editName', description = '$editDescription', text = '$editText'";
    if (mysqli_query($conn, $editQuery)) {
        echo "Запись успешно отредактирована";
    } else {
        echo "Eror: " . mysqli_error($conn);
    }
}
$selectQuery = "SELECT name,description,date,id FROM records";
$result = mysqli_query($conn, $selectQuery);
?>
<body>
<div class="wrapper">
    <h1>Список записей</h1>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div>
                <p>
            <span>
                <?php echo $row['name']; ?>
            </span>
                    <span>
                <?php echo $row['date']; ?>
            </span>
                    <span>
                        <a href="editRecordNotebook.php?record=<?php echo $row['id']; ?>"><-Редактировать</a>
                    </span>
                </p>
                <p>
                    <?php echo $row['description']; ?>
                </p>
            </div>
            <?php
        }
    }
    ?>
    <a href="addRecordNotebook.php">Добавить запись</a>
</div>
</body>