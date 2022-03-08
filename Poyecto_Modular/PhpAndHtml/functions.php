<?php

    /*Héctor Aguirre González */

    function connect($h, $p, $d, $u, $pa){
        try{
            $con = new PDO("mysql:host=$h;port=$p;dbname=$d", $u, $pa);
            return $con;
        }catch(PDOException $e){
           return false;
        }
    }

    

?>