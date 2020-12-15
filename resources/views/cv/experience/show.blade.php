@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Experiência Profissional') }}</div>
                   
                <div class="card-body">

                       <div class="alert alert-warning">
                          <strong>Tem certeza que deseja excluir?</strong>
                       </div>
                        <div class="row text-dark">
                                <div class="form-group col"><strong>Empresa:</strong> {{$experience->company}}</div>
                                <div class="form-group col"><strong>Local:</strong> {{$experience->location}}</div>
                                <div class="form-group col"><strong>Função:</strong> {{$experience->job_title}}</div>
                        </div>

                        <div class="row text-dark">
                            <div class="form-group col"><strong>Descrição:</strong>{{$experience->description}}</div>
                        </div>
 
                        <div class="row text-dark"> 
                                <div class="form-group col"><strong>Início:</strong>{{$date->convert($experience->start)}}</div>
                                <div class="form-group col"><strong>Encerramento:</strong>{{$date->convert($experience->end)}}</div>
                        </div>
                      
                    <form method="Post" action="{{route('experiences.destroy',$experience->id)}}">
                         @csrf
                         @method('Delete') 

                        <button class="btn btn-outline-danger"  type="submit">Excluir</button>
                        <a class="btn btn-outline-dark" href="{{route('experiences.index')}}">Cancelar</a>    
                    </form>   
                       
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
