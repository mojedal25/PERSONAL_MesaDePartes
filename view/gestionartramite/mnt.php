<div id="mnt_detalle" class="modal fade" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <form method="post" id="documento_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="lbltramite"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="doc_id" name="doc_id">

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="form-label" class="form-label">Area</label>
                                <input class="form-control form-control-sm" type="text" value="" name="area_nom" id="area_nom" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Tramite</label>
                                <input class="form-control form-control-sm" type="text" value="" name="tra_nom" id="tra_nom" readonly>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="form-label" class="form-label">Nro Externo</label>
                                <input class="form-control form-control-sm" type="text" value="" name="doc_externo" id="doc_externo" readonly>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="form-label" class="form-label">Tipo</label>
                                <input class="form-control form-control-sm" type="text" value="" name="tip_nom" id="tip_nom" readonly>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="form-label" class="form-label">DNI / RUC</label>
                                <input class="form-control form-control-sm" type="text" value="" name="doc_dni" id="doc_dni" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="form-label" class="form-label">Nombre / Razon Social</label>
                                <input class="form-control form-control-sm" type="text" value="" name="doc_nom" id="doc_nom" readonly>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="form-label" class="form-label">Descripción</label>
                                <textarea class="form-control form-control-sm" type="text" rows="2" value="" name="doc_descrip" id="doc_descrip" readonly></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label for="form-label" class="form-label">Documentos Adjuntos</label>
                            <table id="listado_table_detalle" class="table table-bordered dt-responsive table-sm nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fech.Creación</th>
                                        <th>Usuario</th>
                                        <th>Perfil</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-12">
                            <br/>
                            <div class="mb-3">
                                <label for="form-label" class="form-label">Respuesta (*)</label>
                                <textarea class="form-control form-control-sm" placeholder="Ingrese respuesta del tramite" type="text" rows="2" value="" name="doc_respuesta" id="doc_respuesta" required></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="dropzone">
                                <div class="dz-default dz-message">
                                    <button class="dz-button" type="button">
                                        <img src="../../assets/image/upload.png" alt="">
                                    </button>
                                    <div class="dz-message" data-dz-message><span>Arrastra y suelta archivos aquí o haz click para seleccionar archivos <br> Maximo 5 archivos de tipo *.PDF, y solo de peso maximo de 2MB </span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnguardar" class="btn btn-primary waves-effect waves-light">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>