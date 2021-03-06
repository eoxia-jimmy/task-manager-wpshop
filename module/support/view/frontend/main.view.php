<?php
/**
 * Le contenu la page "mon-compte" de WPShop.
 *
 * @author Eoxia <dev@eoxia.com>
 * @since 1.0.0
 * @version 1.2.0
 * @copyright 2015-2017 Eoxia
 * @package Task_Manager_WPShop
 */

namespace task_manager_wpshop;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<div class="wpeo-project-wrap">

	<div class="open-ticket">
		<i class="fa fa-question"></i>
		<h2><?php esc_html_e( 'A request ?', 'task-manager-wpshop' ); ?></h2>
		<p>
			<?php esc_html_e( 'Ask your question. We will answer you on the opened ticket', 'task-manager-wpshop' ); ?>
			<span class="wpeo-button button-blue wpeo-modal-event" data-action="open_popup_create_ticket"
						data-title="<?php echo esc_html_e( 'Ask your question', 'task-manager-wpshop' ); ?>"
						data-nonce="<?php echo esc_attr( wp_create_nonce( 'open_popup_create_ticket' ) ); ?>">
				<i class="fa fa-ticket" aria-hidden="true"></i>
				<span><?php esc_html_e( 'Open a ticket', 'task-manager-wpshop' ); ?></span>
			</span>
		</p>
	</div>

	<h2><?php esc_html_e( 'Support', 'task-manager-wpshop' ); ?></h2>

	<div class="toolbox-activity">
		<i class="far fa-clock"></i>
		<div class="total-time">
			<?php esc_html_e( 'Total time past', 'task-manager-wpshop' ); ?> :
		<?php if ( $total_time_elapsed > $total_time_estimated ) : ?>
			<span class="time-exceeded" >
		<?php endif; ?>
			<?php echo esc_html( \eoxia\Date_Util::g()->convert_to_custom_hours( $total_time_elapsed, false ) ); ?>
		<?php if ( $total_time_elapsed > $total_time_estimated ) : ?>
			<span class="time-exceeded-explanation" >
			<?php
				/* Translators: Time spended on customer. */
				echo wp_kses( sprintf( __( 'All your time has been spent. We spent %s longer than expected.', 'task-manager-wpshop' ), '<span style="color: #000;" >' . \eoxia\Date_Util::g()->convert_to_custom_hours( $total_time_elapsed - $total_time_estimated, false ) . '</span>' ),
					array(
						'span' => array(
							'style' => array(),
						),
					)
				);
			?>
			</span>
			</span>
		<?php endif; ?>

			<br/>
			<?php esc_html_e( 'Total expected time', 'task-manager-wpshop' ); ?> :
			<?php echo esc_html( \eoxia\Date_Util::g()->convert_to_custom_hours( $total_time_estimated, false ) ); ?>
		</div>

		<div class="wpeo-button wpeo-modal-event button-blue"
				data-action="load_last_activity"
				data-class="wpeo-project-wrap last-activity activities"
				data-title="<?php echo esc_attr_e( 'Last activities', 'task-manager-wpshop' ); ?>"
				data-tasks-id="<?php echo esc_attr( $tasks_id ); ?>"
				data-frontend="1">
			<i class="fa fa-list" aria-hidden="true"></i>
			<span><?php esc_html_e( 'Latest activities', 'task-manager-wpshop' ); ?></span>
		</div>
	</div>

	<div class="update-activity">
		<span><?php esc_html_e( 'Last activity the : ', 'task-manager-wpshop' ); ?></span>
		<span><?php echo esc_html( $last_modification_date ); ?></span>
	</div>

	<?php \task_manager\Task_Class::g()->display_tasks( $tasks, true ); ?>
</div>
