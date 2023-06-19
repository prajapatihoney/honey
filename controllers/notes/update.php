<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

//dd($_SERVER);
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [

    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] == $currentUserId);

$errors = [];

if(! validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A Body Msg is 1000 charachters Required!';
}

if(count($errors)){
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /notes');
die();
?>