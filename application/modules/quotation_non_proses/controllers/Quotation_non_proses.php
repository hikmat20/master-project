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

class Quotation_non_proses extends Admin_Controller
{
  //Permission
  protected $viewPermission = 'Quotation_proses.View';
  protected $addPermission  = 'Quotation_proses.Add';
  protected $managePermission = 'Quotation_proses.Manage';
  protected $deletePermission = 'Quotation_proses.Delete';

  public function __construct()
  {
    parent::__construct();

    $this->load->library(array('Mpdf', 'upload', 'Image_lib'));
    $this->load->model(array(
      'QuotationNonProsesModel',
      'Aktifitas/aktifitas_model',
    ));
    $this->template->title('Quotation');
    $this->template->page_icon('fa fa-quote-right');

    date_default_timezone_set('Asia/Bangkok');
  }

  public function index()
  {
    $this->auth->restrict($this->viewPermission);
    $this->template->title('Quotation Non Process');
    $this->template->render('index');
  }



  public function qt_non_pro_open()
  {
    $this->auth->restrict($this->viewPermission);
    $this->template->title('Quotation Non Process Open');
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

      if ($row['status'] == '0') {
        $status = '<span class="badge bg-teal">Open</span>';
      } else if ($row['status'] == '1') {
        $status = '<span class="badge bg-green">Deal</span>';
      } else if ($row['status'] == '2') {
        $status = '<span class="badge bg-default">Close</span>';
      } else {
        $status = 'tidak ada status';
      }

      $nestedData   = array();
      $detail = "";
      $nestedData[]  = "<div align='center'>" . $nomor . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_quotation']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['date']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_customer']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['nama_karyawan']) . "</div>";
      $nestedData[]  = "<div align='right'>" . strtoupper(number_format($row['grand_total'])) . "</div>";
      $nestedData[]  = "<div align='center'>" . ($status) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>
              <a class='btn btn-sm btn-warning view' href='javascript:void(0)' title='View' data-id_quotation='" . $row['id_quotation'] . "' style='width:30px; display:inline-block'>
                <span class='fa fa-eye'></span> 
              </a>
              <a class='btn btn-sm btn-primary edit' href='javascript:void(0)' title='Edit' data-id_quotation='" . $row['id_quotation'] . "' style='width:30px; display:inline-block'>
                <span class='fa fa-edit'></span>
              </a> 
			  <a class='btn btn-sm btn-danger pdf' href='javascript:void(0)' title='PDF' data-id_quotation = '" . $row['id_quotation'] . "'  style='width:30px; display:inline-block'>
                <i class='fa fa-file-pdf-o'></i>
              </a>
              <a class='btn btn-sm btn-info upload' href='javascript:void(0)' title='Upload' data-id_quotation = '" . $row['id_quotation'] . "'  style='width:30px; display:inline-block'>
                <i class='fa fa-upload'></i>
              </a>
              <a class='btn btn-sm btn-success _close' href='javascript:void(0)' title='Close' data-id_quotation = '" . $row['id_quotation'] . "'  style='width:30px; display:inline-block'>
                <i class='fa fa-check'></i>
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

    $sql = "SELECT
				  a.id_quotation,a.date,b.name_customer,c.nama_karyawan, a.grand_total,a.status,a.activation
				FROM
				  quotation_np_header a LEFT JOIN master_customer b ON a.id_customer = b.id_customer
				   INNER JOIN karyawan c ON a.id_karyawan = c.id_karyawan WHERE 1=1
				" . $where_activation . " 
				AND (
  				a.id_quotation LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR a.status LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR b.name_customer LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR c.nama_karyawan LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
			";

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_quotation',
      2 => 'date',
      3 => 'name_customer',
      4 => 'nama_karyawan',
      5 => 'grand_total',
      6 => 'status'
    );

    $sql .= " ORDER BY a.id_quotation ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }


  public function getID()
  {
    // $id				= $this->input->post('id');
    // $first_letter 	= strtoupper(substr($id, 0, 5));
    $getId         = $this->db->query("SELECT max(LEFT(id_quotation,5)) idQ FROM quotation_np_header ORDER BY id_quotation DESC LIMIT 1")->row();
    $code = 'NPR';
    $num = $getId->idQ + 1;
    $nomor = str_pad($num, 5, "0", STR_PAD_LEFT);
    $new_id = $nomor . '/IDF/' . $code . '/' . date('m') . '/' . date('y');
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
    $filter_column   = ($this->input->post('filter_column')) ? $this->input->post('filter_column') : '';
    $filter_val      = ($this->input->post('filter_val')) ? $this->input->post('filter_val') : '';
    $search_column   = ($this->input->post('filter_column')) ? $this->input->post('search_column') : '';
    $search_value    = ($this->input->post('filter_val')) ? $this->input->post('search_value') : '';
    $idkey           = ($this->input->post('key')) ? $this->input->post('key') : '';
    $column_name     = ($this->input->post('column_name')) ? $this->input->post('column_name') : '';
    $table_name      = ($this->input->post('table_name')) ? $this->input->post('table_name') : '';
    $act             = ($this->input->post('act')) ? $this->input->post('act') : '';

    $where_col = $column . " = '" . $column_fill . "'";
    $filter_col = $filter_column . " = '" . $filter_val . "'";
    $search_col = $search_column . " like '%" . $search_value . "%'";
    $queryTable = "Select * FROM $table_name WHERE 1=1";
    if (!empty($column_fill)) {
      $queryTable .= " AND " . $where_col;
    }
    if (!empty($filter_val)) {
      $queryTable .= " AND " . $filter_col;
    }
    if (!empty($search_column)) {
      $queryTable .= " AND " . $search_col;
    }
    $getTable = $this->db->query($queryTable)->result_array();
    if ($act == 'free') {

      if (count($getTable) == 0) {
        $queryTable = "Select * FROM $table_name WHERE 1=1 AND " . $column . " IS NULL OR " . $column . " = ''";
        $getTable = $this->db->query($queryTable)->result_array();
      }
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
    if ($page == 'Quotation') {
      $data = $this->db->get('master_product')->result();
      $this->template->set('data', $data);
      $this->template->render('modal_Process_Quotation');
    }
  }

  public function list_barang()
  {

    $id = $this->input->post('id');
    // print_r($id);

    if ($id != '') {
      if ($id == '1') {
        $session       = $this->session->userdata('app_session');
        $itembarang    = $this->db->query("SELECT * FROM master_product_fabric")->result();
        $this->template->set('itembarang', $itembarang);
        $this->template->render('list_barang');
      } else {
        echo "Data kosong";
      }
    } else {
      // echo "Data asdsadasd";

      // $session       = $this->session->userdata('app_session');
      // $this->template->set('itembarang',$itembarang);
      // $this->template->title('Item Barang');

    }
  }

  public function addFee()
  {
    $session         = $this->session->userdata('app_session');
    $data        = $this->db->query("SELECT * FROM karyawan")->result();
    $this->template->set('karyawan', $data);
    $this->template->render('list_karyawan');
  }

  public function dataCustomer()
  {

    $id_cust   = $this->input->post('id_cust');
    $session    = $this->session->userdata('app_session');
    $pic      = $this->db->query("SELECT * FROM child_customer_pic where id_customer = '$id_cust'")->row();
    $customer   = $this->db->query("SELECT * FROM master_customer where id_customer = '$id_cust'")->row();
    $cat_cust1  = $this->db->query("SELECT * FROM child_customer_category where id_category_customer = '$customer->id_category_customer'")->row();
    $disc_cat   = $this->db->query("SELECT * FROM discount_category where id_category = '$customer->id_category_customer'")->row();

    $Arr = array(
      'customer'   => $customer,
      'pic'    => $pic,
      'cat_cust'  => $cat_cust1,
      'disc_cat'  => $disc_cat
    );

    echo json_encode($Arr);
  }

  public function dataDiscCat()
  {

    $id_cat   = $this->input->post('id_disc_cat');
    $session    = $this->session->userdata('app_session');

    $disc_cat   = $this->db->query("SELECT * FROM discount_category where id_category = '$id_cat'")->row();

    $Arr = array(
      'result'  => $disc_cat
    );

    echo json_encode($Arr);
  }

  public function dataProduct()
  {

    $id_product = $this->input->post('product');
    $session       = $this->session->userdata('app_session');
    $product      = $this->db->query("SELECT * FROM master_product_fabric where id_product = '$id_product'")->row();

    $Arr = array(
      'product'   => $product,
    );

    echo json_encode($Arr);
  }

  public function dataJahitan()
  {

    $id_jahitan = $this->input->post('id_jahitan');
    $session       = $this->session->userdata('app_session');
    $jahit      = $this->db->query("SELECT * FROM sewing where id_sewing = '$id_jahitan'")->row();

    $Arr = array(
      'sewing'   => $jahit,
    );

    echo json_encode($Arr);
  }

  public function addQuotation()
  {
    // $this->template->set('id', $id);
    $data = $this->db->get('master_product')->result();
    $this->template->title('Add New Quotation');
    $this->template->set('data', $data);
    $this->template->render('form_add_quotation');
  }

  public function get_item_barang()
  {
    $idbarang = $_GET['idbarang'];
    $session            = $this->session->userdata('app_session');
    $datbarang = $this->db->get('master_product_fabric')->result();

    echo json_encode($datbarang);
  }

  public function get_karyawan()
  {
    $session    = $this->session->userdata('app_session');
    // $id_kar 	= $this->input->post('id_kar');
    $get_idKar   = explode(";", $this->input->post('id_kar'));
    $this->db->select('*');
    $this->db->where_in('id_karyawan', $get_idKar);
    $list = $this->db->get('karyawan')->result_array();

    $Arr_data = array();
    foreach ($list as $key => $list_kar) {
      $Arr_Data[$list_kar['id_karyawan']]  = $list_kar;
    };

    echo json_encode($Arr_Data);
  }

  public function modal_Helper($action = "", $id_sup = "")
  {
    $this->template->set('action', $action);
    $this->template->set('id', $id_sup);
    $this->template->render('modal_Helper');
  }

  public function saveQuotation()
  {
    $data                 = $this->input->post();
    // echo "<pre>";
    // print_r($data);
    // echo "<pre>";
    // exit;



    // $ArrCurtain = [];
    // if (!empty($data['product_curtain'])) {
    //   foreach ($$data['product_curtain'] as $curtain => $x) {
    //     $ArrCurtain[$curtain]['id_quotation'] = $data['id_quotation'];
    //     $ArrCurtain[$curtain]['item'] = 'curtain';
    //     // $ArrCurtain[$curtain]['subtotal'] = $data['id_quotation'];
    //     // $ArrCurtain[$curtain]['disc_persen'] = $data['id_quotation'];
    //     // $ArrCurtain[$curtain]['disc_value'] = $data['id_quotation'];
    //     $ArrCurtain[$curtain]['grand_total'] = $data['id_quotation'];
    //   }
    // }
    $this->db->trans_begin();
    //SUPPLIER DATA
    if ($data['type'] === 'edit') {

      $insertData  = array(
        // 'id_quotation'   => $data['id_quotation'],
        'id_customer'    => $data['id_cuctomer'],
        'id_pic'         => $data['id_pic'],
        'address'        => $data['address'],
        'id_cust_cut'    => $data['id_cust_cut'],
        'id_disc_cat'    => $data['id_disc_cat'],
        'date'           => $data['date'],
        'sales_category' => $data['cat'],
        'id_type_project' => $data['type_project'],
        'id_karyawan'    => $data['id_karyawan'],
        'net'            => $data['net'],
        'ppn'            => $data['ppn']

      );

      $detailQuotation = [
        // 'id_quotation' => $data['id_quotation'],
        'item' => 'curtain',
        'grand_total' => str_replace(",", "", $data['grand_total_curtain'])
      ];
      $this->db->where('id_quotation', $data['id_quotation'])->update($insertData);
      $this->QuotationNonProsesModel->update($data['id_quotation'], $insertData);
    } else {

      $insertData  = array(
        'id_quotation'   => $data['id_quotation'],
        'id_customer'    => $data['id_cuctomer'],
        'id_pic'         => $data['id_pic'],
        'address'        => $data['address'],
        'id_cust_cut'    => $data['id_cust_cut'],
        'id_disc_cat'    => $data['id_disc_cat'],
        'date'           => $data['date'],
        'sales_category' => $data['cat'],
        'id_type_project' => $data['type_project'],
        'id_karyawan'    => $data['id_karyawan'],
        'net'            => $data['net'],
        'ppn'            => $data['ppn'],
        'activation'     => 'aktif',
      );

      $detailQuotation = [
        'id_quotation' => $data['id_quotation'],
        'item' => 'curtain',
        'grand_total' => str_replace(",", "", $data['grand_total_curtain'] || 0)
      ];

      $this->QuotationNonProsesModel->insert($insertData);
      $this->db->insert('quotation_np_detail', $detailQuotation);
    }
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {


      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED';
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

      $keterangan = 'SUCCESS';
      $status = 1;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }
    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    // $Arr_Kembali  = array(
    //   'pesan'    => 'Failed Add Changes. Please try again later ...',
    //   'status'  => 0
    // );

    echo json_encode($Arr_Kembali);
  }

  public function deleteData()
  {
    $id_delivery    = $this->input->post('id_delivery');
    $this->db->trans_begin();
    $getCat   = $this->db->where('id_delivery', $id_delivery)->update('delivery', array('activation' => 'nonaktif'));
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'msg'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, Delete Delivery Data ' . $id_delivery;
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

      $keterangan = 'SUCCESS, Delete Delivery Data ' . $id_delivery;
      $status = 1;
      $nm_hak_akses = $this->addPermission;
      $kode_universal = $this->auth->user_id();
      $jumlah = 1;
      $sql = $this->db->last_query();
    }
    simpan_aktifitas($nm_hak_akses, $kode_universal, $keterangan, $jumlah, $sql, $status);

    echo json_encode($Arr_Kembali);
  }

  public function addCurtain()
  {
    $product = $this->QuotationNonProsesModel->getProduct();
    // echo "<pre>";
    // print_r($product);
    // echo "<pre>";
    // exit;
    $data = [
      'product' => $product
    ];

    $this->template->set($data);
    $this->template->render('form_curtain');
  }

  public function addDetailCurtain()
  {
    $no = $this->input->post('no');
    $type = $this->input->post('type');
    $disk = $this->input->post('disk');
    $disc = str_replace('%', '', $disk);

    $this->template->set('disk', $disc);

    $this->template->set('no', $no);
    if ($type == 'yes') {
      $this->template->render('form_curtain_panel');
    } else {
      $this->template->render('form_curtain_nonpanel');
    }
  }

  public function addRailCurtain()
  {
    $no = $this->input->post('no');
    $type = $this->input->post('type');

    $this->template->set('no', $no);
    $this->template->render('rail_curtain');
  }



  public function getCountryOpt()
  {
    $id_country        = $this->input->post('id_country');
    $getCountry = $this->db->get('master_country')->result();
    $html = '<option value="">Select Country</option>';
    foreach ($getCountry as $key => $vc) {
      if ($vc->id_country == $id_country) {
        $active = 'selected';
      } else {
        $active = '';
      }
      $html .= '<option value="' . $vc->id_country . ' ' . $active . '">' . $vc->name_country . '</option>';
    }
    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
  }

  public function getSupplierTypeOpt()
  {
    $id_type        = $this->input->post('id_type');
    $getSupplierType = $this->db->get('child_supplier_type')->result();
    $html = '<option value="">Select Supplier Type</option>';
    foreach ($getSupplierType as $key => $vc) {
      if ($vc->id_type == $id_type) {
        $active = 'selected';
      } else {
        $active = '';
      }
      $html .= '<option value="' . $vc->id_type . ' ' . $active . '">' . $vc->name_type . '</option>';
    }
    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
  }

  public function getProductCatOpt()
  {
    $id_category        = $this->input->post('id_category');
    $supplier_shipping        = $this->input->post('supplier_shipping');
    $getProductCat = $this->db->get_where('master_product_category', array('supplier_shipping' => $supplier_shipping))->result();
    $html = '<option value="">Select Product Category</option>';
    foreach ($getProductCat as $key => $vc) {
      if ($vc->id_cate == $id_category) {
        $active = 'selected';
      } else {
        $active = '';
      }
      $html .= '<option value="' . $vc->id_category . ' ' . $active . '">' . $vc->name_category . '</option>';
    }
    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
  }

  public function getBusinessCatOpt()
  {
    $id_type        = $this->input->post('id_type');
    $id_business        = $this->input->post('id_business');
    $getBusinessCat = $this->db->get_where('child_supplier_business_category', array('id_type' => $id_type))->result();
    if (count($getBusinessCat) == 0) {
      $getBusinessCat = $this->db->get_where('child_supplier_business_category', array('id_type' => NULL))->result();
    }
    $html = '<option value="">Select Business Category</option>';
    foreach ($getBusinessCat as $key => $vc) {
      if ($vc->id_business == $id_business) {
        $active = 'selected';
      } else {
        $active = '';
      }
      $html .= '<option value="' . $vc->id_business . ' ' . $active . '">' . $vc->name_business . '</option>';
    }
    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
  }

  public function getSupplierCapOpt()
  {
    $id_capacity        = $this->input->post('id_capacity');
    $id_business        = $this->input->post('id_business');
    $getSupplierCap = $this->db->get_where('child_supplier_capacity', array('id_business' => $id_business))->result();
    if (count($getSupplierCap) == 0) {
      $getSupplierCap = $this->db->get_where('child_supplier_capacity', array('id_business' => NULL))->result();
    }
    $html = '';
    foreach ($getSupplierCap as $key => $vc) {
      if ($vc->id_capacity == $id_capacity) {
        $active = 'selected';
      } else {
        $active = '';
      }
      $html .= '<option value="' . $vc->id_capacity . ' ' . $active . '">' . $vc->name_capacity . '</option>';
    }
    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
  }

  public function getBrandOpt()
  {
    $id_supplier        = $this->input->post('id_supplier');
    $id_brand           = $this->input->post('id_brand');
    $getBrand = $this->db->get('master_product_brand')->result();
    $html = '';
    foreach ($getBrand as $key => $vc) {
      $html .= '<option value="' . $vc->id_brand . '">' . $vc->name_brand . '</option>';
    }
    $Arr_Kembali  = array(
      'html'    => $html
    );
    echo json_encode($Arr_Kembali);
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
