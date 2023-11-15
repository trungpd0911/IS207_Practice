let displayValue = "";

const appendToDisplay = (value) => {
    try {
        displayValue += value;
        document.getElementById("display").value = displayValue;
    } catch (e) {
        console.error(e);
        document.getElementById("display").value = "invalid Error";
    }
}

const clearDisplay = () => {
    displayValue = "";
    document.getElementById("display").value = displayValue;
}

const deleteLastCharacter = () => {
    displayValue = displayValue.slice(0, -1);
    document.getElementById("display").value = displayValue;
}

const calculateResult = () => {
    try {
        let result = eval(displayValue);
        console.log(typeof result)
        document.getElementById('display').value = result;
        displayValue = result;
        if (result == 'Infinity') {
            document.getElementById('display').value = "Infinity";
            displayValue = "";
        }
    }
    catch (e) {
        console.log(e);
        document.getElementById('display').value = "invalid error";
        displayValue = "";
    }
}