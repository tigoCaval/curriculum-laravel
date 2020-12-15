@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Experiência Profissional') }}</div>
                
                <div class="card-body">

                    <div>    
                        @can('create', App\Models\Experience::class)
                            <a href="{{route('experiences.create')}}" class="btn btn-info active" role="button"> 
                               Cadastrar
                            </a>
                            <hr>
                        @endcan 
                    </div>     

                      @forelse ($experiences as $item)
                        <div class="row text-dark">
                                <div class="form-group col"><strong>Empresa:</strong> {{$item->company}}</div>
                                <div class="form-group col"><strong>Local:</strong> {{$item->location}}</div>
                                <div class="form-group col"><strong>Função:</strong> {{$item->job_title}}</div>
                        </div>
                        <div class="row text-dark"> 
                                <div class="form-group col"><strong>Descrição:</strong>
                                    <p> {{$item->description}}</p>
                                </div>
                        </div>
                        <div class="row text-dark">       
                                <div class="form-group col"><strong>Início:</strong>{{$date->convert($item->start)}}</div>
                                <div class="form-group col"><strong>Encerramento:</strong>{{$date->convert($item->end)}}</div> 
                        </div> 
                        <a class="btn btn-outline-success" href="{{route('experiences.edit',$item->id)}}">Editar</a> 
                        <a class="btn btn-outline-danger" href="{{route('experiences.show',$item->id)}}">Excluir</a>         
                        <hr>
                        
                          
                      @empty 
                        <div class="row text-dark">
                            <div class="form-group col">
                                <strong>Empresa:</strong>
                            </div>   
                            <div class="form-group col">
                                <strong>Local:</strong>
                            </div>
                            <div class="form-group col">
                                <strong>Função:</strong>
                            </div>            
                        </div>
                        <div class="row text-dark"> 
                            <div class="form-group col">        
                                <strong>Descrição:</strong>
                            </div>
                            <div class="form-group col">    
                                <strong>Início:</strong>
                            </div> 
                            <div class="form-group col">   
                                <strong>Encerramento:</strong> 
                            </div>    
                        </div>
                        
                      @endforelse
                      {{ $experiences->links() }}            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
