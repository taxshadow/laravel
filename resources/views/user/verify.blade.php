<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Konfirmasi Alamat Email Anda</h2>
        <div>
            Terima kasih telah membuat akun di Blog App.
            Silahkan klik link dibawah ini untuk konfirmasi alamat email anda
            {{ URL::to('register/verify/' . $confirmation_code) }}<br/>
 
        </div>
    </body>
</html>