<?php
session_start();
include 'product.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST["action"];
} else {
  $action = $_GET["action"];
}

if ($action == 'search') {
  $keyword = $_GET["keyword"];
  searchPost($keyword);
}

if ($action == 'loadAllPost') {
  loadAllPost();
}

if ($action == 'loadOnePost') {
  loadOnePost();
}


if ($action == 'create') {
  $post = new Post();
  $post->productName = $_POST["productName"];
  $post->salePrice = $_POST["salePrice"];
  $post->categoryName = $_POST["categoryName"];
  $post->imageLink = $_POST["imageLink"];
  $post->productLink = $_POST["productLink"];
  createPost($post);
}
if ($action == 'delete') {
  $post = new Post();
  $post->id = $_POST["id"];
  deletePost($post->id);
}

if ($action == 'update') {
  $post = new Post();
  $post->id = $_POST["id"];
  $post->productName = $_POST["productName"];
  $post->salePrice = $_POST["salePrice"];
  $post->categoryName = $_POST["categoryName"];
  $post->imageLink = $_POST["imageLink"];
  $post->productLink = $_POST["productLink"];
  updatePost($post);
}
function loadOnePost()
{
  $conn = include 'dbConfig.php';
  $id = $_GET["id"];
  $sql = "SELECT * FROM product WHERE Id=$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  } else {
    echo "no result found";
  }
  $conn->close();
}

function loadAllPost()
{
  $conn = include 'dbConfig.php';
  $sql = "SELECT * FROM product";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  } else {
    echo "no result found";
  }
  $conn->close();
}

function searchPost($keyword)
{
  $conn = include 'dbConfig.php';
  $sql = "SELECT * FROM product WHERE ProductName LIKE '%$keyword%';";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
  } else {
    echo "no result found";
  }
  $conn->close();
}

function updatePost($post)
{
  $conn = include 'dbConfig.php';

  $sql = "UPDATE `product` SET `ProductName`='$post->productName',`SalePrice`='$post->salePrice',`CategoryName`='$post->categoryName',`ImageLink`='$post->imageLink',`ProductLink`='$post->productLink' WHERE Id=$post->id";
  $conn->query($sql);
  $conn->close();
}

function createPost($post)
{
  $conn = include 'dbConfig.php';

  $sql = "INSERT INTO product(ProductName,SalePrice,CategoryName,ImageLink,ProductLink)
    VALUES('$post->productName',$post->salePrice,'$post->categoryName','$post->imageLink','$post->productLink')";

  $conn->query($sql);
  $conn->close();
}

function deletePost($postId)
{
  $conn = include 'dbConfig.php';

  $sql = "DELETE FROM product WHERE Id=$postId";
  $conn->query($sql);

  $conn->close();
}
