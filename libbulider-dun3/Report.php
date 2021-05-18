


<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function showDate(str,r){
			if((str && r)==""){
				document.getElementById("txtHint").innerHTML="";
				return;
			}else{
				var xmlhttp= new XMLHttpRequest();
				xmlhttp.onreadystatechange=function(){
					if (this.readyState==4 && this.status=200){
						document.getElementById("textHint").innerHTML=this.responseText;

					}
					
				};
				xmlhttp.open("GET", "fullReport.php?to="+str+"&from="+r,true);
				xmlhttp.send();
			}
		}
	</script>
	<title></title>
</head>
<body>
<form>
	<input type="date" name="from">
	<input type="date" name="to">
</form>
<div class="test" id="txtHint">mmmmmm</div>
</body>
</html>