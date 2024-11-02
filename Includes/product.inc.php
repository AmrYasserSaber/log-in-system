<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_name"])) {
        $product_name = $_POST["product_name"];
    }
    if (isset($_POST["Price"])) {
        $Price = $_POST["Price"];
    } else {
        $Price = 0;
    }
    if (isset($_POST["product_name"])) {
        $product_name = $_POST["product_name"];
    }
    if (!isset($_COOKIE["userName"])) {
        header("location: ../index.php");
    }
    if (!isset($_COOKIE["email"])) {
        header("location: ../index.php");
    }
    if (isset($_GET['functionality'])) {
        $functionality = $_GET['functionality'];
    } else {
        header("location: ../delete a product.php?error=No functionality");
    }
    $userName = $_COOKIE["userName"];
    $userEmail = $_COOKIE["email"];

    include "../Classes/db.classes.php";
    include "../Classes/product.classes.php";
    include "../Classes/product-controler.classes.php";

    $product = new CreateproductControler($product_name, $Price, $userName, $userEmail, $functionality);

    if ($functionality == "create") {
        $product->createProduct();
    } elseif ($functionality == "delete") {
        $product->deleteProduct();
    } elseif ($functionality == "get") {
        $product->getProduct();
    } elseif ($functionality == "update") {
        $product->updateProduct();
    }
}
