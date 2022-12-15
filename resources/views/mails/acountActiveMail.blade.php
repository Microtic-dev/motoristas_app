
@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
         motoristas.co.mz
        @endcomponent
    @endslot


Ola **{{$name}}**,  {{-- use double space for line break --}}
A plataforma motorista recebeu a empresa **{{$empresa}}** no seu registo.
Encontre os dados da empresa no link a seguir:
@component('mail::button', ['url' => $link, 'color' => 'green'])
 Verificar empresa
@endcomponent

Meus cumprimentos,
Motoristas Lda.

{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
       motoristas.co.mz
    @endcomponent
@endslot
@endcomponent
