<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlets extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Outlet');
        $this->load->model('Employee');
        $this->load->library('form_validation');
        
        // Check if user is logged in
        if (!$this->Employee->is_logged_in()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = [];
        $data['outlets'] = $this->Outlet->get_all()->result();
        
        $this->load->view('outlets/manage', $data);
    }

    // Get outlet data for DataTables
    public function get_outlets()
    {
        $outlets = $this->Outlet->get_all()->result();
        
        $data = [];
        foreach ($outlets as $outlet) {
            $row = [];
            $row[] = $outlet->outlet_uid;
            $row[] = $outlet->outlet_name;
            $row[] = $outlet->outlet_phone ?: 'N/A';
            $row[] = $outlet->is_active ? 'Active' : 'Inactive';
            $row[] = '<a href="' . site_url('outlets/view/' . $outlet->outlet_id) . '" class="btn btn-sm btn-info">View</a>';
            
            $data[] = $row;
        }
        
        $output = [
            'data' => $data
        ];
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function view($outlet_id = null)
    {
        if (!$outlet_id || !$this->Outlet->exists($outlet_id)) {
            show_404();
        }
        
        $data = [];
        $data['outlet'] = $this->Outlet->get_info($outlet_id);
        
        $this->load->view('outlets/view', $data);
    }
}
