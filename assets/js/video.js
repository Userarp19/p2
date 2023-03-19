
const video = document.getElementById("mi-video");
const boton = document.getElementById("mi-boton");
document.getElementById("videoboton").style.display = "none";

video.addEventListener("timeupdate", function() {
    console.log(video.currentTime)
    if (video.currentTime >= 40 && video.currentTime < 44) {
        document.getElementById("videoboton").style.display = "block";
    } else {
        document.getElementById("videoboton").style.display = "none";
    }
});