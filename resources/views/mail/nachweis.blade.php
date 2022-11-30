<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nachweis</title>
</head>
<body>

    @php
    $company = App\InsuranceCompany::where('company_email', $company_email)->get();
@endphp
    <h2>Hallo @foreach ($company as $com)
        {{ $com->company_name }}
    @endforeach

         </h2> <br/>
         <p style="color: red;"> Wir bitten um einen Nachweis.</p>
        <p> Freundliche Grüsse </p><br/>
        <h4>iBrokers Swiss GmbH</h4><br/>


       {{ $agent }}<br/>
       {{ $email }}<br/>
       {{ $phone }}
</body>
</html>

