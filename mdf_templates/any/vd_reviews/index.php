<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
wp_enqueue_style('vd_reviews', get_template_directory_uri() . '/mdf_templates/any/vd_reviews/css/styles.css');
global $mdf_loop;
MDTF_SORT_PANEL::mdtf_catalog_ordering();
?>

   
   
        <?php
        while ($mdf_loop->have_posts()) : $mdf_loop->the_post();
            ?>
            
        <div class="filter_item">
                    <?php
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

                    if (has_post_thumbnail($post->ID)) {
                        echo '<a href="' . get_permalink($post->ID) . '" title="' . esc_attr($post->post_title) . '">';
                        echo '<img class="filter_thumbnail" style="background: url('. $url.')" />';
                        echo '</a>';
                        //secho get_the_post_thumbnail($post->ID, 'thumbnail');
                    }
                    ?><br />
			


            <div class="filter_info">

                <strong><a href="<?php the_permalink() ?>" target="_blank"><?php the_title() ?></a></strong><br />
                <?php echo do_shortcode('[mdf_post_features_panel]'); ?>
				<a href="<?php the_permalink() ?>" target="_blank"><?php _e('View', 'meta-data-filter') ?></a>

            </div>



            </div>
        <?php endwhile; // end of the loop.    ?>
    
