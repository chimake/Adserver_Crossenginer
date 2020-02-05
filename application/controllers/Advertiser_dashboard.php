<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/***
 * Name:      AdNetwork
 * Package:  advertiser_dashboard.php
 * About:        A controller that handles advertiser operation
 * Copyright:  (C) 2018
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/





class Advertiser_dashboard extends CI_Controller {

public function __construct()
{
     parent::__construct();
     $this->load->model(array('user_model','blog_model','advertiser_model','campaign_model','publisher_model'));
    $this->load->library(array('session','form_validation','user_agent'));
     $this->load->helper(array('url','form','page_helper','blog_helper'));

     if($_SESSION["accounttype"] != "Advertiser")
      {
        show_page('page/logout');
      }

      $this->siteName = $this->advertiser_model->get_system_variable("site_name");
      $this->author = $this->advertiser_model->get_system_variable("author");
      $this->keywords = $this->advertiser_model->get_system_variable("keywords");
      $this->description= $this->advertiser_model->get_system_variable("description");
      $this->noindex = '<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">';
      $this->user =  $this->advertiser_model->get_advertiser_by_id();
    $user=$this->advertiser_model->get_advertiser_by_id($_SESSION['id']);
    $this->account_balance = $user['account_bal'];


}
public function index()
{


      $data['title'] = $this->siteName." | Advertiser Dashboard";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
      $data['user'] =$this->user;
      $data['account_bal'] = $this->account_balance;


$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["pending_campaigns"] = $this->advertiser_model->count_advertiser_pending_campaigns();
$data["blocked_campaigns"] = $this->advertiser_model->count_advertiser_blocked_campaigns();
$data["active_campaigns"] = $this->advertiser_model->count_advertiser_active_campaigns();
$data["inactive_campaigns"] = $this->advertiser_model->count_advertiser_inactive_campaigns();
$data['no_clicks'] = $this->advertiser_model->get_no_affilate_clicks("advertiser");
$data['no_reg'] = $this->advertiser_model->get_no_affilate_reg("advertiser");
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
$data["blocked_campaigns_list"] = $this->advertiser_model->get_all_blocked_campaigns();
$data["incomplete_campaign_list"] = $this->advertiser_model->get_all_incomplete_campaigns();
$data['campaign_percentage_change'] = $this->advertiser_model->get_campaign_percentage_change();
$data['active_campaign_percentage_change'] = $this->advertiser_model->get_active_campaign_percentage_change();
$data['inactive_campaign_percentage_change'] = $this->advertiser_model->get_inactive_campaign_percentage_change();
    $data['lastest_clicks'] = $this->advertiser_model->get_latest_campaign_click();
//var_dump($data['campaign_percentage_change']);
//die;


//get country details by user's country

$data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
$data['general_details'] = $this->advertiser_model->get_general_details();

    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
   //$this->load->view('/user/advertiser/dashboard_view',$data);
     $this->load->view('/common/users_footer_view',$data);


}


public function count_latest()
{
    $user_id = $_SESSION['id'];
    $click_count = $this->advertiser_model->get_latest_campaign_click();
    return $click_count;

}
public function settings()
{



      $data['title'] = $this->siteName." | Advertiser Settings";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
    $data['account_bal'] = $this->account_balance;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();



    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);

    $this->load->view('/user/advertiser/settings_view',$data);
     $this->load->view('/common/users_footer_view',$data);




}



 public function change_password($slug = null)
 {
    $this->form_validation->set_rules("current_password","Current Password","trim|required");
    $this->form_validation->set_rules("new_password","New Password","trim|required|is_unique[advertisers.password]");
    $this->form_validation->set_rules("confirm_password","Confirm New Password","trim|required|matches[new_password]");
    if ($this->form_validation->run() ==  FALSE)
   {
      $data['title'] = $this->siteName." | Advertiser Settings";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
       $data['account_bal'] = $this->account_balance;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();



    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
    $this->load->view('/user/advertiser/settings_view',$data);
     $this->load->view('/common/users_footer_view',$data);



}else{

//change here



     $user_det =   $this->advertiser_model->get_advertiser_by_id();

       if ($user_det['password'] == md5(md5(trim($this->input->post('current_password')))))
       {

        //change password
          if( $this->advertiser_model->insert_new_password())
          {
             //show suc message

            $_SESSION['action_status_report'] = '<b class="w3-text-green">Password changed successfully</b><br>';
              $this->session->mark_as_flash('action_status_report');
              show_page("advertiser_dashboard/settings");
          }else{

              //show err message

             $_SESSION['action_status_report'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('action_status_report');
              show_page("advertiser_dashboard/settings");


          }

       }else{


                   //incorrect password  error page


             $_SESSION["action_status_report"] = '<b class="w3-text-red">The Current Account
             Password you entered is incorrect</b><br>';
              $this->session->mark_as_flash('action_status_report');
              show_page("advertiser_dashboard/settings");



       }




}



 }


public function campaign_action($action,$ref_id)
{
  $campaign = $this->advertiser_model->get_campaign_ref_id($ref_id);
if($action == "stop")
{//pause
  $this->campaign_model->edit_campaign(array('status' => "inactive"),$ref_id);

$_SESSION['action_status_report'] ="<span class='w3-text-green'>Campaign STOPPED successfully</span>";
$this->session->mark_as_flash("action_status_report");
show_page('advertiser_dashboard/view_details/'.$ref_id);


}elseif($action == "start")
{

//start again

  //you can only start campaign if balance is greater than 1
if(($this->advertiser_model->get_campaign_ref_id($ref_id)['balance'] > 1) && ($campaign['approval'] == 'true')){

    $this->campaign_model->edit_campaign(array('status' => "active"),$ref_id);



$_SESSION['action_status_report'] ="<span class='w3-text-green'>Campaign ".$action." successfully</span>";
$this->session->mark_as_flash("action_status_report");
show_page('advertiser_dashboard/view_details/'.$ref_id);

}elseif($campaign['approval'] != 'true'){



$_SESSION['action_status_report'] ="<span class='w3-text-red'>Campaign is still pending;You cannot start a pending Campaign</span>";
$this->session->mark_as_flash("action_status_report");
show_page('advertiser_dashboard/view_details/'.$ref_id);

}else{

$_SESSION['action_status_report'] ="<span class='w3-text-red'>Please Fund This Campaign to resume</span>";
$this->session->mark_as_flash("action_status_report");
show_page('advertiser_dashboard/view_details/'.$ref_id);

}

}

}

 public function change_email($slug = null)
 {
      $this->form_validation->set_rules("current_password","Password","trim|required");
    $this->form_validation->set_rules("new_email","New Email","trim|required|is_unique[advertisers.email]");
    $this->form_validation->set_rules("confirm_email","Confirm New Email","trim|required|matches[new_email]");



    if ($this->form_validation->run() ==  FALSE)
   {




      $data['title'] = $this->siteName." | Advertiser Settings";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
       $data['account_bal'] = $this->account_balance;


    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
    $this->load->view('/user/advertiser/settings_view',$data);
     $this->load->view('/common/users_footer_view',$data);


}else{


//change here



     $user_det =   $this->advertiser_model->get_advertiser_by_id();

       if ($user_det['password'] == md5(md5(trim($this->input->post('current_password')))))
       {

        //change Email
          if( $this->advertiser_model->insert_new_email())
          {
             //show suc message

            $_SESSION['action_status_report'] = '<b class="w3-text-green">Email changed successfully</b><br>';
              $this->session->mark_as_flash('action_status_report');
              show_page("advertiser_dashboard/settings");
          }else{

              //show err message

             $_SESSION['action_status_report'] = '<b class="w3-text-red">uknown error occurred</b>';
              $this->session->mark_as_flash('action_status_report');
              show_page("advertiser_dashboard/settings");


          }

       }else{


                   //incorrect password  error page


             $_SESSION["action_status_report"] = '<b class="w3-text-red">The Current Account
             Email you entered is incorrect</b><br>';
              $this->session->mark_as_flash('action_status_report');
              show_page("advertiser_dashboard/settings");



       }

}

 }

//function ends here

public function affilate()
{

      $data['title'] = $this->siteName." | Advertiser Affilate";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
    $data['account_bal'] = $this->account_balance;


    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
   $this->load->view('/user/advertiser/affilate_view',$data);
     $this->load->view('/common/users_footer_view',$data);



}

public function choose_campaign_type($ref_id=NULL)
{


      $data['title'] = $this->siteName." | Choose Campaign Type";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;

$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
    $data['account_bal'] = $this->account_balance;

    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
    $this->load->view('/user/advertiser/choose_campaign_type_view',$data);
     $this->load->view('/common/users_footer_view',$data);

}

public function add_banner_campaign($cpa_ref_id = NULL)
 {

$this->form_validation->set_rules('campaign_name','Campaign Name','required|max_length[30]',array("max_length" => "Campaign Name is too long <br> The allow Character length is 30"));

$this->form_validation->set_rules('destination_link','Destination Link','required');


  $config['upload_path'] = "assets/campaigns";
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
 $config['max_size'] = '1500';

 $this->load->library('upload', $config);
 $this->upload->do_upload('banner');
if(!$this->form_validation->run())
{
 $data['error'] =  $this->upload->display_errors();

      $data['title'] = $this->siteName." | Add Banner Campaign";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
    $data['account_bal'] = $this->account_balance;

if(!empty($cpa_ref_id))
{
//set campaign name and disable text input
  $data['campaign_name'] = $this->advertiser_model->get_cpa_form_by_ref_id($cpa_ref_id)['name'];

  $data['campaign_dest'] = site_url('form/'.$this->advertiser_model->get_cpa_form_by_ref_id($cpa_ref_id)['form_slug']);

}

$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();


    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
    $this->load->view('/user/advertiser/add_banner_campaign_view',$data);
     $this->load->view('/common/users_footer_view',$data);




}else{
$banner = $this->upload->data("file_name");

$ref_id =  substr(md5(time()), 12);

//create id for the advert here if not exist
$this->advertiser_model->insert_campaign_step_one($banner,$ref_id,$cpa_ref_id);

  //save to db move to next step
show_page("advertiser_dashboard/campaign_target/".$ref_id);
}


 }public function add_text_campaign($cpa_ref_id = NULL)
 {

$this->form_validation->set_rules('campaign_name','Campaign Name','required|max_length[30]',array("max_length" => "Campaign Name is too long <br> The allow Character length is 30"));

$this->form_validation->set_rules('destination_link','Destination Link','required');


if(!$this->form_validation->run())
{

      $data['title'] = $this->siteName." | Add Banner Campaign";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
    $data['account_bal'] = $this->account_balance;
if(!empty($cpa_ref_id))
{
//set campaign name and disable text input
  $data['campaign_name'] = $this->advertiser_model->get_cpa_form_by_ref_id($cpa_ref_id)['name'];

  $data['campaign_dest'] = site_url('form/'.$this->advertiser_model->get_cpa_form_by_ref_id($cpa_ref_id)['form_slug']);

}

$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();


    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
    $this->load->view('/user/advertiser/add_text_campaign_view',$data);
     $this->load->view('/common/users_footer_view',$data);




}else{
$banner = NULL;

$ref_id =  substr(md5(time()), 12);

//create id for the advert here if not exist
$this->advertiser_model->insert_campaign_step_one($banner,$ref_id,$cpa_ref_id);

  //save to db move to next step
show_page("advertiser_dashboard/campaign_target/".$ref_id);
}


 }

 public function add_recommendation($cpa_ref_id = NULL)
 {

$this->form_validation->set_rules('campaign_name','Campaign Name','required|max_length[30]',array("max_length" => "Campaign Name is too long <br> The allow Character length is 30"));
$this->form_validation->set_rules('campaign_title','Campaign Title','max_length[160]',array("max_length" => "Campaign Title is too long <br> The allow Character length is 160"));
$this->form_validation->set_rules('destination_link','Destination Link','required');
$this->form_validation->set_rules('campaign_type','Campaign Type','required',array("required" => "Please Select Campaign Type"));


  $config['upload_path'] = "assets/campaigns";
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
 $config['max_size'] = '1500';

 $this->load->library('upload', $config);
 $this->upload->do_upload('banner');
if(!$this->form_validation->run())
{
 $data['error'] =  $this->upload->display_errors();

      $data['title'] = $this->siteName." | Add Campaign";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
    $data['account_bal'] = $this->account_balance;

if(!empty($cpa_ref_id))
{
//set campaign name and disable text input
  $data['campaign_name'] = $this->advertiser_model->get_cpa_form_by_ref_id($cpa_ref_id)['name'];

  $data['campaign_dest'] = site_url('form/'.$this->advertiser_model->get_cpa_form_by_ref_id($cpa_ref_id)['form_slug']);

}

$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();


    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
    $this->load->view('/user/advertiser/add_recommendation_view',$data);
     $this->load->view('/common/users_footer_view',$data);




}else{
$banner = $this->upload->data("file_name");

$ref_id =  substr(md5(time()), 12);

//create id for the advert here if not exist
$this->advertiser_model->insert_campaign_step_one($banner,$ref_id,$cpa_ref_id);

  //save to db move to next step
show_page("advertiser_dashboard/campaign_target/".$ref_id);
}


 }


 public function add_campaign($cpa_ref_id = NULL)
 {

$this->form_validation->set_rules('campaign_name','Campaign Name','required|max_length[30]',array("max_length" => "Campaign Name is too long <br> The allow Character length is 30"));
$this->form_validation->set_rules('campaign_title','Campaign Title','max_length[160]',array("max_length" => "Campaign Title is too long <br> The allow Character length is 160"));
$this->form_validation->set_rules('destination_link','Destination Link','required');
$this->form_validation->set_rules('campaign_type','Campaign Type','required',array("required" => "Please Select Campaign Type"));


  $config['upload_path'] = "assets/campaigns";
  $config['allowed_types'] = 'gif|jpg|png|jpeg';
 $config['max_size'] = '1500';

 $this->load->library('upload', $config);
 $this->upload->do_upload('banner');


if(!$this->form_validation->run())
{
 $data['error'] =  $this->upload->display_errors();

      $data['title'] = $this->siteName." | Add Campaign";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
    $data['account_bal'] = $this->account_balance;

if(!empty($cpa_ref_id))
{
//set campaign name and disable text input
  $data['campaign_name'] = $this->advertiser_model->get_cpa_form_by_ref_id($cpa_ref_id)['name'];

  $data['campaign_dest'] = site_url('form/'.$this->advertiser_model->get_cpa_form_by_ref_id($cpa_ref_id)['form_slug']);

}

$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();


    $this->load->view('/common/advertiser_header_view',$data);
      //$this->load->view('/common/advertiser_top_tiles',$data);
    $this->load->view('/user/advertiser/add_campaign_view',$data);
     //$this->load->view('/common/users_footer_view',$data);




}else{
$banner = $this->upload->data("file_name");

$ref_id =  substr(md5(time()), 12);

//create id for the advert here if not exist
$this->advertiser_model->insert_campaign_step_one($banner,$ref_id,$cpa_ref_id);

  //save to db move to next step
show_page("advertiser_dashboard/campaign_target/".$ref_id);
}


 }
public function campaign_target($ref_id = NULL)
{

      $data['title'] = $this->siteName." | Campaign Targeting";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
    $data['account_bal'] = $this->account_balance;

$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();


    $this->load->view('/common/advertiser_header_view',$data);
     // $this->load->view('/common/advertiser_top_tiles',$data);

    $this->load->view('/user/advertiser/campaign_target_view',$data);
    // $this->load->view('/common/users_footer_view',$data);


}
public function campaign_target_action($ref_id = NULL)
{


$this->advertiser_model->insert_campaign_step_two($ref_id);

  //save to db move to next step
show_page("advertiser_dashboard/campaign_budget/".$ref_id);




}
public function skip_targeting($ref_id = NULL)
{


$this->advertiser_model->skip_targeting($ref_id);

  //save to db move to next step
show_page("advertiser_dashboard/campaign_budget/".$ref_id);



}
public function campaign_budget($ref_id = NULL)
{

  if($this->advertiser_model->get_campaign_ref_id($ref_id)['cr_level'] == "3")
  {

show_page("advertiser_dashboard/campaign");
  }

    $this->form_validation->set_rules('budget','Budget','trim|required');
     //$this->form_validation->set_rules('cpc','Cost per click','trim|required');
     $this->form_validation->set_rules('sdate','Start Date','trim|required');
$data['user'] =$this->user;

if(!$this->form_validation->run())

{

      $data['title'] = $this->siteName." | Campaign Budget";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
    $data['account_bal'] = $this->account_balance;

//get country details by user's country

$data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
$data['general_details'] = $this->advertiser_model->get_general_details();



$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
$campaign =$this->advertiser_model->get_campaign_ref_id($ref_id);
if(empty($campaign['cpa_id']))
{
$data['cpa_form_data'] =NULL;
}else{
  $data['cpa_form_data'] = $this->advertiser_model->get_cpa_form_by_ref_id($campaign['cpa_id']);

}


    $this->load->view('/common/advertiser_header_view',$data);
    //$this->load->view('/common/advertiser_top_tiles',$data);

    $this->load->view('/user/advertiser/campaign_budget_view',$data);
    //$this->load->view('/common/users_footer_view',$data);




}else{



$this->advertiser_model->insert_campaign_step_three($ref_id,$data['user']);

}
}
 public function campaign($offset = 0)
 {



    $limit = 5;
      $this->load->library('pagination');

        $data['items'] =  $this->advertiser_model->get_advertiser_campaigns($offset,$limit);
    $config['base_url'] = site_url("advertiser_dashboard/campaign");
  $config['total_rows'] = count($this->advertiser_model->get_advertiser_campaigns(null,null));
  //$config['total_rows'] = $this->db->count_all('pages');

    $config['per_page'] = $limit;

   //$config['uri_segment'] = 4;
  $config['first_tag_open'] = '<span class="w3-btn w3-indigo w3-text-white">';
  $config['first_tag_close'] = '</span>';
  $config['last_tag_open'] = '<br><span class="w3-btn w3-indigo w3-text-white">';
  $config['last_tag_close'] = '</span>';
  $config['first_link'] = 'First';



  $config['prev_link'] = 'Prev';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-indigo w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();

      $data['title'] = $this->siteName." | Advertiser Campaign";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
     $data['account_bal'] = $this->account_balance;

$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
$data["campaigns_list"] = $this->advertiser_model->get_all_campaigns();



    $this->load->view('/common/advertiser_header_view',$data);
      //$this->load->view('/common/advertiser_top_tiles',$data);

    $this->load->view('/user/advertiser/campaigns_view',$data);
    // $this->load->view('/common/users_footer_view',$data);


 }

public function view_details($ref_id)
{

//get stage and redirect accordingly
  $data['campaign_item'] = $this->advertiser_model->get_campaign_ref_id($ref_id);


  if($data['campaign_item']['cr_level'] == 1)
  {
show_page('advertiser_dashboard/campaign_target/'.$ref_id);

  }elseif($data['campaign_item']['cr_level'] == 2)
  {
show_page('advertiser_dashboard/campaign_budget/'.$ref_id);

  }
    $campaign_item = $this->advertiser_model->get_campaign_ref_id($ref_id);
      $data['title'] = $this->siteName." | Campaign Details(".$campaign_item['name'].")";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
    $data['account_bal'] = $this->account_balance;

//get country details by user's country

$data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
$data['general_details'] = $this->advertiser_model->get_general_details();



$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();

$data['campaign_item'] = $this->advertiser_model->get_campaign_ref_id($ref_id);
$data['today_views'] = $this->advertiser_model->get_campaign_views($ref_id,strtotime(date("y-m-d")));
$data['today_clicks'] = $this->advertiser_model->get_campaign_clicks($ref_id,strtotime(date("y-m-d")));


$data['yesterday_views'] = $this->advertiser_model->get_campaign_at_time_views($ref_id,strtotime(date("y-m-d")),24);
$data['two_days_ago_views'] = $this->advertiser_model->get_campaign_at_time_views($ref_id,(strtotime(date("y-m-d"))-(24*60*60)),48);
$data['three_days_ago_views'] = $this->advertiser_model->get_campaign_at_time_views($ref_id,(strtotime(date("y-m-d"))-(48*60*60)),72);
$data['four_days_ago_views'] = $this->advertiser_model->get_campaign_at_time_views($ref_id,(strtotime(date("y-m-d"))-(72*60*60)),96);

$data['yesterday_clicks'] = $this->advertiser_model->get_campaign_at_time_clicks($ref_id,strtotime(date("y-m-d")),24);
$data['two_days_ago_clicks'] = $this->advertiser_model->get_campaign_at_time_clicks($ref_id,(strtotime(date("y-m-d"))-(24*60*60)),48);
$data['three_days_ago_clicks'] = $this->advertiser_model->get_campaign_at_time_clicks($ref_id,(strtotime(date("y-m-d"))-(48*60*60)),72);
$data['four_days_ago_clicks'] = $this->advertiser_model->get_campaign_at_time_clicks($ref_id,(strtotime(date("y-m-d"))-(72*60*60)),96);

$data['campaign_item']['clicks'] = $this->advertiser_model->get_campaign_at_all_time_clicks($ref_id);
$data['campaign_item']['views'] = $this->advertiser_model->get_campaign_at_all_time_views($ref_id);

    $this->load->view('/common/advertiser_header_view',$data);
      //$this->load->view('/common/advertiser_top_tiles',$data);

    $this->load->view('/user/advertiser/details_view',$data);
    // $this->load->view('/common/users_footer_view',$data);




}
public function fund_campaign($ref_id)
{

$this->form_validation->set_rules("amount","Amount","required|is_numeric");


if(!$this->form_validation->run())
{
  $_SESSION['action_status_report'] ="<span class='w3-text-red'>".validation_errors()."</span>" ;
$this->session->mark_as_flash('action_status_report');
  show_page('advertiser_dashboard/view_details/'.$ref_id);
}else{

$this->advertiser_model->fund_campaign($ref_id,$this->advertiser_model->get_advertiser_by_id(),$this->advertiser_model->get_campaign_ref_id($ref_id));

}


}

public function payments($offset=0)
{
    $limit = 8;
    $user = $_SESSION['id'];

    $data['payments']= $this->advertiser_model->get_payments_advertiser_id($limit,$offset);
//    var_dump($data['payments']);
//    die;

    $this->load->library('pagination');

    $config['base_url'] = site_url("advertiser_dashboard/payments");



    $config['total_rows'] = $this->db->where(['user_id'=>$user])->from("payments")->count_all_results();

    $config['per_page'] = $limit;


    //$config['uri_segment'] = 4;
    $config['first_tag_open'] = '<span class="btn-group">';
    $config['first_tag_close'] = '</span>';
    $config['last_tag_open'] = '<br><span class="btn btn-outline-secondary">';
    $config['last_tag_close'] = '</span>';
    $config['first_link'] = 'First';



    $config['prev_link'] = 'Prev';
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<span style="margin-left:20%" class="btn btn-outline-secondary">';
    $config['next_tag_close'] = '</span><br>';
    $config['prev_tag_open'] = '<span style="" class="btn-group">';
    $config['prev_tag_close'] = '</span>';
    $config['last_link'] = 'Last';
    $config['display_pages'] = false;

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();






    //check login for admin here later

    $data["title"] =$this->siteName." | Payments Overview";
    $data["keywords"] = $this->keywords;
    $data["author"] = $this->author;
    $data["description"] = $this->description;
    $data['account_bal'] = $this->account_balance;
    $data['user'] =$this->user;
    $data["noindex"] = $this->noindex;
//    var_dump($data);
//    die;



    $this->load->view('/common/advertiser_header_view',$data);
    $this->load->view('/user/advertiser/payment_view',$data);
}

public function add_payment()
{


$this->form_validation->set_rules('payment_opt','Payment Option','required');


if(!$this->form_validation->run())
{
  $data['title'] = $this->siteName." | Advertiser Affilate";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
    $data['account_bal'] = $this->account_balance;
$data['user'] =$this->user;
$data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
$data['general_details'] = $this->advertiser_model->get_general_details();

$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();



    $this->load->view('/common/advertiser_header_view',$data);
      //$this->load->view('/common/advertiser_top_tiles',$data);
   $this->load->view('/user/advertiser/select_payment_option',$data);
    // $this->load->view('/common/users_footer_view',$data);

}else{


      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
    $data['account_bal'] = $this->account_balance;
//get country details by user's country

$data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
$data['general_details'] = $this->advertiser_model->get_general_details();



$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();

if ($this->input->post('payment_opt') == "coupon")
{
    $data['title'] = $this->siteName." | Coupon Payment";
    $this->load->view('/common/advertiser_header_view',$data);
    $this->load->view('/user/advertiser/add_coupon_pay_view',$data);
}elseif ($this->input->post('payment_opt') == "paymt_gate")
{
    $data['title'] = $this->siteName." | Online Payment";
    $this->load->view('/common/advertiser_header_view',$data);
    $this->load->view('/user/advertiser/add_online_payment_view',$data);
}



}



}

public function coupon_payment()
{
    $this->form_validation->set_rules('coupon_code','Coupon Code','required');
    if (!$this->form_validation->run())
    {
        $data['title'] = $this->siteName." |  Coupon Payment";
        $data['author'] =  $this->author;
        $data['keywords'] =  $this->keywords;
        $data['description'] =  $this->description;
        $data["noindex"] =  $this->noindex;
        $data['account_bal'] = $this->account_balance;
        $data['user'] =$this->user;
        $data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
        $data['general_details'] = $this->advertiser_model->get_general_details();

        $data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
        $data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();



        $this->load->view('/common/advertiser_header_view',$data);
        //$this->load->view('/common/advertiser_top_tiles',$data);
        $this->load->view('/user/advertiser/add_coupon_pay_view',$data);
        // $this->load->view('/common/users_footer_view',$data);
    }else{
        $data['title'] = $this->siteName." | Payment Preview";
        $data['author'] =  $this->author;
        $data['keywords'] =  $this->keywords;
        $data['description'] =  $this->description;
        $data["noindex"] =  $this->noindex;
        $data['user'] =$this->user;
        $data['account_bal'] = $this->account_balance;
//when we get usd account we rewrite this logic
        $data['coupon_code'] = $this->input->post('coupon_code');
        $data['payment_option'] = 'coupon';
        $data['currency_code'] = 'NGN';
        $data['amount'] = $this->advertiser_model->get_coupon_value($data['coupon_code']);

        $bytes = 10;
        $reference_rand = bin2hex(random_bytes($bytes));
        $_SESSION['trans_details'] = array('amount' => $data['amount']['amount'], 'currency_code' => $data['currency_code'], 'reference_id' => $reference_rand, 'payment_opt' => $data['payment_option']);


        $this->load->view('/common/advertiser_header_view',$data);
        //$this->load->view('/common/advertiser_top_tiles',$data);
        $this->load->view('/user/advertiser/pre_pay_view',$data);
        //$this->load->view('/common/users_footer_view',$data);
    }
}

public function online_payment()
{
    $this->form_validation->set_rules('amount','Amount','required');
    if(!$this->form_validation->run())
    {
        $data['title'] = $this->siteName." | Advertiser Affilate";
        $data['author'] =  $this->author;
        $data['keywords'] =  $this->keywords;
        $data['description'] =  $this->description;
        $data["noindex"] =  $this->noindex;
        $data['account_bal'] = $this->account_balance;
        $data['user'] =$this->user;
        $data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
        $data['general_details'] = $this->advertiser_model->get_general_details();

        $data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
        $data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();



        $this->load->view('/common/advertiser_header_view',$data);
        //$this->load->view('/common/advertiser_top_tiles',$data);
        $this->load->view('/user/advertiser/add_online_payment_view',$data);
        // $this->load->view('/common/users_footer_view',$data);

    }else{

        $data['title'] = $this->siteName." | Payment Preview";
        $data['author'] =  $this->author;
        $data['keywords'] =  $this->keywords;
        $data['description'] =  $this->description;
        $data["noindex"] =  $this->noindex;
        $data['user'] =$this->user;
        $data['account_bal'] = $this->account_balance;

//get country details by user's country

        $data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
        $data['general_details'] = $this->advertiser_model->get_general_details();



        $data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
        $data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
//when we get usd account we rewrite this logic
        $data['amount'] = $this->input->post('amount');
        $data['payment_option'] = "paymt_gate";
        $data['currency_code'] = $this->input->post('currency');
        $bytes = 10;
        $reference_rand = bin2hex(random_bytes($bytes));
        $_SESSION['trans_details'] = array('amount' => $data['amount'], 'currency_code' => $data['currency_code'], 'reference_id' => $reference_rand);


        $this->load->view('/common/advertiser_header_view',$data);
        //$this->load->view('/common/advertiser_top_tiles',$data);
        $this->load->view('/user/advertiser/pre_pay_view',$data);
        //$this->load->view('/common/users_footer_view',$data);



    }
}

public function advertiser_online_gateway_payment()
{
    $advertiser_id = $_SESSION['id'];
    $user_details = $this->user_model->get_user_by_its_id($advertiser_id,'advertisers');
    $advertiser_email = $user_details['email'];
    $amount = $_SESSION['trans_details']['amount'];
    $reference_rand = $_SESSION['trans_details']['reference_id'];
//    print_r($_SESSION['trans_details']['reference_id']);

    $curl = curl_init();

    $amount = $amount * 100;  //the amount in kobo. This value is actually NGN 300

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'amount'=>$amount,
            'email'=>$advertiser_email,
            'callback_url'=>site_url('advertiser_dashboard/advertiser_online_payment_confirmation'),
            'reference'=>$reference_rand,
        ]),
        CURLOPT_HTTPHEADER => [
            "authorization: Bearer ".PAYMENT_SECRET_KEY, //replace this with your own test key
            "content-type: application/json",
            "cache-control: no-cache"
        ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if($err){
        // there was an error contacting the Paystack API
        die('Curl returned error: ' . $err);
    }

    $tranx = json_decode($response, true);

    if(!$tranx['status']){
        // there was an error from the API
        print_r('API returned error: ' . $tranx['message']);
    }

// comment out this line if you want to redirect the user to the payment page
    //print_r($tranx);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);

}


public function advertiser_online_payment_confirmation()
{

  $amount = $_SESSION['trans_details']['amount'];
  $currency = $_SESSION['trans_details']['currency_code'];
    $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
    if (!isset($_SESSION['trans_details']['reference_id']))
    {
        $_SESSION['action_status_report'] = "Unknown Error Occurred";
        $this->session->mark_as_flash('action_status_report');
        show_page("advertiser_dashboard/payments");
    }
    if(!$reference){
        $_SESSION['action_status_report'] = "Unknown Error Occurred";
        $this->session->mark_as_flash('action_status_report');
        show_page("advertiser_dashboard/payments");
    }
    if ($_SESSION['trans_details']['reference_id'] != $reference)
    {
        $_SESSION['action_status_report'] = "Unknown Error Occurred";
        $this->session->mark_as_flash('action_status_report');
        show_page("advertiser_dashboard/payments");
    }
$curl = curl_init();


curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "accept: application/json",
        "authorization: Bearer ".PAYMENT_SECRET_KEY,
        "cache-control: no-cache"
    ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
    die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);
//print_r($tranx);
//die();

if(!$tranx->status){
    // there was an error from the API
    die('API returned error: ' . $tranx->message);
}

    $user=$this->advertiser_model->get_advertiser_by_id($_SESSION['id']);
    $previous_bal = $user['account_bal'];
    $phone = $user['phone'];
    $status = $tranx->data->status;
if('success' == $tranx->data->status || $reference == $tranx->data->reference || $amount == $tranx->data->amount){
    //$exchange_rate = $this->advertiser_model->get_currency_det_by_shortcode($currency)['xchange_rate'];
//get previous balance


    $new_bal = $amount + $previous_bal;

//credit user account
    $this->advertiser_model->credit_balance(array('account_bal' =>$new_bal ));
    date_default_timezone_set('Africa/Lagos'); # add your city to set local time zone
    $now = date('Y-m-d H:i:s');

    $this->advertiser_model->insert_to_payment_record(array('method'=>'online_gateway','phone'=>$phone,'status'=>$status,'payment_type'=>'deposit','amount'=> $amount,'user_type'=>'advertiser','user_id' => $_SESSION['id'], 'time'=>time(), 'trans_date'=>$now));
    $ref = $_SESSION['trans_details']['reference_id'];
    unset($ref);
//unset session variable here
    unset($_SESSION['trans_details']);
    $_SESSION['action_status_report'] ="<span class='text-success'>Payment Success</span>";
    $this->session->mark_as_flash('action_status_report');
    show_page("advertiser_dashboard/payments");
    // transaction was successful...
    // please check other things like whether you already gave value for this ref
    // if the email matches the customer who owns the product etc
    // Give value
}else{
    $this->advertiser_model->insert_to_payment_record(array('method'=>'online_gateway','phone'=>$phone,'status'=>$status,'payment_type'=>'deposit','amount'=> $amount,'user_type'=>'advertiser','user_id' => $_SESSION['id'], 'time'=>time()));
    $_SESSION['action_status_report'] ="<span class='text-danger'>Payment Failed</span>";
    $this->session->mark_as_flash('action_status_report');
    show_page("advertiser_dashboard/payments");
}



}

public function advertiser_online_coupon_payment()
{
//    var_dump($_SESSION['trans_details']['amount']);
//    die;
    $amount = $_SESSION['trans_details']['amount'];
    $currency = $_SESSION['trans_details']['currency_code'];

    if (!isset($_SESSION['trans_details']['reference_id']))
    {
        $_SESSION['action_status_report'] = "Unknown Error Occurred";
        $this->session->mark_as_flash('action_status_report');
        show_page("advertiser_dashboard/payments");
    }

    if (!isset($amount))
    {
        $_SESSION['action_status_report'] = "Unknown Error Occurred";
        $this->session->mark_as_flash('action_status_report');
        show_page("advertiser_dashboard/add_payments");
    }

    if (!isset($currency))
    {
        $_SESSION['action_status_report'] = "Unknown Error Occurred";
        $this->session->mark_as_flash('action_status_report');
        show_page("advertiser_dashboard/payments");
    }

    $user=$this->advertiser_model->get_advertiser_by_id($_SESSION['id']);
    $previous_bal = $user['account_bal'];
    $amount = intval($amount);
//    var_dump($amount);
//    die;
    $new_bal = $amount + $previous_bal;
    $phone = $user['phone'];
    $status = "success";
    $this->advertiser_model->credit_balance(array('account_bal' =>$new_bal ));
    date_default_timezone_set('Africa/Lagos'); # add your city to set local time zone
    $now = date('Y-m-d H:i:s');

    $this->advertiser_model->insert_to_payment_record(array('method'=>'coupon','phone'=>$phone,'status'=>$status,'payment_type'=>'deposit','amount'=> $amount,'user_type'=>'advertiser','user_id' => $_SESSION['id'], 'time'=>time(), 'trans_date'=>$now));
    $ref = $_SESSION['trans_details']['reference_id'];
    unset($ref);
    unset($_SESSION['trans_details']);
    $_SESSION['action_status_report'] ="<span class='text-success'>Payment Success</span>";
    $this->session->mark_as_flash('action_status_report');
    show_page("advertiser_dashboard/payments");
}

public function reference_number_verification()
{

}
public function edit_cpa_form_first_section($ref_id)
{


$this->form_validation->set_rules('form_name','Form Name','required');
$this->form_validation->set_rules('company_name','Company Name','required');
//$this->form_validation->set_rules('field_name[]','Field Name','required',array('required' => 'You must create atleast one form element'));

//$this->form_validation->set_rules('access_type','access Type','required');
if(!$this->form_validation->run())
{
  $_SESSION['action_status_report'] = validation_errors();
   show_page('advertiser_dashboard/edit_cpa_form/'.$this->uri->segment(3));


  }else{
    $old_form_makeup_data_array =json_decode($this->advertiser_model->get_cpa_form_by_ref_id($ref_id)['form_makeup_data'],true);
    //then user wanna add field
$field_types = $this->input->post('type');
$field_names = $this->input->post('field_name');


$field_values = $this->input->post('fieldselectitem');

    if(!empty($field_names))
{

$no_expected_field = count($field_types);
$form_makeup_data = [];
for ($i=0; $i < $no_expected_field  ; $i++) {
if(!empty($field_names[$i]))
{
$form_makeup_data[$i] = array('field_type' => $field_types[$i],'field_names' => $field_names[$i],'field_values' => $field_values[$i] );
}
}

}
/*
var_dump($form_makeup_data);
echo "--New <br><br><br>";
var_dump($old_form_makeup_data_array);
echo "--Old <br><br><br>";

var_dump(array_merge($old_form_makeup_data_array,$form_makeup_data));
echo "--Join <br><br><br>";
*/

