<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <?php
    require('navbar.php');
    ?>
    <div class="ques-5">
        <div class="form">
            <div class="row">
                <label for="customer-name" class="label">Tên khách hàng : </label>
                <select name="customer-name" id="customer-name" class="input" onchange="getMahdByCustomer()">
                </select>
            </div>
            <div class="answer">
            </div>
        </div>
    </div>
    <script>
        const getAllCustomerName = () => {
            const xhttp = new XMLHttpRequest();
            const customerName = document.getElementById('customer-name');
            customerName.innerHTML = '';
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState === 4 && xhttp.status === 200) {
                    let data = JSON.parse(xhttp.responseText);
                    data.forEach((item) => {
                        let option = document.createElement('option');
                        option.value = item.makh;
                        option.innerHTML = item.tenkh;
                        customerName.appendChild(option);
                    })
                }
            }
            xhttp.open('GET', 'controller.php?action=get-customer-name', true);
            xhttp.send();
        }
        window.onload = () => {
            getAllCustomerName();
        }
        const getMahdByCustomer = () => {
            let customerId = document.getElementById('customer-name').value;
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let data = JSON.parse(xhttp.responseText);
                    let answer = document.getElementsByClassName('ques-5')[0].getElementsByClassName('form')[0].getElementsByClassName('answer')[0];
                    let html = `
                    <div class="row">
                        <div class="label">
                            <label for="mahd"> Mã hóa đơn :</label>
                        </div>
                        <select name="mahd" class="input" id="mahd" onclick="getRoomByMahd()">
                    `;
                    data.forEach(item => {
                        html += `
                            <option value="${item.mahd}">${item.mahd}</option>
                        `;
                    })
                    html += `
                        </select>
                    </div>
                    <div class="row">
                        <div id="roomByMahd">
                        </div>
                    </div>
                    `;
                    answer.innerHTML = html;
                }
            }
            xhttp.open('POST', 'controller.php?', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('action=get-mahd-by-customer&makh=' + customerId);
        }
        const getRoomByMahd = () => {
            let mahd = document.getElementById('mahd').value;
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let data = JSON.parse(xhttp.responseText);
                    let answer = document.getElementById('roomByMahd');
                    answer.innerHTML = '';
                    let html = `
                    <div class="row">
                        <h3>Danh sách các phòng trong hóa đơn</h3>
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
                            <tbody>
                    `;
                    data.forEach((item, index) => {
                        html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.maphong}</td>
                            <td>${item.loaiphong}</td>
                        </tr>
                        `;
                    })
                    html += `
                            </tbody>
                        </table>
                    </div>
                    `;
                    answer.innerHTML = html;
                }
            }
            xhttp.open('POST', 'controller.php?', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('action=get-room-by-mahd&mahd=' + mahd);
        }
        document.getElementById("ques-5").classList.add("active");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>