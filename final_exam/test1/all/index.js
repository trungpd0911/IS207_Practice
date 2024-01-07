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
                let tr = document.createElement('tr');
                let td1 = document.createElement('td');
                td1.innerHTML = i++;
                let td2 = document.createElement('td');
                td2.innerHTML = item.maphong;
                let td3 = document.createElement('td');
                td3.innerHTML = item.tenphong;
                let td4 = document.createElement('td');
                let button = document.createElement('button');
                button.innerHTML = 'Xóa';
                button.classList.add('btn');
                td4.appendChild(button);
                td4.onclick = () => {
                    removeRoom(item.maphong);
                }
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                roomDaDat.appendChild(tr);
            })
        }
    }
    xhttp.open('GET', 'controller.php?action=get-room-da-dat', true);
    xhttp.send();
}
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
    getAllMaHd();
    getAllRoomTrong();
    getAllRoomDaDat();
    getAllCustomerName();
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
                let h2 = document.createElement('h2');
                h2.innerHTML = `${customerCount} Khách hàng có số tiền thuê nhiều nhất`;
                newDiv.appendChild(h2);
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

const getMahdByCustomer = () => {
    let customerId = document.getElementById('customer-name').value;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            let data = JSON.parse(xhttp.responseText);
            let answer = document.getElementsByClassName('ques-5')[0].getElementsByClassName('form')[0].getElementsByClassName('answer')[0];
            answer.innerHTML = '';
            let div1 = document.createElement('div');
            div1.classList.add('row');
            let div2 = document.createElement('div');
            div2.classList.add('label');
            div2.innerHTML = 'Mã hóa đơn';
            let select1 = document.createElement('select');
            select1.setAttribute('id', 'mahd');
            select1.onclick = getRoomByMahd;
            select1.classList.add('input');
            data.forEach(item => {
                let option = document.createElement('option');
                option.setAttribute('value', item.mahd);
                option.innerHTML = item.mahd;
                select1.appendChild(option);
            })
            div1.appendChild(div2);
            div1.appendChild(select1);
            answer.appendChild(div1);

            let div3 = document.createElement('div');
            div3.id = 'roomByMahd';
            answer.appendChild(div3);
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
            let div1 = document.createElement('div');
            div1.classList.add('row');
            let h2 = document.createElement('h2');
            h2.innerHTML = 'Danh sách các phòng trong hóa đơn';
            div1.appendChild(h2);
            answer.appendChild(div1);
            let div2 = document.createElement('div');
            div2.classList.add('row');
            let table = document.createElement('table');
            let thead = document.createElement('thead');
            let tr = document.createElement('tr');
            let th1 = document.createElement('th');
            th1.innerHTML = 'STT';
            let th2 = document.createElement('th');
            th2.innerHTML = 'Mã phòng';
            let th3 = document.createElement('th');
            th3.innerHTML = 'Loại phòng';
            tr.appendChild(th1);
            tr.appendChild(th2);
            tr.appendChild(th3);
            thead.appendChild(tr);
            table.appendChild(thead);
            let tbody = document.createElement('tbody');
            data.forEach((item, index) => {
                let tr = document.createElement('tr');
                let td1 = document.createElement('td');
                td1.innerHTML = index + 1;
                let td2 = document.createElement('td');
                td2.innerHTML = item.maphong;
                let td3 = document.createElement('td');
                td3.innerHTML = item.loaiphong;
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tbody.appendChild(tr);
            })
            table.appendChild(tbody);
            div2.appendChild(table);
            answer.appendChild(div2);
        }
    }
    xhttp.open('POST', 'controller.php?', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('action=get-room-by-mahd&mahd=' + mahd);
}