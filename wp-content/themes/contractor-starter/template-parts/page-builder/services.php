<?php
//Section Spacers
$pt = get_sub_field( 'top_spacing' );
$pb = get_sub_field( 'bottom_spacing' );
// Custom field vars for this layout
$card_layout = get_sub_field('select_layout');
if ($card_layout) {
    $layout = $card_layout;
    include('wp-content/themes/contractor-starter/template-parts/page-builder/page-builder-layouts/' . $layout . '.php');
} ?>