	<script>
	getXHR('get', {'path':'/footer'}).done(function(json){
		var x='';
		x+='<div id="footer"><h1>' + json.social.title + '</h1>';
		x+='<p>"' + json.social.tweet + '"</p>';
		x+='<p>' + json.social.by + '</p>';
		x+='<a class="socialIcons" href="'+ json.social.twitter + '"><i class="fab fa-twitter"></i></a>';
		x+='<a class="socialIcons" href="https://www.facebook.com/iSchoolatRIT/"><i class="fab fa-facebook-f"></i></a>';
		
		var y='<div><div id="quickLinks">';
		$.each(json.quickLinks, function(i, item){
			y+='<span>---<span>'
			y+='<a href="' + item.href + '"><p>| ' + item.title + ' |</p></a>';
		});
		y+='<span>---</span></div>';
		x+=y;
		x+=json.copyright.html;
		x+='</div>'
		
		$('body').append(x);
	});
	</script>
</body>
</html>