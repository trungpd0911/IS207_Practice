<?php
if (isset($_POST['action']) && $_POST['action'] == 'create-customer') {
    createCustomer();
}
if (isset($_POST['action']) && $_POST['action'] == 'create-bill') {
    createBill();
}
if (isset($_GET['action']) && $_GET['action'] == 'get-mahd') {
    getMaHd();
}
if (isset($_GET['action']) && $_GET['action'] == 'get-room-trong') {
    getRoomTrong();
}
if (isset($_GET['action']) && $_GET['action'] == 'get-room-da-dat') {
    getRoomDaDat();
}
if (isset($_POST['action']) && $_POST['action'] == 'add-room') {
    addRoom();
}
if (isset($_POST['action']) && $_POST['action'] == 'remove-room') {
    removeRoom();
}
if (isset($_POST['action']) && $_POST['action'] == 'highest-rental-amount-customer') {
    highestRentalAmountCustomer();
}
if (isset($_GET['action']) && $_GET['action'] == 'get-customer-name') {
    getCustomerName();
}
if (isset($_POST['action']) && $_POST['action'] == 'get-mahd-by-customer') {
    getMahdByCustomer();
}
if (isset($_POST['action']) && $_POST['action'] == 'get-room-by-mahd') {
    getRoomByMahd();
}
function createCustomer()
{
    $makh = $_POST['makh'];
    $tenkh = $_POST['tenkh'];
    $sdt = $_POST['sdt'];
    $cccn = $_POST['cccn'];

    $con = require('dbConfig.php');
    $sql = "INSERT INTO `khachhang`(`makh`, `tenkh`, `sdt`, `cccn`) VALUES ('$makh', '$tenkh', '$sdt', '$cccn')";
    $result = $con->query($sql);
    $con->close();
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        header("Location: index.php");
    }
}
function createBill()
{
    $makh = $_POST['makh'];
    $mahd = $_POST['mahd'];
    $tenhd = $_POST['tenhd'];
    $tongtien = $_POST['tongtien'];

    $con = require('dbConfig.php');
    $sql = "INSERT INTO `hoadon`(`mahd`, `tenhd`, `makh`, `tongtien`) VALUES ('$mahd', '$tenhd', '$makh', '$tongtien')";
    $result = $con->query($sql);
    $con->close();
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        header("Location: index.php");
    }
}
function getMaHd()
{
    $con = require('dbConfig.php');
    $sql = "SELECT * FROM hoadon";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
        // echo "djaksda";
    }
}
function getRoomTrong()
{
    $con = require('dbConfig.php');
    $sql = "SELECT * FROM phong WHERE tinhtrang = 'trong'";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
function getRoomDaDat()
{
    $con = require('dbConfig.php');
    $sql = "SELECT * FROM phong WHERE tinhtrang <> 'trong'";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
function addRoom()
{
    $maphong = $_POST['maphong'];
    // $mahd = $_POST['mahd'];
    $con = require('dbConfig.php');
    $sql = "UPDATE `phong` SET `tinhtrang`='thue' WHERE maphong = '$maphong'";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        echo "ok";
    }
}
function removeRoom()
{
    $maphong = $_POST['maphong'];
    // $mahd = $_POST['mahd'];
    $con = require('dbConfig.php');
    $sql = "UPDATE `phong` SET `tinhtrang`='trong' WHERE maphong = '$maphong'";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        echo "ok";
    }
}
function highestRentalAmountCustomer()
{
    $con = require('dbConfig.php');
    $customerCount = $_POST['customer-count'];
    $sql = "SELECT kh.makh, tenkh, sum(tongtien) 
    FROM khachhang kh, hoadon hd
    where kh.makh = hd.makh
    GROUP BY makh
    ORDER BY sum(tongtien) DESC
    LIMIT $customerCount";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
function getCustomerName()
{
    $con = require('dbConfig.php');
    $sql = "SELECT tenkh, makh FROM khachhang";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
function getMahdByCustomer()
{
    $makh = $_POST['makh'];
    $con = require('dbConfig.php');
    $sql = "SELECT mahd FROM hoadon WHERE makh = '$makh'";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
function getRoomByMahd()
{
    $mahd = $_POST['mahd'];
    $con = require('dbConfig.php');
    $sql = "SELECT phong.maphong, loaiphong FROM thue, phong WHERE mahd = '$mahd' AND thue.maphong = phong.maphong";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
}
