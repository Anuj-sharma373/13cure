<!-- partner section Our Services -->
                    <?php
                    // Fields for layout 7
                    $heading = get_sub_field("heading");
                    $sub_heading = get_sub_field("sub_heading");
                    $partners = get_sub_field("partners");
                    $second_sub_heading = get_sub_field("second_sub_heading");
                    $second_repeater = get_sub_field("second_repeater");
                    ?>

                    <section class="ourPartnershipsBlock">
                        <div class="container">
                            <div class="partnerShip">
                                <div class="welComeInner text-left">
                                    <?php if (!empty($heading)): ?>
                                        <h2><?php echo $heading; ?></h2>
                                    <?php endif; ?>
                                </div>

                                <div class="brandPartners mr-auto ml-auto">
                                    <?php if (!empty($sub_heading)): ?>
                                        <h5 class="d-block text-center"><?php echo $sub_heading; ?></h5>
                                    <?php endif; ?>
                                    <div class="row">
                                        <?php foreach ($partners as $partners_group): ?>
                                            <?php if (!empty($partners_group['image'])): ?>
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                                                    <div class="brandCard">
                                                        <div class="brandIcons">
                                                            <img src="<?php echo $partners_group['image']; ?>" alt="" class="w-100  " />
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="brandPartners mr-auto ml-auto">
                                    <?php if (!empty($second_sub_heading)): ?>
                                        <h5 class="d-block text-center"><?php echo $second_sub_heading; ?></h5>
                                    <?php endif; ?>
                                    <div class="row">
                                        <?php foreach ($second_repeater as $second_repeater_group): ?>
                                            <?php if (!empty($second_repeater_group['image'])): ?>
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                                                    <div class="brandCard">
                                                        <div class="brandIcons">
                                                            <img src="<?php echo $second_repeater_group['image']; ?>" alt="" class="w-100  " />
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>