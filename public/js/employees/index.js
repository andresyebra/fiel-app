$(document).ready(function () {

    $('#discard').on('click', function () {
        $('.has-error').removeClass('has-error');
        $('#alert').empty();
        $('#job_empleado').val('default');
        $(".input-md").each(function () {
            $(this).val('');
        });
    });

    $(".edit_employee").on('click', function () {

        var row = $(this).parents('tr');
        var id = row.data('id');
        var url = $("#DataEmployeesById").attr('action');

        $.ajax({
            url: url + '/' + $(this).val(),
            type: 'GET',
            success: function (data) {

                console.log(data);
                var id;
                var name;
                var curp;
                var imms;
                var clave;
                var job;

                id = data.employee_data.id;
                name = data.employee_data.nombre;
                curp = data.employee_data.curp;
                imms = data.employee_data.imss;
                clave = data.employee_data.clave;
                job = data.employee_data.puesto;

                $("#id_empleado").val(id);
                $("#nombre_empleado").val(name);
                $("#curp_empleado").val(curp);
                $("#imss_empleado").val(imms);
                $("#clave_empleado").val(clave);
                $("#job_empleado").val(job);
            },
        });
    });

    $("#buscar_empleado").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabla_employee tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});