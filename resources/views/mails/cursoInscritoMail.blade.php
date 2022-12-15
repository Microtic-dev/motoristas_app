
@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
         motoristas.co.mz
        @endcomponent
    @endslot



Ola **Admin**,  {{-- use double space for line break --}}
A plataforma motorista recebeu o registo de mais uma empresa para o seguro de motorista
Encontre os seu dados abaixo:

**Plano:** {{$plano}}<br>
**Nome:** {{$nome}}<br>
**Contacto:** {{$contacto}}<br>
**Email:** {{$email}}<br>
**Curso:** {{$curso}}<br>
**Numero de motoristas:** {{$numerodemotoristas}}<br><br>
**Observacoes:** {{$observacoes}}<br><br><br>
Meus cumprimentos,
Motoristas Lda.


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
          {{$footer}}
        @endcomponent
    @endslot
@endcomponent
