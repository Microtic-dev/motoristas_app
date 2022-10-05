@extends('layouts.appmain')
@section('title')
Perfil |
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
      @if (session('status'))
      <div class="mt-4 alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <p><i class="icon fa fa-check"></i> {{ session('status') }}</p>
      </div>
      @endif

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Área do Empregador</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
          <div class="col-xl-9">
              <div class="card">
                  <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Anúncios de vaga <span class="float-right">
                      <button class="btn btn-success btn-sm waves-effect waves-light" data-toggle="modal" data-target="#anuncio"
                      <i class="dripicons-plus">
                      </i>&nbsp;Novo </button>
                    </span></h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                         <tr>
                             <th>Título da vaga</th>
                             <th>Data da Publicação</th>
                             <th>Validade</th>
                             <th>Estado</th>
                             <th>Ações</th>
                         </tr>
                         </thead>

                         <tbody>

                           @foreach ($anuncios as $key => $anuncio)
                             <tr>
                                 <td><a href="/anuncio/{{ $anuncio->id }}" target="_blank">{{ $anuncio->titulo }}</a></td>
                                 <td>{{ Carbon\Carbon::parse($anuncio->created_at)->format('d-M-Y') }}</td>
                                 <td>{{ Carbon\Carbon::parse($anuncio->validade)->format('d-M-Y') }}</td>
                                 <td>{{ $anuncio->estado_anuncio }}</td>
                                 <td class="text-center">
                                   <a href="/candidatos-anuncio/{{ $anuncio->id }}" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-users"></i> Candidaturas</a>

                                        @php
                                            $anuncio_obj =  json_encode((array) $anuncio);
                                       @endphp
                                   <button href="#" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="modal" data-target="#editarAnuncio"  onclick="loadData('{{$anuncio_obj}}')"><i class="fa fa-edit"></i></button>

                                   <form method="post" style="display: inline;" action="{{ route('apagarAnuncio', $anuncio->id) }}">
                                     {{ csrf_field() }}
                                     <button onclick="confirm('{{ __("Tem certeza que pretende eliminar este anuncio?") }}') ? this.parentElement.submit() : ''" class="btn btn-sm btn-danger waves-effect waves-light">
                                       <i class="far fa-trash-alt"></i>
                                     </button>
                                  </form>
                                 </td>
                             </tr>

                          @endforeach

                         </tbody>
                     </table>


                     <div id="anuncio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                               <div class="modal-content">
                                 <form class="form-horizontal m-t-20" action="{{ route('criarAnuncio') }}" method="post" id="add_anuncio">
                                   @csrf
                                   <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                   <div class="modal-header">
                                       <h5 class="modal-title mt-0" id="myModalLabel">Anúncios de vaga</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-3 col-form-label">Titulo do anúncio</label>
                                           <div class="col-sm-9">
                                            <input class="form-control" name="titulo" id="titulo" type="text" required>
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-3 col-form-label">Categoria </label>
                                         <div class="col-sm-9">
                                           <select class="form-control" name="categoria_id" id="categoria" required>
                                               <option selected>Seleccione a Categoria...</option>
                                               @foreach ($categorias as $key => $categoria)
                                                 <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                               @endforeach
                                           </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-3 col-form-label">Província </label>
                                         <div class="col-sm-9">
                                            <ul class="varias-provincias" id="varias_provincias">
                                             @foreach ($provincias as $provincia)
                                             <li>
                                              <input class="form-check-input provincia" type="checkbox" name="provincias[]" value="{{ $provincia->id }}" >
                                              <label class="form-check-label" for="provincia">
                                                {{ $provincia->name }}
                                              </label>
                                              </li>
                                             @endforeach
                                           </ul>
                                         </div>
                                     </div>
                                       <div class="form-group row">
                                           <label for="example-text-input" class="col-sm-3 col-form-label">Descrição</label>
                                             <div class="col-sm-9">
                                               <textarea id="descricao" name="descricao" class="form-control" rows="6" placeholder="Ex: Escreve aqui a descrição do anúncio..."></textarea>
                                           </div>
                                       </div>




                                       <div class="form-group row">
                                           <label for="example-text-input" class="col-sm-3 col-form-label">Forma de candidatura</label>
                                           <div class="col-sm-9">
                                             <label class="radio-inline">
                                               <input type="radio" name="forma_de_candidatura" value="Portal" checked>No Portal
                                             </label>
                                             <label class="radio-inline">
                                               <input type="radio" name="forma_de_candidatura" value="Outro meio">Outro meio
                                             </label>
                                           </div>
                                       </div>
                                       <div class="form-group row">
                                           <label for="example-text-input" class="col-sm-3 col-form-label">Validade</label>
                                           <div class="col-sm-5">
                                             <input class="form-control" name="validade" id="validade" type="date"  required>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                       <button type="submit" class="btn btn-primary waves-effect waves-light">Publicar</button>
                                   </div>
                                 </form>
                               </div><!-- /.modal-content -->
                           </div><!-- /.modal-dialog -->
                     </div><!-- /.modal -->



                  <div id="editarAnuncio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form class="form-horizontal m-t-20" action="{{route('editarAnuncio')}}" method="post" id="add_anuncio">
                                @csrf
                                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                <input name="id" id="anuncioIdEdit" type="hidden" >

                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">Editar Anúncios de vaga</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group row">
                                      <label for="example-text-input" class="col-sm-3 col-form-label">Titulo do anúncio</label>
                                        <div class="col-sm-9">
                                         <input class="form-control" name="title" id="title" type="text" required>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="example-text-input" class="col-sm-3 col-form-label">Categoria </label>
                                      <div class="col-sm-9">


                                        <select class="form-control" name="categoria_id" id="categoria" required>
                                            <option selected>Seleccione a Categoria...</option>

                                            @foreach ($categorias as $key => $categoria)
                                              <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="example-text-input" class="col-sm-3 col-form-label">Província </label>
                                      <div class="col-sm-9">
                                         <ul class="varias-provincias" id="varias_provincias">
                                          @foreach ($provincias as $provincia)
                                          <li>
                                           <input class="form-check-input provincia" type="checkbox" name="provincias[]" value="{{ $provincia->id }}" >
                                           <label class="form-check-label" for="provincia">
                                             {{ $provincia->name }}
                                           </label>
                                           </li>
                                          @endforeach
                                        </ul>
                                      </div>
                                  </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Descrição</label>
                                          <div class="col-sm-9">
                                            <textarea id="descriptionEdit" name="descricao" class="form-control" rows="6" placeholder="Ex: Escreve aqui a descrição do anúncio..."></textarea>
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Forma de candidatura</label>
                                        <div class="col-sm-9">
                                          <label class="radio-inline">
                                            <input type="radio" id="inlineRadio1" name="forma_de_candidatura" value="Portal" checked>No Portal
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" id="inlineRadio2" name="forma_de_candidatura" value="Outro meio">Outro meio
                                          </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Validade</label>
                                        <div class="col-sm-5">
                                          <input class="form-control" name="validade" id="validade" type="date"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Publicar</button>
                                </div>
                              </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

                 </div>
              </div>
          </div>
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="social-source-icon lg-icon mb-3">
                                <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle width-100">
                            </div>
                            <h5 class="font-16"><a href="#" class="text-dark">{{ ucfirst(Auth::user()->name) }}</a></h5>
                            <p class="text-center"><b><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></b></p>
                            <p class="text-center"><b><a href=""></a></b></p>
                            <p class="text-center"></p>
                            <hr>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                              <p>Anúncios <span class="badge badge-warning float-right"> {{ $anuncios ->count() }}</span></p>

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
<script>

function loadData(json){

          var anuncio = JSON.parse(json)

          console.log(anuncio);

          $('#title').val(anuncio.titulo);
          $('#descriptionEdit').val(anuncio.descricao);
          $('#anuncioIdEdit').val(anuncio.id)
           if(anuncio.forma_de_candidatura=="Portal"){
           $('#inlineRadio1').attr('checked', 'checked');
           }else{
           $('#inlineRadio2').attr('checked', 'checked');
           }

      }
</script>
@endsection
