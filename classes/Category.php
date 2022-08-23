<?php
include_once '../lib/database.php';
include_once '../lib/format.php';

class Category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function categoryAdd($categoryName)
    {
        $categoryName = $this->fm->validation($categoryName);

        $categoryName = mysqli_real_escape_string($this->db->link, $categoryName);

        if (empty($categoryName)) {
            $catMsg = "categoryName must not be empty!";
            return $catMsg;
        } else {
            $catCheck = "SELECT * FROM categories WHERE categoryName = '$categoryName'";
            $result = $this->db->select($catCheck);
            if ($result == false) {
                $catInsert = "INSERT INTO categories( categoryName) VALUES('$categoryName')";
                $catQuery = $this->db->insert($catInsert);
                Session::set("categorySuccess", "Category Inserted Successfully");
                header("Location : category.php");
            } else {
                $catMsg = "This Category Already Created!";
                return $catMsg;
            }
        }
    }

    public function categoryList()
    {
        $catQuery = "SELECT * FROM categories WHERE categoryStatus = '1' ORDER BY categoryId DESC ";
        $catSelect = $this->db->select($catQuery);
        // $catList = $catSelect->fetch_assoc();
        return $catSelect;
    }

    public function getByID($categoryId)
    {
        $catCheck = "SELECT * FROM categories WHERE categoryId = '$categoryId'";
        $result = $this->db->select($catCheck);
        $value = $result->fetch_assoc();
        return $value;
    }

    public function categoryUpdate($categoryId, $categoryName)
    {
        $categoryId = $this->fm->validation($categoryId);
        $categoryId = mysqli_real_escape_string($this->db->link, $categoryId);

        $categoryName = $this->fm->validation($categoryName);
        $categoryName = mysqli_real_escape_string($this->db->link, $categoryName);

        if (empty($categoryName)) {
            $catMsg = "categoryName must not be empty!";
            return $catMsg;
        } else {
            $catUpdate = "UPDATE categories SET categoryName = '$categoryName' WHERE categoryId = $categoryId";
            $catQuery = $this->db->update($catUpdate);
            
            Session::set("categoryUpdated", "Category Updated Successfully");
            header("Location : categoryUpdate.php?categoryId='$categoryId'");
        }
    }
    

    public function categoryTrash($categoryId)
    {
        $categoryId = $this->fm->validation($categoryId);
        $categoryId = mysqli_real_escape_string($this->db->link, $categoryId);

        if (empty($categoryId)) {
            $catMsg = "categoryId must not be empty!";
            return $catMsg;
        } else {
            $catTrash = "UPDATE categories SET categoryStatus = '0' WHERE categoryId = '$categoryId'";
            $catTQuery = $this->db->update($catTrash);
            
            Session::set("categoryTrash", "Category Trashed Successfully");
            header("Location : category.php");
        }
    }

    
    public function categoryTrashList()
    {
        $catQuery = "SELECT * FROM categories WHERE categoryStatus = '0' ORDER BY categoryId DESC ";
        $catSelect = $this->db->select($catQuery);
        // $catList = $catSelect->fetch_assoc();
        return $catSelect;
    }

    public function categoryRestore($categoryId)
    {
        $categoryId = $this->fm->validation($categoryId);
        $categoryId = mysqli_real_escape_string($this->db->link, $categoryId);

        if (empty($categoryId)) {
            $catMsg = "categoryId must not be empty!";
            return $catMsg;
        } else {
            $catTrash = "UPDATE categories SET categoryStatus = '1' WHERE categoryId = '$categoryId'";
            $catTQuery = $this->db->update($catTrash);
            
            Session::set("categoryRestore", "Category Restored Successfully");
            header("Location : categoryTrash.php");
        }
    }
    
    public function categoryDelete($categoryId)
    {
        $categoryId = $this->fm->validation($categoryId);
        $categoryId = mysqli_real_escape_string($this->db->link, $categoryId);

        if (empty($categoryId)) {
            $catMsg = "categoryId must not be empty!";
            return $catMsg;
        } else {
            $catDelete = "DELETE FROM categories WHERE categoryId = '$categoryId'";
            $catDQuery = $this->db->delete($catDelete);
            
            Session::set("categoryDelete", "Category Deleted Successfully");
            header("Location : categoryTrash.php");
        }
    }
}
