<?php
use Dompdf\Dompdf;

class Dompdf_gen {
    public function __construct() {
        // Instantiate and use the dompdf class
        $dompdf = new Dompdf();
        // Assign the Dompdf object to the CI instance
        $CI = &get_instance();
        $CI->dompdf = $dompdf;
    }
}
