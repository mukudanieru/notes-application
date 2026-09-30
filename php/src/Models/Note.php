<?php

namespace Mukudanieru\Php\Models;

class Note
{
    public function __construct(
        public int $id,
        public string $user_id,
        public string $title,
        public string $content,
        public string $created_at,
        public string $updated_at
    ) {}
}
