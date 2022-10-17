@extends('layouts.appmain')
@section('title')
Meu Curriculum Vitae - {{ Auth::user()->name }} |
@endsection
@section('content')

<div class="wrapper">
    <div class="container-fluid">
      @if (session('success'))
      <div class="mt-4 alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <p><i class="icon fa fa-check"></i> {{ session('success') }}</p>
      </div>
      @endif

      @if (session('erro'))
      <div class="mt-4 alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <p><i class="icon fa fa-check"></i> {{ session('erro') }}</p>
      </div>
      @endif
      @if (session('warning'))
      <div class="mt-4 alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <p><i class="icon fa fa-check"></i> {{ session('warning') }}</p>
      </div>
      @endif

      <!-- Page-Title -->
      <div class="row">
          <div class="col-sm-12">
              <div class="page-title-box">
                  <div class="row align-items-center">
                      <div class="col-md-12">
                         <div class="esquerda">
                            <span><h4 class="page-title m-0">Meu Currinculum Vitae</h4></span>
                         </div>
                          <section class="navega">
                          <div class="direita">
                            <span><a href="/" >Inicio</a></span> |
                            <span><a href="/candidato" >Candidato</a></span> |
                            <span>Meu Curriculum Vitae<a href="#"></a><span>
                           </div>
                          </section>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- end page title end breadcrumb -->

        <div class="row meu-curriculum">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4 text-center">Estado do meu CV </h4>
                        <div class="text-center">
                            <div class="social-source-icon lg-icon mb-3">
                              @if(Auth::user()->foto_url=="none" || Auth::user()->foto_url==null)
                             <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle width-100">
                             @else
                             <img src="{{ Auth::user()->foto_url }}" alt="user" class="rounded-circle width-100" id="image-profile" >
                             @endif
                            </div>
                            <h5 class="font-16"><a href="#" class="text-dark">{{ ucfirst(Auth::user()->name) }}</a></h5>
                            <p class="text-center"><b>Celular: {{ Auth::user()->celular }}</b></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">{{ $progress }}%</div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                              <p>Dados pessoais <span><i class="dripicons-checkmark float-right text-success"></i></span></p>
                              <p>Contactos <span><i class="dripicons-checkmark float-right text-success"></i></span></p>
                              <p>Experiências @if(sizeof($experiencias) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>
                              <p>Idiomas @if(sizeof($idiomas) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>
                              <p>Documentos @if(sizeof($documentos) < 1) <span><i class="dripicons-cross float-right text-danger"></i></span>  @else <span><i class="dripicons-checkmark float-right text-success"></i></span> @endif</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="mt-0 header-title mb-4">Curriculum Vitae <span class="float-right"><button  class="btn btn-secondary btn-sm waves-effect waves-light"> CURRICULUM PDF &nbsp;<i class="dripicons-download"></i></button></span></h4>-->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Perfil profissional
                                  <span class="float-right">
                                    <button  class="btn btn-info btn-circle waves-effect waves-light" data-toggle="modal" data-target="#cvProfissional">
                                    <i class="dripicons-plus"></i>
                                    </button>
                                  </span>
                                </h4>
                                <p><b>Nome completo: </b>{{ ucfirst(Auth::user()->name) }}</p>
                                <p><b>Celular: </b>{{ Auth::user()->celular }}</p>
                                <p><b>Grau Académico: </b>{{ $candidato->grau_academico }}</p>
                                <p><b>Habilitacao de Condução: </b>{{ $candidato->categoria }}</p>

                            </div>
                            <!-- sample modal content -->
                              <div id="cvProfissional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form class="form-horizontal m-t-20" action="/edit-perfil" method="post">
                                          @csrf
                                          <input name="candidato_id" type="hidden" value="{{ $candidato->id }}">
                                          <div class="modal-header">
                                              <h5 class="modal-title mt-0" id="myModalLabel">Perfil profissional</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Nome completo</label>
                                                  <div class="col-sm-9">
                                                      <input class="form-control" name="nome" type="text" value="{{ $candidato->nome }}">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Grau Académico</label>
                                                  <div class="col-sm-9">
                                                    <select class="form-control" name="grau_academico">
                                                        <option>Grau Académico</option>
                                                        <option value="1ª à 5ª Classe" @if($candidato->grau_academico == '1ª à 5ª Classe') selected @endif>1ª à 5ª Classe</option>
                                                        <option value="6ª à 7ª Classe" @if($candidato->grau_academico == '6ª à 7ª Classe') selected @endif>6ª à 7ª Classe</option>
                                                        <option value="8ª à 10ª Classe" @if($candidato->grau_academico == '8ª à 10ª Classe') selected @endif>8ª à 10ª Classe</option>
                                                        <option value="11ª à 12ª Classe" @if($candidato->grau_academico == '11ª à 12ª Classe') selected @endif>11ª à 12ª Classe</option>
                                                        <option value="Básico" @if($candidato->grau_academico == 'Básico') selected @endif>Básico</option>
                                                        <option value="Elementar" @if($candidato->grau_academico == 'Elementar') selected @endif>Elementar</option>
                                                        <option value="Médio" @if($candidato->grau_academico == 'Médio') selected @endif>Médio</option>
                                                        <option value="Bacharelato" @if($candidato->grau_academico == 'Bacharelato') selected @endif>Bacharelato</option>
                                                        <option value="Licenciatura" @if($candidato->grau_academico == 'Licenciatura') selected @endif>Licenciatura</option>
                                                        <option value="Mestrado" @if($candidato->grau_academico == 'Mestrado') selected @endif>Mestrado</option>
                                                        <option value="Doutoramento" @if($candidato->grau_academico == 'Doutoramento') selected @endif>Doutoramento</option>
                                                        <option value="Pós-Doutoramento" @if($candidato->grau_academico == 'Pós-Doutoramento') selected @endif>Pós-Doutoramento</option>
                                                    </select>
                                                  </div>
                                              </div>

                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">Actualizar</button>
                                          </div>
                                        </form>
                                      </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->

                          </div>
                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Dados pessoais
                                  <span class="float-right">
                                    <button class="btn btn-info btn-circle waves-effect waves-light" data-toggle="modal" data-target="#cvPessoais">
                                    <i class="dripicons-plus"></i>
                                    </button>
                                  </span>
                                </h4>
                                <p><b>Data de nascimento: </b>{{ Carbon\Carbon::parse($candidato->datanascimento)->format('d-M-Y') }}</p>
                                <p><b>Género: </b>{{ $candidato->sexo }}</p>
                                <p><b>Nacionalidade: </b>{{ $candidato->nacionalidade }}</p>
                                <p><b>Residência: </b>{{ $candidato->endereco }}</p>


                            </div>

                            <!-- sample modal content -->
                              <div id="cvPessoais" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form class="form-horizontal m-t-20" action="/edit-dado-pessoais" method="post">
                                          @csrf
                                          <input name="candidato_id" type="hidden" value="{{ $candidato->id }}">
                                          <div class="modal-header">
                                              <h5 class="modal-title mt-0" id="myModalLabel">Dados pessoais</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Data de nascimento</label>
                                                  <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="datanascimento" value="{{ $candidato->datanascimento }}" >
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Género</label>
                                                  <div class="col-sm-9">
                                                    <select class="form-control" name="sexo">
                                                        <option value="Masculino" @if($candidato->sexo == 'Masculino') selected @endif >Masculino</option>
                                                        <option value="Feminino" @if($candidato->sexo == 'Feminino') selected @endif >Feminino</option>
                                                    </select>
                                                  </div>
                                              </div>

                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Nacionalidade</label>
                                                  <div class="col-sm-9">
                                                      <input class="form-control" type="nacionalidade" name="nacionalidade" value="{{ $candidato->nacionalidade }}">
                                                  </div>
                                              </div>

                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Residência</label>
                                                  <div class="col-sm-9">
                                                    <textarea class="form-control" name="endereco" value="{{ $candidato->endereco }}" maxlength="500" rows="3">{{ $candidato->endereco }}</textarea>
                                                </div>
                                              </div>

                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                          </div>
                                        </form>
                                      </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->

                          </div>

                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Contactos
                                  <span class="float-right">
                                    <button class="btn btn-info btn-circle waves-effect waves-light" data-toggle="modal" data-target="#cvContactos">
                                    <i class="dripicons-plus"></i>
                                    </button>
                                  </span>
                                </h4>
                                <p><b>N° Telefone: </b>{{ Auth::user()->celular }}</p>
                                <p><b>N° Telefone Alternativo: </b>{{ $candidato->telefone_alt }}</p>
                                <p><b>Email: </b>{{ $candidato->email }}</p>
                            </div>

                            <!-- sample modal content -->
                              <div id="cvContactos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form class="form-horizontal m-t-20" action="/edit-contactos" method="post">
                                          @csrf
                                          <input name="candidato_id" type="hidden" value="{{ $candidato->id }}">
                                          <div class="modal-header">
                                              <h5 class="modal-title mt-0" id="myModalLabel">Contactos</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">N° Telefone</label>
                                                  <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="telefone" value="{{ Auth::user()->celular }}" required>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">N° Telefone Alternativo</label>
                                                  <div class="col-sm-9">
                                                    <input class="form-control" type="number" name="telefone_alt" value="{{ $candidato->telefone_alt }}">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                                                  <div class="col-sm-9">
                                                    <input class="form-control" type="email" value="{{ $candidato->email }}" required>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                          </div>
                                        </form>
                                      </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->

                          </div>


                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Experiências
                                  <span class="float-right">
                                    <button  class="btn btn-info btn-circle waves-effect waves-light" data-toggle="modal" data-target="#cvExperiencia">
                                    <i class="dripicons-plus"></i>
                                    </button>
                                  </span>
                                </h4>
                                @if(sizeof($experiencias) < 1)
                                <p class="card-text text-warning">Nenhuma Experiência cadastrada</p>
                                @else
                                <ul>
                                  @foreach ($experiencias as $key => $experiencia)
                                    <li>
                                      <div>
                                        <h4 class="experiencia-empresa">{{ $experiencia->empresa }}</h4>
                                          @php
                                            $startDate = \Carbon\Carbon::parse($experiencia->inicio);
                                            $endDate = \Carbon\Carbon::parse($experiencia->fim);
                                            $diff = $startDate->diffInYears($endDate);
                                          @endphp
                                        <p class="text-muted">{{ $experiencia->cargo }} - {{ Carbon\Carbon::parse($experiencia->inicio)->format('M-Y') }}
                                           @if($experiencia->trabalha_ate_agora == 'Sim')até agora @else até {{ Carbon\Carbon::parse($experiencia->fim)->format('M-Y') }} @endif
                                           @if($diff <= 0)  @else ( {{ $diff }} anos ) @endif
                                          </p>
                                        <p>{{ $experiencia->actividades_exercidas }}</p>
                                        <hr>
                                      </div>

                                    </li>
                                  @endforeach

                                </ul>
                                @endif


                            </div>
                            <!-- sample modal content -->
                              <div id="cvExperiencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form class="form-horizontal m-t-20" action="/add-experiencia" method="post">
                                          @csrf
                                          <input name="candidato_id" type="hidden" value="{{ $candidato->id }}">
                                          <div class="modal-header">
                                              <h5 class="modal-title mt-0" id="myModalLabel">Experiências</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Empresa</label>
                                                <div class="col-sm-9">
                                                  <input class="form-control" name="empresa" type="text" id="" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                              <label for="example-text-input" class="col-sm-3 col-form-label">Cargo</label>
                                              <div class="col-sm-9">
                                                <input class="form-control" name="cargo" type="text" required>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Actividades exercidas </label>
                                                <div class="col-sm-9">
                                                  <textarea id="actividades_exercidas" name="actividades_exercidas" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">País </label>
                                                <div class="col-sm-9">
                                                  <select class="form-control" name="pais">
                                                      <option value="Afghanistan">Afghanistan</option>
                                                      <option value="Albania">Albania</option>
                                                      <option value="Algeria">Algeria</option>
                                                      <option value="American Samoa">American Samoa</option>
                                                      <option value="Andorra">Andorra</option>
                                                      <option value="Angola">Angola</option>
                                                      <option value="Anguilla">Anguilla</option>
                                                      <option value="Antartica">Antarctica</option>
                                                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                      <option value="Argentina">Argentina</option>
                                                      <option value="Armenia">Armenia</option>
                                                      <option value="Aruba">Aruba</option>
                                                      <option value="Australia">Australia</option>
                                                      <option value="Austria">Austria</option>
                                                      <option value="Azerbaijan">Azerbaijan</option>
                                                      <option value="Bahamas">Bahamas</option>
                                                      <option value="Bahrain">Bahrain</option>
                                                      <option value="Bangladesh">Bangladesh</option>
                                                      <option value="Barbados">Barbados</option>
                                                      <option value="Belarus">Belarus</option>
                                                      <option value="Belgium">Belgium</option>
                                                      <option value="Belize">Belize</option>
                                                      <option value="Benin">Benin</option>
                                                      <option value="Bermuda">Bermuda</option>
                                                      <option value="Bhutan">Bhutan</option>
                                                      <option value="Bolivia">Bolivia</option>
                                                      <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                      <option value="Botswana">Botswana</option>
                                                      <option value="Bouvet Island">Bouvet Island</option>
                                                      <option value="Brazil">Brazil</option>
                                                      <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                      <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                      <option value="Bulgaria">Bulgaria</option>
                                                      <option value="Burkina Faso">Burkina Faso</option>
                                                      <option value="Burundi">Burundi</option>
                                                      <option value="Cambodia">Cambodia</option>
                                                      <option value="Cameroon">Cameroon</option>
                                                      <option value="Canada">Canada</option>
                                                      <option value="Cape Verde">Cape Verde</option>
                                                      <option value="Cayman Islands">Cayman Islands</option>
                                                      <option value="Central African Republic">Central African Republic</option>
                                                      <option value="Chad">Chad</option>
                                                      <option value="Chile">Chile</option>
                                                      <option value="China">China</option>
                                                      <option value="Christmas Island">Christmas Island</option>
                                                      <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                      <option value="Colombia">Colombia</option>
                                                      <option value="Comoros">Comoros</option>
                                                      <option value="Congo">Congo</option>
                                                      <option value="Congo">Congo, the Democratic Republic of the</option>
                                                      <option value="Cook Islands">Cook Islands</option>
                                                      <option value="Costa Rica">Costa Rica</option>
                                                      <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                      <option value="Croatia">Croatia (Hrvatska)</option>
                                                      <option value="Cuba">Cuba</option>
                                                      <option value="Cyprus">Cyprus</option>
                                                      <option value="Czech Republic">Czech Republic</option>
                                                      <option value="Denmark">Denmark</option>
                                                      <option value="Djibouti">Djibouti</option>
                                                      <option value="Dominica">Dominica</option>
                                                      <option value="Dominican Republic">Dominican Republic</option>
                                                      <option value="East Timor">East Timor</option>
                                                      <option value="Ecuador">Ecuador</option>
                                                      <option value="Egypt">Egypt</option>
                                                      <option value="El Salvador">El Salvador</option>
                                                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                      <option value="Eritrea">Eritrea</option>
                                                      <option value="Estonia">Estonia</option>
                                                      <option value="Ethiopia">Ethiopia</option>
                                                      <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                      <option value="Faroe Islands">Faroe Islands</option>
                                                      <option value="Fiji">Fiji</option>
                                                      <option value="Finland">Finland</option>
                                                      <option value="France">France</option>
                                                      <option value="France Metropolitan">France, Metropolitan</option>
                                                      <option value="French Guiana">French Guiana</option>
                                                      <option value="French Polynesia">French Polynesia</option>
                                                      <option value="French Southern Territories">French Southern Territories</option>
                                                      <option value="Gabon">Gabon</option>
                                                      <option value="Gambia">Gambia</option>
                                                      <option value="Georgia">Georgia</option>
                                                      <option value="Germany">Germany</option>
                                                      <option value="Ghana">Ghana</option>
                                                      <option value="Gibraltar">Gibraltar</option>
                                                      <option value="Greece">Greece</option>
                                                      <option value="Greenland">Greenland</option>
                                                      <option value="Grenada">Grenada</option>
                                                      <option value="Guadeloupe">Guadeloupe</option>
                                                      <option value="Guam">Guam</option>
                                                      <option value="Guatemala">Guatemala</option>
                                                      <option value="Guinea">Guinea</option>
                                                      <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                      <option value="Guyana">Guyana</option>
                                                      <option value="Haiti">Haiti</option>
                                                      <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                                      <option value="Holy See">Holy See (Vatican City State)</option>
                                                      <option value="Honduras">Honduras</option>
                                                      <option value="Hong Kong">Hong Kong</option>
                                                      <option value="Hungary">Hungary</option>
                                                      <option value="Iceland">Iceland</option>
                                                      <option value="India">India</option>
                                                      <option value="Indonesia">Indonesia</option>
                                                      <option value="Iran">Iran (Islamic Republic of)</option>
                                                      <option value="Iraq">Iraq</option>
                                                      <option value="Ireland">Ireland</option>
                                                      <option value="Israel">Israel</option>
                                                      <option value="Italy">Italy</option>
                                                      <option value="Jamaica">Jamaica</option>
                                                      <option value="Japan">Japan</option>
                                                      <option value="Jordan">Jordan</option>
                                                      <option value="Kazakhstan">Kazakhstan</option>
                                                      <option value="Kenya">Kenya</option>
                                                      <option value="Kiribati">Kiribati</option>
                                                      <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                                      <option value="Korea">Korea, Republic of</option>
                                                      <option value="Kuwait">Kuwait</option>
                                                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                      <option value="Lao">Lao People's Democratic Republic</option>
                                                      <option value="Latvia">Latvia</option>
                                                      <option value="Lebanon" selected>Lebanon</option>
                                                      <option value="Lesotho">Lesotho</option>
                                                      <option value="Liberia">Liberia</option>
                                                      <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                      <option value="Liechtenstein">Liechtenstein</option>
                                                      <option value="Lithuania">Lithuania</option>
                                                      <option value="Luxembourg">Luxembourg</option>
                                                      <option value="Macau">Macau</option>
                                                      <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                                      <option value="Madagascar">Madagascar</option>
                                                      <option value="Malawi">Malawi</option>
                                                      <option value="Malaysia">Malaysia</option>
                                                      <option value="Maldives">Maldives</option>
                                                      <option value="Mali">Mali</option>
                                                      <option value="Malta">Malta</option>
                                                      <option value="Marshall Islands">Marshall Islands</option>
                                                      <option value="Martinique">Martinique</option>
                                                      <option value="Mauritania">Mauritania</option>
                                                      <option value="Mauritius">Mauritius</option>
                                                      <option value="Mayotte">Mayotte</option>
                                                      <option value="Mexico">Mexico</option>
                                                      <option value="Micronesia">Micronesia, Federated States of</option>
                                                      <option value="Moldova">Moldova, Republic of</option>
                                                      <option value="Monaco">Monaco</option>
                                                      <option value="Mongolia">Mongolia</option>
                                                      <option value="Montserrat">Montserrat</option>
                                                      <option value="Morocco">Morocco</option>
                                                      <option value="Moçambique" selected>Moçambique</option>
                                                      <option value="Myanmar">Myanmar</option>
                                                      <option value="Namibia">Namibia</option>
                                                      <option value="Nauru">Nauru</option>
                                                      <option value="Nepal">Nepal</option>
                                                      <option value="Netherlands">Netherlands</option>
                                                      <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                      <option value="New Caledonia">New Caledonia</option>
                                                      <option value="New Zealand">New Zealand</option>
                                                      <option value="Nicaragua">Nicaragua</option>
                                                      <option value="Niger">Niger</option>
                                                      <option value="Nigeria">Nigeria</option>
                                                      <option value="Niue">Niue</option>
                                                      <option value="Norfolk Island">Norfolk Island</option>
                                                      <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                      <option value="Norway">Norway</option>
                                                      <option value="Oman">Oman</option>
                                                      <option value="Pakistan">Pakistan</option>
                                                      <option value="Palau">Palau</option>
                                                      <option value="Panama">Panama</option>
                                                      <option value="Papua New Guinea">Papua New Guinea</option>
                                                      <option value="Paraguay">Paraguay</option>
                                                      <option value="Peru">Peru</option>
                                                      <option value="Philippines">Philippines</option>
                                                      <option value="Pitcairn">Pitcairn</option>
                                                      <option value="Poland">Poland</option>
                                                      <option value="Portugal">Portugal</option>
                                                      <option value="Puerto Rico">Puerto Rico</option>
                                                      <option value="Qatar">Qatar</option>
                                                      <option value="Reunion">Reunion</option>
                                                      <option value="Romania">Romania</option>
                                                      <option value="Russia">Russian Federation</option>
                                                      <option value="Rwanda">Rwanda</option>
                                                      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                      <option value="Saint LUCIA">Saint LUCIA</option>
                                                      <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                      <option value="Samoa">Samoa</option>
                                                      <option value="San Marino">San Marino</option>
                                                      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                      <option value="Saudi Arabia">Saudi Arabia</option>
                                                      <option value="Senegal">Senegal</option>
                                                      <option value="Seychelles">Seychelles</option>
                                                      <option value="Sierra">Sierra Leone</option>
                                                      <option value="Singapore">Singapore</option>
                                                      <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                      <option value="Slovenia">Slovenia</option>
                                                      <option value="Solomon Islands">Solomon Islands</option>
                                                      <option value="Somalia">Somalia</option>
                                                      <option value="South Africa">South Africa</option>
                                                      <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                                      <option value="Span">Spain</option>
                                                      <option value="SriLanka">Sri Lanka</option>
                                                      <option value="St. Helena">St. Helena</option>
                                                      <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                      <option value="Sudan">Sudan</option>
                                                      <option value="Suriname">Suriname</option>
                                                      <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                      <option value="Swaziland">Swaziland</option>
                                                      <option value="Sweden">Sweden</option>
                                                      <option value="Switzerland">Switzerland</option>
                                                      <option value="Syria">Syrian Arab Republic</option>
                                                      <option value="Taiwan">Taiwan, Province of China</option>
                                                      <option value="Tajikistan">Tajikistan</option>
                                                      <option value="Tanzania">Tanzania, United Republic of</option>
                                                      <option value="Thailand">Thailand</option>
                                                      <option value="Togo">Togo</option>
                                                      <option value="Tokelau">Tokelau</option>
                                                      <option value="Tonga">Tonga</option>
                                                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                      <option value="Tunisia">Tunisia</option>
                                                      <option value="Turkey">Turkey</option>
                                                      <option value="Turkmenistan">Turkmenistan</option>
                                                      <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                      <option value="Tuvalu">Tuvalu</option>
                                                      <option value="Uganda">Uganda</option>
                                                      <option value="Ukraine">Ukraine</option>
                                                      <option value="United Arab Emirates">United Arab Emirates</option>
                                                      <option value="United Kingdom">United Kingdom</option>
                                                      <option value="United States">United States</option>
                                                      <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                      <option value="Uruguay">Uruguay</option>
                                                      <option value="Uzbekistan">Uzbekistan</option>
                                                      <option value="Vanuatu">Vanuatu</option>
                                                      <option value="Venezuela">Venezuela</option>
                                                      <option value="Vietnam">Viet Nam</option>
                                                      <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                      <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                      <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                                      <option value="Western Sahara">Western Sahara</option>
                                                      <option value="Yemen">Yemen</option>
                                                      <option value="Serbia">Serbia</option>
                                                      <option value="Zambia">Zambia</option>
                                                      <option value="Zimbabwe">Zimbabwe</option>
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Cidade/Provincia </label>
                                                <div class="col-sm-9">
                                                  <input class="form-control" name="cidade" type="text" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Inicio</label>
                                                <div class="col-sm-9">
                                                  <input class="form-control" name="inicio" type="date" id="" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Desligamento</label>
                                                <div class="col-sm-9">
                                                  <input class="form-control" name="fim" type="date" id="" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Trabalha aqui actualmente</label>
                                                <div class="col-sm-9">
                                                  <label class="radio-inline">
                                                    <input type="radio" name="trabalha_ate_agora" value="Sim" checked>Sim
                                                  </label>
                                                  <label class="radio-inline">
                                                    <input type="radio" name="trabalha_ate_agora" value="Não">Não
                                                  </label>
                                                </div>
                                            </div>
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Tipo de contrato </label>
                                                  <div class="col-sm-9">
                                                    <select class="form-control" name="tipo_de_contrato" required>
                                                        <option value="Trabalho">Trabalho</option>
                                                        <option value="Prestação de serviço">Prestação de serviço </option>
                                                        <option value="Consultoria">Consultoria</option>
                                                    </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Último salário </label>
                                                  <div class="col-sm-9">
                                                    <input class="form-control" name="ultimo_salario " type="number" id="" required>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Motivo de saída </label>
                                                  <div class="col-sm-9">
                                                    <textarea id="motivo_de_saida" name="motivo_de_saida" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                          </div>
                                        </form>
                                      </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->
                          </div>

                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Idiomas
                                  <span class="float-right">
                                    <button  class="btn btn-info btn-circle waves-effect waves-light" data-toggle="modal" data-target="#cvIdioma">
                                    <i class="dripicons-plus"></i>
                                    </button>
                                  </span>
                                </h4>
                                @if(sizeof($idiomas) < 1)
                                <p class="card-text text-warning">Nenhum idioma cadastrado</p>
                                @else
                                <ul>
                                  @foreach ($idiomas as $key => $idioma)
                                    <li><span class="text-info">*</span> {{ $idioma->idioma }} - {{ $idioma->nivel }}</li>
                                  @endforeach

                                </ul>
                                @endif

                            </div>
                            <!-- sample modal content -->
                              <div id="cvIdioma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form class="form-horizontal m-t-20" action="/add-idioma" method="post">
                                          @csrf
                                          <input name="candidato_id" type="hidden" value="{{ $candidato->id }}">
                                          <div class="modal-header">
                                              <h5 class="modal-title mt-0" id="myModalLabel">Idiomas</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Idioma</label>
                                                    <div class="col-sm-9">
                                                      <select class="form-control" name="idioma" data-placeholder="Seleccione o idioma...">
                                                          <option value="Afrikaans">Afrikaans</option>
                                                          <option value="Albanian">Albanian</option>
                                                          <option value="Arabic">Arabic</option>
                                                          <option value="Armenian">Armenian</option>
                                                          <option value="Basque">Basque</option>
                                                          <option value="Bengali">Bengali</option>
                                                          <option value="Bulgarian">Bulgarian</option>
                                                          <option value="Catalan">Catalan</option>
                                                          <option value="Cambodian">Cambodian</option>
                                                          <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                                          <option value="Croatian">Croatian</option>
                                                          <option value="Czech">Czech</option>
                                                          <option value="Danish">Danish</option>
                                                          <option value="Dutch">Dutch</option>
                                                          <option value="English">English</option>
                                                          <option value="Estonian">Estonian</option>
                                                          <option value="Fiji">Fiji</option>
                                                          <option value="Finnish">Finnish</option>
                                                          <option value="French">French</option>
                                                          <option value="Georgian">Georgian</option>
                                                          <option value="German">German</option>
                                                          <option value="Greek">Greek</option>
                                                          <option value="Gujarati">Gujarati</option>
                                                          <option value="Hebrew">Hebrew</option>
                                                          <option value="Hindi">Hindi</option>
                                                          <option value="Hungarian">Hungarian</option>
                                                          <option value="Icelandic">Icelandic</option>
                                                          <option value="Indonesian">Indonesian</option>
                                                          <option value="Irish">Irish</option>
                                                          <option value="Italian">Italian</option>
                                                          <option value="Japanese">Japanese</option>
                                                          <option value="Javanese">Javanese</option>
                                                          <option value="Korean">Korean</option>
                                                          <option value="Latin">Latin</option>
                                                          <option value="Latvian">Latvian</option>
                                                          <option value="Lithuanian">Lithuanian</option>
                                                          <option value="Macedonian">Macedonian</option>
                                                          <option value="Malay">Malay</option>
                                                          <option value="Malayalam">Malayalam</option>
                                                          <option value="Maltese">Maltese</option>
                                                          <option value="Maori">Maori</option>
                                                          <option value="Marathi">Marathi</option>
                                                          <option value="Mongolian">Mongolian</option>
                                                          <option value="Nepali">Nepali</option>
                                                          <option value="Norwegian">Norwegian</option>
                                                          <option value="Persian">Persian</option>
                                                          <option value="Polish">Polish</option>
                                                          <option value="Português" selected>Português</option>
                                                          <option value="Punjabi">Punjabi</option>
                                                          <option value="Quechua">Quechua</option>
                                                          <option value="Romanian">Romanian</option>
                                                          <option value="Russian">Russian</option>
                                                          <option value="Samoan">Samoan</option>
                                                          <option value="Serbian">Serbian</option>
                                                          <option value="Slovak">Slovak</option>
                                                          <option value="Slovenian">Slovenian</option>
                                                          <option value="Spanish">Spanish</option>
                                                          <option value="Swahili">Swahili</option>
                                                          <option value="Swedish ">Swedish </option>
                                                          <option value="Tamil">Tamil</option>
                                                          <option value="Tatar">Tatar</option>
                                                          <option value="Telugu">Telugu</option>
                                                          <option value="Thai">Thai</option>
                                                          <option value="Tibetan">Tibetan</option>
                                                          <option value="Tonga">Tonga</option>
                                                          <option value="Turkish">Turkish</option>
                                                          <option value="Ukrainian">Ukrainian</option>
                                                          <option value="Urdu">Urdu</option>
                                                          <option value="Uzbek">Uzbek</option>
                                                          <option value="Vietnamese">Vietnamese</option>
                                                          <option value="Welsh">Welsh</option>
                                                          <option value="Xhosa">Xhosa</option>
                                                        </select>
                                                    </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label for="example-text-input" class="col-sm-3 col-form-label">Nível</label>
                                                  <div class="col-sm-9">
                                                    <select class="form-control" name="nivel_idioma">
                                                        <option value="Básico">Básico</option>
                                                        <option value="Intermédio">Intermédio</option>
                                                        <option value="Avançado">Avançado</option>
                                                        <option value="Fluente">Fluente</option>
                                                    </select>
                                                  </div>
                                              </div>

                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                          </div>
                                        </form>
                                      </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->
                          </div>

                          <div class="col-md-6">
                            <div class="card m-b-30 card-body">
                                <h4 class="card-title font-16 mt-0">Documentos
                                  <span class="float-right">
                                    <button  class="btn btn-info btn-circle waves-effect waves-light" data-toggle="modal" data-target="#cvDocumento">
                                    <i class="dripicons-plus"></i>
                                    </button>
                                  </span>
                                </h4>
                                @if(sizeof($documentos) < 1)
                                <p class="card-text text-warning">Nenhum documento carregado</p>
                                @else
                                <ul>
                                  @foreach ($documentos as $key => $documento)
                                    <li><span class="text-info">*</span> <a href="/{{ $documento->ficheiro }}" target="_blank"> {{ $documento->tipo }} </a></li>
                                  @endforeach

                                </ul>
                                @endif

                            </div>
                            <!-- sample modal content -->
                              <div id="cvDocumento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form class="form-horizontal m-t-20" action="/add-documento" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <input name="candidato_id" type="hidden" value="{{ $candidato->id }}">
                                          <div class="modal-header">
                                              <h5 class="modal-title mt-0" id="myModalLabel">Documentos</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Tipo</label>
                                                  <div class="col-sm-9">
                                                    <select class="form-control" name="tipo">
                                                      <option value="Curriculum Vitae">Curriculum Vitae</option>
                                                      <option value="Carta de Condução">Carta de Condução</option>
                                                      <option value="Carta de Recomendação">Carta de Recomendação</option>
                                                      <option value="Certificado">Certificado</option>
                                                      <option value="Diploma">Diploma</option>
                                                      <option value="Outro">Outro</option>
                                                    </select>
                                                  </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Documento</label>
                                                <div class="col-sm-9">
                                                  <input class="form-control" name="documento" type="file" onchange="readURL(this);" accept="application/pdf" required>
                                                </div>
                                            </div>

                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                          </div>
                                        </form>
                                      </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                              </div><!-- /.modal -->


                          </div>


                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
            <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->

@endsection
