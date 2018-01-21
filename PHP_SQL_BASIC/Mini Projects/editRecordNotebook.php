<?php
if (isset($_GET['record'])) {
    $host = 'localhost';
    $name = 'root';
    $password = 'root';
    $db_name = 'noteBook';
    $conn = mysqli_connect($host, $name, $password, $db_name);
    if (!$conn) {
        die("connection failed :( " . mysqli_connect_error());
    }
    $selectQuery = "SELECT * FROM records WHERE id = $_GET[record]";
    if ($result = mysqli_query($conn, $selectQuery)) {
        $row = mysqli_fetch_assoc($result)
        ?>
        <form action="Notebook.php" method="post">
            <input type="text" name="record_name" value="<?php echo $row['name']; ?>">
            <input type="text" name="record_description" value="<?php echo $row['description']; ?>">
            <textarea name="record_text"><?php echo $row['text']; ?></textarea>
            <input type="text" name="record_id" value="<?php echo $row['id'] ?>" hidden>
            <input type="submit" name="editRecord" value="Сохранить">
        </form>
        <?php
    }
    mysqli_close($conn);
}
?>
<a href="Notebook.php">На главную</a>