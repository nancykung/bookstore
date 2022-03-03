<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<!--<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/jquery.validate.js"></script>
      <script type="text/javascript" src="js/bootstrap.js"></script>!-->

		<style>
			body{
				font-family: Arial;
				text-align: center;
			}

			tr, td{
				padding: 1rem .5rem;
				border: 1px solid #ccc;
			}

			thead{
				background: #333;
				color: #fff;
			}

			button{
				padding:  1rem 1.5rem;
				background: blue;
				text-transform: uppercase;
				color: #fff;
				border: none;
				border-radius: 10px;
				cursor: pointer;
				outline: none;
			}
		</style>
	</head>
	<body>
		<form method="post">Search :: <input type="text" name="keyword" id="keyword"></input>&nbsp;&nbsp;<button type="button" onclick="SearchDoc()">Search</button> </form>
		
		<p>&nbsp;</p>
		<div>
		<div class="w3-row">
			<div class="w3-container w3-quarter">
		    	<table width="100%">
					<tbody id="info">
					
					</tbody>
				</table>
		  	</div>
		  	<div class="w3-green w3-container w3-threequarter">
		    	<table width="100%">
					<tbody id="bookinfo">
					
					</tbody>
				</table>
		    	<button type="button" onclick="loadBook()">Change Content</button>
		  	</div>
		</div>
		<!--<button type="button" onclick="loadDoc()">Change Content</button>!-->
		<p>&nbsp;</p>
		

		<script>
			$(document).ready(function(){
   				
				loadDoc();
   			});
			function loadDoc()
			{
				/*let xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						let data = JSON.parse(this.responseText);
						console.log(data);

						for(let i=0; i<data.length; i++){
							document.getElementById('info').innerHTML +=`
								<tr>
									<td>${data[i].Id}</td>
									<td>${data[i].TitleTh}</td>
									<td>${data[i].Formats}</td>
								</tr>
							`;
						}
					}
				}

				document.getElementById('info').innerHTML = '';
				xhttp.open("GET","index.php", true);
				xhttp.send();*/
				document.getElementById('keyword').value = "";
				var keyword = "null";
				var no = 0;
				var dataget;
				$.ajax({  
			          url:"config.php",
			          method:"GET",  
			          data:{keyword:keyword},  
			          success:function(result){  
			              	var content = '';
			              	var book_keyword = "";
			              	var book_id = "";

			          		var obj = jQuery.parseJSON(result);
			          		if(obj)
			          		{
			          			//alert(obj);
			          			dataget = obj.categories;

			          			content = content + "<tr>";
			          			content = content + "<td>All</td>";
								content = content + "<td></td>";;
								content = content + "</tr>";

			          			$.each(dataget, function(key, val) {
			          				//content = content + "Location : " + val.Id +  ', Lat = ' + val.TitleTh + ', Lng = ' + val.Formats + ' <br>';
			          				//book_id = val._id;
			          				book_keyword = val.keyword;
			          				no = key +1;
			          					content = content + "<tr>";
			          					content = content + "<td><a href='javascript:loadBook3("+book_keyword+")'>"+val.name+"</a></td>";
										content = content + "<td>"+val.count+"</td>";;
										content = content + "</tr>";
			          			});
			          		}else{
			          			alert("Empty");
			          		}
			          		$('#info').html(content);
			          }  
			    });
			}

			function loadBook()
			{
				
				document.getElementById('keyword').value = "";
				var keyword = "";
				var no = 0;
				var dataget;
				$.ajax({  
			          url:"booklist2.php",
			          method:"POST",  
			          data:{keyword:keyword},  
			          success:function(result){  
			          		//alert(result);
			              	var content = '';
			          		var obj = jQuery.parseJSON(result);
			          		if(obj)
			          		{
			          			//alert(obj);
			          			dataget = obj.categories;
			          			$.each(dataget, function(key, val) {
			          				//content = content + "Location : " + val.Id +  ', Lat = ' + val.TitleTh + ', Lng = ' + val.Formats + ' <br>';
			          				no = key +1;
			          					content = content + "<tr>";
			          					content = content + "<td>"+val.name+"</td>";
										content = content + "<td>"+val.count+"</td>";;
										content = content + "</tr>";
			          			});
			          		}else{
			          			alert("Empty");
			          		}
			          		$('#info').html(content);
			          }  
			    });
			}

			function SearchDoc()
			{
				//alert("Test");
				//alert(document.getElementById('keyword').value);
				var keyword = document.getElementById('keyword').value;
				//var url = "index2.php?keyword="+keyword;

				//alert(url);
				/*let xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						let data = JSON.parse(this.responseText);
						console.log(data);

						document.getElementById('info').innerHTML = 'Start';
						for(let i=0; i<data.length; i++){
							document.getElementById('info').innerHTML +=`
								<tr>
									<td>${data[i].Id}</td>
									<td>${data[i].TitleTh}</td>
									<td>${data[i].Formats}</td>
								</tr>
							`;
						}
					}
				}

				document.getElementById('info').innerHTML = 'Stop';
				xhttp.open("POST",$url, true);
				xhttp.send();*/

			    if(keyword != '')  
			    {  
			    	//document.getElementById('UpdateModal').style.display='block';
			      //$('#UpdateModal').modal('show'); 
			      //alert(url);
			      $.ajax({  
			          url:"booklist2.php",
			          method:"POST",  
			          data:{keyword:keyword},  
			          success:function(result){

			          	alert(result);
			          	    
			          		/*var content = '';
			          		var no = 0;
			          		var obj = jQuery.parseJSON(result);
			          		if(obj)
			          		{
			          			//alert(obj);
			          			$.each(obj, function(key, val) {
			          				//content = content + "Location : " + val.Id +  ', Lat = ' + val.TitleTh + ', Lng = ' + val.Formats + ' <br>';
			          				no = key + 1;
			          				content = content + "<tr>";
			          				content = content + "<td>"+no+"</td>";
									content = content + "<td>"+val.Id+"</td>";
									content = content + "<td>"+val.TitleTh+"</td>";
									content = content + "<td>"+val.Formats+"</td>";
									content = content + "<td><img src='"+val.Imagelocation+"' alt='"+val.TitleTh+"' width='200' height='300'></td>";
									content = content + "</tr>";
			          			});
			          		}else{
			          			alert("Empty");
			          		}
			          		$('#info').html(content);*/
			          }  
			      }); 
			    } 
			}

			function loadBook3(inKey)
			{
				//alert(inKey);
				var keyword = inKey;

				if(inKey != '')  
			    {  
			      $.ajax({  
			          url:"booklist2.php",
			          method:"POST",  
			          data:{keyword:keyword},  
			          success:function(result){

			          	alert(result);
			          	    
			          		/*var content = '';
			          		var no = 0;
			          		var obj = jQuery.parseJSON(result);
			          		if(obj)
			          		{
			          			//alert(obj);
			          			$.each(obj, function(key, val) {
			          				//content = content + "Location : " + val.Id +  ', Lat = ' + val.TitleTh + ', Lng = ' + val.Formats + ' <br>';
			          				no = key + 1;
			          				content = content + "<tr>";
			          				content = content + "<td>"+no+"</td>";
									content = content + "<td>"+val.Id+"</td>";
									content = content + "<td>"+val.TitleTh+"</td>";
									content = content + "<td>"+val.Formats+"</td>";
									content = content + "<td><img src='"+val.Imagelocation+"' alt='"+val.TitleTh+"' width='200' height='300'></td>";
									content = content + "</tr>";
			          			});
			          		}else{
			          			alert("Empty");
			          		}
			          		$('#info').html(content);*/
			          }  
			      }); 
			    } 
			}

		</script>
	</body>
</html>