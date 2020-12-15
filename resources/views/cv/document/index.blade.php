@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Documentação') }}</div>
             
              
                <div class="card-body">
                  <div>  
                    @can('create', App\Models\Document::class)
                      <a href="{{route('documents.create')}}" class="btn btn-info active" role="button"> 
                         Cadastrar
                      </a>
                    @endcan
                    @if($document)
                       <a href="{{route('documents.edit',$document->id)}}" class="btn btn-success">
                          Editar
                        </a>
                    @endif  
                  </div> 
                   <hr>
                   <div class="text-dark"> 
                    <p>
                     <strong>Nome Completo:</strong> @if($document) {{$document->full_name}}@endif 
                    </p>

                    <p>
                      <strong>Data Nasc:</strong>  @if($document){{$date->convert($document->date_birth)}}@endif
                    </p>
                    <p>
                      <strong>Nacionalidade:</strong>  @if($document){{$document->nationality}}@endif
                    </p>
                    <p>
                      <strong>Naturalidade:</strong>  @if($document){{$document->place_birth}}@endif
                    </p>
                    <p>
                     <strong>CPF:</strong>  @if($document){{$document->ssn}}@endif
                    </p>
                    <p>
                     <strong>RG:</strong>  @if($document){{$document->identity}}@endif
                    </p>
                    <p>
                     <strong>CNH:</strong>  @if($document){{$document->driverLicense->description}}@endif
                    </p>

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
