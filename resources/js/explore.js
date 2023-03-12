// Declaration of global variables.

const postText = document.querySelector("#postText");
const postCharacterCount = document.querySelector("#postCharacterCount");
const postImage = document.querySelector("#postImage");
const postImageLabel = document.querySelector("#postImageLabel");
const postTextareaContainer = document.querySelector("#postTextareaContainer");
const btnPost = document.querySelector("#btnPost");

// Startup events.

if (postText.value.length == 0) {

    btnPost.disabled = true;

} else {

    btnPost.disabled = false;

}

while (postText.scrollHeight > postText.clientHeight) {

    postText.rows += 1;

}

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
        btnPost.click();

    }

});

postText.addEventListener('input', function(event) {

    // Expand post text area.

    event.target.rows = 1;

    while (event.target.scrollHeight > event.target.clientHeight) {

        event.target.rows += 1;

    }

    // Disable "post" button when post text area is empty.

    if (postText.value.length == 0) {

        btnPost.disabled = true;

    } else {

        btnPost.disabled = false;

    }

    // Sets the amount of unused characters in the post.

    postCharacterCount.innerText = (postText.maxLength - postText.value.length);

});

postTextareaContainer.addEventListener('click', function(event) {

    postText.focus();

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
