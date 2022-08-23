<?php
include_once '../lib/database.php';
include_once '../lib/format.php';

class Customer
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function customerRegister($data){
        $name = $this->fm->validation($data['name']);
        $name = mysqli_real_escape_string($this->db->link, $name);

        $email = $this->fm->validation($data['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);

        $password = $this->fm->validation($data['password']);
        $password = mysqli_real_escape_string($this->db->link, $password);

        $shippingId = $this->fm->validation($data['shippingId']);
        $shippingId = mysqli_real_escape_string($this->db->link, $shippingId);

        $address = $this->fm->validation($data['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);

        $zipcode = $this->fm->validation($data['zipcode']);
        $zipcode = mysqli_real_escape_string($this->db->link, $zipcode);
        
        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);

        if (empty($name) ||empty($email) ||empty($password) ||empty($shippingId) ||empty($address) ||empty($zipcode) ||empty($phone)) {
            $cusMsg = "Field must not be empty!";
            return $cusMsg;
        } else {
            $catCheck = "SELECT * FROM user WHERE email = '$email'";
            $result = $this->db->select($catCheck);
            if ($result == false) {
                $cusInsert = "INSERT INTO user(name,email,password,shippingId,address,zipcode,phone) VALUES('$name','$email','$password','$shippingId','$address','$zipcode','$phone')";
                $cusQuery = $this->db->insert($cusInsert);
                Session::set("CustomerSuccess", "Customer Registered Successfully");
                echo "<script>window.location = 'login.php';</script>";
            } else {
                $cusMsg = "This Customer Already Registered! Try To Login";
                return $cusMsg;
            }
        }
    }

    

}

?>