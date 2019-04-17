<?php //

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
    function AddMechanics($user){
        $result= $this->Mechanics_queries->AddMechanic($user);
        $res=$this->Mechanics_queries->insert_mechanic_into_mechanics_state_table($user);
        $r=$this->Mechanics_queries->insert_into_mech_location($user);
        SendEmail($user->get_email());
        //SendEmail($user->get_email());
        //$email=$user->get_email();
       
        if($result&$res)
            return TRUE;
        else
            return False;
    }
    
    
    public function Send_feedback($user){
        $r=$this->Mechanics_queries->Send_feedback($user);
        if($r){
            return TRUE;
        }
        else
            return false;
    }
    // not finished yet
    public function view_request($user){
        
        $result=$this->Mechanics_queries->View_Request($user);
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
    
       
    
          
    
    public function get_id_BY_username($user){
        $r= $this->Mechanics_queries->get_id_By_user_type($user);
        return $r;
    }
    
}


//
//$mech=new Mechanics();
////$mech->set_lname("NONO");
////$mech->set_fname("KOKO");
////$mech->set_email("omessi18@gmail.com");
////$mech->set_password("149789");
//$mech->set_username("Ahmed80");
////$mech->set_user_type(2);
////$mech->AddMechanics($mech);
//$mech->Accept_request($mech);