<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[3];


$sqqll = "SELECT `pro_id`, `pro_logo`,`pro_dark_logo`, `pro_favicon` , `pro_title`, `pro_keyword`, `pro_detail` FROM `tbl_profile`";
$resulltt = $conn->query($sqqll);
$rowww = $resulltt->fetch_assoc();
?>
<div id="sidebar" class="sidebar">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image bg-light">
						<img src="../uploads/<?= $rowww['pro_favicon']; ?>" alt="<?= $adminrec['name']; ?>" />
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						<?= $adminrec['name']; ?>
						<small><?= $adminrec['email']; ?></small>
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile">
					<li><a href="manage-profile.php"><i class="fa fa-cog"></i> Settings</a></li>
					<li><a href="manage-contact.php"><i class="fa fa-edit"></i> Contact Setting</a></li>
					<li><a href="includes/logout.php"
							onClick="if(confirm('Are you sure you want to log out?')){ return true;} else { return false; }"><i
								class="fa fa-sign-out"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Navigation</li>
			<li class="has-sub <?php if ($first_part == "index.php") {
	echo "active";
}?>">
				<a href="index.php">
					<b class="caret"></b>
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="has-sub <?php if ($first_part == "manage-banner.php" || $first_part == "add-banner.php" || $first_part == "edit-banner.php" || $first_part == "manage-acheivements.php" || $first_part == "add-acheivements.php" || $first_part == "edit-acheivements.php" || $first_part == "manage-clients.php" || $first_part == "add-clients.php" || $first_part == "edit-clients.php" || $first_part == "manage-catalog.php" || $first_part == "manage-home-about.php" || $first_part == "manage-mission.php") {
	echo "active";
}?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-home"></i>
					<span>Home Management</span>
				</a>
				<ul class="sub-menu">
					<!--<li><a href="manage-banner.php">Banner Management </a></li> -->
					<li><a href="manage-banner.php">Banner Management </a></li>
					<!-- <li><a href="manage-home-about.php">about Management </a></li>
					<li><a href="manage-digital-expertise.php">Expertise Management </a></li>
					<li><a href="manage-connect-grow.php">Connect & Grow</a></li>
					<li><a href="manage-mission.php">Challenges Man. </a></li>
					<li><a href="manage-works.php">Extra Images </a></li>
					<li><a href="manage-acheivements.php">Achievements Manag..</a></li>
					<li><a href="manage-clients.php">Marquee Management </a></li> -->
					 <li><a href="manage-home-extra.php">Home Text Management </a></li> 
				</ul>
			</li>
			<li class="has-sub d-none <?php if ($first_part == "manage-about.php") {
	echo "active";
}?>">
				<a href="manage-about.php">
					<b class="caret"></b>
					<i class="fa fa-home"></i>
					<span>About Us Management</span>
				</a>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-testimonial-extra.php" || $first_part == "manage-testimonial.php" || $first_part == "add-testimonial.php" || $first_part == "edit-testimonial.php") {
	echo "active";
}?>">
				<a href="manage-testimonial.php">
					<b class="caret"></b>
					<i class="fa fa-home"></i>
					<span>Projects manage..</span>
				</a>
			</li>

			<li class="has-sub d-none <?php if ($first_part == "manage-testimonial.php" || $first_part == "add-testimonial.php" || $first_part == "edit-testimonial.php" || $first_part == "manage-testimonial-extra.php") {
	echo "active";
}?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-home"></i>
					<span>Testimonial manage..</span>
				</a>
				<ul class="sub-menu">
					<li><a href="manage-testimonial.php">Testimonial Management </a></li>
					<li><a href="manage-testimonial-extra.php">Testimonial Extra</a></li>
				</ul>
			</li>

			<li class="has-sub d-none <?php if ($first_part == "manage-become-member.php" || $first_part == "manage-member-achievements.php" || $first_part == "add-member-achievements.php" || $first_part == "edit-member-achievements.php") {
	echo "active";
}?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-home"></i>
					<span>Become Member</span>
				</a>
				<ul class="sub-menu">
					<li><a href="manage-become-member.php">Become Member</a></li>
					<li><a href="manage-member-achievements.php">Member Achievements</a></li>
				</ul>
			</li>

			<li class="has-sub  d-none <?php if ($first_part == "manage-award.php" || $first_part == "edit-award.php" || $first_part == "add-award.php" || $first_part == "edit-award.php") {
	echo "active";
}?>">
				<a href="manage-award.php">
					<b class="caret"></b>
					<i class="fa fa-trophy"></i>
					<span>Award management</span>
				</a>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-service-category.php" || $first_part == "edit-service-category.php" || $first_part == "manage-service.php" || $first_part == "add-service.php" || $first_part == "edit-service.php" || $first_part == "manage-service-members.php" || $first_part == "add-service-members.php" || $first_part == "edit-service-members.php") {
	echo "active";
}?>">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-home"></i>
					<span>Product Management</span>
				</a>
				<ul class="sub-menu">
					<li><a href="manage-service-category.php">Category Management</a></li>
					<li><a href="manage-service.php">Subcategory</a></li>
					<li><a href="manage-service-members.php">Product</a></li>
					<li><a href="manage-faq.php">Faq Section</a></li>
					<li><a href="manage-why-choose.php">Why Choose</a></li>
				</ul>
			</li>

			<li class="has-sub d-none <?php if ($first_part == "manage-case-study.php" || $first_part == "manage-case-study.php" || $first_part == "add-case-study.php") {
	echo "active";
}?>">
				<a href="manage-case-study.php">
					<b class="caret"></b>
					<i class="fa fa-image "></i>
					<span>Faq Manag..</span>
				</a>
			</li>

			<li class="has-sub  d-none <?php if ($first_part == "manage-career.php" || $first_part == "edit-career.php" || $first_part == "add-career.php") {
	echo "active";
}?>">
				<a href="manage-career.php">
					<b class="caret"></b>
					<i class="fa fa-image "></i>
					<span>Career Manag..</span>
				</a>
			</li>

			<li class="has-sub <?php if ($first_part == "manage-blogs.php" || $first_part == "manage-blogs.php" || $first_part == "add-blogs.php") {
	echo "active";
}?>">
				<a href="manage-blogs.php">
					<b class="caret"></b>
					<i class="fa fa-image "></i>
					<span>Blogs Management</span>
				</a>
			</li>

			<li class="has-sub  d-none <?php if ($first_part == "manage-team.php" || $first_part == "add-team.php" || $first_part == "edit-team.php") {
	echo "active";
}?>">
				<a href="manage-team.php">
					<b class="caret"></b>
					<i class="fa fa-users"></i>
					<span>Team Manag..</span>
				</a>
			</li>

			<li class="has-sub  d-none <?php if ($first_part == "manage-team-person.php") {
	echo "active";
}?>">
				<a href="manage-team-person.php">
					<b class="caret"></b>
					<i class="fa fa-users"></i>
					<span>Team CEO Ma..</span>
				</a>
			</li>

			<li class="has-sub  d-none <?php if ($first_part == "manage-news.php" || $first_part == "add-news.php" || $first_part == "edit-news.php") {
	echo "active";
}?>">
				<a href="manage-news.php">
					<b class="caret"></b>
					<i class="fa fa-users"></i>
					<span>News Manag..</span>
				</a>
			</li>

			<!--<li class="has-sub <?php if ($first_part == "manage-quick-links.php") {
	echo "active";
}?>">-->
			<!--   				<a href="manage-quick-links.php">-->
			<!--   					<b class="caret"></b>-->
			<!--   					<i class="fa fa-image "></i>-->
			<!--   					<span>Manage Quick Links</span> -->
			<!--   				</a>-->
			<!--   			</li>-->
			<!--     			<li class="has-sub <?php if ($first_part == "manage-shipping.php") {
	echo "active";
}?>">-->
			<!--	<a href="manage-shipping.php">-->
			<!--		<b class="caret"></b>-->
			<!--		<i class="fa fa-truck"></i><span>Shipping Management</span>-->
			<!--	</a>-->
			<!--</li>-->

			<!--<li class="has-sub <?php if ($first_part == "manage-discount.php") {
	echo "active";
}?>">-->
			<!--	<a href="manage-discount.php">-->
			<!--		<b class="caret"></b>-->
			<!--		<i class="fa fa-percent"></i><span>Discount Management</span>-->
			<!--	</a>-->
			<!--</li>-->

			<!--<li class="has-sub  <?php if ($first_part == "manage-users.php") {
	echo "active";
}?>">-->
			<!--	<a href="manage-users.php">-->
			<!--		<b class="caret"></b>-->
			<!--		<i class="fa fa-user"></i>-->
			<!--		<span>Users Management</span>-->
			<!--	</a>-->
			<!--</li>-->

			<!--<li class="has-sub <?php if ($first_part == "manage-orderdetail.php" || $first_part == "manage-order.php" || $first_part == "manage-online-success-orders.php" || $first_part == "manage-pending-orders.php" || $first_part == "manage-cos-success-orders.php") {
	echo "active";
}?>">-->
			<!--	<a href="javascript:;">-->
			<!--		<b class="caret"></b>-->
			<!--		<i class="fa fa-shopping-cart"></i>-->
			<!--		<span>Order Management</span>-->
			<!--	</a>-->
			<!--	<ul class="sub-menu">-->
			<!--		<li><a href="manage-order.php">COD Success Orders</a></li>-->
			<!--<li><a href="manage-cos-success-orders.php">Collect from Store</a></li>-->
			<!--		<li><a href="manage-online-success-orders.php">Online Success Orders</a></li>-->
			<!--		<li><a href="manage-pending-orders.php">Pending/Failed Orders</a></li>-->
			<!--	</ul>-->
			<!--</li>-->
			<li class="has-sub <?php if ($first_part == "manage-breadcrumb.php" || $first_part == "edit-breadcrumb.php") {
	echo "active";
}?>">
				<a href="manage-breadcrumb.php">
					<b class="caret"></b>
					<i class="fa fa-file-image-o"></i>
					<span>Breadcrumb Manag..</span>
				</a>
			</li>

			<li class="has-sub d-none <?php if ($first_part == "manage-contact.php") {
	echo "active";
}?>">
				<a href="manage-contact.php">
					<b class="caret"></b>
					<i class="fa fa-file-image-o"></i>
					<span>Settings</span>
				</a>
			</li>

			<!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
						class="fa fa-angle-double-left"></i></a></li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>