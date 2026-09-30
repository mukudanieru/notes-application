<?php

require __DIR__ . "/../vendor/autoload.php";

use Mukudanieru\Php\Models\User;
use Mukudanieru\Php\Models\Note;

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();

$hashedPassword = password_hash("pogiako123", PASSWORD_DEFAULT);
$user = new User($uuid, "mukudanieru", $hashedPassword, "2026-09-29 12:30:00");

echo "<pre>";
var_dump($user);
echo "</pre>";

$note = new Note(
    1,
    $user->id,
    "Groceries",
    "Eggs, milk, bread, coffee, and bananas.",
    "2026-09-30 08:30:00",
    "2026-09-30 08:30:00"
);

echo "<pre>";
var_dump($note);
echo "</pre>";
