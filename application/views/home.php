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
            <?php if(!is_logged_in()): ?>

            <!-- Signin form -->
            <?php if(validation_errors()): ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors();?>
                </div>
            <?php endif; ?>

            <?php echo form_open('account/signup'); ?>
            <!-- Fieldset open -->
            <?php
            $form_fieldset = array(
                'id'    => 'address_info',
                'class' => 'address_info'
            );

            echo form_fieldset('Signin', $form_fieldset);
            ?>


            <!-- firstname -->
            <div class="form-group">
                <?php echo form_input('firstname',  set_value('firstname'), 'class="form-control" placeholder="Firstname"');?>

            </div>

            <!-- lasttname -->
            <div class="form-group">
                <?php echo form_input('lastname', set_value('lastname'), 'class="form-control" placeholder="Lastname"');?>
            </div>

            <!-- Email -->
            <div class="form-group">
                <?php echo form_input('email',  set_value('email'), 'class="form-control" placeholder="Email"');?>

            </div>

            <!-- username -->
            <div class="form-group">
                <?php echo form_input('username', set_value('username'), 'class="form-control" placeholder="Username"');?>

            </div>

            <!-- password -->
            <div class="form-group">
                <?php echo form_password('password',  set_value('password'), 'class="form-control" placeholder="Password"');?>
            </div>

            <!-- Conf password -->
            <div class="form-group">
                <?php echo form_password('passconf',  set_value('passconf'), 'class="form-control" placeholder="Confirm Password"');?>
            </div>

            <!-- form submit -->
            <?php echo form_submit('form-submit', 'Sign up!', 'class="btn btn-default"'); ?>


            <!-- fieldset close -->
            <?php echo form_fieldset_close();?>


            <?php echo form_close();?>

            <?php endif; ?>

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

