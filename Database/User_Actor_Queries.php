<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Actor_Queries
 *
 * @author omar
 */
include_once '../Database/Database.php';
class User_Actor_Queries {
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
         return FALSE;}     
    }
    
    public function Send_Request($user,$mechanic){
       $a=$user->get_username();
       $b=$mechanic->get_username();
       $data=array();
       $data['name_u']=$a;
       $data['name_m']=$b;
       $data['request']=$user->getRequest();
       $query= $this->Db->insert("request",$data);
       $re= $this->Db->database_query($query);
       if($re){
           return TRUE;
       } else {
           return FALSE;    
       }
    }
    
    public function search_mechanics($location){
       
       $query="SELECT * FROM mec_location WHERE Location='$location' limit 1";
       $result= $this->Db->database_query($query);
       $q= $this->Db->database_all_assoc($result);
        if (false === $q) {
          echo mysqli_error();
        }  
        
        return $q;
       
      
        
    }
    
    
    
}
