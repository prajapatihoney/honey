<?php 

// connect to MYSQL Database and Excecute the query
namespace Core;
class Database {
    public $connection;

    public $statement;
    public function __construct($config)
    {
        
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        
        $this->connection = new \PDO($dsn, 'root', '', [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);

    }
    public function query($query, $params = []){
        

        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get(){
        return $this->statement->fetchAll();
    }

    public function find() {
        return $this->statement->fetch();
    }

    function abort($code = 404)
    {
        http_response_code($code);
        
        require base_path('views/'.$code.'.php');
        
        die();
    }


    public function findOrFail() 
    {
        $result = $this->find();
        //dd($result);
        if (! $result) {
            $this->abort();
        }

        return $result;
    }   
}
