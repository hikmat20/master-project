<style>
  .button-list:hover td {
    cursor: pointer;
    /* border: solid 1px #dfdfdf !important; */
    background-color: lightsteelblue
  }

  .label_call {
    text-transform: none;
    text-decoration: none !important;
    font-weight: normal;
    text-align: left;
  }

  .label_call:hover {
    text-decoration: underline !important;
    color: #235a81;
    ;
    cursor: pointer;
  }

  .label_call:hover #get_all {
    color: #235a81;
    ;
  }
</style>
<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>">

<div class="" id="list-data">
  <form id="form-detail-so-pending" method="post">
    <input type="hidden" name="input_edit" id="input_edit">
    <input type="hidden" id="counter" value="<?= $x ?>">
    <input type="hidden" id="type" value="<?= $type ?>">
    <input type="hidden" id="dataType" value="<?= $dataType ?>">
    <input type="hidden" id="prodType" value="<?= $prodType ?>">
    <table id="list_roll" class="table table-bordered table-striped table-hover dataTable" style="width:100% !important;color:#000">
      <thead>
        <tr>
          <th class="text-right">#</th>
          <th>ID Component</th>
          <th>Name Compoenent</th>
          <th>Qty</th>
          <th>UOM</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 0;
        foreach ($data as $key => $record) {
          $no++;
        ?>
          <tr class="button-list" onclick="getId('<?= $record->id_rail_add ?>')" id="got_<?= $record->id_rail_add ?>">
            <td class="text-center">
              <input type="checkbox" id="getId_<?php echo $record->id_rail_add ?>" name="id[]" class="checkbox" value="<?php echo $record->id_rail_add ?>">
              <?php echo $no ?>
            </td>
            <td><?= $record->id_rail_add ?></td>
            <td><?= $record->name_component ?></td>
            <td><?= $record->qty ?></td>
            <td><?= $record->uom ?></td>
            <td><?= $record->price ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </form>
</div>

<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>

<!-- page script -->
<script type="text/javascript">
  var oTable = $('#list_roll').dataTable();

  function getId(id) {
    if (document.getElementById('getId_' + id).checked == true) {
      $('#getId_' + id).prop('checked', false);
    } else {
      $('#getId_' + id).prop('checked', true);
    }
    var oTable = $('#list_roll').dataTable();
    var arr = [];
    var e = oTable.$(".checkbox:checked", {
      "page": "all"
    });
    e.each(function(index, elem, o) {
      arr.push($(elem).val());
    });

    $('#input_edit').val(arr.join(';'));
    console.log(arr.join(';'));
  }
</script>