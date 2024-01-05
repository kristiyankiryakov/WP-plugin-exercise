<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('after_setup_theme', 'load_carbon_fields');
add_action('carbon_fields_register_fields', 'create_options_page');

function load_carbon_fields()
{
    \Carbon_Fields\Carbon_Fields::boot();
    
}

function create_options_page()
{
    Container::make('theme_options', 'Contact Form')
        ->add_fields(
            array(
                Field::make('checkbox', 'contact_plugin_active', 'Active'),

                Field::make('text', 'contact_plugin_recipients', 'Email')
                    ->set_help_text('The email in the form is submitted to')
                    ->set_attribute('placeholder', 'eg.pesho@test.com'),

                Field::make('textarea', 'contact_plugin_message', 'Confirmation Message')
                    ->set_attribute('placeholder', 'Enter confirmation Message')
                    ->set_rows(4)
                    ->set_help_text('Type the message you want the submitter to receive')
            )
        )
        ->set_icon('dashicons-media-text');
        
}