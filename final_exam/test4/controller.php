<?php
if (isset($_POST['action']) && $_POST['action'] == 'addCustomer') {
    addCustomer();
}
if (isset($_GET['action']) && $_GET['action'] == 'getBillByDate') {
    getBillByDate();
}
if (isset($_GET['action']) && $_GET['action'] == 'getBill') {
    getBill();
}
function addCustomer()
{
    $customerId = $_POST['customerId'];
    $customerName = $_POST['customerName'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `khachhang`(`makh`, `tenkh`, `diachi`) VALUES ('$customerId', '$customerName', '$address')";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    if ($result) {
        header('Location: index.php');
    } else {
        echo "<script>alert('Thêm thất bại!');</script>";
    }
}
function getBillByDate()
{
    $date = $_GET['date'];
    $sql = "SELECT madh, tenkh FROM `donhang`, `khachhang` WHERE `ngaydat` = '$date' and donhang.makh = khachhang.makh";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    echo json_encode($data);
}
function getBill()
{
    $con = require('dbConfig.php');
    $sql = 'select madh, tendh from donhang';
    $result = $con->query($sql);
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    echo json_encode($data);
}
