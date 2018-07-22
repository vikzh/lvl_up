<?php

namespace App\Converter;

use stdClass;

function toStd($data)
{
    $std = new stdClass();
    foreach ($data as $key => $value) {
        $std->$key = $value;
    }

    return $std;
}