<?php
/*
 * File Name: Brand Corporate Section
 * Theme Name: BRT Zh Theme
 */

$brand_heading = get_sub_field("brand_heading");
$brand_slide = get_sub_field("brand_slide");
$corporate_heading = get_sub_field("corporate_heading");
$corporate_slide = get_sub_field("corporate_slide");

// Number of slides per page
$slides_per_page = 4;

// Calculate total pages for brand slides
$total_brand_pages = ceil(count($brand_slide) / $slides_per_page);

// Calculate total pages for corporate slides
$total_corporate_pages = ceil(count($corporate_slide) / $slides_per_page);

?>
<!-- Ensure jQuery is included before your custom script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="path/to/your/custom/script.js"></script>

<section class="ourPartnershipsBlock partnerShipBrands">
    <div class="container">
        <div class="partnerShip">

            <!-- Brand Partners Section -->
            <div id="brand" class="brandPartners mr-auto ml-auto">
                <?php if(!empty($brand_heading)) { ?>
                <h5 class="d-block text-center"><?php echo $brand_heading; ?></h5>
                <?php } ?>
                <div class="row brandSlides">
                    <?php
                    // Loop through brand slides
                    $slide_count = 0;
                    foreach($brand_slide as $brand_slide_group) {
                    ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="brandCard">
                            <?php if(!empty($brand_slide_group['image'])) { ?>    
                            <div class="brandIcons">
                                <img src="<?php echo $brand_slide_group['image']; ?>" alt="" class="w-100">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                        $slide_count++; 
                    }
                    ?>
                </div>

                <!-- Pagination controls for Brand Partners -->
                <?php if ($total_brand_pages > 1) { ?>
                <div class="pagination-controls nextpagesBtn d-flex align-items-center mt-3">
                    <button class="btn-prev-brand btn btn-primary comman-main-pre" <?php echo $currentBrandPage === 1 ? 'disabled' : ''; ?>><span></span></button>
                    <p class="m-0 text-uppercase page-indicator-brand comman-main-count">Page 1/<?php echo $total_brand_pages; ?></p>
                    <button class="btn-next-brand btn btn-primary comman-next" <?php echo $currentBrandPage === $total_brand_pages ? 'disabled' : ''; ?>><span></span></button>
                </div>
                <?php } ?>
            </div>

            <!-- Corporate Partners Section -->
            <div id="corporate" class="brandPartners mr-auto ml-auto">
                <?php if(!empty($corporate_heading)) { ?>
                <h5 class="d-block text-center"><?php echo $corporate_heading; ?></h5>
                <?php } ?>
                <div class="row corporateSlides">
                    <?php
                    // Loop through corporate slides
                    $slide_count = 0;
                    foreach($corporate_slide as $corporate_slide_group) {
                    ?>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="brandCard">
                            <?php if(!empty($corporate_slide_group['image'])) { ?>    
                            <div class="brandIcons">
                                <img src="<?php echo $corporate_slide_group['image']; ?>" alt="" class="w-100">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                        $slide_count++;
                    }
                    ?>
                </div>

                <!-- Pagination controls for Corporate Partners -->
                <?php if ($total_corporate_pages > 1) { ?>
                <div class="pagination-controls nextpagesBtn d-flex align-items-center mt-3">
                    <button class="btn-prev-corporate btn btn-primary comman-pre" <?php echo $currentCorporatePage === 1 ? 'disabled' : ''; ?>><span></span></button>
                    <p class="m-0 text-uppercase page-indicator-corporate comman-main-count">Page 1/<?php echo $total_corporate_pages; ?></p>
                    <button class="btn-next-corporate btn btn-primary comman-next" <?php echo $currentCorporatePage === $total_corporate_pages ? 'disabled' : ''; ?>><span></span></button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<script>
jQuery(document).ready(function($) {
    var currentBrandPage = 1;
    var totalBrandPages = <?php echo $total_brand_pages; ?>;
    var currentCorporatePage = 1;
    var totalCorporatePages = <?php echo $total_corporate_pages; ?>;
    var slidesPerPage = <?php echo $slides_per_page; ?>;

    // Function to show brand slides based on current page
    function showBrandSlides(page) {
        $('.brandSlides .col-xxl-3').hide();
        var startIndex = (page - 1) * slidesPerPage;
        $('.brandSlides .col-xxl-3').slice(startIndex, startIndex + slidesPerPage).show();
    }

    // Function to show corporate slides based on current page
    function showCorporateSlides(page) {
        $('.corporateSlides .col-xxl-3').hide();
        var startIndex = (page - 1) * slidesPerPage;
        $('.corporateSlides .col-xxl-3').slice(startIndex, startIndex + slidesPerPage).show();
    }

    // Initial page load
    showBrandSlides(currentBrandPage);
    showCorporateSlides(currentCorporatePage);

    // Next button click for Brand Partners
    $('.btn-next-brand').click(function() {
        if (currentBrandPage < totalBrandPages) {
            currentBrandPage++;
            showBrandSlides(currentBrandPage);
            updateBrandPaginationControls();
        }
    });

    // Previous button click for Brand Partners
    $('.btn-prev-brand').click(function() {
        if (currentBrandPage > 1) {
            currentBrandPage--;
            showBrandSlides(currentBrandPage);
            updateBrandPaginationControls();
        }
    });

    // Next button click for Corporate Partners
    $('.btn-next-corporate').click(function() {
        if (currentCorporatePage < totalCorporatePages) {
            currentCorporatePage++;
            showCorporateSlides(currentCorporatePage);
            updateCorporatePaginationControls();
        }
    });

    // Previous button click for Corporate Partners
    $('.btn-prev-corporate').click(function() {
        if (currentCorporatePage > 1) {
            currentCorporatePage--;
            showCorporateSlides(currentCorporatePage);
            updateCorporatePaginationControls();
        }
    });

    // Update pagination controls for Brand Partners
    function updateBrandPaginationControls() {
        $('.page-indicator-brand').text('Page ' + currentBrandPage + '/' + totalBrandPages);
        $('.btn-prev-brand').prop('disabled', currentBrandPage === 1);
        $('.btn-next-brand').prop('disabled', currentBrandPage === totalBrandPages);
    }

    // Update pagination controls for Corporate Partners
    function updateCorporatePaginationControls() {
        $('.page-indicator-corporate').text('Page ' + currentCorporatePage + '/' + totalCorporatePages);
        $('.btn-prev-corporate').prop('disabled', currentCorporatePage === 1);
        $('.btn-next-corporate').prop('disabled', currentCorporatePage === totalCorporatePages);
    }
});
</script>

