@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Objetivo') }}</div>
                
                <div class="card-body">

                       <div class="alert alert-warning">
                          <strong>Tem certeza que deseja excluir?</strong>
                       </div>
                        <div class="row text-dark">
                                <div class="form-group col"><strong>Objetivo:</strong> {{$objective->description}}</div>
                        </div>
                      
                    <form method="Post" action="{{route('objectives.destroy',$objective->id)}}">
                         @csrf
                         @method('Delete')

                        <button class="btn btn-outline-danger"  type="submit">Excluir</button>
                        <a class="btn btn-outline-dark" href="{{route('objectives.index')}}">Cancelar</a>    
                    </form>   
                       
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
