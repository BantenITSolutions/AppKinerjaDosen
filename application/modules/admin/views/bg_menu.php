		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="<?php echo base_url(); ?>admin/rekomendasi"><i class="icon icon-ok"></i> <span class="text">Rekomendasi</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo base_url(); ?>global/inbox"><i class="icon icon-envelope"></i> <span class="text">Messages</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo base_url(); ?>admin/sistem"><i class="icon icon-wrench"></i> <span class="text">System Settings</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo base_url(); ?>admin/routing_pages"><i class="icon icon-random"></i> <span class="text">Routing Pages</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo base_url(); ?>admin/user"><i class="icon icon-fire"></i> <span class="text">User Management</span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-user"><a href="<?php echo base_url(); ?>" data-toggle="dropdown" data-target="<?php echo base_url(); ?>menu-user" class="dropdown-toggle">
				<i class="icon icon-user"></i> <span class="text">User Profil</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a title="" href="<?php echo base_url(); ?>global/password"><i class="icon icon-lock"></i> User Password</a></li>
                        <li><a title="" href="<?php echo base_url(); ?>global/profil"><i class="icon icon-user"></i> User Profil</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="<?php echo base_url(); ?>login/login/logout"><i class="icon icon-off"></i> <span class="text">Log Out</span></a></li>
            </ul>
        </div>
            
		<div id="sidebar">
			<a href="<?php echo base_url(); ?>" class="visible-phone"><i class="icon icon-th-list"></i> Dashboard Menu</a>
			<ul>
				<li><a href="<?php echo base_url(); ?>"><i class="icon icon-star"></i> <span>Halaman Utama</span></a></li>
				<li><a href="<?php echo base_url(); ?>app_route"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/dosen"><i class="icon icon-flag"></i> <span>Daftar Dosen</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/banner"><i class="icon icon-picture"></i> <span>Slide Banner</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/berita"><i class="icon icon-list-alt"></i> <span>Berita</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/kategori_forum"><i class="icon icon-tasks"></i> <span>Kategori Forum</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/thread_forum"><i class="icon icon-comment"></i> <span>Thread Forum</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/reply_forum"><i class="icon icon-retweet"></i> <span>Reply Forum</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/kinerja_bidang/set/pendidikan"><i class="icon icon-pencil"></i> <span>Kinerja Bidang Pendidikan</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/kinerja_bidang/set/penelitian"><i class="icon icon-th"></i> <span>Kinerja Bidang Penelitian</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/kinerja_bidang/set/pengabdian"><i class="icon icon-th-list"></i> <span>Kinerja Pengabdian Masyarakat</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/kinerja_bidang/set/penunjang"><i class="icon icon-signal"></i> <span>Kinerja Penunjang Lainnya</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/kinerja_bidang/set/kewajiban"><i class="icon icon-inbox"></i> <span>Kewajiban Khusus Profesor</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/cetak"><i class="icon icon-print"></i> <span>Cetak Form</span></a></li>
				<li><a href="<?php echo base_url(); ?>admin/kesimpulan"><i class="icon icon-share"></i> <span>Kesimpulan</span></a></li>
			</ul>
		</div>