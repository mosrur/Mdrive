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
            <!--- check user login -->
            <?php if(!is_logged_in()): ?>

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

                    <!-- eof login box -->
                    <?php echo form_close();?>

            <?php else: ?>

                <!-- File upload form -->

                <!-- Fieldset open -->
                <?php
                $form_fieldset = array(
                    'id'    => 'file_upload',
                    'class' => 'file_upload'
                );

                echo form_fieldset('Upload a file', $form_fieldset);
                ?>


                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors();?>
                    </div>
                <?php endif; ?>

                <?php echo form_open_multipart('file/upload'); ?>

                <!-- username -->
                <div class="form-group">
                    <?php //echo form_label('Username', 'username'); ?>
                    <?php echo form_input('title', set_value('title'), 'class="form-control" placeholder="File Title"');?>
                </div>

                <!-- password -->
                <div class="form-group">
                    <?php //echo form_label('Password', 'password'); ?>
                    <?php echo form_upload('userfile', '', 'class="form-control" placeholder="Passowrd"');?>
                </div>

                <!-- form submit -->
                <?php echo form_submit('form-submit', 'Upload File', 'class="btn btn-default"'); ?>

                <!-- eof login box -->
                <?php echo form_close();?>


            <?php endif; ?>


        </div>

    </div>


<!-- load footer -->
<?php $this->load->view('footer');?>

