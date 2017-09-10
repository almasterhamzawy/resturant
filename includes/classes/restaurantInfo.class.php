<?php


class restaurantInfo{

    private $connection;

    public function __construct(){

        try{

            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASSWORD);

        }catch (PDOException $e){

            $e->getMessage();

        }
    }


    function addRestaurant($restaurantName,$restaurantCity,$restaurantDescribtion,$restaurantCategory,$restaurant_time){

        $sql ="INSERT INTO `app_restaurant_info`(`restaurant_name`, `restaurant_city`, `restaurant_describtion`, `restaurant_category`,`restaurant_time`) VALUES ('$restaurantName','$restaurantCity','$restaurantDescribtion','$restaurantCategory','$restaurant_time')";

        $add = $this->connection->prepare($sql);

        $add->execute();


        if ($add->rowCount() > 0) {

            return true;

        } else {
            return false;

        }



    }


    function selectAllRestaurants(){

        $sql = "SELECT
                `app_restaurant_info`.`id`,
                `app_restaurant_info`.`restaurant_name`,
                `app_city`.`city`,
                `app_restaurant_category`.`category_name`
                FROM
                `app_restaurant_info`
                 INNER JOIN
                `app_city`
                ON
                `app_restaurant_info`.`restaurant_city` = `app_city`.`id`
                INNER JOIN
                `app_restaurant_category`
                ON
                `app_restaurant_info`.`restaurant_category` = `app_restaurant_category`.`id`";

        $restaurants = $this->connection->prepare($sql);

        $restaurants->execute();

        if($restaurants->rowCount()>0){

            return $restaurants->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return false;

        }
    }

    function getAll(){

        $sql = "SELECT * FROM `app_restaurant_info`";

        $get = $this->connection->prepare($sql);

        $get->execute();

        if($get->rowCount()>0){

            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;

        }

    }

    function getRestaurant($categoryId,$cityId,$timeId){

        $sql = "SELECT
            `app_restaurant_info`.`restaurant_name`,
             `app_restaurant_info`.`restaurant_describtion`,
              `app_restaurant_discount_card`.`card_name`,
               `app_restaurant_discount_card`.`card_value`
                FROM
                `app_restaurant_info`
                 INNER JOIN
                  `app_restaurant_discount_card`
                  ON
                  `app_restaurant_discount_card`.`restaurant_dis` = `app_restaurant_info`.`id`
                   WHERE
                   `app_restaurant_info`.`restaurant_category` = '$categoryId'
                      AND
                      `app_restaurant_info`.`restaurant_city` = '$cityId'
                     AND
                      `app_restaurant_info`.`restaurant_time` = '$timeId'
                      ";

        $getRestaurant = $this->connection->prepare($sql);

        $getRestaurant->execute();


        if($getRestaurant->rowCount()>0){


            return $getRestaurant->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return false;

        }

    }



}