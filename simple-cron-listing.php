<?php
/*
Plugin Name: Simple Cron Listing
Description: Add a Widget to the Admin Dashboard that shows the next scheduled events (crons) for your WordPress instalation.
Version:     1.0
Author:      João Paulin
Author URI:  http://joaopaulin.com.br
*/

function wp_jp_scl_add_dashboard_widgets() {

    wp_add_dashboard_widget(
                 'wp_jp_scl_scheduled_crons_widget',         // Widget slug.
                 'Próximos eventos agendados (Crons)',         // Title.
                 'wp_jp_scl_scheduled_crons_widget_function' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'wp_jp_scl_add_dashboard_widgets' );

function wp_jp_scl_scheduled_crons_widget_function() {

    $crons = _get_cron_array();

    echo '<ul>';

    foreach( $crons as $key => $value) {

        _e( '<li><strong>' . key($value) . '</strong> será executado em <strong>' . date("H:i:s d/m/Y", $key + (3600 * get_option( 'gmt_offset' ))) . '</strong></li>', 'simple-cron-listing' );

    }

    echo '</ul>';

}
