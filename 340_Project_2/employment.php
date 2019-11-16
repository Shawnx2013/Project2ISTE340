<?php
	$page = 'Employment';
	require 'assets/inc/header.php';
?>
	<div id="bigTitle">
		<h1><span>I</span>nformation <span>S</span>ciences & <span>T</span>echnology @ RIT</h1>
		<h3>(Employment)</h3>
	</div>	
	
	<div id="introduction"></div>
	
	<div id="degreeStats"></div>
	<div id="box">
		<div id="employers"></div>
		<div id="careers"></div>
	</div>
	
	<div id="map">
		<h2>Where Our Students Work</h2>
		<iframe src="https://ist.rit.edu/api/map.php" id="imap"></iframe>
	</div>
	
	<div id="tables">
		<button id="coopButton" class="buttons pure-button">Co-op Table</button>
		<button id="proButton" class="buttons pure-button">Professional Employment Table</button>
	</div>
	<script>
	$(document).ready(function(){
	//employment
		getXHR('get', {'path':'/employment/introduction/'}).done(function(json){
			var x = '';
			//$.each(json.introduction, function(i, item){
				
				x+='<h1>Introduction</h1>';
				x+='<h2>' + json.introduction.title + '</h2>';
				var y='';
				$.each(json.introduction.content, function(k, ktem){
					y+='<div>';
					y+='<h3>' + ktem.title + '</h3>';
					y+='<p>' + ktem.description + '</p>';
					y+='</div>';
				});
				x+=y;			
			//});
			$('#introduction').append(x);	
		});
		
		getXHR('get', {'path':'/employment/degreeStatistics/'}).done(function(json){
			var x = '';
			//$.each(json.degreeStatistics, function(a, atem){
				//x+='<h2>Degree Statistics</h2>';
				x+='<h2>' + json.degreeStatistics.title + '</h2>';
				var y='';
				$.each(json.degreeStatistics.statistics, function(b, btem){
					y+='<div class="stats">'
					y+='<h1>' + btem.value + '</h1>';
					y+='<p>' + btem.description + '</p>';
					y+='</div>';
				});
				x+=y;
			//});
			$('#degreeStats').html(x);	
		});
			
		getXHR('get', {'path':'/employment/employers'}).done(function(json){
			var x = '';
			//$.each(json.employers, function(c, ctem){
				//x+='<h2>Employers</h2>';
				x+='<h2>' + json.employers.title + '</h2>';
				var y='';
				$.each(json.employers.employerNames, function(d, dtem){
					y+='<p>' + dtem + '</p>';
				});
				
				y+='</ul>';
				x+=y;
			//});
			$('#employers').html(x);	
		});
		
		getXHR('get', {'path':'/employment/careers'}).done(function(json){
			var x = '';
			//$.each(json.careers, function(e, etem){
				//x+='<h2>Careers</h2>';
				x+='<h2>' + json.careers.title + '</h2>';
				var y='';
				$.each(json.careers.careerNames, function(f, ftem){
					y+='<p>' + ftem + '</p>';
				});
				y+='</ul>';
				x+=y;
			//});
			$('#careers').html(x);
		});
		
		getXHR('get', {'path':'/employment/'}).done(function(json){
			$('#coopButton').html(json.coopTable.title);
			$('#proButton').html(json.employmentTable.title)
			
			$('#coopButton').on('click',function(){
				var x = 
					'<table id="coopTable">'+
					'<thead>'+
					  '<tr>'+
						'<th>Employer</th>'+
						'<th>Degree</th>'+
						'<th>City</th>'+
						'<th>Term</th>'+
					  '</tr>'+
					'</thead>'+
					'<tbody id=\'coopTableBody\'>';
				

				$.each( json.coopTable.coopInformation, function(i, item){ 
				x+= 
					'<tr>'+
					'<td>'+item.employer+'</td>'+
					'<td>'+item.degree+'</td>'+
					'<td>'+item.city+'</td>'+
					'<td>'+item.term+'</td>'+
					'</tr>'
				 ;
				});

					x+= '</tbody>'+
						'</table>';
				
				$.featherlight(x);
				$('#coopTable').DataTable();
				
			});
			
			$('#proButton').on('click',function(){
				var x = 
					'<table id="proTable">'+
			 		'<thead>'+
					  '<tr>'+
					    '<th>Employer</th>'+
					    '<th>Degree</th>'+
					    '<th>City</th>'+
					    '<th>Title</th>'+
					    '<th>Start Date</th>'+
					  '</tr>'+
					'</thead>'+
					'<tbody id="coopTableBody">';
				

				$.each( json.employmentTable.professionalEmploymentInformation, function(i, item){ 
				x+= 
					'<tr>'+
					'<td>'+item.employer+'</td>'+
					'<td>'+item.degree+'</td>'+
					'<td>'+item.city+'</td>'+
					'<td>'+item.title+'</td>'+
					'<td>'+item.startDate+'</td>'+
					'</tr>';
				});

				x+= '</tbody>'+
					'</table>';
			
				$.featherlight(x);
				$('#proTable').DataTable();		
			});
		});
		
	});
	</script>
<?php
	require 'assets/inc/footer.php';
?>