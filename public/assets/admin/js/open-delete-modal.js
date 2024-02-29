$(document).on('click', '.deleteButton', function () {
    id = $(this).data('id');
    action = $(this).data('action');
    message = $(this).data('message');
    $(".deleteMessage").text(message);
    $(".deleteId").val(id);
    $(".deleteForm").attr('action', action);
});
