<?php 
$hero_form_id = get_sub_field( 'hero_form_id' );  
$hero_form_title = get_sub_field('hero_form_title');
if(!empty($hero_form_id)):?>
    <div class="hero-form-column">
        <div id="hero-form" class="form-wrapper">
            <?php if (!empty($hero_form_title)) : ?>
                <h4><?php echo $hero_form_title;?></h4>       
            <?php endif ; ?>
            <?php echo do_shortcode('[gravityform id="' . $hero_form_id . '" title="false" description="false" ajax="true"]'); ?>
        </div>
    </div>
<?php endif;?>