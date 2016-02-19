<?php
/**
 * Created by PhpStorm.
 * User: litter
 * Date: 17.02.16
 * Time: 19:22
 */

error_reporting(E_ALL);

function foo2()
{
    function foo3(){
        echo __FUNCTION__."<br>";
    }
}