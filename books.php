<?php
/* Template Name: My Book
 * The front page template file
 * 
 */


get_header(); 
?>
<?php
// Determine the current page for paggination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Set up the custom query
$args = array(
    'post_type'      => 'book',
    'posts_per_page' => 1,
    'paged'          => $paged,  //for paggination
);

$custom_query = new WP_Query($args);
?>

<?php if ($custom_query->have_posts()) : ?>
 
    <div class="custom-posts">
        <?php while ($custom_query->have_posts()) : $custom_query->the_post();
        ?>
         <article>    
        <div class="post-item">
                <h2><?php the_title(); ?></h2>
                <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image" style="text-align: center;" >
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div>
            <?php endif; ?>
                <div class="excerpt"><?php the_excerpt(); ?></div>
            </div>
         </article>
        <?php endwhile; ?>
    </div>

    <?php
   //  for paggination
    $pagination_args = array(
        'total'        => $custom_query->max_num_pages,
        'current'      => $paged,
        'prev_text'    => __('« Previous'),
        'next_text'    => __('Next »'),
    );

    echo paginate_links($pagination_args); //for paggination
    ?>

    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>No Book found.</p>
<?php endif; ?>

		

<?php  get_footer();
