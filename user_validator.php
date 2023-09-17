<?php

class UserValidator {

private $data;
private $errors = [];
private static $fiels = ['name', 'email'];

public function __construct ($post_data){
    $this->data = $post_data;

}

public function validateForm(){

    foreach(self::$fiels as $field){
      if(!array_key_exists($field , $this->data)){
        trigger_error("$field is not present in date");
        return;
    }   

}

    $this->validateUsername();
    $this->validateUsername();
    return $this->errors;
}


private function validateUsername(){

    $val  = trim($this->data['username']);
    if(empty($val)){
      $this->addError('Username' , 'username must not be empty');  
    } else {

        $pattern = '/^[a-zA-Z0-9]{6,12}$/';
        if( !preg_match($pattern, $val ) ){
           
            $this->addError('Username' , 'username must be at least 6 characters long');  

        }

    }


}

private function validateEmail(){

    $val  = trim($this->data['email']);
    if(empty($val)){
      $this->addError('email' , 'email must not be empty');  
    } else {

       
        if(!filter_var($val, FILTER_VALIDATE_EMAIL) ){
           
            $this->addError('email' , 'email must be at correct');  

        }

    }
}

private function addError($key,$val){

    $this->errors[$key] = $val;


}






}


?>