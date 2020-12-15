@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Contato') }}</div>
              
                <div class="card-body">
                    <div>
                        @can('create', App\Models\Contact::class)
                          <a href="{{route('contacts.create')}}" class="btn btn-info active" role="button"> 
                             Cadastrar
                          </a>
                        @endcan

                        @if($contact)
                        <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-success">
                           Editar
                         </a>
                        @endif  
                    </div>
                    <hr>
                    <div class="text-dark">
                      <p>
                        <strong>Telefone:</strong> @if($contact) {{$contact->phone}} @endif
                      </p>

                      <p>
                         <strong>Tel Recado:</strong> @if($contact) {{$contact->phone_message}} @endif
                      </p>

                      <p>
                         <strong>E-mail:</strong> @if($contact) {{$contact->email}} @endif 
                      </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
