const postText = document.querySelector("#postText");
const postCharacterCount = document.querySelector("#postCharacterCount");

postCharacterCount.innerText = (postText.maxLength - postText.value.length);

postText.addEventListener('input', function(event) {

    postCharacterCount.innerText = (postText.maxLength - postText.value.length);

});
