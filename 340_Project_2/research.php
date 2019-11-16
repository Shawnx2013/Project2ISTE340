<?php
	$page="Research";
	require 'assets/inc/header.php';
?>
	<div id="bigTitle">
		<h1><span>I</span>nformation <span>S</span>ciences & <span>T</span>echnology @ RIT</h1>
		<h3>(Research)</h3>
	</div>
	
	
	<div id="research">
		<h1>Faculty Research</h1>
		<div id="interestArea">
			<h2>By Interest Area</h2>
		</div>
		<div id="facultyName">
			<h2>By Faculty</h2>
		</div>
	</div>
	<script>
		getXHR('get', {'path':'/research/byInterestArea'}).done(function(json){
			var x = '';
				
			$.each(json.byInterestArea, function(i,item){
				//console.log(i+' = '+item);
				x+=	'<a data-featherlight="#' + item.areaName + '">' +
					'<div class="interests">' +
					'<p>' + item.areaName + '</p></div></a>';
				
				var y= '<div class="hiddenContent" id="' + item.areaName + '">' + 
					   '<h3 class="interestName">' + item.areaName + '</h3><ul>';
				$.each(item.citations,function(j,jtem){
					y+='<li>'+jtem+'</li><br>';
				});
				y+='</ul></div>';
				
				x+=y;
			});
			$('#interestArea').append(x);
		});
		
	
		getXHR('get', {'path':'/research/byFaculty'}).done(function(json){
			var x = '';
			
			$.each(json.byFaculty, function(i,item){
				//console.log(i+' = '+item);
				x+= '<a data-featherlight="#' + item.username + '">' + '<div class="faculty">' + 
					"<img src='https://ist.rit.edu/assets/img/people/" + this.username + ".jpg' alt='" + 
					this.username + "' class='researchPic'>" +
					'<p>' + item.facultyName + '</p></div></a>';
				
				var y= '<div class="hiddenContent" id="' + item.username + '">' + 
					   '<h3 class="interestName">' + item.facultyName + '</h3><ul>';
				$.each(item.citations,function(j,jtem){
					y+='<li>'+jtem+'</li><br>';
				});
				y+='</ul></div>';
				
				x+=y;
			});
			$('#facultyName').append(x);
		});
				
		//function by
	</script>
<?php
	require 'assets/inc/footer.php';
?>	