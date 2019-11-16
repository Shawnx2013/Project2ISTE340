<?php
	$page = 'Faculty';
	require 'assets/inc/header.php';
?>

	<div id="bigTitle">
		<h1><span>I</span>nformation <span>S</span>ciences & <span>T</span>echnology @ RIT</h1>
		<h3>(Faculty Members)</h3>
	</div>
	<section id="people">
		<h1>Our People</h1>
		<p>Click below to view more about our faculty and staff</p>
		<div id="peopleTabs">
			<ul>
				<li><a href="#facultyTab">Faculty</a></li>
				<li><a href="#staffTab">Staff</a></li>
			</ul>
			<div id="facultyTab"></div>
			<div id="staffTab"></div>
		</div>
	</section>
   
   <script type="text/javascript">
    $('#peopleTabs').tabs();
	$(document).ready(function(){
		
		getXHR('get', {'path': '/people/faculty' }).done(function(json){
		var x = '';
		$.each(json.faculty, function(i, item){
			//console.log(k+' -- '+ktem);
			
			x += '<a data-featherlight="#' + item.username + '">';
			x += '<div class="ppl"><h2>' + item.name + '</h2>';
			x += '<p>' + item.title + '</p></div></a>';
			
			x += '<div class="hiddenContent" id="' + item.username + '">' +
				 '<h2 class="pplName">' + item.name;
			//check if tagline is null
			if(item.tagline != null && item.tagline != "")
				x += ' -- ' + item.tagline + '</h2>';
			else
				x += '</h2>';
			     			 
			x += '<img class="pplImage" src="' + item.imagePath + '"/>' +
				 '<br><div class="pplInfo"><p>' + item.title + '<br>'; 
			//check if interestArea is null
			if(item.interestArea != null && item.interestArea != "")
				x += '<strong>Interest Area: </strong>' + item.interestArea + '</p></div>';
			else
				x += '</p></div>';
			
			x += '<div class="contactInfo">';
			//formatting phone numbers
			if(item.phone != null && item.phone != ""){
				var og = item.phone;
				if(og.indexOf("(") >= 0 || og.indexOf(")") >= 0){
					x += '<p>Phone: ' + og + '</p>';
				}
				else if(og.indexOf("-") >= 0){
					x += '<p>Phone: ('+ og.substring(0,3) + ')' + og.substring(3, 12) + '</p>';
				}
				else if(og.indexOf("-") < 0){ // check if phone number doesn't have the dash
				    x += '<p>Phone: ('+ og.substring(0,3) + ") " + og.substring(3,6) + " - " + og.substring(6,10) + '</p>';
				}
			}
			
			//check if email is null
			if(item.email != null && item.email != "")
				x += '<p>Email: ' + item.email + '</p>';
			
			//check if office is null
			if(item.office != null && item.office != "")
				x += '<p>Office: ' + item.office + '</p>';
			
			//check website
			if(item.website != null && item.website != ""){
				x += '<a href="' + item.website + '">' + 
					 '<p><span>Link: </span>' + item.website + '</p></a>';
			}

			x += '</div></div>';
			
		});
		$('#facultyTab').append(x);
			
		}); // end people/faculty	
		
		getXHR('get', {'path': '/people/staff' }).done(function(json){
		var x = '';
		$.each(json.staff, function(i, item){
			//console.log(k+' -- '+ktem);
			
			x += '<a data-featherlight="#' + item.username + '">';
			x += '<div class="ppl"><h2>' + item.name + '</h2>';
			x += '<p>' + item.title + '</p></div></a>';
			
			x += '<div class="hiddenContent" id="' + item.username + '">' +
				 '<h2 class="pplName">' + item.name;
			//check if tagline is null
			if(item.tagline != null && item.tagline != "")
				x += ' -- ' + item.tagline + '</h2>';
			else
				x += '</h2>';
			     			 
			x += '<img class="pplImage" src="' + item.imagePath + '"/>' +
				 '<br><div class="pplInfo"><p>' + item.title + '<br>'; 
			//check if interestArea is null
			if(item.interestArea != null && item.interestArea != "")
				x += '<strong>Interest Area: </strong>' + item.interestArea + '</p></div>';
			else
				x += '</p></div>';
			
			x += '<div class="contactInfo">';
			//formatting phone numbers
			if(item.phone != null && item.phone != ""){
				var og = item.phone;
				if(og.indexOf("(") >= 0 || og.indexOf(")") >= 0){
					x += '<p>Phone: ' + og + '</p>';
				}
				else if(og.indexOf("-") >= 0){
					x += '<p>Phone: ('+ og.substring(0,3) + ')' + og.substring(3, 12) + '</p>';
				}
				else if(og.indexOf("-") < 0){ // check if phone number doesn't have the dash
				   x += '<p>Phone: ('+ og.substring(0,3) + ") " + og.substring(3,6) + " - " + og.substring(6,10) + '</p>';
				}
			}
			
			//check if email is null
			if(item.email != null && item.email != "")
				x += '<p>Email: ' + item.email + '</p>';
			
			//check if office is null
			if(item.office != null && item.office != "")
				x += '<p>Office: ' + item.office + '</p>';
			
			//check website
			if(item.website != null && item.website != ""){
				x += '<a href="' + item.website + '">' + 
					 '<p><span>Link: </span>' + item.website + '</p></a>';
			}
			
			x += '</div></div>';
			
		});
		$('#staffTab').append(x);
			
		}); // end people/faculty
	})
	</script>
<?php
	require 'assets/inc/footer.php';
?>