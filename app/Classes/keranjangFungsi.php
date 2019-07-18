<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keranjangFungsi extends Model
{
    <!-- Konten -->
	<section class="konten">
		<div class="container">
			<h1>Produk Terbaru</h1>

			<div class="row">
				<?php 
				$ambil = barang::all();
				<?php 
				while(
				$produk = $ambil->fetch_assoc());
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="Foto Produk/<?php echo $produk['Gambar']; ?>" width= 100% height = 100% alt="">
						<div class="caption">
							<h3><?php echo $produk['Nama_Barang']; ?></h3>
							<h5>Rp <?php echo number_format($produk['Harga_Barang']); ?></h5>
							<a href="beli.php?id=<?php echo $produk['ID_Barang'];?>" class="btn btn-primary">Beli</a>
							<a href="detail.php?id=<?php echo $produk['ID_Barang'];?>"class="btn btn-default">Detail</a>
						</div>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</section>
	<!-- Konten -->
}
