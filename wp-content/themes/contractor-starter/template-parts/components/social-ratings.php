<?php // Pull in social ratings from 'Theme Options > Social Media & Ratings'
if ( have_rows( 'social_ratings', 'option' ) ) : ?>
    
    <div class="social-ratings d-flex justify-content-center justify-content-lg-start">

        <?php while ( have_rows( 'social_ratings', 'option' ) ) : the_row(); ?>

            <div class="social__item d-flex align-items-center">
                <picture class="social__item__icon obj-cont">
                    <?php $social_icon = get_sub_field( 'social_icon' ); 
                    $size = 'full';
                    if ( $social_icon ) {
                        echo wp_get_attachment_image( $social_icon, $size );
                    } ?>
                </picture>
                
                <div class="social__item__desc">
                

                    <svg class="rating-stars" x="0px" y="0px" viewBox="0 0 56.6 11.3" style="enable-background:new 0 0 56.6 11.3;" xml:space="preserve">
                        <g id="rating-2" transform="translate(-8127.431 -4252.471)">
                            <g id="star-ratings-logo" transform="translate(4.002 -9.605)">
                                <g id="rating-3" transform="translate(-0.561 6.461)">
                                    <path id="Star-11" d="M8179.8,4260.2l-3.4-0.2l-1.3-3.2l-1.3,3.2l-3.4,0.2l2.6,2.2l-0.9,3.4l2.9-1.8l2.9,1.8l-0.9-3.4
                                        L8179.8,4260.2z"/>
                                    <path id="Star-12" d="M8168.4,4260.2l-3.4-0.2l-1.3-3.2l-1.3,3.2l-3.4,0.2l2.6,2.2l-0.9,3.4l2.9-1.8l2.9,1.8l-0.9-3.4
                                        L8168.4,4260.2z"/>
                                    <path id="Star-13" d="M8157.1,4260.2l-3.4-0.2l-1.3-3.2l-1.3,3.2l-3.4,0.2l2.6,2.2l-0.9,3.4l2.9-1.8l2.9,1.8l-0.9-3.4
                                        L8157.1,4260.2z"/>
                                    <path id="Star-14" d="M8145.7,4260.2l-3.4-0.2l-1.3-3.2l-1.3,3.2l-3.4,0.2l2.6,2.2l-0.9,3.4l2.9-1.8l2.9,1.8l-0.9-3.4
                                        L8145.7,4260.2z"/>
                                    <path id="Star-15" d="M8134.3,4260.2l-3.4-0.2l-1.3-3.2l-1.3,3.2l-3.4,0.2l2.6,2.2l-0.9,3.4l2.9-1.8l2.9,1.8l-0.9-3.4
                                        L8134.3,4260.2z"/>
                                </g>
                            </g>
                        </g>
                    </svg>

                    
                    

                    <p class=""><?php the_sub_field( 'rating_description' ); ?></p>
                </div>
            </div>

        <?php endwhile; ?>

    </div>

<?php else : ?>
    <?php // no rows found ?>
<?php endif; ?>