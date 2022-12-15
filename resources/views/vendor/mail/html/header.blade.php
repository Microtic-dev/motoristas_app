@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('assets/images/1.png')}}" class="logo" alt="Motoristas">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
