<?php
include 'session.php';
include 'crud.php';
$oop = new CRUD();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Golden Pharmaceutical</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fixedColumns.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.bootstrap.min.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- DatePicker -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style_css.css">
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-brand">
            <img src="../img/logo.png" alt="Company Logo" style="height:55px;width: 55px;">   
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">       
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="not"><i class="fa fa-bell fa-lg"></i><span class="label label-warning badge" id="notify">
                    <?php
                        echo $counting0;
                    ?>
                    </span>
                </a> 
               <ul class="dropdown-menu scrollables-menu" >
                   <li>
                   <?php 
                        while ($row = mysqli_fetch_array($mysql,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Expiring Product</li>";
                            echo "<li><a href='viewProduct'>".$row['name'].' ('.$row['lot_no'].') '.$row['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql2,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Out of Stocks</li>";
                            echo "<li><a href='viewProduct'>".$rows['name'].' ('.$rows['lot_no'].') '.$rows['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql3,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Overdue</li>";
                            echo "<li><a href='viewInvoice'>Sales No. ".sprintf('%04d',$rows['sales_no'])."</a></li>";
                        }
                   ?>
                   </li>
                   <li class='divider'></li>
               </ul>
            </li>        
            <li>
                    <a href="index"><i class="fa fa-fw fa-tachometer">&nbsp;</i>Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-fw fa-user-md"></b><?php echo $name;?><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="viewCR"><i class="fa fa-fw fa-inbox"></i> Collections Receipt</a>
                </li>
                <li>
                    <a href="viewCM"><i class="fa fa-fw  fa-credit-card"></i> Credit/Debit Memo </a>
                </li>
                <li>
                    <a href="viewPO"><i class="fa fa-fw  fa-shopping-cart"></i> Purchase Orders</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-9"><i class="fa fa-fw  fa-ruble"></i> Expenses<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-9" class="collapse">
                        <li><a href="viewExCat"><i class="fa fa-align-left">&nbsp;</i>Expenses Category</a></li>
                        <li><a href="viewExList"><i class="fa fa-align-right">&nbsp;</i>Expeses List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="viewInvoice"><i class="fa fa-fw fa-tags"></i> Sales</i></a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-archive">&nbsp;</i>Inventory<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="viewProduct"><i class="fa fa-list">&nbsp;</i>View</a></li>
                        <li><a href="viewInvOut"><i class="fa fa-minus">&nbsp;</i>Inventory Out</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-o"></i> Customers<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="viewCustomers"><i class="fa fa-users">&nbsp;</i>View</a></li>
                        <li><a href="viewCustPro"><i class="fa fa-user-circle">&nbsp;</i>Customers Profile</a></li>
                    </ul>
                </li>
                <li>
                    <a href="viewSup"><i class="fa fa-fw fa-truck"></i> Suppliers</a>
                </li>
                <?php 
                if ($user_type=='admin') {
                ?>
                <li>
                    <a href="viewEmployee"><i class="fa fa-fw fa-id-card"></i> Employee</a>
                </li>
                <li>
                    <a href="viewUser" ><i class="fa fa-fw fa-user">&nbsp;</i> Users</a>
                </li>
                <li>
                    <a href="settings"><i class="fa fa-fw fa-cogs">&nbsp;</i>Settings</a>
                </li>
                <?php 
                }
                 ?>
                <li>
                    <hr>
                    <center>
                        <div class="container-fluid" style="color: #fff;">
                            <p><b style="font-size:16px;">Golden Pharmaceutical</b><br>
                            <i style="font-size: 10px;">Bolonsiri Road, Camaman-an,</i><br><i style="font-size: 9px"> Cagayan De Oro City</i><br><i style="font-size: 8px;">Telefax (088) 857-3088</i></p> 
                             <p>All Rights Reserved 2017.</p>   
                        </div>
                    </center>                    
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
              <ol class="breadcrumb">
              <li><a href="index.php">Dashboard</a></li>
              <li class="active">View Collection Receipts</li>
              </ol>
              <hr>
            </div>
        </div>
<?php
    if (isset($_POST['upCR'])) {
        $cr = mysqli_real_escape_string($db,$_POST['cr']);
        $ts = mysqli_real_escape_string($db,$_POST['ts']);
        $dates = mysqli_real_escape_string($db,$_POST['dates']);
        $pt = mysqli_real_escape_string($db,$_POST['pt']);
        $ch = mysqli_real_escape_string($db,$_POST['ch']);
        $sql = $oop->upCR($cr,$ts,$dates,$pt,$ch);
        if(!$sql){
           ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Update!</strong> Try Again.
              </div>
          <?php
        }else{
            ?>
              <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Updated!</strong>
              </div>
          <?php
        }
    }else if (isset($_POST['delete'])) {
        $did = mysqli_real_escape_string($db,$_POST['d_cr']);
        $sql = $oop->delCR($did);
        if(!$sql){
           ?>
              <div class="alert alert-warning alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Delete Collection Receipt!</strong> Try Again.
              </div>
          <?php
        }else{
            ?>
              <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Deleted!</strong>
              </div>
          <?php
        }
    }
?>        
        <div class="row">
            <div class="col-sm-3">
              <div class="input-group date min">
                <span class="input-group-addon" ><b class="fa fa-calendar">&nbsp;</b>Date From:</span>
                <input name="date" id="min" class="form-control" size="16" type="text" placeholder="">
                <input type="hidden" id="dateFrom">
              </div> 
            </div>
            <div class="col-sm-3">
              <div class="input-group date max">
                <span class="input-group-addon" ><b class="fa fa-calendar">&nbsp;</b>Date To:</span>
                <input name="date" id="max" class="form-control" size="16" type="text" placeholder="">
                <input type="hidden" id="dateTo">
              </div>
            </div>
            <div class="col-sm-3">
              
            </div>
            <div class="col-sm-3"><a href="addCR"><button class="btn btn-info form-control"> <i class="fa fa-plus">&nbsp;</i>Add Collection Receipt</button></a></div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table" width="100%" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>CR No.</th>
                            <th>Customer Name</th>
                            <th>Total Sales</th>
                            <th>Date</th>
                            <th>Payment Type</th>
                            <th>Check No</th>
                            <th>Date Added</th>
                            <th>Info</th>
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <?php
                      $result = mysqli_query($db, "SELECT tbl_customers.full_name,LPAD(tbl_CR.cr_no,4,0) as cr_no,DATE_FORMAT(tbl_CR.cr_date,'%m-%d-%Y') as cr_date,DATE_FORMAT(tbl_CR.cr_date,'%Y/%m/%d') as cr_date1,tbl_CR.cr_totalSales,tbl_CR.timestamp,tbl_CR.pay_type,tbl_CR.check_no FROM tbl_CR INNER JOIN tbl_customers ON tbl_customers.cus_id=tbl_CR.cus_id ORDER BY tbl_CR.cr_no") or die(mysql_error());
                      $i=1;
                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['cr_no'];?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo number_format($row['cr_totalSales'],2); ?></td>
                            <td><?php echo $row['cr_date'];?></td>
                            <td><?php echo $row['pay_type'];?></td>
                            <td><?php if($row['check_no']==0&&$row['pay_type']!='Check'){
                                    echo "N\A";
                                }else{
                                    echo $row['check_no'];
                            }?></td>
                            <td><?php echo $row['timestamp'];?></td>
                            <td><button class="b-infos btn btn-info btn-xs" id="infos" data-cr="<?php echo $row['cr_no'];?>"><span class="fa fa-question"></span></button>
                            </td>
                            <td>
                               <b data-placement="top"  title="Edit"><button class="btn-edits btn btn-warning btn-xs"  data-title="Edit" data-cr="<?php echo $row['cr_no'];?>" data-cus="<?php echo $row['full_name']; ?>" data-ts="<?php echo $row['cr_totalSales'];?>" data-date="<?php echo $row['cr_date1'];?>" data-pt="<?php echo $row['pay_type'];?>" data-ch="<?php echo $row['check_no'];?>" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></b> 
                            </td>      
                            <td>
                              <?php 
                             if ($user_type=='admin') {
                             ?>
                                <b data-placement="top" title="Delete"><button class="btn-deletes btn btn-danger btn-xs"  data-title="delete" data-did="<?php echo $row['cr_no']; ?>" data-toggle="modal"  data-target="#delete" ><span class=" glyphicon glyphicon-trash"></span></button></b>   
                                <?php 
                             }
                             ?>
                            </td> 
                          </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>            
                </div>
          </div>
        </div>
<!-- Update -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Collection Receipt Details</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
          <div class="input-group">
            <span class="input-group-addon">CR NO.:</span>    
            <input type="number" step="any" name="cr" id="edits_cr" class="form-control" readonly="">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Customer:</span>  
            <input type="text" name="" id="edits_cus" class="form-control">    
          </div>
          <div class="input-group">
            <span class="input-group-addon">Total Sales:</span>  
            <input type="number" step="any" name="ts" id="edits_ts" class="form-control" >
          </div>
          <div class="input-group date form_date">
            <span class="input-group-addon" >Date:</span>
            <input name="dates" id="edits_dates" class="form-control" size="16" type="text" placeholder="">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Payment Type:</span>  
            <select name="pt" id="edits_pt" class="form-control">
              <option value="Check">Check</option>
              <option value="Cash">Cash</option>
            </select>
          </div>
          <div class="input-group">
            <span class="input-group-addon">Check No.:</span>  
            <input type="number" step="any" name="ch" id="edits_ch" class="form-control">    
          </div>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-warning" name="upCR">Update</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>

  </div>
</div>  
<!-- Delete -->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Collection Receipt</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
        <input type="number" name="d_cr" id="d_cr" hidden="">
        <b><strong>Are you sure you want to delete this collection receipt?</strong></b>
      </div>
      <div class="modal-footer">
         <button class="btn btn-danger" type="submit" name="delete">Yes</button>
         <button class="btn btn-default" data-dismiss="modal">No</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- Info -->
<div id="info" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Collection Receipt Details</h4>
      </div>
      <div class="modal-body">
          <div class="panel-body" style="height:200px; overflow-y: auto;">
                <div class="table-responsive">      
                  <table class="table table-hover table-fixed table-striped">
                    <thead class="thead-inverse">
                      <tr>
                        <th>ID</th>
                        <th>Sales No.</th>
                        <th>Amount</th>
                        <th>Edit</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tbody id="cr_details">
                    </tbody>
                  </table>       
                </div>
          </div><!-- panel body-->
      </div>
    </div>
    <!-- Update Amount Modal -->
    <div id="editAm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Amount</h4>
          </div>
          <div class="modal-body">
          <input type="number" step="any" id="upAmount" name="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" id="upOk">Ok</button>
            <button type="button" class="btn btn-primary" id="upNo">Cancel</button>
          </div>
        </div>

      </div>
    </div>
    <!--  -->
  </div>  
</div>  
            <!-- /.row -->
        <!-- /.container-fluid -->
     </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- DatePicker -->
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.en-AU.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="../js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.flash.min.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var table = $('#datatables').dataTable({
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var min = $("#min").val();
            var max = $("#max").val();
            // // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                    i : 0;
            };
            $(api.column(1).footer()).html(
                'Date From: '+min
            );
            $(api.column(2).footer()).html(
                'Date To: '+max
            );
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            $( api.column( 3 ).footer() ).html(
                'Total: ₱'+pageTotal.toFixed(2)
            );
        },
       "pageLength": -1,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        // fixedColumns:{
        //     leftColumns: 2
        // },
        "oLanguage": {
          "sSearch": "<b class='fa fa-search fa-lg'>&nbsp;</b>",
          "sLengthMenu": "<b id='data-menu'><b class='fa fa-eye fa-lg'>&nbsp;</b>Show _MENU_ records</b>&nbsp;"
        },
        "pagingType": "full_numbers",
        dom: 'lBfrtip',
        buttons: [
            {
              extend:'colvis', "text":'<span class="fa fa-eye fa-lg">&nbsp;Column Visibility</span>',"className": 'btn btn-default btn-xs',
              collectionLayout: 'fixed two-column'
            },
            {
              "extend":'copyHtml5', "text":'<span class="fa fa-copy fa-lg">&nbsp;</span>Copy',"className": 'btn btn-primary btn-xs',footer: true,
              exportOptions: {
                    columns: ':visible'
                }
            },{
              "extend":'excelHtml5', "text":'<span class="fa fa-file-excel-o fa-lg">&nbsp;</span>Excel',"className": 'btn btn-primary btn-xs',footer: true, 
              exportOptions: {
                    columns: ':visible'
                }
            },{
              "extend":'pdfHtml5', "text":'<span class="fa fa-file-pdf-o fa-lg">&nbsp;</span>PDF',"className": 'btn btn-primary btn-xs',footer: true, 
              exportOptions: {
                                  columns: ':visible'
                              }                    
            },{
              "extend":'print', "text":'<span class="fa fa-print fa-lg">&nbsp;</span>Print',"className": 'btn btn-primary btn-xs',footer: true, 
              exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });
    $('.min,.max').datepicker({format: "mm-dd-yyyy",'clearBtn':true,todayHighlight:true,autoclose:true}).change(function () {
        table.fnFilter();
    });
    // DateRange
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
      var min = $('.min').datepicker('getDate');
      var max = $('.max').datepicker('getDate');
      var startDate = new Date(data[4]);
      if (min == null && max == null) { return true; }
      if (min == null && startDate <= max) { return true;}
      if(max == null && startDate >= min) {return true;}
      if (startDate <= max && startDate >= min) { return true; }
      return false;
    }); 
    $('.btn-edits').click(function(event) {
        var cr = $(this).data('cr');
        var cus = $(this).data('cus');
        var ts = $(this).data('ts');
        var date = $(this).data('date');
        var pt = $(this).data('pt');
        var ch = $(this).data('ch');
        $("#edits_cr").val(cr);
        $("#edits_cus").val(cus);
        $("#edits_ts").val(ts);
        $("#edits_dates").val(date);
        $("#edits_pt").val(pt);
        $("#edits_ch").val(ch);
        // console.log(cr+cus+ts+date+pt+ch);
    });
    $('.btn-deletes').click(function(event) {
       var did = $(this).data('did');
       $("#d_cr").val(did);
    });
    $('.b-infos').click(function(event) {
      var cr = parseInt($(this).data('cr'));
      $.post('showjax.php', {cr_d: cr}, function(data, textStatus, xhr) {
         $("#cr_details").html(data);
         $("#info").modal();
      });
    });
    $(document).on('click', '#btn-update', function(event) {
      var si = $(this).data('si');
      $("#upAmount").val(si); 
      $("#editAm").modal();
    });
    $("#not").click(function(event) {
        $("#notify").hide();
    });
    function check() {
        var val = $("#notify").text();
        if (val==0) {
            $("#notify").hide();
        }
    }
    check();    
    $("#upOk").click(function(event) {
        $('#editAm').modal('toggle');
    });
    $("#upNo").click(function(event) {
        $('#editAm').modal('toggle');
    });
    $('.form_date').datepicker({
    format: "yyyy/mm/dd",
    language: 'en-AU',
    todayHighlight: true,
    autoclose: true
    });
});
</script>
</body>
</html>