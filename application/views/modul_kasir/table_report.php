<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
		    @page {
            margin: 0;
        }
        * { padding: 0; margin: 0; }
        @font-face {
            font-family: "source_sans_proregular";
            src: local("Source Sans Pro"), url("<?php echo base_url();?>fonts/DOTMATRI.TTF") format("truetype");
            font-weight: normal;
            font-style: normal;

        }
        .custom_font{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
        }
  </style>
</head>
<body class="custom_font">
	<div>
      NO NOTA <?php echo $id_pemesanan->id;?>
      <br>
      PEMESAN <?php echo $data_pemesanan->nama_pemesan;?>
	   <table>
	  	<tbody>


  	  		<?php $no=1; ?>
  	  		<?php foreach($datamenu as $d): ?>
  	  		  <tr>

  	  			<td><?php echo $no; ?></td>
  	  			<td><?php echo $d->menu; ?></td>
  	  			<td><?php echo $d->jumlah_pesan; ?> : </td>
  	  			<td><?php echo $d->subharga; ?></td>
            <td><?php echo (int)$d->jumlah_pesan*(int)$d->subharga; ?></td>
  	  		  </tr>
  	  		<?php $no++; ?>
  	  		<?php endforeach; ?>

          <?php foreach($datapaket as $d): ?>
  	  		  <tr>

  	  			<td><?php echo $no; ?></td>
  	  			<td><?php echo $d->nama_paket; ?></td>
  	  			<td><?php echo $d->jumlah_pesan; ?> : </td>
  	  			<td><?php echo $d->subharga; ?></td>
            <td><?php echo (int)$d->jumlah_pesan*(int)$d->subharga; ?></td>
  	  		  </tr>
  	  		<?php $no++; ?>
  	  		<?php endforeach; ?>


            <tr>

            <td></td>
            <td></td>
            <td></td>
            <td>Total bayar : <?php echo $data_pemesanan->total_harga; ?></td>
            </tr>
            <tr>

            <td></td>
            <td></td>
            <td></td>
            <td>dibayar : <?php echo $data_pembayaran->nominal; ?></td>
            </tr>

            <tr>

            <td></td>
            <td></td>
            <td></td>
            <?php
              $kembali=$data_pembayaran->nominal-$data_pemesanan->total_harga;
             ?>
            <td>kembali : <?php echo $kembali; ?></td>
            </tr>

	  	</tbody>
	  </table>
	 </div>
</body>
</html>
