<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Core\Debug;
use App\Core\Database;
use App\Models\User;
use App\Models\Note;
use App\Core\Router;

$db = new Database();
$users = new User($db->connection());
$notes = new Note($db->connection());
$routes = new Router();

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


$routes->get("/", function () {
    echo "index";
});

$routes->get("/register", function () {
    echo "register";
});

$routes->dispatch();
