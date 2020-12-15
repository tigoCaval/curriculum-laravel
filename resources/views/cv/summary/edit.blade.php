@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Resumo/Editar') }}</div>
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
    
                <form method="Post" action="{{route('summaries.update',$summary->id)}}" >
                  @csrf
                  @method('Put') 

                      <div class="row">  
                            <div class="form-group col">
                                <label for="description1">Resumo *</label>
                                <textarea class="form-control text-dark" id="description1" name="description" cols="30" rows="2">{{$summary->description}}</textarea>
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