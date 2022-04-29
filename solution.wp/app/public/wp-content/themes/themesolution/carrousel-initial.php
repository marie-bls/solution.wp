<!-------------------------------------- CARROUSEL ---------------------------------------------------------->


<div >
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img src="<?php echo get_template_directory_uri(); ?>/img/header1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <img src="<?php echo get_template_directory_uri(); ?>/img/header2.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <img src="<?php echo get_template_directory_uri(); ?>/img/header3.png" class="d-block w-100" alt="...">
        </div>
    </div>
</div>