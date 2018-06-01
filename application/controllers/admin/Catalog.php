<?php
Class Catalog extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('catalog_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->catalog_model->get_list();
        $this->data['list'] = $list;
        
        //lay noi dung cac bien mesage
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/catalog/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them moi du lieu
     */
    function add()
    {
        //load thu vien validate du lieu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            
            //nhap lieu chinh xac
            if($this->form_validation->run())
            {
                //them vao csdl
                $name       = $this->input->post('name');
                $parent_id  = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
                
                //luu du lieu can them
                $data = array(
                    'name'      => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );
                //them moi vao csdl
                if($this->catalog_model->create($data))
                {
                    //tao noi dung thong bao
                    $this->session->set_flashdata('message', 'Thêm mới thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen toi trang danh sach
                redirect(admin_url('catalog'));
            }
        }
        
        //lay danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list']  = $list;
        
        $this->data['temp'] = 'admin/catalog/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Cap nhat du lieu
     */
    function edit()
    {
        //load thu vien validate du lieu
        $this->load->library('form_validation');
        $this->load->helper('form');
    
        //lay id danh muc
        $id = $this->uri->rsegment(3);
        $info = $this->catalog_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại danh mục này');
            redirect(admin_url('catalog'));
        }
        $this->data['info'] = $info;
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
    
            //nhap lieu chinh xac
            if($this->form_validation->run())
            {
                //them vao csdl
                $name       = $this->input->post('name');
                $parent_id  = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');
    
                //luu du lieu can them
                $data = array(
                    'name'      => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)
                );
                //them moi vao csdl
                if($this->catalog_model->update($id, $data))
                {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                redirect(admin_url('catalog'));
            }
        }
    
        //lay danh sach danh muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list']  = $list;
    
        $this->data['temp'] = 'admin/catalog/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa danh muc
     */
    function delete()
    {
        //lay id danh muc
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('catalog'));
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
        $info = $this->catalog_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại danh mục này');
            if($rediect)
            {
                redirect(admin_url('catalog'));
            }else{
                return false;
            }
        }
        
        //kiem tra xem danh muc nay co san pham khong
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
        if($product)
        {
            $this->session->set_flashdata('message', 'Danh mục '.$info->name.'có chứa sản phẩm, bạn cần xóa sản phẩm trước khi xóa danh mục');
            if($rediect)
            {
                redirect(admin_url('catalog'));
            }else{
                return false;
            }
        }
        
        //xoa du lieu
        $this->catalog_model->delete($id);
        
    }
}

