<?php
 
class Maba_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function tampil_data()
    {
        return $this->db->get('maba');
    }
    /*
     * Get maba by id
     */
    function get_maba($id)
    {
        return $this->db->get_where('maba',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all maba count
     */
    function get_all_maba_count()
    {
        $this->db->from('maba');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all maba
     */
    function get_all_maba($params = array())
    {
        $this->db->order_by('id', 'ASC');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('maba')->result_array();
    }
        
    /*
     * function to add new maba
     */
    function add_maba($params)
    {
        $this->db->insert('maba',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update maba
     */
    function update_maba($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('maba',$params);
    }
    
    /*
     * function to delete maba
     */
    function delete_maba($id)
    {
        return $this->db->delete('maba',array('id'=>$id));
    }

    function jumlahData()
    {
        $query = $this->db->get('maba');
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
