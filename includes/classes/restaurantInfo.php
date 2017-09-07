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


    function addRestaurant($restaurantName,$restaurantCity,$restaurantDescribtion,$restaurantCategory){

        $sql ="INSERT INTO `app_restaurant_info`(`restaurant_name`, `restaurant_city`, `restaurant_describtion`, `restaurant_category`) VALUES ('$restaurantName','$restaurantCity','$restaurantDescribtion','$restaurantCategory')";

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



}