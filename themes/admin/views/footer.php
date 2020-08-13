</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2019 <a href="<?= site_url(); ?>"><?= isset($idt->nm_perusahaan) ? $idt->nm_perusahaan : 'not-set'; ?></a>.</strong> All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <?= isset($idt->nm_perusahaan) ? $idt->nm_perusahaan : 'not-set'; ?> - Page rendered in <strong>{elapsed_time}</strong> seconds
  </div>
</footer>

<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- </aside> -->
</div>
<!-- ./wrapper -->

<div id="Processing"></div>
<div id="ajaxFailed"></div>
<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 4.5-->

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
<!-- bootstrap datetimepicker -->
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte3/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte3/js/demo.js') ?>"></script>
<!-- custome -->
<script src="<?php echo base_url('assets/style/custome_ddr.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
  $(document).on('click change keyup paste blur', '.required', function(e) {
    //console.log('AHAHAHAHA');
    var val = $(this).val();
    var id = $(this).attr('id');
    if (val == '') {
      //$('.'+id).addClass('hideIt');
      $('#' + id).css('border-color', 'red');
    } else {
      $('#' + id).css('border-color', '');
      $('span[aria-labelledby=select2-' + id + '-container].select2-selection').css('border-color', '');
      // $('.' + id).css('display', 'none');
    }
  });
  $(document).ready(function() {
    jQuery(document).on('click change keyup paste blur', '.required', function(e) {
      //console.log('AHAHAHAHA');
      var val = $(this).val();
      //console.log(val);
      var id = $(this).attr('id');
      //console.log(id);

      var type_form = $(this).data('type_form');
      var node = $(this).prop('nodeName');
      var type = $(this).attr('type');
      var success = true;
      if (node == 'INPUT' && type == 'radio') {
        var c = 0;
        $("input[name='" + $(this).attr('name') + "']").each(function() {
          if ($(this).prop('checked') == true) {
            c++;
          }
        });
        var name = $(this).attr('name');
        var id = $(this).attr('id');
        if (c == 0) {
          $('.' + name).removeClass('hideIt');
          $('.' + name).css('display', 'inline-block');
        } else {
          $('.' + name).addClass('hideIt');
          $('.' + name).css('display', 'none');

        }

      }


      if (val == '' || val == null) {
        $('.' + id).addClass('showIt');
        $('.' + id).removeClass('hideIt');
        //$('.'+id).css('display','inline-block');
      } else {
        $('.' + id).addClass('hideIt');
        $('.' + id).removeClass('showIt');
        //$('.'+id).css('display','none');
      }
    });
    jQuery(document).on('keyup keypress blur paste', '.ucfirst', function() {
      var string = $(this).val();
      $(this).val(string.charAt(0).toUpperCase() + string.slice(1));
    });
    if ('<?= $this->uri->segment(4) ?>' == 'view') {
      $('.label_view').css("display", "block");
      $('.label_input').css("display", "none");
    } else {
      $('.label_view').css("display", "none");
      $('.label_input').css("display", "block");
    }

  });

  function view_selector() {
    //console.log('sa');
    $(' .label_view').css("display", "block");
    $(' .label_input').css("display", "none");
  }

  function input_selector() {
    //console.log('sa');
    $(' .label_view').css("display", "none");
    $(' .label_input').css("display", "block");
  }

  function getValidation() {
    var count = 0;
    var success = true;
    $(".required").each(function() {
      var type_form = $(this).data('type_form');

      var node = $(this).prop('nodeName');
      var type = $(this).attr('type');
      var success = true;
      if (node == 'INPUT' && type == 'radio') {
        var c = 0;
        $("input[name='" + $(this).attr('name') + "']").each(function() {
          if ($(this).prop('checked') == true) {
            c++;
          }
        });
        if (c == 0) {
          var name = $(this).attr('name');
          var id = $(this).attr('id');
          $('.' + name).removeClass('hideIt');
          $('.' + name).css('display', 'inline-block');
          $('html, body, .modal').animate({
            scrollTop: $("form").offset().top
          }, 2000);
          count = count + 1;
        }

      } else if ((node == 'INPUT' && type == 'text') || (node == 'SELECT') || (node == 'TEXTAREA') || (node == 'INPUT' && type == 'date') || (node == 'INPUT' && type == 'file')) {
        if ($(this).val() == null || $(this).val() == '') {
          var name = $(this).attr('name');
          var id = $(this).attr('id');

          // name.replace('[]', '');
          $('.' + id).removeClass('hideIt');
          $('.' + id).css('display', 'inline-block');
          $('#' + id).css('border-color', 'red');
          $('span[aria-labelledby=select2-' + id + '-container].select2-selection').css('border-color', 'red');

          //console.log(name);
          count = count + 1;
        }
      }

    });
    console.log(count);
    if (count == 0) {
      //console.log(success);
      return success;
    } else {
      return false;
    }
  }

  function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
  }
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. Slimscroll is required when using the
fixed layout. -->
</body>

</html>