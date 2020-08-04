<?php
$ENABLE_ADD     = has_permission('Master_product_collection.Add');
$ENABLE_MANAGE  = has_permission('Master_product_collection.Manage');
$ENABLE_VIEW    = has_permission('Master_product_collection.View');
$ENABLE_DELETE  = has_permission('Master_product_collection.Delete');
?>

<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>">

<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#Collection" data-toggle="tab" aria-expanded="true">Collection</a></li>
    <!-- <li class=""><a href="#Customer_category" data-toggle="tab" aria-expanded="false">Master Category Customer</a></li> -->
  </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="Collection">
      <div class="box box-primary">
        <div class="box-header">
          <div style="display:inline-block;width:100%;">
            <a class="btn btn-sm btn-success add_data" href="javascript:void(0)" title="Add" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
            <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
            <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
          </div>

        </div>
        <div class="box-body">

          <table id="tableset" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5">#</th>
                <th>Collection ID</th>
                <th>Collection Name</th>
                <!-- <th>Type</th> -->
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
                <th>Collection ID</th>
                <th>Collection Name</th>
                <!-- <th>Type</th> -->
                <?php if ($ENABLE_MANAGE) : ?>
                  <th width="75">Action</th>
                <?php endif; ?>
              </tr>
            </tfoot>
          </table>


        </div>
      </div>
    </div>

    <!-- <div class="tab-pane" id="Customer_category">
          <div class="box box-primary">
              <div class="box-header">
                <div style="display:inline-block;width:100%;">
                  <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Add" onclick="add_ProductCategory()" style="float:left;margin-right:8px"><i class="fa fa-plus">&nbsp;</i>New</a>
                  <a class="btn btn-sm btn-danger pdf" id="pdf-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-file"></i> PDF</a>
                  <a class="btn btn-sm btn-success excel" id="excel-report" style="float:right;margin:8px 8px 0 0"><i class="fa fa-table"></i> Excel</a>
                </div>

              </div>
              <div class="box-body">

                <table id="table_product_category" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5">#</th>
                			<th>Category ID</th>
                			<th>Category Name</th>
                      <th>Shipping Type</th>
                			<?php if ($ENABLE_MANAGE) : ?>
                			<th width="75">Action</th>
                			<?php endif; ?>
                    </tr>
                  </thead>

                <tbody id="tbody-table_product_category">

                </tbody>

                <tfoot>
                  <tr>
                    <th width="5">#</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Shipping Type</th>
                    <?php if ($ENABLE_MANAGE) : ?>
                    <th width="75">Action</th>
                    <?php endif; ?>
                  </tr>
                </tfoot>
                </table>


              </div>
          </div>
        </div> -->
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
    <div class="modal-dialog" style='width:30%; '>
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
    <div class="modal-dialog" style='width:30%; '>
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
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<!-- End Modal Bidus-->
<style>
  .box-primary {

    border: 1px solid #ddd;
  }
