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
include_once '../Classes/Mechanics.php';
class Admin extends User_parent{
    private $Admin_Queries;
    private $mechanic_state;
    function __construct() {
    $this->Admin_Queries=new Admin_Queries();
       
    }
    function AddMechanics($user){
        $result= $this->Admin_Queries->addUser($user);
        $res=$this->Admin_Queries->insert_mechanic_into_mechanics_state_table($user);
        if($result&&$res)
            return TRUE;
        else
            return False;
    }
    
     function AddUser($user){
        $result= $this->Admin_Queries->addUser($user);
        
        if($result)
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
    
    public function block_mechanic($username){
        $result=$this->Admin_Queries->Block_mechanic($username);
        if($result){
            return true;
        } else {
            return false;    
        }
    }
    
    public function allow_mechanics($username){
        $res=$this->Admin_Queries->Allow_mechanic($username);
        if($res){
            return TRUE;
        } else {
            return false;    
        }
    }
    
    public function DeleteUser($query) {
            $result = $this->Admin_Queries->deleteUser($query);
            if ($result) {
            return TRUE;
        } else {
            return False;
        }

        }
        
        
        
        public function search_users($username){
          
            $data= $this->Admin_Queries->Search_users($username);
            return $data;
            
        }
        
    
    }


    
    $admin=new Admin();
//    $admin->set_fname("Diaa");
//    $admin->set_lname("Ahmed");
//    $admin->set_email("Diaa.com");
//    $admin->set_password("156");
//    $admin->set_username("DIAA");
//    $admin->set_user_type(3);
//    $admin->AddUser($admin);
////    $data=$admin->view_mechanics();
//    $data=$admin->viewusers();
//    $data=$admin->search_users("Omessi");
// $admin->DeleteUser("");
    
   
    var_dump($admin->view_feedback());