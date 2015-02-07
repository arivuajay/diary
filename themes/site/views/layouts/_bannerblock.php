<?php
$banners = Myclass::getBannerImages($layout, $position, $dimension);
$exp_dimen = explode('*', $dimension);

if (!empty($banners)) {
    ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php foreach ($banners as $key => $banner) { ?>
            <div class="item <?php echo $key == 0 ? 'active' : ''?>" style="width: <?php echo $exp_dimen[0]?>px; height: <?php echo $exp_dimen[1]?>px">
                    <?php
                    echo CHtml::link(
                            CHtml::image(
                                    $this->createUrl("/themes/site/image/banners/" . $banner->banner_path . $banner->banner_image), 
                                    $banner->banner_title 
                            ), 
                            $banner->banner_url,
                            array(
                                'target' => '_blank',
                                'title' => $banner->banner_title
                            )
                        )
                    ?>
                </div>
            <?php } ?>

        </div>
    </div>

<?php } ?>



