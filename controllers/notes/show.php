<?php 

$config = require base_path('config.php');

$db = new Database($config['database']);

$currentUserId = 1;

//$id = $_GET['id'];
//dd($id);
$note = $db->query('select * from notes where id = :id', [

    'id' => $_GET['id']
    ])->findOrFail();

//dd($note);

authorize($note['user_id'] == $currentUserId);



view("notes/show.view.php", [
    'heading' => 'Note',
    'notes' => $note

]);

?>