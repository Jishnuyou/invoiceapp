<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Edit</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini"style="background-color: #f4f6f9;">
<!-- Site wrapper -->
<div class="wrapper" >
  <!-- Navbar -->

  <!-- /.navbar -->



  <!-- Content Wrapper. Contains page content -->
  <div class="container">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
   
    
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Details</h3>
              
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <form method="post" action="addinvoice">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" id="inputName" class="form-control" name="uname" value="<?php echo set_value('uname'); ?>" placeholder="Name">
                <span style="display: block;" class="error invalid-feedback"><?php echo form_error('uname'); ?></span>
            </div>
              <div class="form-group">
                <label for="inputDescription">Quantity</label>
                <input type="number" id="inputName" name="quantity" class="form-control" value="<?php echo set_value('quantity'); ?>" placeholder="Quantity"> </div>
                <span style="display: block;" class="error invalid-feedback"><?php echo form_error('quantity'); ?></span>

                <div class="form-group">
                
                <label for="inputDescription">Unit Price</label>
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control"name="unit_price" value="<?php echo set_value('unit_price'); ?>" placeholder="Unit Price">
                <span style="display: block;" class="error invalid-feedback"><?php echo form_error('unit_price'); ?></span>
                  
                </div>
                </div>
                <div class="form-group">
                        <label>Tax</label>
                        <select class="custom-select" name="tax">
                          <option value=""  >--select--</option>
                          <option value="0" <?php echo set_select('tax', "0"); ?>>0%</option>
                          <option value="1" <?php echo set_select('tax', "1"); ?>>1%</option>
                          <option value="5" <?php echo set_select('tax', "5"); ?>>5%</option>
                          <option value="10" <?php echo set_select('tax', "10"); ?>>10%</option>
                          
                        </select>
                        
                <span style="display: block;" class="error invalid-feedback"><?php echo form_error('tax'); ?></span>

                      </div>
                      <div class="row">
                    <div class="col-12">
                      

                    <input type="submit" value="Save Changes" class="btn btn-success float-right">
                    <input type="reset" value="Cancel" class="btn btn-secondary float-right mx-5">

                    </div>
            </form>
      </div>
              
            </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-8">
         
          <!-- /.card -->
          <div class="row">
        <div class="col-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Items</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
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
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                       
                        <a href="<?php echo base_url('invoicedelete/'.$row->id) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
                </div>
                 
        <div class="row border shadow-sm   ">
        <div class="col-12">
                  <p class="lead">Invoice Details</p>
                 <form method="post" action="print">
                   <input type="hidden" name="totdiss" id="totdiss" value=""/>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$<?php echo $subtotal;?></td>
                      </tr>
                      <tr>
                        <th>Subtotal (With Tax)</th>
                        <td>$<?php echo $subtotal_with_tax;?></td>
                      </tr>
                      <tr>
                        <th>Discount</th>
                        <td>
                        <div class="input-group">
                  <div class="input-group-prepend">
                    <select class="custom-select"id="disctype" name="disctype" style="margin-right: 10px;" >
                    
                          <option value="%" >%</option>
                          <option value="$" >$</option>
                         
                        </select>
                  </div>
                  <input type="text" class="form-control" required id="discount"name="discount" value="" placeholder="Discount">

                <span style="display: block;" class="error invalid-feedback"><?php echo form_error('unit_price'); ?></span>
                  
                </div>
                        
                      </td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="dis_total">$<?php echo $subtotal_with_tax;?></td>
                      </tr>
                    </tbody></table>
                    <button type="submit" class="btn btn-primary float-right m-3" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate Invoice
                  </button>
                    </form>
                  </div>
                </div>
                </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/') ?>dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<script type="text/javascript">


<?php if($this->session->flashdata('message')){ ?>
    toastr.success("<?php echo $this->session->flashdata('message'); ?>");

<?php $this->session->unset_userdata('message');}else if($this->session->flashdata('delete')){  ?>
    toastr.error("<?php echo $this->session->flashdata('delete'); ?>");
<?php $this->session->unset_userdata('delete');}  ?>

// A $( document ).ready() block.
$( document ).ready(function() {
  $('#discount').keyup(function() {
    var discount =this.value==""?0:this.value;
    var type = $('#disctype').val();
    var subtotal_with_tax=<?php echo $subtotal_with_tax;?>;
    var dis_total=0;
    var perdisc=0;
    if(type=="$")
    {
      dis_total=subtotal_with_tax-discount;
      $('#dis_total').html('$ '+dis_total.toFixed(2));
      $('#totdiss').val('$ '+dis_total.toFixed(2));

    }
    else{
      discount= discount==0?1:discount;
      console.log(discount);
      perdisc=subtotal_with_tax*discount*.01;
      dis_total=subtotal_with_tax-perdisc;
      console.log(dis_total);

      $('#dis_total').html('$ '+dis_total.toFixed(2));
       $('#totdiss').val('$ '+dis_total.toFixed(2));
      

    }

  });
  $('#disctype').on('change', function() {
    $('#discount').keyup();
    
});
});
</script>


</body>
</html>
