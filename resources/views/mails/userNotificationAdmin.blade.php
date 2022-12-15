
@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
         motoristas.co.mz
        @endcomponent
    @endslot


Ola **{{$name}}**,  {{-- use double space for line break --}}

Seja bem vindo(a) a plataforma motoristas, onde você pode publica , e encontra vagas de motoristas em todo pais.<br><br>
Bem neste momento a sua conta encontra-se em revisão, dentro de algumas horas sera activada.<br><br>
Clique a seguir para mais novidades
@component('mail::button', ['url' => $link, 'color' => 'green'])
Encontre vagas
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
