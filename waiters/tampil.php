 <?php
            $query_trx = "SELECT MAX(id) AS id_trx FROM pemesanan WHERE status = 'produksi'";
            $hasil_trx = mysqli_query($koneksi,$query_trx);
            $data=mysqli_fetch_array($hasil_trx);
            $id_trx = $data['id_trx'];
            $id_pemesanan = $id_trx+1;
            ?>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr style="background: #99ffff;">
                  <th style="width: 5px;">No</th>
                  <th style="width: 65px;">Menu</th>
                  <th style="width: 30px;">Qty</th>
                </tr>
                <?php
                  $querytampildata = mysqli_query ($koneksi, "
                    SELECT pemesanan_menu.*,menu.*, pemesanan_menu.id AS idpemesananmenu
                    FROM pemesanan_menu
                    JOIN menu ON menu.id = pemesanan_menu.id_menu 
                    WHERE pemesanan_menu.id_pemesanan='$id_pemesanan' ORDER BY pemesanan_menu.id  DESC ");
                  $no = 1;
                  while ($datatampilpesanan = mysqli_fetch_array($querytampildata)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $datatampilpesanan['menu'] ?></td>
                  <td>
                    <div class="row">
                      <div style="width: 20px; display: inline-block; padding: 0px 0px;" class="col-md-4">
                        <a href="updateqtymenukurang.php?idpemesananmenu=<?php echo $datatampilpesanan['idpemesananmenu']; ?>" class="btn btn-block btn-primary btn-xs">-</a>
                      </div>
                      <div style="display: inline-block; padding: 0px 0px;" class="col-md-4">
                        <input style="width: 30px; text-align: center;" type="text" readonly="" name="qty" value="<?php echo $datatampilpesanan['jumlah_pesan']; ?>">
                      </div>
                      <div style="width: 20px; display: inline-block; padding: 0px 0px; margin-right: 5px;" class="col-md-4">
                        <a href="updateqtymenutambah.php?idpemesananmenu=<?php echo $datatampilpesanan['idpemesananmenu']; ?>" class="btn btn-block btn-success btn-xs">+</a>
                      </div>
                      </div>
                  </td>
                </tr>
                <?php } ?>
                <tr>
                  <td><span class="fa fa-plus-circle"></span></td>
                  <td><a data-toggle="modal" data-target="#modal-default">Tambah Menu</a></td>
                  <td></td>
                </tr>
                <!-- pembatas pesanan paket -->
                <tr style="background: #99ffff;">
                 <th style="width: 5px;">No</th>
                  <th style="width: 65px;">Paket</th>
                  <th style="width: 30px;">Qty</th>
                </tr>
                <?php
                  $querytampildata = mysqli_query ($koneksi, "
                    SELECT pemesanan_paket.*,paket.*,pemesanan_paket.id AS idpemesananpaket
                    FROM pemesanan_paket
                    JOIN paket ON paket.id = pemesanan_paket.id_paket 
                    WHERE pemesanan_paket.id_pemesanan='$id_pemesanan'
                    ORDER BY pemesanan_paket.id DESC");
                  $no = 1;
                  while ($datatampilpesanan = mysqli_fetch_array($querytampildata)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $datatampilpesanan['nama_paket'] ?></td>
                    <td>
                    <div class="row">
                      <div style="width: 20px; display: inline-block; padding: 0px 0px;" class="col-md-4">
                        <a href="updateqtypaketkurang.php?idpemesananpaket=<?php echo $datatampilpesanan['idpemesananpaket']; ?>" class="btn btn-block btn-primary btn-xs">-</a>
                      </div>
                      <div style="display: inline-block; padding: 0px 0px;" class="col-md-4">
                        <input style="width: 30px; text-align: center;" type="text" readonly="" name="qty" value="<?php echo $datatampilpesanan['jumlah_pesan']; ?>">
                      </div>
                      <div style="width: 20px; display: inline-block; padding: 0px 0px; margin-right: 5px;" class="col-md-4">
                        <a href="updateqtypakettambah.php?idpemesananpaket=<?php echo $datatampilpesanan['idpemesananpaket']; ?>" class="btn btn-block btn-success btn-xs">+</a>
                      </div>
                      </div>
                  </td>
                </tr>
                <?php } ?>
                <tr>
                  <td><span class="fa fa-plus-circle"></span></td>
                  <td><a data-toggle="modal" data-target="#modal-default1">Tambah Paket</a></td>
                  <td></td>
                </tr>
              </table>
            </div>