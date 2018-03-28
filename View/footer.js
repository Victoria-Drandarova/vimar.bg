var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("footerBtn1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("end")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal21 = document.getElementById('myModal21');

// Get the button that opens the modal
var btn = document.getElementById("footerBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("end")[1];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal21.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal21.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal21) {
        modal21.style.display = "none";
    }
}

var modal22 = document.getElementById('myModal22');

// Get the button that opens the modal
var btn = document.getElementById("footerBtn3");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("end")[2];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal22.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal22.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal22) {
        modal22.style.display = "none";
    }
}