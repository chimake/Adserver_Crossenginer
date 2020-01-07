# PHP-AdNetworkServer
A PHP web App for Serving Text Ads,Image Ads and Article like Ads based on Codeigniter3
<br>
------------------------------------------------------- Features------------------------------------------------------------------



<br><br>
## Network Admin Features-
<ul>
	<li>Monitor campaign and ads spaces</li>
<li>Manage Advertisers & Publishers</li>
<li>Approve Publisher account</li>
<li>Generate Coupon<li>

</ul>


## Publisher Features-

<ul>
	
<li>Integration Code Generator</li>
<li>Manage Ads Spaces</li>

</ul>

## Advertiser Account-
<ul>

<li>Account Settings</li>
<li>Ad Creator</li>
<li>Manage Ads</li>
<li>Ads Performance Report </li>
<li>Integration with Paysatck Payment Gateway</li>
<li>Coupon payment integration</li>
</ul>

## Installation
<ul>
	<li>Copy the files to your root directory</li>
	<li>Change database connection details at application/config/database.php</li>
	<li>then go to your_url/index.php/install to prepare the database for the web app</li>

</ul>

<br>

## END Points (Newtork Admin Features)-
<ul>

<li>
	Login: your_url/index.php/ch_admin
</li>

<li>
	Adevrtisers management:
	<ul>
		<li>Advertisers list: your_url/index.php/admin/advertisers_list/:offset</li>
		<li>Login to advertiser account: your_url/index.php/admin/login_to_user_account/:account_type(:id)</li>
		<li>View advertiser profile details: your_url/index.php/admin/advertiser_profile_details/:id</li>
		<li>Suspend advertiser account: your_url/index.php/admin/suspend/:account_type(:id)</li>
		<li>Resume advertiser account: your_url/index.php/admin/resume/:account_type(:id)</li>
	</ul>	
</li>

<li>
	Publishers management:
	<ul>
		<li>Publishers list: your_url/index.php/admin/publishers_list/:offset</li>
		<li>Login to publisher account: your_url/index.php/admin/login_to_user_account/:account_type(:id)</li>
		<li>View publisher profile details: your_url/index.php/admin/publisher_profile_details/:id</li>
		<li>Suspend advertiser account: your_url/index.php/admin/suspend/:account_type(:id)</li>
		<li>Resume advertiser account: your_url/index.php/admin/resume/:account_type(:id)</li>
	</ul>	
</li>

<li>
	Campaigns management:
	<ul>
		<li>Campaigns list: your_url/index.php/admin/Campaigns/:offset</li>
		<li>View campaign details: your_url/index.php/admin/view_campaign_details/:ref_id</li>
		<li>Campaign Approval: your_url/index.php/admin/campaign_action/:action(:ref_id)</li>
	</ul>		
</li>

<li>
	Spaces management:
	<ul>
		<li>Spaces list: your_url/index.php/admin/spaces/:offset</li>
		<li>View space details: your_url/index.php/admin/view_space_details/:ref_id</li>
		<li>Space Approval: your_url/index.php/admin/space_action/:action(:ref_id)</li>
	</ul>		
</li>

<li>
	Coupon management:
	<ul>
		<li>Coupon list: your_url/index.php/admin/coupons/:offset</li>
		<li>Generate coupon: your_url/index.php/admin/add_coupon/</li>
		<li>Edit coupon: your_url/index.php/admin/edit_coupon/:coupon_id</li>
		<li>Delete coupon: your_url/index.php/admin/delete_coupon/:coupon_id</li>
	</ul>		
</li>

<li>
	Payment Tracking:
	<ul>
		<li>Payment list: your_url/index.php/admin/payments/:offset</li>	
	</ul>		
</li>

<li>
	Edit site settings:  your_url/index.php/admin/site_settings/	
</li> 
</ul>

## END Points (Publisher Features)-
<ul>
	
<li>Integration Code Generator</li>
<li>
	Manage Ads Spaces:
	<ul>
		<li>Spaces list: your_url/index.php/publisher_dashboard/spaces/:offset</li>
		<li>Add space: your_url/index.php/publisher_dashboard/add_space/:ref_id</li>
	</ul>	
</li>

</ul>

## END Points (Advertiser account)-
<ul>

<li>Account Settings: your_url/index.php/advertiser_dashboard/settings/:offset</li>
<li>
	Campaign Management:
	<ul>
		<li>Campaigns list: your_url/index.php/advertiser_dashboard/campaign/:offset</li>
		<li>Add campaign: your_url/index.php/advertiser_dashboard/add_campaign/:cpa_ref_id</li>
		<li>View campaign details: your_url/index.php/advertiser_dashboard/view_details/:ref_id</li>
		<li>Add campaign budget: your_url/index.php/advertiser_dashboard/campaign_budget/:ref_id</li>
		<li>Set campaign target: your_url/index.php/advertiser_dashboard/campaign_target/:ref_id</li>
		<li>Skip campaign target selection: your_url/index.php/advertiser_dashboard/skip_targeting/:ref_id</li>
		<li>Choose campaign type: your_url/index.php/advertiser_dashboard/campaign_action/:action(:ref_id)</li>
		<li>Add banner campaign: your_url/index.php/advertiser_dashboard/add_banner_campaign/:cpa_ref_id</li>
		<li>Add text campaign: your_url/index.php/advertiser_dashboard/add_text_campaign/:cpa_ref_id</li>
	</ul>
</li>

<li>
	Payments:
	<ul>
		<li>Payments list: your_url/index.php/advertiser_dashboard/payments/:offset</li>
		<li>Add payment: your_url/index.php/advertiser_dashboard/add_payment/</li>
		<li>Coupon payments: your_url/index.php/advertiser_dashboard/coupon_payment/:[POST]amount</li>
		<li>Online payments: your_url/index.php/advertiser_dashboard/online_payment/:[POST]amount</li>
	
	</ul>
</li>
</ul>


## Requirement
PHP 5.6+,MSQL 5+ 


## Todo
--Rave integration
--ability for admin to choose out of available payment gateway
