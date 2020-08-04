<form class="" action="" method="post" id="form-selBrand">
  <div class="box box-success">
    <div class="box-body" style="">
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
      <br>
      <?php
      echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Add','id'=>'addISOSave')).' ';
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
