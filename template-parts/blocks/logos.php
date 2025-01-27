<?php
// Logos Template
?><?php
$className = 'custom-section logos';


$id = 'logos-' . $block['id'];

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if (isset($block['data']['logos_preview'])) :
    echo '<img src="' . esc_url($block['data']['logos_preview']) . '" style="width:100%; height:auto;">';
else :

    // Header options
    $header_text = get_field('logos_header');
    $text_alignment = get_field('text_alignment');
    $text_color = get_field('text_color');
    $bg_color = get_field('logos_bg_color');

    // Logos to show per row
    $logos_row = get_field('logos_per_row');
    $logos_per_row = isset($logos_row) && !empty($logos_row) ? $logos_row : 5;?>

    <section id="<?php echo esc_attr($id); ?>" class="custom-section logos" style="background-color: <?php echo esc_attr($bg_color); ?>;">
        <div class="container mx-auto px-6 py-6 md:py-12">
            <?php if ($header_text) :
                $text_color_style = $text_color ? 'color: ' . esc_attr($text_color) . ';' : '';
                $alignment_class = $text_alignment ? 'text-' . esc_attr($text_alignment) : '';
                ?>

                <h2 class="opacity-70 <?php echo $alignment_class; ?>" style="<?php echo $text_color_style; ?>">
                    <?php echo wp_kses_post($header_text); ?>
                </h2>
            <?php endif; ?>

            <div class="logos-wrapper">
                <?php if (have_rows('logos')) :
                    while (have_rows('logos')) : the_row();
                        $logo_link = get_sub_field('logo_link');
                        $logo_image = get_sub_field('logo_image');
                        ?>

                        <div class="logo-img">
                            <?php if ($logo_link) : ?>
                                <a href="<?php echo esc_url($logo_link['url']); ?>" target="<?php echo esc_attr($logo_link['target']); ?>">
                            <?php endif; ?>

                            <?php if ($logo_image) : ?>
                                <?php echo wp_get_attachment_image($logo_image['id'], 'full', '', [
                                    'class' => 'img-fluid',
                                    'loading' => 'lazy',
                                    'alt' => esc_attr($logo_image['alt'])
                                ]); ?>
                            <?php endif; ?>

                            <?php if ($logo_link) : ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile;
                else :
                    echo '<p>No logos available.</p>';
                endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
