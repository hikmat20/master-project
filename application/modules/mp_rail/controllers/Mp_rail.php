<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

/*
 * @author Ichsan
 * @copyright Copyright (c) 2019, Ichsan
 *
 * This is controller for Master Rail
 */

class Mp_rail extends Admin_Controller
{
  //Permission
  protected $viewPermission = 'Mp_rail.View';
  protected $addPermission  = 'Mp_rail.Add';
  protected $managePermission = 'Mp_rail.Manage';
  protected $deletePermission = 'Mp_rail.Delete';

  public function __construct()
  {
    parent::__construct();

    $this->load->library(array('Mpdf', 'upload', 'Image_lib'));
    $this->load->model(array(
      'Mp_rail/Mp_rail_model',
      'Aktifitas/aktifitas_model',
    ));
    $this->template->title('Manage Rail Data');
    $this->template->page_icon('fa fa-table');

    date_default_timezone_set('Asia/Bangkok');
  }

  public function index()
  {
    $this->auth->restrict($this->viewPermission);
    $this->template->title('Rail');
    $this->template->render('index');
  }

  public function getDataJSON()
  {
    $requestData  = $_REQUEST;
    $fetch      = $this->queryDataJSON(
      $requestData['activation'],
      $requestData['search']['value'],
      $requestData['order'][0]['column'],
      $requestData['order'][0]['dir'],
      $requestData['start'],
      $requestData['length']
    );
    $totalData    = $fetch['totalData'];
    $totalFiltered  = $fetch['totalFiltered'];
    $query      = $fetch['query'];

    $data  = array();
    $urut1  = 1;
    $urut2  = 0;
    foreach ($query->result_array() as $row) {
      $total_data     = $totalData;
      $start_dari     = $requestData['start'];
      $asc_desc       = $requestData['order'][0]['dir'];
      if ($asc_desc == 'asc') {
        $nomor = $urut1 + $start_dari;
      }
      if ($asc_desc == 'desc') {
        $nomor = ($total_data - $start_dari) - $urut2;
      }

      $nestedData   = array();
      $detail = "";
      $nestedData[]  = "<div align='center'>" . $nomor . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_product']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_original']) . "</div>";
      $nestedData[]  = "<div align='center'>" . strtoupper($row['rail_type']) . "</div>";
      $nestedData[]  = "<div align='center'>" . strtoupper($row['nm_supplier_office']) . "</div>";
      $nestedData[]  = "<div align='center'>" . strtoupper($row['status_wh']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>
              <a class='btn btn-sm btn-success edit' href='javascript:void(0)' title='Edit' data-id_product='" . $row['id_rail'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='btn btn-sm btn-danger delete' href='javascript:void(0)' title='Delete' data-id_product = '" . $row['id_rail'] . "'  style='width:30px; display:inline-block'>
                <i class='fa fa-trash'></i>
              </a>
              </div>
      		      ";
      endif;
      $data[] = $nestedData;
      $urut1++;
      $urut2++;
    }

    $json_data = array(
      "draw"              => intval($requestData['draw']),
      "recordsTotal"      => intval($totalData),
      "recordsFiltered"   => intval($totalFiltered),
      "data"              => $data
    );

