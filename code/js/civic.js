// Civic



jQuery(function() {
	function CivciBgRezise(el){
		el.css({
			'background-image' : 'url(' + el.attr('data-bg-grid-top')+ ')'
		});
	}
	CivciBgRezise(jQuery('.grid-bottom3'));
	CivciBgRezise(jQuery('.grid-top3'));
});
