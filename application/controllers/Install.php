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
      "CREATE TABLE blog (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128),
        author varchar(128),
        author_id varchar(128),
        time int(100) NOT NULL,
        time_edit int(100),
        keywords varchar(225),
        description varchar(225),
        img_url varchar(225),
        status varchar(225),
        category varchar(225),
        text text NOT NULL,
        PRIMARY KEY (id)
);",
"CREATE TABLE payments (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128) NOT NULL,
        user_type varchar(128) NOT NULL,
        method varchar(128) NOT NULL,
        phone int,
        amount DECIMAL(19,4) NOT NULL,
        status varchar(128),
        particular varchar(128),
        payment_type varchar(128),
        time varchar(128),
        time_of_completion varchar(128),
        ldetails text,
        PRIMARY KEY (id)
);",
"CREATE TABLE team (
        id int(11) NOT NULL AUTO_INCREMENT,
        firstname varchar(128),
        lastname varchar(128),
        username varchar(128),
        perm varchar(128) ,
        email varchar(128),
        time varchar(128),
        password varchar(128),
        PRIMARY KEY (id)
);"
   ,
   "CREATE TABLE pages (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        author varchar(128),
        time varchar(128) NOT NULL,
        type varchar(128) NOT NULL,
        keywords varchar(225),
        description varchar(225),
        status varchar(225),
        text text NOT NULL,
       PRIMARY KEY (id)
);",

