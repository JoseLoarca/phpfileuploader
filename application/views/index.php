<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico">

        <title>Image Uploader</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Image Uploader</a>
        </nav>
        <main role="main" class="container">

            <?php if (!empty($this->session->flashdata('msg'))): ?>
                <div class="alert alert-<?php echo $this->session->flashdata('msg')['type']; ?> alert-dismissible fade show"
                     role="alert">
                    <?php echo $this->session->flashdata('msg')['msg']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="jumbotron">
                <h4>Selecciona una imagen</h4>
                <form action="<?php echo $this->uri->uri_string(); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Subir</button>
                    </div>
                </form>
            </div>

            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <?php foreach ($files as $file) : ?>
                            <div class="col-md-3 col-lg-2 col-xs-6">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top h-15" src="<?php echo base_url('uploads/' . $file); ?>"
                                         data-holder-rendered="true">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                        data-clipboard-text="<?php echo base_url('uploads/' . $file); ?>"
                                                        class="btn btn-md btn-outline-primary copy">Copiar URL
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </main>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.slim.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/clipboard.min.js"></script>
        <script>
            $(function () {
               new ClipboardJS('.copy');
            });
        </script>
    </body>
</html>