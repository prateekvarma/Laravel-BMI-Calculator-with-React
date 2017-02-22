
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <h3 class="panel-heading">Historia de {{ Auth::user()->name }} :</h3>

                <div class="panel-body">
                    <table class="table">
                    <thead>
                      <tr>
                        <th>Peso</th>
                        <th>Altura</th>
                        <th>IMC Calculado</th>
                        <th>Clasificacion</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($imc_obj as $imcs)
                      <tr>
                        <td>{{ $imcs->peso }} Kg</td>
                        <td>{{ $imcs->altura }} m</td>
                        <td>{{ $imcs->imccalculado }}</td>
                        <td>{{ $imcs->clasificacion }}</td>
                        <td>{{ date('F d, Y', strtotime($imcs->created_at)) }}</td>
                        
                      </tr>
                        @endforeach
                    </tbody>
                    
                  </table>
                  <div class="text-center">
                      
                  {{ $imc_obj->links() }}
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection