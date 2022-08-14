<?php include '../lib/session.php';
Session::checkLogin();
include_once '../lib/database.php';
include_once '../lib/format.php';
?>

<?php
class AdminLogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminLogin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminUser)) {
            $loginMsg = "username must not be empty!";
            return $loginMsg;
        } else if (empty($adminPass)) {
            $loginMsg = "password must not be empty!";
            return $loginMsg;
        } else {
            $query = "SELECT * FROM adminuser WHERE adminUser = '$adminUser' OR adminEmail = '$adminUser' AND adminPass = '$adminPass'";
            $result = $this->db->select($query);
            if ($result != false) {
                $output = $result->fetch_assoc();
                Session::set("adminLogin", true);
                Session::set("adminId", $output['adminId']);
                Session::set("adminName", $output['adminName']);
                Session::set("adminUser", $output['adminUser']);
                Session::set("adminEmail", $output['adminEmail']);
                Session::set("adminPass", $output['adminPass']);
                header("Location: dashboard.php");
            } else {
                $loginMsg = "username or password wrong!";
                return $loginMsg;
            }
        }
    }
}

?>