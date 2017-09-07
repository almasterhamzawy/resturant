<?php


class admin{

    private $connection;

    public function __construct(){

        try{

            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASSWORD);

        }catch (PDOException $e){

            $e->getMessage();

        }
    }


    public function login($username,$password)
    {

        $sql = "SELECT `username`, `password` FROM `app_admin` WHERE `username` = '$username' AND `password` = '$password'";


        $login =  $this->connection->prepare($sql);

        $login->execute();

        if($login->rowCount()>0){


             return$login->fetchAll(PDO::FETCH_ASSOC);

        }else{

            return false;

        }

    }


}