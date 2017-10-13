@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

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
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
よろしくお願いします。<p>{{ config('app.name') }}</p>
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
"{{ $actionText }}"ボタンが効かない場合は、ブラウザに以下のアドレスをコピー＆ペーストしてください：[{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
