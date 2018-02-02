<script type="text/javascript">
	$(document).ready(function(){
	  $(".ser_br").click(function(){
		var prc = "";
		var cat = "";
		var brnd = "";
		var ref = "";
		
		$('.pr_sel:checkbox:checked').each(function () {
		  prc += $(this).val()+",";
		});
		prc = prc.slice(0, -1);
		
		$('.cat_sel:checkbox:checked').each(function () {
		  cat += $(this).val()+",";
		});
		cat = cat.slice(0, -1);
		
		$('.brnd_sel:checkbox:checked').each(function () {
		  brnd += $(this).val()+",";
		});
		brnd = brnd.slice(0, -1);
		
		if((cat != '') && (brnd != '') && (prc != '')){
		  ref = "price="+prc+"AND cat_id="+cat+"AND brnd="+brnd;
		}
		else{
		  
		  if((cat != '') && (brnd != '')){
			ref = "cat_id="+cat+"AND brnd="+brnd;
		  }
		  else if((brnd != '') && (prc != '')){
			ref = "price="+prc+"AND brnd="+brnd;
		  }
		  else if((cat != '') && (prc != '')){
			ref = "price="+prc+"AND cat_id="+cat;
		  }
		  else{
			if(prc != ''){
			  ref = "price="+prc;
			}
			if(cat != ''){
			  ref = "cat_id="+cat;
			}
			if(brnd != ''){
			  ref = "brnd="+brnd;
			}
		  }
		  
		  
		}
		
		window.location = "http://localhost/dealall.com/index.php/home/product_filter/0?"+ref;
	  });
	});
</script>