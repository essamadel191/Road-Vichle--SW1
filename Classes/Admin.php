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
//include_once '../Classes/Email_Config.php';
class Admin extends User_parent{
    private $Admin_Queries;
    private $mechanic_state;
    function __construct() {
    $this->Admin_Queries=new Admin_Queries();
       
    }
    
     function AddAdmin($user){
        $result= $this->Admin_Queries->AddAdmin($user);
        $email=$user->get_email();
        SendEmail($email, "done", "working");
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
    
        
        
        public function search_users($username){
          
            $data= $this->Admin_Queries->Search_users($username);
            return $data;
            
        }
        
    
    }
 
