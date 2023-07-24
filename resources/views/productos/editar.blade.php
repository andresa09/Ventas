@extends('layouts.app')

@section('content')
    <section class="section ">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card-body">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ url('/productos', $productoActualizado->id) }}"
                                    class="needs-validation" enctype="multipart/form-data">

                                    @csrf
                                    {{ method_field('PATCH') }}

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <center>
                                        <h3>
                                            ACTUALIZAR EL PRODUCTO
                                        </h3>
                                    </center>

                                    <input type="hidden" value="{{ $productoActualizado->id }}" name="id">

                                    <div class="form-row align-items-center">

                                        <div class="card-body">

                                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                                <label for="nombre_producto">NOMBRE DE PRODUCTO</label>
                                                <input type="text"class="form-control " name="nombre_producto"
                                                    id="nombre_producto"
                                                    value="{{ $productoActualizado->nombre_producto }}">
                                            </div>

                                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                                <label for="descripcion_producto">DESCRIPCION DE PRODUCTO</label>
                                                <input type="text"class="form-control " name="descripcion_producto"
                                                    value="{{ $productoActualizado->descripcion_producto }}">
                                            </div>

                                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                                <label for="cantidad_producto">CANTIDAD DE PRODUCTO</label>
                                                <input type="text"class="form-control " name="cantidad_producto"
                                                    value="{{ $productoActualizado->cantidad_producto }}">
                                            </div>

                                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                                <label for="precio_unitario">PRECIO UNITARIO</label>
                                                <input type="text"class="form-control " name="precio_unitario"
                                                    id="precio_unitario"
                                                    value="{{ $productoActualizado->precio_unitario }}">
                                            </div>

                                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                                <label for="iva">IVA </label>
                                                <input type="text"class="form-control " name="iva" id="iva"
                                                    value="{{ $productoActualizado->iva }}">
                                            </div>

                                            <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                                <label for="categoria_id">CATEGORIA</label>
                                                <select class="form-select mr-sm-2" id="categoria_id" name="categoria_id">
                                                    <option></option>
                                                    @foreach ($categoria as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            @if ($cat->id == $productoActualizado->categoria_id) selected @endif>
                                                            {{ $cat->nombre_categoria }}</option>
                                                    @endforeach
                                                </select>
                                            </div>



                                        </div>

                                    </div>

                                    <div >
                                        <a type="button" class="btn btn-secondary" href="/home">REGRESAR</a>
                                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
