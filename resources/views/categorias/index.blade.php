@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="card">
                <div class="container"> 

                    <br>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          index CAT
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">nueva categoria</a></li>
                          <li><a class="dropdown-item" href="#">nueo producto</a></li>
                          
                        </ul>
                      </div>
                      <br>

                   
                    
                        {{-- <!-- End Search Bar --> --}}
                   
                    <div class="right-icon">
                        <a > <i class="bi bi-arrow-clockwise"style="font-size: 2rem; color: black;"></i></a>
                    </div>
                </div>

                <table>
                    <thead class="thead-light">
                        <tr>
                            <th>PRODUCTO</th>
                            <th>CATEGORIA</th>
                            
                           
        
                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td>wdf</td>
                            <td>FRUTsffAS</td>
                            <td>FRUTsffAS</td>
                            <td>FRUTsffAS</td>

                            
                        </tr>
                    </tbody>
                </table>
            </div>

    </div>
</div>
@endsection
