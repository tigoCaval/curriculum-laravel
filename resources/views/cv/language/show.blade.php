@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Idioma') }}</div>
                   
                <div class="card-body">

                       <div class="alert alert-warning">
                          <strong>Tem certeza que deseja excluir?</strong>
                       </div>
                       <div class="row text-dark">
                            <div class="form-group col"><strong>Idioma:</strong> {{$language->description}}</div>
                            <div class="form-group col"><strong>Leitura:</strong> {{$language->readingLanguage->description}}</div>
                            <div class="form-group col"><strong>Escrita:</strong> {{$language->writingLanguage->description}}</div>
                            <div class="form-group col"><strong>Conversação:</strong> {{$language->speakLanguage->description}}</div>
                       </div>
                       
                     <form method="Post" action="{{route('languages.destroy',$language->id)}}">
                         @csrf
                         @method('Delete') 

                        <button class="btn btn-outline-danger"  type="submit">Excluir</button>
                        <a class="btn btn-outline-dark" href="{{route('languages.index')}}">Cancelar</a>    
                    </form>   
                       
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
