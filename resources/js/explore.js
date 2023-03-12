// Declaration of global variables.

const postText = document.querySelector("#postText");
const postCharacterCount = document.querySelector("#postCharacterCount");
const postImage = document.querySelector("#postImage");
const postImageLabel = document.querySelector("#postImageLabel");
const postTextareaContainer = document.querySelector("#postTextareaContainer");
const btnPost = document.querySelector("#btnPost");

// Startup events.

disablePostButton(postText, btnPost);
autoSizePostTextArea(postText);
countPostCharacters(postCharacterCount, postText);

if (postImage.files.length >= 1) {
        
    putPostImage(postImageLabel, postImage);
    
} else {

    clearPostImage(postImageLabel, postImage);

}

// Events resulting from actions.

postText.addEventListener('keydown', function(event) {

    if (event.key == "Enter") {

        event.preventDefault();

        btnPost.click();

    }

});

postText.addEventListener('input', function(event) {

    autoSizePostTextArea(postText);
    disablePostButton(postText, btnPost);
    countPostCharacters(postCharacterCount, postText);

});

postTextareaContainer.addEventListener('click', function(event) {

    postText.focus();

});

postImage.addEventListener('input', function(event) {
    
    putPostImage(postImageLabel, postImage);

});

postImageLabel.addEventListener('click', function(event) {

    if (postImage.files.length == 1) {

        event.preventDefault();

        clearPostImage(postImageLabel, postImage);

    }

});

// Helper functions

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

function putPostImage(postImageLabel, postImage) {
    
    postImageLabel.innerText = fileName(postImage.files[0].name);
    postImageLabel.classList.add("border-success");
    postImageLabel.classList.add("text-success");

}

function clearPostImage(postImageLabel, postImage) {
    
    postImage.value = null;
    postImageLabel.innerText = "+ photo";
    postImageLabel.classList.remove('border-success');
    postImageLabel.classList.remove('text-success');

}

function disablePostButton(postText, btnPost) {
    
    if (postText.value.length == 0) {

        btnPost.disabled = true;

    } else {

        btnPost.disabled = false;

    }

}

function autoSizePostTextArea(postText) {

    postText.rows = 1;

    while (postText.scrollHeight > postText.clientHeight) {

        postText.rows += 1;

    }

}

function countPostCharacters(postCharacterCount, postText) {
    
    postCharacterCount.innerText = (postText.maxLength - postText.value.length);

}
