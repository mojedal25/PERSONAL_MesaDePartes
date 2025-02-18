let arrDocument=[];

Dropzone.autoDiscover = false;

let myDropzone = new Dropzone('.dropzone',{
    /* url:'../../assets/document', */
    url:'../../controller/documento.php?op=temporary_upload',
    maxFilesize: 2,
    maxFiles: 5,
    acceptedFiles: 'application/pdf',
    addRemoveLinks: true,
    dictRemoveFile: 'Quitar',
    cache: false,
    processData: false,
    error: function(file, response) {
        // Oculta el mensaje de error
        console.log('Error: ' + response);
    }
});

myDropzone.on('maxfilesexceeded',function(file){
    Swal.fire({
        title: "Mesa de Partes",
        text: "Solo se permiten un máximo de 5 archivos.",
        icon: "error",
        confirmButtonColor: "#5156be",
    });
    myDropzone.removeFile(file);

});

myDropzone.on('addedfile',function(file){
    if (file.size > 2 * 1024 * 1024){
        Swal.fire({
            title: "Mesa de Partes",
            text: 'El archivo "'+ file.name +'" excede el tamaño maximo de 2 MB.',
            icon: "error",
            confirmButtonColor: "#5156be",
        });
        myDropzone.removeFile(file);

    }
});

myDropzone.on('addedfile',file=>{
    arrDocument.push(file);
});

myDropzone.on('removedfile',file=>{
    let i = arrDocument.indexOf(file);
    arrDocument.splice(i,1);
});


function init(){
    $("#documento_form").on("submit",function(e){
        guardar(e);
    });
}

function guardar(e){
    e.preventDefault();

    if(arrDocument.length === 0){
        Swal.fire({
            title: "No hay archivos adjuntos, esta seguro de registrar el tramite?",
            icon: "info",
            showDenyButton: true,
            confirmButtonText: "Si",
            denyButtonText: `No`
        }).then((result) => {
            if (result.isConfirmed) {
                enviartramite();
            }
        });
    }else{
        enviartramite();
    }
}

function enviartramite(){
    $('#btnguardar').prop("disabled",true);
    $('#btnguardar').html('<i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>Espere..');

    var formData = new FormData($("#documento_form")[0]);

    var totalfiles = arrDocument.length;

    console.log(totalfiles);
    for (var i=0 ; i < totalfiles ; i++){
        formData.append("file[]",arrDocument[i]);
    }

    $.ajax({
        url:"../../controller/documento.php?op=registrar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){

            $('#documento_form')[0].reset();
            Dropzone.forElement('.dropzone').removeAllFiles(true);

            console.log(data);

            Swal.fire({
                title: "Mesa de Partes",
                html: "Su tramite a sido registrado con exito con Nro: <br><strong>"+ data +"</strong>",
                icon: "success",
                confirmButtonColor: "#5156be",
            });

            $('#btnguardar').prop("disabled",false);
            $('#btnguardar').html('Guardar');
        }
    });
}

$(document).ready(function() {

    $.post("../../controller/area.php?op=combo",function(data){
        $('#area_id').html(data);
    });

    $.post("../../controller/tramite.php?op=combo",function(data){
        $('#tra_id').html(data);
    });

    $.post("../../controller/tipo.php?op=combo",function(data){
        $('#tip_id').html(data);
    });

});

$(document).on("click","#btnlimpiar",function(){
    $('#documento_form')[0].reset();
    Dropzone.forElement('.dropzone').removeAllFiles(true);
});

init();