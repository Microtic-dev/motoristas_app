<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title') motoristas.co.mz</title>

        <meta name="description" content="O portal de oportunidade emprego, estágio, freelance (Biscato) em Moçambique">
        <meta name="keywords" content="emprego, jobs, estagio, estágio,  concursos, moçambique, negócio, oportunidade, serviço, mozambique, maputo, contratação, higiene, limpeza, informática, carro, transporte, automoveis, turismo, manutenção, reparação">
        <meta content="Microitc Lda" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- morris css -->
      <!--  <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}"> -->

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/searchbar.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('css/courses_pages.css')}}" media="screen">
        <link rel="stylesheet" href="{{asset('css/courses_pages2.css')}}" media="screen">

        <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
        <script class="u-script" type="text/javascript" src="courses.js" defer=""></script>

        <!-- DataTables -->
        <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        @yield('styles')
    </head>

    <body>

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>

        <div class="header-bg" >
            <!-- Navigation Bar-->
            <header id="topnav" >
              <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="topbar-main navbar-fixed-top">
                    <div class="container-fluid">
                      <!-- Logo-->
                      <div>
                          <a href="/" class="logo" >
                            <img src="{{asset('assets/images/1.png')}}" alt="logo motoristas" height="23">
                          </a>
                      </div>
                      <!-- End Logo-->

                      <div class="menu-extras topbar-custom navbar p-0">
                          <!-- Search input -->

                          <ul class="list-inline ml-auto mb-0">



                            <li class="list-inline-item dropdown notification-list nav-user">
                                @guest
                                    <a class="nav-link" href="#" data-toggle="modal" data-target=".bs-base-dados-modal-center">
                                      <i class="bi bi-car-front"></i> Base de dados de Motoristas
                                    </a>
                                @else
                                    @if(Auth::user()->privilegio == 'admin')
                                      <a class="nav-link" href="/bd-motoristas">
                                        <i class="bi bi-car-front"></i> Base de dados de Motoristas
                                      </a>
                                    @else
                                      <a class="nav-link" href="#" data-toggle="modal" data-target=".bs-base-dados-modal-center">
                                        <i class="bi bi-car-front"></i> Base de dados de Motoristas
                                      </a>
                                    @endif

                                @endguest
                            </li>

                            <li style="margin-right: 250px" class="list-inline-item dropdown notification-list nav-user">
                              @guest
                                  <a class="nav-link" href="#" data-toggle="modal" data-target=".bs-central-risco-modal-center">
                                    <i class="bi bi-car-front"></i> Central de Risco de Motoristas
                                  </a>
                              @else
                                  @if(Auth::user()->privilegio == 'admin' || Auth::user()->is_premium == 'yes')
                                  <a class="nav-link" href="/centralRisco">
                                    <i class="bi bi-sign-stop-fill"></i> Central de Risco de Motoristas
                                  </a>
                                  @else
                                  <a class="nav-link" href="#" data-toggle="modal" data-target=".bs-central-risco-modal-center">
                                    <i class="bi bi-car-front"></i> Central de Risco de Motoristas
                                  </a>
                                  @endif

                              @endguest
                            </li>

                            <li class="list-inline-item dropdown notification-list nav-user">
                                @guest
                                    <a class="nav-link" href="/cursos" >
                                      <i class="bi bi-car-front"></i> Formação de motoristas
                                    </a>
                                @else
                                    @if(Auth::user()->privilegio == 'admin')
                                      <a class="nav-link"  href="/cursos">
                                        <i class="bi bi-car-front"></i> Formação de motoristas
                                      </a>
                                    @else
                                      <a class="nav-link"  href="/cursos">
                                        <i class="bi bi-car-front"></i> Formação de motoristas
                                      </a>
                                    @endif

                                @endguest
                            </li>

                            <li class="list-inline-item dropdown notification-list nav-user">
                                @guest
                                    <a class="nav-link" href="/seguro">
                                      <i class="bi bi-car-front"></i> Seguro de motoristas
                                    </a>
                                @else
                                    @if(Auth::user()->privilegio == 'admin')
                                      <a class="nav-link" href="/seguro">
                                        <i class="bi bi-car-front"></i> Seguro de motoristas
                                      </a>
                                    @else
                                      <a class="nav-link" href="/seguro">
                                        <i class="bi bi-car-front"></i> Seguro de motoristas
                                      </a>
                                    @endif

                                @endguest
                            </li>

                              <!-- User-->
                              @guest
                              <li class="list-inline-item dropdown notification-list">
                                  <a class="nav-link" href="{{route('login','candidato')}}">
                                    <i class="dripicons-user"></i> Candidato
                                  </a>
                              </li>
                              <li class="list-inline-item dropdown notification-list nav-user">
                                  <a class="nav-link" href="{{route('login','recrutador')}}">
                                    <i class="fas fa-hospital"></i>&nbsp;Empregador
                                  </a>
                              </li>

                              @else
                                @if(Auth::user()->privilegio == 'empregador')
                                  <li class="list-inline-item dropdown notification-list nav-user">
                                      <a class="nav-link" href="/empregador">
                                        <i class="fas fa-hospital"></i>&nbsp; Perfil
                                      </a>
                                  </li>
                                @endif
                                @if(Auth::user()->privilegio == 'candidato')
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link" href="/candidato">
                                      <i class="dripicons-user"></i>&nbsp; Perfil
                                    </a>
                                </li>
                                @endif
                                @if(Auth::user()->privilegio == 'admin')
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link" href="/admin">
                                      <i class="mdi mdi-view-dashboard"></i>&nbsp; Dashboard
                                    </a>
                                </li>
                                @endif

                              <li class="list-inline-item dropdown notification-list nav-user">
                                  <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                  aria-haspopup="false" aria-expanded="false">
                                    <!--  <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle"> -->
                                      <span class="d-none d-md-inline-block ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                  <!--    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                                      <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                                      <a class="dropdown-item" href="#"><span class="badge badge-success float-right m-t-5">5</span><i class="dripicons-gear text-muted"></i> Settings</a>
                                      <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                                      <div class="dropdown-divider"></div> -->
                                      <a class="dropdown-item" href="/logout"><i class="dripicons-exit text-muted"></i>Logout</a>
                                  </div>
                              </li>

                              @endguest

                              <li class="menu-item list-inline-item">
                                  <!-- Mobile menu toggle-->
                                  <a class="navbar-toggle nav-link">
                                      <div class="lines">
                                          <span></span>
                                          <span></span>
                                          <span></span>
                                      </div>
                                  </a>
                                  <!-- End mobile menu toggle-->
                              </li>

                          </ul>

                      </div>
                      <!-- end menu-extras -->

                        <div class="clearfix"></div>

                    </div> <!-- end container -->
                </div>
                <!-- end topbar-main -->
              </nav>

          </header>
            <!-- End Navigation Bar-->

        </div>
        <!-- header-bg -->

        @yield('content')
        <!-- /.modal-content base de dados-->
        <div class="modal fade bs-base-dados-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered text-center">
                <div class="modal-content">
                    <div class="btn-especial-close">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mb-4">
                        <h4 class="mb-4">Base de dados de Motoristas</h4>
                        <p>A base de dados de motorista , é uma rede com mais de 3000+ motoristas e está reservada ao administrador. <br>Para ter acesso a estes dados, contacte o administrador.</p>
                        <a href="tel:+258875474495" class="mt-4 btn btn-primary waves-effect waves-light">Ligar Agora</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade lista-formacao-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered text-center">
                <div class="modal-content">
                    <div class="btn-especial-close">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mb-4">
                        <h4 class="mb-4">Formação de Motorista</h4>
                        <p>Lista de motorista com Formação Complementada e aperfeçoada em condução defensiva, nos ramos de transportes de mercadorias e passageiros. <br>Para ter acesso a estes dados, contacte o administrador.</p>
                        <a href="tel:+258875474495" class="mt-4 btn btn-primary waves-effect waves-light">Ligar Agora</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- /.modal-content central de risco-->
        <div class="modal fade bs-central-risco-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered text-center">
                <div class="modal-content">
                    <div class="btn-especial-close">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mb-4">
                        <h4 class="mb-4">Central de Risco de Motoristas</h4>
                        <p>Central de risco de motoristas, é uma lista de motoristas que cometeram crimes rodoviários, acidentes com culpa, desvio de mercadoria /combustível, condução danosa etc. <br>Para ter acesso contacte o administrador.</p>
                        <a href="tel:+258875474495" class="mt-4 btn btn-primary waves-effect waves-light">Ligar Agora</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © Copyright 2022 - motoristas.co.mz. Todos os Direitos Reservados
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

        <!--Morris Chart
       <script src="{{asset('plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
