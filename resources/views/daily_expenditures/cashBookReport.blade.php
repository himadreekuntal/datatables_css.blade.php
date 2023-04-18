<html>
    <head>
        <style>
            /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0px 25px;
                orientation: portrait;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 1cm;

                margin-bottom: 1cm;
            }



            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 0cm;
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
                height: 0cm;
                border-top: 1px solid #3989c6;
                text-align: center;
                /** Extra personal styles **/
                /* background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm; */
            }

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
              }

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  font-size: 10px;
  font-family: arial, sans-serif;
}


        </style>

    </head>
    <body>
        <!-- Define header and footer blocks before your content -->


        <!-- Wrap the content of your PDF inside a main tag -->
        <main>

        <h4 style="text-align:center;"> Cash Book of {{ date('d-M-y', strtotime($fromDate)) }} </h4>

        <table>

  <td>
        <table>
                <thead>
                    <tr>

                        <th>Expenditure</th>

                    </tr>
                    <tr>

                        <th>Expenditure Name</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody>

            @foreach($expenses as $expenses)
               <tr>
                    <td>{{ $expenses->expenditure->expenditure }}</td>
                    <td>{{ number_format($expenses->amount,2 )}}</td>
                </tr>
            @endforeach





                <tr>
                    <td style="text-align:right;">Total :</td>
                    <td > {{ number_format($total ,2) }}</td>


                </tr>
                </tbody>
            </table>
 </td>
 <td></td>
  <td>
       <table>
                <thead>
                    <tr>
                        <th>Received Amount</th>

                    </tr>
                    <tr>

                        <th>Bill  No</th>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                        <th>Payment Type</th>
                        <th>Cash on hand</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($sales as $sales)
                     <tr>
                        <td>{{ $sales->sales_id }}</td>
                        <td>{{ $sales->customer->name }}</td>
                        <td>{{ $sales->total_amount }}</td>
                        <td>{{ $sales->payment_status }}</td>
                        <td>{{ $sales->payment_type }}</td>
                   @if($sales->payment_type == 'Cash' && ($sales->payment_status == 'Full Payment' || $sales->payment_status == 'Partial Payment'))
                        <td>{{ $sales->paid }}</td>
                    @else
                        <td>-</td>
                    @endif
                    </tr>
                   @endforeach


             <tr>


                 <td></td>
                 <td></td>
                 <td></td>
                    <td  colspan="2" style="text-align:right;">Total Sales :</td>
                    <td > {{ number_format($totalSales ,2) }}</td>
                </tr>


                </tbody>
           <br>

            </table>
     </td>

</table>

            <br>
<table>
    <tr><td>Yesterday Cash in hand</td> <td>{{ number_format($cashY, 2)}}</td></tr>
    <tr><td>Total Sales</td> <td>{{number_format($totalSales,2)}}</td></tr>
    <tr><td>Today's Expenditure</td> <td>({{number_format($total,2)}})</td></tr>
    <tr><td>Bank's Transaction</td> <td>({{number_format($bankT,2)}})</td></tr>
    <tr><th>Cash in Hand</th> <th>{{number_format($cashHand,2)}}</th></tr>

</table>



        </main>
    </body>
</html>
