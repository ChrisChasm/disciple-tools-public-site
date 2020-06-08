<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://zume.com/docs/responsive-navigation/
 */
?>

<div class="top-bar" id="main-menu">
    <div class="top-bar-left">
        <ul class="menu">
            <li><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></li>
        </ul>
    </div>
    <div class="top-bar-right">
        <?php zume_top_nav(); ?>
    </div>
</div>
