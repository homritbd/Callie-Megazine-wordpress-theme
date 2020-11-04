<?php 

define('CALLIE_CUSTOMIZER_CONFIG_ID', 'Callie_customizer_settings');
define('CALLIE_CUSTOMIZER_PANEL_ID', 'Callie_customizer_panel');

if ( class_exists( 'Kirki' ) ) {
    Kirki::add_config( CALLIE_CUSTOMIZER_CONFIG_ID, array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );
    
    Kirki::add_section( 'callie_section_id', array(
        'title'          => esc_html__( 'Callie Background', 'callie' ),
        'description'    => esc_html__( 'You can add background image or colors in your theme as you can.', 'callie' ),
        'priority'       => 160,
    ) );
    
    Kirki::add_field( CALLIE_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'background',
        'settings'    => 'background_setting',
        'label'       => esc_html__( 'Background Control', 'callie' ),
        'description' => esc_html__( 'Background conrols are pretty complex - but extremely useful if properly used.', 'callie' ),
        'section'     => 'callie_section_id',
        'default'     => [
            'background-color'      => '#ffffff',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ] );

    Kirki::add_panel( CALLIE_CUSTOMIZER_PANEL_ID, array(
        'priority'    => 10,
        'title'       => esc_html__( 'Callie Theme Settings', 'callie' ),
    ) );

    Kirki::add_section( 'callie_theme_single_post_settings_section', array(
        'title'          => esc_html__( 'Single posts', 'callie' ),
        'description'    => esc_html__( 'Related posts information here.', 'callie' ),
        'panel'          => CALLIE_CUSTOMIZER_PANEL_ID,
        'priority'       => 160,
    ) );

    Kirki::add_field( CALLIE_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'related_post_switch_setting',
        'label'       => esc_html__( 'Related posts section', 'callie' ),
        'section'     => 'callie_theme_single_post_settings_section',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Enable', 'callie' ),
            'off' => esc_html__( 'Disable', 'callie' ),
        ],
    ] );

    Kirki::add_field( CALLIE_CUSTOMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'related_post_text_setting',
        'label'    => esc_html__( 'Related posts section Title', 'callie' ),
        'section'  => 'callie_theme_single_post_settings_section',
        'default'  => esc_html__( 'Related posts', 'callie' ),
        'priority' => 10,
        'active_callback'   =>[
            [
                'setting'   =>'related_post_switch_setting',
                'operator'  =>'==',
                'value'     =>true
            ]
        ]
    ] );

}
