<?php 

Class SignupControler extends Signup {
    private $userName;
    private $email;
    private $password0 ;
    private $passwordRepeat;

    public function __construct($userName,$email,$password0,$passwordRepeat){
        $this->userName=$userName;
        $this->email=$email;
        $this->password0=$password0;
        $this->passwordRepeat=$passwordRepeat;
    }
    public function signupUser(){
        if(!$this->emptyInput()){
            header("location: ../signup.php?error=empty input");
            exit();
        }
        if(!$this->invalidInput()){
            header("location: ../signup.php?error=invalid Input");
            exit();
        }
        if(!$this->invalidEmail()){
            header("location: ../signup.php?error=invalid Email");
            exit();
        }
        if(!$this->passwordMatch()){
            header("location: ../signup.php?error=password dosn't match");
            exit();
        }
        if(!$this->userNameCheck()){
            header("location: ../signup.php?error=user already exists");
            exit();
        }
        
        $this->setUser($this->userName,$this->password0,$this->email);
        
    }

    private function emptyInput(){
        if(empty($this->userName)||empty($this->email)||empty($this->password0)||empty($this->passwordRepeat)){
            $result= false;
        }else {
            $result=true;
        }
        return $result;
    }
    private function invalidInput(){
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->userName)){
            $result= false;
        }else {
            $result=true;
        }
        return $result;
    }
    private function invalidEmail(){
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result= false;
        }else {
            $result=true;
        }
        return $result;
    }
    private function passwordMatch(){
        if($this->password0==$this->passwordRepeat){
            $result= true;
        }else {
            $result=false;
        }
        return $result;
    }
    private function userNameCheck(){
        if(!$this->checkUserExistance($this->userName,$this->email)){
            $result= false;
        }else {
            $result=true;
        }
        return $result;
    }
}