$this->advertiser_model->edit_cpa_form(array_merge($old_form_makeup_data_array,$form_makeup_data),$ref_id);
 $_SESSION['action_status_report']= "<span class='w3-text-green'>Updated Successfully</span>";
 $this->session->mark_as_flash('action_status_report');
show_page('advertiser_dashboard/edit_cpa_form/'.$ref_id);
  }

}
public function cpa_form()
{
$this->form_validation->set_rules('form_name','Form Name','required');
$this->form_validation->set_rules('company_name','Company Name','required');
$this->form_validation->set_rules('field_name[]','Field Name','required',array('required' => 'You must create atleast one form element'));

$this->form_validation->set_rules('access_type','access Type','required');
if(!$this->form_validation->run())
{
      $data['title'] = $this->siteName." | CPA FORMS";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
    $data['account_bal'] = $this->account_balance;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
$data["cpas"] = $this->advertiser_model->count_advertisers_cpas();


//get country details by user's country

$data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
$data['general_details'] = $this->advertiser_model->get_general_details();





    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);

    $this->load->view('/user/advertiser/cpa_form_view',$data);
     $this->load->view('/common/users_footer_view',$data);




  }else{

$field_types = $this->input->post('type');
$field_names = $this->input->post('field_name');


$field_values = $this->input->post('fieldselectitem');
/*
echo "<br>Field Types <br>";
var_dump($field_types);

echo "<br>Field Names <br>";
var_dump($field_names);


echo "<br>Field Values <br>";
var_dump($fieldvalues);*/
$no_expected_field = count($field_types);
$form_makeup_data = [];
for ($i=0; $i < $no_expected_field  ; $i++) {

if(!empty($field_names[$i]))
{
$form_makeup_data[$i] = array('field_type' => $field_types[$i],'field_names' => $field_names[$i],'field_values' => $field_values[$i] );
}
}
//add time field here
array_push($form_makeup_data, array('field_type' => 'inbuilt','field_names' => 'time','field_values' => '' ));

$ref_id = substr(md5(time()), 12);
$this->advertiser_model->insert_cpa_form(json_encode($form_makeup_data),$ref_id);

show_page('advertiser_dashboard/post_form_addition/'.$ref_id);
  }
}



