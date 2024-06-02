<?php
class Testing extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('order_model');
    }

    function testing()
    {
        $id_produk = $this->uri->segment(3);
        $data['product_material'] = $this->order_model->get_material_product($id_produk);
        return $data;
    }

    public function testUnitTest($id_produk)
    {
        $tes = $this->testing($id_produk);
        $expected_result = null;
        $name_test = 'product_material is empty values';
        echo $this->unit->run($tes, $expected_result, $name_test);
    }
}
