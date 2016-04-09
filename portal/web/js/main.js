$('#collapse-mainmenu, #collapse-search, #collapse-userui').on('show.bs.collapse', function () {
    $('#collapse-mainmenu, #collapse-search, #collapse-userui').collapse('hide');
});

$('.add-credits').click(function () {
    $('.add-credit-modal').modal('show');
});

$('.credit-value').click(function () {
    $('#credits_to_add').val($(this).attr('data-content'));
});

$('#add-credit-button').click(function () {
    $.ajax({
        method: 'get',
        dataType: 'json',
        data: {credit: $('#credits_to_add').val()},
        url: '/auction/portal/web/account/addcredits',
        success: function (data) {
            if (data) {
                window.location.reload();
            }

            if (!data) {
                alert('You must be logged in to add points');
            }
        }
    });
});