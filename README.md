# Notes App

A basic CRUD notes application, built over and over with different tech stacks.

This project exists for learning. The idea never changes: a simple notes app where anyone can read notes and logged-in users manage their own. Only the tech stack changes, which makes it easy to compare how each language and framework handles the same problems (routing, database access, auth, validation, and so on). Built entirely by hand, with no AI-generated code whatsoever, just to fucking learn the frameworks and web languages.

## Features

**Auth**

- Register with a username and password
- Log in and log out

**Create**

- Logged-in users can create a note with a title and content

**Read**

- Anyone can view the list of notes and any single note, no account needed

**Update**

- Users can edit their own notes

**Delete**

- Users can delete their own notes

## Implementations

- [`php`](./php): vanilla PHP + MySQL `[In Progress]`

## What's Being Compared

Each rebuild is a chance to see how a stack approaches:

- Routing
- Database access
- Authentication and sessions
- Authorization (who can do what)
- Validation
- Rendering the output

## Database Schema

The schema is the same across every implementation.

```dbml
Table users {
  id uuid [pk]
  username varchar(50) [not null, unique]
  password_hash varchar(255) [not null]
  created_at timestamp [not null, default: `now()`]
}

Table notes {
  id integer [pk, increment]
  user_id uuid [not null]
  title varchar(255) [not null]
  content text
  created_at timestamp [not null, default: `now()`]
  updated_at timestamp [not null, default: `now()`]
}

Ref: notes.user_id > users.id [delete: cascade]
```

Paste this into [dbdiagram.io](https://dbdiagram.io) to see the diagram.
