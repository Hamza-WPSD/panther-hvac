<?php 
// Global Modules > Section Spacers - vars for controlling section spacers 
if ( have_rows( 'spacer_module' ) ) : while ( have_rows( 'spacer_module' ) ) : the_row(); {
    $pt = get_sub_field( 'top_spacing' );
    $pb = get_sub_field( 'bottom_spacing' );
} endwhile; endif;
//override fields
$map_position = get_sub_field( 'map_position' );
$override_service_areas_subtitle = get_sub_field( 'override_service_areas_subtitle' );
$override_service_areas_title = get_sub_field( 'override_service_areas_title' );
$override_service_areas_content = get_sub_field( 'override_service_areas_content' );
$disable_service_areas_locations = get_sub_field( 'disable_service_areas_locations' );
$disable_service_area_cta = get_sub_field( 'disable_service_area_cta' );
$override_map = get_sub_field('override_service_map');

//Theme option
$service_area_subtitle = get_field('service_area_subtitle','option');
$service_area_title = get_field('service_area_title','option');
$service_area_content = get_field('service_area_content','option');
$default_map = get_field('service_area_map', 'option');

?>
<!-- Service Area List Section -->
<section id="service-areas-<?php echo $post->ID;?>-<?php echo get_row_index();?>" class="service-areas <?php echo esc_attr($pt);?> <?php echo esc_attr($pb);?>" aria-label="areas we service">
    <div class="container">
        <div class="row <?php the_sub_field( 'map_position' ); ?>">
            <div class="col-lg-6 col-map--info">
                <div class="service-map--info">
                    <header>
                        <?php if (!empty($override_service_areas_subtitle)) : ?>
                            <h2 class="micro"><?php echo $override_service_areas_subtitle; ?></h2>
                        <?php else : ?>
                            <?php if(!empty($service_area_subtitle))?>
                            <h2 class="micro"><?php echo $service_area_subtitle ?></h2>
                        <?php endif ; ?>
                        <?php if(!empty($override_service_areas_title)):?>
                            <h3 class="jumbo"><?php echo $override_service_areas_title;?></h3>
                        <?php else:?>
                            <?php if(!empty($service_area_title)):?>
                                <h3 class="jumbo"><?php echo $service_area_title;?></h3>
                            <?php endif;?>
                        <?php endif;?>
                    </header>
                    <?php if (!empty($override_service_areas_content)) : ?>
                        <p><?php echo $override_service_areas_content; ?></p>
                    <?php else : ?>
                        <?php if(!empty($service_area_content)):?>
                            <p><?php echo $service_area_content; ?></p>
                        <?php endif ; ?>
                    <?php endif ; ?>
                    <?php if($disable_service_areas_locations != 1 ) :
                        if ( get_sub_field( 'override_service_area_locations' ) ) : ?>
                            <?php if ( have_rows( 'override_service_area_locations' ) ) : ?>
                                <ul class="service--cities">
                                    <?php while ( have_rows( 'override_service_area_locations' ) ) : the_row();
                                        $use_link = get_sub_field( 'use_link' );
                                        $location_name = get_sub_field('location_name');
                                        $location_link = get_sub_field( 'location_link' );  ?>
                                        <?php if(!empty($location_name)){?>
                                            <?php if ( $use_link  == 'link--no' ) : ?>
                                                    <li><?php echo $location_name; ?></li>
                                            <?php else : ?>
                                                <?php if(!empty($location_link)){?>
                                                    <li><a aria-label="See our services in <?php echo $location_name; ?>" href="<?php echo esc_url( $location_link); ?>"><?php echo $location_name; ?></a></li>
                                                <?php }?>
                                            <?php endif ; ?>
                                        <?php }?>        
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        <?php else : ?>
                            <?php if ( have_rows( 'service_areas', 'option' ) ) : ?>
                                <ul class="service--cities">
                                    <?php while ( have_rows( 'service_areas', 'option' ) ) : the_row();
                                        $use_link = get_sub_field( 'use_link' );
                                        $location_name = get_sub_field('location_name');
                                        $location_link = get_sub_field( 'location_link' );?>
                                        <?php if(!empty($location_name)){?>
                                            <?php if ( $use_link  == 'link--no' ) : ?>
                                                    <li><?php echo $location_name; ?></li>
                                            <?php else : ?>
                                                <?php if(!empty($location_link)){?>
                                                    <li><a aria-label="See our services in <?php echo $location_name; ?>" href="<?php echo esc_url( $location_link); ?>"><?php echo $location_name; ?></a></li>
                                                <?php }?>
                                            <?php endif ; ?>
                                        <?php }?>
                                    <?php endwhile;?>
                                </ul>
                            <?php endif; ?>
                        <?php endif ; ?>
                    <?php endif ; ?>
                    <?php if($disable_service_area_cta != 1 ):?>
                        <?php if ( get_sub_field( 'override_service_area_cta') ) : ?>
                            <?php $override_service_area_cta = get_sub_field( 'override_service_area_cta' ); 
                            if(!empty($override_service_area_cta)) : ?>
                                <a href="<?php echo esc_url( $override_service_area_cta['url'] ); ?>" target="<?php echo esc_attr( $override_service_area_cta['target'] ); ?>"><?php echo esc_html( $override_service_area_cta['title'] ); ?></a>
                            <?php endif; ?>
                        <?php else : ?>
                            <?php $service_area_cta = get_field( 'service_area_cta', 'option' );
                            if (!empty($service_area_cta)) : ?>
                                <a href="<?php echo esc_url( $service_area_cta['url'] ); ?>" target="<?php echo esc_attr( $service_area_cta['target'] ); ?>"><?php echo esc_html( $service_area_cta['title'] ); ?></a>
                            <?php endif; ?>
                        <?php endif ; ?>
                    <?php endif ; ?>
                </div>
            </div>	
            <div class="col-lg-6 col-map--code">   
                <div class="service-map--code">
                    <picture>
                    <?php 
                    if (!empty($override_map)) {
                        echo $override_map;
                    } elseif (!empty($default_map)) {
                        echo ( $default_map );
                    } ?>
                    </picture>
                </div>
            </div>            
        </div>
    </div>
</section>
<!--End - Service Area List Section -->