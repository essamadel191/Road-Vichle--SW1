<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mechanics
 *
 * @author omar
 */
include_once '../Classes/User_parent.php';
include_once '../Database/Mechanics_Queries.php';
class Mechanics extends User_parent {
    private $Mechanics_queries;
    private $location;
    private $sendfeedback;
     public function set_location($location)
    {
        $this->location=$location;
    }
    public function get_location(){
        return $this->location;
    }
    public function set_sendfeedback($data){
        $this->sendfeedback=$data;
    }
    public function get_feedback(){
        return $this->sendfeedback;
    }
    public function __construct() {
        $this->Mechanics_queries=new Mechanics_Queries();
    }
    
    public function Send_feedback($id,$feedback){
        $r=$this->Mechanics_queries->Send_feedback($id, $feedback);
        if($r){
            return TRUE;
        }
        else
            return false;
    }
    // not finished yet
    public function view_request(){
        
        $result=$this->Mechanics_queries->View_Request();
        return $result;
    }
    public function Accept_request($user){
        $q=$this->Mechanics_queries->Accept_request($user);
        if($q){
            return True;
        } else {
            return FALSE;    
        }
    }
    public function Rejected_request($user){
        $q=$this->Mechanics_queries->Rejected_Request($user);
        if($q){
            return True;
        } else {
            return FALSE;    
        }
    }
    
       
     
          
    
    
    
}

$a=new Mechanics();

$a->Send_feedback(26, "holla Every one");
