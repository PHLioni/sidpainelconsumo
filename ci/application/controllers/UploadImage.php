


 public function salvar(){
     $cpf          = $this->input->post('cpf');
     $curriculo    = $_FILES['imagem'];// pega o arquivo enviado do input
     $configuracao = array(
         'upload_path'   => './curriculos/',
         'allowed_types' => 'jpg',
         'file_name'     => $cpf.'.pdf',
         'max_size'      => '500',
         max_width:
         'max_height'
     );      
     $this->load->library('upload');
     $this->upload->initialize($configuracao);
     if ($this->upload->do_upload('curriculo'))
         echo 'Arquivo salvo com sucesso.';
     else
         echo $this->upload->display_errors();
 }

 ///form
 <form action="salvar" method="POST" enctype="multipart/form-data">
     <input type="text" name="cpf" placeholder="Informe seu CPF"/>
     <br/>
     <input type="file" name="curriculo">
     <br/>
     <input type="submit" value="Salvar"/>
 </form>