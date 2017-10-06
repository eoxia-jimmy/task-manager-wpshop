<?php
/**
 * La vue principale de la page des clients WPShop.
 *
 * @author Jimmy Latour <jimmy.eoxia@gmail.com>
 * @since 1.0.0
 * @version 1.1.0
 * @copyright 2015-2017 Eoxia
 * @package core
 * @subpackage view
 */

namespace task_manager;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="wrap wpeo-project-wrap">
	<?php require( PLUGIN_TASK_MANAGER_WPSHOP_PATH . '/core/view/create-buttons.view.php' ); ?>
	<div class="wpeo-project-dashboard">
		<p class="alignright"><?php esc_html_e( 'Total time past', 'task-manager-wpshop' ); ?>: <?php echo esc_html( $total_time_elapsed ); ?></p>
		<span class="open-popup-ajax dashicons dashicons-screenoptions"
					data-parent="wpeo-project-wrap"
					data-target="last-activity"
					data-action="load_last_activity"
					data-tasks-id="<?php echo esc_attr( $tasks_id ); ?>"
					data-title="<?php echo esc_attr( 'Last activities', 'task-manager-wpshop' ); ?>"></span>

		<div class="popup last-activity activities">
			<div class="container">
				<div class="header">
					<h2 class="title">Titre de la popup</h2>
					<i class="close fa fa-times"></i>
				</div>
				<input type="hidden" class="offset-event" value="<?php echo esc_attr( \eoxia\Config_Util::$init['task-manager']->activity->activity_per_page ); ?>" />
				<input type="hidden" class="last-date" value="" />

				<div class="content">
				</div>

				<button class="load-more-history"><?php esc_html_e( 'Load more', 'task-manager-wpshop' ); ?></button> <!-- Ne pas supprimer 'load-more-history' -->
			</div>
		</div>
	</div>

	<div class="list-task">
	<?php
	if ( ! empty( $tasks ) ) :
		foreach ( $tasks as $key => $data ) :
			?>
				<h2><?php echo esc_html( $data['title'] ); ?></h2>
				<?php \task_manager\Task_Class::g()->display_tasks( $data['data'] ); ?>
			<?php
		endforeach;
	endif;
	?>
	</div>
</div>
