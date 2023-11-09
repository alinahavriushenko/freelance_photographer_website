
// contact module 

document.addEventListener("DOMContentLoaded", function() {

const contactLink = document.querySelector('.contact');
const contactModale = document.getElementById('contact-modale');

contactLink.onclick = function() {
    contactModale.style.display = "block";
}

function closeModale() {
    contactModale.style.display = "none";
}

window.addEventListener("click", (event) => {
  if (event.target === contactModale) {
    closeModale();
  }
});
})