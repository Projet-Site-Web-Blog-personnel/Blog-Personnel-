<?php  
    function getDB() 
        {
            $pdo = new PDO('mysql:host=localhost ;dbname=blog;charset=utf8', 'root', '');
            return $pdo;
        }

    function getDB_mysqli() 
    {
        $mysqli = mysqli_connect("localhost", "blog", "root", "");
        return $mysqli;
    }
?>
