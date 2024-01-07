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

    <div class="ques">
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
        const highestRentalAmountCustomer = (e) => {
            if (e.key === 'Enter') {
                let customerCount = document.getElementById('customer-count').value;
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        let answer = document.getElementsByClassName('ques-4')[0].getElementsByClassName('form')[0].getElementsByClassName('answer')[0];
                        answer.innerHTML = '';
                        let data = JSON.parse(xhttp.responseText);
                        let newDiv = document.createElement('div');
                        newDiv.classList.add('row');
                        newDiv.style.textAlign = 'center';
                        newDiv.style.margin = '20px 0';
                        let h3 = document.createElement('h3');
                        h3.innerHTML = `${customerCount} Khách hàng có số tiền thuê nhiều nhất`;
                        newDiv.appendChild(h3);
                        // query to .ques-4.form
                        answer.appendChild(newDiv);
                        let table = document.createElement('table');
                        let thead = document.createElement('thead');
                        let tr = document.createElement('tr');
                        let th1 = document.createElement('th');
                        th1.innerHTML = 'STT';
                        let th2 = document.createElement('th');
                        th2.innerHTML = 'Mã khách hàng';
                        let th3 = document.createElement('th');
                        th3.innerHTML = 'Tên khách hàng';
                        let th4 = document.createElement('th');
                        th4.innerHTML = 'Tổng tiền thuê';
                        tr.appendChild(th1);
                        tr.appendChild(th2);
                        tr.appendChild(th3);
                        tr.appendChild(th4);
                        thead.appendChild(tr);
                        table.appendChild(thead);
                        let tbody = document.createElement('tbody');
                        data.forEach((item, index) => {
                            let tr = document.createElement('tr');
                            let td1 = document.createElement('td');
                            td1.innerHTML = index + 1;
                            let td2 = document.createElement('td');
                            td2.innerHTML = item.makh;
                            let td3 = document.createElement('td');
                            td3.innerHTML = item.tenkh;
                            let td4 = document.createElement('td');
                            td4.innerHTML = item['sum(tongtien)'];
                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tr.appendChild(td4);
                            tbody.appendChild(tr);
                        })
                        table.appendChild(tbody);
                        answer.appendChild(table);
                    }
                }
                xhttp.open('POST', 'controller.php?', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('action=highest-rental-amount-customer&customer-count=' + customerCount);
            }
        }

        document.getElementById("ques-4").classList.add("active");
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>