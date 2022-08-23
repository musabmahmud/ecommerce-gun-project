<?php
include_once '../lib/database.php';
include_once '../lib/format.php';

class Product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function productCreate($data, $files)
    {
        $productName = $this->fm->validation($data['productName']);
        $productName = mysqli_real_escape_string($this->db->link, $productName);

        $productCode = $this->fm->validation($data['productCode']);
        $productCode = mysqli_real_escape_string($this->db->link, $productCode);

        $productInStock = $this->fm->validation($data['productInStock']);
        $productInStock = mysqli_real_escape_string($this->db->link, $productInStock);

        $categoryId = $this->fm->validation($data['categoryId']);
        $categoryId = mysqli_real_escape_string($this->db->link, $categoryId);

        $brandId = $this->fm->validation($data['brandId']);
        $brandId = mysqli_real_escape_string($this->db->link, $brandId);

        $productPrice = $this->fm->validation($data['productPrice']);
        $productPrice = mysqli_real_escape_string($this->db->link, $productPrice);

        $productOfferPrice = $this->fm->validation($data['productOfferPrice']);
        $productOfferPrice = mysqli_real_escape_string($this->db->link, $productOfferPrice);

        $productShortDes = $this->fm->validation($data['productShortDes']);
        $productShortDes = mysqli_real_escape_string($this->db->link, $productShortDes);

        $productLongDes = $this->fm->validation($data['productLongDes']);
        $productLongDes = mysqli_real_escape_string($this->db->link, $productLongDes);

        $slug = $this->fm->slug($productName);

        if (empty($productName) || empty($productCode) || empty($productInStock) || empty($categoryId) || empty($brandId) || empty($productPrice) || empty($productOfferPrice) || empty($productShortDes) || empty($productLongDes)) {
            $pdMsg = "Field Must must not be empty!";
            return $pdMsg;
        } else {
            $pdCheck = "SELECT * FROM products WHERE productCode = '$productCode' AND slug = '$slug'";
            $result = $this->db->select($pdCheck);

            if ($result == false) {
                $allow_format = array('jpg', 'jpeg', 'png', 'gif');

                $file_name = $files['productImage']['name'];
                $file_size = $_FILES['productImage']['size'];
                $file_temp = $_FILES['productImage']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));

                if (in_array($file_ext, $allow_format) && $file_size < 500000000) {

                    $unique_image = $productCode . '-' . date("d-m-y") . '-' . substr(md5(10), 0, 10) . '.' . $file_ext;
                    $uploded_image = "../frontend/assets/images/products/" . $unique_image;

                    $pdInsert = "INSERT INTO products(productName,slug,productCode,productInStock,categoryId,brandId,
                    productImage,
                    productPrice,
                    productOfferPrice,
                    productShortDes,
                    productLongDes) 
                    VALUES('$productName',
                    '$slug',
                    '$productCode',
                    '$productInStock',
                    '$categoryId',
                    '$brandId',
                    '$unique_image',
                    '$productPrice',
                    '$productOfferPrice',
                    '$productShortDes',
                    '$productLongDes'
                )";
                    $pdQuery = $this->db->insert($pdInsert);
                    move_uploaded_file($file_temp, $uploded_image);

                    Session::set("productSuccess", "Product Inserted Successfully");
                    header("Location : productCreate.php");
                } else {
                    $pdMsg = "Image Format or Size Doesn't Match!";
                    return $pdMsg;
                }
            } else {
                $pdMsg = "This Product Code Already Created!";
                return $pdMsg;
            }
        }
    }

    public function productList()
    {
        $pdQuery = "SELECT products.*, categories.categoryName, brands.brandName FROM products
        INNER JOIN categories ON products.categoryId = categories.categoryId
        INNER JOIN brands ON products.brandId = brands.brandId
        WHERE productStatus = '1' ORDER BY productId DESC";
        $pdSelect = $this->db->select($pdQuery);
        return $pdSelect;
    }

    public function getProductInfo($id)
    {
        $productId = $this->fm->validation($id);
        $productId = mysqli_real_escape_string($this->db->link, $productId);

        $pdValue = "SELECT * FROM products WHERE productId = $productId";
        $result = $this->db->select($pdValue);
        $value = $result->fetch_assoc();
        return $value;
    }

    public function productUpdate($data, $files)
    {
        $productId = $this->fm->validation($data['productId']);
        $productId = mysqli_real_escape_string($this->db->link, $productId);

        $productName = $this->fm->validation($data['productName']);
        $productName = mysqli_real_escape_string($this->db->link, $productName);

        $productCode = $this->fm->validation($data['productCode']);
        $productCode = mysqli_real_escape_string($this->db->link, $productCode);

        $productInStock = $this->fm->validation($data['productInStock']);
        $productInStock = mysqli_real_escape_string($this->db->link, $productInStock);

        $categoryId = $this->fm->validation($data['categoryId']);
        $categoryId = mysqli_real_escape_string($this->db->link, $categoryId);

        $brandId = $this->fm->validation($data['brandId']);
        $brandId = mysqli_real_escape_string($this->db->link, $brandId);

        $productPrice = $this->fm->validation($data['productPrice']);
        $productPrice = mysqli_real_escape_string($this->db->link, $productPrice);

        $productOfferPrice = $this->fm->validation($data['productOfferPrice']);
        $productOfferPrice = mysqli_real_escape_string($this->db->link, $productOfferPrice);

        $productShortDes = $this->fm->validation($data['productShortDes']);
        $productShortDes = mysqli_real_escape_string($this->db->link, $productShortDes);

        $productLongDes = $this->fm->validation($data['productLongDes']);
        $productLongDes = mysqli_real_escape_string($this->db->link, $productLongDes);

        $slug = $this->fm->slug($productName);

        if (empty($productName) || empty($productCode) || empty($productInStock) || empty($categoryId) || empty($brandId) || empty($productPrice) || empty($productOfferPrice) || empty($productShortDes) || empty($productLongDes)) {
            $pdMsg = "Field Must must not be empty!";
            return $pdMsg;
        } else {
            $pdUpdate = "UPDATE products SET productName = '$productName', 
                slug = '$slug',
                productCode = '$productCode',
                productInStock = '$productInStock',
                categoryId = '$categoryId',
                brandId = '$brandId',
                productPrice = '$productPrice',
                productOfferPrice = '$productOfferPrice',
                productShortDes = '$productShortDes',
                productLongDes = '$productLongDes' WHERE productId = $productId";
            $pdQuery = $this->db->update($pdUpdate);

            $file_name = $files['productImage']['name'];
            $file_size = $_FILES['productImage']['size'];
            $file_temp = $_FILES['productImage']['tmp_name'];

            if (!empty($file_name)) {
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));

                $allow_format = array('jpg', 'jpeg', 'png', 'gif');

                if (in_array($file_ext, $allow_format) && $file_size < 500000000) {
                    $unique_image = $productCode . '-' . date("d-m-y") . '-' . substr(md5(10), 0, 10) . '.' . $file_ext;
                    $uploded_image = "../frontend/assets/images/products/" . $unique_image;

                    $imageUpdate = "UPDATE products SET productImage = '$unique_image' WHERE productId = '$productId'";
                    $imageUpdateQuery = $this->db->update($imageUpdate);

                    move_uploaded_file($file_temp, $uploded_image);
                } else {
                    $pdMsg = "Image Format or Size Doesn't Match!";
                    return $pdMsg;
                }
            }
            Session::set("productUpdate", "Product Updated Successfully");
            header("Location: productUpdate.php?productId=" . $productId);
        }
    }

    public function productTrash($productId)
    {
        $productId = $this->fm->validation($productId);
        $productId = mysqli_real_escape_string($this->db->link, $productId);

        if (empty($productId)) {
            $pdMsg = "product Id must not be empty!";
            return $pdMsg;
        } else {
            $pdTrash = "UPDATE products SET productStatus = '0' WHERE productId = '$productId'";
            $pdTQuery = $this->db->update($pdTrash);
            Session::set("productTrash", "Products Trashed Successfully");
            header("Location : product.php");
        }
    }

    public function productTrashList()
    {
        $pdQuery = "SELECT products.*, categories.categoryName, brands.brandName FROM products
        INNER JOIN categories ON products.categoryId = categories.categoryId
        INNER JOIN brands ON products.brandId = brands.brandId
        WHERE productStatus = '0' ORDER BY productId DESC";
        $pdSelect = $this->db->select($pdQuery);
        return $pdSelect;
    }

    public function productRecover($productId)
    {
        $productRecover = "UPDATE products SET productStatus = '1' WHERE productId = '$productId'";
        $productRecoverQuery = $this->db->update($productRecover);
        $pdMsg = "Product Recover Successfully!";
        return $pdMsg;
    }
    public function productDelete($productId)
    {
        $pdDSearch = "SELECT * FROM products WHERE productId = '$productId'";
        $pdQSelect = $this->db->select($pdDSearch);
        $featchData = $pdQSelect->fetch_assoc();
        if ($featchData) {
            $delQuery = "DELETE FROM products WHERE productId = '$productId'";
            $deleteQS = $this->db->delete($delQuery);
            $delete_image = "../frontend/assets/images/products/" . $featchData['productImage'];
            unlink($delete_image);
            $pdMsg = "Product Deleted Successfully!";
            return $pdMsg;
        }
    }
}
