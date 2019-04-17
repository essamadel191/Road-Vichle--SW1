<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_type_queries
 *
 * @author omar
 */

include_once '../Database/Database.php';

class User_type_queries {
    private $Db;
    public function __construct() {
        $this->Db= Database::getInstance(); 
    }
    public function  get_user_by_id($id){
        $Query="SELECT * FROM `user_tpe`  where type_id=$id";
        $type_data= $this->Db->get_row($Query);
        return $type_data;
    }
}
