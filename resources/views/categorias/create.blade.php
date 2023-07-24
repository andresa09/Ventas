 {{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="card">
               <div>
                



                <p>pruebasbj</p>

                





               </div>
            </div>

    </div>
</div>
@endsection --}}



 <!-- Button trigger modal -->


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Registro para nuevos tipos de categorias</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="{{ url('/categorias') }}" class="needs-validation"
                     enctype="multipart/form-data" novalidate>
                     @csrf

                     <center>
                         <h3>
                             INGRESE NUEVA CATEGORIA
                         </h3>
                     </center>


                     <div class="form-row align-items-center">

                         <div class="card-body">

                             <div class="form-group col-md-10 col-sm-6 col-xs-6">
                                 <label for="nombre_categoria">NOMBRE DE CATEGORIA</label>
                                 <input type="text"class="form-control " name="nombre_categoria"
                                     id="nombre_categoria" placeholder="ESCRIBA LA NUEVA CATEGORIA" required>
                             </div>

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
