
// Menu animation.

const globalHeader = document.querySelector("#globalHeader");
let oldPosition = window.pageYOffset;

document.addEventListener('scroll', function(event) {

    const currentPosition = window.pageYOffset;
    let scrollDirection = (currentPosition > oldPosition) ? "going down" : "going up"; 

    if (scrollDirection == "going down") {

        globalHeader.classList.add('hiding-menu');
        globalHeader.classList.add('hide-menu');

        globalHeader.classList.remove('showing-menu');
        globalHeader.classList.remove('show-menu');

    } else if (scrollDirection == "going up") {

        globalHeader.classList.add('showing-menu');
        globalHeader.classList.add('show-menu');
        
        globalHeader.classList.remove('hiding-menu');
        globalHeader.classList.remove('hide-menu');

    }

    oldPosition = currentPosition;

});

// Sign out functionality.

const baseUrl = window.location.origin;
const csrfToken = document.querySelector('input[name="_token"]').value;
const btnSignout = document.querySelector("#btnSignout");

if (btnSignout != null) {

    btnSignout.addEventListener('click', function(event) {

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
