window.eoxiaJS.taskManagerGlobalWPShop.adminBar = {};

window.eoxiaJS.taskManagerGlobalWPShop.adminBar.init = function() {
	window.eoxiaJS.taskManagerGlobalWPShop.adminBar.event();
};

window.eoxiaJS.taskManagerGlobalWPShop.adminBar.event = function() {
	jQuery( document ).on( 'click', '.wpeo-modal.popup-quick-task .button.close', window.eoxiaJS.taskManagerGlobalWPShop.adminBar.closePopup );
	jQuery( document ).on( 'keyup', '.wpeo-modal.popup-quick-task textarea, .wpeo-modal.popup-quick-task input[name="time"]', window.eoxiaJS.taskManagerGlobalWPShop.adminBar.triggerCreate );

};

window.eoxiaJS.taskManagerGlobalWPShop.adminBar.loadedPopupQuickTask = function( triggeredElement, response ) {
	jQuery( '.wpeo-modal.popup-quick-task .container.loading' ).removeClass( 'loading' );
	jQuery( '.wpeo-modal.popup-quick-task .container .content' ).html( response.data.view );

	jQuery( '.wpeo-modal.popup-quick-task .container .content textarea' ).focus();
};

window.eoxiaJS.taskManagerGlobalWPShop.adminBar.createdQuickTask = function( triggeredElement, response ) {
	jQuery( '.wpeo-modal.popup-quick-task .container .content' ).html( response.data.view );
};

window.eoxiaJS.taskManagerGlobalWPShop.adminBar.closePopup = function( event ) {
	jQuery( '.wpeo-modal.popup-quick-task' ).removeClass( 'active' );
};

window.eoxiaJS.taskManagerGlobalWPShop.adminBar.triggerCreate = function( event ) {
	if ( event.ctrlKey && 13 === event.keyCode ) {
		jQuery( this ).closest( '.wpeo-modal.popup-quick-task' ).find( '.action-input' ).click();
	}
};
