<footer class="py-3 bg-light">
	<hr>
	<div class="container">
		<p class="m-0 text-center">2019 &copy; Majoo Teknologi Indonesia</p>
	</div>
</footer>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- summernote -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<!-- datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<!-- toast -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!--  -->
<script src="<?php echo base_url('assets/file_upload.js'); ?>"></script>

<script>
	
	$(document).ready(() => {
		$('#myTable').DataTable();
		$('.js-example-basic-single').select2({
			theme: "bootstrap-5",
		});
		$('#summernote').summernote({
			tabsize: 5,
			height: 100
		});

		<?php if (isset($_SESSION['toast'])) { ?>
			toastr.options.closeButton = true;
			var toastvalue = "<?php echo $_SESSION['toast'] ?>";
			var status = toastvalue.split(":")[0];
			var message = toastvalue.split(":")[1];
			if (status === "success") {
				toastr.success(message, status);
			} else if (status === "error") {
				toastr.error(message, status);
			} else if (status == "warn") {
				toastr.warning(message, status);
			}
		<?php } ?>
	});
</script>
</body>

</html>

