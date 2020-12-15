@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Contato/Cadastrar') }}</div>
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
                <form method="Post" action="{{route('contacts.store')}}">
                  @csrf
                     <div class="form-row">
                        <div class="form-group col">
                           <label for="phone1">Telefone *</label>
                           <input class="form-control text-dark" type="tel" id="phone1" name="phone" placeholder="00000000000" minlength="10" maxlength="14" value="{{old('phone')}}" >
                           <small>O telefone deve ter entre 10 e 14 dígitos númericos </small>
                        </div>

                        <div class="form-group col">
                            <label for="phoneMessage1">Telefone de recado</label>
                            <input class="form-control text-dark" type="tel" id="phoneMessage1" name="phone_message" placeholder="00000000000" minlength="11" maxlength="14" value="{{old('phone_message')}}">
                            <small>O telefone deve ter entre 10 e 14 dígitos númericos</small> 
                        </div>
                     </div>   
                     
                     <div class="form-row">
                        <div class="form-group col">
                            <label for="email1">E-mail</label>
                            <input class="form-control text-dark" type="email" id="email1" name="email" placeholder="E-mail de contato" value="{{old('email')}}">
                        </div>
                     </div> 
                        <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection