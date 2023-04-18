<style>
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
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
    margin-top: 0;
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
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: 50px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
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

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: left;
    padding: 10px 20px;

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
    color: #777;
    border-top: 1px solid #aaa;
    padding: 10px
}

@media print {


    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
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
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: 50px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit{
    text-align: left;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

 .discount {
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
        position: absolute;
        text-align: right;
        padding: 60px 550px;
        font-size: 1.2em;


}
    .invoice footer {
        position: absolute;
        bottom: 0px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}

</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : -->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <a href="{{route('print', ['sale_id' => $sale->id])}}" class=" btnprn btn btn-info"><i class="fa fa-print"></i> Print</a>
            <a href="{{route('pdf', ['sale_id' => $sale->id])}}" class="btn btn-info"></i> Export as PDF</a>
        </div>
        <hr>
    </div>
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
                    <tbody>
                    @foreach($sale->products as $item)
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
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>Tk. {{ $sale->sub_total }} </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">VAT(2%)</td>
                            <td>Tk. {{$sale->vat_amount}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                           <td>BDT {{$sale->total_amount}}</td>
                        </tr>

                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Paid</td>
                           <td>BDT {{$sale->paid}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Due</td>
                           <td>BDT {{$sale->due}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Payment Type</td>
                           <td> {{$sale->payment_type}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Payment Status</td>
                            <?php
                             if($sale->payment_status == 'Full Payment'){ ?>

                                 <td style="color: #3989c6"> {{$sale->payment_status}}</td>
                            <?php } else if($sale->payment_status == 'Partial Payment'){?>
                                <td style="color: orange"> {{$sale->payment_status}}</td>
                            <?php } else{?>
                                <td style="color: red"> {{$sale->payment_status}}</td>
                          <?php  } ?>
                        </tr>
                    </tfoot>
                </table>


                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
    $('.btnprn').printPage();
    });
    </script>
@endsection



