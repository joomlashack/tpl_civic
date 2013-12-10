jQuery(function() {
	function CivciBgRezise(el){
		el.css({
			'background-image' : 'url(' + el.attr('data-bg-grid-top')+ ')'
		});
	}
	/* Resize background in each position */
	CivciBgRezise(jQuery('#grid-top'));
	CivciBgRezise(jQuery('#grid-top2'));
	CivciBgRezise(jQuery('#grid-top3'));
	CivciBgRezise(jQuery('#grid-bottom'));
	CivciBgRezise(jQuery('#grid-bottom2'));
	CivciBgRezise(jQuery('#grid-bottom3'));
});
