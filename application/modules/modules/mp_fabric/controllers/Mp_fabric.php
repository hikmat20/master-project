<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

/*
 * @author Ichsan
 * @copyright Copyright (c) 2019, Ichsan
 * 
 * This is controller for Master Supplier
 */

class Mp_fabric extends Admin_Controller
{
  //Permission
  protected $viewPermission = 'Mp_fabric.View';
  protected $addPermission  = 'Mp_fabric.Add';
  protected $managePermission = 'Mp_fabric.Manage';
  protected $deletePermission = 'Mp_fabric.Delete';

  public function __construct()
  {
    parent::__construct();

    $this->load->library(array('Mpdf', 'upload', 'Image_lib'));
    $this->load->model(array(
      'Mp_fabric/Mp_fabric_model',
      'Aktifitas/aktifitas_model',
    ));
    $this->template->title('Manage Fabric Data');
    $this->template->page_icon('fa fa-table');

    date_default_timezone_set('Asia/Bangkok');
  }

  public function index()
  {
    $this->auth->restrict($this->viewPermission);
    $this->template->title('Fabric');
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
      $patterns = explode(",", $row['id_pattern_type']);
      foreach ($patterns as $pattern) {
        $dataa = $this->db->get_where('master_pattern_type', array('id_pattern_type' => $pattern))->row();
        $list = "<label class='label label-warning'>" . $dataa->name_pattern_type . "</label>";
      }

      $nestedData   = array();
      $detail = "";
      $nestedData[]  = "<div align='center'>" . $nomor . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_product']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_product']) . "</div>";
      $nestedData[]  = "<div align='center'>" . $list . "</div>";
      $nestedData[]  = "<div>" . strtoupper($row['nm_supplier_office']) . "</div>";
      $nestedData[]  = "<div align='center'>" . strtoupper($row['product_status']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>
              <a class='btn btn-sm btn-primary detail' href='javascript:void(0)' title='Detail' data-id_product='" . $row['id_product'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-list'></span>
              </a>
              <a class='btn btn-sm btn-success edit' href='javascript:void(0)' title='Edit' data-id_product='" . $row['id_product'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='btn btn-sm btn-danger delete' href='javascript:void(0)' title='Delete' data-id_product = '" . $row['id_product'] . "'  style='width:30px; display:inline-block'>
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

    $sql = "
  			SELECT
  				a.*, b.nm_supplier_office
  			FROM
  				master_product_fabric a
  				LEFT JOIN master_supplier b ON b.id_supplier = a.id_supplier
  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.id_product LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR b.nm_supplier_office LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.name_product LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.product_status LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_product',
      2 => 'name_product',
      3 => 'id_pattern_type',
      4 => 'nm_supplier_office',
      5 => 'product_status'
    );

    $sql .= " ORDER BY a.id_product ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }

  public function getDataPatternName()
  {
    $requestData  = $_REQUEST;
    $fetch      = $this->queryDataPatternName(
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
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_pattern']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_pattern']) . "</div>";
      $nestedData[]  = "<div align='center'>" . strtoupper($row['nm_supplier']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>

              <a class='btn btn-sm btn-primary detail' href='javascript:void(0)' title='Detail' data-id_pattern='" . $row['id_pattern'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-list'></span>
              </a>
              <a class='btn btn-sm btn-success edit' href='javascript:void(0)' title='Edit' data-id_pattern='" . $row['id_pattern'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='detail btn btn-sm btn-danger delete' href='javascript:void(0)' title='Delete' data-id_pattern = '" . $row['id_pattern'] . "'  style='width:30px; display:inline-block'>
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

  public function getDataColour()
  {
    $requestData  = $_REQUEST;
    $fetch      = $this->queryDataColour(
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
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_colour']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_colour']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>

              <a class='btn btn-sm btn-primary detail_Colour' href='javascript:void(0)' title='Detail' data-id_colour='" . $row['id_colour'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-list'></span>
              </a>
              <a class='btn btn-sm btn-success edit_Colour' href='javascript:void(0)' title='Edit' data-id_colour='" . $row['id_colour'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='btn btn-sm btn-danger delete_Colour' href='javascript:void(0)' title='Delete' data-id_colour = '" . $row['id_colour'] . "'  style='width:30px; display:inline-block'>
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

  public function getDataCharacteristic()
  {
    $requestData  = $_REQUEST;
    $fetch      = $this->queryDataCharacteristic(
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
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_characteristic']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_characteristic']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>

              <a class='btn btn-sm btn-primary detail_Characteristic' href='javascript:void(0)' title='Detail' data-id_characteristic='" . $row['id_characteristic'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-list'></span>
              </a>
              <a class='btn btn-sm btn-success edit_Characteristic' href='javascript:void(0)' title='Edit' data-id_characteristic='" . $row['id_characteristic'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='btn btn-sm btn-danger delete_Characteristic' href='javascript:void(0)' title='Delete' data-id_characteristic = '" . $row['id_characteristic'] . "'  style='width:30px; display:inline-block'>
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

  public function queryDataPatternName($activation, $like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
  {
    // echo $series."<br>";
    // echo $group."<br>";
    // echo $komponen."<br>";

    $where_activation = "";
    if (!empty($activation)) {
      $where_activation = " AND a.activation = '" . $activation . "' ";
    }

    $sql = "
  			SELECT
  				a.*, b.nm_supplier_office
  			FROM
  				child_supplier_pattern a
  				LEFT JOIN master_supplier b ON b.id_supplier = a.id_supplier
  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.id_supplier LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.id_pattern LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR a.name_pattern LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR b.nm_supplier_office LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_pattern',
      2 => 'name_pattern',
      3 => 'nm_supplier'
    );

    $sql .= " ORDER BY a.id_pattern ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }

  public function queryDataColour($activation, $like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
  {
    $where_activation = "";
    if (!empty($activation)) {
      $where_activation = " AND a.activation = '" . $activation . "' ";
    }

    $sql = "
  			SELECT
  				a.*
  			FROM
  				master_colour a
  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.id_colour LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR a.name_colour LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_colour',
      2 => 'name_colour'
    );

    $sql .= " ORDER BY a.id_colour ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }

  public function queryDataCharacteristic($activation, $like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
  {
    $where_activation = "";
    if (!empty($activation)) {
      $where_activation = " AND a.activation = '" . $activation . "' ";
    }

    $sql = "
  			SELECT
  				a.*
  			FROM
  				master_product_characteristic a
  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.id_characteristic LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR a.name_characteristic LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_characteristic',
      2 => 'name_characteristic'
    );

    $sql .= " ORDER BY a.id_characteristic ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }

  public function getDataSupplierType()
  {
    $requestData  = $_REQUEST;
    $fetch      = $this->queryDataSupplierType(
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
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_type']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_type']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['nm_supplier']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>

              <a class='btn btn-sm btn-primary detail' href='javascript:void(0)' title='Detail' data-id_type='" . $row['id_type'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-list'></span>
              </a>
              <a class='btn btn-sm btn-success edit_SupplierType' href='javascript:void(0)' title='Edit' data-id_type='" . $row['id_type'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='detail btn btn-sm btn-danger delete' href='javascript:void(0)' title='Delete' data-id_type = '" . $row['id_type'] . "'  style='width:30px; display:inline-block'>
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

  public function queryDataSupplierType($activation, $like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
  {
    // echo $series."<br>";
    // echo $group."<br>";
    // echo $komponen."<br>";

    $where_activation = "";
    if (!empty($activation)) {
      $where_activation = " AND a.activation = '" . $activation . "' ";
    }

    $sql = "
  			SELECT
  				a.*, b.nm_supplier_office
  			FROM
  				child_supplier_type a
  				LEFT JOIN master_supplier b ON b.id_supplier = a.id_supplier
  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.id_supplier LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.id_type LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR a.name_type LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR b.nm_supplier_office LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_type',
      2 => 'name_type',
      3 => 'nm_supplier'
    );

    $sql .= " ORDER BY a.id_type ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }

  public function getDataProductCategory()
  {
    $requestData  = $_REQUEST;
    $fetch      = $this->queryDataProductCategory(
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
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_category']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_category']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['supplier_shipping']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>

              <a class='btn btn-sm btn-primary detail' href='javascript:void(0)' title='Detail' data-id_category='" . $row['id_category'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-list'></span>
              </a>
              <a class='btn btn-sm btn-success edit_ProductCategory' href='javascript:void(0)' title='Edit' data-id_category='" . $row['id_category'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='detail btn btn-sm btn-danger delete' href='javascript:void(0)' title='Delete' data-id_category = '" . $row['id_category'] . "'  style='width:30px; display:inline-block'>
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

  public function queryDataProductCategory($activation, $like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
  {
    // echo $series."<br>";
    // echo $group."<br>";
    // echo $komponen."<br>";

    $where_activation = "";
    if (!empty($activation)) {
      $where_activation = " AND a.activation = '" . $activation . "' ";
    }

    $sql = "
  			SELECT
  				*
  			FROM
  				master_product_category a

  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.supplier_shipping LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.id_category LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR a.name_category LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_category',
      2 => 'name_category',
      3 => 'supplier_shipping'
    );

    $sql .= " ORDER BY a.id_category ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }

  public function getDataPatternType()
  {
    $requestData  = $_REQUEST;
    $fetch      = $this->queryDataPatternType(
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
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_pattern_type']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_pattern_type']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>

              <!--<a class='btn btn-sm btn-primary detail_PatternType' href='javascript:void(0)' title='Detail' data-id_pattern_type='" . $row['id_pattern_type'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-list'></span>
              </a>-->
              <a class='btn btn-sm btn-success edit_PatternType' href='javascript:void(0)' title='Edit' data-id_pattern_type='" . $row['id_pattern_type'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='btn btn-sm btn-danger delete_PatternType' href='javascript:void(0)' title='Delete' data-id_pattern_type = '" . $row['id_pattern_type'] . "'  style='width:30px; display:inline-block'>
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

  public function queryDataPatternType($activation, $like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
  {
    // echo $series."<br>";
    // echo $group."<br>";
    // echo $komponen."<br>";

    $where_activation = "";
    if (!empty($activation)) {
      $where_activation = " AND a.activation = '" . $activation . "' ";
    }

    $sql = "
  			SELECT
  				a.*
  			FROM
  				master_pattern_type a
  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.id_pattern_type LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR a.name_pattern_type LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_pattern_type',
      2 => 'name_pattern_type'
    );

    $sql .= " ORDER BY a.id_pattern_type ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }

  public function getID()
  {
    $id        = $this->input->post('id');
    // $first_letter = strtoupper(substr($nm, 0, 1));
    $nomor   = $this->db->query("SELECT MAX(SUBSTR(id_product, 9, 3)) AS id_product FROM master_product_fabric WHERE SUBSTR(id_product, 1, 8) = '$id' ORDER BY id_product DESC LIMIT 1")->row();
    //echo "$first_letter";
    //exit;

    if ($nomor->id_product != '') {
      $urut = $nomor->id_product + 1;
    } else {
      $urut = 001;
    }

    $new_id = str_pad($urut, 3, "0", STR_PAD_LEFT);
    $Arr_Kembali  = array(
      'id'    => $new_id
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
    $queryTable = "Select * FROM $table_name WHERE activation = 'active' ";
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

  public function getSimilar()
  {
    $id_selected     = ($this->input->post('id_selected')) ? $this->input->post('id_selected') : '';
    $column          = ($this->input->post('column')) ? $this->input->post('column') : '';
    $column_fill     = ($this->input->post('column_fill')) ? $this->input->post('column_fill') : '';
    $idkey           = ($this->input->post('key')) ? $this->input->post('key') : '';
    $column_name     = ($this->input->post('column_name')) ? $this->input->post('column_name') : '';
    $table_name      = ($this->input->post('table_name')) ? $this->input->post('table_name') : '';
    $act             = ($this->input->post('act')) ? $this->input->post('act') : '';

    $where_col = $column . " like '%" . $column_fill . "%'";
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

  public function savePatternName()
  {
    $data         = $this->input->post();

    $id_supplier  = $data['id_supplier'];
    $name_pattern  = $data['name_pattern'];
    $getS = $this->db->get_where('master_supplier', array('id_supplier' => $id_supplier))->row();
    $counter = $this->db->query("select * From child_supplier_pattern WHERE id_supplier = '$id_supplier' AND id_pattern NOT LIKE '%D-%' ORDER BY id_pattern DESC LIMIT 1")->row();

    $this->db->trans_begin();
    if (!empty($name_pattern)) {
      $id_supplier = $data['id_supplier'];
      //$id_pattern = $id_supplier."-".str_pad(substr($counter,-3), 3, "0", STR_PAD_LEFT);
      if (empty($counter)) {
        $id_pattern = $id_supplier . "-001";
      } else {
        $id_pattern = $id_supplier . "-" . str_pad(substr($counter->id_pattern, -3) + 1, 3, "0", STR_PAD_LEFT);
      }
      // echo "<pre>";
      // print_r($id_pattern);
      // echo "</pre>";
      // exit;

      $insertData  = array(
        'id_pattern'    => $id_pattern,
        'name_pattern'  => strtoupper($data['name_pattern']),
        'id_supplier'    => strtoupper($id_supplier),
        'name_supplier'  => strtoupper($getS->nm_supplier_office),
        'activation'    => "active",
        'created_on'    => date('Y-m-d H:i:s'),
        'created_by'    => $this->auth->user_id()
      );
      $this->db->insert('child_supplier_pattern', $insertData);
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $Arr_Kembali  = array(
          'pesan'    => 'Failed Add Changes. Please try again later ...',
          'status'  => 0
        );
        $keterangan = 'FAILED, ' . $data['type'] . ' Pattern Name Data ' . $id_pattern;
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

        $keterangan = 'SUCCESS, ' . $data['type'] . ' Pattern Name Data ' . $id_patter;
        $status = 1;
        $nm_hak_akses = $this->addPermission;
        $kode_universal = $this->auth->user_id();
        $jumlah = 1;
        $sql = $this->db->last_query();
      }
    } else {
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Pattern Name id empty...',
        'status'  => 0
      );
      $keterangan = 'FAILED, ' . $data['type'] . ' Pattern Name Data ' . $id_pattern;
      $status = 0;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }

    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    echo json_encode($Arr_Kembali);
  }

  public function modal_Process($page = "", $action = "", $id = "")
  {
    $this->template->set('action', $action);
    $this->template->set('id', $id);
    if ($page == 'Fabric') {
      $this->template->render('modal_Process_Fabric');
      if ($action == 'view') {
        $this->template->render('modal_View_Fabric');
      }
    } elseif ($page == 'SupplierType') {
      $this->template->render('modal_Process_SupplierType');
    } elseif ($page == 'ProductCategory') {
      $this->template->render('modal_Process_ProductCategory');
    } elseif ($page == 'Colour') {
      $this->template->render('modal_Process_Colour');
    } elseif ($page == 'Characteristic') {
      $this->template->render('modal_Process_Characteristic');
    } elseif ($page == 'PatternType') {
      $this->template->render('modal_Process_PatternType');
    } elseif ($page == 'PatternName') {
      $this->template->render('modal_Process_PatternName', $id);
    }
  }

  public function modal_Helper($action = "", $id_sup = "")
  {
    $this->template->set('action', $action);
    $this->template->set('id', $id_sup);
    if ($action == 'Ci') {
      $this->template->render('modal_Helper_Ci');
    } else {
      $this->template->render('modal_Helper');
    }
  }

  public function saveFabric()
  {


    $data                 = $this->input->post();
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // exit;
    $type                   = $data['type'];
    $shipment               = $data['shipment'];
    $id_supplier            = $data['id_supplier'];
    $usage                  = implode(",", $data['usage']);
    //print_r($usage);
    //exit;
    $furniture_application  = $data['furniture_application'];
    $curtain_application    = $data['curtain_application'];
    $id_pattern_type        = $data['id_pattern_type'] == '' ? '' : implode(",", $data['id_pattern_type']);
    $id_pattern_name        = $data['id_pattern_name'];
    $id_colour              = $data['id_colour'] == '' ? '' : implode(",", $data['id_colour']);
    $id_characteristic      = $data['id_characteristic'] == '' ? '' : implode(",", $data['id_characteristic']);
    // $id_brand               = $data['id_brand'];
    $id_collection          = $data['id_collection'];
    $id_class               = $data['id_class'];
    $original_id_product    = $data['original_id_product'];
    $type                   = $data['type'];
    $id_product             = $data['id_product'] . "-" . $data['id_product_m'];
    $name_product           = $data['name_product'];
    $activation             = $data['activation'];
    $buy_price_curs         = str_replace(",", "", $data['buy_price_curs']);
    $buy_price              = str_replace(",", "", $data['buy_price']);
    $pricelist_curs         = str_replace(",", "", $data['pricelist_curs']);
    $curs                   = str_replace(",", "", $data['curs']);
    $pricelist              = str_replace(",", "", $data['pricelist']);
    $moq                    = $data['moq'];
    $id_uom                 = $data['id_uom'];
    $product_status         = $data['product_status'];
    $product_status_reason  = $data['product_status_reason'];
    $id_country             = $data['id_country'];
    $similar_name           = $data['similar_name'] == '' ? '' : implode(";", $data['similar_name']);
    // $id_content             = implode(",", $data['id_content']);
    $content_percent        = implode(",", $data['content_percent']);
    $martindale             = $data['martindale'];
    $martindale_iso         = $data['martindale_iso'];
    $wyzenbeek              = $data['wyzenbeek'];
    $wyzenbeek_iso          = $data['wyzenbeek_iso'];
    $fire_reterdant         = $data['fire_reterdant'];
    $water_repellent        = $data['water_repellent'];
    $stain_resistant        = $data['stain_resistant'];
    $width                  = $data['width'];
    $weight                 = $data['weight'];
    $horizontal             = $data['horizontal'];
    $vertical               = $data['vertical'];
    $color_fastness         = $data['color_fastness'];
    $anti_bacterial         = $data['anti_bacterial'];
    $additional_features    = $data['additional_features'];
    $ci_val                 = $data['ci_val'];
    $filelama             =   $data['filelama'];

    ##UPLOAD

    $path           =   './assets/img/master_fabric/'; //path folder

    $config = array(
      'upload_path' => './assets/img/master_fabric/',
      'allowed_types' => 'gif|jpg|png|jpeg|JPG|PNG',
      'file_name' => 'photo_' . $id_product,
      'file_ext_tolower' => TRUE,
      'overwrite' => TRUE,
      'max_size' => 20048,
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

      $ext = end((explode(".", $_FILES['product_photo']['name'])));
      $name_pic = 'photo_' . $id_product . "." . strtolower($ext);
      $paths = $_SERVER['DOCUMENT_ROOT'] . 'assets/img/master_fabric/' . $name_pic;
      if (file_exists($paths)) {
        unlink($paths);
      }
      $data_foto  = array('upload_data' => $this->upload->data('product_photo'));
    }
    ##END UPLOAD
    /*
      echo $result;
      ?>
      <pre>
        <?=print_r($data)?>
      </pre>
      <?php
      exit;
      */
    //DATA INSERT
    $insertData = array(
      'shipment'              => $shipment,
      'photo_product'         => $name_pic,
      'id_supplier'           => $id_supplier,
      'usage'                 => $usage,
      'furniture_application' => $furniture_application,
      'curtain_application'   => $curtain_application,
      'id_pattern_type'       => $id_pattern_type,
      'id_pattern_name'       => $id_pattern_name,
      'id_colour'             => $id_colour,
      'id_characteristic'     => $id_characteristic,
      // 'id_brand'              => $id_brand,
      'id_collection'         => $id_collection,
      'id_class'              => $id_class,
      'original_id_product'   => $original_id_product,
      'type'                  => $type,
      'id_product'            => $id_product,
      'name_product'          => $name_product,
      'activation'            => $activation,
      'buy_price_curs'        => $buy_price_curs,
      'buy_price'             => $buy_price,
      'pricelist_curs'        => $pricelist_curs,
      'pricelist'             => $pricelist,
      'moq'                   => $moq,
      'curs'                  => $curs,
      'id_uom'                => $id_uom,
      'product_status'        => $product_status,
      'product_status_reason' => $product_status_reason,
      'id_country'            => $id_country,
      'similar_name'          => $similar_name,
      // 'id_content'            => $id_content,
      'content_percent'       => $content_percent,
      'martindale'            => $martindale,
      'martindale_iso'        => $martindale_iso,
      'wyzenbeek'             => $wyzenbeek,
      'wyzenbeek_iso'         => $wyzenbeek_iso,
      'fire_reterdant'        => $fire_reterdant,
      'water_repellent'       => $water_repellent,
      'stain_resistant'       => $stain_resistant,
      'width'                 => $width,
      'weight'                => $weight,
      'horizontal'            => $horizontal,
      'vertical'              => $vertical,
      'color_fastness'        => $color_fastness,
      'anti_bacterial'        => $anti_bacterial,
      'additional_features'   => $additional_features,
      'ci_val'                => $ci_val
    );

    $this->db->trans_begin();

    //FABRIC DATA
    if ($data['type'] == 'edit') {
      $insertData['modified_on']  = date('Y-m-d H:i:s');
      $insertData['modified_by']  = $this->auth->user_id();
      $this->db->where('id_product', $id_product)->update('master_product_fabric', $insertData);
    } else {
      $insertData['created_on']  = date('Y-m-d H:i:s');
      $insertData['created_by']  = $this->auth->user_id();
      $numID = $this->db->get_where('master_product_fabric', array('id_product' => $id_product))->num_rows();
      if ($numID > 0) {
        $Arr_Kembali  = array(
          'pesan'    => 'Failed Add Changes. Code already exist ...',
          'status'  => 0
        );
        echo json_encode($Arr_Kembali);
        // exit;
      } else {
        $this->db->insert('master_product_fabric', $insertData);
      }
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, ' . $data['type'] . ' Supplier Data ' . $id_supplier . ' With Name ' . $id_supplier;
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

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Brand Data ' . $id_supplier . ' With Name ' . $id_supplier;
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
    $id_product        = $this->input->post('id_product');
    $this->db->trans_begin();
    $getCat   = $this->db->where('id_product', $id_product)->update('master_product_fabric', array('activation' => 'nonaktif'));
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

  public function saveBrand()
  {
    $data        = $this->input->post();
    $counter = ($this->db->get('master_product_brand')->num_rows()) + 1;

    $this->db->trans_begin();
    if ($data['type'] == 'edit') {
      $id_supplier = $data['id_supplier'];
      $insertData  = array(
        'nm_supplier'  => strtoupper($data['nm_supplier']),
        'modified_on'  => date('Y-m-d H:i:s'),
        'modified_by'  => $this->auth->user_id()
      );
      $this->db->where('id_brand', $data['id_brand'])->update('master_product_brand', $insertData);
    } else {
      $id_brand = "MPB" . str_pad($counter, 3, "0", STR_PAD_LEFT);
      $insertData  = array(
        'id_brand'    => $id_brand,
        'name_brand'  => strtoupper($data['name_brand']),
        'activation'  => "active",
        'created_on'  => date('Y-m-d H:i:s'),
        'created_by'  => $this->auth->user_id()
      );
      $this->db->insert('master_product_brand', $insertData);
    }
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, ' . $data['type'] . ' Brand Data ' . $id_brand;
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

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Brand Data ' . $id_brand;
      $status = 1;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }
    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    echo json_encode($Arr_Kembali);
  }

  public function saveSupplierType()
  {
    $data        = $this->input->post();
    $counter = ((int) substr($this->db->query("select * From child_supplier_type ORDER BY id_type DESC LIMIT 1")->row()->id_type, -5)) + 1;

    $this->db->trans_begin();
    if ($data['type'] == 'edit') {
      $id_type = $data['id_type'];
      $insertData  = array(
        'name_type'  => strtoupper($data['name_type']),
        //'activation'	=> strtoupper($data['activation']),
        'modified_on'  => date('Y-m-d H:i:s'),
        'modified_by'  => $this->auth->user_id()
      );
      $this->db->where('id_type', $data['id_type'])->update('child_supplier_type', $insertData);
    } else {
      $id_type = "ST" . str_pad($counter, 5, "0", STR_PAD_LEFT);
      $insertData  = array(
        'id_type'    => $id_type,
        'name_type'  => strtoupper($data['name_type']),
        'activation'  => "active",
        'created_on'  => date('Y-m-d H:i:s'),
        'created_by'  => $this->auth->user_id()
      );
      $this->db->insert('child_supplier_type', $insertData);
    }
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, ' . $data['type'] . ' Supplier Type Data ' . $id_brand;
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

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Supplier Type Data ' . $id_brand;
      $status = 1;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }
    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    echo json_encode($Arr_Kembali);
  }

  public function saveProductCategory()
  {
    $data        = $this->input->post();
    $counter = ((int) substr($this->db->query("select * From master_product_category ORDER BY id_category DESC LIMIT 1")->row()->id_category, -4)) + 1;

    $this->db->trans_begin();
    if ($data['type'] == 'edit') {
      $id_category = $data['id_category'];
      $insertData  = array(
        'name_category'  => strtoupper($data['name_category']),
        'supplier_shipping'  => strtoupper($data['supplier_shipping']),
        'modified_on'  => date('Y-m-d H:i:s'),
        'modified_by'  => $this->auth->user_id()
      );
      $this->db->where('id_category', $data['id_category'])->update('master_product_category', $insertData);
    } else {
      $id_category = "PCN" . str_pad($counter, 4, "0", STR_PAD_LEFT);
      $insertData  = array(
        'id_category'    => $id_category,
        'name_category'  => strtoupper($data['name_category']),
        'supplier_shipping'  => strtoupper($data['supplier_shipping']),
        'activation'  => "active",
        'created_on'  => date('Y-m-d H:i:s'),
        'created_by'  => $this->auth->user_id()
      );
      $this->db->insert('master_product_category', $insertData);
    }
    //$this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, ' . $data['type'] . ' Supplier Type Data ' . $id_brand;
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

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Supplier Type Data ' . $id_brand;
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

  public function saveCharacteristic()
  {
    $data                     = $this->input->post();
    $type                     = $data['type'];

    //IDENTITY
    $id_characteristic      = $data['id_characteristic'];
    $name_characteristic    = $data['name_characteristic'];
    $activation         = 'active';

    $this->db->trans_begin();

    //COLLECTION DATA
    if ($data['type'] == 'edit') {

      $insertData  = array(
        'name_characteristic'   =>  $name_characteristic,
        'modified_on'        =>  date('Y-m-d H:i:s'),
        'modified_by'        =>  $this->auth->user_id()
      );
      $this->db->where('id_characteristic', $data['id_characteristic'])->update('master_product_characteristic', $insertData);
    } else {
      $numID = $this->db->get_where('master_product_characteristic', array('id_characteristic' => $id_characteristic))->num_rows();
      if ($numID > 0) {
        $getI   = $this->db->query("SELECT MAX(id_characteristic) FROM master_product_characteristic ORDER BY id_characteristic DESC LIMIT 1")->row();
        //echo "$first_letter";
        //exit;
        $num = substr($getI->id_characteristic, -5) + 1;
        $id_customer = 'CS' . str_pad($num, 5, "0", STR_PAD_LEFT);
      }

      $insertData  = array(
        'id_characteristic'           =>  $id_characteristic,
        'name_characteristic'         =>  $name_characteristic,
        'activation'               =>  $activation,
        'created_on'            =>  date('Y-m-d H:i:s'),
        'created_by'            =>  $this->auth->user_id()
      );
      $this->db->insert('master_product_characteristic', $insertData);
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
      $keterangan = 'FAILED, ' . $data['type'] . ' Customer Data ' . $id_characteristic . ' With Name ' . $name_characteristic;
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

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Brand Data ' . $id_characteristic . ' With Name ' . $name_characteristic;
      $status = 1;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }
    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    echo json_encode($Arr_Kembali);
  }

  public function savePatternType()
  {
    $data                     = $this->input->post();
    $type                     = $data['type'];

    //IDENTITY
    $id_pattern_type      = $data['id_pattern_type'];
    $name_pattern_type    = $data['name_pattern_type'];
    $activation         = 'active';

    $this->db->trans_begin();

    //COLLECTION DATA
    if ($data['type'] == 'edit') {

      $insertData  = array(
        'name_pattern_type'   =>  $name_pattern_type,
        'modified_on'        =>  date('Y-m-d H:i:s'),
        'modified_by'        =>  $this->auth->user_id()
      );
      $this->db->where('id_pattern_type', $data['id_pattern_type'])->update('master_pattern_type', $insertData);
    } else {
      $numID = $this->db->get_where('master_pattern_type', array('id_pattern_type' => $id_pattern_type))->num_rows();
      if ($numID > 0) {
        $getI   = $this->db->query("SELECT MAX(id_pattern_type) FROM master_pattern_type ORDER BY id_pattern_type DESC LIMIT 1")->row();
        //echo "$first_letter";
        //exit;
        $num = substr($getI->id_pattern_type, 1, 5) + 1;
        $id_customer = 'CL' . str_pad($num, 5, "0", STR_PAD_LEFT);
      }

      $insertData  = array(
        'id_pattern_type'           =>  $id_pattern_type,
        'name_pattern_type'         =>  $name_pattern_type,
        'activation'               =>  $activation,
        'created_on'            =>  date('Y-m-d H:i:s'),
        'created_by'            =>  $this->auth->user_id()
      );
      $this->db->insert('master_pattern_type', $insertData);
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, ' . $data['type'] . ' Customer Data ' . $id_pattern_type . ' With Name ' . $name_pattern_type;
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

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Brand Data ' . $id_pattern_type . ' With Name ' . $name_pattern_type;
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
