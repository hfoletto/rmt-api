@component('mail::message')
    <div style="margin-bottom: 1em;">
        Nome:<br>
        <strong>{{ $name }}</strong>
    </div>
    <div style="margin-bottom: 1em;">
        E-mail:<br>
        <strong>{{ $email }}</strong>
    </div>
    <div style="margin-bottom: 1em;">
        Telefone:<br>
        <strong>{{ $phone_number }}</strong>
    </div>
    <div style="margin-bottom: 1em;">
        Mensagem:
        <pre style="margin: 0;">{{ $message  }}</pre>
    </div>
@endcomponent
