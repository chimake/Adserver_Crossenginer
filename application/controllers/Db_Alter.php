<?php
/***
 * Name:       Adnetwork server
 * Package:     Initail.php
 * About:        A controller that handle auto table creation operation operation
 * Copyright:  (C) 2018,
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/


class Db_Alter extends CI_Controller {
    function index()
    {

    $this->load->database();

    $queries= array(
      "ALTER TABLE payments
      ADD trans_date datetime");

  


 foreach($queries as $table)
 {
  if ($this->db->query($table))
  {

  echo "Action taken Successfully"."<br>";

  }
  }
}


}
