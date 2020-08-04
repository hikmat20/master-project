<?php
$getC             = $this->db->get_where('master_product_ci',array('activation'=>'active'))->result();
?>
<form class="" action="" method="post" id="form-selBrand">
  <div class="box box-success">
    <div class="box-body" style="">
      <div class="container-fluid" style="border:solid 1px #ddd">
        <div class="row">
          <?php $n=0; foreach ($getC as $key => $vs): $n++;?>
            <div class="col-md-4 col-lg-3 col-sm-6" style="border:solid 1px #ddd">
              <div class="row">
                <div class="col-sm-12">
                  <img src="<?=base_url('assets/img/care_instruction/'.$vs->image_ci)?>" alt="" width="100%" height="100%" for="ci_<?=$n?>">
                </div>
              </div>
              <div class="row" style="height:130px">
                <div class="col-sm-12 checkbox">
                  <label for="ci_<?=$n?>">
                    <input type="checkbox" class="ci_check cek_<?=$vs->id_ci?>" name="ci" id="ci_<?=$n?>" value="<?=$vs->id_ci?>">
                    <span class="ci_<?=$n?>"><?=$vs->name_ci?></span>

                  </label>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
        </div>
      </div>

      <!--
        <table id="my-grid" class="table table-striped table-bordered table-hover table-condensed" width="100%">
          <thead>
            <tr>
              <th>ISO</th>
            </tr>
          </thead>
          <tbody id="tableselBrand_tbody">
            <tr>
              <th>
                <input type="hidden" name="target" id="target" value="<?=$id?>">
                <input type="text" name="iso" id="iso" value="" class="form-control input-sm">
              </th>
            </tr>
          </tbody>
        </table>
      -->
      <br>
      <?php
      //echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Add','id'=>'addCitoTable')).' ';
      ?>
    </div>
  </div>
</form>


<style>
	.inSp{
		text-align: center;
		display: inline-block;
		width: 100px;
	}
	.inSp2{
		text-align: center;
		display: inline-block;
		width: 45%;
	}
	.inSpL{
		text-align: left;
	}
	.vMid{
		vertical-align: middle !important;
	}

</style>

<script type="text/javascript">

	$(document).ready(function(){
    var ci_val = $('#ci_val').val();
    var arr = ci_val.split(",");
    //console.log(arr);
    for (var i = 0; i < arr.length; i++) {
      $('.cek_'+arr[i]).prop('checked',true);
    }
    $(document).on('click', '.ci_check', function() {
      var val = [];
      var show = [];
      $("input:checkbox[name=ci]:checked").each(function(){
        var id = $(this).attr('id');
          val.push($(this).val());
          show.push('<li>'+$('.'+id).text()+'</li>');
      });
      var x = val.toString();
      var y = show.join('<br>');
      var arr_y = y.split(',');
      //var list =
      $('#ci_val').val(x);
      $('#ci_show').val(y);
      $('.ci_list').html(y);

      //console.log($('#ci_val').val());
    })
	});



	$(".numberOnly").on("keypress keyup blur",function (event) {
		if ((event.which < 48 || event.which > 57 ) && (event.which < 46 || event.which > 46 )) {
			event.preventDefault();
		}
	});

	function getNum(val) {
	   if (isNaN(val) || val == '') {
		 return 0;
	   }
	   return parseFloat(val);
	}

  function numfor(nmbr, n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
      num = nmbr.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
  };

</script>
