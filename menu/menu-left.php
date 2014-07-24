
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="dashboard.php">Sharemyclick <span>v1.0</span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget">Today is
			<?php // Prints something like: Monday 8th of August 2005 03:12:46 PM
			echo date('l jS \of F Y'); ?>
		</div>
    
    	<div class="searchwidget">
        	<form action="results.html" method="post">
            	<div class="input-append">
                    <input type="text" class="span2 search-query" placeholder="Search here...">
                    <button type="submit" class="btn"><span class="icon-search"></span></button>
                </div>
            </form>
        </div><!--searchwidget-->
        <div class="plainwidget">
			<small style="text-decoration:underline;">MONTHLY TARGET</small><br />
        	
			<small style="text-decoration:underline;">YEARLY TARGET</small><br />
        </div><!--plainwidget-->
		
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
				<li id="li-survey" class="dropdown"><a href=""><span class="iconsweets-users"></span> DATABASE</a>
                	<ul>
						<li><a href="view-databases.php">View all Databases</a></li>
                    	<li><a href="create-database.php">Create Database</a></li>
                    </ul>
                </li>
				<li id="li-registers" class="dropdown"><a href=""><span class="iconsweets-users"></span> ADVERTISERS</a>
                	<ul>
                    	<li><a href="view-advertiser.php">View all Advertisers</a></li>
						<li><a href="create-advertiser.php">Create Advertisers</a></li>
						<li><a href="update-advertiser-globalview.php">Modify Advertisers</a></li>
                    </ul>
                
				<li id="li-registers" class="dropdown"><a href=""><span class="iconsweets-users"></span> AFFILIATE COMPANY</a>
                	<ul>
                    	<li><a href="view-affiliate-company.php">View all Affiliates companies</a></li>
                        <li><a href="create-affiliate-company.php">Create Affiliate company</a></li>
                        <li><a href="update-affiliate-company-globalview.php">Modify Affiliate company</a></li>
                    </ul>
                </li>
                
                	<li id="li-registers" class="dropdown"><a href=""><span class="iconsweets-users"></span> AFFILIATE MANAGER</a>
                	<ul>
                    	<li><a href="view-affiliate-manager.php">View all Affiliate manager</a></li>
						<li><a href="create-affiliate-manager.php">Create Affiliates manager</a></li>
						<li><a href="update-affiliate-manager-globalview.php">Modify Affiliates manager</a></li>
                    </ul>
                </li>
				<li id="li-registers" class="dropdown"><a href=""><span class="iconsweets-users"></span> INVOICING</a>
                	<ul>
                    	<li><a href="check-invoicing.php">Check invoicing</a></li>
                    </ul>
                </li>
                
                </li>
                
                <li id="li-registers" class="dropdown"><a href=""><span class="iconsweets-users"></span> CAMPAIGNS MANAGEMENT</a>
                	<ul>
                    	<li><a href="view-campaigns-management.php">View all Campaigns</a></li>
                        <li><a href="view-campaign-management-filter.php">Campaigns Filters</a></li>
						<li><a href="create-campaign-management.php">Create Campaign</a></li>
						<li><a href="update-campaign-management-globalview.php">Modify Campaign</a></li>
                    </ul>
                </li>
                
				<li id="li-registers" class="dropdown"><a href=""><span class="iconsweets-users"></span> CAMPAIGNS CONTRACT</a>
                	<ul>
                    	<li><a href="view-campaign-contract.php">View all Campaigns</a></li>
						<li><a href="create-campaign-contract.php">Create Campaign</a></li>
						<li><a href="update-campaign-contract.php">Modify Campaign</a></li>
                    </ul>
                </li>
				<li style="height:50px;border-bottom:none;"><a href="settings.php"><img src="img/gemicon/settings.png" alt="" style="width:32px;height:32px;display:inline-block;" />
				<span style="padding-top:4px;padding-left:4px;">Settings</span></a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->