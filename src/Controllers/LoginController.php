<?php
declare(strict_types=1);
use App\Models\Request;
use App\Models\Formalities;
use Session\Session;

$runRequest = new Request();
$checkForm = new Formalities();
session::init();
//verify if our user already exist by checking his email

if(isset($_POST['form']) && $_POST['form'] === 'connexion') {
   
    $Email = $_POST['Email'];
    $countMail = $runRequest->verifyMail($Email);
    
    //if this email exist in our database then compare it with it's password
    if(!$countMail){
        $error = 'incorrect values';      
    } else {
        $user = $runRequest->findByMail($Email);
        $isConnect = password_verify($_POST['Password'], $user->Password);
    }
    if(isset($isConnect) && $isConnect) {
        
        Session::add('Last_Name', $user->Last_Name);
        Session::add('First_Name', $user->First_Name);
        Session::add('Email', $user->Email);
        Session::add('role', $user->role);
        
        header('Location: main?SearchBar=Recents');
    } else {
        $error = 'Authentication Failure';
    }
    
} else{
        
//check every information send
     if(isset($_POST['form'])) {
       
        $Last_Name = $_POST['Last_Name']; 
        $First_Name = $_POST['First_Name'];
        $Email = $_POST['Email']; 
        $Password = $_POST['Password'];
        $checkForm->countLength($Last_Name, 60);
        $checkForm->countLength($First_Name, 60);
        $checkForm->validMail($Email);
        $checkForm->countLength($Password, 12, 5);
        $isValid = $checkForm->getError();
     }
     if(isset($_POST['form'])) {
       
        $Email = $_POST['Email'];
        $countMail = $runRequest->verifyMail($Email);
    // die();
    //$countMail = int 1
    //$Email = guidoben@etc...;
    //if more than 1 results then exit will send a message
    //else isValid && $countMail < 1
        if($countMail > 0) {
            $error = 'This email is already taken';
           
        }else{
            if(isset($isValid) && $isValid) {
                $runRequest->insertUser($Last_Name, $First_Name, $Email, $Password);
                $info = 'Welcome aboard';
            } elseif (isset($isValid) && !$isValid) {
            
                $error = 'Field is incorrect';
            
            }
        }
    }
   
    
}


$_GET['connect'] = $_GET['connect'] ?? 'connexion';
   
require_once "../Views/Login.phtml";

   