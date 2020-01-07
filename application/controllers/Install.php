<?php
/***
 * Name:       Adnetwork server
 * Package:     Initail.php
 * About:        A controller that handle auto table creation operation operation
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/


class Install extends CI_Controller {
    function index()
    {

    $this->load->database();

    $queries= array(
     
        "INSERT INTO `publishers` (`id`, `firstname`, `lastname`, `password`, `country`, `state`, `email`, `email_vc`, `phone`, `account_bal`, `total_earned`, `pending_bal`, `platform`, `account_status`, `websites`, `browser`, `lastlog`, `bank_name`, `bank_acct`, `bank_det`, `bank_no`, `payment_type`, `referral_id`, `time`) VALUES
(1, 'Mobile', 'Publisher', 'c21f969b5f03d33d43e04f8f136e7682', 'nigeria', NULL, 'm.publisher@gmail.com', NULL, '554775551', '7.0000', '0.0000', '0.0000', NULL, 'active', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1577419892),
(2, 'Web', 'Publisher', 'c21f969b5f03d33d43e04f8f136e7682', 'nigeria', NULL, 'w.publisher@gmail.com', NULL, '554775551', '7.0000', '0.0000', '0.0000', NULL, 'active', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1577419892);"


 );

  


 foreach($queries as $table)
 {
  if ($this->db->query($table))
  {

  echo "Action taken Successfully"."<br>";

  }
  }
}


}
