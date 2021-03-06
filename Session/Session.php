<?php
declare(strict_types=1);
namespace Session;

class Session
{
    public static function init()
    {
        if(session_status() === PHP_SESSION_NONE ) {
            session_start();
        }
    }
    
    public static function add($key, $value)
    {
        $_SESSION[$key] = $value;
    } 
    
    public static function get($key)
    {
        if(in_array($key, $_SESSION)){
            return $_SESSION[$key];
        } else {
            return NULL;
        }
    } 
    
    public static function isAdmin()
    {
        if(self::get('role') > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function isConnect()
    {
        if(isset($_SESSION['Email'])){
            return true;
        } else {
            return false;
        }
    }
    
    public static function destroy()
    {
        session_unset();
        session_destroy();
    }
}