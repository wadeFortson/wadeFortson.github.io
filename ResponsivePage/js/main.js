function calculate(operation) {
    const num1 = parseFloat(document.getElementById('num1').value);
    const num2 = parseFloat(document.getElementById('num2').value);
    let output = '';

    if (!isNaN(num1) && !isNaN(num2)) {
        switch (operation) {
            case '+':
                output = num1 + num2;
                break;
            case '-':
                output = num1 - num2;
                break;
            case '*':
                output = num1 * num2;
                break;
            case '/':
                output = num1 / num2;
                break;
            case '>=':
                output = num1 >= num2 ? 'True' : 'False';
                break;
            case '<=':
                output = num1 <= num2 ? 'True' : 'False';
                break;
        }
    } else {
        output = 'Please enter valid numbers';
    }

    document.getElementById('output').textContent = output;
}
