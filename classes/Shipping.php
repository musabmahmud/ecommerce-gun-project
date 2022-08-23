<?php
include_once '../lib/database.php';
include_once '../lib/format.php';

class Shipping
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function shippingAdd($data)
    {
        $city = $this->fm->validation($data['city']);

        $city = mysqli_real_escape_string($this->db->link, $city);

        
        $shippingCost = $this->fm->validation($data['shippingCost']);

        $shippingCost = mysqli_real_escape_string($this->db->link, $shippingCost);

        if (empty($city)) {
            $catMsg = "shipping City Name must not be empty!";
            return $catMsg;
        } else {
            $catCheck = "SELECT * FROM shipping WHERE city = '$city'";
            $result = $this->db->select($catCheck);
            if ($result == false) {
                $catInsert = "INSERT INTO shipping(city,shippingCost) VALUES('$city','$shippingCost')";
                $catQuery = $this->db->insert($catInsert);
                Session::set("shippinguccess", "shipping Inserted Successfully");
                header("Location : shipping.php");
            } else {
                $catMsg = "This shipping Already Created!";
                return $catMsg;
            }
        }
    }

    public function shippingList()
    {
        $catQuery = "SELECT * FROM shipping WHERE shippingStatus = '1' ORDER BY shippingId DESC ";
        $catSelect = $this->db->select($catQuery);
        return $catSelect;
    }

    public function getByID($shippingId)
    {
        $catCheck = "SELECT * FROM shipping WHERE shippingId = '$shippingId'";
        $result = $this->db->select($catCheck);
        $value = $result->fetch_assoc();
        return $value;
    }

    public function shippingUpdate($shippingId, $shippingCost, $city)
    {
        $shippingId = $this->fm->validation($shippingId);
        $shippingId = mysqli_real_escape_string($this->db->link, $shippingId);

        $city = $this->fm->validation($city);
        $city = mysqli_real_escape_string($this->db->link, $city);
        
        $shippingCost = $this->fm->validation($shippingCost);
        $shippingCost = mysqli_real_escape_string($this->db->link, $shippingCost);

        if (empty($city)) {
            $catMsg = "shippingName must not be empty!";
            return $catMsg;
        } else {
            $catUpdate = "UPDATE shipping SET city = '$city',shippingCost='$shippingCost' WHERE shippingId = $shippingId";
            $catQuery = $this->db->update($catUpdate);
            
            Session::set("shippingUpdated", "shipping Updated Successfully");
            header("Location : shippingUpdate.php?shippingId='$shippingId'");
        }
    }
    

    public function shippingTrash($shippingId)
    {
        $shippingId = $this->fm->validation($shippingId);
        $shippingId = mysqli_real_escape_string($this->db->link, $shippingId);

        if (empty($shippingId)) {
            $catMsg = "shippingId must not be empty!";
            return $catMsg;
        } else {
            $catTrash = "UPDATE shipping SET shippingStatus = '0' WHERE shippingId = '$shippingId'";
            $catTQuery = $this->db->update($catTrash);
            
            Session::set("shippingTrash", "shipping Trashed Successfully");
            header("Location : shipping.php");
        }
    }

    
    public function shippingTrashList()
    {
        $catQuery = "SELECT * FROM shipping WHERE shippingStatus = '0' ORDER BY shippingId DESC ";
        $catSelect = $this->db->select($catQuery);
        // $catList = $catSelect->fetch_assoc();
        return $catSelect;
    }

    public function shippingRestore($shippingId)
    {
        $shippingId = $this->fm->validation($shippingId);
        $shippingId = mysqli_real_escape_string($this->db->link, $shippingId);

        if (empty($shippingId)) {
            $catMsg = "shippingId must not be empty!";
            return $catMsg;
        } else {
            $catTrash = "UPDATE shipping SET shippingStatus = '1' WHERE shippingId = '$shippingId'";
            $catTQuery = $this->db->update($catTrash);
            
            Session::set("shippingRestore", "shipping Restored Successfully");
            header("Location : shippingTrash.php");
        }
    }
    
    public function shippingDelete($shippingId)
    {
        $shippingId = $this->fm->validation($shippingId);
        $shippingId = mysqli_real_escape_string($this->db->link, $shippingId);

        if (empty($shippingId)) {
            $catMsg = "shippingId must not be empty!";
            return $catMsg;
        } else {
            $catDelete = "DELETE FROM shipping WHERE shippingId = '$shippingId'";
            $catDQuery = $this->db->delete($catDelete);
            
            Session::set("shippingDelete", "shipping Deleted Successfully");
            header("Location : shippingTrash.php");
        }
    }
}
