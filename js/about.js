var myVideo = document.getElementById("stock");

function playPause() {
    if (stock.paused)
        myVideo.play();
    else
        myVideo.pause();
}

function fullScreen() {
    if (stock.requestFullScreen) {
        myVideo.requestFullScreen();
    } else if (stock.webkitRequestFullScreen) {
        myVideo.webkitRequestFullScreen();
    } else if (stock.mozRequestFullScreen) {
        myVideo.mozRequestFullScreen();
    }
}

function muteAudio() {

    if (myVideo.muted) {
        myVideo.muted = false;
    }
    else {
        myVideo.muted = true;

    }
}
