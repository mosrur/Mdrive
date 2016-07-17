<?php
/**
 * footer.php
 *
 * @package: Mdrive.
 * @author: Mosrur Chowdhury
 * @link: http://mosrur.com
 */

?>

<!-- container ends -->
</div>

<!-- footer -->
<div class="container-fluid">
    <hr />
    <div class="container">

        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; <?php echo (isset($data['title']) ? $data['title'] : "Mdrive File Sharing") ?> 2016</p>
            </div>
        </footer>
    </div>
</div>
</div>



<!-- Javascript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="application/javascript">

    $(document).ready(function(){
        $("#pass-box").hide();
    });
</script>
</body>
</html>

