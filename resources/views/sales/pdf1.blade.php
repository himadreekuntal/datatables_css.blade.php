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
            margin-right: 10px;

        }

        .company-details .name {
            margin-top: -150px;
            margin-right: 50px;
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
            margin-top: 150px;
            padding-left: 6px;
            border-left: 6px solid #3989c6
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

                padding: 10px 20px 20px 500px;


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
    This is Software Generated Invoice.
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
                            <h2 class="to">{{$sale->customer->name}}</h2>
                            <div class="address">{{$sale->customer->address}}</div>
                            <div class="email"><a href="mailto:john@example.com">{{$sale->customer->email}}</a></div>
                            <br>
                            <div class="text-gray-light">Purchase/Work Order No.: {{$sale->po}}</div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">INVOICE {{$sale->bill_id}}</h1>
                            <div class="date"><h3></strong></b>Date of Invoice: {{date('d M-Y', strtotime($sale->sales_date))}}</h3></div>

                        </div>
                    </div>

                    <table class= "table table-bordered" style="table-layout:fixed; ">
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
                        @foreach($sale->products as $item)
                            <tr>

                                <td class="text-left" style="word-wrap:break-word;"><h7>

                                        {{$item->product}}

                                    </h7> <br/>
                                    Orign:  {{$item->brand->origin}}
                                    <br/>
                                    Warranty:  {{$item->warranty}}
                                    <br/>
                                    Serial:  {{$item->pivot->serial}}

                                </td>

                                <td class="qty">{{ $item->pivot->quantity }}</td>
                                <td class="unit">Tk. {{ number_format($item->pivot->rate, 2) }}</td>
                                <td class="unit">Tk. {{ number_format($item->pivot->discount, 2) }}</td>
                                <td class="total">Tk. {{ number_format($item->pivot->total, 2) }}</td>
                            </tr>

                        @endforeach
                        </tbody>
                        @if($count <= 8)
                            <tfoot style="position: absolute; text-align:left; left:200px; bottom: 20px; width: 1000px; font-size:1em">
                        @elseif($count <= 16)
                            <tfoot style="position: absolute; text-align:left; left:200px; bottom: -1550px;  width: 1000px; font-size:1em">
                        @elseif($count <= 24)
                            <tfoot style="position: absolute; text-align:left; left:200px; bottom: -3280px; width: 1000px; font-size:1em">
                        @elseif($count <= 32)
                            <tfoot style="position: absolute; text-align:left; left:200px; bottom: -5000px;  width: 1000px; font-size:1em">

                            @endif
                            <tr>
                                <td colspan="2">SUBTOTAL</td>
                                <td>Tk. {{ number_format($sale->sub_total, 2) }} </td>
                            </tr>
                            <tr>

                                <td colspan="2">VAT(2%)</td>
                                <td>Tk. {{$sale->vat_amount}}</td>
                            </tr>
                            <tr>

                                <td colspan="2">GRAND TOTAL</td>
                                <td>Tk. {{ number_format($sale->total_amount, 2)}}</td>
                            </tr>

                            <tr>

                                <td colspan="2">Paid</td>
                                <td>Tk. {{number_format($sale->paid, 2)}}</td>
                            </tr>
                            <tr>

                                <td colspan="2">Due</td>
                                <td>Tk. {{number_format($sale->due, 2)}}</td>
                            </tr>
                            <tr>

                                <td colspan="2">Payment Type</td>
                                <td> {{$sale->payment_type}}</td>
                            </tr>
                            <tr>

                                <td colspan="2">Payment Status</td>
                                <?php
                                if($sale->payment_status == 'Full Payment'){ ?>

                                <td style="font-weight: bold;"> {{$sale->payment_status}}</td>
                                <?php } else if($sale->payment_status == 'Partial Payment'){?>
                                <td style="font-weight: bold;"> {{$sale->payment_status}}</td>
                                <?php } else{?>
                                <td style="font-weight: bold;"> {{$sale->payment_status}}</td>
                                <?php  } ?>
                            </tr>
                            </tfoot>
                    </table>

                    @if($count <= 8)

                        <div class="footnote" style="position: absolute; text-align:left; left:50px; bottom: 60px;  width: 1000px; font-size:1em">
                            @elseif($count <= 16)
                                <div class="footnote" style="position: absolute; text-align:left; left:50px; bottom: -1500px;  width: 1000px; font-size:1em">
                                    @elseif($count <= 33)
                                        <div class="footnote" style="position: absolute; text-align:left; left:50px; bottom: -3140px;  width: 1000px; font-size:1em">
                                            @elseif($count <= 44)
                                                <div class="footnote" style="position: absolute; text-align:left; left:50px; bottom: -4780px;  width: 1000px; font-size:1em">
                                                    @endif

                                                    <div class="notices">
                                                        <hr style="width:30%;text-align:left;margin-left:0">
                                                        <div class="notice1">Customer Signature </div>
                                                        <div class="notice">Received the Goods in Good Conditions </div>
                                                    </div>
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
