<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed'); 
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);

 $dompdf->set_base_path("./assets/vendor/bootstrap/css/bootstrap.min.css");


class Pdf extends Dompdf { 
    public function __construct() { 
        parent::__construct();
    } 
} 
?>