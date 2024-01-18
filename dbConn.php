<?php
class DBconn{
    private $host;
    private $dbname;
    private $user;
    private $pass;
    public $conn;

    public function __construct(){
        $this->host = 'localhost';
        $this->dbname = 'icb0006_uf4_pr01';
        $this->user = 'root';
        $this->pass = '';
    }

    public function connect(){
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage() . '</br>Más datos: </br> host: ' . $this->host . ' dbname: ' . $this->dbname . ' user: ' . $this->user . ' contra: ' . $this->pass;
        }

        return $this->conn;
    }

    public function insert($fecha, $company, $qty){
        try {
            /* Test
            echo gettype(date($fecha)) . " " . gettype($company) . " " . gettype($qty) . "</br>";
            echo $fecha . " " . $company . " " . $qty . "</br>";
            /**/
            $stmt = $this->conn->prepare("INSERT INTO orders (date, company, qty) VALUES(:fecha, :company, :qty)");
            /**/
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':qty', $qty);
            $stmt->execute();
            /**/
            return true;
        } catch (PDOException $e) {
            echo "Insert failed: " . $e;
            die();
        }
    }
}
?>