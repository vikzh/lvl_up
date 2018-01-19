<?php
$host = 'localhost';
$name = 'root';
$password = '';
$db_name = 'guestBook';

$link = mysqli_connect($host, $name, $password, $db_name) or die(mysqli_error($link));
if (isset($_POST['newAdd'])) {
    $text = trim(strip_tags($_POST['review']));
    $name = trim(strip_tags($_POST['name']));
    $addQuery = "INSERT INTO guestBook SET name = '$name',text = '$text'";
    mysqli_query($link, $addQuery) or die(mysqli_query($link));
}
$currentPage = 1;
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
}
function createPagination($currentPage)
{
    $pagination = '';
    if ($currentPage != 1) {
        $pagination = "<a href=?page=" . ($currentPage - 1) . ">L</a>";
    }
    for ($i = $currentPage; $i < $currentPage + 4; $i++) {
        $pagination .= "<a href=?page=$i>$i</a>";
    }
    $pagination .= "<a href=?page=" . ($currentPage + 1) . ">R</a>";
    return $pagination;
}

$selectQuery = "SELECT * FROM guestBook LIMIT $currentPage,5";
$result = mysqli_query($link, $selectQuery);
?>
<style>
    html {
        width: 100%;
    }
    #wrapper {
        width: 500px;
        margin: 0 auto;
    }
</style>
<html>
<body>
<div id="wrapper">
    <h1>Гостевая книга</h1>
    <?php
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
            </p>
            <p>
                <?php echo $row['text']; ?>
            </p>
        </div>
        <?php
    }
    echo createPagination($currentPage);
    ?>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Ваше имя">
        <input type="text" name="review" placeholder="Ваш Отзыв">
        <input type="submit" name="newAdd" value="Сохранить">
    </form>
</div>
</body>
</html>