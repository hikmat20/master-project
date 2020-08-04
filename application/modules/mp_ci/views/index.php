<?php
    $ENABLE_ADD     = has_permission('Mp_ci.Add');
    $ENABLE_MANAGE  = has_permission('Mp_ci.Manage');
    $ENABLE_VIEW    = has_permission('Mp_ci.View');
    $ENABLE_DELETE  = has_permission('Mp_ci.Delete');
?>

<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>">

<div class="nav-tabs-custom">
  <div class="box box-primary">
      <div class="box-header">
        <div style="display:inline-block;width:100%;">
          <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_data()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
          <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
          <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
        </div>

      </div>
      <div class="box-body">

        <table id="tableset" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="5">#</th>
              <th>Care Instruction ID</th>
              <th>Care Instruction Name</th>
              <th>Care Instruction Image</th>
              <?php if ($ENABLE_MANAGE) : ?>
              <th width="75">Action</th>
              <?php endif; ?>

            </tr>
          </thead>

        <tbody id="tbody-detail">

        </tbody>

        <tfoot>
          <tr>
            <th width="5">#</th>
            <th>Care Instruction ID</th>
            <th>Care Instruction Name</th>
            <th>Care Instruction Image</th>
            <?php if ($ENABLE_MANAGE) : ?>
            <th width="75">Action</th>
            <?php endif; ?>
          </tr>
        </tfoot>
        </table>


      </div>
  </div>
</div>



<form id="form-modal" action="" method="post">
  <div class="modal fade" id="ModalView">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="head_title"></h4>
        </div>
        <div class="modal-body" id="view">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ModalView2">
    <div class="modal-dialog"  style='width:30%; '>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="head_title2"></h4>
          </div>
          <div class="modal-body" id="view2">
          </div>
          <div class="modal-footer">
            <!--<button type="button" class="btn btn-primary">Save</button>-->
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalView3">
      <div class="modal-dialog"  style='width:30%; '>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="head_title3"></h4>
            </div>
            <div class="modal-body" id="view3">
            </div>
            <div class="modal-footer">
              <!--<button type="button" class="btn btn-primary">Save</button>-->
              <button type="button" class="btn btn-default close3" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- modal -->
</form>
<!-- Modal Bidus-->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
<!-- End Modal Bidus-->
<style>
  .box-primary{

    border: 1px solid #ddd;
  }
