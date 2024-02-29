$(document).on('click', '.rejectButton', function () {
    id = $(this).data('id');
    action = $(this).data('action');
    message = $(this).data('message');
    $(".rejectMessage").text('reject ');
    $(".rejectId").val(id);
    $(".rejectForm").attr('action', action);
});
