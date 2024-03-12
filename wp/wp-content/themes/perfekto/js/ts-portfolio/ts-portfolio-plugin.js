// closure to avoid namespace collision
(function(){
	
	var scripts = document.getElementsByTagName( "script"),
		src = scripts[scripts.length-1].src;
		
		if ( scripts.length ) {
		
			for ( i in scripts ) {
				var scriptSrc = '';
				if ( typeof scripts[i].src != 'undefined' ) { scriptSrc = scripts[i].src; } // End IF Statement
				
				var txt = scriptSrc.search( 'ts-portfolio' );
				
				if ( txt != -1 ) {
					src = scripts[i].src;
				} // End IF Statement
			} // End FOR Loop
		
		} // End IF Statement

		var framework_url = src.split( '/js/' );
		
		var icon_url = framework_url[0] + '/images/TS-Portfolio.png';
	
	
	// creates the plugin
	tinymce.create('tinymce.plugins.ts_portfolio', {
		// creates control instances based on the control's id.
		// our button's id is "mygallery_button"
		createControl : function(id, controlManager) {

			if (id == 'ts_portfolio_button') {
				// creates the button
				var button = controlManager.createButton('ts_portfolio_button', {
					title : 'Portfolio Shortcode', // title of the button
					image : icon_url,  // path to the button's image
					onclick : function() {
						// triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Portfolio Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=ts-portfolio-form' );
					}
				});
				return button;
			}
			return null;
		}
	});
	
	// registers the plugin. DON'T MISS THIS STEP!!!
	tinymce.PluginManager.add('ts_portfolio', tinymce.plugins.ts_portfolio);
	
	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="ts-portfolio-form"><table id="ts-portfolio-table" class="form-table">\
			<tr>\
				<th><label for="ts-portfolio-col">Columns</label></th>\
				<td><input type="text" id="ts-portfolio-col" name="col" value="3" /><br />\
				<small>specify the number of columns.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-postperpage">Post per Page</label></th>\
				<td><input type="text" id="ts-portfolio-postperpage" name="postperpage" value="8" /><br />\
				<small>specify the number of post that you want to display in every page.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-orderby">Order By</label></th>\
				<td><input type="text" name="orderby" id="ts-portfolio-orderby" value="menu_order ASC, ID ASC" /><br /><small>RAND (random) is also supported.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-cat">Category</label></th>\
				<td><input type="text" name="cat" id="ts-portfolio-cat" value="" /><br />\
					<small>specify the category.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-customclass">Custom Class</label></th>\
				<td><input type="text" name="customclass" id="ts-portfolio-customclass" value="" /><br />\
					<small>you can add custom class. if you want to custom the layout.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-colspacing">Column Spacing</label></th>\
				<td><input type="text" name="colspacing" id="ts-portfolio-colspacing" value="" /><br />\
					<small>specify the space between 2 columns. default value is from the TS Display settings.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-rowspacing">Row Spacing</label></th>\
				<td><input type="text" name="rowspacing" id="ts-portfolio-rowspacing" value="" /><br />\
					<small>specify the space between 2 rows. default value is from the TS Display settings.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-showtitle">Show Title</label></th>\
				<td><input type="checkbox" name="showtitle" id="ts-portfolio-showtitle" value="yes" /><br />\
					<small>check it if you want to show the title.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-showdesc">Show Description</label></th>\
				<td><input type="checkbox" name="showdesc" id="ts-portfolio-showdesc" value="yes" /><br />\
					<small>check it if you want to show the description.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-showmore">Show Read More</label></th>\
				<td><input type="checkbox" name="showtitle" id="ts-portfolio-showmore" value="yes" /><br />\
					<small>check it if you want to show read more link.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-portfolio-moretext">Read More Text</label></th>\
				<td><input type="text" name="moretext" id="ts-portfolio-moretext" value="Read More" /><br />\
					<small>You can change the text for "Read More" link</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="ts-portfolio-submit" class="button-primary" value="Insert Portfolio" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#ts-portfolio-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = { 
				'cat'         	: '',
				'col'       	: '3',
				'postperpage'	: '8',
				'orderby'    	: 'menu_order ASC, ID ASC',
				'frame'    		: 'default',
				'showtitle' 	: 'no',
				'showdesc' 		: 'no',
				'showmore'		: 'no',
				'customclass'	: '',
				'colspacing'	: '',
				'rowspacing'	: '',
				'moretext'		: 'Read More'
				};
			
			var shortcode = '[portfolio';
			
			for( var index in options) {
				var inputs = table.find('#ts-portfolio-' + index);
				var value = inputs.val();
				
				// validate number of columns. it cant be higher than 4 and less than 1
				if(index=="col" && isNaN(value)){
					value = 3;
				}
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if(inputs.attr("type")=='checkbox'){
					if(inputs.attr("checked"))	
						shortcode += ' ' + index + '="' + value + '"';
				}else{
					if ( value !== options[index] )
						shortcode += ' ' + index + '="' + value + '"';
				}
			}
			
			shortcode += ']';
			
			// inserts the shortcode into the active editor
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			
			// closes Thickbox
			tb_remove();
		});
	});
})()