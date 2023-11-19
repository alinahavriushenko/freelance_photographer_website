
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
            loadAllPhotos(); // Load all photos on initial load
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
