<div class="header-slider header-slider-preloader" id="header-slider">
    <div id="banner_bg_effect" class="banner_effect"></div>
    <div class="animation-slide owl-carousel owl-theme" id="animation-slide">

    <?php
    $i=0;
    foreach ($slider as $key => $value) {
        $title =  isset($lang) && $lang =="french"?$value->title_fr:$value->title_en;
        $text =  isset($lang) && $lang =="french"?$value->text_fr:$value->text_en;
        $button =  isset($lang) && $lang =="french"?$value->button_fr:$value->button_en;
        $custom_url = $value->custom_url;
    ?>
    <?php if ($i==0) { ?>
        <!-- Slide 1-->
        <div class="item slide-one" style="background-image: url(<?php echo IMAGEPATH.$value->slider_img; ?>)">
            <div class="slide-table">
                <div class="slide-tablecell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide-text">
                                    <h2><?php echo htmlspecialchars_decode($title); ?></h2>
                                    <div><?php echo htmlspecialchars_decode($text); ?></div>
                                    <div class="slide-buttons">
                                        <a href="<?php echo htmlspecialchars_decode($custom_url); ?>" class="slide-btn btn-kingfisher-daisy"><?php echo htmlspecialchars_decode($button); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } elseif ($i==1) { ?>
        <!-- Slide 2-->
        <div class="item slide-two" style="background-image: url(<?php echo IMAGEPATH.$value->slider_img; ?>)">
            <div class="slide-table">
                <div class="slide-tablecell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide-text">
                                    <h2><?php echo htmlspecialchars_decode($title); ?></h2>
                                    <div><?php echo htmlspecialchars_decode($text); ?></div>
                                    <div class="slide-buttons">
                                        <a href="<?php echo htmlspecialchars_decode($custom_url); ?>" class="slide-btn btn-kingfisher-daisy"><?php echo htmlspecialchars_decode($button); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } else{ ?>
        <!-- Slide 3-->
        <div class="item slide-three" style="background-image: url(<?php echo IMAGEPATH.$value->slider_img; ?>)">
            <div class="slide-table">
                <div class="slide-tablecell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide-text">
                                    <h2><?php echo htmlspecialchars_decode($title); ?></h2>
                                    <div><?php echo htmlspecialchars_decode($text); ?></div>
                                    <div class="slide-buttons">
                                        <a href="#<?php echo htmlspecialchars_decode($custom_url); ?>" class="slide-btn btn-kingfisher-daisy"><?php echo htmlspecialchars_decode($button); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }  $i++; } ?>



    </div>
    <!-- /.End of slider -->
    <!-- Preloader -->
    <div class="slider_preloader">
        <div class="slider_preloader_status">&nbsp;</div>
    </div>
</div>

<!-- /.End of tricker -->
<div class="price-spike">
    <div class="container">
        <div class="row" id="token_cards_list">
            <?php foreach ($coin as $key => $value) { ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="imagine-card">
                    <?php if ($value->article_id) { ?>
                    <a href="<?php echo base_url("article-token/$value->id"); ?>">
                    <?php } ?>
                        <div class="imagine-card-head">
                            <div class="imagine-card-logo">
                                <img src="<?php echo $value->image?IMAGEPATH.$value->image:$value->url; ?>" alt="<?php echo esc($value->full_name); ?>">
                            </div>
                            <div>
                                <div class="imagine-card-name"><?php echo esc($value->symbol); ?></div>
                                <div class="imagine-card-date"><?php echo esc($value->full_name); ?></div>
                            </div>
                        </div>
                        <div class="imagine-card-bottom">
                            <div class="imagine-card-chart">
                                <span class="bdtasksparkline value_graph" id="GRAPH_<?php echo esc($value->symbol); ?>"></span>
                            </div>
                            <div>
                                <div class="imagine-card-change">
                                    <span class="Percent" id="CHANGE24HOURPCT_<?php echo esc($value->symbol); ?>"></span>
                                    <div class="imagine-card-points">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php if ($value->article_id) { ?>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php
        if ($number_token_cards < $number_all_tokens) {
        ?>
            <div class="d-flex justify-content-center">
                <div class="text-primary" style="text-decoration: underline; cursor: pointer" id="see_more_cards">More Listed Tokens</div>
                <div class="spinner-border text-primary spinner-border-sm" role="status" style="display:none" id="see_more_loading">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!--  ./End of price spike -->

<!-- /.End of live exchange -->