<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?= base_url() ?>assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?= base_url() ?>assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?= base_url() ?>assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?= base_url() ?>assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?= base_url() ?>assets/images/browser/ie.png" alt="">
                    <div>IE (11 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Js -->
<script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/pcoded.min.js"></script>
<script src="<?= base_url() ?>assets/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/clipboard.min.js"></script>
<script src="<?= base_url() ?>assets/js/uikit.min.js"></script>

<!-- Apex Chart -->
<!--<script src="--><?//= base_url() ?><!--assets/js/plugins/apexcharts.min.js"></script>-->

<!-- datatable Js -->
<script src="<?= base_url() ?>assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace('desc');
	// DataTable end
	function delete_(url) {
		var del =
				`
			<div class="modal fade" id="sdasdads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<p>Are you sure ?</p>
			</div>
			<div class="modal-footer">
			<a href="${url}" class="btn btn-primary">Delete</a>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			</div>
			</div>
			</div>
			</div>
           `;
		$(del).modal('show');
	}
</script>
<script>
	// header option

	// header option
	$('#cust-sidebrand').change(function () {
		if ($(this).is(":checked")) {
			$('.theme-color.brand-color').removeClass('d-none');
			$('.m-header').addClass('bg-dark');
		} else {
			$('.m-header').removeClassPrefix('bg-');
			$('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
			$('.theme-color.brand-color').addClass('d-none');
		}
	});
	// Header Color
	$('.brand-color > a').on('click', function () {
		var temp = $(this).attr('data-value');
		// $('.header-color > a').removeClass('active');
		// $('.pcoded-header').removeClassPrefix('brand-');
		// $(this).addClass('active');
		if (temp == "bg-default") {
			$('.m-header').removeClassPrefix('bg-');
		} else {
			$('.m-header').removeClassPrefix('bg-');
			$('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
			$('.m-header').addClass(temp);
		}
	});
	// Header Color
	$('.header-color > a').on('click', function () {
		var temp = $(this).attr('data-value');
		// $('.header-color > a').removeClass('active');
		// $('.pcoded-header').removeClassPrefix('brand-');
		// $(this).addClass('active');
		if (temp == "bg-default") {
			$('.pc-header').removeClassPrefix('bg-');
		} else {
			$('.pc-header').removeClassPrefix('bg-');
			$('.pc-header').addClass(temp);
		}
	});
	// sidebar option
	$('#cust-sidebar').change(function () {
		if ($(this).is(":checked")) {
			$('.pc-sidebar').addClass('light-sidebar');
			$('.pc-horizontal .topbar').addClass('light-sidebar');
			// $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
		} else {
			$('.pc-sidebar').removeClass('light-sidebar');
			$('.pc-horizontal .topbar').removeClass('light-sidebar');
			// $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
		}
	});
	$.fn.removeClassPrefix = function (prefix) {
		this.each(function (i, it) {
			var classes = it.className.split(" ").map(function (item) {
				return item.indexOf(prefix) === 0 ? "" : item;
			});
			it.className = classes.join(" ");
		});
		return this;
	};
</script>

<!-- custom-chart js -->
<script src="<?= base_url() ?>assets/js/pages/dashboard-sale.js"></script>
<script>
	$('#user-list-table2').DataTable();
</script>
<script>
	// DataTable start
	$('#report-table').DataTable({
		"lengthMenu": [
			[5, 10, 25, 50, -1],
			[5, 10, 25, 50, "All"]
		]
	});

	$(document).ready(function (e){
		console.clear();
	})
</script>

<script>
	function edit(id, link) {
		$.post(link, {id}, function (e) {
			$(e).modal('show');
			CKEDITOR.replace('desc');
		})
	}
</script>
<?php
$popUp = $this->session->flashdata('success');
if (isset($popUp)) {
	?>
	<script>
		toast('<?=$popUp[0]?>', '<?=$popUp[1]?>', '<?=$popUp[2]?>')
	</script>
<?php } ?>
</body>
</html>
