// closure to avoid namespace collision
(function(){
		  
	var scripts = document.getElementsByTagName( "script"),
		src = scripts[scripts.length-1].src;
		
		if ( scripts.length ) {
		
			for ( i in scripts ) {
				var scriptSrc = '';
				if ( typeof scripts[i].src != 'undefined' ) { scriptSrc = scripts[i].src; } // End IF Statement
				
				var txt = scriptSrc.search( 'ts-testimonial' );
				
				if ( txt != -1 ) {
					src = scripts[i].src;
				} // End IF Statement
			} // End FOR Loop
		
		} // End IF Statement

		var framework_url = src.split( '/js/' );
		
		var icon_url = framework_url[0] + '/images/ts-testimonial/icon-mce-plugin.png';
	
		  
	// creates the plugin
	tinymce.create('tinymce.plugins.ts_testimonial', {
		// creates control instances based on the control's id.
		// our button's id is "mygallery_button"
		createControl : function(id, controlManager) {
			if (id == 'ts_testimonial_button') {
				// creates the button
				var button = controlManager.createButton('ts_testimonial_button', {
					title : 'TS Testimonial Shortcode', // title of the button
					image : icon_url,  // path to the button's image
					onclick : function() {
						// triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'TS Testimonial Shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=ts-testimonial-form' );
					}
				});
				return button;
			}
			return null;
		}
	});
	
	// registers the plugin. DON'T MISS THIS STEP!!!
	tinymce.PluginManager.add('ts_testimonial', tinymce.plugins.ts_testimonial);
	
	// executes this when the DOM is ready
	jQuery(function(){
		// creates a form to be displayed everytime the button is clicked
		// you should achieve this using AJAX instead of direct html code like this
		var form = jQuery('<div id="ts-testimonial-form"><table id="ts-testimonial-table" class="form-table">\
			<tr>\
				<th><label for="ts-testimonial-col">Column</label></th>\
				<td><input type="text" id="ts-testimonial-col" name="col" value="1" /><br />\
				<small>specify how many columns that you want to use for testimonial.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-testimonial-postperpage">Post per Page</label></th>\
				<td><input type="text" id="ts-testimonial-postperpage" name="postperpage" value="" /><br />\
				<small>specify the number of post that you want to display in every page.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-testimonial-cat">Category</label></th>\
				<td><input type="text" name="cat" id="ts-testimonial-cat" value="" /><br />\
					<small>specify the category.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-testimonial-testiid">Testimonial ID</label></th>\
				<td><input type="text" name="testiid" id="ts-testimonial-testiid" value="" /><br />\
					<small>fill this if you want to show unique post.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-testimonial-customclass">Custom Class</label></th>\
				<td><input type="text" name="customclass" id="ts-testimonial-customclass" value="" /><br />\
					<small>you can add custom class. if you want to custom the layout.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-testimonial-showtitle">Show Title</label></th>\
				<td><input type="checkbox" name="showtitle" id="ts-testimonial-showtitle" value="yes" /><br />\
					<small>check it if you want to show the title.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-testimonial-showname">Show Name</label></th>\
				<td><input type="checkbox" name="showname" id="ts-testimonial-showname" value="yes" checked="checked" /><br />\
					<small>check it if you want to show the name.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-testimonial-showinfo">Show Info</label></th>\
				<td><input type="checkbox" name="showinfo" id="ts-testimonial-showinfo" value="yes" checked="checked" /><br />\
					<small>check it if you want to show the info.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ts-testimonial-showthumb">Show Thumb</label></th>\
				<td><input type="checkbox" name="showthumb" id="ts-testimonial-showthumb" value="yes" checked="checked" /><br />\
					<small>check it if you want to show the thumb image.</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="ts-testimonial-submit" class="button-primary" value="Insert Testimonial" name="submit" />\
		</p>\
		</div>');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		
		// handles the click event of the submit button
		form.find('#ts-testimonial-submit').click(function(){
			// defines the options and their default values
			// again, this is not the most elegant way to do this
			// but well, this gets the job done nonetheless
			var options = {
				'col'			: '1',
				'cat'         	: '',
				'postperpage'	: '',
				'testiid' 		: '',
				'showthumb' 	: 'yes',
				'showtitle'		: 'no',
				'showname'		: 'yes',
				'showinfo'		: 'yes',
				'customclass'	: ''
				};
			var shortcode = '[ts-testimonial';
			
			for( var index in options) {
				var inputs = table.find('#ts-testimonial-' + index);
				var value = inputs.val();
				
				// validate number of columns. it cant be higher than 4 and less than 1
				if(index=="col" && isNaN(value)){
					value = 3;
				}
				
				// attaches the attribute to the shortcode only if it's different from the default value
				if(inputs.attr("type")=='checkbox'){
					if(index=="showtitle"){
						if(inputs.attr("checked")){
							shortcode += ' ' + index + '="yes"';
						}
					}else{
						if(!inputs.attr("checked"))	
							shortcode += ' ' + index + '="no"';
					}
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