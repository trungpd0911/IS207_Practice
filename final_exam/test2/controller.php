<?php
if (isset($_POST['action']) && $_POST['action'] == 'addCustomer') {
    addCustomer();
}
if (isset($_POST['action']) && $_POST['action'] == 'addCarInformation') {
    addCarInformation();
}
if (isset($_GET['action']) && $_GET['action'] == 'getCustomer') {
    getCustomer();
}
if (isset($_POST['action']) && $_POST['action'] == 'addMaintenance') {
    addMaintenance();
}
if (isset($_GET['action']) && $_GET['action'] == 'getNumberPlate') {
    getNumberPlate();
}
if (isset($_GET['action']) && $_GET['action'] == 'getWorkByNumberPlate') {
    getWorkByNumberPlate();
}
if (isset($_POST['action']) && $_POST['action'] == 'removeWork') {
    removeWork();
}
if (isset($_POST['action']) && $_POST['action'] == 'payment') {
    payment();
}
if (isset($_GET['action']) && $_GET['action'] == 'getMaintenanceInfo') {
    getMaintenanceInfo();
}
function addCustomer()
{
    $customerId = $_POST['customerId'];
    $customerName = $_POST['customerName'];
    $adress = $_POST['adress'];
    $phoneNumber = $_POST['phoneNumber'];
    $sql = "INSERT INTO `khachhang`(`MaKH`, `HOTENKH`, `DiaChi`, `DienThoai`) VALUES ('$customerId','$customerName','$adress','$phoneNumber')";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    if ($result) {
        header('Location: index.php');
    } else {
        echo "Thêm thất bại";
    }
}
function addCarInformation()
{
    $customerId = $_POST['customerId'];
    $numberPlate = $_POST['numberPlate'];
    $autoMaker = $_POST['autoMaker'];
    $year = $_POST['year'];
    $sql = "INSERT INTO `xe`(`MaKH`, `SoXe`, `HangXe`, `NamSX`) VALUES ('$customerId','$numberPlate','$autoMaker','$year')";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    if ($result) {
        header('Location: index.php');
    } else {
        echo "Thêm thất bại";
    }
}
function getCustomer()
{
    $numberPlate = $_GET['numberPlate'];
    $sql = "SELECT khachhang.makh, hotenkh FROM khachhang,xe WHERE khachhang.makh = xe.makh and xe.soxe = '$numberPlate'";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    echo json_encode($data);
}
function addMaintenance()
{
    $numberPlate = $_POST['numberPlate'];
    $maBd = $_POST['maBd'];
    $soKM = $_POST['soKM'];
    $content = $_POST['content'];
    $date = date("Y-m-d");
    $sql = "INSERT INTO `baoduong`(`SoXe`, `MaBD`, `SoKM`, `ngaynhan`, `NoiDung`) VALUES ('$numberPlate','$maBd','$soKM', '$date','$content')";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    if ($result) {
        $data = [
            'statusCode' => '200',
            'message' => 'Thêm thành công',
        ];
        echo json_encode($data);
    } else {
        $data = [
            'statusCode' => '500',
            'message' => 'Thêm thất bại',
        ];
        echo json_encode($data);
    }
}
function getNumberPlate()
{
    $date = $_GET['date'];
    $sql = "SELECT soxe FROM baoduong WHERE ngaynhan = '$date'";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    echo json_encode($data);
}
function getWorkByNumberPlate()
{
    $numberPlate = $_GET['numberPlate'];
    $sql = "select tencv, dongia, ct_bd.mabd as mabd, ct_bd.macv as macv from congviec, ct_bd, baoduong where baoduong.mabd = ct_bd.mabd and ct_bd.macv = congviec.macv and baoduong.soxe = '$numberPlate' and baoduong.thanhtien is null and baoduong.ngaytra is null";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    echo json_encode($data);
}
function removeWork()
{
    $mabd = $_POST['mabd'];
    $macv = $_POST['macv'];
    $sql = "DELETE FROM `ct_bd` WHERE mabd = '$mabd' and macv = '$macv'";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    if ($result) {
        $data = [
            'status' => 'success',
            'message' => 'Xóa thành công',
        ];
        echo json_encode($data);
    } else {
        $data = [
            'status' => 'fail',
            'message' => 'Xóa thất bại',
        ];
        echo json_encode($data);
    }
}
function payment()
{
    $numberPlate = $_POST['numberPlate'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $sql = "update baoduong set thanhtien = '$price', ngaytra = '$date' where soxe = '$numberPlate'";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    if ($result) {
        $data = [
            'status' => 'success',
            'message' => 'Thanh toán thành công',
        ];
        echo json_encode($data);
    } else {
        $data = [
            'status' => 'fail',
            'message' => 'Thanh toán thất bại',
        ];
        echo json_encode($data);
    }
}
function getMaintenanceInfo()
{
    $count = $_GET['count'];
    $sql = "select hotenkh, xe.soxe, count(*) as solanbd from khachhang kh, xe, baoduong where kh.makh = xe.makh and xe.soxe = baoduong.soxe group by kh.makh, xe.soxe having solanbd > '$count'";
    $con = require('dbConfig.php');
    $result = $con->query($sql);
    $con->close();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    echo json_encode($data);
}
