<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tool_model extends BF_Model
{

    public function resizes_thumb($upload_data)
    {
        $this->load->library('image_lib');
        $config_res['source_image'] = 'uploads/original/' . $this->upload->file_name;
        $config_res['maintain_ratio'] = TRUE;
        $config_res['width'] = 60;
        $config_res['height'] = 60;
        $config_res['create_thumb'] = true;
        $config_res['thumb_marker'] = "_thumb";
        $config_res['new_image'] = "uploads/thumb/";

        $this->image_lib->initialize($config_res);

        $this->image_lib->resize();

        $this->image_lib->clear();
    }
    public function resizes($upload_data)
    {
        $this->load->library('image_lib');
        $config_res['source_image'] = 'uploads/original/' . $this->upload->file_name;
        $config_res['maintain_ratio'] = TRUE;

        $config_res['height'] = 250;
        $config_res['create_thumb'] = true;
        $config_res['thumb_marker'] = "_thumb";
        $config_res['new_image'] = "uploads/post/";

        $this->image_lib->initialize($config_res);

        $this->image_lib->resize();

        $this->image_lib->clear();
    }
}

/* End of file Tool_model.php */
