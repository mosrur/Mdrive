<?php
/**
 * home.php - the index file
 *
 * @package: Mdrive.
 * @author: Mosrur Chowdhury
 * @link: http://mosrur.com
 */
?>

<!-- load header -->
<?php $this->load->view('header');?>


<div class="row">
    <!-- the contents goes here -->
    <div class="col-md-6">
        <p> Some content gonna goes here</p>

    </div>
    <div class="col-md-6">
        <!-- Signin form -->
        <?php echo validation_errors();?>

        <?php echo form_open('user/singup'); ?>
        <!-- Fieldset open -->
        <?php
        $form_fieldset = array(
            'id'    => 'address_info',
            'class' => 'address_info'
        );

        echo form_fieldset('User Signin', $form_fieldset);
        ?>

        <!-- firstname -->
        <div class="form-group">
            <?php echo form_label('Firstname', 'firstname'); ?>
            <?php echo form_input('firstname');?>

        </div>

        <!-- lasttname -->
        <div class="form-group">
            <?php echo form_label('Lastname', 'lastname'); ?>
            <?php echo form_input('lastname');?>

        </div>

        <!-- lasttname -->
        <div class="form-group">
            <?php echo form_label('Email', 'email'); ?>
            <?php echo form_input('email');?>

        </div>

        <!-- username -->
        <div class="form-group">
            <?php echo form_label('Username', 'username'); ?>
            <?php echo form_input('username');?>

        </div>

        <!-- password -->
        <div class="form-group">
            <?php echo form_label('Password', 'password'); ?>
            <?php echo form_password('firstname');?>

        </div>


        <!-- fieldset close -->
        <?php echo form_fieldset_close();?>


        <?php echo form_close();?>


    </div>

</div>


<!-- load footer -->
<?php $this->load->view('footer');?>

