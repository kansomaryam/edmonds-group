<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="team-page-container">
            <h1 class="team-page-title">Meet Our Team</h1>

            <div class="team-member-list">
                <?php
                // Start the loop
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>

                        <div class="team-member">
                            <!-- Team Member Link -->
                            <a href="<?php the_permalink(); ?>" class="team-member-link">
                                <!-- Team Member Image -->
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="team-member-image">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Team Member Name -->
                                <h2 class="team-member-name"><?php the_title(); ?></h2>

                                <!-- Team Member Job Title -->
                                <?php if ( get_field('job_title') ) : ?>
                                    <p class="team-member-job-title"><?php the_field('job_title'); ?></p>
                                <?php endif; ?>
                            </a>
                        </div>

                    <?php endwhile;
                else :
                    echo '<p>No team members found.</p>';
                endif;
                ?>

            </div>
        </div>

    </main>
</div>

<?php get_footer(); ?>
