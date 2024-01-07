<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    require('navbar.php');
    ?>
    <div class="d-flex justify-content-center mt-3">
        <div class="card border-1 shadow p-3" style="width: 600px; font-size: 16px;">
            <form action="">
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <h3>Thêm bảo dưỡng</h3>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 170px; padding: 0 10px 0 0;">Số xe : </div>
                    <input type="text" class="form-control" name="numberPlate" placeholder="Nhập số xe" onkeypress="getCustomer(event)">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 170px; padding: 0 10px 0 0;">Họ tên khách hàng : </div>
                    <input type="text" name="customerName" class="form-control" readonly>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 170px; padding: 0 10px 0 0;">Mã bảo dưỡng : </div>
                    <input type="text" class="form-control" name="maBd" placeholder="Nhập mã bảo dưỡng">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 170px; padding: 0 10px 0 0;">Số KM : </div>
                    <input type="text" class="form-control" name="soKM" placeholder="Nhập số KM">
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <div style="min-width: 170px; padding: 0 10px 0 0;">Nội dung : </div>
                    <input type="text" class="form-control" name="content" placeholder="Nhập nội dung">
                </div>
                <!-- button submit -->
                <div class="mt-3 d-flex align-items-center justify-content-center flex-row">
                    <button type="submit" class="btn btn-primary" onclick="addMaintenance(event)">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("ques-3").classList.add("active");
        const getCustomer = (e) => {
            if (e.key == "Enter") {
                e.preventDefault();
                const xhttp = new XMLHttpRequest();
                let numberPlate = document.querySelector('input[name="numberPlate"]').value;
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        const data = JSON.parse(xhttp.responseText);
                        if (data.length == 0) {
                            alert("Không tìm thấy khách hàng");
                            return;
                        }
                        const customerName = document.querySelector('input[name="customerName"]');
                        customerName.value = data[0].hotenkh;
                    }
                }
                xhttp.open("GET", "controller.php?action=getCustomer&numberPlate=" + numberPlate, true);
                xhttp.send();
            };
        }
        const addMaintenance = (e) => {
            e.preventDefault();
            const xhttp = new XMLHttpRequest();
            let numberPlate = document.querySelector('input[name="numberPlate"]').value;
            let maBd = document.querySelector('input[name="maBd"]').value;
            let soKM = document.querySelector('input[name="soKM"]').value;
            let content = document.querySelector('input[name="content"]').value;
            xhttp.onreadystatechange = () => {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    const data = JSON.parse(xhttp.responseText);
                    alert(data.message);
                }
            };
            xhttp.open("POST", "controller.php?", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("action=addMaintenance&" + "numberPlate=" + numberPlate + "&maBd=" + maBd + "&soKM=" + soKM + "&content=" + content);
            window.location.href = preventDefault();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>