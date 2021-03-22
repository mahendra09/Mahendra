<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();

class Contentmanagement extends CI_Controller {

  function __construct() {

            parent::__construct();

             $this->load->model('alldata','model');

             

        }



	public function index()

	{

          $session_data=$this->session->all_userdata();

          $table=$session_data['lang'].'tblcontent';

          $this->db->order_by("content_id", "desc");            

          $this->db->select('*');

          $this->db->from($table);

          $this->db->join('tblusers', $table.'.user_id = tblusers.uid','left');

          $content['view'] = $this->db->get()->result_array();

          $this->load->view("contant/contant_view",$content); 

	}



 	public function addcontent()

	{

         if($this->input->post('save')=='save')

          {

              $session_data=$this->session->all_userdata();

              $table=$session_data['lang'].'tblcontent';

              $rand=rand(1000,9999);
              $title=$this->input->post('Content');
              $pagecode =str_replace(' ', '-', $title).rand(999,9999);

              $data['tblcontent']=$this->model->getDatamodel($table);   

              $slug=str_replace(array('_','-',"'", '.', '|', '(',')',',','/','!','?','|'), '', $title); 
              $slug=str_replace(' ', '-', $slug); 
          
              $checkslg=0;

              foreach ($data['tblcontent'] as $key) {

                if ($key['slug']==$slug) {

                    $slug=str_replace(' ', '-', $title).'-'.$checkslg++; 

                }

              }

			       $slug=strtolower($slug);

              $insetcontent=array(

                            'page_category'=>$this->input->post('page_category'),

                            'content_title'=>$title,

                            'banner_id'=>$this->input->post('banner_id'),

                            'publish'=>$this->input->post('publish'),

                            'content_text'=>$this->input->post('myeditor'),

                            'user_id'=>$session_data['userinfo'][0]['uid'],

                            'page_code'=>$pagecode,

                            'slug'=>$slug,

							              'meta_tital'=>$this->input->post('meta_tital'),

							              'meta_keyword'=>$this->input->post('meta_keyword'), 

							              'meta_description'=>$this->input->post('meta_description')

                            );
             
               $this->form_validation->set_rules('Content', 'Content', 'required|xss_clean|regex_match[/^[^\`\~\@\#\$\%\^\*\[\]\{\}\;:<>=+"]+$/]');
               if ($this->form_validation->run() == TRUE)
                {
                   $this->model->insertData($table,$insetcontent); 
                }  
                redirect('contentmanagement');
            }
        else

         {

           $data['bannergrid']=$this->model->getDatamodel('tblbanners');    

           $this->load->view("contant/contant_add",$data);   

         }

	}

 public function editContentData($encrypted_string)

	{

         $session_data=$this->session->all_userdata();

         $table=$session_data['lang'].'tblcontent';

         $lang=$session_data['lang'];

         $id = $this->model->decryptdata($encrypted_string);

         $where=array('content_id'=>$id);

	      if($this->input->post('save')=='save')

         { 
              $title=$this->input->post('Content');

              $data['tblcontent']=$this->model->getDatamodel($table);   

              
              
               $slug=str_replace(array('_','-',"'", '.', '|', '(',')',',','/','!','?','|'), '', $title); 
              $slug=str_replace(' ', '-', $slug); 

              $checkslg=0;
			  $slug=strtolower($slug);
              foreach ($data['tblcontent'] as $key) {

                if ($key['slug']==$slug) {
					
					if($key['content_id']!=$id)
					{
					  $slug=str_replace(' ', '-', $slug).'-'.$checkslg++; 	
					}
                }

              }
			  
			  //print_r($this->input->post());
			  //die();	
              $insetcontent=array



                           (



                             'page_category'=>$this->input->post('page_category'),



                             'content_title'=>$this->input->post('Content'),



                             'banner_id'=>$this->input->post('banner_id'),



                             'publish'=>$this->input->post('publish'),



                             'content_text'=>$this->input->post('myeditor'),



                             'user_id'=>$session_data['userinfo'][0]['uid'],



                             'modified_time'=>date('Y-m-d H:i:s'),



							               'meta_tital'=>$this->input->post('meta_tital'),



							              'meta_keyword'=>$this->input->post('meta_keyword'),



							              'meta_description'=>$this->input->post('meta_description'),

                            'slug'=>$slug,							 



                            );



         $this->form_validation->set_rules('Content', 'Content', 'required|xss_clean|regex_match[/^[^\`\~\@\#\$\%\^\*\[\]\{\}\;:<>=+"]+$/]');
         if ($this->form_validation->run() == TRUE)
          {           
               $this->model->UpdateData($table,$insetcontent,$where);  
  			    $where=array('menu_content'=>$id);
  			     $Insertmenu=array('menu_name'=>$this->input->post('Content'),

                           'menu_displayname'=>$this->input->post('Content'));
  			    $this->model->UpdateData($lang.'tblmenu',$Insertmenu,$where);  
          }
		  
          redirect('contentmanagement');  
         }

         else



         {



            $this->db->select('*');



            $this->db->from($table);



            $this->db->where($where);



            $data['view']= $this->db->get()->result_array();



            $where=array('submenu'=>0);



            $data['menugrid']=$this->model->DetailData($lang.'tblmenu',$where);



            $data['bannergrid']=$this->model->getDatamodel('tblbanners');    



            $this->load->view("contant/contant_add",$data);   



        }	     



	}    



public  function deletecontentselected()
      { 

          $ids=explode('&',$this->input->post('ck'));

          $session_data=$this->session->all_userdata();

          $table=$session_data['lang'].'tblcontent';
          for ($i=0; $i < count($ids); $i++)

          { 
            $id=explode('=',$ids[$i]);
            $where = array('content_id'=>$id[1]);
            $this->model->deleteData($table,$where);          
              
          }
            redirect('contentmanagement'); 

      }    

}







