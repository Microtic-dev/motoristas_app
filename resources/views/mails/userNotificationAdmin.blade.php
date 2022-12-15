@component('mail::message')
Ola **{{$name}}**,  {{-- use double space for line break --}}

Seja bem vindo(a) a plataforma motoristas, onde voce pode publicas , e encontrar vagas de motoristas em todo pais.<br><br>
Bem neste momento a sua conta encontra-se em revisão, dentro de algumas horas sera activada.
Clique a seguir para mais novidades
@component('mail::button', ['url' => $link, 'color' => 'green'])
Encontre vagas
@endcomponent

Meus cumprimentos,
Motoristas Lda.
@endcomponent
