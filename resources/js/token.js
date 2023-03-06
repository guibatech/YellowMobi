let position = 0;
let digit;

while ((digit = document.querySelector(`#d_${position}`)) != null) {

    digit.addEventListener("keyup", function(event) {

        if (event.key.match("^[A-Za-z0-9]{1}$")) {

            let nextDigit = parseInt(event.target.id.replace("d_", "")) + 1;
            nextDigit = document.querySelector(`#d_${nextDigit}`);

            if (nextDigit != null) {

                nextDigit.focus();

            } else {
                
                document.querySelector("#btnReady").click();

            }

            return;

        }
        
        if (event.key == "Backspace") {

            let previousDigit = parseInt(event.target.id.replace("d_", "")) - 1;
            previousDigit = document.querySelector(`#d_${previousDigit}`);

            if (previousDigit != null) {

                previousDigit.focus();
                previousDigit.value = "";

            }

            return;

        } 
        
        this.value = "";
        return;

    });

    position++;

}
