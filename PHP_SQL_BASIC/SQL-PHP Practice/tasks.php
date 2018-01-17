<?php
//1.Дана таблица с работниками. Реализуйте ее вывод на экран в следующем виде
//2.Сделайте в таблице всех работников ссылку 'удалить'. По нажатию на эту ссылку
// из БД должна удаляться запись с этим id (его следует передавать через GET-параметр del_id).
//3.Сделайте форму добавления нового работника.
//4.Сделайте колонку 'редактировать' для каждого работника. Там должна быть ссылка,
// по переходу на которую появится страница с формой редактирования работника.
//5.Над таблицей с работниками сделайте инпут, в который вводится зарплата.
// По нажатию на кнопку следует вывести таблицу работников с введенной зарплатой
//6.Сделайте колонку 'удалить', в которой для каждого работника будет стоять чекбокс. Под таблицей сделайте кнопку,
// по нажатию на которую будут удалены те работники, для которых чекбокс был отмечен.

$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'practice';

$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
if (isset($_GET['id'])) {
    $deleteQuery = "DELETE FROM workers WHERE id = $_GET[id]";
    mysqli_query($link, $deleteQuery) or die(mysqli_query($link));
}
if (isset($_GET['mas_del'])) {
    foreach ($_GET['toDel'] as $value) {
        $massDeleteQuery = "DELETE FROM workers WHERE id = $value";
        mysqli_query($link, $massDeleteQuery) or die(mysqli_query($link));
    }
}
if (isset($_GET['new_add'])) {
    $addQuery = "INSERT INTO workers SET name = '$_GET[new_name]',age = $_GET[new_age],salary = $_GET[new_salary]";
    mysqli_query($link, $addQuery) or die(mysqli_query($link));
}
$query = "SELECT * FROM workers";
$result = mysqli_query($link, $query) or die(mysqli_query($link));
?>
<style>
    td {
        border: 1px solid black;
        padding: 5px;
    }
</style>
<div>
    <form action="" method="get">
        <input type="text" name="filter_salary" placeholder="salary to filter">
        <input type="submit" name="filter_button" value="Filter Salary">
    </form>
    <form action="" method="get">
        <table>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>age</td>
                <td>salary</td>
                <td>delete</td>
                <td>edit</td>
                <td>mass delete</td>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                if ((isset($_GET['filter_salary']) && ($_GET['filter_salary'] == $row['salary'])) || (!isset($_GET['filter_salary']))) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['salary']; ?></td>
                        <td><a href="?id=<?php echo $row['id']; ?>">удалить</a></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&age=<?php echo $row['age']; ?>&salary=<?php echo $row['salary']; ?>">редактировать</a>
                        </td>
                        <td><input type="checkbox" name="toDel[]" value="<?php echo $row['id']; ?>"></td>
                    </tr>
                    <?php
                } else continue;
            }
            ?>
        </table>
        <input type="submit" name="mas_del" value="Delete Checkd Rows">
    </form>
    <form action="" method="get">
        <input type="text" placeholder="name" name="new_name">
        <input type="text" placeholder="age" name="new_age">
        <input type="text" placeholder="salary" name="new_salary">
        <input type="submit" name="new_add" value="Add">
    </form>
</div>