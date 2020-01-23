<?php
use Dompdf\Dompdf;
class PdfGenerator
{
  public function generate($html,$filename)
  {

    $dompdf = new DOMPDF();
    $dompdf->load_html($html, 'UTF-8');
	$customPaper = array(0,0,320,480);
	$dompdf->set_paper($customPaper);

	$dompdf->set_option('defaultMediaType', 'all');
	$dompdf->set_option('isFontSubsettingEnabled', true);
	$dompdf->set_option('isRemoteEnabled', true);
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}