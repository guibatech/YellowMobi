
// Header animation.

const globalHeader = document.querySelector("#globalHeader");
let oldPosition = window.pageYOffset;

document.addEventListener('scroll', function(event) {

    const currentPosition = window.pageYOffset;
    let scrollDirection = (currentPosition > oldPosition) ? "going down" : "going up"; 

    if (scrollDirection == "going down") {

        globalHeader.classList.add('hiding-header');
        globalHeader.classList.add('hide-header');

        globalHeader.classList.remove('showing-header');
        globalHeader.classList.remove('show-header');

    } else if (scrollDirection == "going up") {

        globalHeader.classList.add('showing-header');
        globalHeader.classList.add('show-header');
        
        globalHeader.classList.remove('hiding-header');
        globalHeader.classList.remove('hide-header');

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
