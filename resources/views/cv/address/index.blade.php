@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Endereço') }}</div>
                
                <div class="card-body">

                    <div>    
                        @can('create', App\Models\Address::class)
                            <a href="{{route('addresses.create')}}" class="btn btn-info active" role="button"> 
                               Cadastrar
                            </a>
                        @endcan 
    
                        @if($address)
                        <a href="{{route('addresses.edit',$address->id)}}" class="btn btn-success">
                            Editar
                        </a>
                        @endif   
                    </div>     

                    <hr>
                    <div class="text-dark">
                     
                        <p>
                           <strong>País:</strong> @if($address) {{$address->country}} @endif
                        </p>
                        <p>
                           <strong>Cidade:</strong> @if($address) {{$address->city}} @endif
                        </p>
                        <p>
                           <strong>Estado:</strong> @if($address) {{$address->uf}} @endif
                        </p>
                        <p>
                           <strong>Endereço:</strong> @if($address) {{$address->address}} @endif
                        </p>
                        <p>
                           <strong>Bairro:</strong> @if($address) {{$address->neighborhood}} @endif
                        </p>
                        <p>
                           <strong>CEP:</strong> @if($address) {{$address->postal_code}} @endif
                        </p>
                     </div>                 
                                
                            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
