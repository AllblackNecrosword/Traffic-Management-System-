// file: js/script.js

let popup = document.getElementById("popup");

function openPopup() {
  popup.classList.add("open-popup");
}

function closePopup() {
  popup.classList.remove("open-popup");
}

document.querySelector(".button-text").addEventListener("click", openPopup);
document.getElementById("button").addEventListener("click", closePopup);
  