<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
		    @page {
            margin: 0;
        }
        * { padding: 0; margin: 5; }
        @font-face {
            font-family: "source_sans_proregular";
            src: local("Source Sans Pro"), url("<?php echo base_url();?>fonts/DOTMATRI.TTF") format("truetype");
            font-weight: normal;
            font-style: normal;

        }
        .custom_font{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
        }
		.logo{
			display:flex;
			align-items:center;
		}
		table, th, td {
		  border: 0px solid black;
		}
  </style>
</head>
<body class="custom_font">
	<div>
	  <center><div><img width="100" height="100" src="<?php echo base_url();?>gambar/logo/logo_resto.png"><br>NAMA RESTO <?php echo $data_resto->nama_resto;?>
      </div>
	  
	  </center>
      NO NOTA <?php echo $id_pemesanan->id;?>
      <br>
      PEMESAN <?php echo $data_pemesanan->nama_pemesan;?>
	  <br>
      Tanggal Order <?php echo $data_pemesanan->tanggal;?>
	  <br>
      Nama Waiters <?php echo $data_resto->nama;?>
	  <br>

	   <table width="100%">
	  	<tbody>


  	  		<?php 
			$subharga=0;
			$no=1;
			?>
  	  		<?php foreach($datamenu as $d): ?>
  	  		  <tr>

  	  			<td><?php echo $no; ?></td>
  	  			<td><?php echo $d->menu; ?></td>
  	  			<td><?php echo $d->jumlah_pesan; ?> : </td>
  	  			<td><?php echo $d->subharga; ?></td>
				<td><?php echo (int)$d->jumlah_pesan*(int)$d->subharga; ?></td>
  	  		  </tr>
  	  		<?php 
			$subharga+=(int)$d->jumlah_pesan*(int)$d->subharga;
			$no++; 
			?>
  	  		<?php endforeach; ?>

          <?php foreach($datapaket as $d): ?>
  	  		  <tr>

  	  			<td><?php echo $no; ?></td>
  	  			<td><?php echo $d->nama_paket; ?></td>
  	  			<td><?php echo $d->jumlah_pesan; ?> : </td>
  	  			<td><?php echo $d->subharga; ?></td>
				<td><?php echo (int)$d->jumlah_pesan*(int)$d->subharga; ?></td>
  	  		  </tr>
  	  		<?php 
			$subharga+=(int)$d->jumlah_pesan*(int)$d->subharga;
			$no++;
			?>
  	  		<?php endforeach; ?>

			<tr>
			
            <td colspan="5">-----------------------------------------------</td>

            </tr>
            <tr>
			
            <td colspan="3"></td>
            <td>Total bayar :</td>
			<td><?php echo $data_pemesanan->total_harga; ?></td>
            </tr>
            <tr>

            <td colspan="3"></td>
            <td>dibayar :</td>
			<td><?php echo $data_pembayaran->nominal; ?></td>
            </tr>

			<tr>

            <td colspan="3"></td>
            <td>diskon : </td>
			<td><?php echo $data_pembayaran->diskon; ?></td>
            </tr>

            <tr>

            <td colspan="3"></td>
            <?php
              $kembali=$data_pembayaran->nominal-$data_pemesanan->total_harga;
             ?>
            <td>kembali : </td>
			<td><?php echo $kembali; ?></td>
            </tr>
			
			<tr>

            <td colspan="3">Terimaksih atas kunjungan anda</td>
            <td></td>
            </tr>

	  	</tbody>
	  </table>
	 </div>
</body>
</html>
