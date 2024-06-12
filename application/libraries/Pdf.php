<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    public function __construct()
    {
        parent::__construct();
    }
}