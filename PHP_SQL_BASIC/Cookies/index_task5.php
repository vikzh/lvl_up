<?php
//5.Сделайте на сайте 5 картинок с товарами. Реализуйте корзину.
//Под каждой картинкой должна быть ссылка 'Положить в корзину'.
//По нажатию на эту ссылку этот товар должен занестись в корзину (сессия), также должна увеличиться общая сумма,
//которую должен заплатить пользователь (сумма также должна быть указана под картинками с товарами).
$products = ['water' => 1, 'chocolate' => 10, 'apple' => 5, 'milk' => 2, 'bread' => 1];
if (empty($_COOKIE['sum']) || empty($_COOKIE['purchases'])) {
    setcookie('sum', 0, time() + 3600);
    setcookie('purchases', 0, time() + 3600);
}
if (isset($_GET['product'])) {
    if (empty($_COOKIE['purchases'])) {
        setcookie('purchases', serialize([$_GET['product']]), time() + 3600);
        setcookie('sum', $products[$_GET['product']], time() + 3600);
    } else {
        $currentProducts = unserialize($_COOKIE['purchases']);
        $currentProducts[] = $_GET['product'];
        setcookie('purchases', serialize($currentProducts), time() + 3600);
        setcookie('sum', $products[$_GET['product']] + $_COOKIE['sum']);
    }
}
?>
<body>
<h2>Корзина</h2>
<ol>
    Содержимое Корзины
    <?php
    if (!empty($_COOKIE['purchases'])) {
        $currentProducts = unserialize($_COOKIE['purchases']);
        foreach ($currentProducts as $product) {
            ?>
            <li>
                <?php
                echo $product;
                ?>
            </li>
            <?php
        }
    }
    ?>
</ol>
<span>Сумма покупок = <?php if (isset($_COOKIE['sum'])) {
        echo $_COOKIE['sum'];} ?></span>
<p>
    <img src="">
    <span>Вода </span>
    <span>1$</span>
    <span><a href="?product=water">Купить</a></span>
</p>

<p>
    <img src="">
    <span>Шоколад </span>
    <span>10$</span>
    <span><a href="?product=chocolate">Купить</a></span>
</p>

<p>
    <img src="">
    <span>Яблоко</span>
    <span>5$</span>
    <span><a href="?product=apple">Купить</a></span>
</p>

<p>
    <img src="">
    <span>Молоко</span>
    <span>2$</span>
    <span><a href="?product=milk">Купить</a></span>
</p>

<p>
    <img src="">
    <span>Хлеб</span>
    <span>1$</span>
    <span><a href="?product=bread">Купить</a></span>
</p>
</body>
