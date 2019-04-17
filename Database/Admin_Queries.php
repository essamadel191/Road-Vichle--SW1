<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Queries
 *
 * @author omar
 */

include '../Database/Database.php';
class Admin_Queries {
    private  $Db;
     function __construct(){
       $this->Db= Database::getInstance();
    }
   
    
   
    
    public function  AddAdmin($user){
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
    }}
    public function ViewUsers(){
        $query="SELECT * from `users` where user_type_id= 3 ";
       $result= $this->Db->database_query($query);
      $q= $this->Db->database_all_assoc($result);
       if($q){
           return $q;
    } else {
        return FALSE;
    }
    }

    public function ViewMechanic(){
    $query="SELECT * from `users` where user_type_id= 2";
    $result= $this->Db->database_query($query);
    $q= $this->Db->database_all_assoc($result);
    if($q){
        return $q;
    } else {
        return false;    
    }
    
    }

    public function View_feedback(){
     $query="SELECT users.username, feedback.Feedback FROM users INNER JOIN feedback ON users.id = feedback.users_id ";
     $result= $this->Db->database_query($query);
     $re= $this->Db->database_all_assoc($result);
     if($re){
     return $re;
    } 
     else
     return false; 
    } 

    public function Block_mechanic($username){
    $query="UPDATE mechanic_state SET state = 0 WHERE username ='$username' limit 1";
    $r= $this->Db->database_query($query);
    if($r){
        return True;
    } else {
        return FALSE;    
    }
    }


    public function Allow_mechanic($username){
     $query="UPDATE mechanic_state SET state = 1 WHERE username ='$username' limit 1";
     $result= $this->Db->database_query($query);
     if($result){
        return true;
     }else
        return false;
    }

    
    
    public function Search_users($username){
        
       $query="SELECT username,email,fname,lname from users where username='$username' limit 1";
       $result= $this->Db->database_query($query);
        $q= $this->Db->database_all_assoc($result);
        if (false === $q) {
          echo mysqli_error();
        }  
        
        return $q;
       
    }
    
    
    
    
}
    