			<!-- Footer -->
			<div class="row mt-6">
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
						<span>Copyright &copy; Maharani, S.Si <?=date('Y')?></span>
						</div>
					</div>
				</footer>
			</div>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Yakin mau keluar?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Tekan tombol Keluar di bawah jika ingin mengakhiri sesi ini.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<a class="btn btn-danger" href="<?=base_url()?>index.php/autentikasi/logout">Keluar</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<!--<script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>-->
	<script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>
	<!-- Page level plugins -->
	<script src="<?=base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/select2/js/select2.full.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/datepicker/locales/bootstrap-datepicker.id.min.js"></script>


	<!-- Page level custom scripts -->
	<script src="<?=base_url('assets/')?>js/demo/datatables-demo.js"></script>
	<script>
    $(document).ready(function(){
        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            locale: 'id',
            todayHighlight: true,
        });

		$(".select2").select2();
    });
    </script>
    <script>
	var format_rupiah = document.getElementById('gaji_pokok');
	var format_rupiah_besaran_gaji = document.getElementById('besaran_gaji');
	
	format_rupiah.addEventListener('keyup', function(e)
	{
		format_rupiah.value = formatRupiah(this.value, '');
	});
	
	format_rupiah_besaran_gaji.addEventListener('keyup',function(e)
	{
		format_rupiah_besaran_gaji.value = formatRupiah(this.value,'');
	});
	
	function formatRupiah(angka, prefix)
	{
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split = number_string.split(','),
		sisa = split[0].length % 3,
		format_rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);
		if (ribuan)
		{
			separator = sisa ? '.' : '';
			format_rupiah += separator + ribuan.join('.');
		}
		format_rupiah = split[1] != undefined ? format_rupiah + ',' + split[1] : format_rupiah;
		return prefix == undefined ? format_rupiah : (format_rupiah ? '' + format_rupiah : '');
	}
	</script>
</body>
</html>