<?php
/**
 * Resources Block Template
 *
 * This template is used to render the Resources Block.
 */

$block_title = get_field('block_title');

if (!empty($block_title)) {
    echo '<h2 class="resources-block-title">' . esc_html($block_title) . '</h2>';
}


$resources = get_field('resources');


if ($resources) {
    
    echo '<div class="resources-block">';
    
    foreach ($resources as $resource) {
        $title = isset($resource['resource_title']) ? esc_html($resource['resource_title']) : '';
        $description = isset($resource['resource_description']) ? esc_html($resource['resource_description']) : '';
        $download_id = isset($resource['download_id']) ? intval($resource['download_id']) : 0;
        $button_text = isset($resource['button_text']) ? esc_html($resource['button_text']) : 'Download';

        $download_url = ($download_id) ? get_permalink($download_id) : '#';

        echo '<div class="resource-item">';
        if (!empty($title)) {
            echo '<h3>' . $title . '</h3>';
        }
        if (!empty($description)) {
            echo '<p>' . $description . '</p>';
        }
        echo '<a class="resource-button" href="' . esc_url($download_url) . '">' . esc_html($button_text) . '</a>';
        echo '</div>';
    }
    
    echo '</div>';
} else {
    echo '<p>No resources found. Please add some resources to display.</p>';
}
?>
