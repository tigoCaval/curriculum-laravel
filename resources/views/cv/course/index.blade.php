@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Cursos') }}</div>
                
                <div class="card-body">

                    <div>    
                        @can('create', App\Models\Course::class)
                            <a href="{{route('courses.create')}}" class="btn btn-info active" role="button"> 
                               Cadastrar
                            </a>
                            <hr>
                        @endcan 
                    </div>     

                      @forelse ($courses as $item)
                        <div class="row text-dark">
                                <div class="form-group col"><strong>Tipo do Curso:</strong> {{$item->courseType->description}}</div>
                                <div class="form-group col"><strong>Nome do Curso:</strong> {{$item->description}}</div>
                                <div class="form-group col"><strong>Instituição:</strong> {{$item->institution}}</div>
                        </div>
                        <div class="row text-dark"> 
                                <div class="form-group col"><strong>País:</strong>{{$item->country}}</div>
                                <div class="form-group col"><strong>Estado:</strong>{{$item->uf}}</div>
                                <div class="form-group col"><strong>Cidade:</strong>{{$item->city}}</div>
                        </div>
                        <div class="row text-dark">       
                                <div class="form-group col"><strong>Início:</strong>{{$date->convert($item->start)}}</div>
                                <div class="form-group col"><strong>Conclusão:</strong>{{$date->convert($item->end)}}</div> 
                                <div class="form-group col"><strong>Situação do Curso:</strong> {{$item->courseStatus->description}}</div>
                        </div> 
                        <a class="btn btn-outline-success" href="{{route('courses.edit',$item->id)}}">Editar</a> 
                        <a class="btn btn-outline-danger" href="{{route('courses.show',$item->id)}}">Excluir</a>         
                        <hr>
                        
                          
                      @empty 
                        <div class="row text-dark">
                            <div class="form-group col">
                                <strong>Tipo do Curso:</strong>
                            </div>   
                            <div class="form-group col">
                                <strong>Nome do Curso:</strong>
                            </div>
                            <div class="form-group col">
                                <strong>Instituição:</strong>
                            </div>            
                        </div>
                        <div class="row text-dark"> 
                            <div class="form-group col">        
                                <strong>País:</strong>
                            </div>
                            <div class="form-group col">    
                                <strong>Estado:</strong>
                            </div> 
                            <div class="form-group col">   
                                <strong>Cidade:</strong>
                            </div>    
                        </div>
                        <div class="row text-dark">  
                            <div class="form-group col">
                                <strong>Início:</strong>
                            </div>
                            <div class="form-group col">    
                                <strong>Conclusão:</strong>
                            </div>
                            <div class="form-group col">     
                                <strong>Situação do Curso:</strong>
                            </div>   
                        </div>            
                      @endforelse
                      {{ $courses->links() }}            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
