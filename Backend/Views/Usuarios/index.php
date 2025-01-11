<?php
include "Backend/Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Usuarios</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmRegistrar();">Agregar <i class="fas fa-plus"></i></button>

<!----------------------------------------------------
                     Tablas
----------------------------------------------------->
<table id="tblUsuarios" class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Rol</th>
            <th>Estatus</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Fecha Registro</th>
            <th>Notificaciones</th>
            <th>Terminos</th>
            <th>Editar</th>
            <th>Inhabilitar</th>
        </tr>

    </thead>
    <tbody>
        <!-- Las filas se generan dinamicamente -->
    </tbody>
</table>
<!------------------------------------------------------------------
                    Modal Registro
 ------------------------------------------------------------------>

<div id="Registrar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Registrar Nuevo Usuario</h5>
                <button class="close" onclick="cerrarModal('Registrar')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary text-center d-none" id="alerta" role="alert">
                </div>
                <form method="POST" id="frmRegistrar">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="id" type="hidden" name="id">
                                <label for="Rol">Rol</label>
                                <select id="Rol" class="form-control" name="Rol">
                                    <?php foreach ($data['roles'] as $row) { ?>
                                        <option value="<?php echo $row['id_rol'] ?>"><?php echo $row['nombre_rol'] ?></option> <!--Cargar el nombre de los roles-->
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Est">Estatus</label>
                                <select id="Est" class="form-control" name="Est">
                                    <?php foreach ($data['estatus'] as $row) { ?>
                                        <option value="<?php echo $row['id_estatus'] ?>"><?php echo $row['nombre_est'] ?></option> <!--Cargar el nombre de los roles-->
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

           

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputNombre">Nombre</label>
                        <input id="inputNombre" class="form-control" type="Text" name="Nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputApellido">Apellido</label>
                        <input id="inputApellido" class="form-control" type="Text" name="Apellido" placeholder="Apellido">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputCorreo">Correo</label>
                        <input id="inputCorreo" class="form-control" type="Email" name="Correo" placeholder="Correo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputTelefono">Telefono</label>
                        <input id="inputTelefono" class="form-control" type="Text" name="Telefono" placeholder="Telefono">
                    </div>
                </div>
            </div>

            <div class="row" id="claves">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputContraseña">Contraseña</label>
                        <input id="inputContraseña" class="form-control" type="Password" name="Contraseña" placeholder="Contraseña">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputConfContraseña">Confirmar Contraseña</label>
                        <input id="inputConfContraseña" class="form-control" type="Password" name="ConfContraseña" placeholder="Confirmar Contraseña">
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="button" onclick="handleAction(event)" id="btnAccion">Aceptar</button>
            <button class="btn btn-danger" type="button" onclick="cerrarModal('Registrar')" >Cancelar</button>
            </form>
        </div>
    </div>
</div>
</div>


<?php include "Backend/Views/Templates/footer.php"; ?>