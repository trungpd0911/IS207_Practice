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
        <script>
            const getAllMaHd = () => {
                let maHd = document.getElementsByClassName('mahd');
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        let data = JSON.parse(xhttp.responseText);
                        data.forEach((item) => {
                            let option = document.createElement('option');
                            option.value = item.mahd;
                            option.innerHTML = item.mahd;
                            maHd[0].appendChild(option);
                        })
                    }
                }
                xhttp.open('GET', 'controller.php?action=get-mahd', true);
                xhttp.send();
            }
            const getAllRoomTrong = () => {
                let roomTrong = document.getElementById('room-trong');
                const xhttp = new XMLHttpRequest();
                roomTrong.innerHTML = '';
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        let i = 0;
                        let data = JSON.parse(xhttp.responseText);
                        data.forEach((item) => {
                            let tr = document.createElement('tr');
                            let td1 = document.createElement('td');
                            td1.innerHTML = i++;
                            let td2 = document.createElement('td');
                            td2.innerHTML = item.maphong;
                            let td3 = document.createElement('td');
                            td3.innerHTML = item.tenphong;
                            let td4 = document.createElement('td');
                            let button = document.createElement('button');
                            button.innerHTML = 'Thêm';
                            button.classList.add('btn');
                            button.onclick = () => {
                                addRoom(item.maphong);
                            }
                            td4.appendChild(button);
                            tr.appendChild(td1);
                            tr.appendChild(td2);
                            tr.appendChild(td3);
                            tr.appendChild(td4);
                            roomTrong.appendChild(tr);
                        })
                    }
                }
                xhttp.open('GET', 'controller.php?action=get-room-trong', true);
                xhttp.send();
            }
            const getAllRoomDaDat = () => {
                let roomDaDat = document.getElementById('room-da-dat');
                roomDaDat.innerHTML = '';
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        let i = 0;
                        let data = JSON.parse(xhttp.responseText);
                        data.forEach((item) => {
                            let html = `
                                <tr>
                                    <td>${i++}</td>
                                    <td>${item.maphong}</td>
                                    <td>${item.tenphong}</td>
                                    <td><button class="btn" onclick="removeRoom('${item.maphong}')">Xóa</button></td>
                                </tr>
                            `;
                            roomDaDat.innerHTML += html;
                        })
                    }
                }
                xhttp.open('GET', 'controller.php?action=get-room-da-dat', true);
                xhttp.send();
            }

            const addRoom = (maphong) => {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        getAllRoomDaDat();
                        getAllRoomTrong();
                    }
                }
                xhttp.open('POST', 'controller.php?', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('action=add-room&maphong=' + maphong);
            }
            const removeRoom = (maphong) => {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        getAllRoomTrong();
                        getAllRoomDaDat();
                    }
                }
                xhttp.open('POST', 'controller.php?', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('action=remove-room&maphong=' + maphong);
            }

            window.onload = () => {
                getAllMaHd();
                getAllRoomTrong();
                getAllRoomDaDat();
            }

            document.getElementById("ques-3").classList.add("active");
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>