<?php 

Class LoginControler extends Login {
    private $userName;
    private $password0 ;

    public function __construct($userName,$password0){
        $this->userName=$userName;
        $this->password0=$password0;
    }
    public function loginUser(){
        if(!$this->emptyInput()){
            header("location: ../index.php?error=empty input");
            exit();
        }
        
        
        $this->getUser($this->userName,$this->password0);
        
        
    }

    private function emptyInput(){
        if(empty($this->userName)||empty($this->password0)){
            $result= false;
        }else {
            $result=true;
        }
        return $result;
    }
}