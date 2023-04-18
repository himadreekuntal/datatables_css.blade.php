<html>
    <head>
        <style>
            /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/

            /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {

                size: A4;   /* auto is the initial value */
                 margin:auto;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 5cm;

                margin-bottom: 2cm;
            }

            .company-details {

                    text-align: right;
                    margin-right: 25px;

                    }

             .company-details .name {
                    margin-top: -120px;
                    margin-right: 0px;

                    }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 4cm;
                border-bottom: 1px solid #3989c6;
                /** Extra personal styles **/

                /* color: white;
                text-align: center;
                line-height: 1.5cm; */
            }


            /** Define the footer rules **/
            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                border-top: 1px solid #3989c6;
                text-align: center;
                /** Extra personal styles **/
                /* background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm; */
            }






 .contacts {
margin-bottom: 20px
}

 .invoice-to {
text-align: left
}

.invoice-to .to {
margin-top: 0;
margin-bottom: 0
}

 .invoice-details {
    margin-top: -90px;
text-align: right
}

 .invoice-details .invoice-id {
margin-top: 0;
color: #3989c6
}



 .thanks {
margin-top: 50px;
font-size: 2em;
margin-bottom: 50px
}

 .notices {
padding-left: 6px;
padding-top: 100px;
border-left: 6px  solid #3989c6
}

 .notices .notice {
padding-left: 25px;
font-size: 1.2em
}

 .notices .notice1 {
padding-left: 70px;
font-size: 1.2em
}


 table {
width: 100%;
border-collapse: collapse;
border-spacing: 0;
margin-bottom: 20px;
border: 1px solid black;
border-bottom: 1px solid black;

}

 table td, table th {
padding: 15px;
background: #eee;
border: 1px solid black;
border-bottom: 1px solid black;
background: white;
}

 table th {
white-space: nowrap;
font-weight: 400;
border: 1px solid black;
font-size: 16px
}

 table td h3 {
margin: 0;
font-weight: 400;
color: #3989c6;
font-size: 1.2em
}

 table .qty, table .total, table .unit {
text-align: right;
font-size: 1.2em
}

 table .no {
color: black;
font-size: 1.2em;

}

 table .unit {

}

 table .total {

color: black
}

 table tbody tr:last-child td {
    border-bottom: 1px solid black;

}

 table tfoot td {
background: 0 0;
border-bottom: none;
white-space: testwrap;
text-align: right;
padding: 0px 0px;
font-size: 1.2em;
border-top: 1px solid #aaa;


}


 table tfoot tr:first-child td {

border-top: none;

}

 table tfoot tr:last-child td {

font-size: 1.2em;
border-top: 1px solid #3989c6

}
 table tfoot tr td:first-child {
border: none
}

        </style>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <div class="row">
                <div class="col">
                    <h2 class="name1">
                        <a target="_blank" href="https://lobianijs.com">
                        Symbex International
                        </a>
                    </h2>
                    <div>92 Motijheel Commercial Area, Dhaka:100</div>
                    <div>Phone: 01951135806, 9567758, 9550828</div>
                    <div>Email: symbex@dhaka.net</div>
                    <div><a target="_blank" href="https://lobianijs.com">
                        www.symbexbd.com
                        </a></div>
                </div>
                <div class="col company-details">
                    <h2 class="name">
                        <a target="_blank" href="https://lobianijs.com">
                        SymbexIT Ltd.
                        </a>
                    </h2>
                    <div>92/1 Motijheel Commercial Area, Dhaka:1000</div>
                    <div>Phone: 01951135806, 9567758, 9550828</div>
                    <div>Email: symbex_erb@dhaka.net</div>
                    <div><a target="_blank" href="https://lobianijs.com">
                        www.symbexit.com
                        </a></div>
                </div>
            </div>

           <br>
        </header>

        <footer>
           This is Software Generated Report.
           <br>
           Designed by SymbexIT Ltd.
        </footer>


        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <div class="row contacts">
                <div class="col invoice-to">
                    <div class="text-gray-light">INVOICE TO:</div>
                <h2 class="to">{{$saleData->customer->name}}</h2>
                    <div class="address">{{$saleData->customer->address}}</div>
                    <div class="email"><a href="mailto:john@example.com">{{$saleData->customer->email}}</a></div>
                    <br>
                    <div class="text-gray-light">Purchase/Work Order No.: {{$saleData->po}}</div>
                </div>
                <div class="col invoice-details">
                    <h1 class="invoice-id">INVOICE {{$saleData->bill_id}}</h1>
                    <div class="date"><h3></strong></b>Date of Invoice: {{date('d M-Y', strtotime($saleData->sales_date))}}</h3></div>

                </div>
            </div>
            <table class= "table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="text-left">DESCRIPTION</th>
                        <th class="text-right">Qty.</th>
                        <th class="text-right">Unit Price</th>

                        <th class="text-right">Discount</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($saleData->products as $item)
                        <tr>
                            <td class="no">{{$item->id}}</td>
                            <td class="text-left"><h3>
                                <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                    {{$item->product}}
                                </a>
                                </h3>
                                Orign:  {{$item->brand->origin}}
                                <br/>
                                Warranty:  {{$item->warranty}}
                                <br/>
                                Serial:  {{$item->pivot->serial}}

                            </td>
                            <td class="unit">Tk. {{ number_format($item->pivot->rate, 2) }}</td>
                            <td class="qty">{{ $item->pivot->quantity }}</td>
                            <td class="unit">Tk. {{ number_format($item->pivot->discount, 2) }}</td>
                            <td class="total">Tk. {{ number_format($item->pivot->total, 2) }}</td>
                        </tr>

                        @endforeach
                    </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">SUBTOTAL </td>
                        <td>Tk. {{ number_format($saleData->sub_total, 2) }} </td>
                    </tr>
                    <tr>

                        <td colspan="5">VAT(2%) </td>
                        <td>Tk. {{$saleData->vat_amount}}</td>
                    </tr>
                    <tr>

                        <td colspan="5">GRAND TOTAL </td>
                       <td>Tk. {{ number_format($saleData->total_amount, 2)}}</td>
                    </tr>

                    <tr>

                        <td colspan="5">Paid </td>
                       <td>Tk. {{number_format($saleData->paid, 2)}}</td>
                    </tr>
                    <tr>

                        <td colspan="5">Due </td>
                       <td>Tk. {{number_format($saleData->due, 2)}}</td>
                    </tr>
                    <tr>

                        <td colspan="5">Payment Type </td>
                       <td> {{$saleData->payment_type}}</td>
                    </tr>
                    <tr>

                        <td colspan="5">Payment Status </td>
                        <?php
                         if($saleData->payment_status == 'Full Payment'){ ?>

                             <td style="color: #3989c6"> {{$saleData->payment_status}}</td>
                        <?php } else if($saleData->payment_status == 'Partial Payment'){?>
                            <td style="color: orange"> {{$saleData->payment_status}}</td>
                        <?php } else{?>
                            <td style="color: red"> {{$saleData->payment_status}}</td>
                      <?php  } ?>
                    </tr>
                </tfoot>
            </table>



        </main>
    </body>
</html>
