<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


</head>
<body>


    <h3> Guten Tag  </h3><br/>
    <h4>Wir bitten Sie um eine Offerte. </h4>


    <p style="color: red;">Bitte senden Sie die Offerte an:</p>
    {{ $emaill }} <br/>


    <h4> Freundliche Grüsse </h4>

    <h6> iBrokers Swiss GmbH</h6>

        ------------ <br/>
        {{ $agent }} <br/>
        {{ $phonee }}
    </h4>


</body>
</html>
