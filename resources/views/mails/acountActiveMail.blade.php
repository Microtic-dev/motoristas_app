@component('mail::message')
Ola **{{$name}}**,  {{-- use double space for line break --}}
A plataforma motorista recebeu a empresa **{{$empresa}}** no seu registo.
Encontre os dados da empresa no link a seguir:
@component('mail::button', ['url' => $link, 'color' => 'green'])
 Verificar empresa
@endcomponent

Meus cumprimentos,
Motoristas Lda.
@endcomponent
