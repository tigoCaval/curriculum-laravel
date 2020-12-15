@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Curso') }}</div>
                
                <div class="card-body">

                       <div class="alert alert-warning">
                          <strong>Tem certeza que deseja excluir este curso?</strong>
                       </div>
                        <div class="row text-dark">
                                <div class="form-group col"><strong>Tipo do Curso:</strong> {{$course->courseType->description}}</div>
                                <div class="form-group col"><strong>Nome do Curso:</strong> {{$course->description}}</div>
                                <div class="form-group col"><strong>Instituição:</strong> {{$course->institution}}</div>
                        </div>
                        <div class="row text-dark"> 
                                <div class="form-group col"><strong>País:</strong>{{$course->country}}</div>
                                <div class="form-group col"><strong>Estado:</strong>{{$course->uf}}</div>
                                <div class="form-group col"><strong>Cidade:</strong>{{$course->city}}</div>
                        </div>
                        <div class="row text-dark">       
                                <div class="form-group col"><strong>Início:</strong>{{$date->convert($course->start)}}</div>
                                <div class="form-group col"><strong>Conclusão:</strong>{{$date->convert($course->end)}}</div> 
                                <div class="form-group col"><strong>Situação do Curso:</strong> {{$course->courseStatus->description}}</div>
                        </div> 

                    <form method="Post" action="{{route('courses.destroy',$course->id)}}">
                         @csrf
                         @method('Delete')

                        <button class="btn btn-outline-danger"  type="submit">Excluir</button>
                        <a class="btn btn-outline-dark" href="{{route('courses.index')}}">Cancelar</a>    
                    </form>   
                       
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
