<?php

class restaurantcity{


    private $connection;

    public function __construct(){

        try{

            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASSWORD);

        }catch (PDOException $e){

            $e->getMessage();

        }
    }

    function addcity($cityName)
    {

        $sql = "INSERT INTO `app_city`(`city`) VALUES ('$cityName')";

        $add = $this->connection->prepare($sql);

        $add->execute();


        if ($add->rowCount() > 0) {

            return true;

        } else {

            return false;

        }
    }



    function getAllCity()
    {
        $sql = "SELECT * FROM `app_city`";

        $get = $this->connection->prepare($sql);

        $get->execute();


        if($get->rowCount()>0){

            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;

        }
    }


}