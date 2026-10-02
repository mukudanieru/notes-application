<?php

namespace App\Models;

use PDO;

class User
{
    public function __construct(private PDO $db) {}
}
