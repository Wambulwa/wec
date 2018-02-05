      <!-- main area -->
      <div class="main-content" style="">
        <div class="page-title">
          <div class="pull-right">
            <button type="button" class="btn btn-danger no-print" id="pdf" onclick="window.print();">
              <i class="icon-printer m-r"></i>Print
            </button>
            <button type="button" class="btn btn-info no-print">Export to PDF</button>
          </div>
          <div class="title"><table><thead><tr><th></th><th></th></tr></thead>
          <tbody><tr><td><img src="<?php echo base_url('images/wec/weclogo.png');?>" width="310px;" height="40px;"><small><br>WILSON AIRPORT, P.O BOX 47578-00100 G.P.O Nairobi-Kenya<br>
          E-mail: info@willfreight.co.ke<br>
          VAT No.: 0147907E</small></td><td style="padding-left: 170px; padding-right: 0px;"><small >Tel: 784587125 <br> Fax: +254784574 <br> PIN NO: P051172512G <br> www.willfreight.com</small></td></tr></tbody></table>          
          </div>
          <!--  -->
          <!-- <div class="sub-title">Payment due today</div> -->
          <div class="sub-title"><!--something here--></div>
        </div>


        <div class="card" style="">
          <div class="card-block p-a-0">
<!--1st reference and date table-->
        <section style="margin-bottom: 20px;">
            <table>
              <thead></thead>
              <tbody>
                <tr>
                  <td class="blk">Reference no.</td>
                  <td><input type="text" name=""></td>
                  <td style="width: 25%;"></td>
                  <td class="blk">Date</td>
                  <td><input type="date" name=""></td>
                </tr>
              </tbody>
            </table>
        </section>
<!--/1st reference and date table-->
<!--custom 2nd level-->
        <section style="margin-bottom: 20px;">
            <table>
              <thead>
              <th class="bld">Customer</th>
              <th  style="width: 30%;"></th><!--space in between-->
              <th class="bld">Routing</th> 
              </thead>
              <tbody>
              <tr><!--1st tr-->
                <td><!--1st td-->
                <table>
                <tbody>
                    <tr>
                      <td class="blk">Customer</td>
                      <td><input type="text" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Account No.</td>
                      <td><input type="number" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Contact</td>
                      <td><input type="text" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Tel:</td>
                      <td><input type="text" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Fax</td>
                      <td><input type="text" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Email</td>
                      <td><input type="email" name=""></td>
                    </tr>
                  </tbody>
                  </table>
                </td><!--/1st td-->


                <!--space between-->
                <td></td>
                <!--space between-->


                <td><!--2nd td-->
                <table><tbody>
                  <tr>
                      <td class="blk">Country of origin</td>
                      <td><input type="text" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Port of landing</td>
                      <td><input type="number" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Destination country</td>
                      <td><input type="text" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Port of discharge</td>
                      <td><input type="text" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Final destination</td>
                      <td><input type="text" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Shipper</td>
                      <td><input type="email" name=""></td>
                    </tr>
                    <tr>
                      <td class="blk">Consignee</td>
                      <td><input type="email" name=""></td>
                    </tr>
                </tbody></table>
                    
                </td><!--/2nd td-->
              </tr>
              </tbody>
            </table>
        </section>
<!--/custom 2nd level-->
          <section>
            <div class="table-basic">
              <table class="table m-b-0">
                <thead style="background-color: #87ceeb; font-size: 10px;">
                  <tr><label class="form-control" style="font-weight: bold; font-size: 14px; ">Cargo details</label>
                    <th>Cargo unit</th>
                    <th>Qty</th>
                    <th>Length (cm)</th>
                    <th>Width (cm)</th>
                    <th>Height (cm)</th>
                    <th>Volume (CBM)</th>
                    <th>Gross Weight (kg)</th>
                    <th>Volumetric Weight (kg)</th>
                    <th>Chargeable weight (kg)</th>
                  </tr>
                </thead> 
                <tbody style="font-size: 10px;">
                  <tr>
                    <td>Parcel</td>
                    <td>1</td>
                    <td>120</td>
                    <td>120</td>
                    <td>120</td>
                    <td>0.2</td>
                    <td>0.5</td>
                    <td>0</td>
                    <td>0.5</td>
                  </tr>
                  <tr style="background-color: black; color: white">
                    <td>Total</td>
                    <td>1</td>
                    <td>120</td>
                    <td>120</td>
                    <td>120</td>
                    <td>0.2</td>
                    <td>0.5</td>
                    <td>0</td>
                    <td>0.5</td>
                  </tr>
                </tbody>
              </table>
            </div>
            </section>
