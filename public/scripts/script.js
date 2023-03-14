
    $(document).ready(function() {

        $('#slots').on('submit', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '/slots',
                data: data,
                success: function(data) {
                    console.log(data);
                    $('#slots').html(data);
                }
            });
        });

    });
