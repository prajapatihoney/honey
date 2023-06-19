<?php 

use Core\App;
use Core\Database;
use Core\Validator;


$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(!Validator::email($email)) {
    $errors['email'] = 'Please Provide a Email Address';
}

if(!Validator::string($password, 7, 255)) {
    $errors['passowrd'] = 'Please Provide a Password atleast 7 characters';
}

if(! empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}
//dd($errors);
$db = App::resolve(Database::class);
//dd($db);
$user = $db->query('select * from users where email = :email', [
    'email' => $email 
])->find();

//dd($user);

if($user) 
{
    header('location: /');
    exit();
} 
else 
{
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');

    exit();
}
?>