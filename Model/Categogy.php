<?php

include_once '../Model/MySQLUtils.php';
class Categogy{
    public function selectData(){
        $mySQLCon = new MySQLUtils();
        $mySQLCon->connect();
        $sql = "SELECT * from categorys";
        $select = $mySQLCon->getAllData($sql);
        return $select;
    }
}
?>