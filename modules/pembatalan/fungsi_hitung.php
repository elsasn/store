<?php 

		$hitung=$this->mod->hitung($this->input->post('id_harga'));
        $jumlah=$this->input->post('jumlah');
        $hasil = $hitung->harga*$jumlah;
        
        print_r(json_encode($hasil));die;
       

 ?>