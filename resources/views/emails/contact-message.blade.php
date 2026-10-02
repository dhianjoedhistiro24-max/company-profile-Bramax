<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Pesan Baru BRAMAX</title>
</head>

<body style="margin: 0; padding: 0; background: #f5f5f5; font-family: Arial, sans-serif;">

    <div style="max-width: 600px; margin: 40px auto; background: white; padding: 40px;">

        <h1 style="margin-top: 0; color: #D90000;">
            Pesan Baru dari Website BRAMAX
        </h1>

        <p>
            Anda menerima pesan baru melalui Live Chat website BRAMAX.
        </p>

        <hr style="border: 0; border-top: 1px solid #eeeeee; margin: 25px 0;">

        <p>
            <strong>Nama</strong><br>
            {{ $contactMessage->name }}
        </p>

        <p>
            <strong>Email</strong><br>
            {{ $contactMessage->email }}
        </p>

        <p>
            <strong>Pesan</strong><br>
            {!! nl2br(e($contactMessage->message)) !!}
        </p>

        <hr style="border: 0; border-top: 1px solid #eeeeee; margin: 25px 0;">

        <p style="color: #666;">
            Balas email ini untuk membalas langsung kepada pengunjung.
        </p>

    </div>

</body>
</html>
