<?php

include('conf.php');
include('class/advertiser.class.php');
include('class/category.class.php');

session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}

$objAdvertiser= new Advertiser();
$objCategory = new Category();
$result = $objCategory->getCategoriesList();

if(isset($_POST['submit_advertiser'])){
    $arPost = array();
    foreach($_POST as $ind => $val){
        $arPost[$ind] = $val;
    }
    $arPost['logo'] = $_FILES['logo'];
    
    $message = $objAdvertiser->createAdvertiser($arPost);
}
//$objAdvertiser->createAdvertiser($_REQUEST);



?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sharemyclick admin platform V1.0</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />

<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/charCount.js"></script>
<script type="text/javascript" src="js/targeting.js"></script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>


	
	<?php include ('./menu/menu-left.php');?>
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="" class="showmenu"></a>
            
            <div class="headerright">
                
                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Hi, <?php echo $_SESSION['login']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
            <ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
		<li><a href="green" class="skin-color green"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed"><a href="" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="" class="skin-layout wide"></a></li>
            </ul><!--skins-->
            <ul class="breadcrumb">
                <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
                <li class="active">Dashboard</li>
            </ul>
        </div><!--breadcrumbwidget-->
        <div class="pagetitle">
        	<h1>Create Advertiser</h1> <span><?php echo $_SESSION['login']; ?> , please enter all the details for the creation of the Partner.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
                
                <?php
                     if(isset($_POST['submit_advertiser'])){
                         ?>   <h4 class='confirmation' style="text-align: center" ">The Advertiser has been created </h4> </br> <?php ;}
                ?>
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Company informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_advertiser" class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                        <p>
                            <label>Company name *</label>
                            <span class="field"><input type="text" name="company_name" class="input-xxlarge" required="required" /></span>
                        </p>

                        <p>
                            <label>Address *</label>
                        <span class="field"><input type="text" id="address"  name="address" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Telephone Company</label>
                        <span class="field"><input type="text" name="telephone_company" class="input-xxlarge" /></span>
                        </p>

                        <p>
                            <label>Country *</label>
                            
                            <span class="field">
                                <select name="country" id="country" class="status" required="required">
                                        <?php 
                                $req_jc = $bdd->query("SELECT name_country FROM country ORDER BY name_country ASC");
                                while ($val_jc = $req_jc->fetch()){?>
                                <option value="<?php echo $val_jc['name_country']; ?>"><?php echo $val_jc['name_country']; ?></option>
                            <?php }?>
                                </select>
                            </span>
                            
                        </p>
                            
                                                            
                        <p>
                            <label> Website *</label>
                            <span class="field"><input type="url" name="websites" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                           <label>Logo</label>
                           <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                           <span class="field"><input type="file" name="logo" id="logo" /></span>
			</p>
                        
                        <p>
                            <label> Company type</label>
                            <span class="field">
                                <select name="company_type" id="company_type" class="status">
                                        <option value="direct advertiser"> Direct Advertiser</option>
                                        <option value="agency"> Agency</option>
                                        <option value="affiliate platform"> Affiliate platform</option>
                                </select>
                            </span>  
                        </p>
                        
						<p>
                            <label>Category Product</label>
                            
                            <span class="field">
                                <select name="category_product" id="category_product" class="status">
                                        <?php 
                                        foreach($objCategory->categories_list as $indCat => $valCat){?>
                                    
                                        
                                    <option value="<?php echo $valCat['id']; ?>" <?php if($valCat['type']==0){?> class="option"   style="color:black;" <?php } else {?> style="text-align:center; color:grey;" <?php }?> > <?php if($valCat['type']==0){} else { ?>&nbsp &nbsp &nbsp  <?php        } echo $valCat['name']; ?></option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>  
                            
                        </p>
                        
                        <!--<p>
                            <label>Subcategory</label>
                            
                            <span class="field">
                                <select name="subcategory" id="subcategory" class="status">
                                        <option value="15"> a completer en php</option>
                                        
                                </select>
                            </span>  
                        </p>-->
                        
                        <h4 class="widgettitle nomargin shadowed"> Stats validation </h4>
                        
                        <p>
                            <label>URL of the platform *</label>
                            <span class="field"><input type="url" name="url" id="url" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Username *</label>
                            <span class="field"><input type="text" name="username" id="username" class="input-xxlarge" required="required" /></span>
                        </p>
							
                        <p>
                            <label>Password *</label>
                            <span class="field"><input type="text" name="password" id="password" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                         <p>
                            <label>Validation delay</label>
                            <span class="field"><input type="text" name="validation_delay" id="validation_delay" class="input-xxlarge"  /></span>
                        </p>
						
                        <h4 class="widgettitle nomargin shadowed">Invoice contact </h4>
						
                        <p>
                            <label>Name</label>
                            <span class="field"><input type="text" name="name_invoice_contact" class="input-xxlarge"  /></span>
                        </p>
                        
                        <p>
                            <label>Email</label>
                            <span class="field"><input type="email" name="email_invoice_contact" class="input-xxlarge"  /></span>
                        </p>
                        
                        <p>
                            <label>VAT *</label>
                            <span class="field"><input type="text" name="vat" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>IBAN *</label>
                            <span class="field"><input type="text" name="iban" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>SWIFT *</label>
                            <span class="field"><input type="text" name="swift" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Invoicing period *</label>    
                            
                            <span class="field">
                                <select name="invoicing_contact" id="invoicing_contact" class="status" required="required">
                                        <option value="15"> 15</option>
                                        <option value="30"> 30</option>
                                        <option value="45"> 45</option>
                                        <option value="60"> 60</option>
                                        <option value="75"> 75</option>
                                        <option value="90"> 90</option>
                                </select>
                            </span>  
                            
                        </p>
                        
                        <h4 class="widgettitle nomargin shadowed">Management contact</h4>
                        
                        
                        <p>
                            <label>Name *</label>
                            <span class="field"><input type="text" name="name_management_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Email *</label>
                            <span class="field"><input type="email" name="email_management_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Telephone Management contact *</label>
                            <span class="field"><input type="text" name="telephone_management_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Skype</label>
                            <span class="field"><input type="text" name="skype" class="input-xxlarge" /></span>
                        </p>
                        
                        <p>
                            <label>Language</label>
                           
                            
                            <span class="field">
                                    <select name="conversation_language" id="conversation_language" class="status">
                                        <?php 
                                    $req_jc = $bdd->query("SELECT language FROM language ORDER BY language ASC");
                                    while ($val_jc = $req_jc->fetch()){?>
                                    <option value="<?php echo $val_jc['language']; ?>"><?php echo $val_jc['language']; ?></option>
                                    <?php }?>
                                </select>
                            </span> 
                            
                        </p>
                        
                        <p>
                            <label>Status *</label>
                            <span class="field">
                                <select name="status" id="status" class="status" required="required">
                                        <option value="active"> Active</option>
                                        <option value="non active"> Non active</option>
                                        <option value="prospect adviser"> Prospect adviser</option>
                                </select>
                            </span>                            
                        </p>
                            
                        <p class="stdformbutton">
                            <button type="submit" name="submit_advertiser" id="submit_advertiser" class="btn btn-primary">Submit </button>
                            <button type="reset" class="btn">Reset </button>
                        </p>
                        
                        </form>
                    </div>				
                </div><!--contentinner-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
	

	
    <div class="footer">
    	<div class="footerleft">Sharemyclick dashboard v1.0</div>
    	<div class="footerright">&copy; Sharemyclick with Themepixels - <a href="https://twitter.com/sharemyclick"><span class="iconsweets-twitter"></a> - <a href="https://www.facebook.com/sharemyclick"><span class="iconsweets-facebook"></a> - <a href="https://www.linkedin.com/company/sharemyclick">Followus on Linkedin</a></div>
    </div><!--footer-->
 


</body>
</html>
}