<?php
include "Backend/Views/Templates/header.php"; ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Propiedades de los productos</li>
</ol>

<div class="container mt-2">
    <!-- Navegación entre pestañas -->
    <ul class="nav nav-tabs" id="configTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="categorias-tab" data-bs-toggle="tab" data-bs-target="#categorias" type="button" role="tab" aria-controls="categorias" aria-selected="true">Categorías</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="atributos-tab" data-bs-toggle="tab" data-bs-target="#atributos" type="button" role="tab" aria-controls="atributos" aria-selected="false">Atributos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ofertas-tab" data-bs-toggle="tab" data-bs-target="#ofertas" type="button" role="tab" aria-controls="ofertas" aria-selected="false">Ofertas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="etiquetas-tab" data-bs-toggle="tab" data-bs-target="#etiquetas" type="button" role="tab" aria-controls="etiquetas" aria-selected="false">Etiquetas</button>
        </li>
    </ul>

    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="configTabContent">
         <div class="alert alert-primary text-center d-none" id="alerta" role="alert">
                </div>
        <!-- Categorías -->
        <div class="tab-pane fade show active" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
            <h3>Registro de Categorías</h3>
            <form id="frmRegistrarCategoria">
            
                <div class="row">
               
                    <!-------------------- Guardar el id del estado para la edicion ----------------------> 
                    <input id="Inputid_est" name="id_est" type="hidden"> 
                    <!------------------------------------------------------------------------------------> 
                    <!-------------------- Guardar el id del estado para la edicion ----------------------> 
                    <input id="Inputid_empresa" name="empresa" type="hidden"> 
                    <!------------------------------------------------------------------------------------> 
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombreCategoria" class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" id="InputNombre" name="nombreCategoria" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcionCategoria" class="form-label">Descripción</label>
                            <textarea class="form-control" id="InputDescripcion" name="descripcionCategoria" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="button" onclick="handleActionCat(event)" id="btnAccionCat">Registrar Categoría</button>
            
            </form>
            <table id="tblCategorias" class="table table-light mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Las filas se generan dinamicamente -->
                </tbody>
            </table>
        </div>

        <!-- Atributos -->
        <div class="tab-pane fade" id="atributos" role="tabpanel" aria-labelledby="atributos-tab">
            <h3>Registro de Atributos</h3>
            <form id="frmRegistrarAtributo">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombreAtributo" class="form-label">Nombre del Atributo</label>
                            <input type="text" class="form-control" id="nombreAtributo" required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipoAtributo" class="form-label">Categoria</label>
                            <select class="form-select" id="tipoAtributo">
                                <option value="texto">Pantalones</option>
                                <option value="numerico">Zapatos</option>
                                <option value="predefinido">Camisas</option>
                            </select>
                        </div>
                        <div class="mb-3" id="valoresPredefinidos" style="display: none;">
                            <label for="valoresAtributo" class="form-label">Valores Predefinidos (separados por comas)</label>
                            <input type="text" class="form-control" id="valoresAtributo">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Registrar Atributo</button>
            </form>

            <table id="tblAtributos" class="table table-light mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Las filas se generan dinamicamente -->
                </tbody>
            </table>
        </div>

        <!-- Ofertas -->
        <div class="tab-pane fade" id="ofertas" role="tabpanel" aria-labelledby="ofertas-tab">
            <h3>Registro de Ofertas</h3>
            <form id="frmRegistrarOferta">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label for="productoOferta" class="form-label">Producto</label>
                            <select class="form-select" id="productoOferta">
                                <option value="">Seleccione un producto</option>
                                <!-- Aquí se cargarán dinámicamente los productos -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descuentoOferta" class="form-label">Descuento (%)</label>
                            <input type="number" class="form-control" id="descuentoOferta" placeholder="Descuento (%)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechaInicioOferta" class="form-label">Fecha Inicio</label>
                            <input type="date" class="form-control" id="fechaInicioOferta">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechaFinOferta" class="form-label">Fecha Fin</label>
                            <input type="date" class="form-control" id="fechaFinOferta">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Registrar Oferta</button>
            </form>
            <table id="tblOfertas" class="table table-light mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Estado</th>
                        <th>Producto</th>
                        <th>Descuento</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Las filas se generan dinamicamente -->
                </tbody>
            </table>
        </div>

        <!-- Etiquetas -->
        <div class="tab-pane fade" id="etiquetas" role="tabpanel" aria-labelledby="etiquetas-tab">
            <h3>Registro de Etiquetas</h3>
            <form id="frmRegistrarEtiqueta">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="nombreEtiqueta" class="form-label">Nombre de la Etiqueta</label>
                            <input type="text" class="form-control" id="nombreEtiqueta" required>
                        </div>
                    </div>
                  <!--   <div class="col-md-6">
                        <div class="form-group">
                            <label for="colorEtiqueta" class="form-label">Color</label>
                            <input type="color" class="form-control" id="colorEtiqueta">
                        </div>
                    </div> -->
                </div>
                <button type="submit" class="btn btn-primary">Registrar Etiqueta</button>
            </form>
            <table id="tblEtiquetas" class="table table-light mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Las filas se generan dinamicamente -->
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include "Backend/Views/Templates/footer.php"; ?>