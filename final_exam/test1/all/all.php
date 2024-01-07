<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test 1</title>
    <link rel="stylesheet" href="../index.css">
</head>

<body>
    <div class="root">

        <div class="ques">
            <form action="controller.php" method="post" class="form">
                <h2>Thêm khách hàng</h2>
                <input type="hidden" name="action" value="create-customer">
                <div class="row">
                    <div class="label">
                        <label for="makh"> Mã khách hàng :</label>
                    </div>
                    <input type="text" class="input" name="makh" placeholder="Mã khách hàng">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="tenkh">Tên khách hàng : </label>
                    </div>
                    <input type="text" class="input" name="tenkh" placeholder="Tên khách hàng">

                </div>
                <div class="row">
                    <div class="label">
                        <label for="sdt"> Số điện thoại : </label>
                    </div>
                    <input type="text" class="input" name="sdt" placeholder="Số điện thoại">

                </div>
                <div class="row">
                    <div class="label">
                        <label for="cccn">Căn cước công nhân : </label>
                    </div>
                    <input type="text" class="input" name="cccn" placeholder="Căn cước công nhân">
                </div>
                <div class="row">
                    <button type="submit" class="submit-btn btn">Thêm</button>
                </div>
            </form>
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

        <div class="ques">
            <div class="ques-3">

                <div class="form">
                    <div class="row">
                        <div class="label">
                            <label for="mahd"> Mã hóa đơn :</label>
                        </div>
                        <select name="mahd" class="input mahd">
                        </select>
                    </div>
                    <p>Danh sách các phòng còn trống</p>
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã phòng</th>
                                <th>Tên phòng</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="room-trong">

                        </tbody>
                    </table>
                    <p>Danh sách các phòng đã thêm</p>
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã phòng</th>
                                <th>Tên phòng</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="room-da-dat">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="ques-4">
                <div class="form">
                    <div class="row">
                        <label for="customer-count" class="label">Số lượng khách hàng : </label>
                        <input type="text" class="input" id="customer-count" placeholder="Số lượng khách hàng" onkeypress="highestRentalAmountCustomer(event)">
                    </div>
                    <div class="answer">
                    </div>
                </div>
            </div>

        </div>

        <div class="ques-5">
            <div class="form">
                <div class="row">
                    <label for="customer-name" class="label">Tên khách hàng : </label>
                    <select name="customer-name" id="customer-name" class="input" onchange="getMahdByCustomer()">
                    </select>
                </div>
                <div class="answer">

                    <!-- <div class="row">
                        <div class="label">
                            <label for="mahd"> Mã hóa đơn :</label>
                        </div>
                        <select name="mahd" class="input" id="mahd">
                            </select>
                        </div>
                        
                        <div class="row">
                            <h2>Danh sách các phòng trong hóa đơn</h2>
                        </div>
                        
                        <div class="row">
                            <table>
                                <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã phòng</th>
                                <th>Loại phòng</th>
                            </tr>
                        </thead>
                        <tbody id="customer-room">
                            
                            </tbody>
                        </table>
                    </div> -->
                </div>
            </div>
        </div>

    </div>
    <script src="./index.js"></script>
</body>

</html>