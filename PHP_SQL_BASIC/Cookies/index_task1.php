<?php
//1.Сделайте две страницы: index.php и test.php. При заходе на index.php спросите с помощью формы страну пользователя,
// запишите ее в куки с именем country. При заходе на test.php выведите страну пользователя.
if (isset($_GET['country'])){
    setcookie('country',$_GET['country'],time() + 3600);
}
?>
<form action="" method="get">
    <input type="text" name="country" placeholder="country">
    <input type="submit">
</form>
