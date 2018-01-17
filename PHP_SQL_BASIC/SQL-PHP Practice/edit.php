<?php
if (isset($_GET['id'])) {
    if (isset($_GET['edit_name'])) {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db_name = 'practice';

        $link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
        $editQuery = "UPDATE workers SET name = '$_GET[edit_name]',age = $_GET[edit_age],salary = $_GET[edit_salary] WHERE id = $_GET[id]";
        mysqli_query($link,$editQuery) or die(mysqli_query($link));
    }
}
?>
<form>
    <input type="text" name="edit_name" value="<?php if(isset($_GET['name'])){ echo $_GET['name'];}?>">
    <input type="text" name="edit_age" value="<?php if(isset($_GET['name'])){ echo $_GET['age'];}?>">
    <input type="text" name="edit_salary" value="<?php if(isset($_GET['name'])){ echo $_GET['salary'];}?>">
    <input type="text" name="id" value="<?php if (isset($_GET['id'])) {echo $_GET['id'];}?>" hidden>
    <input type="submit">
</form>
<a href="tasks.php">Вернуться</a>