<!--2nd table-->
            <div class="table-responsive">
              <table class="table m-b-0">
                <thead style="background-color: #87ceeb; font-size: 10px;">
                  <tr><br><label class="form-control" style="font-weight: bold; font-size: 14px; ">Disbursements and Charges</label>
                    <th></th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Unit cost</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Cur</th>
                    <th>ROE</th>
                    <th>Total (USD)</th>
                  </tr>
                </thead>
                <tbody style="font-size: 10px;">
                  <tr>
                    <td style="font-weight: bold;">Pre-Carriage</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>AWB fee</td>
                    <td>Shipment</td>
                    <td>1</td>
                    <td>120</td>
                    <td>0</td>
                    <td>0</td>
                    <td>USD</td>
                    <td>1</td>
                    <td>120</td>
                  </tr>
                  <tr>
                    <td>Documentation fee</td>
                    <td>Shipment</td>
                    <td>1</td>
                    <td>120</td>
                    <td>0</td>
                    <td>0</td>
                    <td>USD</td>
                    <td>1</td>
                    <td>120</td>
                  </tr>
                  <tr style="background-color: black; color: white;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-total</td>
                    <td>240</td>
                  </tr>
                  <tr>
                    <td style="font-weight: bold;">Main Carriage</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Air freight</td>
                    <td>Weight</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>USD</td>
                    <td>10</td>
                    <td>10</td>
                  </tr>
                  <tr>
                  <td>Fuel supercharge</td>
                    <td>Weight</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>USD</td>
                    <td>10</td>
                    <td>10</td>
                  </tr>
                  <tr style="background-color: black; color: white;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-total</td>
                    <td>260</td>
                  </tr>
                  <tr>
                    <td style="font-weight: bold;">On-Carriage</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>NA</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>NA</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr style="background-color: black; color: white;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-total</td>
                    <td>260</td>
                  </tr>
                  <tr>
                    <td style="font-weight: bold;">Customs</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>NA</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>NA</td>
                    <td>0</td>
                    <td>0</td>
                  </tr>
                  <tr style="background-color: black; color: white;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-total</td>
                    <td>260</td>
                  </tr>
                </tbody>
              </table>
            </div>
<!--/2nd table-->
<!--3rd table-->
            <div class="table-responsive">
              <table class="table m-b-0">
                <tbody style="font-size: 10px;">
                  <tr style="background-color: black; color: white; text-align: right;">
                    <td><label>Total disbursements and charges</label></td>
                    <td style="text-align: center;">260</td>
                  </tr>
                </tbody>
              </table>
            </div>
<!--/3rd table-->
<!--4th table-->
        <div class="table-responsive">
              <table class="table m-b-0">
                <thead style="background-color: #87ceeb; font-size: 10px;">
                  <tr><br><label class="form-control" style="font-weight: bold; font-size: 14px; ">Willfreight Handling fees</label>
                    <th></th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Unit cost</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Cur</th>
                    <th>ROE</th>
                    <th>Total (USD)</th>
                  </tr>
                </thead> 
                <tbody style="font-size: 10px;">
                  <tr>
                    <td>Handling fee</td>
                    <td>Shipment</td>
                    <td>1</td>
                    <td>120</td>
                    <td>0</td>
                    <td>0</td>
                    <td>USD</td>
                    <td>1</td>
                    <td>120</td>
                  </tr>
                </tbody>
              </table>
            </div>
<!--/4th table-->
<!--6th table-->
<section style="">
            <div class="table-responsive">
              <table class="table m-b-0">
                <tbody style="font-size: 10px;">
                  <tr style="background-color: black; color: white; text-align: right;">
                    <td><label>Total Willfreight handling fees</label></td>
                    <td style="text-align: center;">120</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="table-responsive">
              <table class="table m-b-10">
              <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </thead>
                <tbody style="font-size: 10px;">
                  <tr style="background-color: black; color: white;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: left;">Total Estimate</td>
                    <td style="text-align: left;">3800</td>
                  </tr>
                </tbody>
              </table>
            </div>
</section>
          </div>
        </div>
<!--/6th table-->
<!--         <div class="invoice-totals" style="">
          <div class="invoice-totals-row">
            <strong class="invoice-totals-title">Subtotal</strong>
            <span class="invoice-totals-value">$1619.97</span>
          </div>
          <div class="invoice-totals-row">
            <strong class="invoice-totals-title">Total</strong>
            <span class="invoice-totals-value">$1619.97</span>
          </div>
          <div class="invoice-totals-row">
            <strong class="invoice-totals-title">Amount Paid</strong>
            <span class="invoice-totals-value">$0.00</span>
          </div>
          <div class="invoice-totals-row">
            <strong class="invoice-totals-title">Amount Due</strong>
            <span class="invoice-totals-value">$1619.97</span>
          </div>
        </div> -->
        <div class="card card-block bg-default shadow">
          <p class="bold small">PAYMENT TERMS AND POLICIES</p>
          <small>All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or credit card or direct payment online. If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed
            quoted fee noted above. If the Invoice remails unpaid. our dept recovery agency, Urban, may charge you a fee of 25% of the unpaid portion of the
            invoice amount and other legal and collection costs not covered by the fee. </small>
        </div><br><br>
        <div class="card card-block bg-default shadow" style="min-height: 100px; font-size: 16px;"><strong>Approved by</strong> 
          <small></small>
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
    <style type="text/css">
      input[type=text]{
        border: none;
      }
      input[type=number]{
        border: none;
      }
      input[type=email]{
        border: none;
      }
      input[type=date]{
        border: none;
      }
      .blk{
        background-color: black;
        color: white;
        min-width: 120px;
      }
      .bld{
        font-weight: bold;
      }
    </style>