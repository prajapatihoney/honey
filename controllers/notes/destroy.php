<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

//dd($db);

$currentUserId = 1;

//dd($currentUserId);

        $note = $db->query('select * from notes where id = :id', [

            'id' => $_POST['id']
        ])->findOrFail();
        //dd($note);
        authorize($note['user_id'] == $currentUserId);

        $db->query('delete from notes where id = :id', [
            'id' => $_POST['id']
        ]);

        header('location: /notes');
        exit();
    


?>