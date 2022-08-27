<?php
include_once '../lib/database.php';
include_once '../lib/format.php';
class Cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addToCart($data)
    {
        $sId = $this->fm->validation($data['sId']);
        $sId = mysqli_real_escape_string($this->db->link, $sId);

        $productId = $this->fm->validation($data['productId']);
        $productId = mysqli_real_escape_string($this->db->link, $productId);

        $quantity = $this->fm->validation($data['quantity']);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);

        $slug = $this->fm->validation($data['slug']);

        if (empty($sId) || empty($productId) || empty($quantity) || $quantity <= 0) {
            $cartMsg = "value must not be 0!";
            return $cartMsg;
        } else {
            $cartCheck = "SELECT * FROM carts WHERE productId = $productId AND sId='$sId'";
            $result = $this->db->select($cartCheck);
            if ($result == false) {
                $cartInsert = "INSERT INTO carts( sId, productId, quantity ) VALUES('$sId', '$productId', '$quantity')";
                $cartQuery = $this->db->insert($cartInsert);
                echo "<script>window.location = 'cart.php?product-name=$slug';</script>";
            } else {
                $fetchData = $result->fetch_assoc();
                if ($quantity == 1) {
                    $Uquantity = $fetchData['quantity'] + 1;
                    $cartUpdate = "UPDATE carts SET quantity = '$Uquantity' WHERE sId='$sId' AND productId='$productId'";
                    $cartUQuery = $this->db->update($cartUpdate);
                    echo "<script>window.location = 'cart.php?product-name=$slug';</script>";
                } else {
                    $cartQUpdate = "UPDATE carts SET quantity = '$quantity' WHERE sId='$sId' AND productId='$productId'";
                    $cartQQuery = $this->db->update($cartQUpdate);
                    echo "<script>window.location = 'cart.php?product-name=$slug';</script>";
                }
            }
        }
    }

    public function getCart($sId)
    {
        $cartQuery = "SELECT carts.*, products.* FROM carts
        INNER JOIN products ON carts.productId = products.productId
        WHERE sId = '$sId' ORDER BY products.productName ASC";
        $pdSelect = $this->db->select($cartQuery);
        return $pdSelect;
    }
    public function deleteCart($data)
    {
        $cartId = $this->fm->validation($data['cartId']);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);

        $delCart = "DELETE FROM carts where cartId = '$cartId'";
        $delQuery = $this->db->delete($delCart);
        Session::set("cartDelSuccess", "Cart Product Deleted Successfully");
        return $delQuery;
    }

    public function updateCart($data)
    {
        $cartId = $this->fm->validation($data['cartId']);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);

        $quantity = $this->fm->validation($data['quantity']);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);

        $cartQUpdate = "UPDATE carts SET quantity = '$quantity' WHERE cartId='$cartId'";
        $cartQQuery = $this->db->update($cartQUpdate);
        Session::set("cartUpSuccess", "Cart Product Updated Successfully");
        echo "<script>window.location = 'cart.php';</script>";
    }

    public function emptyCart()
    {
        $delCart = "TRUNCATE TABLE carts";
        $delQuery = $this->db->delete($delCart);
        Session::set("cartEmpty", "Cart Empty Successfully");
        echo "<script>window.location = 'cart.php';</script>";
    }
}