public function edit_cpa_form($ref_id = NULL)
{
  $data['title'] = $this->siteName." | CPA FORMS";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
$data['form'] = $this->advertiser_model->get_cpa_form_by_ref_id($ref_id);
    $data['account_bal'] = $this->account_balance;

//get country details by user's country

$data['country_details'] = $this->advertiser_model->get_country_details($data['user']['country']);
$data['general_details'] = $this->advertiser_model->get_general_details();






    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);

    $this->load->view('/user/advertiser/edit_cpa_form_view',$data);
     $this->load->view('/common/users_footer_view',$data);



}

public function post_form_addition($ref_id)
{

  if(!isset($_POST['submit']))
  {

  $data['title'] = $this->siteName." | Form Editor";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
      $data['account_bal'] = $this->account_balance;


    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
   $this->load->view('/user/advertiser/post_form_view',$data);
     $this->load->view('/common/users_footer_view',$data);

}else{
//move to next page
$this->advertiser_model->insert_addon_details($ref_id);
if ($_POST['usage'] == 'cpa') {
show_page('advertiser_dashboard/add_campaign/'.$ref_id);
}else{
  show_page('advertiser_dashboard/view_data_list/'.$ref_id);

}
}

}


public function edit_post_form_addition($ref_id)
{

  if(!isset($_POST['submit']))
  {

  $data['title'] = $this->siteName." | Form Editor";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
$data['cpa_elements'] =  $this->advertiser_model->get_cpa_form_by_ref_id($ref_id);

      $data['account_bal'] = $this->account_balance;
    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
   $this->load->view('/user/advertiser/edit_post_form_view',$data);
     $this->load->view('/common/users_footer_view',$data);

}else{
//move to next page
$this->advertiser_model->insert_addon_details($ref_id);
$_SESSION['action_status_report'] = "<span class='w3-text-green'>Details Updated Successfully</span>";
$this->session->mark_as_flash('action_status_report');
show_page('advertiser_dashboard/edit_post_form_addition/'.$ref_id);
}

}


