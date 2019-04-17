<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author omar
 */
include_once '../Classes/Admin.php';
include_once '../Classes/Mechanics.php';
include_once '../Classes/User_parent.php';
include_once '../Database/User_Actor_Queries.php';
include_once '../mail/mail.php';
class User_Actor extends User_parent {
    private $request;
    private $User_Actot_queries;
    private $sendfeedback;

    
    public  function __construct() {
        $this->User_Actot_queries=new User_Actor_Queries();
     
}
    public function set_sendfeedback($data){
        $this->sendfeedback=$data;
    }
    public function get_feedback(){
        return $this->sendfeedback;
    }
    
    
     function AddUser($user){
        $result= $this->User_Actot_queries->addUser($user);
        SendEmail($user->get_email());
        if($result)
            return TRUE;
        else
            return False;
    }
    
    public function Send_feedback($user){
        $r=$this->User_Actot_queries->Send_feedback($user);
        if($r){
            return TRUE;
        }
        else
            return false;
    }
    
    function setRequest($request) {
        $this->request = $request;
    }

    function getRequest() {
        return $this->request;
    }
    public function sendRequest($user,$mechanic){
        $result= $this->User_Actot_queries->Send_Request($user, $mechanic);
        if($result){
            return true;
        } else {
            return false;    
        }
    }
    
    public function search_mechanic($location){
       
        $re=$this->User_Actot_queries->search_mechanics($location);
        return $re;
        
    }
    
}


//$user=new User_Actor();
////$user->set_sendfeedback("Weird");
//var_dump($user->search_mechanic("Giza"));