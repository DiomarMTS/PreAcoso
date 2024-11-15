$(document).ready(function(){
    tablaRoles = $("#tablaRoles").DataTable({
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

    $('#tablaRoles_filter input').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue.length >= 3) { 
            tablaRoles.search(inputValue).draw();
        } else {
            tablaRoles.search('').draw();
        }
    });   
    
});