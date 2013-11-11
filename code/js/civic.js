// Civic



jQuery(function() {
	function CivciBgRezise(el){
		el.css({
			'background-image' : 'url(' + jQuery('.grid-top3').attr('data-bg-grid-top')+ ')',
			'filter': 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src= "' + jQuery('.grid-top3').attr('data-bg-grid-top') + '",sizingMethod="scale")'
		});
	}
	CivciBgRezise(jQuery('.grid-top3'));
});