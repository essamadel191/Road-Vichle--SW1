<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author omar
 */

include_once '../Database/Admin_Queries.php';
include_once '../Classes/User_parent.php';
class Admin extends User_parent{
    private $Admin_Queries;
    private $mechanic_state;
    function __construct() {
    $this->Admin_Queries=new Admin_Queries();
       
    }
    function AddUser($user){
        $result= $this->Admin_Queries->addUser($user);
        $res=$this->Admin_Queries->insert_mechanic_into_mechanics_state_table($user);
        if($result&&$res)
            return TRUE;
        else
            return False;
    }
   
    public  function viewusers(){
        $data= array();
        $data=$this->Admin_Queries->ViewUsers();
        return $data;
    }
    function  view_mechanics(){
        $data=array();
        $data= $this->Admin_Queries->ViewMechanic();
        return $data;
    }
    
    public function view_feedback() {
       $data=array();
       $data=$this->Admin_Queries->View_feedback();
       return $data;
    }
    
    public function block_mechanic($user){
        $result=$this->Admin_Queries->Block_mechanic($user);
        if($result){
            return true;
        } else {
            return false;    
        }
    }
    public function allow_mechanics($user){
        $res=$this->Admin_Queries->Allow_mechanic($user);
        if($res){
            return TRUE;
        } else {
            return false;    
        }
    }
    
    
    
    }
$user=new User_parent($id="");
$user->set_fname("Ali");
$user->set_lname("Ashraf");
$user->set_email("Ali.com");
$user->set_password("0000");
$user->set_username("Ali90");
$user->set_user_type(2);       
$a=new Admin();
$r=$a->allow_mechanics($user);

if($r){
    echo 'ok';
}