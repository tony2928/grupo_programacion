let image_in_fullscreen = document.getElementById('image-in-fullscreen');
let image_fullscreen = document.getElementById('image-fullscreen');
let body = document.getElementById('body');

function viewFull(imgRoute) {
    console.log(imgRoute);
    image_in_fullscreen.src = imgRoute;
    image_fullscreen.style.display = 'block';
    body.style.overflow = 'hidden';
    var windowY = window.scrollY || window.pageYOffset;
    var windowX = window.scrollX || window.pageXOffset;
    image_fullscreen.style.top = windowY + 'px';
    image_fullscreen.style.left = windowX + 'px';
}

function exitFull() {
    image_fullscreen.style.display = 'none';
    body.style.overflow = 'auto';
}

function toHome() {
    window.location.href = 'index.html';
}