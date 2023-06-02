
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">


	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Dashboard - SI BKK</title>

	
	<link href="/dashboardassets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/">
					<span class="align-middle">SI BKK</span>
					</a>

				<ul class="sidebar-nav">
					@if($users->role_id === 1);
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dashboard">
								<i class="bi bi-speedometer2"></i> <span class="align-middle">Dashboard</span>
							</a>
						</li>


						<li class="sidebar-header">
							Menu Utama
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dashboard/lowongan/">
								<i class="bi bi-list-columns"></i> <span class="align-middle">Lowongan</span>
							</a>
						</li>		
			
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dashboard/informasi/">
								<i class="bi bi-info-square"></i> <span class="align-middle">Informasi</span>
							</a>
						</li>	
						
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dashboard/pendaftar/">
								<i class="bi bi-people"></i> <span class="align-middle">Pendaftar</span>
							</a>
						</li>	
						
						<li class="sidebar-header">
							Lainnya
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{ route('logout') }}"
									onclick="event.preventDefault();
									Swal.fire({
										title: 'Konfirmasi Keluar',
										text: 'Apakah Anda yakin ingin keluar?',
										icon: 'warning',
										showCancelButton: true,
										confirmButtonColor: '#3085d6',
										cancelButtonColor: '#d33',
										confirmButtonText: 'Ya, Keluar!'
									}).then((result) => {
										if (result.isConfirmed) {
											document.getElementById('logout-form').submit();
										}
									});">
									
									<i class="bi bi-box-arrow-right"></i> <span>Keluar</span>
								</a>
							</li>	
						
					@endif	


					@if($users->role_id === 2);
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dashboard">
								<i class="bi bi-speedometer2"></i> <span class="align-middle">Dashboard</span>
							</a>
						</li>

						<li class="sidebar-header">
							Menu Utama 
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dashboard/lowongan-tersedia/">
								<i class="bi bi-buildings"></i> <span class="align-middle">Perusahaan</span>
							</a>
						</li>		
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dashboard/lamaran/">
								<i class="bi bi-book"></i> <span class="align-middle">Lamaran Anda</span>
							</a>
						</li>		

						<li class="sidebar-header">
							Lainnya
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								Swal.fire({
									title: 'Konfirmasi Keluar',
									text: 'Apakah Anda yakin ingin keluar?',
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Ya, Keluar!'
								}).then((result) => {
									if (result.isConfirmed) {
										document.getElementById('logout-form').submit();
									}
								});">
								
								<i class="bi bi-box-arrow-right"></i> <span>Keluar</span>
							</a>
						</li>		
					@endif
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">		
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="/dashboardassets/img/avatars/avatar.png" class="avatar img-fluid rounded me-1" alt="User" /> <span class="text-dark">{{ auth()->user()->name }}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
							
								<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     Swal.fire({
														title: 'Konfirmasi Keluar',
														text: 'Apakah Anda yakin ingin keluar?',
														icon: 'warning',
														showCancelButton: true,
														confirmButtonColor: '#3085d6',
														cancelButtonColor: '#d33',
														confirmButtonText: 'Ya, Keluar!'
													}).then((result) => {
														if (result.isConfirmed) {
															document.getElementById('logout-form').submit();
														}
													});">
                                        {{ __('Logout') }}
                                    	</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				@yield('container')
			</main>


			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="/"><strong>SI BKK</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>


	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
	<script src="/dashboardassets/js/app.js"></script>

	<script>
		ClassicEditor
			.create( document.querySelector( '#editor' ) )
			.catch( error => {
				console.error( error );
			} );
	</script>

	@include('sweetalert::alert')

	<script>
		$(".swal-confirm").click(function(e) {
			e.preventDefault();
			var form = $(this).attr('data-form');
			Swal.fire({
				title: 'Hapus lowongan Ini ',
				text: "Anda tidak akan dapat mengembalikan data yang dihapus!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Ya, hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$('#' + form).submit();
				}
			})
		});
	</script>

<script>
	// Dapatkan semua menu navigasi
	var navItems = document.querySelectorAll('.sidebar-item');

	// Loop melalui setiap menu navigasi
	for (var i = 0; i < navItems.length; i++) {
	// Tambahkan event listener untuk setiap menu navigasi
	navItems[i].addEventListener('click', function() {
		// Hapus kelas 'active' dari semua menu navigasi
		for (var j = 0; j < navItems.length; j++) {
		navItems[j].classList.remove('active');
		}
		// Tambahkan kelas 'active' pada menu navigasi yang dipilih
		this.classList.add('active');

		// Simpan informasi tentang menu navigasi yang dipilih dalam local storage
		localStorage.setItem('selectedNav', this.querySelector('a').getAttribute('href'));
	});
	}

	// Ambil informasi tentang menu navigasi yang dipilih dari local storage saat halaman dimuat
	var selectedNav = localStorage.getItem('selectedNav');

	// Jika ada informasi tentang menu navigasi yang dipilih, atur kembali class 'active' pada menu navigasi yang sesuai
	if (selectedNav) {
		for (var i = 0; i < navItems.length; i++) {
			var navLink = navItems[i].querySelector('a');
			if (navLink.getAttribute('href') === selectedNav) {
			navItems[i].classList.add('active');
			break;
			}
		}
	}
	</script>
</body>
</html>