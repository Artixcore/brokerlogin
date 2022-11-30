@extends('layouts.master')
@section('style_css')
<style>
/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td {padding: 0.5em; text-align: left; }
th, td { border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 7.5in; }
/* body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); } */

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #e40101; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 95%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
article address.norm h4 {
    font-size: 125%;
    font-weight: bold;
}
article address.norm { float: left; font-size: 95%; font-style: normal; font-weight: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th:first-child {
    width:50px;
}
table.inventory th:nth-child(2) {
    width:300px;
}
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 22%; }
table.inventory td:nth-child(3) { text-align: right; width: 18%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

table.sign {
    float: left;
    width: 220px;
}
table.sign img {
    width: 100%;
}
table.sign tr td {
    border-color: transparent;
}
@media print {
    * { -webkit-print-color-adjust: exact; }
    html { background: none; padding: 0; }
    body { box-shadow: none; margin: 0; }
    span:empty { display: none; }
    .add, .cut { display: none; }
}

@page { margin: 0; }
</style>
@endsection
@section('content')

        @foreach ($agent as $user)
        @php
        $expa = App\Expanse::where('user_id', $user->id)->get();
        $oexpa= App\OExpanse::all();
        $fixsa= App\FixPay::where('user_id', $user->id)->get();
        $form = App\Fremdvertrag::where('user_id', $user->id)->get();
        $docs = App\AppDoc::where('user_id', $user->id)->get();
        $apps = App\Application::where('user_id', $user->id)->get();
        $spasen = App\Spesen::where('user_id', $user->id)->get();
        // $request->age = $user->age;
        $dateOfBirth = Carbon\Carbon::parse($user->age)->diff(Carbon\Carbon::now())->y;

        @endphp

{{-- Letter --}}

<div style="display:none;">
    <header >
      <h1>Invoice</h1>
       <span><img style="float: right;" src="{{ asset('hh.png') }}" width="80"></span>
    </header>
    <article>

      <address class="norm">
        <h4>{{ $user->name }},</h4>
        <p> {{ $user->email }}, <br>
        <p> Phone:  {{ $user->phone }},</p>
      </address>

      <table class="meta">
        <tr>
          <th><span >Invoice #</span></th>
          {{-- <td><span > {{unique()}} </span></td> --}}
        </tr>
        <tr>
          <th><span >Date</span></th>
          <td><span ><?php echo date('d:m:y'); ?></span></td>
        </tr>

      </table>
      <table class="inventory">
        <thead>
          <tr>
            <th><span >ID</span></th>
            <th><span >Customer Name</span></th>
            <th><span >Insurance Type</span></th>
            <th><span >Company</span></th>
            <th><span >Amount</span></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($apps as $in)
        @if ($in->status=='Annahme')

          <tr>
            <td><span >{{ $in->id }}</span></td>
            <td><span>{{$in->customer_f_name}} {{$in->customer_l_name}}</span></td>
            <td><span >{{$in->insurance_type}}</span></td>
            <td>
            @php
            $comp = App\InsuranceCompany::where('company_email', $in->insurance_email)->get();
            $agent = App\User::where('id', $in->user_id)->get();
            @endphp
                <span>
                    @foreach ($comp as $co)
                    {{  $co->company_name  }}
                    @endforeach
                </span></td>
                <td><span data-prefix>CHF</span><span  class="sub_total">
                @foreach ($agent as $itemmm)
          {{ $in->commission/100*$itemmm->com }}
          @endforeach
                </span></td>
          </tr>
          @endif
          @endforeach
          @endforeach

        </tbody>
      </table>
      <table class="sign">
        <tr>
          <td></td>
        </tr>
      </table>

      <table class="balance">
        <tr>
          <th><span >Total</span></th>
          <td><span data-prefix>CHF</span> <span id="total"></span></td>
        </tr>
        <tr>
            <th><span >CUT</span></th>
            <td><span data-prefix>(-)</span> <span> 10%</span></td>
        </tr>
        <tr>
            <th><span >Grand Total</span></th>
            <td><span data-prefix>CHF</span> <span class="TotalAF" id="TotalAF"></span></td>
        </tr>
      </table>

      <table class="sign">
        <tr>
          <th><span>Stornokonto Neu</span></th>
          <td><span data-prefix>CHF</span> <span id="Minus"></span></td>
        </tr>
      </table>
    </article>

</div>






<div id="invoice">

    <header >
      <span><img style="float: right;" src="{{ asset('hh.png') }}" width="150"></span>
    </header>

      <table class="inventory">
        <thead>
          <tr>
            <th><span >Bezeichnung</span></th>
            <th><span >Menge</span></th>
            <th><span >Ansatz</span></th>
            <th><span >Betrag</span></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($spasen as $item)
          <tr>
            <td><span >{{ $item->name }}</span></td>
            <td></td>
            <td></td>
            <td><span data-prefix>CHF</span> <span id="fix_sal_taxless"> {{ $item->amount }}</span></td>
          </tr>
        @endforeach

        @foreach ($expa as $item)
        <tr>
        <td><span >{{ $item->e_name }}</span></td>
        <td></td>
        <td></td>
        <td><span data-prefix>CHF</span> <span class="fix_sal"> {{ $item->e_amount }} </span></td>
        </tr>
      @endforeach

        </tbody>
      </table>

      <table class="balance">
        <tr>
          <th><span >Fixlohn ohne Sp.</span></th>
          <td><span data-prefix>CHF</span> <span class="total_sal" id="total_sal"></span></td>
        </tr>
        <tr>
            <th><span >Zwischentotal</span></th>
            <td><span data-prefix>CHF</span> <span id="TotalAfterDone"></span></td>
          </tr>
      </table>

      <br/>

      {{--  Taxes --}}
      <table class="inventory">
        <tbody>
            @foreach (App\AHV::all() as $item)
            <tr class="content">
                <td><span>{{ $item->name }}</span></td>
                <td></td>
                <td id="TotalAfterDone1"></td>
                <td id="AHV">{{ $item->amount }}</td>
                <td><span data-prefix>CHF</span> <span id="TotalAHV"></span></td>
            </tr>
            @endforeach
            @foreach (App\ALV::all() as $item)
            <tr class="content">
                <td>{{ $item->name }}</td>
                <td></td>
                <td><p id="TotalAfterDone2"></p></td>
                <td id="ALV">{{ $item->amount }}</td>
                <td><span data-prefix>CHF</span> <span id="TotalALV"></span></td>
            </tr>
            @endforeach
            @foreach (App\NBU::all() as $item)
            <tr class="content">
                <td>{{ $item->name }}</td>
                <td></td>
                <td><p id="TotalAfterDone3"></p></td>
                <td id="NBU">{{ $item->amount }}</td>
                <td><span data-prefix>CHF</span> <span id="TotalNBU"></span></td>
            </tr>
            @endforeach
            @foreach (App\KTG::all() as $item)
            <tr class="content">
                <td>{{ $item->name }}</td>
                <td></td>
                <td><p id="TotalAfterDone4"></p></td>
                <td><span id="KTG">{{ $item->amount }}</span></td>
                <td><span data-prefix>CHF</span> <span id="TotalKTG"></span></td>
            </tr>
            @endforeach

            @foreach (App\Risiko::all() as $item)
            <tr class="content">
                <td>{{ $item->name }}</td>
                <td></td>
                <td><p id="TotalAfterDone6"></p></td>
                <td><span id="Risiko">{{ $item->amount }}</span></td>
                <td><span data-prefix>CHF</span> <span id="TotalRisiko"></span></td>
            </tr>
            @endforeach

            <tr class="content">
                <td>BVG-Beitrag</td>
                <td></td>
                <td><span id="TotalAfterDone5"></span></td>
                <td id="BVG">

                @if ($dateOfBirth >'23' && $dateOfBirth <'35')
                3.5%
                @elseif ($dateOfBirth >'35' && $dateOfBirth <'44')
                5%
                @elseif ($dateOfBirth >'45' && $dateOfBirth <'54')
                7.5%
                @elseif ($dateOfBirth >'55' && $dateOfBirth <'65')
                9%
                @else
                0%
                @endif
                </td>
                <td><span data-prefix>CHF</span> <span id="TotalBVG"></span></td>
            </tr>
        </tbody>
      </table>

      <table class="balance">
        <tr>
          <th><span >Nettolohn</span></th>
          <td><span data-prefix>CHF</span> <span id="TotalTaxes"></span></td>
        </tr>

        <tr style="display: none;">
            <th><span >Auszahlung</span></th>
            <td><span data-prefix>CHF</span> <span id="AfterMinus"></span></td>
        </tr>
        <tr>
          <th><span >Auszahlung</span></th>
          <td><span data-prefix>CHF</span> <span id="TotalAfterCal"></span></td>
      </tr>
      </table>

    </article>

</div>
    {{-- <aside>
      <div>
        <a href="javascript:void(0)" class="btn-download">Download PDF  </a>
      </div>
    </aside> --}}





@endsection
@section('footer_js')

<script src="{{ asset('assets/js/jspdf.debug.js')}}"></script>
<script src="{{ asset('assets/js/html2canvas.min.js')}}"></script>
<script src="{{ asset('assets/js/html2pdf.min.js')}}"></script>


<script>

    const options = {
      margin: 0.5,
      filename: 'invoice.pdf',
      image: {
        type: 'jpeg',
        quality: 500
      },
      html2canvas: {
        scale: 1
      },
      jsPDF: {
        unit: 'in',
        format: 'letter',
        orientation: 'portrait'
      }
    }

    $('.btn-download').click(function(e){
      e.preventDefault();
      const element = document.getElementById('invoice');
      html2pdf().from(element).set(options).save();
    });

    </script>



<script>

    function totalPriceCalc(){
        var sum = 0;
        $('.sub_total').each(function(){
            console.log("this is my value: "+$(this).text());
            sum += parseFloat($(this).text() ?? 0);
        });
        console.log("This is the total price: "+sum);
        $('#total').text(sum.toFixed(2));
    }

    function ToalAfterMinus(){
        var sum = parseFloat($('#total').text());
        var minus = 10*sum/100;

        var TotalAF = sum - minus;
        $('#TotalAF').text(TotalAF.toFixed(2));
        //  $('#TotalAF').text(TotalAF);
        $('#Minus').text(minus.toFixed(2));
    }


    function FixPay(){
        var sum = 0;
        $('.fix_sal').each(function(){
            console.log("this is my value: "+$(this).text());
            sum += parseFloat($(this).text() ?? 0);
        });
        console.log("This is the total price: "+sum);
        $('#total_sal').text(sum.toFixed(2));
    }

    function TotalProv(){
        var amount1 = parseFloat($('#total_sal').text());
        var amount2 = parseFloat($('#TotalAF').text());

        var TotalAfterDone = amount1 + amount2;
        $('#TotalAfterDone').text(TotalAfterDone.toFixed(2));
    }

    function totalDeduction(){
        var sum = 0;
        $('.value').each(function(){
            console.log("this is my value: "+$(this).text());
            sum += parseFloat($(this).text() ?? 0);
        });
        console.log("This is the total price: "+sum);
        $('#totalValue').text(sum.toFixed(2));

    }

    function AfterTax(){
        var TotalAfterDone = parseFloat($('#TotalAfterDone').text());
        var TotalTaxes = parseFloat($('#TotalTaxes').text());

        var AfterMinus = TotalAfterDone - TotalTaxes;
        $('#AfterMinus').text(AfterMinus.toFixed(2));
    }


    function GrandsTotals(){
        var amount1 = parseFloat($('#fix_sal_taxless').text());
        var amount2 = parseFloat($('#AfterMinus').text());

        var TotalAfterCal = amount1 + amount2;
        $('#TotalAfterCal').text(TotalAfterCal.toFixed(2));
    }

    function ahv(){
        var TotalAfterDone = parseFloat($('#TotalAfterDone').text());
        // var AHV = ((parseFloat($('   #AHV').text()))*sum)/100;
        // var AHV = parseFloat($('#AHV').text());
        var AHV = ((parseFloat($('#AHV').text()))*TotalAfterDone)/100;
        // var TotalAHV = TotalAfterDone - AHV;
        $('#TotalAHV').text(AHV.toFixed(2));
    }

    function alv(){
        var TotalAfterDone = parseFloat($('#TotalAfterDone').text());
        // var ALV = ((parseFloat($('#ALV').text()))*sum)/100;
        var ALV = ((parseFloat($('#ALV').text()))*TotalAfterDone)/100;
        // var TotalALV = TotalAfterDone - ALV;
        $('#TotalALV').text(ALV.toFixed(2));
    }

    function nbu(){
        var TotalAfterDone = parseFloat($('#TotalAfterDone').text());
        // var NBU = ((parseFloat($('#NBU').text()))*sum)/100;
        var NBU = ((parseFloat($('#NBU').text()))*TotalAfterDone)/100;
        // var TotalNBU = TotalAfterDone - NBU;
        $('#TotalNBU').text(NBU.toFixed(2));
    }

    function ktg(){
        var TotalAfterDone = parseFloat($('#TotalAfterDone').text());
        // var KTG = ((parseFloat($('#KTG').text()))*sum)/100;
        var KTG = ((parseFloat($('#KTG').text()))*TotalAfterDone)/100;

        // var TotalKTG = TotalAfterDone - KTG;
        $('#TotalKTG').text(KTG.toFixed(2));
    }

    function bvg(){
        var TotalAfterDone = parseFloat($('#TotalAfterDone').text());
        var BVG = ((parseFloat($('#BVG').text()))*TotalAfterDone)/100;
        $('#TotalBVG').text(BVG.toFixed(2));
    }

    function Risiko(){
        var TotalAfterDone = parseFloat($('#TotalAfterDone').text());
        var Risiko = ((parseFloat($('#Risiko').text()))*TotalAfterDone)/100;
        $('#TotalRisiko').text(Risiko.toFixed(2));
    }

    function TotalTaxPer(){
        var NBU = parseFloat($('#TotalNBU').text());
        var KTG = parseFloat($('#TotalKTG').text());
        var ALV = parseFloat($('#TotalALV').text());
        var AHV = parseFloat($('#TotalAHV').text());
        var BVG = parseFloat($('#TotalBVG').text());
        var Risiko = parseFloat($('#TotalRisiko').text());

        var TotalTaxeas = NBU+KTG+ALV+AHV+BVG+Risiko;
        $('#TotalTaxes').text(TotalTaxeas.toFixed(2));
    }




$(function (){
    totalPriceCalc();
    totalDeduction();
    ToalAfterMinus();
    FixPay();
    TotalProv();
    Risiko();

    ahv();
    alv();
    nbu();
    ktg();
    bvg();

    TotalTaxPer();
    AfterTax();
    GrandsTotals();
    $('#TotalAfterDone1').text($('#TotalAfterDone').text());
    $('#TotalAfterDone2').text($('#TotalAfterDone').text());
    $('#TotalAfterDone3').text($('#TotalAfterDone').text());
    $('#TotalAfterDone4').text($('#TotalAfterDone').text());
    $('#TotalAfterDone5').text($('#TotalAfterDone').text());
    $('#TotalAfterDone6').text($('#TotalAfterDone').text());
    console.log("this is my value 3: "+$('#TotalAfterDone').text());
})
</script>
@endsection
