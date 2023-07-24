<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ingreso de productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ url('/productos') }}" class="needs-validation"
                    enctype="multipart/form-data" novalidate>

                    @csrf

                    <center>
                        <h3>
                            INGRESE NUEVO PRODUCTO
                        </h3>
                    </center>

                    <div class="form-row align-items-center">

                        <div class="card-body">

                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                <label for="nombre_producto">NOMBRE DE PRODUCTO</label>
                                <input type="text"class="form-control " name="nombre_producto" id="nombre_producto"
                                    placeholder="ESCRIBA EL NOMBRE DEL PRODUCTO" required>
                            </div>

                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                <label for="descripcion_producto">DESCRIPCION DE PRODUCTO</label>
                                <input type="text"class="form-control " name="descripcion_producto"
                                    id="descripcion_producto" placeholder="ESCRIBA DESCRIPCION DEL PRODUCTO " required>
                            </div>

                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                <label for="cantidad_producto">CANTIDAD DE PRODUCTO</label>
                                <input type="text"class="form-control " name="cantidad_producto"
                                    id="cantidad_producto" placeholder="ESCRIBA LA CANTIDAD EN NUMEROS" required>
                            </div>

                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                <label for="precio_unitario">PRECIO UNITARIO</label>
                                <input type="text"class="form-control " name="precio_unitario" id="precio_unitario"
                                    placeholder="ESCRIBA PRECIO EN NUMEROS" required>
                            </div>

                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                <label for="iva">IVA </label>
                                <input type="text"class="form-control " name="iva" id="iva"
                                    placeholder="ESCRIBA EL VALOR EN NUMEROS" required>
                            </div>

                            <div class="form-group col-md-10 col-sm-6 col-xs-6"">
                                <label for="categoria_id">CATEGORIA</label>
                                <select class="form-select mr-sm-2" id="categoria_id" name="categoria_id">
                                    <option></option>
                                    @foreach ($categoria as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nombre_categoria }}</option>
                                    @endforeach
                                </select>
                            </div>



                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar <i
                            class="bi bi-x-octagon"></i></button>
                            <button type="submit" class="btn btn-primary">Guardar <i class="bi bi-check2-all"></i></button>
                    </div>

                </form>
                
            </div>

        </div>
    </div>
</div>
