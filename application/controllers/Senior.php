<?php

class Senior extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Senior_model');
    } 

    /*
     * Listing of senior
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('senior/index?');
        $config['total_rows'] = $this->Senior_model->get_all_senior_count();
        $this->pagination->initialize($config);

        $data['senior'] = $this->Senior_model->get_all_senior($params);
        
        $data['_view'] = 'senior/index';
        $this->load->view('layouts/main',$data);

        if ($this->input->post('keyword')) {
            $data['senior'] = $this->Senior_model->cariDataSenior();
        }
    }

    /*
     * Adding a new senior
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('divisi','Divisi','required');
		$this->form_validation->set_rules('angkatan','Angkatan','required');
        $this->form_validation->set_rules('line','Line','required');
        $this->form_validation->set_rules('no_wa','No Wa','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nama' => $this->input->post('nama'),
                'divisi' => $this->input->post('divisi'),
                'angkatan' => $this->input->post('angkatan'),
				'line' => $this->input->post('line'),
				'no_wa' => $this->input->post('no_wa'),
				'alamat' => $this->input->post('alamat'),
            );
            
            $senior_id = $this->Senior_model->add_senior($params);
            redirect('senior/index');
        }
        else
        {            
            $data['_view'] = 'senior/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a senior
     */
    function edit($id)
    {   
        // check if the senior exists before trying to edit it
        $data['senior'] = $this->Senior_model->get_senior($id);
        
        if(isset($data['senior']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('divisi','Divisi','required');
            $this->form_validation->set_rules('angkatan','Angkatan','required');
            $this->form_validation->set_rules('line','Line','required');
            $this->form_validation->set_rules('no_wa','No Wa','required');
            $this->form_validation->set_rules('alamat','Alamat','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nama' => $this->input->post('nama'),
                    'divisi' => $this->input->post('divisi'),
                    'angkatan' => $this->input->post('angkatan'),
					'line' => $this->input->post('line'),
					'no_wa' => $this->input->post('no_wa'),
					'alamat' => $this->input->post('alamat'),
                );

                $this->Senior_model->update_senior($id,$params);            
                redirect('senior/index');
            }
            else
            {
                $data['_view'] = 'senior/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The senior you are trying to edit does not exist.');
    } 

    /*
     * Deleting senior
     */
    function remove($id)
    {
        $senior = $this->Senior_model->get_senior($id);

        // check if the senior exists before trying to delete it
        if(isset($senior['id']))
        {
            $this->Senior_model->delete_senior($id);
            redirect('senior/index');
        }
        else
            show_error('The senior you are trying to delete does not exist.');
    }
    
    function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['senior'] = $this->Senior_model->tampil_data('senior')->result();

        $this->load->view('senior/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Senior Open House 2019.pdf", array('Attachment' => 0 ));
    }

    function excel()
    {
        $data['senior'] = $this->Senior_model->tampil_data('senior')->result();

        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("Barudak Seni Computer");
        $object->getProperties()->setLastModifiedBy("Barudak Seni Computer");
        $object->getProperties()->setTitle("Data Senior");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'No');
        $object->getActiveSheet()->setCellValue('B1', 'Nama');
        $object->getActiveSheet()->setCellValue('C1', 'Divisi');
        $object->getActiveSheet()->setCellValue('D1', 'Angkatan');
        $object->getActiveSheet()->setCellValue('E1', 'Line');
        $object->getActiveSheet()->setCellValue('F1', 'No Whatsapp');
        $object->getActiveSheet()->setCellValue('G1', 'Alamat');

        $baris = 2;
        $no = 1;

        foreach($data['senior'] as $s)
        {
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('B'.$baris, $s->nama);
            $object->getActiveSheet()->setCellValue('C'.$baris, $s->divisi);
            $object->getActiveSheet()->setCellValue('D'.$baris, $s->angkatan);
            $object->getActiveSheet()->setCellValue('E'.$baris, $s->line);
            $object->getActiveSheet()->setCellValue('F'.$baris, $s->no_wa);
            $object->getActiveSheet()->setCellValue('G'.$baris, $s->alamat);

            $baris++;
        }

        $filename = "Data Senior Open House 2019".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Senior");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
}
