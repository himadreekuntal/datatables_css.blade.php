<html>
    <head>
        <style>
            /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0px 25px;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 4cm;

                margin-bottom: 2cm;
            }

            .company-details {

                    text-align: right;

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
        <header>
            <div class="row">
                <div class="col">
                    <h2 class="name1">
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
                        SymbexIT Ltd.
                        </a>
                    </h2>
                    <div>92/1 Motijheel Commercial Area, Dhaka:1000</div>
                    <div>Phone: 01951135806</div>
                    <div>Email: symbex_erb@dhaka.net</div>
                    <div><a target="_blank" href="https://lobianijs.com">
                        www.symbexit.com
                        </a></div>
                </div>
            </div>
        </header>

        <footer>
           This is Software Generated Report.
           <br>
           Designed by SymbexIT Ltd.
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>

        <h4 style="text-align:center;"> Stock Report of {{$lastMonth}} Generated on {{  now()->toDateString('d-m-Y') }}</h4>
        <table>
                <thead>
                    <tr>
                        
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($product as $product)
                    <tr>
                        
                    <td>{{ $product-> product}}</td>
                    <td>{{ $product-> qty}}</td>
                    <td>Tk. {{ number_format( $product-> selling_price , 2) }}</td>

                    <td>Tk. {{number_format($product-> selling_price *  $product-> qty , 2)}} </td>

                  

                    </tr>
                    @endforeach
                    <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align:right;">Total :</td>
                    <td>{{ number_format($total , 2) }}</td>
                   
                   
                    </tr>      
                </tbody>
            </table>
        </main>
    </body>
</html>
