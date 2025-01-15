<?php include "Backend/Views/Templates/header.php"; ?>

<div class="card">
    <div class="card-header bg-dark text-white">
        Datos de la Empresa
    </div>
    <div class="card-body">
        <form id="frmEmpresa" enctype="multipart/form-data">
            <input id="id_empresa" class="form-control" type="hidden" name="id_empresa" value="<?php echo $data['ID_Empresa']; ?>">
            <input id="id_vendedor" class="form-control" type="hidden" name="id_vendedor" value="<?php echo $data['ID_Usuario']; ?>">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputNombre">Nombre</label>
                        <input id="inputNombre" class="form-control" type="text" name="Nombre" placeholder="Nombre de la Empresa" value="<?php echo $data['Nombre_Empresa']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputRNC">RNC</label>
                        <input id="inputRNC" class="form-control" type="text" name="RNC" placeholder="RNC" value="<?php echo $data['RNC']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputDir">Dirección</label>
                        <input id="inputDir" class="form-control" type="text" name="Direccion" placeholder="Dirección de la empresa" value="<?php echo $data['Direccion_Empresa']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputTelefono">Teléfono</label>
                        <input id="inputTelefono" class="form-control" type="text" name="Telefono" placeholder="Teléfono de la empresa" value="<?php echo $data['Telefono_Empresa']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputCorreo">Correo</label>
                        <input id="inputCorreo" class="form-control" type="text" name="Correo" placeholder="Correo de la empresa" value="<?php echo $data['Correo_Empresa']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputLogo">Logo de la Empresa</label>
                        <div class="input-group">
                            <?php if (!empty($data['Ruta_Logo'])): ?>
                                <img src="<?php echo $data['Ruta_Logo']; ?>" alt="Logo de la Empresa" class="img-thumbnail mt-2" width="150" id="logoPreview">
                            <?php endif; ?>
                            <input id="inputLogo" class="form-control-file" type="file" name="Ruta_Logo" onchange="document.getElementById('logoPreview').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Modificar</button>
        </form>
    </div>
</div>

<?php include "Backend/Views/Templates/footer.php"; ?>
