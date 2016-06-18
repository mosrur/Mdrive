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
            <br><br>
            <p> Some content gonna goes here</p>

        </div>
        <div class="col-md-6">
            <!-- Signin form -->
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger">
                <?php echo validation_errors();?>
            </div>
            <?php endif; ?>

            <?php echo form_open('account/signin'); ?>
                <!-- Fieldset open -->
                <?php
                $form_fieldset = array(
                        'id'    => 'address_info',
                        'class' => 'address_info'
                );

                echo form_fieldset('Signin', $form_fieldset);
                ?>


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


            <?php echo form_close();?>


        </div>

    </div>


<!-- load footer -->
<?php $this->load->view('footer');?>

