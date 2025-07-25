<?php $hero_microTitle = get_sub_field( 'hero_micro_title' );
$hero_mainTitle = get_sub_field( 'hero_main_title' );
if(!empty($hero_mainTitle || $hero_microTitle)):?>
    <header class="hero-header-content">
        <?php if (!empty($hero_microTitle)) : ?>
            <h1 class="micro"><?php echo $hero_microTitle; ?></h1>
            <?php if(!empty($hero_mainTitle)):?>
                <h2 class="jumbo"><?php echo $hero_mainTitle; ?></h2>
            <?php endif;?>
        <?php else : ?>
            <?php if(!empty($hero_mainTitle)):?>
                <h1 class="jumbo"><?php echo $hero_mainTitle; ?></h1>
            <?php endif;?>
        <?php endif; ?>
    </header>
<?php endif;?>