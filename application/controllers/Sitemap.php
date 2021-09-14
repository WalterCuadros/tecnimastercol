<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sitemap extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     */
    public function index()
    {
        $this->load->database();
        $this->db->where('controller','1');
        $query = $this->db->get("items");
        $data['items'] = $query->result();
        $this->load->view('sitemap', $data);
    }
}