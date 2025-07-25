<?php 
$pt = get_sub_field( 'top_spacing' );
$pb = get_sub_field( 'bottom_spacing' );
$select_team = get_field( 'select_team', 'option' );
?>
<!-- test Team Members Section -->
<section id="team-members-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="team-members <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>" aria-label="meet the team">
    <div class="container">
        <?php if(!empty($select_team)): ?>
            <div class="row">
                <?php foreach ($select_team as $post) :
                    $poistion = get_field('position');
                    $bio = get_field('bio');
                    $title = get_the_title($post->ID);
                    $new_str = str_replace(' ', '', $title);
                    $team_title = preg_replace('/[^A-Za-z0-9\-]/', '', $new_str); 
                    setup_postdata($post);?>
                    <div class="col-lg-4">
                        <div class="team-block-info">
                            <?php if (!empty($bio)) : ?>
                            <a aria-label="Read more about <?php the_title(); ?>" href="#<?php echo $post->post_name; ?>" class="team-member-popup"><?php endif; ?>
                                <div class="team-card">
                                    <?php
                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, "thumbnail-size", true);
                                    $thumb_url = $thumb_url_array[0];
                                    $thumb_alt = get_post_meta(get_post_thumbnail_id(), "_wp_attachment_image_alt", true); ?>
                                    <?php if (!empty($thumb_url)) : ?>
                                        <div class="team-img">
                                            <picture class="overlay">
                                                <img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>">
                                            </picture>
                                        </div>
                                    <?php endif; ?>
                                    <div class="team-info">
                                        <div class="team-details">
                                            <h5 class="c-wt"><?php the_title(); ?></h5>
                                            <?php if (!empty($poistion)) : ?>
                                                <p class="poistion"><?php echo $poistion; ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($bio)) : ?>
                                            <div class="icon">+</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php if (!empty($bio)) : ?>
                            </a> <?php endif; ?>
                            <?php if (!empty($bio)) : ?>
                                <div id="<?php echo $post->post_name; ?>" class="mfp-hide team-popup">
                                    <div class="container team-popup_inner">
                                        <div class="team-popup_top">
                                            <?php
                                            $thumb_id = get_post_thumbnail_id();
                                            $thumb_url_array = wp_get_attachment_image_src($thumb_id, "thumbnail-size", true);
                                            $thumb_url = $thumb_url_array[0];
                                            $thumb_alt = get_post_meta(get_post_thumbnail_id(), "_wp_attachment_image_alt", true);
                                            ?>
                                            <?php if (!empty($thumb_url)) : ?>
                                                <div class="team-popup_image">
                                                    <picture>
                                                        <img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>">
                                                    </picture>
                                                </div>
                                            <?php endif; ?>
                                            <div class="team-popup_head">
                                                <div class="team-popup-title">
                                                    <h2 class="lvl-3"><?php the_title(); ?></h2>
                                                    <?php if (!empty($poistion)) : ?>
                                                        <p class="poistion"><?php echo $poistion; ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="content-editor">
                                                    <p><?php echo $bio; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!--End - Team Members Section -->
