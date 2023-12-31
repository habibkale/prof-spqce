<?php

class Session{
    public static function exists($name) {
        if (is_array($name)) {
            foreach ($name as $sessionName) {
                if (!isset($_SESSION[$sessionName])) {
                    return false;
                }
            }
            return true;
        } else {
            return isset($_SESSION[$name]);
        }
    }

    public static function put($name, $value){
        return $_SESSION[$name] = $value;
    }

    public static function get($name) {
        if (is_array($name)) {
            $data = [];
            foreach ($name as $sessionName) {
                if (isset($_SESSION[$sessionName])) {
                    $data[$sessionName] = $_SESSION[$sessionName];
                }
            }
            return $data;
        } else {
            return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
        }
    }

    public static function delete($name){
        if(self::exists($name)){
            unset($_SESSION[$name]);
    }
    }

    public static function flash($name, $string = '') {
        if(self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
        return '';
    }
}

?>