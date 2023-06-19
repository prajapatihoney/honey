<?php 


use Core\App;
use Core\validator;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

    
    if(! validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A Body Msg is 1000 charachters Required!';
    }

    if(! empty($errors))
    {
        return view("notes/create.view.php", [
            'heading' => 'Create Notes',
            'errors' => $errors
        ]);
        
    }
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);

    header('location: /notes');
    die();


?>