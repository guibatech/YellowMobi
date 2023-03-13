const postText = document.querySelector("#postText");
const postCharacterCount = document.querySelector("#postCharacterCount");
const postImage = document.querySelector("#postImage");
const postImageLabel = document.querySelector("#postImageLabel");
const postTextareaContainer = document.querySelector("#postTextareaContainer");
const btnPost = document.querySelector("#btnPost");

window.addEventListener('load', function(event) {

    disableBtnPost();
    resizePostText();
    countPostCharacters();

    if (postImage.files.length == 1) {

        flagImage();

    } else {

        clearPostImage();

    }

});

postText.addEventListener('keydown', function(event) {

    if (event.key == "Enter") {

        event.preventDefault();
        btnPost.click();

    }

});

postText.addEventListener('input', function(event) {

    resizePostText();
    disableBtnPost();
    countPostCharacters();

});

postTextareaContainer.addEventListener('click', function(event) {

    postText.focus();

});

postImage.addEventListener('input', function(event) {
    
    flagImage();

});

postImageLabel.addEventListener('click', function(event) {

    if (postImage.files.length == 1) {

        event.preventDefault();
        clearPostImage();

    }

});

function fileName(name) {

    if (name.length <= 10) {

        return name;

    }

    let finalName = "";

    for (let c = 0; c < 10; c++) {

        finalName += (name.split(""))[c];

    }

    return finalName += "...";

}

function flagImage() {
    
    postImageLabel.innerText = fileName(postImage.files[0].name);
    postImageLabel.classList.add("border-success");
    postImageLabel.classList.add("text-success");

}

function clearPostImage() {
    
    postImage.value = null;
    postImageLabel.innerText = "+ photo";
    postImageLabel.classList.remove('border-success');
    postImageLabel.classList.remove('text-success');

}

function disableBtnPost() {
    
    if (postText.value.length == 0) {

        btnPost.disabled = true;

    } else {

        btnPost.disabled = false;

    }

}

function resizePostText() {

    postText.rows = 1;

    while (postText.scrollHeight > postText.clientHeight) {

        postText.rows += 1;

    }

}

function countPostCharacters() {
    
    postCharacterCount.innerText = (postText.maxLength - postText.value.length);

}
