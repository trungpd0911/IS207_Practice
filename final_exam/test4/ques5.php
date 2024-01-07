<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques 5</title>
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
            <input type="hidden" name="action" value="addDestination">
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <h3>Danh sách 10 mặt hàng bán chạy nhất</h3>
            </div>
            <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                <table>
                </table>
            </div>
        </div>
    </div>
    <script>
        const getTopSellingItem = () => {
            let table = document.querySelector('table');
            table.innerHTML = '';
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    table.innerHTML += `
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên mặt hàng</th>
                            <th>Số lượng đã bán</th>
                        </tr>
                    </thead>
                    <tbody>`;
                    let data = JSON.parse(xhttp.responseText);
                    data.forEach((item, index) => {
                        table.innerHTML += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.tenhh}</td>
                            <td>${item.soluong} cái</td>
                        </tr>`;
                    });
                    table.innerHTML += `</tbody>`;
                }
            }
            xhttp.open("GET", "controller.php?action=getTopSellingItem", true);
            xhttp.send();
        }
        getTopSellingItem();
        document.getElementById("ques-5").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>