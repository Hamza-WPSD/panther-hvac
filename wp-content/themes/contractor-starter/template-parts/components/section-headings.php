<?php if ( have_rows( 'section_headings_module' ) ) : while ( have_rows( 'section_headings_module' ) ) : the_row(); 

// Set up variables
$micro = get_sub_field( 'micro_title' );
$headline = get_sub_field( 'main_headline' );
$main_content = get_sub_field( 'main_content' );
?>

    <header class="section-header">
        <?php if ( get_sub_field( 'show_micro' ) == 1 )  : ?>
            <h2 class="micro"><?php echo $micro; ?></h2>
            <h3 class="jumbo"><?php echo $headline; ?></h3>
        <?php else : ?>
            <h2 class="jumbo"><?php echo $headline; ?></h2>
        <?php endif;?>

        <?php if ( $main_content ) : ?>
            <p class="header-info"><?php echo $main_content; ?> </p>
        <?php endif ; ?>
        

    </header>
<?php endwhile; endif; ?>