@component('mail::message')
# Nuevo comentario

Un nuevo comentario pendiente de revisar.

@component('mail::table')
    <br>
    {{ $comment['autor']}}|{{ $comment['autor_email']}}|{{ $comment['body']}}
@endcomponent


@component('mail::button', ['url' => url('login')])
Revisar
@endcomponent


{{ 'DNII-OHSD' }}
@endcomponent
