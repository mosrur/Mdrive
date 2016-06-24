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
        <div class="col-md-12">

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

        </div>

    </div>


<!-- load footer -->
<?php $this->load->view('footer');?>

