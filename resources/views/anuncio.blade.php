@extends('layouts.appmain')
@section('title')
Titulo de anuncio |
@endsection
@section('content')

<div class="wrapper">
    <div class="container-fluid homepage">
      <div class="container">
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

      </div>

        <!-- Page-Title -->
        <div class="row">

          <!-- anuncios section -->
          <div class="col-md-9 anunciopage postedList">

            <div class="card m-b-30 card-body">
              <section class="navega">
                <span><a href="javascript:history.back();">≪ Voltar</a></span> |
                <span>Categoria:
                   <a href="/categoria/administracao-secretariado">
                     $anuncio->categoria
                   </a></span>
              </section>

              <h2>{{$anuncio->titulo}} </h2>
              <p class="nomeInst">Jhpiego</p>
              <section class="infoJob clearfix">
                <p>
                  <span class="badge badge-default">{{$anuncio->created_at}} </span>
                  <span class="badge badge-default">{{$anuncio->validade}} </span>
                </p>
                <p class="local">Local:  <span>Sofala</span>  </p>
                 <div class="anuncio-descricao">
                   <p><strong>Número de vagas</strong>: 01</p>
                  <p><strong>&nbsp;</strong><strong>Responsabilidades:</strong></p>
                  <ul>
                  <li>Garantir a segurança do patrimómio do projecto;</li>
                  <li>Ser sigiloso e discreto com as informações sobre o património do projecto ou do lugar onde trabalha;</li>
                  <li>Ser preventivo com fim de manter a integridade patrimonial do projecto;</li>
                  <li>Ter atenção ao movimento, circulação de pessoas, comportamentos comuns ou estranhos, e a todas às situações cotidianas no local de trabalho.</li>
                  </ul>
                  <p>&nbsp;<strong>Qualificações/Requisitos:</strong></p>
                  <ul>
                  <li>Possuir no mínimo o nível de 7ª Classe;</li>
                  <li>Ter experiência no trabalho de vigilância patrimonial;</li>
                  <li>Não ter antecedentes criminais;</li>
                  <li>Fluência verbal e escrita em Português e conhecimento de línguas locais;</li>
                  <li>Habilidades de comunicação, coordenação e trabalho em equipa;</li>
                  <li>Ter robustéz corporal.</li>
                  </ul>
                  <p style="text-align: justify;">A data de encerramento da apresentação de candidaturas é&nbsp;<strong>{{$anuncio->validade}}</strong>&nbsp;Os candidatos interessados deverão apresentar uma carta de apresentação juntamente com o “Curriculum Vitae” detalhando as experiências relevantes e referências que possam ser enviadas para o seguinte email <strong>hr-mozambique@jhpiego.org</strong> e indique o assunto: “<strong>Guarda”</strong>.</p>
                  <p style="text-align: justify;">&nbsp;Somente os candidatos selecionados para entrevista serão contactados.</p>
                  <p>&nbsp;</p>
               </div>
              </section>
            </div>
        </div>

        <div class="col-md-3 postedList">
          <div class="card m-b-30 card-body">
            <h2 class="detalhesC">Informação Adcional</h2>
            <p><b>Data da Publicação: </b><span class="float-right">14-Sep-2022</span></p>
            <p><b>Válido até:  </b><span class="float-right">20-Sep-2022</span></p>
            <p><b>Email:  </b><span class="float-right"><a href="mailto:hr-mozambique@jhpiego.org">hr-mozambique@jhpiego.org</a></span></p>
            <hr>
              <p><a href="/register">Cria uma conta</a> ou faz <a href="/login">login</a> para candidatar-se </p>
          </div>

          <div class="card m-b-30 card-body">
            <h2 class="detalhesC">Sobre o Recrutador</h2>
            <p>Jhpiego</p>
          </div>
        </div>
          <!-- end anuncios section -->

        </div>
        <!-- end page title end breadcrumb -->
                <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->

@endsection
