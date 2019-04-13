<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mechanics_Queries
 *
 * @author omar
 */
include_once '../Database/Database.php';

class Mechanics_Queries {
    private $Db;
    public function __construct() {
        $this->Db=new Database();
    }
   
    public function Send_feedback($id,$feedback){
     
    $data=array(); 
    $data['users_id']=$id;
    $data['Feedback']=$feedback;
     //$query="INSET into `staff` values($id,$feedback)";    
    $query= $this->Db->insert('feedback', $data);
    $result=$this->Db->database_query($query);
     if($result){
         return TRUE;
     }
     else
         {
         return FALSE;
     }     
    }
    
    public function View_Request() {
        
     
        $q="SELECT name_u, request from `request`";
        $result= $this->Db->database_query($q);
        $query= $this->Db->database_all_assoc($result);
        return $query;
    }
    
    public function  Accept_request($user){
        $data=array();
        $data['state']=1;
        $q= $this->Db->update("request", $data);
        $re= $this->Db->database_query($q);
        if($re){
            return TRUE;
        } else {
            return false;
        }
    }
    public function Rejected_Request($user){
        $data= array();
        $data['state']=0;
        $q= $this->Db->update("request",$data);
        $re= $this->Db->database_query($q);
        if($re){
            return TRUE;
        } else {
            return FALSE;    
        }
    }
    
    
    
}
