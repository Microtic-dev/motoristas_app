<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home</title>

    <link href="{{asset('css/companydocuments2.css')}}" rel="stylesheet">
    <link href="{{asset('css/companydocuments.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/searchbar.css')}}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.21.5, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">


    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Home.html" data-home-page-title="Home" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-header" id="sec-3ee6"><div class="u-clearfix u-sheet u-sheet-1"></div></header>
    <section class="u-clearfix u-section-1" id="sec-6467">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-2 u-border-custom-color-1 u-container-style u-expanded-width-xs u-group u-shape-rectangle u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <img class="u-image u-image-default u-image-1" src="{{asset('assets/images/2.png')}}" alt="" data-image-width="6071" data-image-height="702">
            <p class="u-align-center u-text u-text-1">Faça upload de documentos tais como nuit, certidão de empresa&nbsp;<br>e inicio de atividades para validar a sua conta
            </p>
            <div class="u-form u-form-1">
              <form  action="/upload-documents" method="post" enctype="multipart/form-data" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 15px;" source="email" name="form">
                <div class="u-form-group u-form-name u-label-none u-form-group-1">

                  <!--Modal-->
                  <div class="modal-content">
                      <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                      <div class="modal-body">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Nuit</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="documento_nuit" type="file" onchange="readURL(this);" accept="application/pdf" required>
                            </div>
                        </div>
                      </div>
                  </div><!-- /.modal-content -->
                  <!--Modal-->

                  <!--Modal-->
                  <div class="modal-content">
                      <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                      <div class="modal-body">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Certidão de Empresa</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="documento_certidao_empresa" type="file" onchange="readURL(this);" accept="application/pdf" required>
                            </div>
                        </div>

                      </div>
                  </div><!-- /.modal-content -->
                  <!--Modal-->

                  <!--Modal-->
                  <div class="modal-content">
                      <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                      <div class="modal-body">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Inicio de Actividades</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="documento_inicio_actividade" type="file" onchange="readURL(this);" accept="application/pdf" required>
                            </div>
                        </div>
                      </div>
                  </div><!-- /.modal-content -->
                  <!--Modal-->
                </div>


                <div class="u-align-left u-form-group u-form-submit u-form-group-4">
                  <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-custom-color-2 u-btn-1">Concluir</a>
                  <input type="button" value="submit" class="u-form-control-hidden">
                </div>
                <div class="u-form-send-message u-form-send-success">Muito obrigado, por ter submetido os seus doc.</div>
                <div class="u-form-send-error u-form-send-message">Unable to send your message. Please fix errors then try again.</div>
                <input type="hidden" value="" name="recaptchaResponse">
                <input type="hidden" name="formServices" value="4ab70c084715913ca531db8083552465">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


         <div id="nuit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <form class="form-horizontal m-t-20" action="/upload-documents" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Nuit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Nuit</label>
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

             <div id="certidaoempresa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <form class="form-horizontal m-t-20" action="/upload-documents" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Nuit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Nuit</label>
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

             <div id="inicioactividades" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <form class="form-horizontal m-t-20" action="/upload-documents" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Nuit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row">
                              <label for="example-text-input" class="col-sm-3 col-form-label">Nuit</label>
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

</body></html>
