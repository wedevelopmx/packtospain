jQuery(document).ready(function($) {

	var isValid = function($panel) {
		$panel.find('.validate-required input').blur();
		$panel.find('.validate-required textarea').blur();
		$panel.find('.validate-required select').blur();

		var to_validate = $panel.find('.validate-required').length;
		var validated = $panel.find('.validate-required.woocommerce-validated').length;
		var invalid = $panel.find('.woocommerce-invalid').length;

		console.log('to validate:' + to_validate);
		console.log('validated:' + validated);
		console.log('invalid:' + invalid);

		return (to_validate - validated == 0 && invalid == 0);
	}

	$('#billing-step').click(function(eventObject){
		$('#billing-step').addClass('active');
		$('#additional-step').removeClass('active');
		$('#payment-step').removeClass('active');

		$('#billing-panel').show();
		$('#additional-panel').hide();
		$('#payment-panel').hide();
	});

	$('#additional-step').click(function(eventObject){
		if(isValid($('#billing-panel'))) {
			$('#billing-step').removeClass('active');
			$('#additional-step').addClass('active');
			$('#payment-step').removeClass('active');

			$('#billing-panel').hide();
			$('#additional-panel').show();
			$('#payment-panel').hide();
		}
	});

	$('#payment-step').click(function(eventObject){
		if(isValid($('#billing-panel')) && isValid($('#additional-panel'))) {
			$('#billing-step').removeClass('active');
			$('#additional-step').removeClass('active');
			$('#payment-step').addClass('active');

			$('#billing-panel').hide();
			$('#additional-panel').hide();
			$('#payment-panel').show();
		}
	});


	$('#billing-panel .button.next').click(function(eventObject) {
		eventObject.preventDefault();
		$('#additional-step').click();
	});

	$('#additional-panel .button.next').click(function(eventObject) {
		eventObject.preventDefault();
		$('#payment-step').click();
	});

	$('#additional-panel .button.back').click(function(eventObject) {
		eventObject.preventDefault();
		$('#billing-step').click();
	});

	//Starting with billing panel
	$('#billing-step').click();
});