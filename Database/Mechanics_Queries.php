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
include_once '../Database/User_type_queries.php';
include_once '../mail/mail.php';
class Mechanics_Queries {
    private $type;
    private $Db;
    public function __construct() {
        $this->Db= Database::getInstance();
    }
   
     public function  AddMechanic($user){
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
    
    public function View_Request($user) {
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        $id=$r['id'];
        $q="SELECT staff.`id-user`, staff.request FROM users INNER JOIN staff ON users.id = 15 limit 1";
        $result= $this->Db->database_query($q);
        $query= $this->Db->database_all_assoc($result);
        return $query;
    }
    
    public function  Accept_request($user){
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        $query2="SELECT email  FROM users INNER JOIN staff ON users.id = staff.`id-user` limit 1";
        $R= $this->Db->get_row($query2);
        Accept_email($R['email']);
        if($r){
        $data=array();
        $data['state']=1;
        $q= $this->Db->update("staff", $data);
        $re= $this->Db->database_query($q);
        
        }
//        if($re){
//            return TRUE;
//        } else {
//            return false;
//        }
    }
    public function Rejected_Request($user){
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        if($r){
        $data= array();
        $data['state']=0;
        $q= $this->Db->update("staff",$data);
        $re= $this->Db->database_query($q);
        
        }
//        if($re){
//            return TRUE;
//        } else {
//            return FALSE;    
//        }
    }
    
    public function insert_mechanic_into_mechanics_state_table($user){
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        $data=array();
        $data['id_mechanic']=$r['id'];
        $data['username']=$username;
        $data['state']=1;
        $res= $this->Db->insert("mechanic_state", $data);
        $query= $this->Db->database_query($res);
        if($query){
            return true;
        } else {
            return false;    
        }
    }
    
    public function get_id_By_user_type($user){
        $user_type=$user->get_user_type();
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        return $r['id'];
    }
    
    
    public function insert_into_mech_location($user){
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        $data=array();
        $data['id_mec']=$r['id'];
        $data['Location']=$user->get_location();
        $res= $this->Db->insert("mec_location", $data);
        $query= $this->Db->database_query($res);
        if($query){
            return true;
        } else {
            return false;    
        }
    }
    
    
}
