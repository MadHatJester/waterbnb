// Get the modal
var modal = document.getElementById("myModal");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("poof")[0];

window.onload = function () {
    if (localStorage.getItem("hasCodeRunBefore") === null) {
        modal.style.display = "block";
        localStorage.setItem("hasCodeRunBefore", true);
    } else {
        modal.style.display = "none";
    }
}
// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
