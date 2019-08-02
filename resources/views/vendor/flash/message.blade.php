@if (session('confirmation'))
    <div flash data-message='{"level": "info", "message": "{{ session('confirmation') }}"}'></div>
@endif

@if (session('status'))
    <div flash data-message='{"level": "info", "message": "{{ session('status') }}"}'></div>
@endif

@foreach (session('flash_notification', collect())->toArray() as $message)
    <div flash data-message='{"level": "{{ $message['level'] }}", "message": "{{ $message['message'] }}"}'></div>
@endforeach

{{ session()->forget('flash_notification') }}
