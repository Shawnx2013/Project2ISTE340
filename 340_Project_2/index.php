<?php
	$page = 'Home';
	require 'assets/inc/header.php';
?>
	
	<div id="bigTitle">
		<h1><span>I</span>nformation <span>S</span>ciences & <span>T</span>echnology @ RIT</h1>
		<h3>(School of Information)</h3>
	</div>

	<div id="about" >
	</div>
	
	<div id="undergraduate">
		<h1>Our Undergraduate Degrees</h1>
	</div>
	
	<div id="graduate">
		<h1>Our Graduate Degrees</h1>
	</div>
	
	<div id="minors" >
		<h1>Our Undergraduate Minors</h1>
	</div>
	
	<script>
	$(document).ready(function(){
		// get the /about/ information onto the page
		getXHR('get',{'path':'/about/'}).done(function(json){
			var x = '<h1 id="aboutTitle">'+json.title+'</h1>';
			x+='<p id="aboutDescription">'+json.description+'</p>';
			x+='<p id="aboutQuote">"'+json.quote+'"</p>';
			x+='<p id="quoteAuthor">----'+json.quoteAuthor+'</p>';
		
			// add this 'x' to the page
			$('#about').append(x);
		}); // end /about/
		
		// degrees undergraudate
		getXHR('get',{'path':'/degrees/undergraduate/'}).done(function(json){
			//console.log(json);
			
			$.each(json.undergraduate,function(i,item){
				//console.log(i+' = '+item);
				var x='';
				x+='<a data-featherlight="#' + item.degreeName + '">' +
				   '<div class="majors">'+ 
				   '<h2>'+item.title+'</h2>';
				x+='<p>'+item.description+'</p>'+ '</div>' +
				'</a>';
				
				var y= '<div class="hiddenContent" id="' + item.degreeName + '">' +
					'<h1>Concentrations: </h1>'+
					'<ul>';
				$.each(item.concentrations,function(j,jtem){
					y+='<li>'+jtem+'</li>';
				});
				y+='</ul></div>';
				
				x+=y;// add the concentrations to the program information				
				
				$('#undergraduate').append(x);
			});
		}); // end degrees/undergraduate/
		// --------------------------------------------
		
		//degrees graduate
		getXHR('get', {'path':'/degrees/graduate/'}).done(function(json){
			
			$.each(json.graduate, function(i,item){
				//console.log(i + item.title);
				var x = '';
				if(item.degreeName != "graduate advanced certificates"){
					x+= '<a data-featherlight="#' + item.degreeName + '">' +
						'<div class="gradDegree">' +
						'<h2>'+item.title+'</h2>';
					x+='<p>'+item.description+'</p></div></a>';
					var y= '<div class="hiddenContent" id="' + item.degreeName + '">' + 
						   '<h1>Concentrations: </h1>'+
						   '<ul>';
					$.each(item.concentrations,function(j,jtem){
						y+='<li>'+jtem+'</li>';
					});
					y+='</ul></div>';
				}
				else{
					x+= '<a data-featherlight="#cert">' +
						'<div id="certificates">' +
						'<h2>Graduate Advanced Certificates</h2></div></a>';
					var y = '<div class="hiddenContent" id="cert">' +
						    '<h1>Certificates: </h1>'+
							'<ul>';
					$.each(item.availableCertificates, function(k, ktem){
						y+='<li>'+ktem+'</li>';
					});
					y+='</ul></div>';
				}
				
				x+=y;// add the concentrations to the program information				
				
				$('#graduate').append(x);
			});
		});
		
		
		//minors
		getXHR('get', {'path':'/minors/UgMinors'}).done(function(json){
			$.each(json.UgMinors, function(j, item){
				var x = '';
				x+= '<a data-featherlight="#j">' +
					'<div class="minor">' +
					'<p>' + item.title + '</p>';
				x+='</div></a>';
				
				var y= '<div class="hiddenContent" id="j">' + 
					   '<p class="minorTitle">' + item.title +'</p>' +
					   '<p>' + item.description + '</p>' +
					   '<ul>';
				$.each(item.courses, function(k, ktem){
					y+='<li>' + ktem + '</li>';
				});
				y+= '</ul>';
				if(item.note)
					y+= '<p>Note: ' + item.note + '</p></div>';
				else
					y+='</div>';
				x+=y;
				
				$('#minors').append(x);
			});
		});
		
	});	// end document ready
	</script>	
<?php
	require 'assets/inc/footer.php';
?>	
