@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
           
                <div class="card-header">{{ __('Endereço/Editar') }}</div>
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
                <form method="Post" action="{{route('addresses.update',$address->id)}}" >
                  @csrf
                  @method('Put')
                  
                      <div class="form-row">  
                            <div class="form-group col">
                            <label for="country1">País *</label>
                            <input class="form-control text-dark" type="text" id="country1" name="country" placeholder="informe o país"  value="{{$address->country}}" >
                            </div>

                            <div class="form-group col">
                                <label for="city1">Cidade *</label>
                                <input class="form-control text-dark" type="text" id="city1" name="city" placeholder="informe a cidade"  value="{{$address->city}}" >
                            </div>
                      </div>
                      <div class="form-row"> 
                            <div class="form-group col">
                                <label for="uf1">Estado *</label>
                                <input class="form-control text-dark" type="text" id="uf1" name="uf" placeholder="informe o estado"  value="{{$address->uf}}" >
                            </div>

                            <div class="form-group col">
                                <label for="address1">Endereço *</label>
                                <input class="form-control text-dark" type="text" id="address1" name="address" placeholder="informe o endereço"  value="{{$address->address}}" >
                            </div>
                      </div>  
                      <div class="form-row"> 
                            <div class="form-group col">
                                <label for="neighborhood1">Bairro *</label>
                                <input class="form-control text-dark" type="text" id="neighborhood1" name="neighborhood" placeholder="informe o bairro"  value="{{$address->neighborhood}}" >
                            </div>

                            <div class="form-group col">
                                <label for="postalCode1">CEP *</label>
                                <input class="form-control text-dark" type="text" id="postalCode1" name="postal_code" placeholder="informe o CEP"  value="{{$address->postal_code}}" >
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