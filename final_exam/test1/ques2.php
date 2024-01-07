<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    require('navbar.php');
    ?>
    <div class="d-flex justify-content-center mt-3">
        <form action="controller.php" method="post" class="form">
            <h2>Thêm hóa đơn</h2>
            <input type="hidden" name="action" value="create-bill">
            <div class="row">
                <div class="label">
                    <label for="makh"> Tên khách hàng :</label>
                </div>
                <select name="makh" class="input">
                    <?php
                    $con = require('dbConfig.php');
                    $sql = "SELECT * FROM khachhang";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['makh'] . "'>" . $row['tenkh'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="label">
                    <label for="mahd">Mã hóa đơn : </label>
                </div>
                <input type="text" class="input" name="mahd" placeholder="Mã hóa đơn">

            </div>
            <div class="row">
                <div class="label">
                    <label for="tenhd"> Tên hóa đơn : </label>
                </div>
                <input type="text" class="input" name="tenhd" placeholder="Tên hóa đơn">

            </div>
            <div class="row">
                <div class="label">
                    <label for="tongtien">Tổng tiền : </label>
                </div>
                <input type="text" class="input" name="tongtien" placeholder="Tổng tiền">
            </div>
            <div class="row">
                <button type="submit" class="submit-btn btn">Thêm</button>
            </div>


        </form>
    </div>
    <script>
        document.getElementById("ques-2").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>