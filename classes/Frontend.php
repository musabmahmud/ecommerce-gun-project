<?php
include_once '../lib/database.php';
include_once '../lib/format.php';

class Frontend
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    //slider
    public function getSlider()
    {
        $sliderQuery = "SELECT * FROM products WHERE productStatus = '1' AND productInfo = '2' ORDER BY productId DESC LIMIT 4";
        $sliderResult = $this->db->select($sliderQuery);
        return $sliderResult;
    }
    // category 
    public function getSliderPdt()
    {
        $sliderQuery = "SELECT * FROM products WHERE productStatus = '1' AND productInfo = '0' ORDER BY productId DESC LIMIT 10";
        $sliderResult = $this->db->select($sliderQuery);
        return $sliderResult;
    }
    public function getCat()
    {
        // $catQuery = "SELECT *, count( products.categoryId ) as productCount FROM categories LEFT JOIN products ON categories.categoryId = products.categoryId WHERE categoryStatus = 1 GROUP BY products.categoryId  ORDER BY categoryName ASC";
        $catQuery = "SELECT categories.*, count( products.categoryId ) as productCount FROM categories INNER JOIN products ON categories.categoryId = products.categoryId WHERE categoryStatus = 1 GROUP BY categories.categoryId  ORDER BY categoryName ASC";
        $catResult = $this->db->select($catQuery);
        return $catResult;
    }
    // brand 
    public function getBrand()
    {
        $brandQuery = "SELECT *, count( products.brandId ) productCount FROM brands INNER JOIN products ON brands.brandId = products.brandId WHERE brandStatus = 1 GROUP BY brands.brandId  ORDER BY brandName ASC";
        $brandResult = $this->db->select($brandQuery);
        return $brandResult;
    }
    // shop products
    public function shopProduct($start_from, $per_page)
    {
        $sliderQuery = "SELECT * FROM products LIMIT $start_from, $per_page";
        $sliderResult = $this->db->select($sliderQuery);
        return $sliderResult;
    }

    public function paginationshop()
    {
        $query = "SELECT * FROM products WHERE productStatus = '1'";
        $result = $this->db->select($query);
        $value = mysqli_num_rows($result);
        return $value;
    }
    public function getProductsByCat($start_from, $per_page, $catId)
    {
        $sliderQuery = "SELECT * FROM products WHERE categoryId = $catId LIMIT $start_from, $per_page";
        $sliderResult = $this->db->select($sliderQuery);
        return $sliderResult;
    }

    public function paginationshopbyCategory($catId)
    {
        $query = "SELECT * FROM products WHERE productStatus = '1' and categoryId = '$catId'";
        $result = $this->db->select($query);
        $value = mysqli_num_rows($result);
        return $value;
    }

    public function productDetails($slug)
    {
        $singleQuery = "SELECT * FROM products WHERE productStatus = '1' AND slug ='$slug' LIMIT 1";
        $singleResult = $this->db->select($singleQuery);
        $singleOutput = $singleResult->fetch_assoc();
        return $singleOutput;
    }
}
