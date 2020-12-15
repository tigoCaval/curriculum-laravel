@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Dados Pessoais') }}</div>
                
                <div class="card-body">
                    <div>
                    
                        @can('create', App\Models\PersonalInformation::class)
                            <a href="{{route('personal_informations.create')}}" class="btn btn-info active" role="button"> 
                                Cadastrar
                            </a>
                        @endcan  
        
                        @if($information)
                        <a href="{{route('personal_informations.edit',$information->id)}}" class="btn btn-success">
                            Editar
                            </a>
                        @endif  
                            
                    </div>       
                    <hr>       
                    <div class="text-dark">

                        <p>
                        <strong>Gênero:</strong> @if($information) {{$information->gender->description}} @endif
                        </p>

                        <p>
                        <strong>Estado Civil:</strong> @if($information) {{$information->maritalStatus->description}} @endif
                        </p>

                        <p>
                        <strong>Deficiência:</strong> @if($information) {{$information->disability}} @endif
                        </p>

                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
