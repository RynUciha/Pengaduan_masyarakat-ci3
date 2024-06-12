<script src="<?= base_url('assets/'); ?>a></script>
<script src="<?= base_url('assets/'); ?>></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>></script>
<script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

<script>
  // selected file show
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>

</body>

</html>
