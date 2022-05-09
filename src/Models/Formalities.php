<?php
declare(strict_types=1);
namespace App\Models;

class Formalities
{
    
    private $error;
//   private $errorMail;
   
    public function __construct(){
        $this->error = [];
        // $this->errorMail =[];
    }
    
    public function validMail(string $mailValue): void
    {
            // filter_var — Filter a variable with the predefined "FILTER_VALIDATE_EMAIL" :-)
        if(!filter_var($mailValue, FILTER_VALIDATE_EMAIL)){
            array_push($this->error, $mailValue);
            // return filtred datas or false if failed
        }
    }
    // public function compareMail(string $mailExist, string $new_Mail_Value){
    //     //just to make sure we won't have 2 identicals emails
    //     if($new_Mail_Value === $mailExist){
    //         array_push($this->errorMail, $mailExist);
    //     }
    // }
    public function countLength(string $value, int $max, int $min = 1): void
    {
        if(strlen($value) < $min || strlen($value) > $max ){
            array_push($this->error, $value);
        }
    }
    
    // public function confirmPass(string $original, string $confirm): void
    // {
    //     if($original !== $confirm){
    //         array_push($this->error, $confirm);
    //     }
    // }
    
    public function getError(): bool
    {
        $isValid = true;
        if(!empty($this->error)) {
            $isValid = false;
        } 
        return $isValid;
    }
}
