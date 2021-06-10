<?php

/**
 * The template for displaying all single posts
 *
 */

get_header();
echo do_shortcode('[themify_layout_part slug="header"]');

$queried_object = get_queried_object();
$term_id = $queried_object->term_id;
$last_oferta_id = laf_oa_get_lasts_ofertas('oferta', 'regiao', 1, $term_id);

if ($last_oferta_id) { ?>

    <?php
    $last_oferta_id = $last_oferta_id[0];
    $laf_oa_slides = get_post_meta($last_oferta_id, 'laf_oa_oferta_tabloide', true);
    $laf_oa_oferta_validade = get_post_meta($last_oferta_id, 'laf_oa_oferta_validade', true);

    // laf_oa_debug($laf_oa_slides);
    // laf_oa_debug($laf_oa_oferta_validade);
    ?>

    <div class="loa loa-taxonomy">

        <div class="loa-taxonomy-wrapper">

            <div class="glider-contain">

                <div class="glider">
                    <?php if ($laf_oa_slides) { ?>
                        <?php $index = 1; ?>
                        <?php foreach ($laf_oa_slides as $laf_oa_slide) { ?>

                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="<?php echo $index; ?>">
                                <div class="slide-inner-wrap">
                                    <div class="slide-image">
                                        <a href="<?php echo $laf_oa_slide; ?>" class="themify_lightbox">
                                            <img src="<?php echo $laf_oa_slide; ?>" decoding="async" class="loa-img">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php $index++; ?>
                        <?php } ?>
                    <?php } ?>
                </div>
                <!-- /.glider -->

                <button aria-label="Previous" class="glider-prev"></button>
                <button aria-label="Next" class="glider-next"></button>
                <div role="tablist" class="dots"></div>

            </div>
            <!-- /.glider-contain -->

            <div class="loa-taxonomy-text">
                    <p>*<?php echo __('Ofertas', 'laf-oferta-agendada') . ' ' . strtolower($laf_oa_oferta_validade); ?></p>
            </div>


        </div>
        <!-- /.loa-taxonomy-wrapper -->


    </div>
    <!-- /.loa loa-taxonomy -->


<?php }

echo do_shortcode('[themify_layout_part slug=footer]');
get_footer();
