<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

/*
 * @author Ichsan
 * @copyright Copyright (c) 2019, Ichsan
 *
 * This is controller for Master Product Collection
 */

class Master_product_collection extends Admin_Controller
{
  //Permission
  protected $viewPermission = 'Master_product_collection.View';
  protected $addPermission  = 'Master_product_collection.Add';
  protected $managePermission = 'Master_product_collection.Manage';
  protected $deletePermission = 'Master_product_collection.Delete';

  public function __construct()
  {
    parent::__construct();

    $this->load->library(array('Mpdf', 'upload', 'Image_lib'));
    $this->load->model(array(
      'Master_product_collection/Master_product_collection_model',
      'Aktifitas/aktifitas_model',
    ));
    $this->template->title('Manage Data Collection');
    $this->template->page_icon('fa fa-table');

    date_default_timezone_set('Asia/Bangkok');
  }

  public function index()
  {
    $this->auth->restrict($this->viewPermission);
    $this->template->title('Collection');
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
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_collection']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_collection']) . "</div>";
      $nestedData[]  = "<div align='center'>" . strtoupper($row['type_collection']) . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>

              <a class='btn btn-sm btn-primary detail' href='javascript:void(0)' title='Detail' data-id_collection='" . $row['id_collection'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-list'></span>
              </a>
              <a class='btn btn-sm btn-success edit' href='javascript:void(0)' title='Edit' data-id_collection='" . $row['id_collection'] . "' style='width:30px; display:inline-block'>
                <span class='glyphicon glyphicon-edit'></span>
              </a>
              <a class='btn btn-sm btn-danger delete' href='javascript:void(0)' title='Delete' data-id_collection = '" . $row['id_collection'] . "'  style='width:30px; display:inline-block'>
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
  				a.*
  			FROM
  				master_product_collection a
  			WHERE 1=1
          " . $where_activation . "
  				AND (
  				a.id_collection LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  				OR a.name_collection LIKE '%" . $this->db->escape_like_str($like_value) . "%'
          OR a.type_collection LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
  		";

    // echo $sql;

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_collection',
      2 => 'name_collection',
      3 => 'type_collection'
    );

    $sql .= " ORDER BY a.id_collection ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
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

  public function getCodeByCat()
  {
    $id        = $this->input->post('id_category_customer');
    $getCat   = $this->db->get_where('child_customer_category', array('id_category_customer' => $id))->row();
    $getCus   = $this->db->select("id_customer")->order_by('id_customer', 'DESC')->get_where('master_customer', array('id_category_customer' => $id))->row();

    $first_letter = strtoupper($getCat->customer_code);
    $num =  ((int) substr($getCus->id_customer, 2, 5)) + 1;
    //$getI   = $this->db->query("SELECT * FROM master_customer WHERE LEFT(id_customer,1) = '$first_letter' ORDER BY id_customer DESC LIMIT 1")->row();
    //echo "$first_letter";
    //exit;
    $id = $first_letter . str_pad($num, 5, "0", STR_PAD_LEFT);
    $Arr_Kembali  = array(
      'id'    => $id
    );
    echo json_encode($Arr_Kembali);
  }

  public function deleteData()
  {
    $id_customer        = $this->input->post('id_customer');
    $this->db->trans_begin();
    $getCat   = $this->db->where('id_customer', $id_customer)->update('master_customer', array('activation' => 'inactive'));
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $Arr_Kembali  = array(
        'msg'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
      $keterangan = 'FAILED, Delete Customer Data ' . $id_customer;
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

      $keterangan = 'SUCCESS, Delete Customer Data ' . $id_customer;
      $status = 1;
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
    if ($page == 'Collection') {
      $this->template->render('modal_Process_Collection');
    } elseif ($page == 'ProductCategory') {
      $this->template->render('modal_Process_Category');
    }
  }

  public function modal_Helper($action = "", $id_sup = "")
  {
    $this->template->set('action', $action);
    $this->template->set('id', $id_sup);
    $this->template->render('modal_Helper');
  }

  public function saveCollection()
  {
    $data                     = $this->input->post();
    $type                     = $data['type'];

    //IDENTITY
    $id_collection      = $data['id_collection'];
    $name_collection    = $data['name_collection'];
    $type_collection    = $data['type_collection'];

    $this->db->trans_begin();

    //COLLECTION DATA
    if ($data['type'] == 'edit') {

      $insertData  = array(
        'name_collection'   =>  $name_collection,
        'type_collection'   =>  $type_collection,
        'modified_on'        =>  date('Y-m-d H:i:s'),
        'modified_by'        =>  $this->auth->user_id()
      );
      $this->db->where('id_collection', $data['id_collection'])->update('master_product_collection', $insertData);
    } else {
      $numID = $this->db->get_where('master_product_collection', array('id_collection' => $id_collection))->num_rows();
      if ($numID > 0) {
        $getI   = $this->db->query("SELECT MAX(id_collection) FROM master_product_collection ORDER BY id_collection DESC LIMIT 1")->row();
        //echo "$first_letter";
        //exit;
        $num = substr($getI->id_collection, 1, 5) + 1;
        $id_collection = 'CL' . str_pad($num, 5, "0", STR_PAD_LEFT);
      }

      $insertData  = array(
        'id_collection'           =>  $id_collection,
        'name_collection'         =>  $name_collection,
        'type_collection'        =>  $type_collection,
        'activation'               =>  'active',
        'created_on'            =>  date('Y-m-d H:i:s'),
        'created_by'            =>  $this->auth->user_id()
      );
      $this->db->insert('master_product_collection', $insertData);
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
      $keterangan = 'FAILED, ' . $data['type'] . ' Customer Data ' . $id_collection . ' With Name ' . $name_collection;
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

      $keterangan = 'SUCCESS, ' . $data['type'] . ' Brand Data ' . $id_collection . ' With Name ' . $name_collection;
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

  public function print_request($id)
  {
    $id_supplier = $id;
    $mpdf = new mPDF('', '', '', '', '', '', '', '', '', '');
    $mpdf->SetImportUse();
    $mpdf->RestartDocTemplate();

    $sup_data = $this->Customer_model->print_data_supplier($id_supplier);

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

    $rekap = $this->Customer_model->rekap_data()->result_array();

    $this->template->set('rekap', $rekap);

    $show = $this->template->load_view('print_rekap', $data);

    $this->mpdf->AddPage('L');
    $this->mpdf->WriteHTML($show);
    $this->mpdf->Output();
  }

  public function downloadExcel()
  {
    $rekap = $this->Customer_model->rekap_data()->result_array();

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
