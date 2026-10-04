<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Core\Debug;
use App\Core\Database;
use App\Models\User;
use App\Models\Note;

$db = new Database();
$users = new User($db->connection());
$notes = new Note($db->connection());

// Notes
$notesData = [
    [
        "title" => "Book Recommendation",
        "content" => "Try reading Atomic Habits this weekend."
    ],
    [
        "title" => "Meeting Notes",
        "content" => "Discussed the new dashboard design and upcoming deadlines."
    ],
    [
        "title" => "Weekend Plans",
        "content" => "Clean the room and watch a movie with friends."
    ],
    [
        "title" => "Learning",
        "content" => "Practice JavaScript array methods today."
    ],
    [
        "title" => "Reminder",
        "content" => "Submit the project report before Friday."
    ],
    [
        "title" => "Travel Idea",
        "content" => "Look into visiting Cebu during the next holiday."
    ],
    [
        "title" => "Quick Thought",
        "content" => "Small improvements every day can make a big difference."
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="./css/app.css">
</head>

<body class="flex justify-center items-center w-full min-h-dvh">
    <h1 class="text-5xl font-bold h-full">
        Hello World!
    </h1>
</body>

</html>