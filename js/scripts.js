
// contact module 

document.addEventListener("DOMContentLoaded", function() {

const contactLink = document.querySelector('.contact');
const contactModale = document.getElementById('contact-modale');
const contactButton = document.getElementById('contact-button');


contactLink.onclick = function() {
    contactModale.style.display = "block";
}

contactButton.onclick = function() {
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

// reference autoinput 

    jQuery(document).ready(function($) {
        // Get the PHP variable value
        var referenceValue = php_vars.reference;

        // Set the value as the content of the label with ID "ref"
        $("#ref").val(referenceValue);
    });

