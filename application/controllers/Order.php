<?php
Class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Lay thong tin khach hang
     */
    function checkout()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();
       
        if($total_items <= 0)
        {
            redirect();
        }
        //tong so tien can thanh toan
        $total_amount = 0;
        foreach ($carts as $row)
        {
            $total_amount = $total_amount + $row['subtotal'];  
        }
        $this->data['total_amount'] = $total_amount;
        
        //neu thanh vien da dang nhap thi lay thong tin cua thanh vien
        $user_id = 0;
        $user = '';
        if($this->session->userdata('user_id_login'))
        {
            //lay thong tin cua thanh vien
            $user_id = $this->session->userdata('user_id_login');
            $user = $this->user_model->get_info($user_id);
        }
        $this->data['user']  = $user;
        

        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('email', 'Email khách hàng', 'required|valid_email');
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('phone', 'số điện thoại', 'required');
            $this->form_validation->set_rules('message', 'Ghi chú', 'required');
            $this->form_validation->set_rules('payment', 'cổng thanh toán', 'required');
            
            if($this->form_validation->run())
            {
                $payment = $this->input->post('payment');
                //them vao csdl
                 $data = array(
                    'status'   => 0, //trang thai chua thanh toan
                    'user_id'  => $user_id, //id thanh vien mua hang neu da dang nhap
                    'user_email'    => $this->input->post('email'),
                    'user_name'     => $this->input->post('name'),
                    'user_phone'    => $this->input->post('phone'),
                    'message'       => $this->input->post('message'), //ghi chu khi mua hang
                    'amount'        => $total_amount,//tong so tien can thanh toan
                    'payment'       => $payment, //cong thanh toan,
                    'created'       => now(),
                );
                 //them du lieu vao bang transaction
                $this->load->model('transaction_model');
                $this->transaction_model->create($data);
                $transaction_id = $this->db->insert_id();  //lay id cac giao dich vua them vao
                
                //them vao bang order (chi tiet khach hang)
                $this->load->model('order_model');
                foreach ($carts as $row)
                {
                    $data = array(
                        'transaction_id' => $transaction_id,
                        'product_id'     => $row['id'],
                        'qty'            => $row['qty'],
                        'amount'         => $row['subtotal'],
                        'status'         => '0',
                    );
                    $this->order_model->create($data);
                }
                //Xoa toan bo gio hang
                $this->cart->destroy();
                
                $this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công chúng tôi sẽ kiểm tra và giao hàng!');
                
                redirect(site_url());
            }
        }
        
        
        //hien thi ra view
        $this->data['temp'] = 'site/order/checkout';
        $this->load->view('site/layout', $this->data);
    }
}