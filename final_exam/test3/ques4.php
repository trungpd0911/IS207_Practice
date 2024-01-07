<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_GET['desId'])) {
        $desId = $_GET['desId'];
        $con = require('dbConfig.php');
        $sql = "SELECT * FROM `diemdl` WHERE `MaDDL` = '$desId'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        echo "<script>
            var desId = '" . $row['MaDDL'] . "';
            var desName = '" . $row['TenDDL'] . "';
            var desFeature = '" . $row['Dactrung'] . "';
            var cityId = '" . $row['MaTTP'] . "';
        </script>";
    } else {
        header("Location: ques3.php");
    }
    require('navbar.php');
    ?>
    <div class="d-flex justify-content-center mt-3">
        <div class="card border-1 shadow p-3" style="width: 600px; font-size: 16px;">
            <form action="controller.php" method="POST">
                <input type="hidden" name="action" value="updateDestination">
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <h3>Chi tiết hợp đồng</h3>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;  ">Mã điểm du lịch : </div>
                    <input type="text" class="form-control" name="destinationId" readonly>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;  ">Tên điểm du lịch : </div>
                    <input type="text" class="form-control" name="destinationName" placeholder="Nhập tên điểm du lịch">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Tên thành phố : </div>
                    <select name="cityId" id="" class="form-control">
                        <?php
                        $con = require('dbConfig.php');
                        $sql = "SELECT * FROM `tinhthanhpho`";
                        $result = $con->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['MaTTP'] . "'>" . $row['TenTTP'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Đặc trưng : </div>
                    <input type="text" class="form-control" name="feature" placeholder="Nhập đặc trưng">
                </div>
                <!-- button submit -->
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // set value for input 
        document.getElementsByName("destinationId")[0].value = desId;
        document.getElementsByName("destinationName")[0].value = desName;
        document.getElementsByName("feature")[0].value = desFeature;
        document.getElementsByName("cityId")[0].value = cityId;
        document.getElementById("ques-4").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>