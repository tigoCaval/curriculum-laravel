@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Escolaridade') }}</div>
                
                <div class="card-body">
                    <div>
                    
                        @can('create', App\Models\Education::class)
                            <a href="{{route('educations.create')}}" class="btn btn-info active" role="button"> 
                                Cadastrar
                            </a>
                        @endcan  
        
                        @if($education)
                        <a href="{{route('educations.edit',$education->id)}}" class="btn btn-success">
                            Editar
                            </a>
                        @endif  
                            
                    </div>       
                    <hr>       
                    <div class="text-dark">

                        <p>
                        <strong>Escolaridade:</strong> @if($education) {{$education->educationCourse->description}} @endif
                        </p>
                       
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
