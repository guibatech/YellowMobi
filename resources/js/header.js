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
