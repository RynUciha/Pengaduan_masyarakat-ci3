<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {

            redirect('BlockedController');
        }
        $this->load->model('Pengaduan_m');
    }

    // List all your items
    public function index()
    {
        $data['title'] = 'Generate Laporan';
        $data['laporan'] = $this->Pengaduan_m->laporan_pengaduan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/generate_laporan');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan()
    {
        $this->load->library('pdf'); // Load the PDF library
        $data['title'] = 'Laporan Pengaduan Masyarakat'; // Add the title variable

        // Get the laporan data from the model
        $laporan = $this->Pengaduan_m->laporan_pengaduan();

        // Convert the result to an array
        $data = array(
            'laporan' => $laporan,
        );

        // Load the view and capture the HTML content
        $html = $this->load->view('admin/cetak_laporan', $data, true);

        // Generate the PDF
        $pdf = new Pdf();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $pdf->Output('generate_laporan.pdf', 'I');
    }
}
?>
