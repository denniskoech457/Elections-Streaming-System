

<?php  if (count($errors) > 0) : ?>
          <script>
          <?php foreach ($errors as $errors) : ?>
          swal({
          title: "<?php echo $errors ?>",
          text: "explore",
          icon: "<?php echo $status ?>",
          button: "ok",
          });
          <?php endforeach ?>
        </script>
  <?php  endif ?>
