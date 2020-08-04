<div class="col-md-6">
    <div class="form-group">
        <label class="control-label col-sm-3">Item</label>
        <div class="col-md-7">
            <strong>
                <select class="form-control required select2 jahitan-vitrage" data-id="<?= $no ?>" name="product_vitrage[<?= $no ?>][jahitan]" id="jahitan<?= $no ?>">
                    <option value=""></option>
                    <?php
                    if ($vitrage->jahit == 'yes') { ?>
                        <?php foreach ($jahitan as $jahit) { ?>
                            <option value="<?= $jahit->id_sewing ?>" <?= $vitrage->jahitan == $jahit->id_sewing ? 'selected' : '' ?>><?= $jahit->item ?></option>
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
                <input type="text" style="margin-top:5px" value="<?= number_format($vitrage->hrg_jahitan) ?>" readonly class="form-control text-right" placeholder="0" name="product_vitrage[<?= $no ?>][hrg_jahitan]" id="hrg_jahitan-vitrage<?= $no ?>">
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
                    <input type="number" data-id="<?= $no ?>" value="<?= number_format($vitrage->disc_jahitan) ?>" class="form-control text-right disc_jahitan-vitrage" placeholder="0" name="product_vitrage[<?= $no ?>][disc_jahitan]" id="disc_jahitan-vitrage<?= $no ?>">
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
                    <input type="hidden" data-id="<?= $no ?>" value="<?= number_format($vitrage->val_disc_jahit) ?>" readonly class="form-control text-right" placeholder="0" name="product_vitrage[<?= $no ?>][val_disc_jahit]" id="val_disc_jahit-vitrage<?= $no ?>">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" data-id="<?= $no ?>" value="<?= number_format($vitrage->t_hrg_jahitan) ?>" readonly class="form-control text-right" placeholder="0" name="product_vitrage[<?= $no ?>][t_hrg_jahitan]" id="t_hrg_jahitan-vitrage<?= $no ?>">

                </div>
            </strong>
        </div>
    </div>
</div>



<script>
    $(document).on('change', '.disc_jahitan-vitrage', function() {
        let no = $(this).data('id');
        disc_jahit_vitrage(no);
    })

    function disc_jahit_vitrage(no) {
        console.log(no)
        let hrg_jahitan = $('#hrg_jahitan-vitrage' + no).val().replace(/,/g, '') || 0;
        let disc_jahitan = $('#disc_jahitan-vitrage' + no).val() || 0;
        // console.log(hrg_jahitan)
        val_disc_jahit = parseInt(hrg_jahitan) * parseInt(disc_jahitan) / 100;
        t_hrg_jahitan = hrg_jahitan - val_disc_jahit;
        $('#val_disc_jahit-vitrage' + no).val(val_disc_jahit)
        $('#t_hrg_jahitan-vitrage' + no).val(('' + t_hrg_jahitan).replace(/\B(?=(?:\d{3})+(?!\d))/g, ','))
    }
</script>