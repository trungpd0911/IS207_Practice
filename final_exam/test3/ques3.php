<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        thead {
            background-color: #f2f2f2;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        td,
        th {
            padding: 6px 10px;
        }
    </style>
</head>

<body>
    <?php
    require('navbar.php');
    ?>
    <div class="d-flex justify-content-center mt-3">
        <div class="card border-1 shadow p-3" style="width: 1000px; font-size: 16px;">
            <div class="mb-3 d-flex align-items-center justify-content-center flex-row">
                <h2>Các điểm du lịch</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã điểm du lịch</th>
                        <th>Tên điểm du lịch</th>
                        <th>Tên thành phố</th>
                        <th>Đặc trưng</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = require('dbConfig.php');
                    $i = 1;
                    $sql = "SELECT MaDDL, TenDDL, TenTTP, DacTrung FROM diemdl, tinhthanhpho ttp where diemdl.mattp = ttp.mattp";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>" . $i++ . "</td>
                                    <td>" . $row['MaDDL'] . "</td>
                                    <td>" . $row['TenDDL'] . "</td>
                                    <td>" . $row['TenTTP'] . "</td>
                                    <td>" . $row['DacTrung'] . "</td>
                                    <td>
                                        <button class='btn btn-primary' onclick='detailDestination(" . $row['MaDDL'] . ")'>View</button>
                                        <button class='btn btn-danger' onclick='deleteDestination(event, " . $row['MaDDL'] . ")'>Delete</button>
                                    </td>
                                </tr>
                            ";
                        }
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
    <script>
        document.getElementById("ques-3").classList.add("active");
        const detailDestination = (desId) => {
            window.location.href = `ques4.php?desId=${desId}`;
        }
        const deleteDestination = (event, desId) => {
            if (confirm("Bạn có chắc chắn muốn xóa điểm du lịch này?")) {
                event.preventDefault();
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // console.log(this.responseText);
                        let res = JSON.parse(this.responseText);
                        alert(res.message);
                        window.location.reload();
                    }
                };
                xhttp.open("POST", "controller.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(`action=deleteDestination&desId=${desId}`);
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>