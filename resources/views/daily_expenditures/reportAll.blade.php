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

        <h4 style="text-align:center;"> Expences on  {{$monthName}}  </h4>

        
       
        <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Expenditure Name</th>                       
                        <th>Amount</th>
                        <th>Reference</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($expenses as $expenses)
                    <tr>

                    <td>{{ date('d-M-y', strtotime($expenses->date)) }}</td>
                    <td>{{ $expenses->expenditure->expenditure }}</td>
                    <td>{{number_format($expenses->amount,2 )}}</td>
                    <td>{{ $expenses->reference }}</td>
                    </tr>
                   
                @endforeach
                <tr>
                    <td colspan="2" style="text-align:right;">Total :</td>                                  
                    <td colspan="2"> {{ number_format($total ,2) }}</td>
                   
                   
                </tr>
                </tbody>
            </table>

          

           
        </main>
    </body>
</html>
