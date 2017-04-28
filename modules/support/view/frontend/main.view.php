<?php
/**
 * Le contenu la page "mon-compte" de WPShop.
 *
 * @author Jimmy Latour <jimmy.eoxia@gmail.com>
 * @since 1.0.0.0
 * @version 1.3.6.0
 * @copyright 2015-2017 Eoxia
 * @package support
 * @subpackage view
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<div class="wpeo-window-ask-task-container">
	<a href="#" class="wpeo-ask-task"><?php _e( 'Ask a ticket', 'task-manager' ); ?></a>

	<div id="wpeo-window-ask-task" >
		<form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="POST">
			<input type="hidden" name="action" value="ask_task">
			<input type="text" name="point[content]" placeholder="<?php _e( 'Write your ticket', 'task-manager' ); ?>">
			<input type="button" value="<?php _e( 'Confirm', 'task-manager' ); ?>">
		</form>
	</div>
</div>

<div class="wpeo-project-search">
	<input type="text" class="task-search" placeholder="Recherche..">
	<button class="search-button"><span class="dashicons dashicons-search"></span></button>
</div>

<?php echo do_shortcode( '[task frontend="true" post_parent="' . $parent_id . '" posts_per_page="-1"]' ); ?>
