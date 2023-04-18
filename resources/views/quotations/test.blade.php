<!DOCTYPE html>
<html>

<head>
    <style>
        /* Styles go here */

        .page-header {

            height: 220px;
        }

        .page-header-space {
            height: 230px;
        }

        .page-footer, .page-footer-space {
            height: 40px;

        }

        .company-details {

            text-align: right;
            margin-right: 25px;

        }

        .company-details .name {
            margin-top: -150px;
            margin-right: 5px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: blue;
            font-size: 2.5em;

        }

        .company .name {
            /* margin-top: -120px; */
            margin-right: 0px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2.5em;
            color: blue;

        }

        .page .contacts {
            margin-top:20px;
            margin-bottom: 20px
        }

        .page .invoice-to {
            text-align: left
        }

        .page .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .page .invoice-details {
            margin-top: -90px;
            text-align: right
        }

        .page .invoice-details .invoice-id {

            margin-bottom: 0;
            color: #3989c6
        }


        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid #3989c6; /* for demo */

            text-align: center;
        }

        .page-header {
            position: fixed;
            top: 0mm;
            width: 100%;
            border-bottom: 1px solid #3989c6; /* for demo */

        }



        @page {
            size: A4;   /* auto is the initial value */
            margin:auto;
            /* this affects the margin in the printer settings */

        }

        .page table {
            margin-top:50px;
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 50px;
            border: 1px solid black;

        }





        .page table td,.page table th {
            padding: 15px;
            border-bottom: 1px solid #fff;
            border: 1px solid black;


        }

        .page table th {
            font-weight: 400;
            font-size: 16px;
            border: 1px solid black;
        }

        .page table td h3 {
            margin: 0;
            font-weight: 400;

            font-size: 1.5em;

        }

        .page table .qty,.page table .total,.page table .unit {
            text-align: left;
            font-size: 1em
        }

        .page table .no {

            font-size: 1em;

        }

        .page table .unit {

        }

        .page table .total {


        }

        .page table tbody tr:last-child td {
            border: 1px solid black;

        }

        .page table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: left;
            padding: 10px 20px;
            border-left: none;
            border-right: none;
            font-size: 1.2em;

        }


        .page table tfoot tr:first-child td {

            border-top: none;

        }

        .page table tfoot tr:last-child td {

            font-size: 1.4em;

        }
        .page table tfoot tr td:first-child {
            border: none
        }

        .page .thanks {
            margin-top: 150px;
            font-size: 2em;
            margin-bottom: 150px
        }

        .page .notices {
            margin-top: 400px;
            padding-left: 6px;
            border-left: 6px solid #3989c6;
            font-family: "Arial Rounded MT Bold";
            font-size: 18px;

        }

        .page .notices .notice {
            font-size: 1.2em
        }

        .page .notices .notice1 {
            padding-left: 70px;
            font-size: 1.2em
        }


        @media print {
            button {display: none;}


            .page table tfoot {

                position: absolute;
                text-align:left;
                padding: 50px 400px;
                font-size: 1.2em;


            }
            .page main .thanks {
                margin-top: 10px;
                font-size: 2em;
                margin-bottom: 150px
            }

            .page main .notices {
                padding-left: 6px;
                border-left: 6px solid #3989c6
            }

            .page main .notices .notice {
                font-size: 1.2em
            }



        }

    </style>

</head>

<body>


<div class="page-header">
    <div class="row">
        <div class="col company">
            <h2 class="name">

                Symbex International

            </h2>
            <div>92 Motijheel Commercial Area, Dhaka:1000</div>
            <div>Phone: 01951135806, 9567758, 9550828</div>
            <div>Email: symbex@dhaka.net</div>
            <div><a target="_blank" href="https://lobianijs.com">
                    www.symbexbd.com
                </a></div>
        </div>
        <div class="col company-details">
            <h2 class="name">

                SymbexIT Ltd.

            </h2>
            <div>92/1 Motijheel Commercial Area, Dhaka:1000</div>
            <div>Phone: 01951135806, 9567758, 9550828</div>
            <div>Email: symbex_erb@dhaka.net</div>
            <div><a target="_blank" href="https://lobianijs.com">
                    www.symbexit.com
                </a></div>
        </div>
    </div>
    <br/>

</div>

<div class="page-footer">
    Quotation was created on a computer and is valid without the signature and seal.
    <br>
    Designed by SymbexIT Ltd.
</div>

<table>

    <thead>
    <tr>
        <td>
            <!--place holder for the fixed-position header-->
            <div class="page-header-space"></div>
        </td>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td>
            <!--*** CONTENT GOES HERE ***-->

            <div class="page">
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to">{{$quotation->customer->name}}</h2>
                            <div class="address">{{$quotation->customer->address}}</div>
                            <div class="email"><a href="mailto:john@example.com">{{$quotation->customer->email}}</a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">Quotation {{$quotation->id}}</h1>
                            <div class="date"><h3>Date of Quotation: {{date('d M-Y', strtotime($quotation->qut_date))}}</h3></div>

                        </div>
                    </div>

                    <table class= "table" style="table-layout:fixed; ">
                        <thead>
                        <tr>

                            <th width="45%" class="text-left">DESCRIPTION</th>
                            <th width="5%"class="text-right">Qty.</th>
                            <th width="15%" class="text-right">Unit Price</th>
                            <th width="15%"class="text-right">Discount</th>
                            <th width="20%"class="text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quotation->products as $item)
                            <tr>

                                <td class="text-left" style="word-wrap:break-word;"><h7>

                                        {{$item->product}}

                                    </h7> <br/>
                                    Orign:  {{$item->brand->origin}}
                                    <br/>
                                    Warranty:  {{$item->warranty}}
                                </td>

                                <td class="qty">{{ $item->pivot->quantity }}</td>
                                <td class="unit">Tk. {{ number_format($item->pivot->rate, 2) }}</td>
                                <td class="unit">Tk. {{ number_format($item->pivot->discount, 2) }}</td>
                                <td class="total">Tk. {{ number_format($item->pivot->total, 2) }}</td>
                            </tr>

                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>Tk. {{ $quotation->sub_total }} </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Govt. Tax(2%) </td>
                            <td>Tk. {{$quotation->tax_amount}}</td>
                        </tr>


                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>BDT {{$quotation->total_amount}}</td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Payment Type</td>
                            <td> {{$quotation->payment}}</td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Delivery Time</td>
                            <td> {{$quotation->delivery_time}}</td>
                        </tr>

                        </tfoot>

                    </table>


                    <div class="thanks"></div>

                    <div class="notices">
                        <div>Notes:</div>
                        <div class="notice">{!! $quotation->payment_reference !!}</div>
                    </div>

                </main>


            </div>
        </td>
    </tr>
    </tbody>

    <tfoot>
    <tr>
        <td>
            <!--place holder for the fixed-position footer-->
            <div class="page-footer-space"></div>
        </td>
    </tr>
    </tfoot>

</table>



</body>

</html>
