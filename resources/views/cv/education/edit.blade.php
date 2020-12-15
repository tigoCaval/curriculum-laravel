@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Escolaridade/Editar') }}</div>
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
                <form method="Post" action="{{route('educations.update',$education->id)}}" >
                  @csrf
                  @method('Put')

                        <div class="form-group">
                            <label for="educationCourse1">Qual a sua escolaridade? *</label> 
                            <select class="form-control" id="educationCourse1" name="education_course">
                            <option value="">Selecione</option> 
                            @foreach ($courses as $item)
                                <option value="{{$item->id}}" @if($item->id == $education->education_course_id) selected @endif>
                                    {{$item->description}}
                                </option>
                            @endforeach 
                            </select>
                        </div>   
                        <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

                   
                </div>
            </div>
     </div> 
    
    </div>
</div>


@endsection