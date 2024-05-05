<?php

class Dbh {
   
    protected function connect() {

        try {
            $user = "root";
            $pwd = "";

            $dbh = new PDO('mysql:host=localhost;dbname=iwtprjt', $user, $pwd);
            return $dbh;
        } catch (PDOException $th) {
            print "Error!: " . $th->getMessage() . "<br/>";
            die();
        }


        
    }
}

?>