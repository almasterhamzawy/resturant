<?php

class restaurantCategory{


    private $connection;

    public function __construct(){

        try{

            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASSWORD);

        }catch (PDOException $e){

            $e->getMessage();

        }
    }

    //the function is using for add category

    function addCategory($categoryName)
    {

        $sql = "INSERT INTO `app_restaurant_category`(`category_name`) VALUES ('$categoryName')";

        $add = $this->connection->prepare($sql);

        $add->execute();


        if ($add->rowCount() > 0) {

            return true;

        } else {

            return false;

        }
    }



    // the function is getting all categories

    function getAllCategory()
    {
        $sql = "SELECT * FROM `app_restaurant_category`";

        $get = $this->connection->prepare($sql);

        $get->execute();


        if($get->rowCount()>0){

            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;

        }
    }


}