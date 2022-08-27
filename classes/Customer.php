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
    public function customerLogin($email, $pass)
    {
        $email = $this->fm->validation($email);
        $pass = $this->fm->validation($pass);

        $email = mysqli_real_escape_string($this->db->link, $email);
        $pass = mysqli_real_escape_string($this->db->link, $pass);

        if (empty($email)) {
            $loginMsg = "username must not be empty!";
            return $loginMsg;
        } else if (empty($pass)) {
            $loginMsg = "password must not be empty!";
            return $loginMsg;
        } else {
            $query = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
            $result = $this->db->select($query);
            if ($result != false) {
                $output = $result->fetch_assoc();
                Session::set("userLogin", true);
                Session::set("userId", $output['userId']);
                Session::set("name", $output['name']);
                Session::set("email", $output['email']);
                Session::set("shippingId", $output['shippingId']);
                Session::set("address", $output['address']);
                Session::set("phone", $output['phone']);
                Session::set("zipcode", $output['zipcode']);
                echo "<script>window.location = 'index.php';</script>";
            } else {
                $loginMsg = "email or password wrong!";
                return $loginMsg;
            }
        }
    }

}

?>