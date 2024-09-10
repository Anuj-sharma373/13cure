<!-- recent_highlights Section Our services -->
                    <?php
                    // Fields for layout 6
                    $articles = get_sub_field("articles");
                    $main_heading = get_sub_field("main_heading");
                    $view_all_btn = get_sub_field("view_all_btn");
                    ?>

                    <section class="rnHighlights position-relative">
                        <div class="container">
                            <?php if (!empty($main_heading)): ?>
                                <div class="hightlightsB">
                                    <div class="welComeInner text-left">
                                        <h2><?php echo $main_heading; ?></h2>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="hightlightsCarsBlock d-flex">
                                <?php foreach ($articles as $articles_group): ?>
                                    <div class="highlightsCards position-relative --darkColor--001">
                                        <?php if (!empty($articles_group['image'])): ?>
                                            <div class="highlightsImages text-center">
                                                <img src="<?php echo $articles_group['image']; ?>" class="w-100" />
                                            </div>
                                        <?php endif; ?>
                                        <div class="highlightTextArea">
                                            <?php if (!empty($articles_group['small_heading'])): ?>
                                                <p class="text-white m-0"><?php echo $articles_group['small_heading']; ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($articles_group['heading'])): ?>
                                                <h5 class="text-white"><?php echo $articles_group['heading']; ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($articles_group['content'])): ?>
                                                <p class="text-white m-0"><?php echo $articles_group['content']; ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($articles_group['button'])): ?>
                                                <div class="readMore position-relative">
                                                    <a href="<?php echo esc_url($articles_group['button']['url']); ?>"
                                                        class="d-block text-white text-uppercase text-decoration-none fw-semibold"><?php echo $articles_group['button']['title']; ?></a>
                                                    <div class="line position-relative"></div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if (!empty($view_all_btn)): ?>
                                <div class="view-all-btn"><a class="btn btn-primary rounded-pill redButton text-uppercase"
                                        href="<?php echo esc_url($view_all_btn['url']); ?>"><?php echo $view_all_btn['title']; ?></a></div>
                            <?php endif; ?>
                        </div>
                    </section>