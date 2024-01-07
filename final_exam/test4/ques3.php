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
                <h2>Danh sách các đơn hàng</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên đơn hàng</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const getBill = () => {
            let tbody = document.querySelector('tbody');
            tbody.innerHTML = '';
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    const res = JSON.parse(xhttp.responseText);
                    res.forEach((item, index) => {
                        let html = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.madh}</td>
                                <td>${item.tendh}</td>
                                <td>
                                    <button class="btn btn-danger" onclick="deleteBill('${item.madh}')">Xóa</button>
                                </td>
                            </tr>
                        `;
                        tbody.innerHTML += html;
                    });
                }
            }
            xhttp.open('GET', 'controller.php?action=getBill', true);
            xhttp.send();
        }
        const deleteBill = (id) => {
            if (confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')) {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        const res = JSON.parse(xhttp.responseText);
                        if (res.status == 200) {
                            getBill();
                        } else {
                            alert('Xóa thất bại!');
                        }
                    }
                }
                xhttp.open('POST', 'controller.php?', true);
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhttp.send(`action=deleteBill&id=${id}`);
            }
        }
        window.onload = () => {
            getBill();
        }
        document.getElementById("ques-3").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>