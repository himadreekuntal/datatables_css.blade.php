<table class= tfoot>
                        <tr>
                            <td >SUBTOTAL</td>
                            <td>Tk. {{ number_format($sale->sub_total, 2) }} </td>
                        </tr>
                        <tr>

                            <td >VAT(2%)</td>
                            <td>Tk. {{$sale->vat_amount}}</td>
                        </tr>
                        <tr>

                            <td >GRAND TOTAL</td>
                           <td>Tk. {{ number_format($sale->total_amount, 2)}}</td>
                        </tr>

                        <tr>

                            <td >Paid</td>
                           <td>Tk. {{number_format($sale->paid, 2)}}</td>
                        </tr>
                        <tr>

                            <td>Due</td>
                           <td>Tk. {{number_format($sale->due, 2)}}</td>
                        </tr>
                        <tr>

                            <td >Payment Type</td>
                           <td> {{$sale->payment_type}}</td>
                        </tr>
                        <tr>

                            <td >Payment Status</td>
                            <?php
                             if($sale->payment_status == 'Full Payment'){ ?>

                                 <td style="color: #3989c6"> {{$sale->payment_status}}</td>
                            <?php } else if($sale->payment_status == 'Partial Payment'){?>
                                <td style="color: orange"> {{$sale->payment_status}}</td>
                            <?php } else{?>
                                <td style="color: red"> {{$sale->payment_status}}</td>
                          <?php  } ?>
                        </tr>
                    
                </table>

                <div class="thanks"></div>
                <div class="notices">
                    <hr style="width:30%;text-align:left;margin-left:0">
                    <div class="notice1">Customer Signature </div>
                    <div class="notice">Received the Goods in Good Conditions </div>
                </div>