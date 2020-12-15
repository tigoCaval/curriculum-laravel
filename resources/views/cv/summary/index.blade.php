@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Resumo') }}</div>
                
                <div class="card-body">
                    <div>
                    
                        @can('create', App\Models\Summary::class) 
                            <a href="{{route('summaries.create')}}" class="btn btn-info active" role="button"> 
                                Cadastrar
                            </a>
                            <hr> 
                        @endcan   
                            
                    </div>       
                       
                    <div class="text-dark">

                        <p><strong>Resumo:</strong>@if($summary) {{$summary->description}} @endif </p>
                        @if($summary)
                            <hr>
                            <a  class="btn btn-outline-success" href="{{route('summaries.edit',$summary->id)}}">Editar</a>
                            <a class="btn btn-outline-danger" href="{{route('summaries.show',$summary->id)}}">Excluir</a> 
                        @endif 
                       
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
