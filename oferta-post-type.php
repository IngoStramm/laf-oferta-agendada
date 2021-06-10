<?php

function laf_oa_oferta()
{
    $oferta = new LAF_OA_Post_Type(
        'Oferta', // Nome (Singular) do Post Type.
        'oferta' // Slug do Post Type.
    );

    $oferta->set_labels(
        array(
            'view_item'          => __('Ver', 'laf-oferta-agendada'),
            'edit_item'          => __('Editar', 'laf-oferta-agendada'),
            'search_items'       => __('Pesquisar', 'laf-oferta-agendada'),
            'update_item'        => __('Atualizar', 'laf-oferta-agendada'),
            'parent_item_colon'  => __('Pai:', 'laf-oferta-agendada'),
            'add_new'            => __('Adicionar nova', 'laf-oferta-agendada'),
            'add_new_item'       => __('Adicionar nova', 'laf-oferta-agendada'),
            'new_item'           => __('Nova', 'laf-oferta-agendada'),
            'all_items'          => __('Todas', 'laf-oferta-agendada'),
            'not_found'          => __('Nenhuma encontrada', 'laf-oferta-agendada'),
            'not_found_in_trash' => __('Nenhuma encontrada na lixeir', 'laf-oferta-agendada')

        )
    );

    $oferta->set_arguments(
        array(
            'supports' => array('title', 'revisions')
        )
    );
}

add_action('init', 'laf_oa_oferta', 1);

function laf_oa_regiao()
{
    $regiao = new LAF_OA_Taxonomy(
        'Região', // Nome (Singular) da nova Taxonomia.
        'regiao', // Slug do Taxonomia.
        'oferta' // Nome do tipo de conteúdo que a taxonomia irá fazer parte.
    );

    $regiao->set_labels(
        array(
            'name'                       => __('Regiões', 'laf-oferta-agendada'),
            'singular_name'              => __('Região', 'laf-oferta-agendada'),
            'add_or_remove_items'        => __('Adicionar or Remove Regiões', 'laf-oferta-agendada'),
            'view_item'                  => __('Ver Região', 'laf-oferta-agendada'),
            'edit_item'                  => __('Editar Região', 'laf-oferta-agendada'),
            'search_items'               => __('Pesquisar Região', 'laf-oferta-agendada'),
            'update_item'                => __('Atualizar Região', 'laf-oferta-agendada'),
            'parent_item'                => __('Região Pai:', 'laf-oferta-agendada'),
            'parent_item_colon'          => __('Região Pai:', 'laf-oferta-agendada'),
            'menu_name'                  => __('Regiões', 'laf-oferta-agendada'),
            'add_new_item'               => __('Adicionar Nova Região', 'laf-oferta-agendada'),
            'new_item_name'              => __('Nova Região', 'laf-oferta-agendada'),
            'all_items'                  => __('Todas Regiões', 'laf-oferta-agendada'),
            'separate_items_with_commas' => __('Separe as Regiões com vírgula', 'laf-oferta-agendada'),
            'choose_from_most_used'      => __('Selecione a partir das Regiões mais usadas', 'laf-oferta-agendada')
        )
    );

    $regiao->set_arguments(
        array(
            'hierarchical' => true
        )
    );
}

add_action('init', 'laf_oa_regiao', 1);