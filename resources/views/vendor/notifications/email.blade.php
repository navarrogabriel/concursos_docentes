@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# HOLA!
@endif
@endif

{{-- Intro Lines --}}
Usted está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
Restablecer la contraseña
Si no solicitó restablecer la contraseña, no se requieren más acciones.

<!-- Salutation -->
@if (! empty($salutation))
{{ $salutation }}
@else
Saludos,<br>{{ config('app.name') }}
@endif

<!-- Subcopy -->
@isset($actionText)
@component('mail::subcopy')
Si tiene problemas para hacer clic en el {{ $actionText }}" botón "Restablecer contraseña", copie y pegue la siguiente URL
 en su navegador web:"[{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
