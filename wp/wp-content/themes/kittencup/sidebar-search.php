<?php
/**
 * Kittencup Module
 *
 * @date 14-7-16 下午3:27
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

if ( is_active_sidebar( 'index-right-sidebar' ) ) : ?>

     <?php dynamic_sidebar( 'index-right-sidebar' ); ?>

<?php endif; ?>