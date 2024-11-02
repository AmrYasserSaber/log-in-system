<?php

class CreateproductControler extends Product
{
    private $product_name;
    private $Price;
    private $userName;
    private $userEmail;

    public function __construct($product_name, $Price, $userName, $userEmail, $functionality)
    {
        $this->product_name = $product_name;
        $this->Price = $Price;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
    }
    public function createProduct()
    {
        if (!$this->emptyInput("create")) {
            header("location: ../create a product.php?error=empty input");
            exit();
        }
        if (!$this->invalidInput()) {
            header("location: ../create a product?error=invalid Input");
            exit();
        }
        if (!$this->invalidEmail()) {
            header("location: ../create a product?error=invalid Email");
            exit();
        }
        if (!$this->ProductCheck()) {
            header("location: ../create a product.php?error=product already exists");
            exit();
        }

        $this->setProduct($this->product_name, $this->Price, $this->userName, $this->userEmail);
    }
    public function deleteProduct()
    {
        if (!$this->emptyInput("delete")) {
            header("location: ../delete a product.php?error=empty input");
            exit();
        }
        if (!$this->invalidInput()) {
            header("location: ../delete a product.php?error=invalid Input");
            exit();
        }
        if ($this->ProductCheck()) {
            header("location: ../delete a product.php?error=product dosen't exist");
            exit();
        }
        $this->removeProduct($this->product_name, $this->userName, $this->userEmail);
    }
    public function getProduct()
    {
        if (!$this->emptyInput("get")) {
            header("location: ../get a product.php?error=empty input");
            exit();
        }
        if (!$this->invalidInput()) {
            header("location: ../get a product.php?error=invalid Input");
            exit();
        }
        if ($this->ProductCheck()) {
            header("location: ../get a product.php?error=product dosen't exist");
            exit();
        }
        $this->selectProduct($this->product_name, $this->userName, $this->userEmail);
    }
    public function updateProduct()
    {
        if (!$this->emptyInput("update")) {
            header("location: ../update a product.php?error=empty input");
            exit();
        }
        if (!$this->invalidInput()) {
            header("location: ../update a product.php?error=invalid Input");
            exit();
        }
        if (!$this->invalidEmail()) {
            header("location: ../update a product.php?error=invalid Email");
            exit();
        }
        if ($this->ProductCheck()) {
            header("location: ../update a product.php?error=product dosen't exist");
            exit();
        }
        $this->changeProduct($this->product_name, $this->Price, $this->userName, $this->userEmail);
    }
    private function emptyInput($functionality)
    {   
        if ($functionality == "create" || $functionality == "update") {
            if (empty($this->product_name) || empty($this->Price) || empty($this->userName) || empty($this->userEmail)) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        } elseif ($functionality == "delete" || $functionality == "get") {
            if (empty($this->product_name) || empty($this->userName) || empty($this->userEmail)) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        }
    }
    private function invalidInput()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->product_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail()
    {
        if (!filter_var($this->userEmail, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function ProductCheck()
    {
        if ($this->checkProductExistance($this->product_name, $this->userName, $this->userEmail)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
