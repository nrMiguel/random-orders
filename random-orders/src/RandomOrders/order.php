<?php
include_once 'dbConn.php';

class Order extends DBconn{

    public function getOrders(){
        //echo "estoy en getOrders() de order.php";
        $result = $this->connect()->query('SELECT * FROM orders');

        return $result;
    }

    public function getFilterCompanyOrder($company){
        $stmt = $this->connect()->prepare("SELECT * FROM orders WHERE company=:company");
        $stmt->bindParam(':company', $company);
        $stmt->execute();

        return $stmt;
    }

    public function getFilterCompanyDate($date){
        $stmt = $this->connect()->prepare("SELECT * FROM orders WHERE date > :date");
        $stmt->bindParam('date', $date);
        $stmt->execute();
        
        return $stmt;
    }
}
?>