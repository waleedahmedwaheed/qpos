<!-- /. NAV TOP  -->
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">POS</a>
				
            </div>
			<label class="switch">
				  <input type="checkbox" checked id="sidebarCollapse">
				  <span class="slider round"></span>
				</label>
            <div class="header-right">
               <a href="logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>  
            </div>
        </nav>
		
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                   

                    <li>
                        <a <?php if(basename($_SERVER['PHP_SELF'])=='index.php'){ ?> class="active-menu" <?php } ?> href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" <?php if(basename($_SERVER['PHP_SELF'])=='products.php' || basename($_SERVER['PHP_SELF'])=='categories.php'){ ?> class="active-menu" <?php } ?> ><i class="fa fa-desktop"></i>Products <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="products.php"><i class="fa fa-toggle-on"></i>New Poduct</a>
                            </li>
                            <li>
                                <a href="categories.php"><i class="fa fa-list-alt"></i>Category</a>
                            </li>
                         </ul>
                    </li>
					<li>
                        <a href="javascript:void(0" <?php if(basename($_SERVER['PHP_SELF'])=='users.php' || basename($_SERVER['PHP_SELF'])=='roles.php' || basename($_SERVER['PHP_SELF'])=='permission.php'|| basename($_SERVER['PHP_SELF'])=='assign_perm_to_roles.php'){ ?> class="active-menu" <?php } ?>><i class="fa fa-users"></i>Users Management <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            <li>
                                <a href="users.php"><i class="fa fa-user"></i>Users</a>
                            </li>
                            <li>
                                <a href="roles.php"><i class="fa fa-square-o"></i>Roles</a>
                            </li>
							<li>
                                <a href="permission.php"><i class="fa fa-square-o"></i>Permissions</a>
                            </li>
							<li>
                                <a href="assign_perm_to_roles.php"><i class="fa fa-square-o"></i>Assign Permissions</a>
                            </li>
                         </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-users"></i>Suppliers</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->