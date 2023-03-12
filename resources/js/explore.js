// Declaration of global variables.

const postText = document.querySelector("#postText");
const postCharacterCount = document.querySelector("#postCharacterCount");
const postImage = document.querySelector("#postImage");
const postImageLabel = document.querySelector("#postImageLabel");
const postTextareaContainer = document.querySelector("#postTextareaContainer");

// Startup events.

postCharacterCount.innerText = (postText.maxLength - postText.value.length);

if (postImage.files.length == 1) {

    postImageLabel.innerText = postImage.files[0].name;
    postImageLabel.classList.add("border-success");
    postImageLabel.classList.add("text-success");

} else {
    
    postImageLabel.innerText = "+ add a photo";
    postImageLabel.classList.remove('border-success');
    postImageLabel.classList.remove('text-success');

}

// Events resulting from actions.

postText.addEventListener('keydown', function(event) {

    if (event.key == "Enter") {

        event.preventDefault();

    }

});

postText.addEventListener('input', function(event) {

    if (event.target.scrollHeight > event.target.clientHeight && event.target.rows < 5) {

        event.target.rows += 1;

    }

});

postTextareaContainer.addEventListener('click', function(event) {

    postText.focus();

});

postText.addEventListener('input', function(event) {

    postCharacterCount.innerText = (postText.maxLength - postText.value.length);

});

postImage.addEventListener('input', function(event) {

    if (postImage.files.length == 1) {

        postImageLabel.innerText = postImage.files[0].name;
        postImageLabel.classList.add("border-success");
        postImageLabel.classList.add("text-success");

    }

});

postImageLabel.addEventListener('click', function(event) {

    if (postImage.files.length == 1) {

        event.preventDefault();

        postImage.value = null;
        postImageLabel.innerText = "+ add a photo";
        postImageLabel.classList.remove('border-success');
        postImageLabel.classList.remove('text-success');

    }

});
