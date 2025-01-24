<?php
/**
 * Template for displaying a single Team Member.
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <div class="team-member-image">
                            <?php
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail('large'); 
                            endif;
                            ?>
                        </div>
                        <div class="team-member-info">
                            <!-- Team Member Name -->
                            <h1 class="team-member-title"><?php the_title(); ?></h1>

                            <!-- Job Title -->
                            <?php if ( function_exists('get_field') && get_field('job_title') ) : ?>
                                <h2 class="team-member-job-title"><?php echo esc_html(get_field('job_title')); ?></h2>
                            <?php endif; ?>
                        </div>
                    </header>

                    <div class="entry-content">
                        <!-- Biography -->
                        <?php if ( function_exists('get_field') && get_field('biography') ) : ?>
                            <div class="team-member-biography">
                                <?php echo wp_kses_post(get_field('biography')); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>

            <?php endwhile;
        else :
            echo '<p>No content found for this team member.</p>';
        endif;
        ?>

    </main>
</div>

<?php get_footer(); ?>
