(function($){
	var ajaxOptions = [
        "options[linkTitle]",
        "options[linkTarget]",
        "options[show-excerpt]",
        "options[show-title]"
	];
	for(i = 0; i < ajaxOptions.length; i++){
		SlideDeckPreview.ajaxOptions.push(ajaxOptions[i]);
	}
	
	SlideDeckPreview.updates['options[show-title]'] = SlideDeckPreview.updates['options[show-excerpt]'] = function($elem, value){
        var $showTitle = $('#options-show-title');
        var $showExcerpt = $('#options-show-excerpt');
        var excerptTitle = $elem.attr('id') == "options-show-excerpt" ? 'excerpt' : 'title';
        
        // If the other option is already turned on, just update the preview class
        if((excerptTitle == "excerpt" && $showTitle.is(':checked')) || (excerptTitle == "title" && $showExcerpt.is(':checked'))){
            if(value){
                SlideDeckPreview.elems.slidedeckFrame.addClass(SlideDeckPrefix + 'show-' + excerptTitle);
            } else {
                SlideDeckPreview.elems.slidedeckFrame.removeClass(SlideDeckPrefix + 'show-' + excerptTitle);
            }
        }
        // Otherwise, do an AJAX refresh to re-layout the preview
        else {
            SlideDeckPreview.ajaxUpdate();
        }
	}
})(jQuery);