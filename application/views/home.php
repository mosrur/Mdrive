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

                echo form_fieldset('User Signin', $form_fieldset);
                ?>


                <!-- username -->
                <div class="form-group">
                    <?php echo form_label('Username', 'username', 'class="form-group"'); ?>
                    <?php echo form_input('username');?>
                </div>

                <!-- password -->
                <div class="form-group">
                    <?php echo form_label('Password', 'password', 'class="form-group"'); ?>
                    <?php echo form_password('firstname');?>
                </div>

                <!-- form submit -->
                <?php echo form_submit('form-submit', 'Sign in!'); ?>

                <!-- fieldset close -->
                <?php echo form_label('&nbsp;', '&nbsp;'); ?>
                <?php echo form_fieldset_close();?>


            <?php echo form_close();?>


        </div>

    </div>


<!-- load footer -->
<?php $this->load->view('footer');?>

