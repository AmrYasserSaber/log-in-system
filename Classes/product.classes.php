<?php

/**
 * Summary of Product
 */
class Product extends Dbh
{
    private function getUserId($userName, $userEmail)
    {
        include "../Includes/config.inc.php";
        $statment = $this->connect($host, $db, $user, $password)->prepare('SELECT id FROM users WHERE name=:name AND users_email=:email ;');

        if (!$statment->execute([$userName, $userEmail])) {
            $statment = null;
            header("location: ../create a product.php?error=statment failed");
            exit();
        }
        $user = $statment->fetchAll(PDO::FETCH_ASSOC);
        $userid = $user[0]["id"];
        $statment = null;
        return $userid;
    }
    protected function setProduct($product_name, $Price, $userName, $userEmail)
    {
        $userid = $this->getUserId($userName, $userEmail);

        //create product 
        include "../Includes/config.inc.php";

        $statment = $this->connect($host, $db, $user, $password)->prepare('INSERT INTO Products (user_ID, Product_Name, Price) VALUES (:user_ID, :Product_Name, :Price);');

        if (!$statment->execute([$userid, $product_name, $Price])) {
            $statment = null;
            header("location: ../create a product.php?error=statment failed");
            exit();
        }
        header("location: ../create a product.php?result=Created product successfully");
    }
    protected function removeProduct($product_name, $userName, $userEmail)
    {
        $userid = $this->getUserId($userName, $userEmail);

        //delete product 
        include "../Includes/config.inc.php";

        $statment = $this->connect($host, $db, $user, $password)->prepare('DELETE FROM Products WHERE  user_ID=:user_ID AND Product_Name=:Product_Name ;');

        if (!$statment->execute([$userid, $product_name])) {
            $statment = null;
            header("location: ../delete a product.php?error=statment failed");
            exit();
        }
        header("location: ../delete a product.php?result=Deleted product successfully");
    }
    protected function selectProduct($product_name, $userName, $userEmail)
    {
        $userid = $this->getUserId($userName, $userEmail);

        //delete product 
        include "../Includes/config.inc.php";

        $statment = $this->connect($host, $db, $user, $password)->prepare('SELECT product_name , price FROM Products WHERE  user_ID=:user_ID AND Product_Name=:Product_Name ;');

        if (!$statment->execute([$userid, $product_name])) {
            $statment = null;
            header("location: ../delete a product.php?error=statment failed");
            exit();
        }
        $Price = $statment->fetchAll(PDO::FETCH_ASSOC);
        $result = "You selected $product_name and it's price is " . $Price[0]["price"];
        header("location: ../get a product.php?result= $result");
    }
    protected function changeProduct($product_name, $Price, $userName, $userEmail)
    {
        $userid = $this->getUserId($userName, $userEmail);

        //create product 
        include "../Includes/config.inc.php";

        $statment = $this->connect($host, $db, $user, $password)->prepare('UPDATE Products SET price=:price  WHERE product_name=:product_name AND user_id=:user_id;');

        if (!$statment->execute([$Price, $product_name,$userid ])) {
            $statment = null;
            header("location: ../update a product.php?error=statment failed");
            exit();
        }   
        $result="updated $product_name successfully and it's new value is $Price";
        header("location: ../update a product.php?result=$result ");
    }

    protected function checkProductExistance($product_name, $userName, $userEmail)
    {
        $userid = $this->getUserId($userName, $userEmail);
        include "../Includes/config.inc.php";
        $pdo = $this->connect($host, $db, $user, $password);
        $statment = $pdo->prepare("SELECT Product_ID FROM Products WHERE Product_Name = :Product_Name AND user_id = :user_id ;");
        if (!$statment->execute([$product_name, $userid])) {
            $statment = null;
            header("location: ../create a product.php?error=statment failed");
            exit();
        }
        if ($statment->rowCount() > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}
