<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Queries
 *
 * @author omar
 */
include_once '../Database/DataBase.php';

class User_Queries {
    private $Db;
    public function __construct() {
        $this->Db=new Database();
    }
    
    public function get_users_by_username_password($username,$pass){
        $Query="SELECT * FROM `users` where username='$username' and password='$pass'";
        $get_data= $this->Db->get_row($Query);
        return $get_data;
    }
    public function get_users_by_id($id){
      $Query="SELECT * FROM `users` where id='$id'";
      $get_data= $this->Db->Clean($id);
      return $get_data;
    }
    
}