</style>
<script type="text/javascript">

  $(document).ready(function() {
    //var table = $('#example1').DataTable();
    DataTables();

    $("#excel-report").on('click', function() {
      if (document.getElementById("hide-click").classList.contains('hide_colly')) {
        window.location.href = siteurl+"barang_wset/downloadExcel/hide";
      }else {
        window.location.href = siteurl+"barang_wset/downloadExcel/unhide";
      }
    });

    $("#pdf-report").on('click', function() {
      if (document.getElementById("hide-click").classList.contains('hide_colly')) {
        window.open = siteurl+"barang_wset/print_rekap/hide";
      }else {
        window.open = siteurl+"barang_wset/print_rekap/unhide";
      }
    });

    //Edit
    $(document).on('click', '.edit', function(e){
      var id = $(this).data('id_ci');
      $(".modal-dialog").css('width','55%');
      $("#head_title").html("<b>EDIT FORM</b>");
      $("#view").load(siteurl+active_controller+'/modal_Process/CI/edit/'+id);
      $("#ModalView").modal();
		});

    //DETAIL
    $(document).on('click', '.detail', function(e){
      var id = $(this).data('id_ci');
      $(".modal-dialog").css('width','55%');
      $("#head_title").html("<b>DETAIL FORM</b>");
      $("#view").load(siteurl+active_controller+'modal_Process/Care Instruction/view/'+id);
      $("#ModalView").modal();
		});

    //DELETE
    $(document).on('click', '.delete', function(e){
      var id_patter_type = $(this).data('id_patter_type');
      swal({
        title: "Are you sure?",
        text: "You will not be able to process again this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonFeature: "btn-danger",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            url: siteurl+active_controller+"deleteData",
            dataType : "json",
            type: 'POST',
            data: {id_patter_type:id_patter_type},
            success: function(result){
              swal({
                title	: "Save Success!",
                text	: result.msg,
                type	: "success",
                timer	: 1500,
                showCancelButton	: false,
                showConfirmButton	: false,
                allowOutsideClick	: false
              });
              DataTables();
            },
            error: function (request, error) {
              console.log(arguments);
              swal({
                title				: "Error Message !",
                text				: 'An Error Occured During Process. Please try again..',
                type				: "warning",
                timer				: 5000,
                showCancelButton	: false,
                showConfirmButton	: false,
                allowOutsideClick	: false
              });
            }
          });
          /*$.ajax({
            url			: baseurl,
            type		: "POST",
            data		: formData,
            cache		: false,
            dataType	: 'json',
            processData	: false,
            contentType	: false,
            success		: function(data){
              var kode_bast	= data.kode;
              if(data.status == 1){
                swal({
                  title	: "Save Success!",
                  text	: data.pesan,
                  type	: "success",
                  timer	: 15000,
                  showCancelButton	: false,
                  showConfirmButton	: false,
                  allowOutsideClick	: false
                });
                window.location.href = base_url + active_controller;
              }else{
                if(data.status == 2){
                  swal({
                    title	: "Save Failed!",
                    text	: data.pesan,
                    type	: "danger",
                    timer	: 10000,
                    showCancelButton	: false,
                    showConfirmButton	: false,
                    allowOutsideClick	: false
                  });
                }else{
                  swal({
                    title	: "Save Failed!",
                    text	: data.pesan,
                    type	: "warning",
                    timer	: 10000,
                    showCancelButton	: false,
                    showConfirmButton	: false,
                    allowOutsideClick	: false
                  });
                }
              }
            },
            error: function() {
              swal({
                title				: "Error Message !",
                text				: 'An Error Occured During Process. Please try again..',
                type				: "warning",
                timer				: 7000,
                showCancelButton	: false,
                showConfirmButton	: false,
                allowOutsideClick	: false
              });
            }
          });*/
        } else {
          swal("Batal Proses", "Data bisa diproses nanti", "error");
          return false;
        }
      });
		});

    //Modal1 Customer
    $('#ModalView3').on('hidden.bs.modal', function () {
        $('body').addClass('modal-open');
        $("#head_title3").html("");
        $("#view3").html("");
    });
    $('#ModalView2').on('hidden.bs.modal', function () {
        $('body').addClass('modal-open');
        $("#head_title2").html("");
        $("#view2").html("");
    });
    $('#ModalView').on('hidden.bs.modal', function () {
        $("#head_title").html("");
        $("#view").html("");
    });
    jQuery(document).on('click', '#addCiSave', function(){
      var valid = getValidation();
      //console.log("X");
      if (valid) {
        var formdata = new FormData(document.getElementById("form-Ci"));//$("#form-Ci").serialize();
        //console.log(formdata);
        $.ajax({
          url: siteurl+active_controller+"saveCi",
          dataType : "json",
          type: 'POST',
          data: formdata,
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(result){
            if(result.status=='1'){
              swal({
                title: "Sukses!",
                text: result['pesan'],
                type: "success",
                timer: 1500,
                showConfirmButton: false
              });
              setTimeout(function(){
                DataTables();
                if (($("#ModalView3").data('bs.modal') || {}).isShown) {
                  $("#ModalView3").modal('hide');
                }else {
                  $("#ModalView").modal('hide');
                }

              },1600);
            } else {
              swal({
                title: "Gagal!",
                text: result['pesan'],
                type: "error",
                timer: 1500,
                showConfirmButton: false
              });
            };
          },
          error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      }else {
        swal({
          title: "Gagal!",
          text: 'Please fill in the blank form!',
          type: "error",
          timer: 1500,
          showConfirmButton: false
        });
        $('html, body, .modal').animate({
            scrollTop: $("#form-supplier").offset().top
        }, 2000);
      }

      //$("#ModalView").modal('hide');
    });

  });
  jQuery(document).on('keyup keypress blur', '.numberOnly', function(){
    if ((event.which < 48 || event.which > 57 ) && (event.which < 46 || event.which > 46 )) {
      event.preventDefault();
    }
  });

  jQuery(document).on('keyup', '.nominal', function(){
    var val = this.value;
    val = val.replace(/[^0-9\.]/g,'');

    if(val != "") {
      valArr = val.split(',');
      valArr[0] = (parseInt(valArr[0],10)).toLocaleString();
      val = valArr.join(',');
    }

    this.value = val;
  });

  function DataTables(){
    var dataTable = $('#tableset').DataTable({
      "serverSide": true,
      "stateSave" : true,
      "bAutoWidth": true,
      "destroy": true,
      "responsive": true,
      "oLanguage": {
        "sSearch": "<b>Live Search : </b>",
        "sLengthMenu": "_MENU_ &nbsp;&nbsp;<b>Records Per Page</b>&nbsp;&nbsp;",
        "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
        "sInfoFiltered": "(filtered from _MAX_ total entries)",
        "sZeroRecords": "No matching records found",
        "sEmptyTable": "No data available in table",
        "sLoadingRecords": "Please wait - loading...",
        "oPaginate": {
          "sPrevious": "Prev",
          "sNext": "Next"
        }
      },
      "aaSorting": [[ 1, "asc" ]],
      "columnDefs": [ {
        "targets": 'no-sort',
        "orderable": false,
      }],
      "sPaginationType": "simple_numbers",
      "iDisplayLength": 5,
      "aLengthMenu": [[5, 10, 20, 50, 100, 150], [5, 10, 20, 50, 100, 150]],
      "ajax":{
        url : siteurl + active_controller + 'getDataJSON',
        type: "post",
        data: function(d){
          d.activation 	= 'active'
        },
        cache: false,
        error: function(){
          $(".my-grid-error").html("");
          $("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
          $("#my-grid_processing").css("display","none");
        }
      }
    });
  }

  function add_data(){
    $(".modal-dialog").css('width','55%');
    $("#head_title").html("<b>Add Care Instruction</b>");
    $("#view").load(siteurl+active_controller+'/modal_Process/CI/add/');
    $("#ModalView").modal();
  }


</script>
