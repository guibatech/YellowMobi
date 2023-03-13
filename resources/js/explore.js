const postText = document.querySelector("#postText");
const postCharacterCount = document.querySelector("#postCharacterCount");
const postImage = document.querySelector("#postImage");
const postImageLabel = document.querySelector("#postImageLabel");
const postTextareaContainer = document.querySelector("#postTextareaContainer");
const btnPost = document.querySelector("#btnPost");
const baseUrl = window.location.origin;
const csrfToken = document.querySelector("input[name='_token']").value;
const postMessageBox = document.querySelector("#postMessageBox");

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

btnPost.addEventListener('click', function(event) {

    event.preventDefault();

    let formData = new FormData();
    formData.append('postText', postText.value);

    if (postImage.files.length == 1) {
        
        formData.append('postImage', postImage.files[0]);

    }

    fetch(`${baseUrl}/post/do`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
        body: formData
    }).then(function(metaDataResponse) {

        return metaDataResponse.json();

    }).then(function(data) {

        if (data.status == "success") {

            clearPostText();
            disableBtnPost();
            clearPostImage();
            showAlert("We're sure the world will love to read what you have to say!");

            return;

        }

        if (data.status == "error") {

            showAlert(data.system);

            return;

        }

    });

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

function clearPostText() {

    postText.value = "";
    resizePostText();

}

function showAlert(message) {

    let messageContainer = `
    <div class="alert alert-primary fade show cursor-pointer text-center" role="alert" data-bs-dismiss="alert">
        <div>
            ${message}
        </div>
    </div>
    `;

    postMessageBox.innerHTML = messageContainer;

}
