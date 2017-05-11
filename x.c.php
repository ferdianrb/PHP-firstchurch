<?php

$data_contact[q] = $GLOBALS[q_];
$data_contact[page] = "0";
$data_contact[number_in_page] = "1";
$data_contact[sort] = "ASC";
$data_contact[sort_value] = "contact_id";
$query_contact = sql_select_contact($data_contact);

$return = sql_create_user_inbox($data);

$content = message_pop($return,$data)."

        <div id=\"promotedGalleryWrapper\" class=\"sqs-layout promoted-gallery-wrapper\">
            <div class=\"row\">
               <div class=\"col\"></div>
            </div>
        </div>
        <div class=\"banner-thumbnail-wrapper has-description\" data-content-field=\"main-image\" data-collection-id=\"56d74a821d07c0ad6dd89221\" data-edit-main-image=\"Banner\" data-annotation-alignment=\"bottom left\">
            <div class=\"color-overlay\"></div>
            <figure id=\"thumbnail\" class=\"loading content-fill\">
               <img data-src=\"https://static1.squarespace.com/static/5665c6dd57eb8d4da90a327e/t/56d89b0260b5e98d71e23bf8/1457036035881/14598460768_c0dc6cb40b_k.jpg\" data-image=\"https://static1.squarespace.com/static/5665c6dd57eb8d4da90a327e/t/56d89b0260b5e98d71e23bf8/1457036035881/14598460768_c0dc6cb40b_k.jpg\" data-image-dimensions=\"2048x1365\" data-image-focal-point=\"0.5,0.5\" alt=\"14598460768_c0dc6cb40b_k.jpg\"  />
            </figure>
            <div class=\"desc-wrapper\" data-collection-id=\"56d74a821d07c0ad6dd89221\">
               <p><strong>CONTACT US</strong></p>
               <p>We are always here for you!</p>
            </div>
        </div>
		
        <main id=\"page\" role=\"main\">
		
			<br /><br /><br />
            <!-- -->
            <div id=\"content\" class=\"main-content\" data-content-field=\"main-content\" data-collection-id=\"56d74a821d07c0ad6dd89221\" data-edit-main-image=\"Banner\">
				<div class=\"sqs-layout sqs-grid-12 columns-12\" data-type=\"page\" data-updated-on=\"1457642298578\" id=\"page-56d74a821d07c0ad6dd89221\">
					<div class=\"row sqs-row\">
						<div class=\"col sqs-col-12 span-12\">
							<div class=\"sqs-block html-block sqs-block-html\" data-block-type=\"2\" id=\"block-67735813c10b4ab9d4ec\">
								<div class=\"sqs-block-content\">
									<h3 class=\"text-align-center\">Give us a call or email us for enquiries</h3>
									<p class=\"text-align-center\"><strong>For urgent help, call our 24 hr helpline.</strong></p>
									<p class=\"text-align-center\"><strong>PHONE: </strong>(021) 123-4567</p>
									<p class=\"text-align-center\"><strong>ADDRESS: </strong>Bintaro, Jakarta Selatan</p>
							   </div>
							</div>
							<div class=\"sqs-block form-block sqs-block-form\" data-block-type=\"9\" id=\"block-c6c3f16c4d181d8c89e1\">
								<div class=\"sqs-block-content\">
									<div class=\"lightbox-handle-wrapper lightbox-handle-wrapper--align-center\">
										<span class=\"lightbox-handle sqs-system-button sqs-editable-button\">
										Contact Us
										</span>
									</div>
									<div class=\"form-wrapper hidden\" >
										<div class=\"form-title\">Contact</div>
										<div class=\"form-inner-wrapper\">
											<form autocomplete=\"on\" action=\"https://tyler-medina.squarespace.com/\" method=\"POST\" onsubmit=\"
											   return (function(form) {
											   Y.use('squarespace-form-submit', 'node', function(Y){
											   (new Y.Squarespace.FormSubmit({
											   formNode: Y.Node(form)
											   })).submit('56d74a821d07c0ad6dd89220', '56d74a821d07c0ad6dd89221', 'page-56d74a821d07c0ad6dd89221');
											   });
											   return false;
											   })(this)\">
												<div class=\"field-list clear\">
													<fieldset id=\"name-yui_3_17_2_1_1414002530266_18372\" class=\"form-item fields name required\">
														<div class=\"title\">Name <span class=\"required\">*</span></div>
														<legend>Name</legend>
														<div class=\"field first-name\">
															<label class=\"caption\"><input class=\"field-element field-control\" name=\"fname\"
																x-autocompletetype=\"given-name\" type=\"text\"
																spellcheck=\"false\"
																maxlength=\"30\"
																data-title=\"First\" />
																First Name
															</label>
														</div>
														<div class=\"field last-name\">
															<label class=\"caption\"><input class=\"field-element field-control\" name=\"lname\"
																x-autocompletetype=\"surname\" type=\"text\"
																spellcheck=\"false\" maxlength=\"30\" data-title=\"Last\" />
																Last Name
															</label>
														</div>
													</fieldset>
													<div id=\"email-yui_3_17_2_1_1414002530266_18699\" class=\"form-item field email required\">
														<label class=\"title\" for=\"email-yui_3_17_2_1_1414002530266_18699-field\">Email Address <span class=\"required\">*</span></label>
														<input class=\"field-element\" name=\"email\" x-autocompletetype=\"email\" type=\"text\" spellcheck=\"false\" id=\"email-yui_3_17_2_1_1414002530266_18699-field\" />
													</div>
													<div id=\"text-yui_3_17_2_1_1414002530266_19109\" class=\"form-item field text required\">
														<label class=\"title\" for=\"text-yui_3_17_2_1_1414002530266_19109-field\">Subject <span class=\"required\">*</span></label>
														<input class=\"field-element text\" type=\"text\" id=\"text-yui_3_17_2_1_1414002530266_19109-field\" />
													</div>
													<div id=\"textarea-yui_3_17_2_1_1414002530266_19519\" class=\"form-item field textarea required\">
														<label class=\"title\" for=\"textarea-yui_3_17_2_1_1414002530266_19519-field\">Message <span class=\"required\">*</span></label>
														<textarea class=\"field-element \" id=\"textarea-yui_3_17_2_1_1414002530266_19519-field\" ></textarea>
													</div>
												</div>
												<div class=\"form-button-wrapper form-button-wrapper--align-center\">
													<input class=\"button sqs-system-button sqs-editable-button\" type=\"submit\" value=\"Submit\"/>
												</div>
												<div class=\"hidden form-submission-text\">Thank you!</div>
												<div class=\"hidden form-submission-html\" data-submission-html=\"\"></div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class=\"sqs-block map-block sqs-block-map sized vsize-12\" data-block-json=\"&#123;&quot;location&quot;:&#123;&quot;addressTitle&quot;:&quot;First Church of Pearland&quot;,&quot;addressLine1&quot;:&quot;1850 East Broadway Street&quot;,&quot;addressLine2&quot;:&quot;Pearland, TX, 77581&quot;,&quot;addressCountry&quot;:&quot;United States&quot;,&quot;markerLat&quot;:29.5477508,&quot;markerLng&quot;:-95.23950660000003,&quot;mapLat&quot;:29.685344679811653,&quot;mapLng&quot;:-95.42816245327153,&quot;mapZoom&quot;:10&#125;,&quot;vSize&quot;:12,&quot;hSize&quot;:null,&quot;floatDir&quot;:null,&quot;style&quot;:1,&quot;labels&quot;:true,&quot;terrain&quot;:false,&quot;controls&quot;:true&#125;\" data-block-type=\"4\" id=\"block-yui_3_17_2_1_1414002530266_7650\">
								<div class=\"sqs-block-content\">&nbsp;</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <!-- -->
";

?>