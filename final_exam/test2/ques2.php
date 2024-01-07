<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    require('navbar.php');
    ?>
    <div class="d-flex justify-content-center mt-3">
        <div class="card border-1 shadow p-3" style="width: 600px; font-size: 16px;">
            <form action="controller.php" method="POST">
                <input type="hidden" name="action" value="addCarInformation">
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <h3>Thêm thông tin xe khách hàng</h3>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Mã khách hàng : </div>
                    <select name="customerId" id="" class="form-control">
                        <?php
                        $con = require('dbConfig.php');
                        $sql = "SELECT makh,hotenkh FROM khachhang";
                        $result = $con->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['makh'] . "'>" . $row['hotenkh'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Số xe : </div>
                    <input type="text" class="form-control" name="numberPlate" placeholder="Nhập số xe">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Hãng xe : </div>
                    <select name="autoMaker" id="" class="form-control">
                        <?php
                        $con = require('dbConfig.php');
                        $sql = "SELECT distinct hangxe FROM xe";
                        $result = $con->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['hangxe'] . "'>" . $row['hangxe'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Năm sản xuất : </div>
                    <input type="text" class="form-control" name="year" placeholder="Nhập năm sản xuất">
                </div>
                <!-- button submit -->
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("ques-2").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>