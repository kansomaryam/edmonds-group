<?php
$background_image = get_field('background_image');
?>

<section class="services-hero-section" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="overlay"></div> 
    <div class="container">
        <h2>Our Expertise</h2>
        <div class="services-grid">
            <?php if (have_rows('services')): ?>
                <?php while (have_rows('services')): the_row(); 
                    $title = get_sub_field('service_title');
                    $description = get_sub_field('service_description');
                    $icon = get_sub_field('service_icon');
                ?>
                    <?php if ($title || $description || $icon):  ?>
                        <div class="service-card">
                            <?php if ($icon): ?>
                                <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>" class="service-icon">
                            <?php endif; ?>
                            <?php if ($title): ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($description): ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
