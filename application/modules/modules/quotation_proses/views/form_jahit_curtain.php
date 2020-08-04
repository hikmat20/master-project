<div class="col-md-6">
    <div class="form-group">
        <label class="control-label col-sm-3">Item</label>
        <div class="col-md-7">
            <strong>
                <select class="form-control required select2 jahitan" data-id="<?= $no ?>" name="product_curtain[<?= $no ?>][jahitan]" id="jahitan<?= $no ?>">
                    <option value=""></option>
                    <?php
                    $curtain = $this->db->get_where('qtt_product_fabric', ['id_ruangan' => $id_ruangan, 'jahitan' => $id_jahitan])->row();
                    $jahitan = $this->db->get_where('sewing', ['activation' => 'aktif'])->result();

                    if ($curtain->jahit == 'yes') { ?>
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
            </strong>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3">Harga</label>
        <div class="col-md-7">
            <strong>
                <input type="text" style="margin-top:5px" data-id="<?= $no ?>" value="<?= number_format($curtain->hrg_jahitan) ?>" readonly class="form-control text-right" placeholder="0" name="product_curtain[<?= $no ?>][hrg_jahitan]" id="hrg_jahitan<?= $no ?>">
            </strong>
        </div>
    </div>

</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="control-label col-sm-3">Diskon Jahitan</label>
        <div class="col-md-7">
            <strong>
                <div class="input-group">
                    <input type="number" data-id="<?= $no ?>" value="<?= number_format($curtain->disc_jahitan) ?>" class="form-control text-right disc_jahitan" placeholder="0" name="product_curtain[<?= $no ?>][disc_jahitan]" id="disc_jahitan<?= $no ?>">
                    <span class="input-group-addon">%</span>
                </div>
            </strong>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3">Total</label>
        <div class="col-md-7">
            <strong>
                <div class="input-group">
                    <input type="hidden" data-id="<?= $no ?>" value="<?= number_format($curtain->val_disc_jahit) ?>" readonly class="form-control text-right" placeholder="0" name="product_curtain[<?= $no ?>][val_disc_jahit]" id="val_disc_jahit<?= $no ?>">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" data-id="<?= $no ?>" value="<?= number_format($curtain->t_hrg_jahitan) ?>" readonly class="form-control text-right" placeholder="0" name="product_curtain[<?= $no ?>][t_hrg_jahitan]" id="t_hrg_jahitan<?= $no ?>">

                </div>
            </strong>
        </div>
    </div>
</div>


<script>
    $(document).on('change', '.disc_jahitan', function() {
        let no = $(this).data('id');
        disc_jahitan_curtain(no);
    })

    function disc_jahitan_curtain(no) {
        let hrg_jahitan = $('#hrg_jahitan' + no).val().replace(/,/g, '') || 0;
        let disc_jahitan = $('#disc_jahitan' + no).val() || 0;
        // console.log(hrg_jahitan)
        val_disc_jahit = parseInt(hrg_jahitan) * parseInt(disc_jahitan) / 100;
        t_hrg_jahitan = hrg_jahitan - val_disc_jahit;
        $('#val_disc_jahit' + no).val(val_disc_jahit)
        $('#t_hrg_jahitan' + no).val(('' + t_hrg_jahitan).replace(/\B(?=(?:\d{3})+(?!\d))/g, ','))
    }
</script>