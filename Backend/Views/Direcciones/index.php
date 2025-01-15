<?php
include "Backend/Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Prueba de Clientes</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmDirecciones();">Agregar <i class="fas fa-plus"></i></button>

<!----------------------------------------------------
                     Tablas
----------------------------------------------------->
<table id="tblDirecciones" class="table table-light">
    <thead class="thead-dark">

        <tr>
            <th>Id</th>
            <th>Estado</th>
            <th>Identificador</th>
            <th>Ciudad</th>
            <th>Código Postal</th>
            <th>Sector</th>
            <th>calle</th>
            <th>Numero</th>
            <th>Coordenadas Gps</th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        <!-- Las filas se generan dinamicamente -->
    </tbody>
</table>

<!------------------------------------------------------------------
                            Modal Registro
 ------------------------------------------------------------------>
 <div id="modalDirecciones" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Registrar Nueva Direccion</h5>
                <button class="close" onclick="cerrarModal('modalDirecciones')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary text-center d-none" id="alerta" role="alert"></div>
                <form method="POST" id="frmDirecciones">
                    <div class="row">
                        <!---------------- Guardar el id del usuario que alla iniciado sesion-------------------> 
                         <input id="id_usu" name="id_usu" type="hidden" value="<?php echo $_SESSION['id']; ?>"> 
                         <!-------------------------------------------------------------------------------------> 
                         <!--------------------Guardar el id de la direccion que sera editada-------------------> 
                          <input id="id_dir" name="id_dir" type="hidden"> 
                          <!------------------------------------------------------------------------------------> 
                          <!--------------------------- Guardar el del estado-----------------------------------> 
                           <input id="id_Est" name="id_Est" type="hidden"> 
                           <!------------------------------------------------------------------------------------>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputIdentificador">Identificador</label>
                                <input id="inputIdentificador" class="form-control" type="Text" name="identificador" placeholder="Identificador de la direccion">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputCiudad">Ciudad</label>
                                <input id="inputCiudad" class="form-control" type="Text" name="ciudad" placeholder="Ciudad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputCodigoPostal">Codigo Postal</label>
                                <input id="inputCodigoPostal" class="form-control" type="Text" name="codigoPostal" placeholder="Codigo Postal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputCalle">Nombre de la Calle</label>
                                <input id="inputCalle" class="form-control" type="Text" name="calle" placeholder="Nombre de la Calle">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputNumero">Numero de la Calle</label>
                                <input id="inputNumero" class="form-control" type="Text" name="numero" placeholder="Numero de la Calle">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputSector">Sector</label>
                                <input id="inputSector" class="form-control" type="Text" name="sector" placeholder="Sector">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputCordenadasGPS">Cordenadas GPS</label>
                                <input id="inputCordenadasGPS" class="form-control" type="Text" name="cordenadasGPS" placeholder="Cordenadas GPS">
                            </div>
                        </div>

                    </div>
                    <div id="map" style="height: 400px; width: 100%;"></div>
                    
                    <button class="btn btn-primary" type="button" onclick="handleActionDir(event)" id="btnAccionDir">Aceptar</button>
                    <button class="btn btn-danger" type="button" onclick="cerrarModal('modalDirecciones')">Cancelar</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "Backend/Views/Templates/footer.php"; ?>