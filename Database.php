<?php

// connect the MySql database.
/*
class Person
{
    public $name;
    public $age;

    public function breathing()
    {
        echo $this->name." is Breathing!";
    }
}

$person = new person();

$person -> name = 'dhanush';
$person -> age = 20;

dumpAndDie($person->breathing());

*/


class database
{
    public $connection;
    public function __construct($config,$username = 'root',$password = 'welcome')
    {

        $dsn = 'mysql:'.http_build_query($config,'',';');
        //DSN -> Data Source Name
//        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};";

        $this->connection= new PDO($dsn,$username,$password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query)
    {
        $statement = $this->connection -> prepare($query);
        $statement -> execute();
        return $statement;
    }
}

