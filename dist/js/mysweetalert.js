const flashData = $('.flash-data').data('flashdata');

if(flashData){
	if(flashData=='Gagal'){
	Swal.fire({
	  position: 'top-end',
	  icon: 'error',
	  title: 'Data ' +flashData+' Ditambahkan Karena sudah Ada',
	  showConfirmButton: false,
	  timer: 1500
	})
	}else{
	Swal.fire({
	  position: 'top-end',
	  icon: 'success',
	  title: 'Data Berhasil di ' +flashData,
	  showConfirmButton: false,
	  timer: 1500
	})
	}

	
}

//hapus
$('.deleteRecord').on('click',function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		  title: 'Apakah Anda Yakin?',
		  text: "Data akan dihapus!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Hapus Data!'
		}).then((result) => {
		  if (result.value) {
			document.location.href = href;
		  }
		})
});

//hapus
$('.tolakData').on('click',function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		  title: 'Apakah Anda Yakin?',
		  text: "Permintaan akan diTolak!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Tolak Permintaan!'
		}).then((result) => {
		  if (result.value) {
			document.location.href = href;
		  }
		})
});