<?php
/**
 * Plugin Name: Sunflower Countdown
 * Description: Fügt einen anpassbaren Countdown zum grünen Sunflower Theme hinzu. Einstellungen über Design -> Widgets.
 * Version: 1.0
 * Author: Alexander Schnapper
 */

// Verhindert direkten Zugriff auf die Datei
if (!defined('ABSPATH')) {
    exit;
}

// Widget-Datei einbinden
require_once plugin_dir_path(__FILE__) . 'sunflower-countdown-widget.php';

// Widget registrieren
function register_sunflower_countdown_widget() {
    register_widget('Sunflower_Countdown_Widget');
}
add_action('widgets_init', 'register_sunflower_countdown_widget');

// Countdown-Skript und CSS hinzufügen
function enqueue_sunflower_countdown_scripts() {
    wp_enqueue_style('sunflower-countdown-style', plugin_dir_url(__FILE__) . 'css/sunflower-countdown.css');
    wp_enqueue_script('sunflower-countdown-script', plugin_dir_url(__FILE__) . 'js/sunflower-countdown.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_sunflower_countdown_scripts');
?>