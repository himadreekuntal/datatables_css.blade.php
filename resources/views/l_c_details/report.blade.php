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

        <h4 style="text-align:center;"> Detail Report </h4>

        
       
        <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Benificiary Name</th>                       
                        <th>Commodiities</th>
                        <th>Payment Type</th>
                        <th>Amount</th>
                        <th>Margin</th>
                        <th>LTR Amount</th>
                        <th>Payment Remaining</th>
                        <th>Last Payment</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    <td>{{ date('d-M-y', strtotime($lcDetail->date)) }}</td>
                    <td>{{ $lcDetail->brand->brand }}</td>
                    <td>{{ $lcDetail->commodities }}</td>
                    <td>{{ $lcDetail->payment_type }}</td>
                    <td>{{ number_format($lcDetail->amount, 2, '.', ',') }} {{ $lcDetail->currency_type }}</td>
                    <td>{{ number_format($lcDetail->margin, 2, '.', ',') }}</td>
                    <td>{{ number_format($lcDetail->ltr_amount, 2, '.', ',') }}</td>
                    <td>{{ number_format($lcDetail->payment_remaining, 2, '.', ',') }}</td>
                    <td>{{ date('d-M-y', strtotime($lcDetail->last_payment)) }}</td>
                    @if($lcDetail->ltr_status == "Payment fully Done")
                    <td style="color: green">{{ $lcDetail->ltr_status }}</th>
                    @elseif($lcDetail->ltr_status == "Payment Partially Done")

                     <td style="color: orange">{{ $lcDetail->ltr_status }}</th>

                     @elseif($lcDetail->ltr_status == "No need for adjust")
                     <td style="color: green">{{ $lcDetail->ltr_status }}</th>

                     @else
                     <td style="color: red">{{ $lcDetail->ltr_status }}</th>
                     @endif
                    </tr>
                    

                </tbody>
            </table>

            <h4 style="text-align:center;"> Payment timeline </h4>

            <table>
                <thead>
                    <tr>
                        <th>Payment Date</th>
                        <th>Payment Amount</th>                       
                        <th>Payment Remaining</th>
                      
                    </tr>
                </thead>
                <tbody>
                @foreach($ltr as $ltr)
                    <tr>

                    <td>{{ date('d-M-y', strtotime($ltr->payment_date)) }}</td>
                    <td>{{ number_format($ltr->payment_amount, 2, '.', ',') }}</td>
                    <td>{{ number_format($ltr->payment_remaining, 2, '.', ',') }}</td>
                   
                    
                    </tr>
                    

                </tbody>
               @endforeach
            </table>
        </main>
    </body>
</html>
