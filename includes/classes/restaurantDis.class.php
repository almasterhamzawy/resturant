<?php


class restaurantDis{

    private $connection;

    public function __construct(){

        try{

            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASSWORD);

        }catch (PDOException $e){

            $e->getMessage();

        }
    }



    //the function is using to add discount

    function addDiscount($discountName,$discountValue,$restaurantName)
    {

        $sql = "INSERT INTO `app_restaurant_discount_card`(`card_name`, `card_value`, `restaurant_dis`) VALUES ('$discountName','$discountValue','$restaurantName')";

        $add = $this->connection->prepare($sql);

        $add->execute();


        if ($add->rowCount() > 0) {

            return true;

        } else {

            return false;

        }
    }


    //returning all discount cards and restaurants names

    function getAllDiscounts()
    {
        $sql = "SELECT
                `app_restaurant_discount_card`.`id`,
                `app_restaurant_discount_card`.`card_name`,
                `app_restaurant_discount_card`.`card_value`,
                `app_restaurant_info`.`restaurant_name`
                FROM
                `app_restaurant_discount_card`
                INNER JOIN
                `app_restaurant_info`
                ON
                `app_restaurant_discount_card`.`restaurant_dis`
                =
                `app_restaurant_info`.`id`
                ";

        $get = $this->connection->prepare($sql);

        $get->execute();


        if($get->rowCount()>0){

            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;

        }
    }




}