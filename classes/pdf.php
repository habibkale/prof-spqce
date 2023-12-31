<?php
require_once '../classes/db.php';

class pdf{
    public static function insert($img){
        $add=pdf::connect()->prepare("INSERT INTO courses (pdfFile) VALUES(?)");
        $add->execute(array($img));
    }

    public static function select(){
        $list=pdf::connect()->prepare("SELECT *FROM courses")
        $list->execute();
        $fetch=$list->fetchAll(PDO::FETCH_ASSOC);
        return $fetch;
    }
}

?>