public function cpa_forms_list($offset = 0)
{

    $limit = 5;
      $this->load->library('pagination');

        $data['items'] =  $this->advertiser_model->get_advertisers_cpa("cpa_forms",$offset,$limit);
    $config['base_url'] = site_url("advertiser_dashboard/cpa_forms_list");
  $config['total_rows'] = count($this->advertiser_model->get_advertisers_cpa("cpa_forms",null,null));

    $config['per_page'] = $limit;

   //$config['uri_segment'] = 4;
  $config['first_tag_open'] = '<span class="w3-btn w3-indigo w3-text-white">';
  $config['first_tag_close'] = '</span>';
  $config['last_tag_open'] = '<br><span class="w3-btn w3-indigo w3-text-white">';
  $config['last_tag_close'] = '</span>';
  $config['first_link'] = 'First';



  $config['prev_link'] = 'Prev';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-indigo w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();





  $data['title'] = $this->siteName." | Forms CPA";
      $data['author'] =  $this->author;
      $data['keywords'] =  $this->keywords;
      $data['description'] =  $this->description;
      $data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();


    $data['account_bal'] = $this->account_balance;
    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
   $this->load->view('/user/advertiser/cpa_list_view',$data);
     $this->load->view('/common/users_footer_view',$data);


}

public function edit_form_field($ref_id){

if(array_key_exists('delete', $_POST)) {
  $old_form_makeup_data_array =json_decode($this->advertiser_model->get_cpa_form_by_ref_id($ref_id)['form_makeup_data'],true);
 $field_to_delete =[];
for ($i=0; $i <$_POST['no_field'] ; $i++) {

if(array_key_exists($i, $_POST)) {
array_push($field_to_delete, $i);
 }
}
for ($p = 0; $p < count($field_to_delete) ;$p++) {
  unset($old_form_makeup_data_array[$field_to_delete[$p]]);
}
//var_dump($old_form_makeup_data_array);
//insert the new aray here
$this->advertiser_model->edit_form_fields($old_form_makeup_data_array,$ref_id);
$_SESSION['action_status_report'] = "<span class='w3-text-red'>Form Field(s) Deleted Successfully</span>";
$this->session->mark_as_flash('action_status_report');
show_page('advertiser_dashboard/edit_cpa_form/'.$ref_id);
}else{
//deal with edit here

//wont happen
}





}
public function use_existing_cpa()
{
if (isset($_POST['submit'])) {
  show_page('advertiser_dashboard/add_campaign/'.$_POST['form']);
}


}
public function view_data_list($ref_id,$offset= 0)
{


$data['title'] = $this->siteName." | Data List";
$data['author'] = "Olaniyi Ojeyinka";
$data['keywords'] =  $this->keywords;
$data['description'] =  $this->description;
$data["noindex"] =  $this->noindex;
$data['user'] =$this->user;
$data["count_campaigns"] = $this->advertiser_model->count_advertisers_campaigns();
$data["count_cpa"] = $this->advertiser_model->count_advertisers_cpa();
$data['cpa'] = $this->advertiser_model->get_cpa_form_by_ref_id($ref_id);
    $data['account_bal'] = $this->account_balance;
//$data['data_list']= json_decode($cpa['form_data'],true);
$data_list= json_decode($data['cpa']['form_data'],true);


    $limit = 5;
      $this->load->library('pagination');

    $data['data_list'] =  array_slice($data_list, $offset,$limit);
    $config['base_url'] = site_url("advertiser_dashboard/view_data_list/".$ref_id);
  $config['total_rows'] = count($data_list);

    $config['per_page'] = $limit;

   //$config['uri_segment'] = 4;
  $config['first_tag_open'] = '<span class="w3-btn w3-indigo w3-text-white">';
  $config['first_tag_close'] = '</span>';
  $config['last_tag_open'] = '<br><span class="w3-btn w3-indigo w3-text-white">';
  $config['last_tag_close'] = '</span>';
  $config['first_link'] = 'First';



  $config['prev_link'] = 'Prev';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<span style="margin-left:20%" class="w3-btn w3-indigo w3-text-white">';
  $config['next_tag_close'] = '</span><br>';
  $config['prev_tag_open'] = '<span style="" class="w3-btn w3-indigo w3-text-white">';
  $config['prev_tag_close'] = '</span>';
  $config['last_link'] = 'Last';
  $config['display_pages'] = false;

       $this->pagination->initialize($config);
  $data['pagination'] = $this->pagination->create_links();





    $this->load->view('/common/advertiser_header_view',$data);
      $this->load->view('/common/advertiser_top_tiles',$data);
   $this->load->view('/user/advertiser/data_list_view',$data);
     $this->load->view('/common/users_footer_view',$data);



}



}
