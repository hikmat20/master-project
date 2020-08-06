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

class Mso_proses extends Admin_Controller
{
  //Permission
  protected $viewPermission = 'Mso_proses.View';
  protected $addPermission  = 'Mso_proses.Add';
  protected $managePermission = 'Mso_proses.Manage';
  protected $deletePermission = 'Mso_proses.Delete';

  public function __construct()
  {
    parent::__construct();

    $this->load->library(array('Mpdf', 'upload', 'Image_lib'));
    $this->load->model(array(
      'Quotation_proses/Quotation_proses_model',
      'Aktifitas/aktifitas_model',
    ));
    $this->template->title('Quotation');
    $this->template->page_icon('fa fa-quote-right');

    date_default_timezone_set('Asia/Bangkok');
  }

  public function index()
  {
    $this->auth->restrict($this->viewPermission);
    $this->template->title('Master Sales Order');
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

      if ($row['status'] == 'PROSES') {
        $status = '<span class="badge bg-teal">PROSES</span>';
      } else if ($row['status'] == 'HOLD') {
        $status = '<span class="badge bg-default">HOLD</span>';
      } else {
        $status = 'tidak ada status';
      }

      $nestedData   = array();
      $detail = "";
      $nestedData[]  = "<div align='center'>" . $nomor . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_quotation']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['date']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['name_customer']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['nm_type_project']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['id_quotation']) . "</div>";
      $nestedData[]  = "<div align='left'>" . strtoupper($row['no_po']) . "</div>";
      $nestedData[]  = "<div align='center'>" . $status . "</div>";
      if ($this->auth->restrict($this->viewPermission)) :
        $nestedData[]  = "<div style='text-align:center'>
              <a class='btn btn-sm btn-default print' href='javascript:void(0)' data-toggle='tooltip' title='Print MSO' data-id_mso='" . $row['id_mso'] . "' style='width:30px; display:inline-block'>
                <span class='fa fa-print'></span> 
              </a>
              <a class='btn btn-sm btn-warning edit' href='javascript:void(0)' data-toggle='tooltip' title='Edit MSO' data-id_mso='" . $row['id_mso'] . "' style='width:30px; display:inline-block'>
                <span class='fa fa-edit'></span>
              </a>
              <a class='btn btn-sm btn-info view' href='javascript:void(0)' data-toggle='tooltip' title='View MSO' data-id_mso='" . $row['id_mso'] . "' style='width:30px; display:inline-block'>
                <span class='fa fa-search'></span>
              </a>
              <a class='btn btn-sm btn-danger cencel' href='javascript:void(0)' data-toggle='tooltip' title='Cencel MSO' data-id_mso='" . $row['id_mso'] . "' style='width:30px; display:inline-block'>
                <span class='fa fa-close'></span>
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
				  a.id_mso, a.id_quotation,a.date,c.name_customer,d.nm_type_project, a.no_po,a.date_po,a.status
				FROM
				  mso_proses_header a 
          left join quotation_header b on a.id_quotation=b.id_quotation 
          left join master_customer c on b.id_customer=c.id_customer
          left join type_project d on b.id_type_project=d.id_type_project
          WHERE 1=1 and a.status = 'PROSES' " . $where_activation . " 
				AND (
  				 a.id_mso LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  			OR a.id_quotation LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  			OR a.date LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR c.name_customer LIKE '%" . $this->db->escape_like_str($like_value) . "%'
				OR d.nm_type_project LIKE '%" . $this->db->escape_like_str($like_value) . "%'
  	        )
			";

    $data['totalData'] = $this->db->query($sql)->num_rows();
    $data['totalFiltered'] = $this->db->query($sql)->num_rows();
    $columns_order_by = array(
      0 => 'nomor',
      1 => 'id_mso',
      2 => 'date',
      3 => 'id_quotation',
      4 => 'name_customer',
      5 => 'nm_type_project',
      6 => 'no_po',
      7 => 'status'
    );

    $sql .= " ORDER BY a.id_mso ASC, " . $columns_order_by[$column_order] . " " . $column_dir . " ";
    $sql .= " LIMIT " . $limit_start . " ," . $limit_length . " ";

    $data['query'] = $this->db->query($sql);
    return $data;
  }


