var tabla;
var tabla_detalle;

$(document).ready(function() {

    tabla = $("#listado_table").dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax":{
            url: '../../controller/documento.php?op=listarxusuterminado',
            type : "get",
            dataType : "json",
            error:function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();

});

function ver(doc_id){
    $.post("../../controller/documento.php?op=mostrar",{doc_id:doc_id},function(data){
        data=JSON.parse(data);
        $("#area_nom").val(data.area_nom);
        $("#tra_nom").val(data.tra_nom);
        $("#doc_externo").val(data.doc_externo);
        $("#tip_nom").val(data.tip_nom);
        $("#doc_dni").val(data.doc_dni);
        $("#doc_nom").val(data.doc_nom);
        $("#doc_descrip").val(data.doc_descrip);
        $("#doc_respuesta").val(data.doc_respuesta);

        $("#doc_id").val(data.doc_id);

        if (data.doc_estado == "Pendiente"){
            var resultado = "<span class='badge bg-warning'>Pendiente</span>";
        }else{
            var resultado = "<span class='badge bg-primary'>Terminado</span>";
        }

        $("#lbltramite").html("Nro Tramite: " + data.nrotramite +" | Usuario: " + data.usu_nomape + " | Correo: " + data.usu_correo + " | Adjunto: " + data.cant + " | Estado: " + resultado);

        tabla_detalle = $("#listado_table_detalle").dataTable({
            "aProcessing": true,
            "aServerSide": true,
            "searching": false,
            "paging":false,
            lengthChange: false,
            colReorder: true,
            "ajax":{
                url: '../../controller/documento.php?op=listardetalle',
                type : "post",
                data: {doc_id:doc_id,det_tipo:'Pendiente'},
                dataType : "json",
                error:function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo":false,
            "iDisplayLength": 5,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        }).DataTable();

        tabla_detalle_respuesta = $("#respuesta_table_detalle").dataTable({
            "aProcessing": true,
            "aServerSide": true,
            "searching": false,
            "paging":false,
            lengthChange: false,
            colReorder: true,
            "ajax":{
                url: '../../controller/documento.php?op=listardetalle',
                type : "post",
                data: {doc_id:doc_id,det_tipo:'Terminado'},
                dataType : "json",
                error:function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo":false,
            "iDisplayLength": 5,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        }).DataTable();

    });

    $("#mnt_detalle").modal('show');
}