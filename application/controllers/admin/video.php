<?php
Class Video extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('video_model');
    }
    
    /*
     * Hien thi danh sach video
     */
    function index()
    {
        //lay tong so luong ta ca cac video trong websit
        $total_rows = $this->video_model->get_total();
        $this->data['total_rows'] = $total_rows;

        $input = array();
       
        //lay danh sach video
        $list = $this->video_model->get_list($input);
        $this->data['list'] = $list;
       
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/video/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them video moi
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên video', 'required');
            $this->form_validation->set_rules('link', 'Link video', 'required');
            
            if($this->form_validation->run())
            {
               
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/video';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $images = '';
                if(isset($upload_data['file_name']))
                {
                    $images = $upload_data['file_name'];
                }
               
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                    'images' => $images,
                    'link'       => $this->input->post('link'),
                ); 
                //them moi vao csdl
                if($this->video_model->create($data))
                {
                    $this->session->set_flashdata('message', 'Thêm thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('video'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/video/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Chinh sua video
     */
    function edit()
    {
        $id = $this->uri->rsegment('3');
        $video = $this->video_model->get_info($id);
        if(!$video)
        {
            $this->session->set_flashdata('message', 'Không tồn tại video này');
            redirect(admin_url('video'));
        }
        $this->data['video'] = $video;
       
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên video', 'required');
            $this->form_validation->set_rules('link', 'Link video', 'required');
            
            if($this->form_validation->run())
            {
               
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/video';
                $upload_data = $this->upload_library->upload($upload_path, 'image');  
                $images = '';
                if(isset($upload_data['file_name']))
                {
                    $images = $upload_data['file_name'];
                }
               
                //luu du lieu can them
                $data = array(
                    'name'       => $this->input->post('name'),
                    'images' => $images,
                    'link'       => $this->input->post('link'),
                ); 
                if($images != '')
                {
                    $data['images'] = $images;
                }
               
                //them moi vao csdl
                if($this->video_model->update($video->id, $data))
                {
                    $this->session->set_flashdata('message', 'Cập nhật thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                redirect(admin_url('video'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/video/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa du lieu
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        $this->session->set_flashdata('message', 'Xóa thành công');
        redirect(admin_url('video'));
    }
    
    /*
     * Xoa nhieu
     */
    function delete_all()
    {
        //lay tat ca id video muon xoa
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
    
    /*
     *Xoa video
     */
    private function _del($id)
    {
        $video = $this->video_model->get_info($id);
        if(!$video)
        {
            $this->session->set_flashdata('message', 'Không tồn tại video này');
            redirect(admin_url('video'));
        }
        //thuc hien xoa video
        $this->video_model->delete($id);
        //xoa cac anh cua video
        $images = './upload/video/'.$video->images;
        if(file_exists($images))
        {
            unlink($images);
        }
        
    }
}



