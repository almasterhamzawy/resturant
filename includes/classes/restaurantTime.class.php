<?php

class restaurantTime{


    private $connection;

    public function __construct(){

        try{

            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASSWORD);

        }catch (PDOException $e){

            $e->getMessage();

        }
    }


    //function to return all time values from database

    function getAllTimes()
    {
        $sql = "SELECT * FROM `app_time`";

        $get = $this->connection->prepare($sql);

        $get->execute();


        if($get->rowCount()>0){

            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;

        }
    }


}