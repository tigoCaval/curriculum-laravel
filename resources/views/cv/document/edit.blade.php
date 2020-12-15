@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Documentação/Editar') }}</div>
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
                <form method="Post" action="{{route('documents.update',$document->id)}}" >
                  @csrf
                  @method('Put')

                      <div class="row">  
                            <div class="form-group col">
                            <label for="fullName1">Nome Completo *</label>
                            <input class="form-control text-dark" type="text" id="fullName1" name="full_name" placeholder="informe o nome completo"  value="{{$document->full_name}}">
                            </div>

                            <div class="form-group col">
                                <label for="dateBirth1">Data Nasc *</label>
                                <input class="form-control text-dark" type="date" id="dateBirth1" name="date_birth"  value="{{$document->date_birth}}" >
                            </div>
                      </div>
   
                      <div class="row"> 
                            <div class="form-group col">
                                <label for="nationality1">Nacionalidade *</label>
                                <input class="form-control text-dark" type="text" id="nationality1" name="nationality" placeholder="informe a nacionalidade"  value="{{$document->nationality}}" >
                            </div>

                            <div class="form-group col">
                                <label for="placeBirth1">Naturalidade *</label>
                                <input class="form-control text-dark" type="text" id="placeBirth1" name="place_birth" placeholder="informe a naturalidade"  value="{{$document->place_birth}}" >
                            </div>
                      </div>  

                      <div class="row"> 
                         
                           <div class="form-group col"> 
                                <label for="driverLicense1">CNH (Habilitação) *</label> 
                                <select class="form-control text-dark" id="driverLicense" name="driver_license">
                                <option value="">Selecione</option> 
                                @foreach ($driverLicenses as $item)
                                    <option value="{{$item->id}}" @if($item->id == $document->driver_license_id) selected @endif> 
                                        {{$item->description}}
                                    </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="ssn1">CPF</label>
                                <input class="form-control text-dark" type="text" id="ssn1" name="ssn" placeholder="informe o cpf (opcional)"  value="{{$document->ssn}}" >
                            </div>
         
                            <div class="form-group col">
                                <label for="identity1">RG</label>
                                <input class="form-control text-dark" type="tel" id="identity1" name="identity" placeholder="infome o rg (opcional)"  value="{{$document->identity}}" >
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