    echo json_encode($json_data);
  }

  public function queryDataJSON($activation, $like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
  {
    // echo $series."<br>";
    // echo $group."<br>";
    // echo $komponen."<br>";

    $where_activation = "";
    if (!empty($activation)) {
      $where_activation = " AND a.activation = '" . $activation . "' ";
    }

    // LEFT JOIN master_pattern_type c ON c.id_pattern_type = a.id_pattern_type
    $sql = "
  			SELECT
  				a.*, b.nm_supplier_office
  			FROM
  				mp_rail a
  				LEFT JOIN master_supplier b ON b.id_supplier = a.id_supplier
  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.id_rail LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR b.nm_supplier_office LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.name_product LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.name_original LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.rail_type LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.status_wh LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_rail',
      2 => 'nm_supplier_office',
      3 => 'name_product',
      4 => 'name_original',
      5 => 'status_wh',
      6 => 'rail_type'
    );

    $sql .= " ORDER BY a.id_rail ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }

  public function getID()
  {
    $id_sup        = $this->input->post('id');
    $get          = $this->db->query('SELECT MAX(substr(id_rail,6,3)) as id_rail  FROM mp_rail WHERE id_supplier = "' . $id_sup . '" ORDER BY id_rail DESC LIMIT 1')->row();
    if ($get->id_rail == '') {
      $new_id = '001';
    } else {
      $urut = $get->id_rail + 1;
      $new_id = str_pad($urut, 3, "0", STR_PAD_LEFT);
    }

    $Arr_Kembali  = array(
      'id'    => $new_id
    );
    echo json_encode($Arr_Kembali);
  }

  public function getUom()
  {
    $id     = $this->input->post('id');

    $query = "Select * FROM master_component WHERE id ='" . $id . "'";
    $getTable = $this->db->query($query)->result_array();

    $Arr_Kembali  = array(
      'component'    => $getTable
    );
    echo json_encode($Arr_Kembali);
  }

  public function getOpt()
  {
    $id_selected     = ($this->input->post('id_selected')) ? $this->input->post('id_selected') : '';
    $column          = ($this->input->post('column')) ? $this->input->post('column') : '';
    $column_fill     = ($this->input->post('column_fill')) ? $this->input->post('column_fill') : '';
    $idkey           = ($this->input->post('key')) ? $this->input->post('key') : '';
    $column_name     = ($this->input->post('column_name')) ? $this->input->post('column_name') : '';
    $table_name      = ($this->input->post('table_name')) ? $this->input->post('table_name') : '';
    $act             = ($this->input->post('act')) ? $this->input->post('act') : '';

    $where_col = $column . " = '" . $column_fill . "'";
    $queryTable = "Select * FROM $table_name WHERE activation = 'active'";
    if (!empty($column_fill)) {
      $queryTable .= " AND " . $where_col;
    }
    $getTable = $this->db->query($queryTable)->result_array();
    if ($act == 'free') {
      //echo count($getTable);
      //exit;
      if (count($getTable) == 0) {
        $queryTable = "Select * FROM $table_name WHERE 1=1 AND " . $column . " IS NULL OR " . $column . " = ''";
        $getTable = $this->db->query($queryTable)->result_array();
      }
      //echo count($getTable);
      //exit;
    }
    $html = '<option value="">Choose An Option</option>';
    if ($id_selected == 'multiple') {
      $html = '';
    }
    foreach ($getTable as $key => $vc) {
      $id_key = $vc[$idkey]; //${'vc'.$key};
      $name = $vc[$column_name]; //${'vc'.$column_name};
      if (!empty($id_selected)) {
        if ($id_key == $id_selected) {
          $active = 'selected';
        } else {
          $active = '';
        }
      }
      $html .= '<option value="' . $id_key . '" ' . $active . '>' . $name . '</option>';
    }
    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
  }

  public function getVal()
  {
    $id_selected     = ($this->input->post('id_selected')) ? $this->input->post('id_selected') : '';
    $column          = ($this->input->post('column')) ? $this->input->post('column') : '';
    $column_fill     = ($this->input->post('column_fill')) ? $this->input->post('column_fill') : '';
    $idkey           = ($this->input->post('key')) ? $this->input->post('key') : '';
    $column_name     = ($this->input->post('column_name')) ? $this->input->post('column_name') : '';
    $table_name      = ($this->input->post('table_name')) ? $this->input->post('table_name') : '';
    $act             = ($this->input->post('act')) ? $this->input->post('act') : '';

    $where_col = $column . " = '" . $column_fill . "'";
    $queryTable = "Select * FROM $table_name WHERE $idkey = '$id_selected' ";
    $getTable = $this->db->query($queryTable)->result_array();
    //echo $queryTable;
    //exit;
    $html = $getTable[0][$column];

    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
  }

  public function modal_Process($page = "", $action = "", $id = "")
  {
    $this->template->set('action', $action);
    $this->template->set('id', $id);
    if ($page == 'Rail') {
      $this->template->render('modal_Process_Rail');
    }
  }

  public function saveRail()
  {
    $data                 = $this->input->post();

    $type                     = $data['type'];
    $id_rail                  = $data['id_rail'];
    $id_supplier              = $data['id_supplier'];
    $name_product             = $data['name_product'];
    $name_original            = $data['name_original'];
    $activation               = $data['activation'];
    $warranty                 = $data['warranty'];
    $warranty_time            = $data['warranty_time'];
    $max_width                = $data['max_width'];
    $max_height               = $data['max_height'];
    $max_weight               = $data['max_weight'];
    $bc_buying_price          = str_replace(",", "", $data['bc_buying_price']);
    $bc_selling_price         = str_replace(",", "", $data['bc_selling_price']);
    $act_selling_price        = str_replace(",", "", $data['act_selling_price']);
    $rail_type                = $data['rail_type'];
    $id_uom                   = $data['id_uom'];
    $moq                      = $data['moq'];
    $system                   = $data['system'];
    $leadtime                 = $data['leadtime'];
    $status_wh                 = $data['status_wh'];
    $tech_person              = $data['tech_person'];
    $remark                    = $data['remark'];
    $filelama                 = $data['filelama'];

    $nm_color                 = $data['nm_color'];
    $img_color_old            = $data['img_color_old'];


    $id_component             = $data['id_component'];
    $qty_bc                   = $data['qty_bc'];
    $bc_uom                   = $data['bc_uom'];
    // $price_bc                 = $data['price_bc'];

    $id_Addcomponent          = $data['id_Addcomponent'];
    $qty_ac                   = $data['qty_ac'];
    $uom_ac                   = $data['uom_ac'];
    $buying_price_ac             = str_replace(",", "", $data['buying_price_ac']);
    $selling_price_ac            = str_replace(",", "", $data['selling_price_ac']);
    $note                 = $data['note_ac'];

    ##UPLOAD

    $path           =   './assets/img/master_rail/'; //path folder

    $config = array(
      'upload_path' => './assets/img/master_rail/',
      'allowed_types' => 'gif|jpg|png|jpeg|JPG|PNG',
      'file_name' => 'photo_' . $id_rail,
      'file_ext_tolower' => TRUE,
      'overwrite' => TRUE,
      'max_size' => 2048,
      //'max_width' => 1024,
      //'max_height' => 768,
      //'min_width' => 10,
      //'min_height' => 7,
      //'max_filename' => 0,
      'remove_spaces' => TRUE
    );

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('product_photo')) {
      $result = $this->upload->display_errors();
    } else {

      $data_foto  = array('upload_data' => $this->upload->data('product_photo'));
      $ext = end((explode(".", $_FILES['product_photo']['name'])));
      $name_pic = 'photo_' . $id_rail . "." . $ext;
      $paths = $_SERVER['DOCUMENT_ROOT'] . 'assets/img/master_rail/' . $name_pic;
      if (file_exists($paths)) {
        unlink($paths);
      }
    }

    if (!empty($nm_color)) {
      for ($i = 0; $i < count($nm_color); $i++) {
        $_FILES['colour_photo']['name'][$i];
        $_FILES['colour_photo']['type'][$i];
        $_FILES['colour_photo']['tmp_name'][$i];
        $_FILES['colour_photo']['error'][$i];
        $_FILES['colour_photo']['size'][$i];
        $config = array(
          'upload_path' => './assets/img/master_rail/color/',
          'allowed_types' => 'gif|jpg|png|jpeg|JPG|PNG',
          'file_name' => 'color_' . $id_rail . "-C" . str_pad($i + 1, 2, "0", STR_PAD_LEFT),
          'file_ext_tolower' => TRUE,
          'overwrite' => TRUE,
          'max_size' => 2048,
          'remove_spaces' => TRUE
        );

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('colour_photo[$i]')) {
          $result = $this->upload->display_errors();
        }

        $data_foto  = array('upload_data' => $this->upload->data('colour_photo'));
        $ext = end((explode(".", $_FILES['colour_photo']['name'][$i])));
        $name_color = 'color_' . $id_rail . "-C" . str_pad($i + 1, 2, "0", STR_PAD_LEFT) . "." . $ext;

        $dataColor[$i]['id_colour']      = $id_rail . "-C" . str_pad($i + 1, 2, "0", STR_PAD_LEFT);
        $dataColor[$i]['id_rail']       = $id_rail;
        $dataColor[$i]['name_colour']      = $nm_color[$i];
        $dataColor[$i]['activation']      = 'active';

        $dataColor[$i]['img_colour']     = $name_color;

        if ($data['type'] == 'edit') {
          $dataColor[$i]['modified_on']     = date('Y-m-d H:i:s');
          $dataColor[$i]['modified_by']     = $this->auth->user_id();
        } else {
          $dataColor[$i]['created_on']     = date('Y-m-d H:i:s');
          $dataColor[$i]['created_by']     = $this->auth->user_id();
        }
      }
    }

    if (!empty($id_component)) {
      for ($i = 0; $i < count($id_component); $i++) {

        // $dataComp[$i]['id_rail_basic'] = $id_component[$i];
        $dataComp[$i]['id_rail_basic']      = $id_rail . "-C" . str_pad($i + 1, 2, "0", STR_PAD_LEFT);
        $dataComp[$i]['id_rail'] = $id_rail;
        $dataComp[$i]['qty'] = $qty_bc[$i];
        $dataComp[$i]['uom'] = $bc_uom[$i];
        $dataComp[$i]['id_component'] = $id_component[$i];
        // $dataComp[$i]['price'] = $price_bc[$i];
        $dataComp[$i]['activation'] = 'active';

        if ($type == "edit") {
          $dataComp[$i]['modified_on'] = date('Y-m-d H:i:s');
          $dataComp[$i]['modified_by'] = $this->auth->user_id();
        } else {
          $dataComp[$i]['created_on'] = date('Y-m-d H:i:s');
          $dataComp[$i]['created_by'] = $this->auth->user_id();
        }
      }
    }

    if (!empty($id_Addcomponent)) {
      for ($i = 0; $i < count($id_Addcomponent); $i++) {

        // $dataComp[$i]['id_rail_basic'] = $id_component[$i];
        $dataAddComp[$i]['id_rail_add']      = $id_rail . "-CA" . str_pad($i + 1, 2, "0", STR_PAD_LEFT);
        $dataAddComp[$i]['id_rail'] = $id_rail;
        $dataAddComp[$i]['qty'] = $qty_ac[$i];
        $dataAddComp[$i]['uom'] = $uom_ac[$i];
        $dataAddComp[$i]['buying_price'] = $buying_price_ac[$i];
        $dataAddComp[$i]['selling_price'] = $selling_price_ac[$i];
        $dataAddComp[$i]['note'] = $note[$i];
        $dataAddComp[$i]['id_component'] = $id_Addcomponent[$i];
        $dataAddComp[$i]['activation'] = 'active';

        if ($type == "edit") {
          $dataAddComp[$i]['modified_on'] = date('Y-m-d H:i:s');
          $dataAddComp[$i]['modified_by'] = $this->auth->user_id();
        } else {
          $dataAddComp[$i]['created_on'] = date('Y-m-d H:i:s');
          $dataAddComp[$i]['created_by'] = $this->auth->user_id();
        }
      }
    }



    // echo "<pre>";
    // print_r($data);
    // echo "</pre>"; 
    // exit;
    ##END UPLOAD

    //DATA INSERT
    $insertData = array(
      'type'               => $type,
      'id_supplier'        => $id_supplier,
      'name_product'       => $name_product,
      'name_original'      => $name_original,
      'activation'         => $activation,
      'warranty'           => $warranty,
      'warranty_time'      => $warranty_time,
      'max_width'          => $max_width,
      'max_height'         => $max_height,
      'max_weight'         => $max_weight,
      'bc_buying_price'    => $bc_buying_price,
      'bc_selling_price'   => $bc_selling_price,
      'act_selling_price'   => $act_selling_price,
      // 'ac_buying_price'    => $ac_buying_price,
      // 'ac_selling_price'   => $ac_selling_price,
      'rail_type'          => $rail_type,
      'id_uom'             => $id_uom,
      'moq'                => $moq,
      'system'             => $system,
      // 'leadtime'           => $leadtime,
      'status_wh'          => $status_wh,
      // 'tech_person'        => $tech_person,
      'remark'             => $remark,
      'filelama'           => $name_pic,

    );

    $this->db->trans_begin();

    //FABRIC DATA
    if ($data['type'] == 'edit') {
      $insertData['modified_on']  = date('Y-m-d H:i:s');
      $insertData['modified_by']  = $this->auth->user_id();

      $this->db->where('id_rail',  $id_rail)->update('mp_rail', $insertData);
      $this->db->where('id_rail', $data['id_rail'])->delete('mp_rail_colour');
      $this->db->where('id_rail', $data['id_rail'])->delete('mp_rail_additional');
      $this->db->where('id_rail', $data['id_rail'])->delete('mp_rail_basic');

      if (!empty($id_Addcomponent)) {
        $this->db->insert_batch('mp_rail_additional', $dataAddComp);
      }
      if (!empty($id_component)) {
        $this->db->insert_batch('mp_rail_basic', $dataComp);
      }
      if (!empty($nm_color)) {
        $this->db->insert_batch('mp_rail_colour', $dataColor);
      }
    } else {
      $insertData['id_rail']  = $id_rail;
      $insertData['created_on']  = date('Y-m-d H:i:s');
      $insertData['created_by']  = $this->auth->user_id();
      $this->db->insert('mp_rail', $insertData);

      if (!empty($id_Addcomponent)) {
        $this->db->insert_batch('mp_rail_additional', $dataAddComp);
      }
      if (!empty($id_component)) {
        $this->db->insert_batch('mp_rail_basic', $dataComp);
      }
      if (!empty($nm_color)) {
        $this->db->insert_batch('mp_rail_colour', $dataColor);
      }
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, ' . $data['type'] . ' Rail Data ' . $id_rail . ' With Name ' . $name_original;
      $status = 0;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    } else {
      $this->db->trans_commit();
      $Arr_Kembali  = array(
        'pesan'    => 'Success Save Item. Thanks ...',
        'status'  => 1
      );

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Rail Data ' . $id_rail . ' With Name ' . $name_original;
      $status = 1;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }
    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    echo json_encode($Arr_Kembali);
  }

  public function deleteData()
  {
    $id_product        = $this->input->post('id_rail');
    $this->db->trans_begin();
    $getCat   = $this->db->where('id_rail', $id_product)->update('mp_rail', array('activation' => 'nonaktif'));
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'msg'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, Delete Customer Data ' . $id_product;
      $status = 0;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    } else {
      $this->db->trans_commit();
      $Arr_Kembali  = array(
        'msg'    => 'Success Delete Item. Thanks ...',
        'status'  => 1
      );

      $keterangan = 'SUCCESS, Delete Customer Data ' . $id_product;
      $status = 1;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }
    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    echo json_encode($Arr_Kembali);
  }

  public function saveColour()
  {
    $data                     = $this->input->post();
    $type                     = $data['type'];

    //IDENTITY
    $id_colour      = $data['id_colour'];
    $name_colour    = $data['name_colour'];
    $activation         = 'active';

    $this->db->trans_begin();

    //COLLECTION DATA
    if ($data['type'] == 'edit') {

      $insertData  = array(
        'name_colour'   =>  $name_colour,
        'modified_on'        =>  date('Y-m-d H:i:s'),
        'modified_by'        =>  $this->auth->user_id()
      );
      $this->db->where('id_colour', $data['id_colour'])->update('master_colour', $insertData);
    } else {
      $numID = $this->db->get_where('master_colour', array('id_colour' => $id_colour))->num_rows();
      if ($numID > 0) {
        $getI   = $this->db->query("SELECT MAX(id_colour) FROM master_colour ORDER BY id_colour DESC LIMIT 1")->row();
        //echo "$first_letter";
        //exit;
        $num = substr($getI->id_colour, -5) + 1;
        $id_customer = 'CS' . str_pad($num, 5, "0", STR_PAD_LEFT);
      }

      $insertData  = array(
        'id_colour'           =>  $id_colour,
        'name_colour'         =>  $name_colour,
        'activation'               =>  $activation,
        'created_on'            =>  date('Y-m-d H:i:s'),
        'created_by'            =>  $this->auth->user_id()
      );
      $this->db->insert('master_colour', $insertData);
    }
    //echo implode("<br />", $data);
    //echo implode("<br />", $dataPIC);
    //echo implode("<br />", $dataBANK);
    //echo implode("<br />", $insertData);
    //exit;
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, ' . $data['type'] . ' Customer Data ' . $id_colour . ' With Name ' . $name_colour;
      $status = 0;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    } else {
      $this->db->trans_commit();
      $Arr_Kembali  = array(
        'pesan'    => 'Success Save Item. Thanks ...',
        'status'  => 1
      );

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Brand Data ' . $id_colour . ' With Name ' . $name_colour;
      $status = 1;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }
    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    echo json_encode($Arr_Kembali);
  }

  public function print_request($id)
  {
    $id_supplier = $id;
    $mpdf = new mPDF('', '', '', '', '', '', '', '', '', '');
    $mpdf->SetImportUse();
    $mpdf->RestartDocTemplate();

    $sup_data = $this->Supplier_model->print_data_supplier($id_supplier);

    $this->template->set('sup_data', $sup_data);
    $show = $this->template->load_view('print_data', $data);

    $this->mpdf->AddPage('P');
    $this->mpdf->WriteHTML($show);
    $this->mpdf->Output();
  }

  public function print_rekap()
  {
    $mpdf = new mPDF('', '', '', '', '', '', '', '', '', '');
    $mpdf->SetImportUse();
    $mpdf->RestartDocTemplate();

    $rekap = $this->Supplier_model->rekap_data()->result_array();

    $this->template->set('rekap', $rekap);

    $show = $this->template->load_view('print_rekap', $data);

    $this->mpdf->AddPage('L');
    $this->mpdf->WriteHTML($show);
    $this->mpdf->Output();
  }

  public function downloadExcel()
  {
    $rekap = $this->Supplier_model->rekap_data()->result_array();

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(17);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(17);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(17);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(17);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(17);

    $objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle(2)->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle(3)->getFont()->setBold(true);

    $header = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      ),
      'font' => array(
        'bold' => true,
        'color' => array('rgb' => '000000'),
        'name' => 'Verdana',
      ),
    );
    $objPHPExcel->getActiveSheet()->getStyle('A1:J2')
      ->applyFromArray($header)
      ->getFont()->setSize(14);
    $objPHPExcel->getActiveSheet()->mergeCells('A1:J2');
    $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValue('A1', 'Rekap Data Supplier')
      ->setCellValue('A3', 'No.')
      ->setCellValue('B3', 'ID Supplier')
      ->setCellValue('C3', 'Nama Supplier')
      ->setCellValue('D3', 'Negara')
      ->setCellValue('E3', 'Alamat')
      ->setCellValue('F3', 'No Telpon /  Fax')
      ->setCellValue('G3', 'Kontak Person')
      ->setCellValue('H3', 'Hp Kontak Person / WeChat ID')
      ->setCellValue('I3', 'Email')
      ->setCellValue('J3', 'Status');

    $ex = $objPHPExcel->setActiveSheetIndex(0);
    $no = 1;
    $counter = 4;
    foreach ($rekap as $row) :
      $ex->setCellValue('A' . $counter, $no++);
      $ex->setCellValue('B' . $counter, strtoupper($row['id_supplier']));
      $ex->setCellValue('C' . $counter, $row['nm_supplier']);
      $ex->setCellValue('D' . $counter, strtoupper($row['nm_negara']));
      $ex->setCellValue('E' . $counter, $row['alamat']);
      $ex->setCellValue('F' . $counter, $row['telpon'] . ' / ' . $row['fax']);
      $ex->setCellValue('G' . $counter, $row['cp']);
      $ex->setCellValue('H' . $counter, $row['hp_cp'] . ' / ' . $row['id_webchat']);
      $ex->setCellValue('I' . $counter, $row['email']);
      $ex->setCellValue('J' . $counter, $row['sts_aktif']);

      $counter = $counter + 1;
    endforeach;

    $objPHPExcel->getProperties()->setCreator('Yunaz Fandy')
      ->setLastModifiedBy('Yunaz Fandy')
      ->setTitle('Export Rekap Data Supplier')
      ->setSubject('Export Rekap Data Supplier')
      ->setDescription('Rekap Data Supplier for Office 2007 XLSX, generated by PHPExcel.')
      ->setKeywords('office 2007 openxml php')
      ->setCategory('PHPExcel');
    $objPHPExcel->getActiveSheet()->setTitle('Rekap Data Supplier');
    ob_end_clean();
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
    header('Chace-Control: no-store, no-cache, must-revalation');
    header('Chace-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="ExportRekapSupplier' . date('Ymd') . '.xls"');

    $objWriter->save('php://output');
  }

  public function getRefreshBrand()
  {
    $id        = $this->input->post('id');
    $idb        = $this->input->post('idb');
    //echo "$idb";
    //exit;
    if (!empty($id)) {
      $getS   = $this->db->get_where('master_supplier', array('id_supplier' => $id))->row();
    }
    $arrB   = explode(";", $idb);
    $getB    = $this->db->get('master_product_brand')->result();
    $html = '';
    $checked = '';
    //print_r($arrB);
    //exit;
    foreach ($getB as $key => $vb) :
      if (isset($arrB)) {
        if (in_array($vb->id_brand, $arrB)) :
          $checked = 'checked';
        else :
          $checked = '';
        endif;
      }
      $html .= '
        <tr>
          <td>
            <input type="checkbox" name="brand[]" value="' . $vb->id_brand . '" style="display:inline-block" ' . $checked . ' > ' . $vb->id_brand . '
          </td>
          <td>
            ' . $vb->name_brand . '
          </td>
        </tr>';
    endforeach;
    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
  }
}
