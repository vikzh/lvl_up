<?php

//final class Checkout{
//    final function totalize(){
//        //method
//    }
//}

//Will be Error (final class)
//class IllegalCheckout extends Checkout{
//
//}

class Checkout
{
    final function totalize()
    {
        //method
    }
}

class IllegalCheckout extends Checkout
{
//    will be Error (final method)
//    final function totalize(){
//        //children method
//    }
}