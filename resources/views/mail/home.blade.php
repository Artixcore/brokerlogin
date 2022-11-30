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
          <td>{{$salutation}} {{ $f_name }}</td>
        </tr>
        <tr>
            <td>Nachname</td>
            <td>{{ $l_name }}</td>
          </tr>
          <tr>
            <td>Telefon</td>
            <td>{{ $phone }}</td>
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
            <td>Ort</td>
            <td>{{ $residence }}</td>
          </tr>
          <tr>
            <td>Staatsangehörigkeit</td>
            <td>{{ $nationality }}</td>
          </tr>
          <tr>
            <td>Geburtsdatum</td>
            <td>{{  date('d.m.Y', strtotime($date_of_birth)) }}</td>
          </tr>
          <tr>
            <td>Schadenfälle in den letzten 5 Jahren?</td>
            <td>{{ $c_i_p_5_y }}</td>
          </tr>
          <tr>
            <td>Wenn ja, wie viele</td>
            <td>{{ $how_many }}</td>
          </tr>
          <tr>
            <td>Betrag pro Schadenfall</td>
            <td>{{ $amount_per_clain }}</td>
          </tr>
          <tr>
            <td>Betreibungen?</td>
            <td>{{ $operations }}</td>
          </tr>
          <tr>
            <td>Gekündigt/abgelehnt?</td>
            <td>{{ $terminated }}</td>
          </tr>
          <tr>
            <td>Flachdach</td>
            <td>{{ $flat_roof }}</td>
          </tr>
          <tr>
            <td>Gebäude Wasser</td>
            <td>{{ $building_water }}</td>
          </tr> 

          <tr>
            <td>Gebäude Glas</td>
            <td>{{ $building_glass }}</td>
          </tr>
          <tr>
            <td>Bodenheizung</td>
            <td>{{ $floor_heating }}</td>
          </tr>
          <tr>
            <td>Hydrant</td>
            <td>{{ $hydrant }}</td>
          </tr>
          <tr>
            <td>Bauart</td>
            <td>{{ $bauart }}</td>
          </tr>
          <tr>
            <td>Wertsachen</td>
            <td>{{ $valuables }}</td>
          </tr>


          <tr>
            <td>Objekttyp</td>
            <td>{{ $type_of_building }}</td>
          </tr>
          <tr>
            <td>Adresse vom Objekt</td>
            <td>{{ $address_from_the_object }}</td>
          </tr>
          <tr>
            <td>Personen</td>
            <td>{{ $persons }}</td>
          </tr>
          <tr>
            <td>Räume</td>
            <td>{{ $rooms }}</td>
          </tr>
          <tr>
            <td>Versicherungssumme</td>
            <td>{{ $sam_insured }}</td>
          </tr>
          <tr>
            <td>Feuer/Elementarschaden</td>
            <td>{{ $f_o_e_d }}</td>
          </tr>
          <tr>
            <td>Selbstbehalt</td>
            <td>{{ $f_o_e_d_deduetible }}</td>
          </tr>
          <tr>
            <td>Diebstahl im Ausland</td>
            <td>{{ $theft_abroad }}</td>
          </tr>
          <tr>
            <td>Selbstbehalt</td>
            <td>{{ $theft_deduetible }}</td>
          </tr>
          <tr>
            <td>Wasser</td>
            <td>{{ $water }}</td>
          </tr>
          <tr>
            <td>Gebäude</td>
            <td>{{ $buidliung }}</td>
          </tr>
          <tr>
            <td>Gepäck</td>
            <td>{{ $luggage }}</td>
          </tr>
          <tr>
            <td>Gesamt</td>
            <td>{{ $luggage_total }}</td>
          </tr>
          <tr>
            <td>Elektro-Kasko</td>
            <td>{{ $electro }}</td>
          </tr>
          <tr>
            <td>Gesamt</td>
            <td>{{ $electro_total }}</td>
          </tr>


          <tr>
            <td>Selbstbehalt</td>
            <td>{{ $electro_deduetible }}</td>
          </tr>
          <tr>
            <td>Glas</td>
            <td>{{ $glass }}</td>
          </tr>
          <tr>
            <td>Cyber-Schutz</td>
            <td>{{ $cyber_schutz }}</td>
          </tr>
          <tr>
            <td>Privathaftpflicht</td>
            <td>{{ $personal_liability }}</td>
          </tr>
          <tr>
            <td>Gesamt</td>
            <td>{{ $personal_liability_total }}</td>
          </tr>
          <tr>
            <td>Selbstbehalt</td>
            <td>{{ $personal_liability_deductible }}</td>
          </tr>
 
          <tr>
            <td>Kommentar</td>
            <td>{{ $comments }}</td>
          </tr>

       </table>

</body>
</html>



