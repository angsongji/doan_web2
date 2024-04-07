<?php 
class connectDatabase{
    private $servername;
    private $username;
    private $password;
    private $database;
    public  $conn;

    public function __construct($s,$u,$p,$d){
        $this->servername=$s;
        $this->username=$u;
        $this->password=$p;
        $this->database=$d;
        $this->conn= new mysqli($this->servername,$this->username,$this->password,$this->database);
        
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }

    public function disconnect(){
        $this->conn->close();
    }

    public function executeQuery($Querry) {
        try{
            $result = $this->conn->query($Querry);
            if ($result === false) {
                // Xử lý lỗi nếu có
                throw new Exception("Truy vấn thất bại: " . $this->conn->error);
            }
            return $result;
        }catch(Exception $e){
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
       
    }

    
}   