"CREATE TABLE cmessages (
        id int(11) NOT NULL AUTO_INCREMENT,
        phone int(128),
        email varchar(128),
        name varchar(128),
        title varchar(128) NOT NULL,
        message  text NOT NULL,
        status varchar(128),
        solved varchar(128),
       time varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE newsletter (
        id int(11) NOT NULL AUTO_INCREMENT,
        email varchar(128),
        name varchar(128),
        status varchar(128),
        PRIMARY KEY (id)
);",

 "CREATE TABLE media (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        time varchar(128),
        ctime int,
        link varchar(128),
        type varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE notifications (
        id int(11) NOT NULL AUTO_INCREMENT,
        sender_id varchar(128),
        receiver_id varchar(128),
        slug varchar(128),
        contents varchar(128),
        type varchar(128),
        status varchar(128),
        time varchar(128),
          PRIMARY KEY (id)
);",
"CREATE TABLE clicks (
        id int(11) NOT NULL AUTO_INCREMENT,
        time int(100),
        story_pid varchar(100),
        space_id varchar(100),
        story_aid varchar(100),
        story_id varchar(100),
        ip varchar(128),
        status varchar(128),
        platform varchar(128),
         browser varchar(128),
        os varchar(128),
        is_mobile varchar(128),
        country varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE views (
        id int(11) NOT NULL AUTO_INCREMENT,
        time int(100),
        story_pid varchar(100),
        space_id varchar(100),
        story_aid varchar(100),
        story_id varchar(100),
        ip varchar(128),
        status varchar(128),
        platform varchar(128),
        browser varchar(128),
        is_mobile varchar(128),
        country varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE adv_story (
      id int(11) NOT NULL AUTO_INCREMENT,
      time int(100),
      user_id int(100),
      clicks int(50),
      expire_time int(100),
      start_time int(100),
      per_click DECIMAL(19,4),
      per_view DECIMAL(19,4),
      per_action DECIMAL(19,4),
      budget DECIMAL(19,4),
      balance DECIMAL(19,4),
      views int(100),
      name varchar(128),
      dest_link varchar(259),
      type varchar(59),
      size varchar(59),
      disp_link varchar(259),
      img_link varchar(259),
      keywords varchar(128),
      ref_id varchar(225),
      cpa_id varchar(225),
      text_title varchar(255),
      text_content text,
      spent varchar(128),
      approval varchar(128),
      edit_status varchar(128),
      status varchar(128),
      tplatform text,
      tcategory text,
      tbrowser text,
      tcountry text,
      targeting text,
      category varchar(128),
      cr_level varchar(12),
      platform varchar(128),
      action_currency varchar(128),
      action_price DECIMAL(19,4),
      action_type varchar(128),
        PRIMARY KEY (id)
);",
        //cr_level options 1,2,3 show completion status of ceating ads
        //status includes incomplete,pending,active,inactive,
        //approval includes incomplete,pending,true,false of type string
//for admin interface:once dissaproved status must change to inactive andd refund

      //other related value  here are for targeting


"CREATE TABLE pub_story (
        id int(11) NOT NULL AUTO_INCREMENT,
        time int(100),
        user_id int(100) NOT NULL,
        clicks int(100),
        views int(100),
       status varchar(128),
       type varchar(128),
       size varchar(128),
       ref_id varchar(128),
      website varchar(128),
      name varchar(128),
      gained varchar(128),
      country varchar(128),
      div_id varchar(22),
      category text,
      platform varchar(128),
      code text,
      os varchar(128),
      browser varchar(128),
        PRIMARY KEY (id)
);",

 "CREATE TABLE history (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_email varchar(128),
         details varchar(128),
        action varchar(128),
         time int(100),
        account_type varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE projects (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128),
        category varchar(128),
        approval varchar(128),
        time int(100),
        link varchar(128),
        type varchar(128),
        PRIMARY KEY (id)
);",
//approval option: true,false of type string
"CREATE TABLE advertisers (
            id int(11) NOT NULL AUTO_INCREMENT,
            firstname varchar(128),
            lastname varchar(128),
            password varchar(128),
            country varchar(128),
            state varchar(128),
            email varchar(128),
            email_vc varchar(300),          
            phone varchar(128),
            account_bal DECIMAL(19,4),
            total_spent DECIMAL(19,4),
            platform varchar(128),
            websites text,
            account_status varchar(128),
            browser varchar(128),
            referral_id varchar(128),
            lastlog varchar(128),
            time int(100),
            PRIMARY KEY (id)
    );",
    "CREATE TABLE publishers (
            id int(11) NOT NULL AUTO_INCREMENT,
            firstname varchar(128),
            lastname varchar(128),
            password varchar(128),
            country varchar(128),
            state varchar(128),
            email varchar(128),
            email_vc varchar(300),
            phone varchar(128),
            account_bal DECIMAL(19,4),
            total_earned DECIMAL(19,4),
            pending_bal DECIMAL(19,4),
            platform varchar(128),
            account_status varchar(128),
            websites text,
            browser varchar(128),
            lastlog varchar(128),
            bank_name varchar(128),
            bank_acct varchar(128),
            bank_det varchar(128),
            bank_no varchar(128),
            payment_type varchar(128),
            referral_id varchar(128),
            time int(100),
            PRIMARY KEY (id)
    );",
    "CREATE TABLE system_var (
    id int(11) NOT NULL AUTO_INCREMENT,
    variable_name varchar(128),
    variable_value varchar(128),
    long_value text,
    PRIMARY KEY (id)
);",
"CREATE TABLE affilate_clicks (
    id int(11) NOT NULL AUTO_INCREMENT,
    referral_id varchar(128),
    account_type varchar(128),
    time int(100),
  PRIMARY KEY (id)
);",

    $sql19 = "CREATE TABLE withdrawal (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128) NOT NULL,
        ref varchar(128) NOT NULL,
        method varchar(128) NOT NULL,
        phone int,
        amount DECIMAL(19,4) NOT NULL,
        status varchar(128),
        approval varchar(128),
         email varchar(128),
        time int(100),
        details text,
        PRIMARY KEY (id)
);",
"CREATE TABLE messages (
        id int(11) NOT NULL AUTO_INCREMENT,
        receiver_id varchar(128),
        receiver_type varchar(128),
        title varchar(128) NOT NULL,
        message  text NOT NULL,
        status varchar(128),
        type varchar(128),
        platform_type varchar(128),
        time varchar(128),
        PRIMARY KEY (id)
);",

     $sql21 = "CREATE TABLE admin_earning (
        id int(11) NOT NULL AUTO_INCREMENT,
        month varchar(128),
        year varchar(10),
        type varchar(10),
        earning_type varchar(10),
        weekday varchar(128),
        amount DECIMAL(19,4) NOT NULL,
        time varchar(128),
          PRIMARY KEY (id)
);",
"CREATE TABLE cpa_forms (
        id int(11) NOT NULL AUTO_INCREMENT,
        advertisers_id varchar(128),
        name varchar(128),
        ref_id varchar(128),
        form_makeup_data LONGTEXT,
        form_data LONGTEXT,
        extra_data LONGTEXT,
        extra_data_position ENUM('pre_form','post_form'),
        access_type ENUM('free','paid'),
        price DECIMAL(19,4),
        currency_code varchar(128),
        company_name varchar(225),
        form_slug  varchar(128),
        time varchar(128),
          PRIMARY KEY (id)
);",
"CREATE TABLE countries (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        select_value varchar(128),
        language varchar(128),
        currency_code varchar(128),
        currency_name varchar(128),       
        xchange_rate DECIMAL(19,4) NOT NULL,
        minimum_cpc  DECIMAL(19,4) NOT NULL,
        minimum_cpa  DECIMAL(19,4) NOT NULL,
        minimum_paid_cpa  DECIMAL(19,4) NOT NULL,
        minimum_cpm  DECIMAL(19,4) NOT NULL,
        minimum_budget  DECIMAL(19,4) NOT NULL,
        minimum_deposit  DECIMAL(19,4) NOT NULL,
        minimum_payout  DECIMAL(19,4) NOT NULL,     
        flag_slug  varchar(128),
        time varchar(128),
          PRIMARY KEY (id)
);",
"INSERT INTO system_var (variable_name, variable_value, long_value)
 VALUES ('site_name','Adnetwork','' ),
 ('author','Adnetwork Inc','' ),
 ('tagline','','Your Network tagline' ),
 ('keywords','','Your site SEO keywords separed by comma' ),
 ('description','','Your Site SEO keywords' );",
 "INSERT INTO team (firstname, lastname, username, perm, email, password)
VALUES ('Black','Beard','black_beard','1','tester@test.com','c7284ad394a26911bd432679b3adf355');"


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
