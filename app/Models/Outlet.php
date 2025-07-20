<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all active outlets
    public function get_all($limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->from('ospos_outlets');
        $this->db->where('is_active', 1);
        $this->db->order_by('outlet_name', 'ASC');
        
        if ($limit != null && $offset != null) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get();
    }

    // Get outlet by ID
    public function get_info($outlet_id)
    {
        $this->db->select('*');
        $this->db->from('ospos_outlets');
        $this->db->where('outlet_id', $outlet_id);
        $this->db->where('is_active', 1);
        
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return false;
    }

    // Check if outlet exists
    public function exists($outlet_id)
    {
        $this->db->from('ospos_outlets');
        $this->db->where('outlet_id', $outlet_id);
        $this->db->where('is_active', 1);
        
        return $this->db->count_all_results() == 1;
    }

    // Get outlets for employee
    public function get_employee_outlets($employee_id)
    {
        $this->db->select('o.*, eo.is_primary');
        $this->db->from('ospos_outlets o');
        $this->db->join('ospos_employee_outlets eo', 'o.outlet_id = eo.outlet_id');
        $this->db->where('eo.employee_id', $employee_id);
        $this->db->where('o.is_active', 1);
        $this->db->order_by('eo.is_primary', 'DESC');
        $this->db->order_by('o.outlet_name', 'ASC');
        
        return $this->db->get();
    }

    // Check employee access to outlet
    public function has_employee_access($employee_id, $outlet_id)
    {
        $this->db->from('ospos_employee_outlets');
        $this->db->where('employee_id', $employee_id);
        $this->db->where('outlet_id', $outlet_id);
        
        return $this->db->count_all_results() > 0;
    }

    // Generate unique outlet UID
    public function generate_outlet_uid()
    {
        do {
            $uid = 'OUT' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
            $this->db->where('outlet_uid', $uid);
            $exists = $this->db->count_all_results('ospos_outlets') > 0;
        } while ($exists);
        
        return $uid;
    }

    // Simple save method for now
    public function save(&$outlet_data, $outlet_id = false)
    {
        if (!$outlet_id || !$this->exists($outlet_id)) {
            // Insert new outlet
            if (empty($outlet_data['outlet_uid'])) {
                $outlet_data['outlet_uid'] = $this->generate_outlet_uid();
            }
            
            $success = $this->db->insert('ospos_outlets', $outlet_data);
            $outlet_data['outlet_id'] = $this->db->insert_id();
            
            return $success;
        }
        
        // Update existing outlet
        $this->db->where('outlet_id', $outlet_id);
        return $this->db->update('ospos_outlets', $outlet_data);
    }

    // Get outlet count
    public function get_total_rows()
    {
        $this->db->from('ospos_outlets');
        $this->db->where('is_active', 1);
        return $this->db->count_all_results();
    }
}
