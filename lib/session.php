<?php
/**
 *Session Class
 **/
class Session
{
    public static function init()
    {
        session_start();
    }
    
    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSession()
    {
        self::init();
        if (self::get("adminLogin") == false) {
            self::destroy();
            header("Location:login.php");
        }
    }
    public static function checkLogin()
    {
        self::init();
        if (self::get("adminLogin") == true) {
            header("Location: dashboard.php");
        }
    }


    public static function checkUserSession()
    {
        if (self::get("userLogin") == false) {
            self::destroy();
            echo "<script>window.location = 'login.php';</script>";
        }
    }
    public static function checkUserLogin()
    {
        if (self::get("userLogin") == true) {
            echo "<script>window.location = 'index.php';</script>";
        }
    }
    public static function destroy()
    {
    }
}
