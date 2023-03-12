const postText = document.querySelector("#postText");
const postCharacterCount = document.querySelector("#postCharacterCount");
const postImage = document.querySelector("#postImage");
const postImageLabel = document.querySelector("#postImageLabel");

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
