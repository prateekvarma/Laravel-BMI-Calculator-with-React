@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Rellene esta formulario para revisar tu IMC :</div>

                <div class="panel-body" >
                    <form method="POST" id="result" action="" @submit="onSubmit">
                        <div class="form-group">
                            <label for="peso">Peso (Kg) : </label>
                            <input type="text" name="peso" class="form-control" v-model="peso" />
                            <label for="altura">Altura (m) : </label>
                            <input type="text" name="altura" class="form-control" v-model="altura" />
                            <br />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="Enviar" class="btn btn-success pull-right"/>
                        </div>
                    </form>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
     <div class="row">
       <div class="col-md-8 col-md-offset-2">
          <div class="alert alert-success" role="alert">
        
            <div id="last-imc"></div>
    </div>
    </div>
    </div>
</div>

@endsection