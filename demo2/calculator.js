let display = document.getElementById('display');
let operation = '';

function insert(value) {
    if (display.value === '0' && value !== '.') {
        display.value = value;
    } else {
        display.value += value;
    }
}

function clearAll() {
    display.value = '0';
}

function calculate() {
    try {
        display.value = eval(display.value);
    } catch (e) {
        display.value = 'Error';
    }
}

function power() {
    display.value += '**';
}