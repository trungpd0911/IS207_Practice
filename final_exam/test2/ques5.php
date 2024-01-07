<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <div class="card border-1 shadow p-3" style="width: 800px; font-size: 16px;">
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <h3>Liệt kê</h3>
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <div style="min-width: 200px; padding: 0 10px 0 0;">Chọn số lần bảo dưỡng : </div>
                <input type="text" class="form-control" name="count" onkeypress="getMaintenanceInfo(event)">
            </div>

            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <table>

                </table>
            </div>
        </div>
    </div>
    <script>
        const getMaintenanceInfo = (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                let count = e.target.value;
                // check count is just number and not contain character
                if (isNaN(count)) {
                    alert("Vui lòng nhập số lần bảo dưỡng là số");
                    return;
                }
                let table = document.querySelector("table");
                table.innerHTML = "";
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        let data = JSON.parse(xhttp.responseText);
                        if (data.length === 0) {
                            alert("Không có xe nào được bảo dưỡng nhiều hơn " + count + " lần");
                            return;
                        }
                        let html = `
                            <thead>
                                <tr>
                                    <th>Họ tên khách hàng</th>
                                    <th>Số xe</th>
                                    <th>Số lần bảo dưỡng</th>
                                </tr>
                            </thead>
                            <tbody>
                        `;
                        table.innerHTML = html;
                        let tbody = document.createElement("tbody");
                        data.forEach((item) => {
                            html = `
                                <tr>
                                    <td>${item.hotenkh}</td>
                                    <td>${item.soxe}</td>
                                    <td>${item.solanbd}</td>
                                </tr>
                            `;
                            tbody.innerHTML += html;
                        });
                        table.appendChild(tbody);
                    }
                }
                xhttp.open("GET", `controller.php?action=getMaintenanceInfo&count=${count}`, true);
                xhttp.send();
            }
        }
        document.getElementById("ques-5").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>