<?php

namespace Mukudanieru\Php\Models;

class User
{
    public function __construct(
        public string $id,
        public string $username,
        public string $password_hash,
        public string $created_at
    ) {}
}
