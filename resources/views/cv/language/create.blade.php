@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Idioma/Cadastrar') }}</div>
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
    
                <form method="Post" action="{{route('languages.store')}}" >
                  @csrf

                      <div class="row">  
                            
                            <div class="form-group col">
                                <label for="language1">Idioma *</label>
                                <input class="form-control text-dark" type="text" id="language1" name="language" placeholder="informe o idioma"  value="{{old('language')}}" >
                            </div>

                            <div class="form-group col">
                                <label for="readingLanguage1">Leitura *</label> 
                                <select class="form-control" id="readingLanguage1" name="reading_language">
                                <option value="">Selecione</option>    
                                    @foreach ($readingLanguage as $item)
                                        <option value="{{$item->id}}">{{$item->description}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="writingLanguage1">Escrita *</label> 
                                <select class="form-control" id="writingLanguage1" name="writing_language">
                                <option value="">Selecione</option>    
                                    @foreach ($writingLanguage as $item)
                                        <option value="{{$item->id}}">{{$item->description}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="speakLanguage1">Conversação *</label> 
                                <select class="form-control" id="speakLanguage1" name="speak_language">
                                <option value="">Selecione</option>    
                                    @foreach ($writingLanguage as $item)
                                        <option value="{{$item->id}}">{{$item->description}}</option>
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