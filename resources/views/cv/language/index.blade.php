@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Idioma') }}</div>
                
                <div class="card-body">

                    <div>    
                        @can('create', App\Models\Language::class)
                            <a href="{{route('languages.create')}}" class="btn btn-info active" role="button"> 
                               Cadastrar
                            </a>
                            <hr>
                        @endcan 
                    </div>     

                      @forelse ($languages as $item)
                        <div class="row text-dark">
                                <div class="form-group col"><strong>Idioma:</strong> {{$item->description}}</div>
                                <div class="form-group col"><strong>Leitura:</strong> {{$item->readingLanguage->description}}</div>
                                <div class="form-group col"><strong>Escrita:</strong> {{$item->writingLanguage->description}}</div>
                                <div class="form-group col"><strong>Conversação:</strong> {{$item->speakLanguage->description}}</div>
                        </div>
                        <a class="btn btn-outline-success" href="{{route('languages.edit',$item->id)}}">Editar</a> 
                        <a class="btn btn-outline-danger" href="{{route('languages.show',$item->id)}}">Excluir</a>         
                        <hr> 
                      @empty 
                        <div class="row text-dark">
                            <div class="form-group col">
                                <strong>Idioma:</strong>
                            </div>   
                            <div class="form-group col">
                                <strong>Leitura:</strong>
                            </div>
                            <div class="form-group col">
                                <strong>Escrita:</strong>
                            </div> 
                            <div class="form-group col">
                                <strong>Conversação:</strong> 
                            </div>            
                        </div> 
                      @endforelse
                      {{ $languages->links() }}            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
