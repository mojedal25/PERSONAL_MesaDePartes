<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Visor de PDF con ViewerJS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.9.12/viewer.min.css" />
</head>
<body>

<button onclick="abrirVisorPDF('../../assets/document/53/ListadoCompras3.pdf')">Abrir Visor de PDF</button>
<button onclick="cerrarVisorPDF()">Cerrar Visor de PDF</button>

<div id="visorPDF" class="pdfViewer"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.9.12/viewer.min.js"></script>
<script>
    let viewer; // Variable para almacenar la instancia del visor

    function abrirVisorPDF(pdfUrl) {
        // Crea una nueva instancia del visor de PDF
        viewer = new Viewer(document.getElementById('visorPDF'), {
            inline: true,
            viewed() {
                viewer.zoomTo(1);
            },
        });

        // Carga el PDF en el visor
        viewer.load(pdfUrl);
    }

    function cerrarVisorPDF() {
        // Oculta el contenedor del visor
        document.getElementById('visorPDF').style.display = 'none';
    }
</script>

</body>
</html>