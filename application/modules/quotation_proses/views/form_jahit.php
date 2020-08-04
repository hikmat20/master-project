<strong>
    <select class="form-control required select2 jahitan" data-id="<?= $no ?>" name="product_curtain[<?= $no ?>][jahitan]" id="jahitan<?= $no ?>">
    <option value=""></option>
        
        <?php
    $curtain = $this->db->get_where('qtt_product_fabric',['id_ruangan'=>$id_ruangan,'jahitan'=>$id_jahitan])->row();
    $jahitan = $this->db->get_where('sewing', ['activation' => 'aktif'])->result();
    
    if ($curtain->jahit == 'yes') {?>
       <?php foreach ($jahitan as $jahit) { ?>
        <option value="<?= $jahit->id_sewing ?>" <?= $curtain->jahitan == $jahit->id_sewing ? 'selected' : '' ?>><?= $jahit->item ?></option>
        <?php }
    } else {
         foreach ($jahitan as $jahit) { ?>
         <option value="<?= $jahit->id_sewing ?>"><?= $jahit->item ?></option>
        <?php }
    }
        ?>
    </select>
    <input type="text" style="margin-top:5px" value="<?= number_format($curtain->hrg_jahitan) ?>" readonly class="form-control text-right" placeholder="0" name="product_curtain[<?= $no ?>][hrg_jahitan]" id="hrg_jahitan<?= $no ?>">
</strong>