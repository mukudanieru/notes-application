<?php

require __DIR__ . "/../vendor/autoload.php";

use Mukudanieru\Php\Models\User;

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();

$hashedPassword = password_hash("pogiako123", PASSWORD_DEFAULT);
$user = new User($uuid, "mukudanieru", $hashedPassword, "08/20/2003");

echo "<pre>";
var_dump($user);
echo "</pre>";
