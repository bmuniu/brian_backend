var CreatePlanObj = {
    compareDates: function (startDate, endDate) {
        var start = startDate.val();
        var end = endDate.val();

        var parentDiv = endDate.parent().parent();
        if(start != '' && end != '') {
            if (end < start) {
                endDate.val('');
                parentDiv.addClass('has-error');
                endDate.next().text('End Date cannot be less than the Start Date!');
                return true;
            } else {
                endDate.next().text('');
                parentDiv.removeClass('has-error');
                parentDiv.find('span.help-block').text('');
            }
        }
        return false;
    },
    validateFields: function () {
        var valid = true;

        // loop through each field and determine if it's required
        $('input:required, select:required, textarea:required').each(function () {
            var value = $(this).val().trim();

            if(value == ''){
                valid = false;
                CreatePlanObj.setRequiredWarnings($(this));
            }
        });

        return valid;
    },
    setRequiredWarnings: function (input) {
        var parentDiv = input.parents('div.form-group');
        parentDiv.addClass('has-error');

        // show warning
        parentDiv.find('span.help-block').text('Field is required!');
    },
    reEnableField: function (input) {
        input.parents('div.has-error').removeClass('has-error');
        input.parents('div.form-group').addClass('has-success');
        input.parents('div.form-group').find('span.help-block').text('');
    }
}

// initialise the bootstrap tooltip
$(document).find('[data-toggle="tooltip"]').tooltip();

// display more fields for additional costs
$('.additional-costs-btn').on('click', function () {
    // hide the button
    $(this).fadeOut('slow', function () {
        // display inputs for adding costs
        $('.additional-costs').fadeIn('slow').find('input').removeAttr('disabled');
    });
});

// disabled by default
$('.additional-costs input').attr('disabled', 'disabled');

// initialize the datepicker
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: 1
}).on('changeDate', function (ev) {
    $(this).datepicker('hide');

    // get start date and compare with end date
    var start_date = $('#start_date');
    var end_date = $('#end_date');

    // compare the dates
    CreatePlanObj.compareDates(start_date, end_date);
});

// listen for data entry in an input field
$('input:required, select:required, textarea:required').on('keyup', function () {
    CreatePlanObj.reEnableField($(this));
});

// listen for form submission
$('form').on('submit', function (e) {
    e.preventDefault();

    var valid = CreatePlanObj.validateFields();
    if(valid){
        $.ajax({
            url: 'travel-plan/save',
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {

            }
        });
    }
});

// cleaning up
$('#add_more').on('click', function(){
    $('div.more-additional-costs').clone().appendTo('#clones');
    $('div#clones div.hide, div#clones div.more-additional-costs').removeClass('hide more-additional-costs');
});

$(document).on('click', '.reduce_fields', function () {
    $(this).parents('div.form-group').remove();
});