<?php
if (isset($_POST['action']) && $_POST['action'] == 'addTour') {
    addTour();
}
if (isset($_POST['action']) && $_POST['action'] == 'addDestination') {
    addDestination();
}
if (isset($_POST['action']) && $_POST['action'] == 'deleteDestination') {
    deleteDestination();
}
if (isset($_POST['action']) && $_POST['action'] == 'updateDestination') {
    updateDestination();
}
if (isset($_GET['action']) && $_GET['action'] == 'getDestinationByCount') {
    getDestinationByCount();
}
function addTour()
{
    $tourId = $_POST['tourId'];
    $tourName = $_POST['tourName'];
    $tourBeginDate = $_POST['tourBeginDate'];
    $dayCount = $_POST['dayCount'];
    $nightCount = $_POST['nightCount'];
    $price = $_POST['price'];
    $con = require('dbConfig.php');
    $sql = "INSERT INTO `tour`(`MaTour`, `TenTour`, `NgayKhoiHanh`, `SoNgay`, `SoDem`, `Gia`) VALUES ('$tourId','$tourName','$tourBeginDate','$dayCount','$nightCount','$price')";
    $result = $con->query($sql);
    if ($result) {
        header('Location: index.php');
    } else {
        echo "<script>alert('Thêm thất bại')</script>";
    }
}
function addDestination()
{
    $cityId = $_POST['cityId'];
    $destinationId = $_POST['destinationId'];
    $destinationName = $_POST['destinationName'];
    $feature = $_POST['feature'];
    $con = require('dbConfig.php');
    $sql = "INSERT INTO `diemdl`(`MaDDL`, `TenDDL`, `MaTTP`, `Dactrung`) VALUES ('$destinationId','$destinationName','$cityId','$feature')";
    $result = $con->query($sql);
    if ($result) {
        header('Location: ques2.php');
    } else {
        echo "<script>alert('Thêm thất bại')</script>";
    }
}
function deleteDestination()
{
    $destinationId = $_POST['desId'];
    $con = require('dbConfig.php');
    // delete destination in table chitiet 
    $sql = "DELETE FROM `chitiet` WHERE `MaDDL` = '$destinationId'";
    $result = $con->query($sql);
    // delete destination in table diemdl
    $sql = "DELETE FROM `diemdl` WHERE `MaDDL` = '$destinationId'";
    $result = $con->query($sql);
    if ($result) {
        $res = [
            'statusCode' => '200',
            'message' => 'Xóa thành công'
        ];
        echo json_encode($res);
    } else {
        $res = [
            'statusCode' => '500',
            'message' => 'Xóa thất bại'
        ];
        echo json_encode($res);
    }
}
function updateDestination()
{
    $cityId = $_POST['cityId'];
    $destinationId = $_POST['destinationId'];
    $destinationName = $_POST['destinationName'];
    $feature = $_POST['feature'];
    $con = require('dbConfig.php');
    $sql = "UPDATE `diemdl` SET `TenDDL`='$destinationName',`MaTTP`='$cityId',`Dactrung`='$feature' WHERE `MaDDL` = '$destinationId'";
    $result = $con->query($sql);
    if ($result) {
        header('Location: ques3.php');
    } else {
        echo "<script>alert('Cập nhật thất bại')</script>";
    }
}
function getDestinationByCount()
{
    $destinationCount = $_GET['destinationCount'];
    $con = require('dbConfig.php');
    $sql = "select TenDDL, count(*) as SoDiemDuLich from chitiet, diemdl where chitiet.MaDDL = diemdl.MaDDL group by TenDDL having SoDiemDuLich >= $destinationCount";
    $result = $con->query($sql);
    $res = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res[] = $row;
        }
    }
    echo json_encode($res);
}
