<?php get_header() ?>

<!-- hero -->
<!-- <div>
    <img src='/wp-content/uploads/2023/11/nathalie-11-scaled.jpeg' />

</div> -->

<div class="photo-filters">
    <div class="taxonomies">
        <form class="filter" tabindex="0">
            <label for="categories-select">Catégories</label>
            <select id="categories-select">
                <option value=""></option>
            </select>
        </form>
        <form class="filter">
            <label for="formats-select">Formats</label>
            <select id="formats-select">
                <option value=""></option>
            </select>
        </form>
    </div>

    <form class="filter">
        <label for="sort-by-date-select">Trier par</label>
        <select id="sort-by-date-select">
            <option value=""></option>
            <option value="DESC">Plus récentes</option>
            <option value="ASC">Plus anciennes</option>
        </select>
    </form>

</div>


<div class="all-photos" id="photo-gallery">
</div>

<div class="load-more-btn-container">
    <form id="load-more-btn" class="btn" data-page="1">Charger plus</form>
</div>

<?php get_footer() ?>