@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Objetivo') }}</div>
                
                <div class="card-body">
                    <div>
                    
                        @can('create', App\Models\Objective::class) 
                            <a href="{{route('objectives.create')}}" class="btn btn-info active" role="button"> 
                                Cadastrar
                            </a>
                            <hr>
                        @endcan   
                            
                    </div>       
                     
                    <div class="text-dark">

                        <p>
                        <strong>Objetivo:</strong> @if($objective) {{$objective->description}} @endif
                        </p>
                        @if($objective)
                        <hr>
                        <a class="btn btn-outline-success" href="{{route('objectives.edit',$objective->id)}}">Editar</a> 
                        <a class="btn btn-outline-danger" href="{{route('objectives.show',$objective->id)}}">Excluir</a> 
                        @endif
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