  // public function modal_Process()
  public function create_mso()
  {
    $data           = $this->db->get_where('quotation_header', array('status' => '1', 'id_mso' => null))->result();
    // echo "<pre>";
    // print_r($this->input->post('type'));
    // echo "</pre>";
    // exit;

    $this->template->set([
      'data' => $data

    ]);

    $this->template->render('create_mso');
  }

  public function edit_mso()
  {
    $id_mso         = $this->input->post('id');
    $dataMso         = $this->db->get_where('mso_proses_header', ['id_mso' => $id_mso])->row();
    $newId          = $dataMso->id_quotation;

    $data           = $this->db->get_where('quotation_header', array('id_quotation' => $newId))->row();
    $customer       = $this->db->get_where('master_customer', array('id_customer' => $data->id_customer))->row();
    $cat_cust       = $this->db->get_where('child_customer_category', array('id_category_customer' => $data->id_cust_cut))->row();
    $disc_cat       = $this->db->get_where('discount_category', array('id_category' => $data->id_disc_cat))->row();
    $type_pro       = $this->db->get_where('type_project', array('id_type_project' => $data->id_type_project))->row();
    $pic_cust       = $this->db->get_where('child_customer_pic', array('id_customer' => $data->id_customer))->row();
    $karyawan       = $this->db->get_where('karyawan', array('id_karyawan' => $data->id_karyawan))->row();
    $rooms          = $this->db->get_where('quotation_room', array('id_quotation' => $data->id_quotation))->result();

    // echo "<pre>";
    // print_r($id_mso);
    // echo "</pre>";
    $this->template->set([
      'dataMso' => $dataMso,
      'data' => $data,
      'customer' => $customer,
      'cat_cust' => $cat_cust,
      'pic_cust' => $pic_cust,
      'disc_cat' => $disc_cat,
      'type_pro' => $type_pro,
      'karyawan' => $karyawan,
      'rooms' => $rooms,
      'type' => $this->input->post('type')
    ]);
    $this->template->render('form_mso');
  }

  public function view_mso()
  {
    $id_mso         = $this->input->post('id');
    $dataMso         = $this->db->get_where('mso_proses_header', ['id_mso' => $id_mso])->row();
    $newId          = $dataMso->id_quotation;

    $data           = $this->db->get_where('quotation_header', array('id_quotation' => $newId))->row();
    $customer       = $this->db->get_where('master_customer', array('id_customer' => $data->id_customer))->row();
    $cat_cust       = $this->db->get_where('child_customer_category', array('id_category_customer' => $data->id_cust_cut))->row();
    $disc_cat       = $this->db->get_where('discount_category', array('id_category' => $data->id_disc_cat))->row();
    $type_pro       = $this->db->get_where('type_project', array('id_type_project' => $data->id_type_project))->row();
    $pic_cust       = $this->db->get_where('child_customer_pic', array('id_customer' => $data->id_customer))->row();
    $karyawan       = $this->db->get_where('karyawan', array('id_karyawan' => $data->id_karyawan))->row();
    $rooms          = $this->db->get_where('quotation_room', array('id_quotation' => $data->id_quotation))->result();

    // echo "<pre>";
    // print_r($id_mso);
    // echo "</pre>";
    $this->template->set([
      'dataMso' => $dataMso,
      'data' => $data,
      'customer' => $customer,
      'cat_cust' => $cat_cust,
      'pic_cust' => $pic_cust,
      'disc_cat' => $disc_cat,
      'type_pro' => $type_pro,
      'karyawan' => $karyawan,
      'rooms' => $rooms,
      'type' => $this->input->post('type')
    ]);
    $this->template->render('view_mso');
  }

