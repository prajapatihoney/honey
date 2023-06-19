<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

//dd($_SERVER);
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [

    'id' => $_GET['id']
])->findOrFail();
    //dd($note);
        
    authorize($note['user_id'] == $currentUserId);
            
    view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => [],
        'note' => $note

    ]);
