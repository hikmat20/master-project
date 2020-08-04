<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table th {
      padding: 5px
    }

    ul li {
      list-style-type: square;
    }

    .table-af tr td {
      text-align: center;
    }
  </style>
</head>

<body style="font-family:Arial;font-size:12px">
  <?php
  // echo "<pre>";
  // print_r($customer);
  // echo "<pre>";
  // exit;
  $date = date('Y-m-d');
  ?>

  <p>Jakarta, <?= date('d F Y') ?></p>
  <div class="">
    <p>
      Kepada Yth,<br>
      <b><?= $customer->name_customer ?></b> <br>
      <?= $customer->address_office ?>
    </p>

    <p>
      <b>Ref. <?= $data->id_quotation ?></b><br>
      <b>Perihal: Penawaran Harga </b>
    </p>

    <p>
      Dengan hormat, <br><br>
      Terima kasih atas kepercayaan yg telah diberikan kepada kami PT. Idefab Cipta.
      Sesuai dengan permintaan maka kami lampirkan penawaran harga, dengan total keseluruhannya :
    </p>

    <p style="padding: 5px;border:1px solid #ccc;background-color:yellow"><b> Rp. <?= number_format($data->grand_total) ?> GRAND TOTAL</b></p>
    <p>dengan perincian terlampir.</p>

    <p>
      <b>Syarat Pembayaran:</b> <br>
      - 80% sebagai uang muka, sebelum kain diproduksi <br>
      - 20% setelah barang terpasang / diterima
    </p>
    <p><b>
        Pembayaran dapat dilakukan via transfer atau debet BCA
        Jika pembayaran menggunakan kartu kredit, dikenakan biaya tambahan sebesar 2% ( syarat dan ketentuan berlaku ).
        Pembayaran ke : Rekening BCA atas nama PT IDEFAB CIPTA
        Nomor Rekening: 161-8668-168
      </b></p>
    <p>
      Besar harapan kami penawaran tersebut dapat diterima dengan baik. <br>
      Sambil menunggu konfirmasinya kami mengucapkan banyak terima kasih.
    </p>
    <b><u>Notes:</u></b>
    <ol>
      <li><b>Ketentuan Harga</b>
        <ul>
          <li>
            <p>Untuk quantity & quality yang tercantum dalam penawaran ini sudah termasuk PPN 10%</p>
          </li>
          <li>
            <p>Berlaku Hanya untuk pengiriman daerah Jakarta </p>
          </li>
          <li>
            <p>Harga belum termasuk biaya indent by air </p>
          </li>
        </ul>
      </li>
      <li><b>Ketentuan Harga dan Stok</b>
        <ul>
          <li>
            <p>Harga dapat berubah sewaktu waktu kecuali setelah menerima Purchase Order/ Down Payment </p>
          </li>
          <li>
            <p>Stock kain berjalan dan dapat berubah sewaktu waktu tanpa pemberitahuan</p>
          </li>
          <li>
            <p>Stock kain tidak dapat di booking kecuali sudah menerima pembayaran Down Payment</p>
          </li>
        </ul>
      </li>
      <li><b>Lama produksi kain</b><br>
        <p>± 4-6 minggu setelah Down Payment diterima (apabila kain tidak ready stock di Jakarta), produksi dimulai setelah Down Payment diterima</p>
      </li>
      <li><b>Lama pengiriman kain</b><br>
        <ul>
          <li>
            <p>(By Sea): ± 4-6 minggu setelah produksi kain selesai, tidak termasuk " Red Light " / kasus khusus
          </li>
          <li>
            <p>(By Air): ± 2-3 minggu setelah produksi kain selesai (pengiriman by air bertahap, sekali pengiriman ± 150 meter/hari), tidak termasuk " Red Light " / kasus khusus
          </li>
        </ul>
        </p>
      </li>
      <li><b>Lama penjahitan</b><br>
        <p>± ... minggu (setelah pengukuran final dilapangan)</p>
      </li>
      <li><b>Lama pemasangan</b><br>
        <p> ± ... minggu (dengan syarat lapangan sudah bersih dan siap pasang)</p>
      </li>
      <li><b>Syarat Pemasangan:</b>
        <ul>
          <li>
            <p>
              Untuk pemasangan rail di plafond (cove), perlu perkuatan triplek setebal 12 mm - 18 mm. <br>
              Pengadaan triplek bukan merupakan scope kerja Idefab dan harus disediakan oleh kontraktor sipil/ interior
            </p>
          </li>
          <li>
            <p>
              Untuk pemasangan rail expose di tembok, tembok harus terbuat dari bata/ beton. <br>
              Rail tidak dapat dipasang di tembok precast/ tembok triplek/ gypsum
            </p>
          </li>
          <li>
            <p>
              Untuk pemasangan motorised system, kabel listrik harus disediakan oleh kontraktor sipil/ ME <br>
              Pengadaan kabel bukan merupakan scope kerja Idefab. <br>
              Idefab hanya bertugas untuk menyambungkan kabel ke sistem motor / rail
            </p>
          </li>
          <li>
            <p>
              <b>Pemasangan hanya akan dimulai apabila lapangan sudah bersih dan siap pasang, dengan syarat sebagai berikut:</b><br>
              Plafond (cove) dan tembok sudah bersih, selesai pasang wallpaper/ selesai proses cat & cat sudah kering<br>
              Semua pekerjaan di area jendela seperti pemasangan kaca, kusen, pintu kaca, dan sebagainya sudah rampung dan bersih<br>
              Semua pekerjaan area lantai seperti pemasangan dan poles marmer, pasang & pembersihan karpet, sudah selesai<br>
              Loose furniture item sudah masuk ke lokasi

            </p>
          </li>
        </ul>
      </li>
      <li><b>Jam kerja pemasangan</b><br>
        <p>Senin - Jumat diantara jam 09:00 WIB - 18:00 WIB</p> <br>
        <p><b>Idefab akan kenakan biaya tambahan lembur sebesar Rp 75,000/jam apabila:</b>
          <ul>
            <li>
              <p>Ada permintaan dari customer untuk pemasangan diluar jam kerja</p>
            </li>
            <li>
              <p>Teknisi lembur untuk menyelesaikan pekerjaan yang diminta customer diselesaikan di hari tersebut (Biaya lembur tambahan akan di charge bersama dengan Balance Payment)</p>
            </li>
            <li>
              <p>Biaya ukur di hari Libur sebesar Rp. 250.000,- / visit per teknisi</p><br>
            </li>
            <p><b>Idefab tidak akan kenakan biaya tambahan lembur apabila:</b></p><br>
            <p>
              Pemasangan dimulai terlambat akibat keterlambatan dari pihak Idefab sehingga terpaksa lembur untuk <br>
              menyelesaikan pekerjaan yang seharusnya dapat selesai di hari tersebut
            </p>
          </ul>

        </p>
      </li>
      <li><b>Perubahan Harga Kontrak:</b><br>
        <p>
          Apabila ada perbedaan ukuran antara penawaran dan ukuran final lapangan sebesar lebar dan/atau tinggi <br>
          lebih dari +/- 10 cm maka harga penawaran/ harga kontrak akan disesuaikan kembali.
        </p>
      </li>
      <li><b>Perihal Penagihan:</b> <br>
        <p>Idefab akan kenakan biaya revisi jahitan / revisi rail/ revisi item, apabila ada terdapat revisi yang disebabkan oleh berikut:
        </p>
        <ul>
          <li>
            <p>Perubahan lapangan secara mendadak (dengan keadaan barang sudah selesai diproduksi)</p>
          </li>
          <li>
            <p>Permintaan perubahan model jahitan/model rail/ item lainnya dari apa yang sudah disepakati bersama di penawaran</p>
          </li>
        </ul>
      </li>
      <li><b>Biaya Revisi:</b>
        <ul>
          <li>
            <p>Pembayaran jatuh tempo 2 minggu sejak tanggal invoice</p>
          </li>
          <li>
            <p>Produksi hanya akan dimulai setelah Down Payment lunas</p>
          </li>
          <li>
            <p>Apabila barang sudah selesai produksi namun lapangan belum siap pasang / barang belum dapat dikirim karena alasan apapun yang bukan disebabkan oleh Idefab, sehingga barang harus dititipkan di gudang Idefab selama lebih dari 2 minggu setelah produksi selesai, maka Idefab berhak menerima total pembayaran sebesar 80% dari total nilai kontrak.</p>
          </li>
          <li>
            <p>Idefab akan melampirkan foto barang yang sudah selesai diproduksi sebagai lampiran penagihan</p>
          </li>
        </ul>

      </li>
      <li><b>Harga Air Freight:</b><br>
        <p>Apabila kain perlu diimpor melalui metode air freight, maka akan dikenakan harga tambahan sbb:</p><br>
      </li>
    </ol>
    <p>
      <table border="1" style="border-collapse: collapse;" class="table-af" width="100%">
        <thead>
          <tr>
            <th rowspan="2">Fabric Quantity dari kode pabrik yang sama</th>
            <th colspan="2">BIAYA AIR FREIGHT FABRIC / meter</th>
          </tr>
          <tr>
            <th>Weight < 400 gsm </th> <th>Weight > 400 gsm</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>10 meter - 50 meter</th>
            <td>Rp 150,000</td>
            <td>Rp 185,000</td>
          </tr>
          <tr>
            <th>51 - 100 meter</th>
            <td>Rp 130,000</td>
            <td>Rp 165,000</td>
          </tr>
          <tr>
            <th>101 - 150 meter</th>
            <td>Rp 110,000</td>
            <td>Rp 145,000</td>
          </tr>
          <tr>
            <th>151 meter - 200 meter</th>
            <td>Rp 90,000</td>
            <td>Rp 125,000</td>
          </tr>
          <tr>
            <th> > 200 meter</th>
            <td>Rp 80,000</td>
            <td>Rp 100,000</td>
          </tr>
        </tbody>
      </table>
      <p>( Kenaikan harga ini berlaku 1 November 2019 )</p>
    </p>
    <ol start="13">
      <li><b>Harga dan keterangan dalam surat penawaran ini berlaku 1 bulan dari tanggal di atas.</b></li>
      <li><b>Barang yang sudah dibeli, tidak bisa dikembalikan / ditukar / dibatalkan</b></li>
    </ol>
  </div>
  <br>
  <table width="100%" class="table-af">
    <tr>
      <td>
        <p>Hormat kami, Menyetujui,</p>
      </td>
      <td></td>
      <td> Menyetujui,</td>
    </tr>
    <tr>
      <td>
        <br>
        <br>
        <br>
        <br>
        <br>
      </td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>(________________________)</td>
      <td></td>
      <td>(________________________)</td>
    </tr>
    <?php

    // echo "<pre>";
    // print_r($karyawan);
    // echo "<pre>";
    // exit;
    ?>
    <tr>
      <td>Sales : <?= $karyawan->nama_karyawan ?></td>
      <td></td>
      <td>Nama Jelas</td>
    </tr>
  </table>
  <div>
    <!-- <p>Contact Person (Admin) : <br> -->
    Email: <?= $karyawan->email ?>
    </p>
    <p>
    </p>
  </div>

</body>

</html>