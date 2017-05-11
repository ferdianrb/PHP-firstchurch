<?php

$data_home_service[q] = $GLOBALS[q_];
$data_home_service[page] = "0";
$data_home_service[number_in_page] = "3"; /*di template hanya boleh ada 3 saja*/
$data_home_service[sort] = "ASC";
$data_home_service[sort_value] = "srvc_id";
$query_home_service = sql_select_home_service($data_home_service);

$service = "";
for($i=0;$i<count($query_home_service[srvc_id]);$i++)
{
	if($i=="2")
	{$class_end = "no_margin_righ";}
	else
	{$class_end = "";}

	$service .= "
    	<div class=\"col sqs-col-4 span-4\">
            <div class=\"sqs-block image-block sqs-block-image\" data-block-type=\"5\" id=\"block-715201e0ebd2ec391522\">
                <div class=\"sqs-block-content\">
                    <div class=\"image-block-outer-wrapper layout-caption-below design-layout-inline\">
                        <div class=\"intrinsic\" style=\"max-width:750.0px;\">
                            <a href=\"".$GLOBALS[access_dir_path_link]."portfolio.html\" >
                                <div style=\"padding-bottom:100.0%;\" class=\"image-block-wrapper   has-aspect-ratio\" data-description=\"\" >
                                       <img class=\"thumb-image\" src=\"".$GLOBALS['admin_dir_path_src']."img_full/".antiSql2($query_home_service[srvc_image][$i])."\" title=\"".antiSql2($query_home_service[srvc_title][$i])."\" alt=\"".antiSql2($query_home_service[srvc_title][$i])."\">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"sqs-block html-block sqs-block-html\" data-block-type=\"2\" id=\"block-yui_3_17_2_1_1412379595434_26226\">
                <div class=\"sqs-block-content\">
                    <h3 class=\"text-align-center\"><strong>".antiSql2($query_home_service[srvc_title][$i])."</strong></h3>
                    <p class=\"text-align-center\">".antiSql2($query_home_service[srvc_description][$i])."</p>
                </div>
            </div>
            <div class=\"sqs-block button-block sqs-block-button\" data-block-type=\"53\" id=\"block-yui_3_17_2_10_1457631811065_10734\">
                <div class=\"sqs-block-content\">
                    <div class=\"sqs-block-button-container--center\">
                        <a href=\"ministries.html\" class=\"sqs-block-button-element--medium sqs-block-button-element\" >Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    ";
}

$content = "

	<!-- -->
            <div id=\"content\" class=\"main-content\" data-content-field=\"main-content\" data-collection-id=\"56d7510162cd9424aa86896d\" >
               <!-- Create index sections -->
               <div id=\"intro\" class=\"index-section\" data-url-id=\"intro\" data-collection-id=\"56d73411f699bb41e6bf7494\" data-edit-main-image=\"Banner\">
                  <div class=\"promoted-gallery-wrapper\"></div>
                  <div class=\"banner-thumbnail-wrapper has-description\" data-content-field=\"main-image\">
                     <div class=\"color-overlay\"></div>
                     <figure id=\"thumbnail\" class=\"loading content-fill\">
						<!-- <img data-src=\"".$GLOBALS[admin_dir_path_src]."https://static1.squarespace.com/static/5665c6dd57eb8d4da90a327e/t/56d75312356fb0d6f3fc40c6/1456952091659/IMG_0402-2.jpg\" data-image=\"https://static1.squarespace.com/static/5665c6dd57eb8d4da90a327e/t/56d75312356fb0d6f3fc40c6/1456952091659/IMG_0402-2.jpg\" data-image-dimensions=\"5760x3840\" data-image-focal-point=\"0.5,0.5\" alt=\"IMG_0402-2.jpg\"  /> -->
						<img src=\"".$GLOBALS[access_dir_path_src]."img/1.png\" alt=\"IMG_0402-2.jpg\" style=\"height: 1025px; width: 1356px;\" />
					</figure>
						<div class=\"desc-wrapper\" data-content-field=\"description\">
						<p><strong>GATEWAY FUNERAL SERVICE</strong></p>
					</div>
                  </div>
                  <div class=\"index-section-wrapper page-content\">
                     <div class=\"content-inner has-content\" data-content-field=\"main-content\">
                        <div class=\"sqs-layout sqs-grid-12 columns-12\" data-type=\"page\" data-updated-on=\"1477345709564\" id=\"page-56d73411f699bb41e6bf7494\">
                           <div class=\"row sqs-row\">
                              <div class=\"col sqs-col-12 span-3\">
                                 <div class=\"sqs-block html-block sqs-block-html\" data-block-type=\"2\" id=\"block-yui_3_17_2_2_1457634098099_17462\">
                                    <div class=\"sqs-block-content\">
                                       <h1 class=\"text-align-center\"><strong>OUR SERVICE</strong></h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=\"row sqs-row\">
								$service
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
    <!---->
";

?>