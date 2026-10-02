<?php

namespace App\Models;

use PDO;

class Note
{
    public function __construct(
        private PDO $db
    ) {}
}
