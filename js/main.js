	function select_data(id)
	{

	var result = new Object();
	var i = 0;
	result[0] = [];
	//var result[i] = new Array();
	jQuery.ajax({
					type: "GET",
					url:"http://data.sharemyclick.com/getCampaignsData.php",
				    data: {value : id},                   
					contentType: "application/json",
					dataType: "json",
					async: false,
					cache: false,
					success: function(data, textStatus, jqXHR) {
						var jsonObj = jQuery.parseJSON(JSON.stringify(data));//console.log(jsonObj);
						result[i] = jsonObj;
						/*jQuery.each(jsonObj, function( index, value ) {
						result[i] = new Array();
							jQuery.each(value, function(index2, value2){//console.log(index2 + '---' + value2);							
								result[i][index2] = value2;			
							});
							//console.log(i + ' --- ');console.log(result[i]);
							i++;
						});*/
					
					  },

				 //Display_records(mnth,yr);
						   //$("#main").html(server_response);

					error:function (xhr, ajaxOptions, thrownError){
							//alert(xhr.status);

								//alert(thrownError);
					}



			 }); console.log(result);
	 return result[0];

	}


jQuery(document).ready(function() {


    //toggle `popup` / `inline` mode
    jQuery.fn.editable.defaults.mode = 'popup';     
    
    //make name editable
	jQuery('[id^=name_]').each(function(){
	var pkey = jQuery(this).attr('id').substring(5);
    jQuery(this).editable({
	url: 'http://campaigns.sharemyclick.com/setCampaignsData.php',
    type: 'post',
    dataType: 'json',
	pk : pkey,
	name : 'name',
	send: 'always',
	type: 'input',
		name : 'name_edit',
        placement: 'right',
		});
	});
	//make type_name editable
	jQuery('[id^=type_name]').each(function(){
	var pkey = jQuery(this).attr('id').substring(9);
    jQuery(this).editable({
	url: 'http://campaigns.sharemyclick.com/setCampaignsData.php',
    type: 'post',
    dataType: 'json',
	pk : pkey,
	name : 'type_name',
	send: 'always',
	type: 'select',
        title: 'Select campaign type',
        placement: 'right',
        source: select_data('type_name')
		});
	});
	//make partner_name editable
    jQuery('[id^=partner_name]').each(function(){
	var pkey = jQuery(this).attr('id').substring(12);
    jQuery(this).editable({
	url: 'http://campaigns.sharemyclick.com/setCampaignsData.php',
    type: 'post',
    dataType: 'json',
	pk : pkey,
	name : 'partner_name',
	send: 'always',
	type: 'select',
        title: 'Select campaign type',
        placement: 'right',
        source: select_data('partner_name')
		});
	});
	
	//make partner_name editable
    jQuery('[id^=db_name]').each(function(){
	var pkey = jQuery(this).attr('id').substring(7);
    jQuery(this).editable({
	url: 'http://data.sharemyclick.com/setCampaignsData.php',
    type: 'post',
    dataType: 'json',
	pk : pkey,
	name : 'db_name',
	send: 'always',
	type: 'select',
        title: 'Select Database name',
        placement: 'right',
        source: select_data('db_name')
		});
	});
		
     //make partner_name editable
    jQuery('[id^=type_payout]').each(function(){
	var pkey = jQuery(this).attr('id').substring(11);
    jQuery(this).editable({
	url: 'http://data.sharemyclick.com/setCampaignsData.php',
    type: 'post',
    dataType: 'json',
	pk : pkey,
	name : 'type_payout',
	send: 'always',
	type: 'select',
        title: 'Select Payout Type',
        placement: 'right',
        source: select_data('type_payout')
		});
	});
		
                
                //make partner_name editable
    jQuery('[id^=affiliate_name]').each(function(){
	var pkey = jQuery(this).attr('id').substring(14);
    jQuery(this).editable({
	url: 'http://data.sharemyclick.com/setCampaignsData.php',
    type: 'post',
    dataType: 'json',
	pk : pkey,
	name : 'affiliate_name',
	send: 'always',
	type: 'select',
        title: 'Select Management name',
        placement: 'right',
        source: select_data('affiliate_name')
		});
	});
        
        
	//make price editable
    jQuery('[id^=price]').each(function(){
	var pkey = jQuery(this).attr('id').substring(5);
    jQuery(this).editable({
	url: 'http://data.sharemyclick.com/setCampaignsData.php',
    type: 'post',
    dataType: 'json',
	pk : pkey,
	name : 'price',
	send: 'always',
	type: 'input',
        placement: 'right',
		});
	});
        
        
        //make price editable
    jQuery('[id^=date]').each(function(){
	var pkey = jQuery(this).attr('id').substring(4);
    jQuery(this).editable({
	url: 'http://data.sharemyclick.com/setCampaignsData.php',
    type: 'post',
    dataType: 'json',
	pk : pkey,
        format: 'yyyy-mm-dd',    
        viewformat: 'yyyy-mm-dd',    
        datepicker: {
                weekStart: 1
           },
	name : 'date',
	send: 'always',
	type: 'date',
        placement: 'right',
		});
	});
	
	//make time editable
    jQuery('#time').editable();
	
	
	
	
	
        /*
        //uncomment these lines to send data on server
        ,pk: 1
        ,url: '/post'
        */
    //});
});