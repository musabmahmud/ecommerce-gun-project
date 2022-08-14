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
                header("Location : categoryAdd.php");
            } else {
                $catMsg = "This Category Already Added!";
                return $catMsg;
            }
        }
    }
}