-->
        <!-- dashboard js -->
    <!--   <script src="{{asset('assets/pages/dashboard.int.js')}}"></script> -->

       <!-- Required datatable js -->
       <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
       <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

       <!-- Buttons examples -->
       <script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
       <script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.colVis.min.js')}}"></script>

       <!-- Responsive examples -->
       <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
       <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

       <!-- Datatable init js -->
       <script src="{{asset('assets/pages/datatables.init.js')}}"></script>

       <!--tinymce js-->
       <script src="{{asset('plugins/tinymce/tinymce.min.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>




        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_NTMHZDMlgP99BvsMJvrzd31pni_5yz0"></script> -->
        <script>

        $(".escolar").hide();
        $(".tecnico").hide();
        $(".superior").hide();

        $('#nivel_de_ensino').on('change', function() {

          if(this.value === 'Escolar') {
            $(".escolar").show();
          } else {
            $(".escolar").hide();
          }

          if(this.value === 'Tecnico-Profissional') {
            $(".tecnico").show();
          } else {
            $(".tecnico").hide();
          }

          if(this.value === 'Superior') {
            $(".superior").show();
          } else {
            $(".superior").hide();
          }


        });

        $(".info-utente").click(function (e) { // get dados pessoais do utente
            e.preventDefault();
            $(".sp-loading").show();
            $(".contentUtente").load($(this).attr('href'));
            $(".sp-loading").hide();
        });

        </script>
        <script>
            $(document).ready(function () {


                if($("#descricao").length > 0){
                    tinymce.init({
                        selector: "textarea#descricao",
                        theme: "modern",
                        height:300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ]
                    });
                }
            });
        </script>

        @yield('scripts')
    </body>

</html>
