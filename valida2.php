<?xml version="1.0" ?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.2//EN" 
    "http://www.wapforum.org/DTD/wml12.dtd"> 
<wml>
    <card title="Welcome">
        <p align="center">
		 <? 
			$nome = $HTTP_POST_VARS["ra"];
			echo "R.A.: $nome";
		 ?>
    	</p>
</card>
</wml>