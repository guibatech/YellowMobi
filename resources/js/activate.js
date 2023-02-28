let position = 0;
let digit = 0;
const btnReady = document.querySelector("#btnReady");

while ((digit = document.querySelector(`#_${position}`)) != null) {

    digit.addEventListener('keyup', function(event) {

        if (event.key.match("^[0-9]$") != null) {
        
            let nextDigit = document.querySelector(`#_${parseInt(event.target.id.replace('_', '')) + 1}`);
            if (nextDigit != null) {
                nextDigit.focus();
                nextDigit.select();
            } else {
                btnReady.click();
            }

        } else if (event.key == "Backspace") {

            let previousDigit = document.querySelector(`#_${parseInt(event.target.id.replace('_', '')) - 1}`);
            if (previousDigit != null) {
                previousDigit.focus();
                previousDigit.select();
                previousDigit.value = "";
            }

        } else {
            
            this.value = "";
            
        }

    });

    digit.addEventListener('click', function(event) {

        this.select();

    });

    position++;

}
