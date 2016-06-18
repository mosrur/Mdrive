<?php
/**
 * header.php
 *
 * @package: Mdrive.
 * @author: Mosrur Chowdhury
 * @link: http://mosrur.com
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (isset($data['title']) ? $data['title'] : "Mdrive File Sharing") ?></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700|Dancing+Script|Open+Sans:400,300italic,300,400italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" type="text/css" />

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="wrapper">
    <header class="container header-wrapper">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <!-- Navigation -->
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand page-scroll" href="#page-top">
                                    <i class="fa fa-dropbox"></i><span class="light">&nbsp;<?php echo (isset($data['title']) ? $data['title'] : "Mdrive File Sharing") ?></span>
                                </a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                                <ul class="nav navbar-nav">
                                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                                    <li class="hidden">
                                        <a href="#page-top"></a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="<?php echo base_url();?>">Home</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#about">Files</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="#contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container -->
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <div style="height: 100px;">
        &nbsp;
    </div>

    <!-- container starts -->
    <div class="container">
        <?php if(has_alert()): ?>
            <div class="row">
                <div class="col-md-12">
                    <?php show_alert();?>
                </div>
            </div>
        <?php endif; ?>
