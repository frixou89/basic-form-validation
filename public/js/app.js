var APP = (function() {
    /** DOM elements */
    var form = $("#form-test");

    /** App Variables */
    var formIsValid = true;

    /** EVENTS */
    /** ----------------------------------- */

    // Prevent copy paste events on #input-email-confirm
	$('#input-email-confirm').bind("copy paste",function(e) {
		e.preventDefault();
	});

	// Show fields when company type is selected
	// This will show and enable all inputs wrapped in .show-only-for-company class
	$('#input-client-type').on('change', function() {
		var clientType = $(this).val();
		$('.show-only-for-company').each(function() {
			if (clientType == '2') {
				$(this).removeClass('hidden');
				$(this).find('input').removeAttr('disabled');
			} else {
				$(this).addClass('hidden');
				$(this).find('input').attr('disabled', 'disabled');
			}
		})
	})

	// Trigger change event to display hidden fields on load
	$("#input-client-type").trigger("change");

	// Prevent form submission if has invalid fields
    form.submit(function(e){
        if (formIsValid === false) {
    		e.preventDefault();
    		return false;
        } else {
        	return true;
        }
    });

    // Rest all inputs on #btn-reset click event
    $("#btn-reset").on('click', function() {
    	// Reset inputs
    	form.find('input, select, textarea').val('');
    	// Remove error classes and messages
    	$('.has-error').removeClass('has-error');
    	$('.error').addClass('hidden');
    })

    /** Functions */
    /** ----------------------------------- */

    /**
	 * Validates form
	 * @return {bool} Returns true if form is valid
	 */
	function validateForm() {
		formIsValid = true;
		// Allow only numeric characters for phone number field
		$('.numeric').each(function() {
			// Get the parent container of each input
			var phoneInputContainer = $(this).parent();
			$(this).on('change', function() {
				// Check if value is numeric
				if ($.isNumeric($(this).val())) {
					// Remove .has-error class and hide error message
					phoneInputContainer.removeClass('has-error');
					phoneInputContainer.find('.error').addClass('hidden');
					formIsValid = true;
				} else {
					// Add .has-error class and show error message
					phoneInputContainer.addClass('has-error');
					phoneInputContainer.find('.error').removeClass('hidden');			
					formIsValid = false;
				}
			})
		})
	}

	return {
		validateForm: validateForm,
	}
 
}());

APP.validateForm();