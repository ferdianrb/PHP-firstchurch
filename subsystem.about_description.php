<?php

$data_about_description[q] = $GLOBALS[q_].$GLOBALS[q_2];
$data_about_description[page] = "0";
$data_about_description[number_in_page] = "1"; /*about hanya perlu 1 saja dan memang harus cuma 1*/
$data_about_description[sort] = "ASC";
$data_about_description[sort_value] = "abt_id";
$query_about_description = sql_select_about_description($data_about_description);

$data_about_testimonial[q] = $GLOBALS[q_];
$data_about_testimonial[page] = "0";
$data_about_testimonial[number_in_page] = "1";
$data_about_testimonial[sort] = "DESC";
$data_about_testimonial[sort_value] = "abt_testi_id";
$query_about_testimonial = sql_select_about_testimonial($data_about_testimonial);

$content = "<main id=\"page\" role=\"main\">
<!--
   --><!--
   -->
<div id=\"content\" class=\"main-content\" data-content-field=\"main-content\" data-collection-id=\"56d86e34ab48de3fe2abaaf2\" >
   <!-- Create index sections -->
   <div id=\"whoweare\" class=\"index-section\" data-url-id=\"whoweare\" data-collection-id=\"56d86e56ab48de3fe2abac0f\" data-edit-main-image=\"Banner\">
	  <div class=\"promoted-gallery-wrapper\"></div>
	  <div class=\"banner-thumbnail-wrapper has-description\" data-content-field=\"main-image\">
		 <div class=\"color-overlay\"></div>
		 <figure id=\"thumbnail\" class=\"loading content-fill\">
			<img data-src=\"".$GLOBALS[access_dir_path_src]."img/2.jpg\" data-image=\"https://static1.squarespace.com/static/5665c6dd57eb8d4da90a327e/t/56d8768af8baf3155c312c0c/1457026710513/IMG_0426.jpg\" data-image-dimensions=\"5760x3840\" data-image-focal-point=\"0.5,0.5\" alt=\"IMG_0426.jpg\"  />
		 </figure>
		 <div class=\"desc-wrapper\" data-content-field=\"description\">
			<p><strong>LEAVING WITH DIGNITY</strong></p>
		 </div>
	  </div>
	  <div class=\"index-section-wrapper page-content\">
		 <div class=\"content-inner has-content\" data-content-field=\"main-content\">
			<div class=\"sqs-layout sqs-grid-12 columns-12\" data-type=\"page\" data-updated-on=\"1457641904982\" id=\"page-56d86e56ab48de3fe2abac0f\">
			   <div class=\"row sqs-row\">
				  <div class=\"col sqs-col-12 span-12\">
					 <div class=\"sqs-block html-block sqs-block-html\" data-block-type=\"2\" id=\"block-f37e735f53e3de2e08d1\">
						<div class=\"sqs-block-content\">
						   <h2 class=\"text-align-center\">Gateway Funeral Services is a household brand for the past 20 years, providing affordable funeral services to the people. The company continues to provide traditional funerals for customers and at the same time, has increased its portfolio of funeral set ups to cater bespoke and elegant funerals.</h2>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
   <div id=\"leaders\" class=\"index-section\" data-url-id=\"leaders\" data-collection-id=\"56d86e64ab48de3fe2abacc7\" data-edit-main-image=\"Banner\">
	  <div class=\"promoted-gallery-wrapper\"></div>
	  <div class=\"banner-thumbnail-wrapper has-description\" data-content-field=\"main-image\">
		 <div class=\"color-overlay\"></div>
		 <figure id=\"thumbnail\" class=\"loading content-fill\">
			<img data-src=\"".$GLOBALS[access_dir_path_src]."img/3.jpg\" data-image=\"https://static1.squarespace.com/static/5665c6dd57eb8d4da90a327e/t/56e096a086db4325354dcb49/1457559208893/First+Church+Staff+85+PS.jpg\" data-image-dimensions=\"4288x2848\" data-image-focal-point=\"0.5,0.5\" alt=\"First Church Staff 85 PS.jpg\"  />
		 </figure>
		 <div class=\"desc-wrapper\" data-content-field=\"description\">
			<p><strong>TOTAL PEACE OF MIND</strong></p>
		 </div>
	  </div>
	  <div class=\"index-section-wrapper page-content\">
		 <div class=\"content-inner has-content\" data-content-field=\"main-content\">
			<div class=\"sqs-layout sqs-grid-12 columns-12\" data-type=\"page\" data-updated-on=\"1458077949560\" id=\"page-56d86e64ab48de3fe2abacc7\">
			   <div class=\"row sqs-row\">
				  <div class=\"col sqs-col-12 span-12\">
					 <div class=\"sqs-block html-block sqs-block-html\" data-block-type=\"2\" id=\"block-195ac8ffe8b032ba0f5b\">
						<div class=\"sqs-block-content\">
						   <h2 class=\"text-align-center\">In Gateway Funeral Services, we believe that every one deserves a dignified send-off. With the union of tradition and modern services, we will provide you with the best.Every staff is drilled with the company’s standard operating protocol that was crafted from the best funeral practices.</h2>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
</div>
<!--
   -->
</main>
";
?>