<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<style>
@font-face {
font-family: 'DotMatrix Regular';
font-style: normal;
font-weight: normal;
src: local('DotMatrix Regular'), url('<?php echo base_url();?>fonts/DOTMATRI.TTF') format('woff');
}


@font-face {
font-family: 'DotMatrix_TR Regular';
font-style: normal;
font-weight: normal;
src: local('DotMatrix_TR Regular'), url('<?php echo base_url();?>fonts/DOTMATRI.TTF') format('woff');
}
</style>
<body>

	<center>

		<h4  style="font-family:'DotMatrix Regular';font-weight:normal;">NO NOTA : 1</h4>
	  <p style="font-family:'DotMatrix Regular';font-weight:normal;font-size:12px">
        Nama menu :
    </p>
    <p style="font-family:'DotMatrix Regular';font-weight:normal;font-size:12px">
        Nama paket :
    </p>

	</center>
  <script>
		window.print();
	</script>

</body>
</html>
