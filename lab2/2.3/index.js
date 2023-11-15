var alarmButtonA = document.getElementById('button-A')
var alarmButtonB = document.getElementById('button-B')
var alarmButtonC = document.getElementById('button-C')
var displayC = document.getElementById('main-level-C')
var displayB = document.getElementById('main-level-B')
var displayA = document.getElementById('main-level-A')

function showDivA() {
    displayA.style.display = 'block';
    displayB.style.display = 'none';
    displayC.style.display = 'none';
}

function showDivB() {
    displayA.style.display = 'none';
    displayB.style.display = 'block';
    displayC.style.display = 'none';
}

function showDivC() {
    displayA.style.display = 'none';
    displayB.style.display = 'none';
    displayC.style.display = 'block';
}


alarmButtonC.addEventListener('click', showDivA)
alarmButtonC.addEventListener('mouseenter', showDivB);
alarmButtonC.addEventListener('mouseleave', showDivC);
alarmButtonA.addEventListener('click', showDivC)
alarmButtonB.addEventListener('click', showDivA)

// 
function moveItem(checkbox) {
    var row = checkbox.parentElement.parentElement;
    var targetList = checkbox.checked ? document.getElementById('aided-list') : document.getElementById('unaided-list');
    targetList.appendChild(row);
}
// var inputCheckboxs = document.querySelectorAll('input[type="checkbox"]');

// for (var i = 0; i < inputCheckboxs.length; ++i) {
//     inputCheckboxs[i].onclick = function () {
//         moveItem(this);
//     }
// }

var inputCheckboxes = document.querySelectorAll('input[type="checkbox"]');

inputCheckboxes.forEach(function (checkbox) {
    checkbox.addEventListener('click', function () {
        moveItem(this);
    });
});


// add family
var submitBtn = document.querySelector('.evacuation-Form__box button');

function addFamily() {
    var forms = document.querySelector('.evacuation-Form__box').querySelectorAll('input');
    var householder = forms[0].value;
    var building = forms[1].value;
    var room = forms[2].value;
    var haveChild = document.querySelector('.evacuation-Form__box').querySelectorAll('select')[0].value;
    var haveOldPerson = document.querySelector('.evacuation-Form__box').querySelectorAll('select')[1].value;

    var tableUnaidedList = document.getElementById('unaided-list');
    var newRow = tableUnaidedList.insertRow();
    newRow.insertCell(0).innerHTML = householder;
    newRow.insertCell(1).innerHTML = building;
    newRow.insertCell(2).innerHTML = room;
    newRow.insertCell(3).innerHTML = haveChild;
    newRow.insertCell(4).innerHTML = haveOldPerson;

    // Tạo một ô checkbox mới
    var checkboxCell = newRow.insertCell(5);
    var checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.onclick = function () {
        moveItem(checkbox);
    };
    checkboxCell.appendChild(checkbox);


    // Xóa dữ liệu trong form
    forms[0].value = '';
    forms[1].value = '';
    forms[2].value = '';
    document.querySelector('.evacuation-Form__box').querySelectorAll('select')[0].value = '';
    document.querySelector('.evacuation-Form__box').querySelectorAll('select')[1].value = '';
}

submitBtn.addEventListener('click', addFamily);


