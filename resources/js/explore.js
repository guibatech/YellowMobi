const contentToShare = document.querySelector("#contentToShare");
const currentContentSize = document.querySelector("#currentContentSize");

currentContentSize.innerText = calculateAvailableSize(parseInt(contentToShare.maxLength), parseInt(contentToShare.value.length));

textAlert(currentContentSize, sizeForAlert(parseInt(currentContentSize.innerHTML), parseInt(contentToShare.maxLength)));

contentToShare.addEventListener('input', function(event) {

    currentContentSize.innerText = calculateAvailableSize(parseInt(contentToShare.maxLength), parseInt(contentToShare.value.length));

    textAlert(currentContentSize, sizeForAlert(parseInt(currentContentSize.innerHTML), parseInt(contentToShare.maxLength)));

});

function calculateAvailableSize(maximumSize, currentSize) {

    return maximumSize - currentSize;

}

function sizeForAlert(currentSize, maximumSize) {

    if (currentSize <= (maximumSize / 5)) {

        return true;

    }

    return false;

}

function textAlert(element, result) {

    if (result) {

        element.classList.add('text-danger');

    } else {

        element.classList.remove('text-danger');

    }

}
