<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques 4</title>
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
        <div class="card border-1 shadow p-3" style="width: 600px; font-size: 16px;">
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <h3>Liệt kê đơn đặt hàng</h3>
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <div style="min-width: 150px; padding: 0 10px 0 0;">Tên khách hàng : </div>
                <select name="customerName" id="" class="form-control" onchange="getBillByCustomer(event)">
                    <?php
                    $con = require('dbConfig.php');
                    $sql = 'select * from khachhang';
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['makh'] . "'>" . $row['tenkh'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-left flex-row">
                <p>Danh sách đơn đặt hàng</p>
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-left flex-row">
                <table>

                </table>
            </div>
        </div>
    </div>
    <script>
        const getBillByCustomer = (e) => {
            let id = e.target.value;
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let table = document.querySelector('table');
                    table.innerHTML = '';
                    let res = JSON.parse(xhttp.responseText);
                    table.innerHTML += `
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                    `;
                    res.forEach((item, index) => {
                        table.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.tendh}</td>
                            </tr>
                        `;
                    });
                    table.innerHTML += `
                        </tbody>
                    `;
                }
            }
            xhttp.open('GET', 'controller.php?action=getBillByCustomer&id=' + id, true);
            xhttp.send();
        }
        document.getElementById("ques-4").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>