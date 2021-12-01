<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Invoice
          <small class="float-right">Date: <?php echo date("d/m/y");?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Sample data</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>User</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
              <th>Name</th>
              <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>Total With Tax</th>
                    <th></th>
                  </tr>
          </thead>
          <tbody>
          <?php 
                $subtotal=0;
                $subtotal_with_tax=0;
                if(isset($recods))
                if(!empty($recods->result()))
                {
                  
                foreach ($recods->result() as $row)  
                 {  
                  $tax= $row->Tax;
                     $total=$row->Unit_Price*$row->Quantity;
                     $subtotal+=$total;
                     $item_tax=$tax!=0?$total*.01*$tax:0;
                     $item_with_tax=$total+$item_tax;
                     $subtotal_with_tax+=$item_with_tax;
                    //  $subtotal_tax=
                     ?>
                  <tr>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->Quantity;?></td>
                    <td>$ <?php echo $row->Unit_Price;?></td>
                    <td><?php echo $row->Tax;?>%</td>
                    <td>$   <?php echo $total;?></td>
                    <td>$   <?php echo $item_with_tax;?></td>
                    
                    </tr>
                <?php 
                 }}
                 else{
                     ?>
                      <tr>
                    <td style="text-align:center"colspan="5">No records</td>
                    
                     <?php
                 }
                 ?>
                  
                    </td>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="<?php echo base_url('assets/') ?>dist/img/credit/visa.png" alt="Visa">
        <img src="<?php echo base_url('assets/') ?>dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="<?php echo base_url('assets/') ?>dist/img/credit/american-express.png" alt="American Express">
        <img src="<?php echo base_url('assets/') ?>dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Amount Due mm/dd/yyy</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>$<?php echo $subtotal;?></td>
            </tr>
            <tr>
            <th>Subtotal (With Tax)</th>
            <td>$<?php echo $subtotal_with_tax;?></td>
            </tr>
            <tr>
            <th>Discount</th>
              <td><?php echo $discount;?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td><?php echo $totalprice;?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
