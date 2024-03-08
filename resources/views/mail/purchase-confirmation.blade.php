{{-- <x-mail::message>
# Thanks for your purchase!

You've bought  **{{ $sale->plan->name }}** .

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}


<!DOCTYPE html>
<html>
    <head>
        <title>Rechnung für Miete</title>
        <style>

        </style>
        <style>
            @page {
                margin: 0px;
                size: A4;
            }

            html{
                font-family: Helvetica !important;
            }

            body{
                margin: 1.5cm;
                margin-bottom: 3cm;
            }
            *, ::after, ::before {
                box-sizing: border-box;
            }
            small {
                font-size: 0.75rem;
            }

            .invoice-container {
                width: 100%;
                /*                max-width: 800px;*/
                margin: 0 auto;
                padding: 8px;
                background-color: #fff;
            }

            .invoice-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 8px;
            }

            .invoice-header img {
                width: 20px;
                height: auto;
            }

            .invoice-details {
                margin-bottom: 10px;
            }

            .invoice-section {
                background-color: #ffffff;
                padding: 8px;
                margin-bottom: 10px;
            }

            .invoice-section.gray {
                background-color: #fff;
            }

            .invoice-section::after {
                content: "";
                display: table;
                clear: both;
            }

            .invoice-section .section-left {
                float: left;
                margin-top: 100px;
                font-size: 12px;
            }

            .invoice-section .section-right {
                float: right;
                font-size: 12px;
            }

            .invoice-section .section-left h4,
            .invoice-section .section-right h4 {
                margin-top: 10px;
            }
            .logo{
                width: 160px;

            }

            .space{
                margin-left: 200px;
            }
            .space2{
                margin-left: 20px;
            }

            .space3{
                margin-left: 100px;
            }
            .space4{
                margin-left: 43px;
            }
            .space5{
                margin-left: 100px;
            }

            .border-top{
                border-top: 2px solid #000;
                border-bottom: 2px solid #000;

            }
            .border-top2{
                border-top: 2px solid #000;

            }

            .border-bottom{
                border-bottom: 1px solid #000;
            }

            .invoice-section2 {
                background-color: #ffffff;
                padding: 10px;
                margin-bottom: 10px;
            }

            .invoice-section2::after {
                content: "";
                display: table;
                clear: both;
            }
            .invoice-section2 .section-left2 {
                float: left;
                font-size: 12px;
            }
            .invoice-section2 .section-right2 {
                float: right;
                font-size: 12px;
            }
            .text-bold{
                font-weight: bold;
            }

            h4 {
                font-family: Helvetica !important;
            }

            .price-column {
                text-align: right;
                float: right;
            }

            footer {
                position: fixed;
                bottom: 0cm;
                left: 0px;
                right: 0px;
                height: 2cm;
                width: 100% !important;
                padding: 0cm 1.5cm;
                z-index: 100;
            }

            footer p {
                font-size: 0.5em;
                color: #555;
            }

            footer>div {
                width: 30%;
                margin-right: 0.7cm;

            }

            footer>div:last-child {
                margin-right: 0px;
            }

            .dl {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            .dt {
                font-weight: 700;
                display: inline-block;
                width: 3.5cm;
                text-align: right;
                padding-right: 2.5mm;
                vertical-align: top;
            }

            .dd {
                display: inline-block;
                vertical-align: top;
            }

            .price {
                text-align: right;
            }

            .row {
                clear: both;
            }

            .row.header {
                font-size: 1.1rem;
                font-weight: bold;
                margin-top: 1rem;
                margin-bottom: 0.3rem;
            }

            td, th {
                vertical-align: top;
            }

            tfoot {
                font-size: 0.8rem;
            }
        </style>
    </head>
    <body>
        <footer>
            <div style="display: inline-block;">
                <p>
                    LockTec GmbH <br>
                    Schließfächer & Sicherheitssysteme
                </p>
                <p>
                    Johann-Georg-Herzog-Str. 19<br>
                    D-96369 Weißenbrunn
                </p>
            </div>
            <div style="display: inline-block;">
                <p>
                    Telefon: +49 9261 6075 90<br>
                    Telefax: +49 9261 6075 10
                </p>
                <p>
                    info@locktec.com<br>
                    www.locktec.com
                </p>
            </div>
            <div style="display: inline-block;">
                <p>
                    USt.-Ident.-Nr. DE 812326429<br>
                    Steuer-Nr. 212/118/91243
                </p>
                <p>
                    Amtsgericht Coburg HRB 2742<br>
                    Geschäftsführer: Johannes Clausen
                </p>
            </div>
        </footer>

        <div class="invoice-container">
            <div class="invoice-section">
                <div class="section-right" style="font-size: 0.7rem;">
                    <div>
                        <img src="data:image/jpeg;base64,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" class="logo" alt="">
                    </div>
                    <div>
                        <h4>
                            LockTec GmbH <br>
                            Schließfächer & Sicherheitssysteme
                        </h4>
                        <p>
                            Johann-Georg-Herzog-Str. 19<br>
                            D-96369 Weißenbrunn
                        </p>
                        <p>
                            Telefon: +49 9261 6075 90<br>
                            Telefax: +49 9261 6075 10
                        </p>
                        <p>
                            info@locktec.com<br>
                            www.locktec.com
                        </p>

                    </div>

                </div>
                <div class="section-left">
                    <p style="font-size: 0.8em;">LockTec GmbH, J.-G.-Herzog-Str. 19, D-96369 Weißenbrunn</p>
                    <p>
                        {{-- {{$sale->user->name}}<br> --}}
                        {{-- {{$sale->user->street}} {{$rental->user->street_number}}<br>
                        {{$rental->user->postcode}} {{$rental->user->city}} --}}
                    </p>
                    <p></p>
                </div>
            </div>


            <div>
                <h3>
                    RECHNUNG
                    <span class="space">NR.</span>
                    <span class="space2">LP-{{ $sale->id }}</span>
                    {{-- <span class="space3" style="float: right;"> {{ \Carbon\Carbon::parse($rental->start_time)->format('d.m.Y')}}</span> --}}
                </h3>  
            </div>


            @php
            //   $vatRate = 19; // VAT rate as 19%
            //   $originalPrice = $rental->price / (1 + ($vatRate / 100));
            //   $vatAmount = $rental->price - $originalPrice;

            // $vatRate = 19; // VAT rate as 19%
            // $additionalRentalsTotal = $rental->additionalRentals->sum('price'); 
            // $totalPrice = $rental->price + $additionalRentalsTotal;
            // $originalPrice = $totalPrice / (1 + ($vatRate / 100));
            // $vatAmount = $totalPrice - $originalPrice;


            @endphp
            <table style="width: 100%;">
                <thead style="border-bottom: 2px solid black; padding-bottom: 0.4rem; color: #555;">
                    <tr>
                        <th style="text-align: left;">Beschreibung</th>
                        <th style="text-align: right;">Preis</th>
                    </tr>
                </thead>
                <tbody style="border-bottom: 2px solid black;">
                    <tr>
                        <td style="padding-top: 1rem; padding-bottom: 0.5rem;">
                            <b style="font-size: 1.1rem;">Schließfachmiete - Box</b>
                            <small style="color: #555;">
                                <div style="padding-top: 0.5rem;">
                                    <div class="dt">Buchungsnr:</div> 
                                    <div class="dd"></div>
                                </div>
                                <div style="padding-top: 0.125rem;">
                                    <div class="dt">Buchungszeitpunkt:</div> 
                                    <div class="dd"></div>
                                </div>
                                <div style="padding-top: 0.125rem;">
                                    <div class="dt">Gewählte Mietdauer:</div> 
                                    <div class="dd"></div>
                                </div>
                                <div style="padding-top: 0.125rem;">
                                    <div class="dt">Leistungszeitraum:</div>
                                    <div class="dd"></div>
                                </div>
                                <div style="padding-top: 0.125rem;">
                                    <div class="dt">Anlage:</div>
                                    {{-- <div class="dd">{{$rental->system->system_name}}<br>
                                        {{$rental->system->place->address}}</div>
                                    @if ($rental->system->fee_composition_info)
                                </div> --}}
                                <p>
                                    {{-- <b>Informationen zur Gebührenzusammensetzung:</b><br> {{$rental->system->fee_composition_info}} --}}
                                </p>
                                {{-- @endif --}}
                            </small>
                        </td>
                        <td style="text-align: right; padding-top: 1rem; padding-bottom: 0.5rem;">
                            {{-- <b style="font-size: 1.1rem;">{{ number_format($originalPrice, 2, ',', '.') }} &euro;</b> --}}
                        </td>
                    </tr>
                    <!--<tr>
                        <td>
                            <p style="font-size: 0.7rem; color: #555; font-style: italic;">Während des Leistungszeitraums kannst du mit deiner PIN deine Box an der Anlage öffnen. Du findest die PIN in deinem persönlichen Bereich auf <a href="http://lockport.online">https://lockport.online</a> oder in der E-Mail, die du nach der Buchung erhalten hast.</p>
                        </td>
                    </tr>-->
                </tbody>
                <tfoot >
                    <tr style="">
                        <td style="text-align: right; padding-top: 0.7rem;">
                            <b>Rechnungsbetrag netto:</b>
                        </td>
                        <td style="text-align: right; width: 2.5cm;padding-top: 0.7rem;">
                            {{-- {{ number_format($originalPrice, 2, ',', '.') }} &euro; --}}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">
                            {{-- <b>+ {{ $vatRate }} % MwSt.:</b> --}}
                        </td>
                        {{-- <td style="text-align: right;">{{ number_format($vatAmount, 2, ',', '.') }} &euro;</td> --}}
                    </tr>
                    <tr>
                        <td style="text-align: right; font-size: 0.9rem;">
                            <b>Gesamtbetrag brutto:</b>
                        </td>
                        <td style="text-align: right; font-size: 0.9rem;">
                            {{-- <b>{{ number_format($totalPrice, 2, ',', '.') }} &euro;</b> --}}
                        </td>
                    </tr>
                </tfoot>
            </table>


        </div>


        <div style="font-size: 0.7em;">
            <p>Den Rechnungsbetrag haben wir bereits vollständig dankend erhalten.</p>
            <p>Vielen Dank für deine Nutzung. Wenn du Hilfe benötigst,
                kontaktiere uns gerne: <a href="mailto:lockport@locktec.net">lockport@locktec.net</a>. 
            </p>
        </div>

    </body>
</html>
