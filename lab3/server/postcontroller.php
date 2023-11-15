<?php
include "./product.php";
if (isset($_POST['createPost'])) {
    createPost();
}
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    deletePost();
}
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    editPost();
}
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    createPost();
}

function createPost()
{
    if (!isset($_POST['productName']) || !isset($_POST['salePrice']) || !isset($_POST['categoryName']) || !isset($_POST['imageLink']) || !isset($_POST['productLink'])) {
        header('location:managepost.php');
        return;
    }

    $newProduct = new post();
    $newProduct->productName = $_POST['productName'];
    $newProduct->salePrice = $_POST['salePrice'];
    $newProduct->categoryName = $_POST['categoryName'];
    $newProduct->imageLink = $_POST['imageLink'];
    $newProduct->productLink = $_POST['productLink'];

    $con = require('./db/dbConfig.php');

    $con->query("INSERT INTO `product`(`ProductName`, `SalePrice`, `CategoryName`, `ImageLink`, `ProductLink`) VALUES ('$newProduct->productName','$newProduct->salePrice','$newProduct->categoryName','$newProduct->imageLink','$newProduct->productLink')");

    header('location:managepost.php');

    $con->close();
}

function editPost()
{
    $product_id = $_GET['product_id'];
    $updateProduct = new Post();
    $updateProduct->productName = $_POST['productName'];
    $updateProduct->salePrice = $_POST['salePrice'];
    $updateProduct->categoryName = $_POST['categoryName'];
    $updateProduct->imageLink = $_POST['imageLink'];
    $updateProduct->productLink = $_POST['productLink'];
    $con = require('./db/dbConfig.php');
    $con->query("UPDATE `product` SET `ProductName`='$updateProduct->productName',`SalePrice`='$updateProduct->salePrice',`CategoryName`='$updateProduct->categoryName',`ImageLink`='$updateProduct->imageLink',`ProductLink`='$updateProduct->productLink' WHERE `Id` = $product_id");
    header('location:managepost.php');
    $con->close();
}

function deletePost()
{
    $con = require('./db/dbConfig.php');
    $product_id = $_GET['product_id'];
    $con->query("DELETE FROM `product` WHERE `Id` = $product_id");
    header('location:managepost.php');
    $con->close();
}