  public function dataMso()
  {
    // echo "<pre>";
    // print_r($this->input->post('type'));
    // echo "</pre>";
    // exit;

    $id = $this->input->post('id');
    // print_r($id);
    $newId = str_replace('-', '/', $id);
    $data           = $this->db->get_where('quotation_header', array('id_quotation' => $newId))->row();
    $customer       = $this->db->get_where('master_customer', array('id_customer' => $data->id_customer))->row();
    $cat_cust       = $this->db->get_where('child_customer_category', array('id_category_customer' => $data->id_cust_cut))->row();
    $disc_cat       = $this->db->get_where('discount_category', array('id_category' => $data->id_disc_cat))->row();
    $type_pro       = $this->db->get_where('type_project', array('id_type_project' => $data->id_type_project))->row();
    $pic_cust       = $this->db->get_where('child_customer_pic', array('id_customer' => $data->id_customer))->row();
    $karyawan       = $this->db->get_where('karyawan', array('id_karyawan' => $data->id_karyawan))->row();
    $rooms          = $this->db->get_where('quotation_room', array('id_quotation' => $data->id_quotation))->result();

    $getId         = $this->db->query("SELECT max(LEFT(id_mso,5)) id_mso FROM mso_proses_header ORDER BY id_mso DESC LIMIT 1")->row();
    $num = $getId->id_mso + 1;
    $nomor = str_pad($num, 5, "0", STR_PAD_LEFT);
    $id_mso = $nomor . '/MSO/' . date('m') . '/' . date('y');


    // echo "<pre>";
    // print_r($customer);
    // echo "</pre>";
    $this->template->set([
      'data' => $data,
      'customer' => $customer,
      'cat_cust' => $cat_cust,
      'pic_cust' => $pic_cust,
      'disc_cat' => $disc_cat,
      'type_pro' => $type_pro,
      'karyawan' => $karyawan,
      'rooms' => $rooms,
      'id_mso'    => $id_mso,
      'type' => $this->input->post('type')
    ]);
    $this->template->render('form_mso');
  }


