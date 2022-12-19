<?php
include_once 'dbConn.php';

class Order extends DBconn{

    public function getOrders(){
        //echo "estoy en getOrders() de order.php";
        $result = $this->connect()->query('SELECT * FROM orders');

        return $result;
    }

    public function getFilterCompanyOrder($company){
        $query = 'SELECT * FROM orders WHERE company=?';
        $result = $this->connect()->prepare($query);
        $result->execute(array($company));

        return $result;
    }

    public function getFilterCompanyDate($date){
        $query = 'SELECT * FROM orders WHERE date > ?';
        $result = $this->connect()->prepare($query);
        $result->execute(array($date));
        
        return $result;
    }
}
?>