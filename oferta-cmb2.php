<?php

add_action('cmb2_admin_init', 'laf_oa_oferta_cmb');

function laf_oa_oferta_cmb()
{

    $oferta = new_cmb2_box(array(
        'id'            => 'laf_oa_oferta_options',
        'title'         => esc_html__('Opções da oferta', 'laf-oferta-agendada'),
        'object_types'  => array('oferta'), // Post type
        // 'context'    => 'normal',
        'priority'   => 'high',

    ));

    $oferta->add_field(array(
        'name'     => esc_html__('Região', 'laf-oferta-agendada'),
        'desc'     => esc_html__('Selecione a Região da Oferta', 'laf-oferta-agendada'),
        'id'       => 'laf_oa_regiao_oferta',
        'type'     => 'taxonomy_radio', // Or `taxonomy_radio_inline`/`taxonomy_radio_hierarchical`
        'taxonomy' => 'regiao', // Taxonomy Slug
        // 'inline'  => true, // Toggles display to inline
        // Optionally override the args sent to the WordPress get_terms function.
        'query_args' => array(
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => false,
        ),
        'show_option_none' => false,
        'attributes'    => array(
            'required'      => 'required'
        )
    ));



    $oferta->add_field(array(
        'name'         => esc_html__('Tablóide', 'laf-oferta-agendada'),
        'desc'         => esc_html__('Faça o upload das imagens do tablóide.', 'laf-oferta-agendada'),
        'id'           => 'laf_oa_oferta_tabloide',
        'type'         => 'file_list',
        'preview_size' => array(100, 100), // Default: array( 50, 50 ),
        'attributes'    => array(
            'required'      => 'required'
        )
    ));

    $oferta->add_field(array(
        'name'         => esc_html__('Texto descrevendo a validade da oferta', 'laf-oferta-agendada'),
        'desc'         => esc_html__('Por ex: "Válidas em 02/06/2021 e 03/06/2021".', 'laf-oferta-agendada'),
        'id'           => 'laf_oa_oferta_validade',
        'type'         => 'text',
        'attributes'    => array(
            'required'      => 'required',
            'placeholder' => 'Válidas em 02/06/2021 e 03/06/2021'
        )
    ));
}

// add_action('cmb2_admin_init', 'laf_oa_regiao_cmb');

function laf_oa_regiao_cmb()
{

    $regiao = new_cmb2_box(array(
        'id'               => 'laf_oa_regiao_options',
        'title'            => esc_html__('Opções da Região', 'laf-oferta-agendada'), // Doesn't output for term boxes
        'object_types'     => array('term'), // Tells CMB2 to use term_meta vs post_meta
        'taxonomies'       => array('regiao'), // Tells CMB2 which taxonomies should have these fields
        'new_term_section' => true, // Will display in the "Add New Category" section
    ));

    $regiao->add_field(array(
        'name' => esc_html__('Imagem', 'laf-oferta-agendada'),
        // 'desc' => esc_html__('field description (optional)', 'laf-oferta-agendada'),
        'id'   => 'laf_oa_term_avatar',
        'type' => 'file',
        'attributes'    => array(
            'required'      => 'required'
        )
    ));
}
