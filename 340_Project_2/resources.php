<?php
	$page = 'Resources';
	require 'assets/inc/header.php';
?>
	<div id="bigTitle">
		<h1><span>I</span>nformation <span>S</span>ciences & <span>T</span>echnology @ RIT</h1>
		<h3>(Student Resources)</h3>
	</div>
	
	<div id="resources"></div>

	
	<script>
	$(document).ready(function(){
		//var all = '';
		getXHR('get',{'path':'/resources/'}).done(function(json){
			//console.log(json);
			var x='';
			x+='<h2>' + json.title + '</h2>';
			x+='<h3>' + json.subTitle + '</h3>';
			//x+='<div>';
			x+='<a data-featherlight="#studyAbroad">' + 
			   '<div class="resourcebox"><p>'+json.studyAbroad.title+'</p></div></a>';
			x+='<a data-featherlight="#' + json.studentServices.title + '">' + 
			   '<div class="resourcebox"><p>'+json.studentServices.title+'</p></div></a>';
			x+='<a data-featherlight="#tutorsAndLabInformation">' + 
			   '<div class="resourcebox"><p>'+json.tutorsAndLabInformation.title+'</p></div></a>';
			x+='<a data-featherlight="#studentAmbassadors">' + 
			   '<div class="resourcebox"><p>'+json.studentAmbassadors.title+'</p></div></a>';
			x+='<a data-featherlight="#' + json.coopEnrollment.title + '">' + 
			   '<div class="resourcebox"><p>'+json.coopEnrollment.title+'</p></div></a>';
			$('#resources').append(x);
		});
	
		
		getXHR('get',{'path':'/resources/studyAbroad'}).done(function(json){
			//console.log(json)
			var x='';
			x+='<div class="hiddenContent" id="studyAbroad">';
			x+='<h2 class="resourceTitle">'+json.studyAbroad.title+'</h2>';
			x+='<p>' + json.studyAbroad.description + '<p>';
			var y='<div>';
			$.each(json.studyAbroad.places, function(i, item){
				y+='<h3>'+item.nameOfPlace+'</h3>';
				y+='<p>'+item.description+'</p>';
			});
			y+='</div>'
			x+=y;
			x+='</div>';
			$('#resources').append(x);
		});
			
		getXHR('get',{'path':'/resources/studentServices'}).done(function(json){
			//console.log(json);
			var x='';
			x+='<div class="hiddenContent" id="' + json.studentServices.title + '">';
			x+='<h2 class="resourceTitle">'+json.studentServices.title+'</h2>';
			x+='<p>'+json.studentServices.academicAdvisors.description+'</p>';
			x+='<h3>'+json.studentServices.academicAdvisors.faq.title+'</h3>';
			x+='<p>For FAQs <a href="'+json.studentServices.academicAdvisors.faq.contentHref+'">ClickHere!</a></p>';
			x+='<div><h2>'+json.studentServices.professonalAdvisors.title+'</h2>';
			var y='';
			$.each(json.studentServices.professonalAdvisors.advisorInformation, function(i, item){
				y+='<p>'+item.name;
				y+='<br>'+item.department;
				y+='<br>'+item.email;
				y+='</p>';
			});
			x+=y+'</div>';
			x+='<h3>'+json.studentServices.facultyAdvisors.title+'</h3>';
			x+='<p>'+json.studentServices.facultyAdvisors.description+'</p>';
			x+='<h3>'+json.studentServices.istMinorAdvising.title+'</h3>';
			y='<ul>';
			$.each(json.studentServices.istMinorAdvising.minorAdvisorInformation, function(k, ktem){
				y+='<li>'+ktem.title+'<br> --'+ktem.advisor+'<br> --'+ktem.email+'</li>';
			});
			x+=y;
			x+='</div>';
			x+='</div>';
			$('#resources').append(x);
			
		});
		getXHR('get',{'path':'/resources/tutorsAndLabInformation'}).done(function(json){
			//console.log(json);
			var x='';
			x+='<div class="hiddenContent" id="tutorsAndLabInformation">'+
			   '<h2 class="resourceTitle">'+json.tutorsAndLabInformation.title+'</h2>'+
			   '<p>'+json.tutorsAndLabInformation.description+'</p>';
			x+='</div>'
			$('#resources').append(x);
		});
		getXHR('get',{'path':'/resources/studentAmbassadors'}).done(function(json){
			//console.log(json);
			var x='';
			x+='<div class="hiddenContent" id="studentAmbassadors">'+
			   '<h2 class="resourceTitle">'+json.studentAmbassadors.title+'</h2>'+
			   '<figure><img src="https://ist.rit.edu/assets/img/resources/Ambassadors.jpg" alt="ambassadorsImageSource">'+
			   '</figure>';
			var y='';
			$.each(json.studentAmbassadors.subSectionContent, function(i, item){
				y+='<h3>'+item.title+'</h3>';
				y+='<p>'+item.description+'</p>';
			});
			x+=y;
			x+='<p>Note: ' + json.studentAmbassadors.note + '</p>';
			$('#resources').append(x);
			
		});
		getXHR('get',{'path':'/resources/coopEnrollment'}).done(function(json){
			//console.log(json);
			var x='';
			x+='<div class="hiddenContent" id="'+json.coopEnrollment.title+'">'+
			   '<h2 class="resourceTitle">'+json.coopEnrollment.title+'</h2>';
			var y='';
			$.each(json.coopEnrollment.enrollmentInformationContent, function(i, item){
				y+='<h3>'+item.title+'</h3>';
				y+='<p>'+item.description+'</p>';
			});
			x+=y;
			x+='</div>';
			$('#resources').append(x);
		});
		
	});
	</script>
<?php
	require 'assets/inc/footer.php';
?>