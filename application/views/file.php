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
            <br><br>

            <div class="row">
                <div class="col-md-9"><h3>My Files</h3></div>
                <div class="col-md-3 text-right"><a class="btn btn-success" href="<?php echo site_url('file/file_upload'); ?>">Upload new file</a> </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>File Permission</th>
                        <th>Modified</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($userfiles) && !empty($userfiles)): ?>
                            <?php foreach($userfiles as $key => $data): ?>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <?php echo $data['title'];?>
                                </td>
                                <td>
                                    <?php echo $data['permission'];?>&nbsp;|&nbsp;<a href="<?php echo site_url('file/change_permission/'.$data['key']);?>">Change permission</a>
                                </td>
                                <td>
                                    <?php echo (empty($data['modified'])? " - " : $data['modified']);?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('file/download/'.$data['key']);?>">Download</a>&nbsp;|&nbsp;<a href="file/delete">Delete</a><?php echo ($data['permission']=='Public'? "&nbsp;|&nbsp;<a href=".site_url('file/share/'.$data['key']).">Share</a>":'');?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-warning">No user files uploaded. Click <a href="<?php echo site_url('file/file_upload');?>">here</a> to upload files.</div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>


<!-- load footer -->
<?php $this->load->view('footer');?>

