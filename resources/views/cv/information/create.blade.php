@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Dados Pessoais/Cadastrar') }}</div>
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
                <form method="Post" action="{{route('personal_informations.store')}}">
                  @csrf

                        <div class="form-group">
                          <label for="gender1">Gênero</label> 
                          <select class="form-control" id="gender1" name="gender">
                            <option value="">Selecione</option> 
                            @foreach ($genders as $item)
                               <option value="{{$item->id}}">{{$item->description}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="maritalStatus1">Estado Civil</label>
                          <select class="form-control" id="maritalStatus1" name="marital_status" >
                            <option value="">Selecione</option> 
                            @foreach ($maritalStatus as $item)
                               <option value="{{$item->id}}">{{$item->description}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="disability1">Possui Deficiência?</label>
                        <input class="form-control text-dark" type="text" id="disability1" name="disability" placeholder="Preenchimento opcional" value="{{old('disability')}}">
                          <small>Se você possuir alguma deficiência descrever no formulário acima </small>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                      </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection