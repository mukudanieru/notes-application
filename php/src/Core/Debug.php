<?php

namespace App\Core;

final class Debug
{
    public static function dump(mixed $value): void
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }
}
