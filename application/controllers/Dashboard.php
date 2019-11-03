<?php
 
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Senior_model');
        $this->load->model('Maba_model');
    }

    function index()
    {
        $data['_view'] = 'dashboard';
        $data['maba'] = $this->Maba_model->jumlahData();
        $data['senior'] = $this->Senior_model->jumlahData();
        $this->load->view('layouts/main',$data);
    }
}
