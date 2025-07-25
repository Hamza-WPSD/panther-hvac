<?php 

// Custom field vars for this layout
$recent_articles_title = get_sub_field( 'recent_articles_title' );
$recent_articles_subtitle = get_sub_field( 'recent_articles_subtitle' );
$recent_articles_summary = get_sub_field( 'recent_articles_summary' );
?>

<section id="recent-articles-single-<?php echo $post->ID;?>" class="recent-articles-single " aria-label="recent articles">
    <div class="container"><div class="row justify-content-center">
        <div class="col-12">
            <header>
                <h2 class="jumbo">Recent Articles POSTS</h2>
            </header>
        </div>

        <div class="col-12">
            <div class="container">
        
            <?php
            // Query 3 most recent posts
            $display = get_field( 'display_posts' ); 
            if ( $display === 'display_related' ) : ?>
                <?php
                $args = array(    
                    'post_type' => 'post',          
                    'posts_per_page' => 3, 
                    'post__not_in' => get_option( 'sticky_posts' ),
                    'orderby' => 'date', 
                    'order'   => 'DESC', 
                    );
                ;?>

                <?php
                //for use in the loop, list 5 post titles related to first tag on current post
                $tags = wp_get_post_tags($post->ID);
                if ($tags) : ?>
                    <?php
                    $first_tag = $tags[0]->term_id;
                    $args = array(
                        'tag__in' => array($first_tag),
                        'post__not_in' => array($post->ID),
                        'posts_per_page'=>3,
                        'caller_get_posts'=>1
                    ); ?>
                    
                <?php endif;?>

                <?php 
                $the_query = new WP_Query($args); ?>
                
                    <?php if($the_query->have_posts()) : ?> 
                        <div class="row">
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="col-md-4">
                                    <div class="rec-art__item card">

                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <picture>
                                                <?php the_post_thumbnail('medium', array('class' => '')); ?>
                                            </picture>
                                        <?php endif; ?>

                                    
                                        <?php
                                        $authorid = $post->post_author; // Grabs Author ID
                                        $author_acf_prefix = 'user_'; // WP User  Prefix
                                        $author_id_prefixed = $author_acf_prefix . $authorid; // Concats Prefix to ID ex: 'user_2'
                                        $author_photo = get_field( 'author_photo', $author_id_prefixed ); // Retrieves ACF User Photo Field
                                        ?>

                                        <?php if ( $author_photo ) : ?>
                                            <picture class="rec-art__author-photo">
                                                <img src="<?php echo esc_url( $author_photo['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $author_photo['alt'] ); ?>" />
                                            </picture>
                                        <?php endif; ?>

                                        <div class="p-3">
                                            <p>Estimated Read Time:&nbsp;<?php echo reading_time($post); ?></p>
                                            
                                            <?php $post_tags = get_the_tags();
                                                if ( ! empty( $post_tags ) ) {
                                                    echo '<ul class="posts__single__tags d-flex">';
                                                    foreach( $post_tags as $post_tag ) {
                                                        echo '<li class="m-0 pe-3">' . $post_tag->name . '</li>';
                                                    }
                                                    echo '</ul>';
                                            } ?>
                                            <h4><?php the_title(); ?></h4>
                                            <p><?php echo wp_trim_words( get_the_content(), 24 ); ?></p>
                                            <a aria-label="Read about <?php the_title();?>" href="<?php the_permalink(); ?>" class="btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    <?php endif; ?>
                
                            

            <?php  else : //displays Selection ?>  

                <?php $select_posts = get_field( 'select_posts' ); ?>
                <?php if ( $select_posts ) : ?>
                    <div class="row">
                    <?php foreach ( $select_posts as $post ) : ?>
                        <?php setup_postdata ( $post ); ?>
                        
                        
                        <div class="col-md-4">
                            <div class="rec-art__item card">

                                <?php if ( has_post_thumbnail() ) : ?>
                                    <picture>
                                        <?php the_post_thumbnail('medium', array('class' => '')); ?>
                                    </picture>
                                <?php endif; ?>

                            
                                <?php
                                $authorid = $post->post_author; // Grabs Author ID
                                $author_acf_prefix = 'user_'; // WP User  Prefix
                                $author_id_prefixed = $author_acf_prefix . $authorid; // Concats Prefix to ID ex: 'user_2'
                                $author_photo = get_field( 'author_photo', $author_id_prefixed ); // Retrieves ACF User Photo Field
                                ?>

                                <?php if ( $author_photo ) : ?>
                                    <picture class="rec-art__author-photo">
                                        <img src="<?php echo esc_url( $author_photo['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $author_photo['alt'] ); ?>" />
                                    </picture>
                                <?php endif; ?>

                                <div class="p-3">
                                    <p>Estimated Read Time:&nbsp;<?php echo reading_time($post); ?></p>
                                    
                                    <?php $post_tags = get_the_tags();
                                        if ( ! empty( $post_tags ) ) {
                                            echo '<ul class="posts__single__tags d-flex">';
                                            foreach( $post_tags as $post_tag ) {
                                                echo '<li class="m-0 pe-3">' . $post_tag->name . '</li>';
                                            }
                                            echo '</ul>';
                                    } ?>
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo wp_trim_words( get_the_content(), 24 ); ?></p>
                                    <a aria-label="Read about <?php the_title();?>" href="<?php the_permalink(); ?>" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>


                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
           
            <?php endif;?>
            
        </div>
        </div>

        
    </div></div> <!-- END '.row'/ '.container' -->
</section>
