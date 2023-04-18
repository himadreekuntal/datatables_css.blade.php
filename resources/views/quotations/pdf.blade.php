<style type="text/css">
    @page {
        size: auto;   /* auto is the initial value */
        margin: 0;  /* this affects the margin in the printer settings */
    }
        #invoice{
        padding: 30px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;

        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {

        text-align: right;

    }

    .invoice .company-details .name {
        margin-top: -125px;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: -100px;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 70px
    }

    .invoice main .thanks {
        margin-top: 50px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        padding-top: 100px;
        border-left: 6px  solid #3989c6
    }

    .invoice main .notices .notice {
        padding-left: 25px;
        font-size: 1.2em
    }

    .invoice main .notices .notice1 {
        padding-left: 70px;
        font-size: 1.2em
    }


    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 0;
        margin-top: 25px
    }

    .invoice table td,.invoice table th {
        padding: 12px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 12px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 50;
        color: #3989c6;
        font-size: 1.0em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 1.0em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.2em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }


    .invoice table tfoot {

}
    .invoice table tfoot td {
        background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: left;
    padding: 5px 0px;
    float: right;
        font-size: 1.2em;

    border-top: 1px solid #aaa

    }

    .invoice table tfoot tr:first-child td {

        border-top: none;

    }

    .invoice table tfoot tr:last-child td {

        font-size: 1.4em;
        border-top: 1px solid #3989c6

    }
    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        font-size: 1.5em;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 20px 0
    }
</style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!--Author      : -->
    <div id="invoice">


        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                            <h2 class="name">
                                <a target="_blank" href="https://lobianijs.com">
                                Symbex International
                                </a>
                            </h2>
                            <div>92 Motijheel Commercial Area, Dhaka:100</div>
                            <div>Phone: 01951135806</div>
                            <div>Email: symbex@dhaka.net</div>
                            <div><a target="_blank" href="https://lobianijs.com">
                                www.symbexbd.com
                                </a></div>
                        </div>
                        <div class="col company-details">
                            <h2 class="name">
                                <a target="_blank" href="https://lobianijs.com">
                                SymbexIT
                                </a>
                            </h2>
                            <div>92/1 Motijheel Commercial Area, Dhaka:100</div>
                            <div>Phone: 01951135806</div>
                            <div>Email: symbex_erb@dhaka.net</div>
                            <div><a target="_blank" href="https://lobianijs.com">
                                www.symbexit.com
                                </a></div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">Quotation TO:</div>
                        <h2 class="to">{{$quotation->customer->name}}</h2>
                            <div class="address">{{$quotation->customer->address}}</div>
                            <div class="email"><a href="mailto:john@example.com">{{$quotation->customer->email}}</a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">Quotation {{$quotation->id}}</h1>

                             <div class="date"><h3></strong></b>Date of Invoice: {{date('d M-Y', strtotime($quotation->qut_date))}}</h3></div>

                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="text-left">DESCRIPTION</th>
                                <th class="text-right">Unit Price</th>
                                <th class="text-right">Qty.</th>
                                <th class="text-right">Discount</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quotation->products as $item)
                            <tr>
                                <td class="no">{{$item->id}}</td>
                                <td class="text-left"><h3>
                                    <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                        {{$item->name}}
                                    </a>
                                    </h3>
                                    Orign:  {{$item->brand->origin}}
                                    <br/>
                                    Warranty:  {{$item->warranty}}
                                </td>
                                <td class="unit">Tk. {{ $item->pivot->rate }}</td>
                                <td class="qty">{{ $item->pivot->quantity }}</td>
                                <td class="unit">Tk. {{ $item->pivot->discount }}</td>
                                <td class="total">Tk. {{ $item->pivot->total }}</td>
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
                                <td colspan="2">Govt. Tax</td>
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



                    <div class="thanks"> </div>
                    <div class="notices">
                        <div>Notes:</div>
                        <div class="notice">{!! $quotation->payment_reference !!}</div>
                    </div>

                </main>
                <footer>
                    Quotatiion was created on a computer and is valid without the signature and seal.
                </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>




