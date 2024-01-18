<?php
namespace RandomOrders;

include ("order.php");
//include ("funcs.inc.php");

class ApiOrders{

    private static function getData($orders, $result){
        if($result->rowCount()){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                //print_r($row); Test.                
                $register = array(
                    'id_order' => $row['id_order'],
                    'date' => $row['date'],
                    'company' => $row['company'],
                    'qty' => $row['qty'],
                );
                array_push($orders['register'], $register);
            }

            http_response_code(200);
            echo json_encode($orders);
        } else {
            http_response_code(404);
            echo json_encode(array('message' => 'Element not found'));
        }
        
        return $orders;
    }

    public static function getFilterCompanyOrder($dato){
        $order = new Order();
        $orders = array();
        $orders['register'] = array();
        echo "hola?";
        $result = $order->getFilterCompanyOrder($dato);

        return ApiOrders::getData($orders, $result);
    }

    public static function getFilterCompanyDate($dato){
        $order = new Order();
        $orders = array();
        $orders['register'] = array();
        echo "hola?";
        $result = $order->getFilterCompanyDate($dato);

        return ApiOrders::getData($orders, $result);
    }

    public static function getAll(){
        $order = new Order();
        $orders = array();
        $orders['register'] = array();

        $result = $order->getOrders();

        return ApiOrders::getData($orders, $result);        
    }
}

//$api = new ApiOrders();

if(isset($_GET['company'])){
    if(!$_GET['company'] == ""){
        echo "Estoy en company del fichero ApiOrders.php: " . $_GET['company'] . "</br>";
        //$api->getFilterCompanyOrder($_GET['company']);
        ApiOrders::getFilterCompanyOrder($_GET['company']);
        die();
    }
}    

if(isset($_GET['date'])){
    if(!$_GET['date'] == ""){
        echo "Estoy en date del fichero ApiOrders.php: " . $_GET['date'] . "</br>";
        //$api->getFilterCompanyDate($_GET['date']);
        ApiOrders::getFilterCompanyDate($_GET['date']);
        die();
    }
}

//die();
//$api->getAll();
ApiOrders::getAll();
?>