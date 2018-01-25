<?php
//4. Напишите оболочку над cookie. Оболочка должна представлять собой набор функций: сохранение куки,
// удаление куки, редактирование куки
function saveCookie($name,$value,$time){
    setcookie($name,$value,time() + $time);
}
function editCookie($name,$value){
    setcookie($name,$value,time() + 3600);
}
function deleteCookie($name){
    setcookie($name,'',time());
}