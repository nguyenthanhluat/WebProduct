<?php
Class Comment extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
    }
    
    /*
     * Lay ra danh sach comment
     */
    function index()
    {
        $list = $this->comment_model->get_list();
        $this->data['list'] = $list;
        
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/comment/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa danh comment
     */
    function delete()
    {
        //lay id comment
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('comment'));
    }
    
    /*
     * Xoa nhieu comment
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
        $info = $this->comment_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại comment này');
            if($rediect)
            {
                redirect(admin_url('comment'));
            }else{
                return false;
            }
        }
        //xoa du lieu
        $this->comment_model->delete($id);
        
    }
}

