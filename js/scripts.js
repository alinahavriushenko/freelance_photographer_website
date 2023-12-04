// mobile menu

class MobileMenu {
    constructor() {
        this.mobileMenu = document.querySelector(".mobile-menu");
        this.toggleButton = document.querySelector(".mobile-menu-trigger i");
 
        this.toggleButton.addEventListener("click", () => this.toggleMobileMenu());
    }
 
    toggleMobileMenu() {
        this.toggleButton.classList.toggle("fa-bars");
        this.toggleButton.classList.toggle("fa-xmark");

        if (this.mobileMenu.style.display === "block") {
            this.mobileMenu.style.display = "none";
        } else {
            this.mobileMenu.style.display = "block";
        }
    }
}

const mobileMenu = new MobileMenu();



// contact module 

document.addEventListener("DOMContentLoaded", function() {

const contactLink = document.querySelector('.contact');
const contactLinkMob = document.querySelector('.contact-mobile');
const contactModale = document.getElementById('contact-modale');
const contactButton = document.getElementById('contact-button');


if (contactLink) {contactLink.onclick = function() {
    contactModale.style.display = "block";
}}

if (contactLinkMob) {
    contactLinkMob.onclick = function() {
        contactModale.style.display = "block";
    }
}

if (contactButton) {
contactButton.onclick = function() {
    contactModale.style.display = "block";
}}

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
        var referenceValue = php_vars.reference;

        $("#ref").val(referenceValue);
    });

// filter phots

jQuery(function($) {

    // Function to update photos based on selected filters
    function updatePhotos(category, format, sortByDate) {
        $.ajax({
            url: load_more_params.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_photos',
                category: category,
                format: format,
                sortByDate: sortByDate
            },
            success: function(response) {
                $('#photo-gallery').html(response);
            }
        });
    }

    // Load all photos
    function loadAllPhotos() {
        $.ajax({
            url: load_more_params.ajax_url,
            type: 'GET',
            data: {
                action: 'load_all_photos'
            },
            success: function(response) {
                $('#photo-gallery').html(response);
            }
        });
    }

    // Load categories
    $.ajax({
        url: load_more_params.ajax_url,
        type: 'GET',
        data: {
            action: 'get_categories'
        },
        success: function(response) {
            $('#categories-select').html(response);
            loadAllPhotos();
        }
    });

    // Load formats
    $.ajax({
        url: load_more_params.ajax_url,
        type: 'GET',
        data: {
            action: 'get_formats'
        },
        success: function(response) {
            $('#formats-select').html(response);
        }
    });

    // Update photos
    $('#categories-select, #formats-select, #sort-by-date-select').on('change', function() {
        var category = $('#categories-select').val();
        var format = $('#formats-select').val();
        var sortByDate = $('#sort-by-date-select').val();

        updatePhotos(category, format, sortByDate);
    });
});

// photo preview on hover

jQuery(document).ready(function($) {
    $('.prev-post').hover(function() {
        $('.prev-thumbnail').fadeIn('fast');
        $('.next-thumbnail').hide();
    }, function() {
        $('.prev-thumbnail').fadeOut('fast');
    });

    $('.next-post').hover(function() {
        $('.next-thumbnail').fadeIn('fast');
        $('.prev-thumbnail').hide();
    }, function() {
        $('.next-thumbnail').fadeOut('fast');
    });
});

