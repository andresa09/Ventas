@extends('layouts.app')

@section('content')
    <section class="section ">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card-body">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-12">

                                    @if (session('success_delete'))
                                        <div class="alert alert-success">
                                            {{ session('success_delete') }}
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn rounded-pill btn-warning dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                OPCIONES <i class="bi bi-list-columns"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                                                <li class="list-group-item list-group-item-warning ">
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        INGRESAR CATEGORIA
                                                    </a>

                                                </li>


                                                <li class="list-group-item list-group-item-danger">
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal1">
                                                        INGRESAR PRODUCTO

                                                    </button>

                                                </li>

                                                <li class="list-group-item list-group-item-success">

                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#carritoModal">
                                                        VER CARRITO 
                                                    </button>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <table class="table" id="ventas" class="table table-striped "
                                        style="width:100% border-radius: 5px">
                                        <thead>

                                            <tr>
                                                <th scope="col">PRODUCTO </th>
                                                <th scope="col">CATEGORIA</th>
                                                <th scope="col">ACCION </th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($producto as $productos)
                                                <tr>


                                                    <td>{{ $productos->nombre_producto }}</td>
                                                    <td>{{ $productos->categoria->nombre_categoria }}</td>


                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Botones de acción">

                                                            {{-- BOTON DE ACTUALIZAR --}}
                                                        <a type="button" class="btn btn-primary me-2"
                                                        href="productos/{{ $productos->id }}/edit"><i class="bi bi-arrow-clockwise"></i></a>


                                                    {{-- BOTON DE ELIMINAR --}}
                                                    <form method="post"
                                                        action="{{ url('/productos', $productos->id) }}"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger me-2" ><i class="bi bi-trash3"></i></button>
                                                    </form>


                                                    {{-- CARRITO --}}
                                                    <form action="{{ route('cart.store') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $productos->id }}">
                                                        <input type="hidden" name="nombre_producto"
                                                            value="{{ $productos->nombre_producto }}">
                                                        <input type="hidden" name="descripcion_producto"
                                                            value="{{ $productos->descripcion_producto }}">
                                                        <input type="hidden" name="cantidad_producto"
                                                            value="{{ $productos->cantidad_producto }}">
                                                        <input type="hidden" name="precio_unitario"
                                                            value="{{ $productos->precio_unitario }}">
                                                        <input type="hidden" name="iva"
                                                            value="{{ $productos->iva }}">
                                                        <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i></button>
                                                    </form>

                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>


                                    <!-- Modal para el Carrito de Compras -->
                                    <div class="modal fade" id="carritoModal" tabindex="-1"
                                        aria-labelledby="carritoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="carritoModalLabel">Carrito de Compras</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- Aquí puedes copiar el contenido del carrito de compras --}}
                                                    @if (Cart::getContent()->count() > 0)
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Producto</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Precio</th>
                                                                    <th>Subtotal</th>
                                                                    <th>Eliminar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach (Cart::getContent() as $item)
                                                                    <tr>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td>{{ $item->quantity }}</td>
                                                                        <td>{{ $item->price }}</td>
                                                                        <td>{{ $item->price * $item->quantity }}</td>
                                                                        <td>
                                                                            <form action="{{ route('cart.remove') }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $item->id }}">
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">Eliminar</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p>No hay productos en el carrito</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('categorias.create')
    @include('productos.create')

    <script>
        $(document).ready(function() {
            $('#ventas').DataTable({

                processing: true,

                lengthMenu: [5, 10, 25, 50, 75],
                language: {
                    "url": "http://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
                },
                pagingType: 'full_numbers',
                responsive: true,
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endsection
