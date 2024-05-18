<?php 
class connectDatabase{
    private $servername;
    private $username;
    private $password;
    private $database;
    public  $conn;

    public function __construct(){
        $this->servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
        $this->username = "root"; // Tên người dùng cơ sở dữ liệu
        $this->password = ""; // Mật khẩu của người dùng cơ sở dữ liệu
        $this->database = "cinema"; // Tên cơ sở dữ liệu
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
            echo "Lỗi roogi kìa aaaaa: " . $e->getMessage();
            return false;
        }
       
    }

}   

