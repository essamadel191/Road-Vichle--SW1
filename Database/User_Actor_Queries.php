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
        $this->Db= Database::getInstance();
    }
    
     public function  addUser($user){
     $data= array();
     $data['fname']=$user->get_name();
     $data['lname']=$user->get_lname();
     $data['email']=$user->get_email();
     $data['username']=$user->get_username();
     $data['password']=$user->get_pass();
     $data['user_type_id']=$user->get_user_type()->id;
     $result=$this->Db->insert('users', $data);
     if($result){
       return TRUE;
      }
     else{
       return False;
    }
}

   public function Send_feedback($user){
      $username=$user->get_username();
      $query="SELECT id FROM `users` where username='$username' limit 1";
      $r= $this->Db->get_row($query);
    $data=array(); 
    $data['users_id']=$r['id'];
    $data['Feedback']=$user->get_feedback();
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
    
    public function Send_Request($user,$mechanic){
       $username=$user->get_username();
       $username2=$mechanic->get_username();
       $query="SELECT id FROM `users` where username='$username' limit 1";
       $query2="SELECT id FROM `users` where username='$username2' limit 1";
       $r= $this->Db->get_row($query);
       $r2= $this->Db->get_row($query2);
       $data=array();
       $data['id-user']=$r['id'];
       $data['id-mechanic']=$r2['id'];
       $data['request']=$user->getRequest();
       $data['state']=0;
       $query= $this->Db->insert("staff",$data);
       $re= $this->Db->database_query($query);
       if($re){
           return TRUE;
       } else {
           return FALSE;    
       }
    }
    
    public function search_mechanics($location){
       
       $query="SELECT users.username, users.email FROM users INNER JOIN mec_location ON users.id = mec_location.id_mec limit 1";
       $result= $this->Db->database_query($query);
       $q= $this->Db->database_all_assoc($result);
        if (false === $q) {
          echo mysqli_error();
        }  
        
        return $q;
       
      
        
    }
    
    
    
}
