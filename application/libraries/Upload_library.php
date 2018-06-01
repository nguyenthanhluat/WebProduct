<?php
Class Upload_library
{
    var $CI = ''; 
    function __construct()
    {
        $this->CI = & get_instance();
    }
    
    /*
     * Upload file
     * @$upload_path : Duong dan luu file
     * @$file_name : ten the input upload file
     */
    function upload($upload_path = '', $file_name = '')
    {
        $config = $this->config($upload_path);
        $this->CI->load->library('upload', $config);
        //thuc hien upload
        if($this->CI->upload->do_upload($file_name))
        {
            $data = $this->CI->upload->data();
        }else{
            //khong upload thanh cong
            $data = $this->CI->upload->display_errors();
        }
        return $data;
    }
    
    /*
     * Upload nhieu file
     * @$upload_path : Duong dan luu file
     * @$file_name : ten the input upload file
     */
    function upload_file($upload_path = '', $file_name = '')
    {
        //lay thong tin cau hinh upload
        $config = $this->config($upload_path);

        //luu bien trong khi thuc hien upload
        $file  = $_FILES['image_list'];
        $count = count($file['name']);//lay tong so file duoc upload
        
        $image_list = array(); //luu ten cac file anh upload thanh cong
        for($i=0; $i<=$count-1; $i++) {
        
            $_FILES['userfile']['name']     = $file['name'][$i];  //khai bao ten cac file theo i
            $_FILES['userfile']['type']     = $file['type'][$i]; //khai bao kieu cac file theo i
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai bao file theo i
            $_FILES['userfile']['error']    = $file['error'][$i]; //khai bao loi cac file theo i
            $_FILES['userfile']['size']     = $file['size'][$i]; //khai bao kich co file theo i
            //load thu vien upload va  cau hinh
            $this->CI->load->library('upload', $config);
            //thuc hien upload file
            if($this->CI->upload->do_upload())
            {
                //neu upload thanh cong thi luu toan bo du lieu
                $data = $this->CI->upload->data();
                //in cau truc du lieu cua cac file
                $image_list[] = $data['file_name'];
            }
        }
        return $image_list;
    }
    
    /*
     * Cau hinh upload file
     */
    function config($upload_path = '')
    {
        //Khai bao bien cau hinh
        $config = array();
        //thuc muc chua file
        $config['upload_path']   = $upload_path;
        //dinh dang file
        $config['allowed_types'] = 'jpg|png|gif';
        //Dung luong file
        $config['max_size']      = '1200';
        //Chieu rong
        $config['max_width']     = '1028';
        //Chieu cao
        $config['max_height']    = '1028';
        
        return $config;
    }
}