</style>
<script type="text/javascript">
  $(document).ready(function() {
    //var table = $('#example1').DataTable();
    DataTables();

    $("#excel-report").on('click', function() {
      if (document.getElementById("hide-click").classList.contains('hide_colly')) {
        window.location.href = siteurl + "barang_wset/downloadExcel/hide";
      } else {
        window.location.href = siteurl + "barang_wset/downloadExcel/unhide";
      }
    });

    $("#pdf-report").on('click', function() {
      if (document.getElementById("hide-click").classList.contains('hide_colly')) {
        window.open = siteurl + "barang_wset/print_rekap/hide";
      } else {
        window.open = siteurl + "barang_wset/print_rekap/unhide";
      }
    });

    //Edit
    $(document).on('click', '.edit', function(e) {
      var id = $(this).data('id_collection');
      $(".modal-dialog").css('width', '55%');
      $("#head_title").html("<b>EDIT FORM</b>");
      $("#view").load(siteurl + active_controller + '/modal_Process/Collection/edit/' + id);
      $("#ModalView").modal();
    });

    //DETAIL
    $(document).on('click', '.detail', function(e) {
      var id = $(this).data('id_collection');
      $(".modal-dialog").css('width', '55%');
      $("#head_title").html("<b>DETAIL FORM</b>");
      $("#view").load(siteurl + active_controller + 'modal_Process/Collection/view/' + id);
      $("#ModalView").modal();
    });

    //DELETE
    $(document).on('click', '.delete', function(e) {
      var id_collection = $(this).data('id_collection');
      swal({
          title: "Are you sure?",
          text: "You will not be able to process again this data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes",
          cancelButtonText: "Cancel",
          closeOnConfirm: false,
          closeOnCancel: false,
          showLoaderOnConfirm: true
        },
        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: siteurl + active_controller + "deleteData",
              dataType: "json",
              type: 'POST',
              data: {
                id_collection: id_collection
              },
              success: function(result) {
                swal({
                  title: "Save Success!",
                  text: result.msg,
                  type: "success",
                  timer: 1500,
                  showCancelButton: false,
                  showConfirmButton: false,
                  allowOutsideClick: false
                });
                DataTables();
              },
              error: function(request, error) {
                console.log(arguments);
                swal({
                  title: "Error Message !",
                  text: 'An Error Occured During Process. Please try again..',
                  type: "warning",
                  timer: 5000,
                  showCancelButton: false,
                  showConfirmButton: false,
                  allowOutsideClick: false
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
    $('#ModalView3').on('hidden.bs.modal', function() {
      $('body').addClass('modal-open');
      $("#head_title3").html("");
      $("#view3").html("");
    });
    $('#ModalView2').on('hidden.bs.modal', function() {
      $('body').addClass('modal-open');
      $("#head_title2").html("");
      $("#view2").html("");
    });
    $('#ModalView').on('hidden.bs.modal', function() {
      $("#head_title").html("");
      $("#view").html("");
    });
    $(document).on('click', '#selBrand', function(e) {
      //selBrand();\
      $("#ModalView2 .modal-dialog").css('width', '30%');
      var id_sup = $(this).data('id_customer');
      //console.log(id_sup);
      $("#head_title2").html("<b>SELECT BRAND</b>");
      $("#view2").load(siteurl + active_controller + '/modal_Helper/selbrand/' + id_sup);
      $("#ModalView2").modal();
    });
    $(document).on('click', '#addBrand', function(e) {
      $("#ModalView3 .modal-dialog").css('width', '30%');
      $("#head_title3").html("<b>ADD BRAND</b>");
      $("#view3").load(siteurl + 'master_brand/modal_Process/add/');
      $("#ModalView3").modal();
    });
    $(document).on('click', '#addBrandSave', function(e) {
      var formdata = $("#form-brand").serialize();
      $.ajax({
        url: siteurl + active_controller + "saveBrand",
        dataType: "json",
        type: 'POST',
        data: formdata,
        success: function(result) {
          //console.log(result['msg']);
          if (result.status == '1') {
            swal({
              title: "Sukses!",
              text: result['msg'],
              type: "success",
              timer: 1500,
              showConfirmButton: false
            });
            setTimeout(function() {
              if (($("#ModalView3").data('bs.modal') || {}).isShown) {
                $("#ModalView3").modal('hide');
                $("#view3").html('');
              } else {
                $("#ModalView").modal('hide');
                DataTables();
              }
              getBrand();
            }, 1600);
          } else {
            swal({
              title: "Gagal!",
              text: result['msg'],
              type: "error",
              timer: 1500,
              showConfirmButton: false
            });
          };
        },
        error: function(request, error) {
          console.log(arguments);
          alert(" Can't do because: " + error);
        }
      });
      //$("#ModalView").modal('hide');
    });
    $(document).on('click', '#add_ProCat', function(e) {
      $("#ModalView2 .modal-dialog").css('width', '30%');
      $("#head_title2").html("<b>Add Product Category</b>");
      $("#view2").load(siteurl + active_controller + '/modal_Process/ProductCategory/add/');
      $("#ModalView2").modal();
    });
    $(document).on('click', '#addProductCategorySave', function(e) {
      var formdata = $("#form-category").serialize();
      $.ajax({
        url: siteurl + active_controller + "saveProductCategory",
        dataType: "json",
        type: 'POST',
        data: formdata,
        success: function(result) {
          //console.log(result['msg']);
          if (result.status == '1') {
            swal({
              title: "Sukses!",
              text: result['msg'],
              type: "success",
              timer: 1500,
              showConfirmButton: false
            });
            setTimeout(function() {
              if (($("#ModalView2").data('bs.modal') || {}).isShown) {
                $("#ModalView2").modal('hide');
                $("#view2").html('');
                getProCat();
              } else {
                $("#ModalView").modal('hide');
                $("#view").html('');
                DataTables();
              }
              //$('body').addClass('modal-open');
            }, 1600);
          } else {
            swal({
              title: "Gagal!",
              text: result['msg'],
              type: "error",
              timer: 1500,
              showConfirmButton: false
            });
          };
        },
        error: function(request, error) {
          console.log(arguments);
          alert(" Can't do because: " + error);
        }
      });
      //$("#ModalView").modal('hide');
    });
    $(document).on('click', '#add_SupType', function(e) {
      $("#ModalView2 .modal-dialog").css('width', '30%');
      $("#head_title2").html("<b>Add Customer Type</b>");
      $("#view2").load(siteurl + active_controller + '/modal_Process/CustomerType/add/');
      $("#ModalView2").modal();
    });
    $(document).on('click', '#addCustomerTypeSave', function(e) {
      var formdata = $("#form-type").serialize();
      $.ajax({
        url: siteurl + active_controller + "saveCustomerType",
        dataType: "json",
        type: 'POST',
        data: formdata,
        success: function(result) {
          //console.log(result['msg']);
          if (result.status == '1') {
            swal({
              title: "Sukses!",
              text: result['msg'],
              type: "success",
              timer: 1500,
              showConfirmButton: false
            });
            setTimeout(function() {
              //$("#ModalView2").modal('hide');
              DataTables();
              //$('body').removeClass('modal-open');
              if (($("#ModalView2").data('bs.modal') || {}).isShown) {
                $("#ModalView2").modal('hide');
                $("#view2").html('');
                getCustomerType();
              } else {
                $("#ModalView").modal('hide');
                $("#view").html('');
              }
              //call_refresh();
              $('body').addClass('modal-open');
            }, 1600);
          } else {
            swal({
              title: "Gagal!",
              text: result['msg'],
              type: "error",
              timer: 1500,
              showConfirmButton: false
            });
          };
        },
        error: function(request, error) {
          console.log(arguments);
          alert(" Can't do because: " + error);
        }
      });
      //$("#ModalView").modal('hide');
    });
    jQuery(document).on('click', '#addCollectionSave', function() {
      var valid = getValidation();
      //console.log("X");
      if (valid) {
        var formdata = new FormData(document.getElementById("form-collection"));
        // var formdata = $("#form-collection").serialize();
        console.log(formdata);
        $.ajax({
          url: siteurl + active_controller + "saveCollection",
          dataType: "json",
          type: 'POST',
          data: formdata,
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          success: function(result) {
            if (result.status == '1') {
              swal({
                title: "Sukses!",
                text: result['pesan'],
                type: "success",
                timer: 1500,
                showConfirmButton: false
              });
              setTimeout(function() {
                DataTables();
                if (($("#ModalView3").data('bs.modal') || {}).isShown) {
                  $("#ModalView3").modal('hide');
                } else {
                  $("#ModalView").modal('hide');
                }

              }, 1600);
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
          error: function(request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      } else {
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
  jQuery(document).on('keyup keypress blur', '.numberOnly', function() {
    if ((event.which < 48 || event.which > 57) && (event.which < 46 || event.which > 46)) {
      event.preventDefault();
    }
  });

  jQuery(document).on('keyup', '.nominal', function() {
    var val = this.value;
    val = val.replace(/[^0-9\.]/g, '');

    if (val != "") {
      valArr = val.split(',');
      valArr[0] = (parseInt(valArr[0], 10)).toLocaleString();
      val = valArr.join(',');
    }

    this.value = val;
  });

  function DataTables() {
    var dataTable = $('#tableset').DataTable({
      "serverSide": true,
      "stateSave": true,
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
      "aaSorting": [
        [1, "asc"]
      ],
      "columnDefs": [{
        "targets": 'no-sort',
        "orderable": false,
      }],
      "sPaginationType": "simple_numbers",
      "iDisplayLength": 5,
      "aLengthMenu": [
        [5, 10, 20, 50, 100, 150],
        [5, 10, 20, 50, 100, 150]
      ],
      "ajax": {
        url: siteurl + active_controller + 'getDataJSON',
        type: "post",
        data: function(d) {
          d.activation = 'active'
        },
        cache: false,
        error: function() {
          $(".my-grid-error").html("");
          $("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
          $("#my-grid_processing").css("display", "none");
        }
      }
    });
  }

  function add_data() {
    $(".modal-dialog").css('width', '55%');
    $("#head_title").html("<b>Add Collection</b>");

    $("#view").load(siteurl + active_controller + '/modal_Process/Collection/add/');
    $("#ModalView").modal();
  }

  $(document).on('click', '.add_data', function() {
    // alert(newId)
    $.ajax({
      url: siteurl + active_controller + 'modal_Process/Collection/add/',
      success: function(result) {
        $(".modal-dialog").css('width', '55%');
        $("#head_title").html("<b>Add Collection</b>");
        $("#view").html(result);
        $("#ModalView").modal('show');

      }
    })
  })

  function add_CustomerType() {
    $(".modal-dialog").css('width', '30%');
    $("#head_title").html("<b>Add Customer Type</b>");
    $("#view").load(siteurl + active_controller + '/modal_Process/CustomerType/add/');
    $("#ModalView").modal();
  }

  function add_ProductCategory() {
    $(".modal-dialog").css('width', '30%');
    $("#head_title").html("<b>Add Product Category</b>");
    $("#view").load(siteurl + active_controller + '/modal_Process/ProductCategory/add/');
    $("#ModalView").modal();
  }
</script>