  public function saveDataMso()
  {
    $data                 = $this->input->post();
    $type                 = $data['type'];
    // echo "<pre>";
    // print_r($data);
    // print_r($type);
    // echo "</pre>";
    // exit;

    if (!empty($data)) {

      if (!empty($data['pemasangan'])) {
        $ArrPasang = array();
        foreach ($data['pemasangan'] as $ps => $pasang) {
          $ArrPasang[$ps]['id_ruangan']       = $pasang['id_ruangan'];
          // $ArrPasang[$ps]['nama_ruangan']     = $pasang['nama_ruangan'];
          // $ArrPasang[$ps]['lantai']           = $pasang['lantai'];
          // $ArrPasang[$ps]['jendela']          = $pasang['jendela'];
          $ArrPasang[$ps]['installation_date']       = $pasang['tgl_pasang'];
          $ArrPasang[$ps]['notes']               = $pasang['keterangan'];
        }
      }


      $insertData  = array(
        'date'                 => $data['date_mso'],
        'id_quotation'         => $data['id_quotation'],
        'no_po'                 => $data['po_number'],
        'pic_delivery'         => $data['pic_delivery'],
        'delivery_phone'       => $data['delivery_phone'],
        'delivery_addr'        => $data['delivery_addr'],
        'pic_installation'     => $data['pic_installation'],
        'installation_addr'    => $data['installation_addr'],
        'pic_invoice'          => $data['pic_invoice'],
        'phone_pic_inv'        => $data['phone_pic_inv'],
        'address_inv'          => $data['address_inv'],
        'payment_term'         => $data['payment_term'],
        'payment_percent_1'    => $data['paymentDpPersen1'],
        'payment_value_1'      => $data['paymentDpValue1'],
        'payment_percent_2'    => $data['paymentDpPersen2'],
        'payment_value_2'      => $data['paymentDpValue2'],
        'type_payment'         => $data['type_payment'],
        'tempo_week'           => $data['tempo_week'],
        'status'               => $data['status']
      );

      $this->db->trans_begin();
      if ($type == 'edit') {
        $insertData['modified_on'] = date('Y-m-d H:i:s');
        $insertData['modified_by'] = $this->auth->user_id();
        $this->db->where('id_mso', $data['id_mso'])->update('mso_proses_header', $insertData);
        $this->db->update_batch('quotation_room', $ArrPasang, 'id_ruangan');
        $this->db->update('quotation_header', ['id_mso' => $data['id_mso']], ['id_quotation' => $data['id_quotation']]);
      } else {
        $insertData['id_mso'] = $data['id_mso'];
        $insertData['activation'] = '1';
        $insertData['created_on'] = date('Y-m-d H:i:s');
        $insertData['created_by'] = $this->auth->user_id();

        $this->db->insert('mso_proses_header', $insertData);
        $this->db->update('quotation_header', ['id_mso' => $data['id_mso']], ['id_quotation' => $data['id_quotation']]);
        $this->db->update_batch('quotation_room', $ArrPasang, 'id_ruangan');
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
    } else {
      $Arr_Kembali  = array(
        'pesan'    => 'Failed Add Changes. Please try again later ...',
        'status'  => 0
      );
    }
    echo json_encode($Arr_Kembali);
  }

  public function cencelMso()
  {
    $id_mso = $this->input->post('id_mso');

    if ($id_mso != '') {
      $this->db->trans_begin();
      $this->db->update('mso_proses_header', ['status' => 'CENCEL'], ['id_mso' => $id_mso]);
      $this->db->trans_complete();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $Arr_Kembali  = array(
          'pesan'    => 'Failed. Please try again later ...',
          'status'  => 0
        );
      } else {
        $this->db->trans_commit();
        $Arr_Kembali  = array(
          'pesan'    => 'Success cencel data. Thanks ...',
          'status'  => 1
        );
      }
    } else {
      $Arr_Kembali  = array(
        'pesan'    => 'Failed. Not Id for cencel...',
        'status'  => 0
      );
    }
    echo json_encode($Arr_Kembali);
  }

  public function print_mso($id)
  {

    $mpdf = new mPDF('', '', '', '', '', '', '', '', '', '');
    $mpdf->SetImportUse();
    $mpdf->RestartDocTemplate();

    $id_mso = str_replace('-', '/', $id);
    $dataMso         = $this->db->get_where('mso_proses_header', ['id_mso' => $id_mso])->row();
    $id_qtt          = $dataMso->id_quotation;
    $data           = $this->db->get_where('quotation_header', array('id_quotation' => $id_qtt))->row();
    $customer       = $this->db->get_where('master_customer', array('id_customer' => $data->id_customer))->row();
    $cat_cust       = $this->db->get_where('child_customer_category', array('id_category_customer' => $data->id_cust_cut))->row();
    $disc_cat       = $this->db->get_where('discount_category', array('id_category' => $data->id_disc_cat))->row();
    $type_pro       = $this->db->get_where('type_project', array('id_type_project' => $data->id_type_project))->row();
    $pic_cust       = $this->db->get_where('child_customer_pic', array('id_customer' => $data->id_customer))->row();
    $karyawan       = $this->db->get_where('karyawan', array('id_karyawan' => $data->id_karyawan))->row();
    $rooms         = $this->db->get_where('quotation_room', array('id_quotation' => $data->id_quotation))->result();

    // echo "<pre>";
    // print_r($customer);
    // echo "</pre>";
    $this->template->set([
      'data' => $data,
      'dataMso' => $dataMso,
      'customer' => $customer,
      'cat_cust' => $cat_cust,
      'pic_cust' => $pic_cust,
      'disc_cat' => $disc_cat,
      'type_pro' => $type_pro,
      'karyawan' => $karyawan,
      'rooms' => $rooms
    ]);

    $show = $this->template->load_view('print_mso', $data);

    $this->mpdf->AddPage('L');
    $this->mpdf->WriteHTML($show);
    $this->mpdf->Output();
  }
}
