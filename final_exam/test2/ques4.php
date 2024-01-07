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
            <form action="">
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <h3>Thanh toán</h3>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 150px; padding: 0 10px 0 0;">Số xe : </div>
                    <select name="numberPlate" id="" class="form-control" onchange="getWorkByNumberPlate()">
                    </select>

                    <div style="min-width: 150px; padding: 0 10px 0 20px;">Ngày nhận xe : </div>
                    <input type="date" class="form-control" name="numberPlate" onchange="getNumberPlate(event)">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 128px; padding: 0 10px 0 0; margin-left: 405px">Thành tiền : </div>
                    <input type="text" class="form-control" name="sumPrice" placeholder="500000">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <table>

                    </table>
                </div>
                <!-- button submit -->
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <button type="submit" class="btn btn-primary" onclick="payment(event)">Thanh toán</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const getSumPrice = () => {
            let price = 0;
            const table = document.querySelector('table');
            const tbody = table.querySelector('tbody');
            const trs = tbody.querySelectorAll('tr');
            trs.forEach((tr) => {
                const tds = tr.querySelectorAll('td');
                price += parseInt(tds[1].innerText.replace(/\./g, '')); // remove dot
            });
            let sumPrice = document.querySelector('input[name="sumPrice"]');
            sumPrice.value = displayPrice(price);
        }
        const payment = (e) => {
            e.preventDefault();
            let numberPlate = document.querySelector('select[name="numberPlate"]').value;
            let date = new Date();
            // format date to yyyy-mm-dd
            date = date.toISOString().slice(0, 10);
            // take all price from table and sum 
            let price = document.querySelector('input[name="sumPrice"]').value;
            price = parseInt(price.replace(/\./g, ''));
            console.log(numberPlate, date, price);
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    const data = JSON.parse(xhttp.responseText);
                    // reload page 
                    alert(data.message);
                    if (data.statusCode == '200') {
                        window.location.reload();
                    }
                }
            }
            xhttp.open("POST", `controller.php`, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`action=payment&numberPlate=${numberPlate}&date=${date}&price=${price}`);
        }
        const displayPrice = (price) => {
            // change to VND format
            return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' VND';
        }
        const getWorkByNumberPlate = () => {
            const numberPlate = document.querySelector('select[name="numberPlate"]').value;
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    const data = JSON.parse(xhttp.responseText);
                    if (data.length == 0) {
                        alert('Không có công việc nào');
                        window.location.reload();
                        return;
                    }
                    const table = document.querySelector('table');
                    table.innerHTML = '';
                    let html = `
                        <thead>
                            <tr>
                                <th>Tên công việc</th>
                                <th>Đơn giá</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                    `;
                    table.innerHTML = html;
                    let tbody = document.createElement('tbody');
                    data.forEach((item) => {
                        let html = `
                            <tr>
                                <td>${item.tencv}</td>
                                <td>${displayPrice(item.dongia)}</td>
                                <td>
                                    <button class="btn btn-danger" onclick="removeWork(event, ${item.mabd}, ${item.macv})">Xóa</button>
                                </td>
                            </tr>
                        `;
                        tbody.innerHTML += html;
                    });
                    table.appendChild(tbody);
                    getSumPrice();
                }
            }
            xhttp.open("GET", `controller.php?action=getWorkByNumberPlate&numberPlate=${numberPlate}`, true);
            xhttp.send();
        }
        const removeWork = async (e, mabd, macv) => {
            e.preventDefault();
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    const data = JSON.parse(xhttp.responseText);
                    alert(data.message);
                    if (data.status == 'success') {
                        getWorkByNumberPlate();
                    }
                }
            }
            xhttp.open('POST', 'controller.php?', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`action=removeWork&mabd=${mabd}&macv=${macv}`);
        }
        const getNumberPlate = async (event) => {
            const date = event.target.value;
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    const data = JSON.parse(xhttp.responseText);
                    const select = document.querySelector('select[name="numberPlate"]');
                    select.innerHTML = '';
                    data.forEach((item) => {
                        const option = document.createElement('option');
                        option.value = item.soxe;
                        option.innerText = item.soxe;
                        select.appendChild(option);
                    });
                }
            }
            xhttp.open("GET", `controller.php?action=getNumberPlate&date=${date}`, true);
            xhttp.send();
        }
        document.getElementById("ques-4").classList.add("active");
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>