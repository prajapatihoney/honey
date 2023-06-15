<?php 

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php'; 

//require base_path('response.php');

//require base_path('database.php');

spl_autoload_register(function ($class) {
    require base_path("core/" .$class . '.php');
});

require base_path('router.php');




//$id = $_GET['id'];

//$query = "select * from posts where id = :id";

//$posts = $db->query($query, [':id' => $id])->fetch();

//dd($posts);

?>

