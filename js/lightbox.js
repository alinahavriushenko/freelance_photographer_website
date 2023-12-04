jQuery(document).ready(function($) {
    const lightbox = $('.lightbox');
    const lightboxClose = $('.lightbox-close');
    const lightboxNext = $('.lightbox-next');
    const lightboxPrev = $('.lightbox-prev');
    const lightboxImage = $('.lightbox-image');
    const lightboxReference = $('.lightbox-reference');
    const lightboxCategories = $('.lightbox-categories');

    const photosData = $('#photos-data');
    const photos = photosData.data('photos');

    let currentPhotoIndex = 0;

    const showImage = function(index) {
        const photo = photos[index];
        const imageUrl = photo.image;
        lightboxImage.attr('src', imageUrl);
        lightboxReference.text(photo.reference);

        let categoriesText = '';
        if (photo.categories) {
            photo.categories.forEach(function(category) {
                categoriesText += category.name + ' ';
            });
        }
        lightboxCategories.text(categoriesText);
    };

    lightboxClose.on('click', function() {
        lightbox.hide();
    });

    lightboxNext.on('click', function() {
        currentPhotoIndex = (currentPhotoIndex + 1) % photos.length;
        showImage(currentPhotoIndex);
    });

    lightboxPrev.on('click', function() {
        currentPhotoIndex = (currentPhotoIndex - 1 + photos.length) % photos.length;
        showImage(currentPhotoIndex);
    });

    $(document).on('click', '.lightbox-trigger', function(event) {
    event.preventDefault();
    const imageUrl = $(this).data('image');
    lightboxImage.attr('src', imageUrl);
    lightbox.show();

    const clickedImageUrl = $(this).data('image');
    const index = photos.findIndex(photo => photo.image === clickedImageUrl);

    if (index !== -1) {
        currentPhotoIndex = index;
        showImage(currentPhotoIndex);
    }
});
});
