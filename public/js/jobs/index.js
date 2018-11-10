$(document).ready(function () {

    $('#discard').on('click', function () {
        $('.has-error').removeClass('has-error');
        $('#alert').empty();
        // $('#offices').val('default');
        $(".input-md").each(function () {
            $(this).val('');
        });
    });

    $(".edit_job").on('click', function () {

        var row = $(this).parents('tr');
        var id = row.data('id');
        var url = $("#DataJobsById").attr('action');

        $.ajax({
            url: url + '/' + $(this).val(),
            type: 'GET',
            success: function (data) {

                console.log(data);
                var id;
                var desc;

                id = data.job_data.id;
                desc = data.job_data.descripcion;


                $("#job_id").val(id);
                $("#description_job").val(desc);
            },
        });
    });
});