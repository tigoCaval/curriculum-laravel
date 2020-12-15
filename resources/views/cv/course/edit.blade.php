@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Curso/Editar') }}</div>
                <div class="card-body">
                     <!-- Mensagens de erros -->
                 @if($errors->any())
                  @foreach($errors->all() as $error )
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$error}}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @endforeach                    
                 @endif
                    <!--# Mensagens de erros -->
    
                <form method="Post" action="{{route('courses.update',$course->id)}}" >
                  @csrf
                  @method('Put')

                      <div class="row">  
                            
                           <div class="form-group col">
                                <label for="courseType1">Tipo do Curso</label> 
                                <select class="form-control" id="courseType1" name="course_type">
                                <option value="">Selecione</option> 
                                @foreach ($courseTypes as $item)
                                    <option value="{{$item->id}}" @if($item->id == $course->course_type_id) selected @endif>
                                        {{$item->description}}
                                    </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="courseName1">Nome do curso *</label>
                                <input class="form-control text-dark" type="text" id="courseName1" name="course_name"   value="{{$course->description}}" >
                            </div>

                            <div class="form-group col">
                                <label for="institution1">Instituição *</label>
                                <input class="form-control text-dark" type="text" id="institution1" name="institution"   value="{{$course->institution}}" >
                            </div>
                      </div>
                      <div class="row"> 
                            <div class="form-group col">
                                <label for="country1">País *</label>
                                <input class="form-control text-dark" type="text" id="country1" name="country"   value="{{$course->country}}" >
                            </div>

                            <div class="form-group col">
                                <label for="uf1">Estado *</label>
                                <input class="form-control text-dark" type="text" id="uf1" name="uf"  value="{{$course->uf}}">
                            </div>

                            <div class="form-group col">
                                <label for="city1">Cidade *</label>
                                <input class="form-control text-dark" type="text" id="city1" name="city"  value="{{$course->city}}" >
                            </div>
                      </div>  
                      <div class="row"> 

                            <div class="form-group col">
                                <label for="start1">Início *</label>
                                <input class="form-control text-dark" type="date" id="start1" name="start" value="{{$course->start}}" >
                            </div>

                            <div class="form-group col">
                                <label for="end1">Encerramento *</label>
                                <input class="form-control text-dark" type="date" id="end1" name="end" value="{{$course->end}}" > 
                            </div>

                            <div class="form-group col">
                                <label for="courseStatus1">Situação *</label> 
                                <select class="form-control" id="courseStatus1" name="course_status">
                                <option value="">Selecione</option> 
                                @foreach ($courseStatus as $item)
                                    <option value="{{$item->id}}" @if($item->id == $course->course_status_id) selected @endif>
                                        {{$item->description}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                      </div>  
                        
                        <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

                   
                </div> <!-- #card-body -->
            </div> <!-- #card -->
     </div> 
    
    </div>
</div> <!-- #container-->


@endsection