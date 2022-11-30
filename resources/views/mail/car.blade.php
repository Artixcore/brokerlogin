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
          <td>{{ $f_name}}</td>
        </tr>
        <tr>
          <td>Nachname</td>
          <td>{{ $l_name }}</td>
        </tr>

          <tr>
            <td>Tel. Nummer</td>
            <td>{{ $phone_number }}</td>
          </tr>

          <tr>
            <td>Strasse / Nr.</td>
            <td>{{ $street }}</td>
          </tr>
          <tr>
            <td>PLZ</td>
            <td>{{ $post_code }}</td>
          </tr>
          <tr>
            <td>Staatsangehörigkeit</td>
            <td>{{ $nationality }}</td>
          </tr>
          <tr>
            <td>Stadt</td>
            <td>{{ $residence }}</td>
          </tr>
          <tr>
            <td>Geburtsdatum</td>
            <td>{{  date('d.m.Y', strtotime($date_of_birth)) }}</td>
          </tr>
          <tr>
            <td>1. Prüfung seit</td>
            <td>{{ $examination_since }}</td>
          </tr>
          <tr>
            <td>Prüfung in den letzten fünf Jahren abgegeben? </td>
            <td>{{ $e_s_i_5_y_a }}</td>
          </tr>
          <tr>
            <td>Wenn ja, wie viel Mal?</td>
            <td>{{ $how_many }}</td>
          </tr>
          <tr>
            <td>Wie lange?</td>
            <td>{{ $how_long }}</td>
          </tr>
          <tr>
            <td>Fahrer unter 26 Jahre?</td>
            <td>{{ $driver_under_26 }}</td>
          </tr>
          <tr>
            <td>Leasing?</td>
            <td>{{ $leasing }}</td>
          </tr>
          <tr>
            <td>Fahrzeugmarke</td>
            <td>{{ $vehicle_brand }}</td>
          </tr>
          <tr>
            <td>Fahrzeugmodell</td>
            <td>{{ $vehicle_model }}</td>
          </tr>
          <tr>
            <td>Typengenehmigung</td>
            <td>{{ $vehicle_certificate_type }}</td>
          </tr>
          <tr>
            <td>Stammnummer</td>
            <td>{{ $vehicle_master_number }}</td>
          </tr>

          <tr>
            <td>1. Inv.</td>
            <td>{{ $vehicle_date_in_traffic }}</td>
          </tr>
          <tr>
            <td>Katalogpreis</td>
            <td>{{ $vehicle_catalog_price }}</td>
          </tr>
          <tr>
            <td>Zubehör</td>
            <td>{{ $vehicle_equipment_price }}</td>
          </tr>
          <tr>
            <td>Haftpflicht</td>
            <td>{{ $insurance_liability }}</td>
          </tr>



          <tr>
            <td>Anzahl Schäden Haft</td>
            <td>{{ $how_many_damages_1 }}</td>
          </tr>
          <tr>
            <td>Anzahl Schäden Teilkasko</td>
            <td>{{ $how_many_damages_2 }}</td>
          </tr>
          <tr>
            <td>Anzahl Schäden Vollkasko</td>
            <td>{{ $how_many_damages_3 }}</td>
          </tr>  
          <tr>
            <td>Versicherungsbeginn</td>
            <td>{{  date('d.m.Y', strtotime($date)) }}</td>
          </tr>
          <tr>
            <td>Zahlweise</td>
            <td>{{ $Zahlweise }}</td>
          </tr>
    
          <tr>
            <td>Kontrollschild</td>
            <td>{{ $Kontrollschild }}</td>
          </tr>
          <tr>
            <td>Km / Jahr</td>
            <td>{{ $Km_Jahr }}</td>
          </tr>
          <tr>
            <td>Pannenhilfe</td>
            <td>{{ $Pannenhilfe }}</td>
          </tr>







          <tr>
            <td>Teilkasko</td>
            <td>{{ $partially_comprehensive }}</td>
          </tr>
          <tr>
            <td>Selbstbehalt</td>
            <td>{{ $partially_deductible }}</td>
          </tr>
          <tr>
            <td>Scheinwerfer</td>
            <td>{{ $insurance_headlights }}</td>
          </tr>
          <tr>
            <td>Bonusschutz</td>
            <td>{{ $insurance_bonus_protection }}</td>
          </tr>
          <tr>
            <td>Vollkasko</td>
            <td>{{ $insurance_fully_compenensive }}</td>
          </tr>
          <tr>
            <td>Selbstbehalt</td>
            <td>{{ $insurance_deductible }}</td>
          </tr>
          <tr>
            <td>Parkschaden</td>
            <td>{{ $insurance_parkschaden }}</td>
          </tr>
          <tr>
            <td>Selbstbehalt</td>
            <td>{{ $parkschaden_deductible }}</td>
          </tr>
          <tr>
            <td>Mitgeführte Sachen</td>
            <td>{{ $insurance_item_carried }}</td>
          </tr>
          <tr>
            <td>Bemerkungen</td>
            <td>{{ $insurance_comments }}</td>
          </tr>


       </table>
</body>
</html>
