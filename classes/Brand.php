<?php
include_once '../lib/database.php';
include_once '../lib/format.php';

class Brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function brandAdd($brandName)
    {
        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName);

        if (empty($brandName)) {
            $catMsg = "brandName must not be empty!";
            return $catMsg;
        } else {
            $catCheck = "SELECT * FROM brands WHERE brandName = '$brandName'";
            $result = $this->db->select($catCheck);
            if ($result == false) {
                $catInsert = "INSERT INTO brands( brandName) VALUES('$brandName')";
                $catQuery = $this->db->insert($catInsert);
                Session::set("brandSuccess", "brand Inserted Successfully");
                header("Location : brand.php");
            } else {
                $catMsg = "This brand Already Created!";
                return $catMsg;
            }
        }
    }

    public function brandList()
    {
        $catQuery = "SELECT * FROM brands WHERE brandStatus = '1' ORDER BY brandId DESC ";
        $catSelect = $this->db->select($catQuery);
        // $catList = $catSelect->fetch_assoc();
        return $catSelect;
    }

    public function getByID($brandId)
    {
        $catCheck = "SELECT * FROM brands WHERE brandId = '$brandId'";
        $result = $this->db->select($catCheck);
        $value = $result->fetch_assoc();
        return $value;
    }

    public function brandUpdate($brandId, $brandName)
    {
        $brandId = $this->fm->validation($brandId);
        $brandId = mysqli_real_escape_string($this->db->link, $brandId);

        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);

        if (empty($brandName)) {
            $catMsg = "brandName must not be empty!";
            return $catMsg;
        } else {
            $catUpdate = "UPDATE brands SET brandName = '$brandName' WHERE brandId = $brandId";
            $catQuery = $this->db->update($catUpdate);
            
            Session::set("brandUpdated", "brand Updated Successfully");
            header("Location : brandUpdate.php?brandId='$brandId'");
        }
    }
    

    public function brandTrash($brandId)
    {
        $brandId = $this->fm->validation($brandId);
        $brandId = mysqli_real_escape_string($this->db->link, $brandId);

        if (empty($brandId)) {
            $catMsg = "brandId must not be empty!";
            return $catMsg;
        } else {
            $catTrash = "UPDATE brands SET brandStatus = '0' WHERE brandId = '$brandId'";
            $catTQuery = $this->db->update($catTrash);
            
            Session::set("brandTrash", "brand Trashed Successfully");
            header("Location : brand.php");
        }
    }

    
    public function brandTrashList()
    {
        $catQuery = "SELECT * FROM brands WHERE brandStatus = '0' ORDER BY brandId DESC ";
        $catSelect = $this->db->select($catQuery);
        // $catList = $catSelect->fetch_assoc();
        return $catSelect;
    }

    public function brandRestore($brandId)
    {
        $brandId = $this->fm->validation($brandId);
        $brandId = mysqli_real_escape_string($this->db->link, $brandId);

        if (empty($brandId)) {
            $catMsg = "brandId must not be empty!";
            return $catMsg;
        } else {
            $catTrash = "UPDATE brands SET brandStatus = '1' WHERE brandId = '$brandId'";
            $catTQuery = $this->db->update($catTrash);
            
            Session::set("brandRestore", "brand Restored Successfully");
            header("Location : brandTrash.php");
        }
    }
    
    public function brandDelete($brandId)
    {
        $brandId = $this->fm->validation($brandId);
        $brandId = mysqli_real_escape_string($this->db->link, $brandId);

        if (empty($brandId)) {
            $catMsg = "brandId must not be empty!";
            return $catMsg;
        } else {
            $catDelete = "DELETE FROM brands WHERE brandId = '$brandId'";
            $catDQuery = $this->db->delete($catDelete);
            
            Session::set("brandDelete", "brand Deleted Successfully");
            header("Location : brandTrash.php");
        }
    }
}
