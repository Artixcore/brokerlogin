<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 70%;
  color: black;
  text-size-adjust: 25px;
  font-size: 25px;
}
</style>
</head>
<body>

<br>
    <table>
        <tr>
          <td>Vorname</td>
          <td>{{ $customer_f_name}}</td>
        </tr>
        <tr>
          <td>Nachname</td>
          <td>{{ $customer_l_name }}</td>
        </tr>

          <tr>
            <td>Strasse / Nr.</td>
            <td>{{ $customer_street }}</td>
          </tr>
          <tr>
            <td>Postleitzahl</td>
            <td>{{ $customer_zip }}</td>
          </tr>
          <tr>
            <td>Ort</td>
            <td>{{ $customer_place }}</td>
          </tr>
          <tr>
            <td>Marke</td>
            <td>{{ $marke }}</td>
          </tr>
          <tr>
            <td>Model</td>
            <td>{{ $model }}</td>
          </tr>
          <tr>
            <td>Typenschein</td>
            <td>{{ $typenschein }}</td>
          </tr>
          <tr>
            <td>1.inv</td>
            <td>{{ date('d.m.Y', strtotime($inv)) }}</td>
          </tr>
          <tr>
            <td>Stammnummer</td>
            <td>{{ $Stammnummer }}</td>
          </tr>
          <tr>
            <td>Kontrollschild</td>
            <td>{{ $kontrollschild }}</td>
          </tr>
          <tr>
            <td>Grund</td>
            <td>{{ $grund }}</td>
          </tr>
       </table>

</body>
</html>



