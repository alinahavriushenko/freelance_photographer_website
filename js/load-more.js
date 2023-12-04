// load more button 

jQuery(function($) {
    $('#load-more-btn').on('click', function() {
        var page = $(this).data('page') + 1;
        var ajaxurl = load_more_params.ajax_url;

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                page: page,
                action: 'load_more_photos'
            },
            success: function(response) {
                if (response) {
                    $('.all-photos').append(response); 
                    $('#load-more-btn').data('page', page);
                } else {
                    $('#load-more-btn').hide();
                }
            }
        });
    });
});



