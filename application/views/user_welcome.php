<html>
<link rel="stylesheet" href="<?php base_url() ?>assets/css/user_welcome.css" />
Welcome <?php echo $this->session->userdata['user_name']; ?>
<div class="container">
    <div class="card">
        <a href="https://instantventures.com/travel/"> <img width="150px" height="100px" src="<?php base_url() ?>assets/images/travel.jpg" />
        <h5>Travel Card</h5></a>
    </div>
    <div class="card">
        <a href="https://instantventures.com/crm/"> <img width="150px" height="100px" src="<?php base_url() ?>assets/images/logo.PNG" />
        <h5>CRM</h5></a>
    </div>
    <div class="card">
        <a href="https://instantventures.com/travel/"> <img width="150px" height="100px" src="<?php base_url() ?>assets/images/calender.jpeg" />
        <h5>calender</h5></a>
    </div>
</div>

</html>