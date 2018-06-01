<?php
Class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->order_model->get_list();
        $this->data['list'] = $list;
        
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/order/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa danh order
     */
    function delete()
    {
        //lay id order
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        $this->session->set_flashdata('message', 'Xóa thành công');
        redirect(admin_url('order'));
    }
    
    /*
     * Xoa nhieu order
     */
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id , false);
        }
    }
    
    /*
     * Thuc hien xoa
     */
    private function _del($id, $rediect = true)
    {
        $info = $this->order_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại đơn hàng này');
            if($rediect)
            {
                redirect(admin_url('order'));
            }else{
                return false;
            }
        }
        //xoa du lieu
        $this->order_model->delete($id);
        
    }
}

