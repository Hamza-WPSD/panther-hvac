<div id="inline-form" class="inline-form-wrapper">
    <?php if ( have_rows( 'lead_form_module' ) ) : while ( have_rows( 'lead_form_module' ) ) : the_row(); ?>

        <?php 
        $form_id = get_sub_field( 'form_id' ); 
        $form_title = get_sub_field( 'form_title' );
        ?>

        <h3><?php echo $form_title;?> </h3>
        <?php echo do_shortcode('[gravityform id="' . $form_id . '" title="false" ajax="false"]');?>

           
    <?php endwhile; endif; ?>
</div>