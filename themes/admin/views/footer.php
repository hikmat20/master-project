</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    <?= isset($idt->nm_perusahaan) ? $idt->nm_perusahaan : 'not-set'; ?> - Page rendered in <strong>{elapsed_time}</strong> seconds
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2019 <a href="<?= site_url(); ?>"><?= isset($idt->nm_perusahaan) ? $idt->nm_perusahaan : 'not-set'; ?></a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<div id="Processing"></div>
<div id="ajaxFailed"></div>
<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.6 -->

<script src="<?= base_url('assets/adminlte/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- bootstrap datetimepicker -->
<script src="<?= base_url('assets/plugins/datetimepicker/bootstrap-datetimepicker.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datetimepicker/moment-with-locales.js'); ?>"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<!-- Multi Select -->
<script src="<?= base_url('assets/plugins/multiselect/multiselect.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist/js/app.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/custome_ddr.js'); ?>" type="text/javascript"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>

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
      // $('.' + id).css('display', 'none');
    }
  });
  $(document).ready(function() {
    jQuery(document).on('click change keyup paste blur', '.form-active .required', function(e) {
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