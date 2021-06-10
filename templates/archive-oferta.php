<?php

/**
 * The template for displaying archive pages
 *
 */


get_header();

echo do_shortcode('[themify_layout_part slug="header"]');

$description = get_the_archive_description();

$regiao_terms = get_terms(array(
    'taxonomy' => 'regiao',
    'hide_empty' => true,
    'orderby' => 'name',
    'order' => 'DESC'
));

$ofertas_id = laf_oa_get_lasts_ofertas('oferta', 'regiao', count($regiao_terms));
// laf_oa_debug($regiao_terms);
// laf_oa_debug(get_taxonomies());

if ($ofertas_id && count($ofertas_id) > 0) {

    $ofertas_arr = [];
    foreach ($ofertas_id as $oferta_id) {
        $regiao = get_the_terms($oferta_id, 'regiao');
        $ofertas_arr[$regiao[0]->name] = [
            'oferta_id' => $oferta_id,
            'regiao_id' => $regiao[0]->term_id,
            'regiao_name' => $regiao[0]->name,
            'regiao_slug' => $regiao[0]->slug,
        ];
    }
    krsort($ofertas_arr);
    // laf_oa_debug(($ofertas_arr));

?>

    <div class="loa loa-archive">

        <div class="loa-archive-wrapper">

            <div class="loa-archive-header">
                <h3><?php _e('SELECIONE O ENCARTE DA SUA REGIÃO E CONFIRA AS OFERTAS', 'laf-oferta-agendada'); ?></h3>
                <p><?php _e('Nossas novidades e descontos esperam por você!', 'laf-oferta-agendada'); ?></p>
            </div>
            <!-- /.loa-archive-header -->

            <div class="loa-archive-content">

                <?php foreach ($ofertas_arr as $regiao_name => $oferta) {
                ?>

                    <div class="loa-archive-item">

                        <?php $laf_oa_oferta_validade = get_post_meta($oferta['oferta_id'], 'laf_oa_oferta_validade', true); ?>

                        <div class="loa-archive-item-content">
                            <h2><?php echo $regiao_name; ?></h2>
                            <h4><?php _e('OFERTAS PARA A <br>SUA&nbsp;SEMANA', 'laf-oferta-agendada'); ?></h4>
                            <p>*<?php echo $laf_oa_oferta_validade; ?></p>
                            <a href="<?php echo get_term_link($oferta['regiao_id'], 'regiao'); ?>" class="loa-btn">
                                <?php _e('ABRIR O ENCARTE', 'laf-oferta-agendada'); ?>
                            </a>
                        </div>
                        <!-- /.loa-archive-item-content -->

                    </div>
                    <!-- /.loa-archive-item -->

                <?php } ?>

            </div>
            <!-- /.loa-archive-content -->

        </div>
        <!-- /.loa-archive-wrapper -->
    </div>
    <!-- /.loa.loa-archive -->
<?php } ?>

<?php
echo do_shortcode('[themify_layout_part slug=footer]');
get_footer();
