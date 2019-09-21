<html>
    <head>
        <title>
            LOGIN
        </title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jcss/LOGIN_CSS.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/styles/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/dropzone/src/dropzone.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
    
        <style>
            body
            {
                margin: 0 !important;
                padding: 0 !important;
                background-image: url('<?php echo base_url('assets/as.jpg'); ?>') !important;
                background-size: cover !important;
                background-position: center !important;
                font-family: sans-serif !important;
            }
            
            .logo
            {
                width: 50px;
                height: 50px;
                position: absolute;
                border-radius: 50%;
                border: 1px solid orange;
                left: 5%;
                top: 10px;
            }

            .loginbox
            {
                width: 320px !important;
                height: 400px !important;
                background: linear-gradient(top, #3c3c3c 0%, #222222 100%) !important;
                background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%) !important;
                color: white;
                top: 25% !important;
                left: 40% !important;
                position: absolute !important;
                box-sizing: border-box !important;
                padding: 70px 30px !important;
            }

            .avatar
            {
                width: 110px !important;
                height: 110px !important;
                position: absolute !important;
                top: -50px !important;
                left: calc(50% - 50px) !important;
                border-radius: 50% !important;
            }

            h1
            {
                margin: 0px !important;
                padding: 0 0 20px !important;
                text-align: center !important;
                font-size: 22px !important;
                color: white;
            }

            .loginbox p
            {
                margin: 0 !important;
                padding: 0 !important;
                font-weight: bold !important;

            }

            .loginbox input { width: 100% !important; margin-bottom: 20px !important; }

            .loginbox input[type="text"], input[type="password"]
            {
                border: none !important;
                border-bottom: 1px solid #000000 !important;
                background: transparent !important;
                outline: none !important;
                height: 40px !important;
                color: #B1B1B1 !important;
                font-size: 16px !important;
            }

            .loginbox input[type="submit"]
            {
                border: none !important;
                outline: none !important;
                height: 40px !important;
                background: #fe850d !important;
                color: #FFFFFF !important;
                font-size: 18px !important;
                border-radius: 20px !important;

            }

            .loginbox input[type="submit"]:hover
            {
                cursor: pointer !important;
                background: #ffc107 !important;
                color: #000000 !important;
            }

            .loginbox a
            {
                text-decoration: none !important;
                font-size: 12px !important;
                line-height: 30px !important;
                color: #DBD9D9 !important;
            }

            .loginbox a:hover { color: #ffc107 !important; }
            .dropbtn:hover, .dropbtn:focus { background-color: #FFBB40; color: white; }
            .mod_design {
                border: 1.5px solid orange;
                background: linear-gradient(top, #3c3c3c 0%, #222222 100%);
                background: -webkit-linear-gradient(top, #3c3c3c 0%, #222222 100%);
                width: 450px;
                margin-left: 200px
            }
        </style>
    </head>

    <body>
        <div class="loginbox">
            <img src="<?php echo base_url('assets/jimage/LGUBO.png'); ?>" class="avatar" >
            <h1><b>Budget Office</b></h1>
            <?php echo form_open('Login/Login'); ?>
                <p>Username</p>
                <input type="text" name="Username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="Password" placeholder="Enter Password">
                <input type="submit" name="" value="Login">
                <a href="HOME.html">Forget Password?</a><br>
            <?php echo form_close(); ?>
        </div>
        <?php $this->load->view('Modals/login_modal'); ?>
    </body>
    
    <footer>
        <script src="<?php echo base_url()?>assets/vendors/scripts/script.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/dropzone/src/dropzone.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.print.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.html5.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.flash.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
        <script src="<?php echo base_url()?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
        <script>
            $('document').ready(function(){
                <?php if($this->session->flashdata('edit_failed')): ?>
                    $('#editf-modal').modal('show');
                    setTimeout(function(){
                        $('#editf-modal').modal('hide');
                    }, 1500);
                <?php endif; ?>
            });
        </script>
    </footer>
</html>