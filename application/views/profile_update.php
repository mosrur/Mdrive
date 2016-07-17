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
    <div class="col-md-12 middle">
        <!-- Signin form -->
    </div>

    <div class="logbox">


        <h1 class="page-header text-center">User profile ... </h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if(validation_errors()): ?>
                                    <div class="alert alert-danger">
                                        <?php echo validation_errors();?>
                                    </div>
                                <?php endif; ?>

                                <?php echo form_open('account/profile_update'); ?>

                                <!-- firstname -->
                                <div class="form-group">
                                    <?php echo form_input('firstname',  set_value('firstname', $user->firstname), 'class="form-control" placeholder="Firstname"');?>

                                </div>

                                <!-- lasttname -->
                                <div class="form-group">
                                    <?php echo form_input('lastname', set_value('lastname', $user->lastname), 'class="form-control" placeholder="Lastname"');?>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <?php echo form_input('email',  set_value('email', $user->email), 'class="form-control" placeholder="Email"');?>

                                </div>

                                <!-- username -->
                                <div class="form-group">
                                    <?php echo form_input('username', set_value('username', $user->username), 'class="form-control" placeholder="Username"');?>

                                </div>

                                <?php
                                    //$box = array('onClick' => 'some_function();');
                                    echo form_checkbox('pass-show', 'accept', FALSE)."&nbsp;Show password box <br><br>";
                                ?>
                                <div id="pass-box">
                                    <!-- password -->
                                    <div class="form-group">
                                        <?php echo form_password('password',  set_value('password'), 'class="form-control" placeholder="Password"');?>
                                    </div>

                                    <!-- Conf password -->
                                    <div class="form-group">
                                        <?php echo form_password('passconf',  set_value('passconf'), 'class="form-control" placeholder="Confirm Password"');?>
                                    </div>
                                </div>

                                <!-- form submit -->
                                <?php echo form_submit('form-submit', 'Update profile', 'class="btn btn-default"'); ?>


                                <!-- fieldset close -->
                                <?php echo form_fieldset_close();?>


                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- /container -->
    <div class="clear"></div>

</div>


<!-- load footer -->
<?php $this->load->view('footer');?>

