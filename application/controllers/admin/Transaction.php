<?php
Class Transaction extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('transaction_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->transaction_model->get_list();
        $this->data['list'] = $list;
        
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/transaction/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa 
     */
    function delete()
    {
        //lay id
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        $this->session->set_flashdata('message', 'Xóa thành công');
        redirect(admin_url('transaction'));
    }
    
    /*
     * Xoa nhieu 
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
        $info = $this->transaction_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại giao dịch này');
            if($rediect)
            {
                redirect(admin_url('transaction'));
            }else{
                return false;
            }
        }
        //xoa du lieu
        $this->transaction_model->delete($id);
        
    }
}

