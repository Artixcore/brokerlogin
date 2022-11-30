<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 70%;
  color: black;

}
</style>
</head>
<body>

<br>
    <table>
        <tr>
          <td>Vorname</td>
          <td>{{ $salutation }} {{ $f_name}}</td>
        </tr>
        <tr>
          <td>Nachname</td>
          <td>{{ $l_name }}</td>
        </tr>

          <tr>
            <td>Tel. Nummer</td>
            <td>{{ $phone }}</td>
          </tr>

          <tr>
            <td>Email</td>
            <td>{{ $email }}</td>
          </tr>

          <tr>
            <td>Strasse / Nr.</td>
            <td>{{ $street }}</td>
          </tr>
          <tr>
            <td>PLZ</td>
            <td>{{ $zip }}</td>
          </tr>
          <tr>
            <td>Staatsangehörigkeit</td>
            <td>{{ $nationality }}</td>
          </tr>
          <tr>
            <td>Stadt</td>
            <td>{{ $place }}</td>
          </tr>
          <tr>
            <td>Geburtsdatum</td>
            <td>{{  date('d.m.Y', strtotime($birthday)) }}</td>
          </tr>
          <tr>
            <td>Arbeitsverhältnis</td>
            <td>{{  $employment_relation }}</td>
          </tr>

          <tr>
            <td>Aktueller Beruf</td>
            <td>{{ $current_job }}</td>
          </tr>

          <tr>
            <td>Privatrechtschutz</td>
            <td>{{ $private }}</td>
          </tr>

          <tr>
            <td>Verkehrsrechtschutz</td>
            <td>{{ $traffic }}</td>
          </tr>

          <tr>
            <td>Zusatz Selbständigkeit</td>
            <td>{{ $self_employ }}</td>
          </tr>

          <tr>
            <td>Firmenrechtschutz</td>
            <td>{{ $company }}</td>
          </tr>

          <tr>
            <td>Geltungsbereich</td>
            <td>{{ $scope }}</td>
          </tr>

          <tr>
            <td>Personen</td>
            <td>{{ $person }}</td>
          </tr>

          <tr>
            <td>Bemerkungen</td>
            <td>{{ $comments }}</td>
          </tr>


       </table>
</body>
</html>
