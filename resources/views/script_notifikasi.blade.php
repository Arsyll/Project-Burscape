<script>
    $(document).on('click', '#mark_read', function(){
    var fd = new FormData();
    fd.append('_token', '{{ csrf_token() }}');
    $.ajax({
        type: "POST",
        url: "{{ route('notification-readed') }}",
        data: fd,
        processData: false,
        contentType: false,
        success: function (response) {
            $(document).find('#notification-dot').remove();
            $(document).find('#unreaded-dot').remove()
            $(document).find('#mark_read').remove();
        }
    });
});
</script>