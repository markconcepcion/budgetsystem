<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('Pages/Superuser_view/deskapp/head'); ?>
  <?php $this->load->view('Pages/Head'); ?>
  <body class="fixed-left">
    <?php $this->load->view('Pages/Superuser_view/deskapp/header'); ?>
    <?php $this->load->view('Pages/Superuser_view/deskapp/sidebar'); ?>
    <?php 
      if (!empty($content))
      {
        $this->load->view(''.$content);
      }
    ?>
    <?php $this->load->view('Pages/Superuser_view/deskapp/footer'); ?>
    <?php $this->load->view('Pages/Superuser_view/deskapp/script'); ?>
  </body>
</html>