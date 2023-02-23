const baseUrl = window.location.origin;
const csrfToken = document.querySelector('input[name="_token"').value;
const btnSignin = document.querySelector("#btnSignin");

if (btnSignin != null) {

    btnSignin.addEventListener('click', function(event) {

        fetch(`${baseUrl}/accounts/signout/do`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            }
        }).then(function(responseHttp) {

            return responseHttp.json();

        }).then(function(data) {
        
            if (data.status == '1') {

                window.location.href = `${baseUrl}/accounts/signin`;

            }

        });

    });

}
