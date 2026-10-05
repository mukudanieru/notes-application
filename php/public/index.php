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
    <link rel="stylesheet" href="/assets/basecoat-nova.css" />
</head>

<body class="flex justify-center items-center w-full min-h-dvh">
    <div class="grid items-start gap-4">
        <div class="alert"><svg class="lucide lucide-circle-check" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <path d="m9 12 2 2 4-4" />
            </svg>
            <h2>Welcome!</h2>
            <section>Basecoat is successfully installed.</section>
        </div>
    </div>
</body>

</html>