<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {


	public function index()
	{
	    if (isset($_FILES['file']))
	    {
	        if ($file = $this->savenew())
	        {
	            $url = base_url('uploads/' . $file['upload_data']['file_name']);
	            $string = "El archivo ha sido subido exitosamente! <span class='copy alert-link' data-clipboard-text='$url'>Copia la URL</span>";

                $msg = array(
                    'msg' => $string,
                    'type' => 'success'
                );
                $this->session->set_flashdata('msg', $msg);
            }
            else
            {
                $msg = array(
                    'msg' => 'El archivo no se ha podido subir, por favor intente nuevamente.',
                    'type' => 'danger'
                );
                $this->session->set_flashdata('msg', $msg);
            }
        }

        $directory = './uploads';
        $data['files'] = array_diff(scandir($directory, 1), array('..', '.', '.htaccess'));

		$this->load->view('index', $data);
	}

    /**
     * Sube imagen al servidor
     *
     * @return bool|array Si la imagen se subio exitosamente devuelve un array con los datos de la imagen, de lo contario
     * el array lleva los datos del error
     */
    //--------------------------------------------------------------------
    private function savenew()
    {

        $config['upload_path'] = './uploads/'; //Make SURE that you chmod this directory to 777!
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '0'; // 0 = no limit on file size (this also depends on your PHP configuration)
        $config['remove_spaces'] = TRUE; //Remove spaces from the file name
        $config['file_name'] = round(microtime(true)) . '-UPLOAD';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            return FALSE;
        } else {
            return array('upload_data' => $this->upload->data());
        }
    }
}
