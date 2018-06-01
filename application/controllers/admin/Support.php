<?php
Class Support extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('support_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->support_model->get_list();
        $this->data['list'] = $list;
        
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/support/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them moi du lieu
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('gmail', 'Gmail', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            
            if($this->form_validation->run())
            {
                //them vao csdl
                $name       = $this->input->post('name');
                $yahoo  = $this->input->post('yahoo');
                $gmail = $this->input->post('gmail');
                $skype = $this->input->post('skype');
                $phone = $this->input->post('phone');
                
                //luu du lieu can them
                $data = array(
                    'name'      => $name,
                    'yahoo'      => $yahoo,
                    'gmail'      => $gmail,
                    'skype'      => $skype,
                    'phone'      => $phone,

                );
                //them moi vao csdl
                if($this->support_model->create($data))
                {
                    $this->session->set_flashdata('message', 'Thêm thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('support'));
            }
        }
        
        
        $this->data['temp'] = 'admin/support/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Cap nhat du lieu
     */
    function edit()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
    
        //lay id
        $id = $this->uri->rsegment(3);
        $info = $this->support_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại hỗ trợ này');
            redirect(admin_url('support'));
        }
        $this->data['info'] = $info;
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('gmail', 'Gmail', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            
            if($this->form_validation->run())
            {
                //them vao csdl
                $name       = $this->input->post('name');
                $yahoo  = $this->input->post('yahoo');
                $gmail = $this->input->post('gmail');
                $skype = $this->input->post('skype');
                $phone = $this->input->post('phone');
                
                //luu du lieu can them
                $data = array(
                    'name'      => $name,
                    'yahoo'      => $yahoo,
                    'gmail'      => $gmail,
                    'skype'      => $skype,
                    'phone'      => $phone,

                );
                //them moi vao csdl
                if($this->support_model->update($id, $data))
                {
                    $this->session->set_flashdata('message', 'cập nhật thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                redirect(admin_url('support'));
            }
        }
    
        $this->data['temp'] = 'admin/support/edit';
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
        redirect(admin_url('support'));
    }
    
    /*
     * Xoa nhieu danh muc san pham
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
        $info = $this->support_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại hỗ trợ này');
            if($rediect)
            {
                redirect(admin_url('support'));
            }else{
                return false;
            }
        }
        //xoa du lieu
        $this->support_model->delete($id);
        
    }
}

