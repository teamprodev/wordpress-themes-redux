<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Digilab
 * @since Digilab 1.0 
 */

 if ( is_active_sidebar( 'sidebar-1' ) ) {
?>
    <div id="tf-sidebar" class="sidebar wow fadeInLeft col-lg-4 col-md-12">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
<?php } ?>
