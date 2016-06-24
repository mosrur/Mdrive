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


    <div class="logbox">


        <h1 class="page-header text-center">Signin ... </h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="signin" id="login-form-link">Signin</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="signup" class="active" id="register-form-link">Signup</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if(validation_errors()): ?>
                                    <div class="alert alert-danger">
                                        <?php echo validation_errors();?>
                                    </div>
                                <?php endif; ?>

                                <?php echo form_open('account/signin'); ?>

                                <!-- username -->
                                <div class="form-group">
                                    <?php //echo form_label('Username', 'username'); ?>
                                    <?php echo form_input('username', '', 'class="form-control" placeholder="Username"');?>
                                </div>

                                <!-- password -->
                                <div class="form-group">
                                    <?php //echo form_label('Password', 'password'); ?>
                                    <?php echo form_password('password', '', 'class="form-control" placeholder="Passowrd"');?>
                                </div>

                                <!-- form submit -->
                                <?php echo form_submit('form-submit', 'Sign in!', 'class="btn btn-default"'); ?>

                                <?php echo form_close();?>

                                <!-- eof login box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- /container -->
    <div class="clear"></div>

</div>

</div>


<!-- load footer -->
<?php $this->load->view('footer');?>

