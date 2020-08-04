<style>
  .button-list:hover td{
    cursor: pointer;
    border: solid 1px #dfdfdf !important;

  }
  .label_call{
    text-transform: none;
    text-decoration: none !important;
    font-weight: normal;
    text-align: left;
  }
  .label_call:hover{
    text-decoration: underline !important;
    color: #235a81;;
    cursor: pointer;
  }
  .label_call:hover #get_all{
    color: #235a81;;
  }
</style>
<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>">

    <div class="" id="list-data">
        <form id="form-detail-so-pending" method="post">
          <input type="hidden" name="input_edit" id="input_edit2">
        <table id="list_to_add2" class="table table-bordered table-striped table-hover dataTable" style="width:100% !important;color:#000">
        <thead>
            <tr>
              <th class="text-right">
                #
              </th>
              <th>ID Karyawan</th>
			  <th>Nama Karyawan</th>
              <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n=0;
            foreach($karyawan as $key=>$record){
                $no=$n++;
				?>
            <tr class="button-list" onclick="get('<?= $record->id_karyawan?>')" id="got_<?= $record->id_karyawan?>">
              <td class="text-center">
                <input type="checkbox" id="get_<?php echo $record->id_karyawan?>" name="id[]" class="checkbox_opsi" value="<?php echo $record->id_karyawan?>">
                <?php echo $n?>
              </td>
      	      <td><?= $record->id_karyawan ?></td>
			        <td><?= $record->nama_karyawan ?></td>
        			<td>
        				<?php if($record->sts_aktif == 'aktif'){ ?>
        					<label class="label label-success">Aktif</label>
        				<?php }else{ ?>
        					<label class="label label-danger">Non Aktif</label>
        				<?php } ?>
        			</td>
            </tr>
          <?php }?>
        </tbody>
        </table>
        </form>
    </div>

<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
 
<!-- page script -->
<script type="text/javascript">

var oTable = $('#list_to_add2').dataTable();
  function get(id){
    if (document.getElementById('get_'+id).checked == true) {
      $('#get_'+id).prop('checked', false);
    }
    else{
      $('#get_'+id).prop('checked', true);
    }
    var oTable = $('#list_to_add2').dataTable();
    var arr = [];
    var e = oTable.$(".checkbox_opsi:checked", {"page": "all"});
    e.each(function(index,elem,o) {
      arr.push($(elem).val());
    });

    $('#input_edit2').val(arr.join(';'));
	console.log(arr.join(';'));
  }
  

</script>
