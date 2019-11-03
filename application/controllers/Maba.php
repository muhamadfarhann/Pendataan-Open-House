<?php
 
class Maba extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Maba_model');
    } 

    /*
     * Listing of maba
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('maba/index?');
        $config['total_rows'] = $this->Maba_model->get_all_maba_count();
        $this->pagination->initialize($config);

        $data['maba'] = $this->Maba_model->get_all_maba($params);
        
        $data['_view'] = 'maba/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new maba
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('kelas','Kelas','required');
		$this->form_validation->set_rules('nrp','Nrp','required');
		$this->form_validation->set_rules('no_wa','No Wa','required');
		$this->form_validation->set_rules('line','Line','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nama' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'nrp' => $this->input->post('nrp'),
				'no_wa' => $this->input->post('no_wa'),
				'line' => $this->input->post('line'),
            );
            
            $maba_id = $this->Maba_model->add_maba($params);
            redirect('maba/index');
        }
        else
        {            
            $data['_view'] = 'maba/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a maba
     */
    function edit($id)
    {   
        // check if the maba exists before trying to edit it
        $data['maba'] = $this->Maba_model->get_maba($id);
        
        if(isset($data['maba']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('kelas','Kelas','required');
			$this->form_validation->set_rules('nrp','Nrp','required');
			$this->form_validation->set_rules('no_wa','No Wa','required');
			$this->form_validation->set_rules('line','Line','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nama' => $this->input->post('nama'),
					'kelas' => $this->input->post('kelas'),
					'nrp' => $this->input->post('nrp'),
					'no_wa' => $this->input->post('no_wa'),
					'line' => $this->input->post('line'),
                );

                $this->Maba_model->update_maba($id,$params);            
                redirect('maba/index');
            }
            else
            {
                $data['_view'] = 'maba/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The maba you are trying to edit does not exist.');
    } 

    /*
     * Deleting maba
     */
    function remove($id)
    {
        $maba = $this->Maba_model->get_maba($id);

        // check if the maba exists before trying to delete it
        if(isset($maba['id']))
        {
            $this->Maba_model->delete_maba($id);
            redirect('maba/index');
        }
        else
            show_error('The maba you are trying to delete does not exist.');
    }
    
    function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['maba'] = $this->Maba_model->tampil_data('maba')->result();

        $this->load->view('maba/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Maba Open House 2019.pdf", array('Attachment' => 0 ));
    }

    function excel()
    {
        $data['maba'] = $this->Maba_model->tampil_data('maba')->result();

        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("Barudak Seni Computer");
        $object->getProperties()->setLastModifiedBy("Barudak Seni Computer");
        $object->getProperties()->setTitle("Data Maba");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Nama');
        $object->getActiveSheet()->setCellValue('C1', 'Kelas');
        $object->getActiveSheet()->setCellValue('D1', 'NRP');
        $object->getActiveSheet()->setCellValue('F1', 'No Whatsapp');
        $object->getActiveSheet()->setCellValue('G1', 'Line');

        $baris = 2;
        $no = 1;

        foreach($data['maba'] as $m)
        {
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $m->nama);
            $object->getActiveSheet()->setCellValue('C'.$baris, $m->kelas);
            $object->getActiveSheet()->setCellValue('D'.$baris, $m->nrp);
            $object->getActiveSheet()->setCellValue('E'.$baris, $m->no_wa);
            $object->getActiveSheet()->setCellValue('F'.$baris, $m->line);

            $baris++;
        }

        $filename = "Data Maba Open House 2019".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Maba");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    function data()
    {
        $data['maba'] = $this->Maba_model->jumlahData();
        $this->load->view('layouts/main',$data);
    }
}
