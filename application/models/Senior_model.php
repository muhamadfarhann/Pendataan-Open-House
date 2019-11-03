<?php
 
class Senior_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function tampil_data()
    {
        return $this->db->get('senior');
    }
    /*
     * Get senior by id
     */
    function get_senior($id)
    {
        return $this->db->get_where('senior',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all senior count
     */
    function get_all_senior_count()
    {
        $this->db->from('senior');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all senior
     */
    function get_all_senior($params = array())
    {
        $this->db->order_by('id', 'ASC');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('senior')->result_array();
    }
        
    /*
     * function to add new senior
     */
    function add_senior($params)
    {
        $this->db->insert('senior',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update senior
     */
    function update_senior($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('senior',$params);
    }
    
    /*
     * function to delete senior
     */
    function delete_senior($id)
    {
        return $this->db->delete('senior',array('id'=>$id));
    }

    // function cari data
    function cariDataSenior()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword); 
        $this->db->or_like('divisi', $keyword);
        $this->db->or_like('angkatan', $keyword);
        $this->db->or_like('line', $keyword);
        $this->db->or_like('no_wa', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('senior')->result_array();
    }

    function jumlahData()
    {
        $query = $this->db->get('senior');
        if ($query->num_rows()>0) 
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
    }
}
