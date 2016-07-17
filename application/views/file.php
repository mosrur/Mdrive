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
                    <tr><th>Title</th>
                        <th>File Permission</th>
                        <th>Modified</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($userfiles) && !empty($userfiles)): ?>
                            <?php foreach($userfiles as $key => $data): ?>
                            <tr>
                                <td>
                                    <?php echo $data['title'];?>
                                </td>
                                <td>
                                    <?php echo $data['permission'];?>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('file/change_permission/'.$data['key']);?>" title="Change permission"><i class="fa fa-user fa-fw"></i></a>
                                </td>
                                <td>
                                    <?php echo (empty($data['modified'])? date('Y-m-d H:i', strtotime($data['created'])) : date('Y-m-d H:i', strtotime($data['modified'])));?>
                                </td>
                                <td width="380" align="right">
                                    <a href="<?php echo site_url('file/download/'.$data['key']);?>" title="Download"><i class="fa fa-download fa-fw"></i></a>&nbsp;&nbsp;&nbsp;<a href="file/delete" title="Delete"><i class="fa fa-times fa-fw"></i></a><?php echo ($data['permission']=='Public'? "&nbsp;&nbsp;&nbsp;<a href=".site_url('file/share/'.$data['key'])." id='share-link-".$data['idfile']."' class='share-link' title='Share Link'><i class='fa fa-link fa-fw'></i></a>":'')."<br><p class='share-box' id='share-box-".$data['idfile']."'>".site_url('file/share/'.$data['key'])."</p>";?>
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

