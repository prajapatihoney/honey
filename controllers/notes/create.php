<?php 

require base_path('Validator.php');

$config = require base_path('config.php');

$db = new Database($config['database']);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // if(strlen($_POST['body']) == 0){
    //     $errors['body'] = 'Body Msg is Required';
    // }
    // dd($errors);

    // if(! validator::email('honey@gmail.com'));
    // {
    //     dd('This is not a valid email address');
    // }

    if(! validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A Body Msg is 100 charachters Required!';
    }

    if(empty($errors))
    {

        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}
view("notes/create.view.php", [
    'heading' => 'Create Notes',
    'errors' => $errors

]);
