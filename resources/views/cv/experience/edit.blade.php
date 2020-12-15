@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Experiência Profissional/Editar') }}</div>
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
    
                <form method="Post" action="{{route('experiences.update',$experience->id)}}" >
                  @csrf
                  @method('Put')

                      <div class="row">  
                            
                            <div class="form-group col">
                                <label for="company1">Empresa *</label>
                                <input class="form-control text-dark" type="text" id="company1" name="company" placeholder="nome da empresa"  value="{{$experience->company}}" >
                            </div>

                            <div class="form-group col">
                                <label for="location1">Local *</label>
                                <input class="form-control text-dark" type="text" id="location1" name="location" placeholder="local ex: Cidade, País"  value="{{$experience->location}}" >
                            </div>

                            <div class="form-group col">
                                <label for="jobTitle1">Função *</label>
                                <input class="form-control text-dark" type="text" id="jobTitle1" name="job_title" placeholder="informe a função (cargo)"   value="{{$experience->job_title}}" >
                            </div>
                      </div>

                      <div class="row"> 
                           
                            <div class="form-group col">
                                <label for="description1">Descrição </label>
                                <textarea class="form-control text-dark" name="description" id="description1" cols="30" rows="10">{{$experience->description}}</textarea>
                            </div>
                      </div>

                      <div class="row"> 

                            <div class="form-group col">
                                <label for="start1">Início *</label>
                                <input class="form-control text-dark" type="date" id="start1" name="start" value="{{$experience->start}}" >
                            </div>

                            <div class="form-group col">
                                <label for="end1">Encerramento *</label>
                                <input class="form-control text-dark" type="date" id="end1" name="end" value="{{$experience->end}}" > 
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