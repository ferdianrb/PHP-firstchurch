<?Php 
/*site_setting pasti selalu ada di tiap halaman*/
$data_site_setting[q] = $GLOBALS[q_];
$data_site_setting[page] = "0";
$data_site_setting[number_in_page] = "1"; /*sistem site hanya perlu 1 saja dan memang harus cuma 1*/
$data_site_setting[sort] = "ASC";
$data_site_setting[sort_value] = "site_id";
$query_site_setting = sql_select_site_setting($data_site_setting);

$meta_data_seo = "
	<meta name=\"keywords\" content=\"".antiSql2($query_site_setting[site_keyword][0])."\" />
	<meta name=\"description\" content=\"".antiSql2($query_site_setting[site_description][0]).$page_description."\" />
	<meta name=\"author\" content=\"".antiSql2($query_site_setting[site_author][0])."\" />";

if($files=="page")
{
	$nav_active[$GLOBALS[menu_url]] = "class=\"selected\"";
}
else
{
	$nav_active[$files] = "class=\"selected\"";

	if(!empty($query_site_content_title[$files."_title"][0]))
	{$page_title = " - ".antiSql2($query_site_content_title[$files."_title"][0]);}

	if(!empty($query_site_content_title[$files."_description"][0]))
	{$page_description = " - ".antiSql2($query_site_content_title[$files."_description"][0]);}
}

/*site_content_title pasti selalu ada di tiap halaman*/
$data_site_content_title[q] = $GLOBALS[q_];
$data_site_content_title[page] = "0";
$data_site_content_title[number_in_page] = "1"; /*sistem site hanya perlu 1 saja dan memang harus cuma 1*/
$data_site_content_title[sort] = "ASC";
$data_site_content_title[sort_value] = "wlcm_id";
$query_site_content_title = sql_select_site_content_title($data_site_content_title);

/*di template social selalu ada di sisi paling bawah*/
$data_social[q] = $GLOBALS[q_];
$data_social[page] = "0";
$data_social[number_in_page] = "10000000";
$data_social[sort] = "ASC";
$data_social[sort_value] = "scl_id";
$query_social = sql_select_social($data_social);

$menu_option = sql_select_menu_navigation();
for($i_menu=0;$i_menu<count($menu_option[mn_id]);$i_menu++)
{
	$active_menu = antiSql2($menu_option[mn_url][$i_menu]);
	$submenu_option = "";
	$multilayer_class = "";
	$multilayer_menu = "";

	if(count($menu_option[mn_id_ref][$i_menu])>0)
	{
		for($i_submenu=0;$i_submenu<count($menu_option[mn_id_ref][$i_menu]);$i_submenu++)
		{
			$submenu_option .= "<li><a href=\"".$GLOBALS['access_dir_path_link']."page/".antiSql2($menu_option[mn_url_ref][$i_menu][$i_submenu])."\" ".$nav_active[antiSql2($menu_option[mn_url_ref][$i_menu][$i_submenu])].">".antiSql2($menu_option[mn_name_ref][$i_menu][$i_submenu])."</a></li>";
		
			if(!empty($nav_active[antiSql2($menu_option[mn_url_ref][$i_menu][$i_submenu])]))
			{
				$active_menu = antiSql2($menu_option[mn_url_ref][$i_menu][$i_submenu]);
				$menu_option[mn_id][$i_menu] = $menu_option[mn_id_ref][$i_menu][$i_submenu];
			}
		}

		$multilayer_class = " class=\"tooltiptext\"";
		$multilayer_menu = "<ul class=\"sub_dropmenu\">".$submenu_option."</ul>";
	}

	$nav_menu .= "<div class=\"index ".$multilayer_class." homepage\">
					<a href=\"".$GLOBALS['access_dir_path_link']."page/".antiSql2($menu_option[mn_url][$i_menu])."\" ".$nav_active[$active_menu].">
						".antiSql2($menu_option[mn_name][$i_menu])."
					</a>".$multilayer_menu."
				  </div>
				  ";
	if($active_menu==$GLOBALS[menu_url])
	{
		$data_menu[q] = $GLOBALS[q_]."mn_id:".$menu_option[mn_id][$i_menu].";";
		$data_menu[page] = 0;
		$data_menu[number_in_page] = 1;
		$query_menu = sql_select_menu($data_menu);

		if(!empty($query_menu["mn_title"][0]))
		{$page_title = " - ".antiSql2($query_menu["mn_title"][0]);}

		if(!empty($query_menu["mn_description"][0]))
		{$page_description = " - ".antiSql2($query_menu["mn_description"][0]);}

		$meta_data_seo = "
			<meta name=\"keywords\" content=\"".antiSql2($query_menu[mn_seo_keywords][0])."\" />
			<meta name=\"description\" content=\"".antiSql2($query_menu[mn_seo_description][0]).$page_description."\" />
			<meta name=\"author\" content=\"".antiSql2($query_menu[mn_seo_title][0])."\" />
		";
	}
}


$header = "

<!doctype html>
<html xmlns:og=\"http://opengraphprotocol.org/schema/\" xmlns:fb=\"http://www.facebook.com/2008/fbml\" xmlns:website=\"http://ogp.me/ns/website\" lang=\"en-US\" itemscope itemtype=\"http://schema.org/WebPage\"  class=\"touch-styles\">
	<meta http-equiv=\"content-type\" content=\"text/html;charset=UTF-8\" />
	<head>
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
      <!-- This is Squarespace. --><!-- tyler-medina -->
      <base #href=\"\">
      <meta charset=\"utf-8\" />
      <title>".antiSql2($query_site_setting[site_title][0]).$page_title."</title>
      <link href=\"".$GLOBALS[admin_dir_path_src]."img_full/".antiSql2($query_site_setting[site_icon][0])."\" rel=\"shortcut icon\" type=\"image/x-icon\" />
		<link rel=\"stylesheet\" href=\"".$GLOBALS[access_dir_path_src]."/style.css\" />
      <link rel=\"canonical\" href=\"index.html\"/>
	  ".$meta_data_seo."
      <script>(function(rollups, name) { if (!rollups[name]) { rollups[name] = {}; } rollups[name].js = [\"//static.squarespace.com/universal/scripts-compressed/common-addc25a6108506f02ffc-min.js\"]; })(SQUARESPACE_ROLLUPS, 'squarespace-common');</script>
      <script crossorigin=\"anonymous\" src=\"static.squarespace.com/universal/scripts-compressed/common-addc25a6108506f02ffc-min.js\"></script><script type=\"text/javascript\" data-sqs-type=\"imageloader\">(function() {var EXCLUDED_SIZES=function(){var a=window.location.search,b=a.indexOf(\"exclude_imageloader_sizes=\");return-1<b&&(a=a.substr(b+26).split(\"&\")[0])?a.split(\",\").map(function(a){return parseInt(a,10)}):[]}(),SQUARESPACE_SIZES=[2500,1500,1E3,750,500,300,100].filter(function(a){return-1===EXCLUDED_SIZES.indexOf(a)}),IMAGE_LOADING_CLASS=\"loading\",ImageLoader=new function(){this.load=function(a,b){function d(a,b,c){var d=new Image;d.onload=b;d.onerror=c;d.src=a}a.getDOMNode&&(a=a.getDOMNode());var c=this._getDataFromNode(a,
         b),e=!(!c.dimensions||!c.dimensions.width||!c.dimensions.height),g=c.load+\"\";if(\"false\"===g)return!1;var h=c.mode;if(e&&(\"fit\"===h||\"fill\"===h)){h=a.parentNode;if(!h)return console.error(\"Not doing anything, parentNode not found.\"),!1;if(!this.refresh(a,b,h))return!1}var n=this._intendToLoad(a,c);if(\"string\"===typeof n&&\"viewport\"!==g){var m=this.getUrl(n,c),g=a.getAttribute(\"data-image-resolution\");a.getAttribute(\"src\")!==m&&this.isValidResolution(n,g)&&(a.onload=function(){a.className=a.className.replace(IMAGE_LOADING_CLASS,
         \" \").trim();a.setAttribute(\"data-image-resolution\",n)},!a.getAttribute(\"src\")&&-1===a.className.indexOf(IMAGE_LOADING_CLASS)&&(a.className+=(a.className?\" \":\"\")+IMAGE_LOADING_CLASS),!a.getAttribute(\"src\")&&e?(a.setAttribute(\"src\",m),c.useBgImage&&(a.parentNode.style.backgroundImage=\"url(\"+m+\")\")):d(m,function(){e?a.setAttribute(\"src\",m):(a.setAttribute(\"data-image-dimensions\",this.width+\"x\"+this.height),ImageLoader.load(a,b))},function(){a.className=a.className.replace(IMAGE_LOADING_CLASS,\" \").trim();
         a.setAttribute(\"src\",m)}));return!0}return n};this.refresh=function(a,b,d){a.getDOMNode&&(a=a.getDOMNode());d&&d.getDOMNode&&(d=d.getDOMNode());d=d||a.parentNode;if(!d)return console.error(\"Not doing anything, parentNode not found.\"),!1;var c=this._getDataFromNode(a,b),e=d.offsetWidth,g=d.offsetHeight;b=c.mode;if(\"none\"!==b){var h=c.dimensions.width,n=c.dimensions.height,m=h/n,q=e/g;if(c.useBgImage&&\"fill\"===b&&\"backgroundSize\"in document.documentElement.style)return a.style.display=\"none\",d.style.backgroundSize=
         \"cover\",d.style.backgroundPosition=100*c.focalPoint.x+\"% \"+100*c.focalPoint.y+\"%\",!0;if(c.fixedRatio)\"fill\"==b&&q>m||\"fit\"==b&&q<m?(k=100,l=100*(q/m),r=(100-l)*c.focalPoint.y,p=0):(k=100*(m/q),l=100,r=0,p=(100-k)*c.focalPoint.x),a.style.top=r+\"%\",a.style.left=p+\"%\",a.style.width=k+\"%\",a.style.height=l+\"%\";else{var f;\"fill\"===b?f=m>q?g/n:e/h:\"fit\"===b&&(f=m<q?g/n:e/h);!c.stretch&&\"fit\"==b&&1<f&&(f=1);var k=Math.ceil(h*f),l=Math.ceil(n*f);if(0===k||0===l)return!1;var p,r;\"fill\"===b?(p=Math.min(Math.max(e/
         2-k*c.focalPoint.x,e-k),0),r=Math.min(Math.max(g/2-l*c.focalPoint.y,g-l),0)):\"fit\"===b&&(f=c.fitAlignment,p=f.left?0:f.right?e-k:k<e?(e-k)/2:0,r=f.top?0:f.bottom?g-l:l<g?(g-l)/2:0,\"inline\"==this._getStyle(a,\"display\")&&(a.style.fontSize=\"0px\"),this._resetAlt(a,function(){k-=a.offsetHeight-a.clientHeight;l-=a.offsetWidth-a.clientWidth}));a.style.top=Math.ceil(r)+\"px\";a.style.left=Math.ceil(p)+\"px\";a.style.width=Math.ceil(k)+\"px\";a.style.height=Math.ceil(l)+\"px\"}p=this._getStyle(d,\"position\");a.style.position=
         \"relative\"==p?\"absolute\":\"relative\";if(\"fill\"==b&&(b=this._getStyle(d,\"overflow\"),!b||\"hidden\"!=b))d.style.overflow=\"hidden\";return!0}};this._intendToLoad=function(a,b){function d(c,d){\"none\"===b.mode&&(a.style.width=null,a.style.height=null);var e=parseFloat(a.getAttribute(c)),f=parseFloat(e);if(!f||isNaN(f))e=h._getStyle(a,c),f=parseFloat(e);if(!f||isNaN(f))e=h._getStyle(a,\"max-\"+c,\"max\"+(c.substr(0,1).toUpperCase()+c.substr(1))),f=parseFloat(e);if(0===d||e)switch(h._stringType(e)){case \"percentage\":d=
         parseInt(e,10)/100*g[\"offset\"+c.substr(0,1).toUpperCase()+c.substr(1)];break;case \"number\":d=parseInt(e,10)}!f&&0!==d&&!a.getAttribute(\"src\")&&(d=0);return d}b=b||this._getDataFromNode(a);if(!b.source)return!1;var c=a.offsetWidth,e=a.offsetHeight,g=a.parentNode,h=this;this._resetAlt(a,function(){c=d(\"width\",c);e=d(\"height\",e)});0===c&&0===e?(c=b.dimensions.width,e=b.dimensions.height):0===c?c=this.getDimensionForValue(\"width\",e,b):0===e&&(e=this.getDimensionForValue(\"height\",c,b));\"viewport\"===b.load&&
         (a.style.width=Math.floor(c)+\"px\",a.style.height=Math.floor(e)+\"px\");return this.getSquarespaceSize(c,e,b)};this._getDataFromNode=function(a,b){b=b||{};var d={focalPoint:{x:0.5,y:0.5},dimensions:{width:null,height:null},mode:\"none\",fitAlignment:{center:!0},load:\"true\",stretch:!0,fixedRatio:!1};if(b.focalPoint)d.focalPoint=b.focalPoint;else{var c=a.getAttribute(\"data-image-focal-point\");if(c&&(c=c.split(\",\"))&&2==c.length)d.focalPoint={x:parseFloat(c[0]),y:parseFloat(c[1])}}if(b.dimensions)d.dimensions=
         b.dimensions;else if((c=a.getAttribute(\"data-image-dimensions\"))&&(c=c.split(\"x\"))&&2==c.length)d.dimensions={width:parseInt(c[0],10),height:parseInt(c[1],10)};b.mode?d.mode=b.mode:a.parentNode&&(c=a.parentNode.className,-1!==c.indexOf(\"content-fill\")?d.mode=\"fill\":-1!==c.indexOf(\"content-fit\")&&(d.mode=\"fit\"));if(\"fit\"===d.mode&&a.parentNode&&(c=b.fitAlignment||a.getAttribute(\"data-alignment\")||a.parentNode.getAttribute(\"data-alignment\")))d.fitAlignment={top:-1!==c.indexOf(\"top\"),left:-1!==c.indexOf(\"left\"),
         center:-1!==c.indexOf(\"center\"),right:-1!==c.indexOf(\"right\"),bottom:-1!==c.indexOf(\"bottom\")};b.load?d.load=b.load:(c=a.getAttribute(\"data-load\"))&&(d.load=c);if(\"undefined\"!==typeof b.stretch)d.stretch=b.stretch;else if(c=a.getAttribute(\"data-image-stretch\"))d.stretch=\"true\"===c?!0:!1;d.source=b.source?b.source:a.getAttribute(\"data-src\");d.source&&this.isSquarespaceUrl(d.source)&&(\"http:\"===d.source.substr(0,5)&&\"https\"===window.location.protocol.substr(0,5))&&(d.source=d.source.replace(\"http://\",
         \"https:///\"));if(b.fixedRatio)d.fixedRatio=b.fixedRatio;else if(c=a.getAttribute(\"data-fixed-ratio\"))d.fixedRatio=\"true\"==c;b.useBgImage?d.useBgImage=b.useBgImage:(c=a.getAttribute(\"data-use-bg-image\"),d.useBgImage=\"true\"===c||!0===c?!0:!1);return d};this._stringType=function(a){return\"string\"===typeof a&&-1!==a.indexOf(\"%\")?\"percentage\":isNaN(parseInt(a,10))?NaN:\"number\"};this._getStyle=function(a,b,d){var c;a.currentStyle?c=a.currentStyle[d||b]:window.getComputedStyle&&(c=document.defaultView.getComputedStyle(a,
         null).getPropertyValue(b));return c};this._isVisible=function(a){a=a.getBoundingClientRect();return 0<=a.left&&0<=a.top||0<=a.bottom&&0<=a.right||0<=a.left&&0<=a.bottom||0<=a.right&&0<=a.top};this.getSquarespaceSize=function(a,b,d){a=Math.max(b/(d.dimensions.height/d.dimensions.width),a);\"undefined\"===typeof app&&\"number\"===typeof window.devicePixelRatio&&(a*=window.devicePixelRatio);for(b=1;b<SQUARESPACE_SIZES.length&&!(a>SQUARESPACE_SIZES[b]);b++);return SQUARESPACE_SIZES[b-1]+\"w\"};this.getDimensionForValue=
         function(a,b,d){var c=d.dimensions.width;d=d.dimensions.height;return\"width\"==a?c/d*b:\"height\"==a?d/c*b:NaN};this.getUrl=function(a,b){var d=b.source;return a&&(\"/\"==d[0]||this.isSquarespaceUrl(d))?(-1===d.indexOf(\"format=\"+a)&&(d=d+(-1!==d.indexOf(\"?\")?\"&\":\"?\")+\"format=\"+a),d):b.source};this.isSquarespaceUrl=function(a){return-1!==a.indexOf(\"squarespace.com\")||-1!==a.indexOf(\"squarespace.net\")||-1!==a.indexOf(\"sqsp.net\")};this.isValidResolution=function(a,b){a=parseInt(a,10);b=parseInt(b,10);return isNaN(a)||
         isNaN(b)?!0:a>b};this._resetAlt=function(a,b){var d=a.getAttribute(\"alt\"),c=d&&0<d.length&&!a.getAttribute(\"src\");if(c){var e=a.style.display;a.removeAttribute(\"alt\");a.style.display=\"none\";a.offsetHeight+0;a.style.display=e}b.call(this);c&&a.setAttribute(\"alt\",d)};this.bootstrap=function(){var a=document.images;if(0<a.length)for(var b=0,d=a.length;b<d;b++)((a[b].hasAttribute?a[b].hasAttribute(\"data-image\"):a[b].attributes[\"data-image\"])||(a[b].hasAttribute?a[b].hasAttribute(\"data-src\"):a[b].attributes[\"data-src\"]))&&
         \"false\"!==(a[b].getAttribute?a[b].getAttribute(\"data-load\"):a[b].attributes[\"data-load\"])+\"\"&&ImageLoader.load(a[b])}};window.ImageLoader=ImageLoader;window.YUI&&YUI.add(\"squarespace-imageloader\",function(a){},\"1.0\",{requires:[]});
         })();
      </script>
     
      <!--[if !IE]> -->
      <link rel=\"stylesheet\" type=\"text/css\" href=\"".$GLOBALS[access_dir_path_src]."static1.squarespace.com/static/sitecss/5665c6dd57eb8d4da90a327e/4/52a74dafe4b073a80cd253c5/56d73400f699bb41e6bf73d9/983-05142015/1483308407553/site8696.css?&amp;filterFeatures=false\"/>
      <!-- <![endif]-->
      <!-- End of Squarespace Headers -->
      <script>/* Must be below squarespace-headers */(function(){var e='ontouchstart'in window||navigator.msMaxTouchPoints;var t=document.documentElement;if(!e&&t){t.className=t.className.replace(/touch-styles/,'')}})()</script>
	</head>
	<body id=\"collection-56d7510162cd9424aa86896d\" class=\"transparent-header enable-nav-button nav-button-style-outline nav-button-corner-style-square banner-button-style-outline banner-button-corner-style-square banner-slideshow-controls-arrows meta-priority-category center-entry-title--meta  hide-list-entry-footer    hide-blog-sidebar center-navigation--info     event-thumbnails event-thumbnail-size-32-standard event-date-label event-date-label-time event-list-show-cats event-list-date event-list-time event-list-address   event-icalgcal-links  event-excerpts  event-item-back-link    gallery-design-grid aspect-ratio-auto lightbox-style-light gallery-navigation-bullets gallery-info-overlay-show-on-hover gallery-aspect-ratio-32-standard gallery-arrow-style-no-background gallery-transitions-fade gallery-show-arrows gallery-auto-crop   product-list-titles-under product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square  show-product-price show-product-item-nav product-social-sharing newsletter-style-dark  opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-outline medium-button-shape-square large-button-style-outline large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-center image-block-overlap-content-position-center image-block-overlap-text-alignment-center  image-block-collage-text-alignment-left image-block-stack-text-alignment-center button-style-solid button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light native-currency-code-usd collection-type-index collection-layout-default collection-56d7510162cd9424aa86896d homepage view-list mobile-style-available has-banner-image index-page\">
		<a href=\"#\" class=\"body-overlay\"></a>
		<div class=\"sqs-announcement-bar-dropzone\"></div>
		<div id=\"sidecarNav\">
			<div id=\"mobileNavWrapper\" class=\"nav-wrapper\" data-content-field=\"navigation-mobileNav\">
            <nav id=\"mobileNavigation\">
				<div class=\"index active homepage\">
					<a href=\"index.html\">
					Home
					</a>
				</div>
				<div class=\"collection\">
					<a href=\"new-page/index.html\">
					Service
					</a>
				</div>
				<div class=\"index\">
					<a href=\"about/index.html\">
					About
					</a>
				</div>
				<div class=\"collection\">
					<a href=\"smallgrouphome/index.html\">
					Obituaries
					</a>
				</div>
				<div class=\"index\">
					<a href=\"ministries/index.html\">
					Pre-arrangements
					</a>
				</div>
				<div class=\"collection\">
					<a href=\"fc365/index.html\">
					Grief Support
					</a>
				</div>
				<div class=\"collection\">
					<a href=\"contactus/index.html\">
					contact us
					</a>
				</div>
            </nav>
			</div>
		</div>
		<div id=\"siteWrapper\" class=\"clearfix\">
			<div class=\"sqs-cart-dropzone\"></div>
			<header id=\"header\" class=\"show-on-scroll\" data-offset-el=\".index-section\" data-offset-behavior=\"bottom\" role=\"banner\">
				<div class=\"header-inner\">
				   <div id=\"logoWrapper\" class=\"wrapper\" data-content-field=\"site-title\">
						<h1 id=\"logoImage\"><a href=\"index.html\"><img src=\"".$GLOBALS[access_dir_path_src]."img/icon.png\" alt=\"Welcome to gateway funeral service\" /></a></h1>
					</div>
				   <!--
					  -->
				   <div class=\"mobile-nav-toggle\">
					  <div class=\"top-bar\"></div>
					  <div class=\"middle-bar\"></div>
					  <div class=\"bottom-bar\"></div>
				   </div>
				   <div class=\"mobile-nav-toggle fixed-nav-toggle\">
					  <div class=\"top-bar\"></div>
					  <div class=\"middle-bar\"></div>
					  <div class=\"bottom-bar\"></div>
				   </div>
				   <!--
					  -->
				   <div id=\"headerNav\">
					  <div id=\"mainNavWrapper\" class=\"nav-wrapper\" data-content-field=\"navigation-mainNav\">
						 <nav id=\"mainNavigation\" data-content-field=\"navigation-mainNav\">
							<div class=\"index active homepage\">
							  <a href=\"".$GLOBALS[access_dir_path_link]."index.html\">
							  Home
							  </a>
							</div>
							<div class=\"collection\">
								<a href=\"new-page/index.html\">
								Service
								</a>
							</div>
							<div class=\"index\">
								<a href=\"about/index.html\">
								About
								</a>
							</div>
							<div class=\"collection\">
								<a href=\"smallgrouphome/index.html\">
								Obituaries
								</a>
							</div>
							<div class=\"index\">
								<a href=\"ministries/index.html\">
								Pre-arrangements
								</a>
							</div>
							<div class=\"collection sub_parent\">
								<a href=\"fc365/index.html\">
								Grief Support
								</a>
								<ul class=\"sub_child\">
									<li><a href=\"#\">Test</a></li>
									<li><a href=\"#\">Test</a></li>
									<li><a href=\"#\">Test</a></li>
								<ul>
							</div>
							<!-- ".$nav_menu." -->
							<div class=\"collection\">
								<a href=\"".$GLOBALS[access_dir_path_link]."contact.html\">
								contact us
								</a>
							</div>
						 </nav>
					  </div>
					  <!-- style below blocks out the mobile nav toggle only when nav is loaded -->
					  <style>.mobile-nav-toggle-label { display: inline-block !important; }</style>
				   </div>
				</div>
			</header>

";




$footer = "<div id=\"preFooter\">
            <div class=\"pre-footer-inner\">
               <div class=\"sqs-layout sqs-grid-12 columns-12\" data-layout-label=\"Pre-Footer Content\" data-type=\"block-field\" data-updated-on=\"1410292214726\" id=\"preFooterBlocks\">
                  <div class=\"row sqs-row\">
                     <div class=\"col sqs-col-12 span-12\">
                        <div class=\"sqs-block socialaccountlinks-v2-block sqs-block-socialaccountlinks-v2\" data-block-type=\"54\" id=\"block-yui_3_17_2_1_1410291973006_4664\">
                           <div class=\"sqs-block-content\">
                              <div class=\"sqs-svg-icon--outer social-icon-alignment-center social-icons-color-black social-icons-size-small social-icons-style-regular \" >
                                 <nav class=\"sqs-svg-icon--list\">
                                    <a href=\"https://twitter.com/MyFirstChurch\" target=\"_blank\" class=\"sqs-svg-icon--wrapper twitter\">
                                       <div>
                                          <svg class=\"sqs-svg-icon--social\" viewBox=\"0 0 64 64\">
                                             <use class=\"sqs-use--icon\" xlink:href=\"#twitter-icon\"></use>
                                             <use class=\"sqs-use--mask\" xlink:href=\"#twitter-mask\"></use>
                                          </svg>
                                       </div>
                                    </a>
                                    <a href=\"mailto:info@firstchurch.com\" target=\"_blank\" class=\"sqs-svg-icon--wrapper email\">
                                       <div>
                                          <svg class=\"sqs-svg-icon--social\" viewBox=\"0 0 64 64\">
                                             <use class=\"sqs-use--icon\" xlink:href=\"#email-icon\"></use>
                                             <use class=\"sqs-use--mask\" xlink:href=\"#email-mask\"></use>
                                          </svg>
                                       </div>
                                    </a>
                                    <a href=\"http://instagram.com/firstchurch\" target=\"_blank\" class=\"sqs-svg-icon--wrapper instagram\">
                                       <div>
                                          <svg class=\"sqs-svg-icon--social\" viewBox=\"0 0 64 64\">
                                             <use class=\"sqs-use--icon\" xlink:href=\"#instagram-icon\"></use>
                                             <use class=\"sqs-use--mask\" xlink:href=\"#instagram-mask\"></use>
                                          </svg>
                                       </div>
                                    </a>
                                 </nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <footer id=\"footer\" role=\"contentinfo\">
            <div class=\"footer-inner\">
               <div class=\"nav-wrapper back-to-top-nav\">
                  <nav>
                     <div class=\"back-to-top\"><a href=\"#header\">Back to Top</a></div>
                  </nav>
               </div>
               <div id=\"siteInfo\"><span class=\"site-address\">GATEWAY FUNERAL SERVICE, JAKARTA</span></div>
            </div>
         </footer>
      </div>
      <script src=\"static1.squarespace.com/static/ta/52a74d9ae4b0253945d2aee9/983/scripts/site-bundle.js\" type=\"text/javascript\"></script>
      <script type=\"text/javascript\" data-sqs-type=\"imageloader-bootstraper\">(function() {if(window.ImageLoader) { window.ImageLoader.bootstrap(); }})();</script><script>Squarespace.afterBodyLoad(Y);</script>
      <svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" style=\"display:none\">
         <symbol id=\"twitter-icon\" viewBox=\"0 0 64 64\">
            <path d=\"M48,22.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6 C41.7,19.8,40,19,38.2,19c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5c-5.5-0.3-10.3-2.9-13.5-6.9c-0.6,1-0.9,2.1-0.9,3.3 c0,2.3,1.2,4.3,2.9,5.5c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1c2.9,1.9,6.4,2.9,10.1,2.9c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C46,24.5,47.1,23.4,48,22.1z\"/>
         </symbol>
         <symbol id=\"twitter-mask\" viewBox=\"0 0 64 64\">
            <path d=\"M0,0v64h64V0H0z M44.7,25.5c0,0.3,0,0.6,0,0.8C44.7,35,38.1,45,26.1,45c-3.7,0-7.2-1.1-10.1-2.9 c0.5,0.1,1,0.1,1.6,0.1c3.1,0,5.9-1,8.2-2.8c-2.9-0.1-5.3-2-6.1-4.6c0.4,0.1,0.8,0.1,1.2,0.1c0.6,0,1.2-0.1,1.7-0.2 c-3-0.6-5.3-3.3-5.3-6.4c0,0,0-0.1,0-0.1c0.9,0.5,1.9,0.8,3,0.8c-1.8-1.2-2.9-3.2-2.9-5.5c0-1.2,0.3-2.3,0.9-3.3 c3.2,4,8.1,6.6,13.5,6.9c-0.1-0.5-0.2-1-0.2-1.5c0-3.6,2.9-6.6,6.6-6.6c1.9,0,3.6,0.8,4.8,2.1c1.5-0.3,2.9-0.8,4.2-1.6 c-0.5,1.5-1.5,2.8-2.9,3.6c1.3-0.2,2.6-0.5,3.8-1C47.1,23.4,46,24.5,44.7,25.5z\"/>
         </symbol>
         <symbol id=\"email-icon\" viewBox=\"0 0 64 64\">
            <path d=\"M17,22v20h30V22H17z M41.1,25L32,32.1L22.9,25H41.1z M20,39V26.6l12,9.3l12-9.3V39H20z\"/>
         </symbol>
         <symbol id=\"email-mask\" viewBox=\"0 0 64 64\">
            <path d=\"M41.1,25H22.9l9.1,7.1L41.1,25z M44,26.6l-12,9.3l-12-9.3V39h24V26.6z M0,0v64h64V0H0z M47,42H17V22h30V42z\"/>
         </symbol>
         <symbol id=\"instagram-icon\" viewBox=\"0 0 64 64\">
            <path d=\"M46.91,25.816c-0.073-1.597-0.326-2.687-0.697-3.641c-0.383-0.986-0.896-1.823-1.73-2.657c-0.834-0.834-1.67-1.347-2.657-1.73c-0.954-0.371-2.045-0.624-3.641-0.697C36.585,17.017,36.074,17,32,17s-4.585,0.017-6.184,0.09c-1.597,0.073-2.687,0.326-3.641,0.697c-0.986,0.383-1.823,0.896-2.657,1.73c-0.834,0.834-1.347,1.67-1.73,2.657c-0.371,0.954-0.624,2.045-0.697,3.641C17.017,27.415,17,27.926,17,32c0,4.074,0.017,4.585,0.09,6.184c0.073,1.597,0.326,2.687,0.697,3.641c0.383,0.986,0.896,1.823,1.73,2.657c0.834,0.834,1.67,1.347,2.657,1.73c0.954,0.371,2.045,0.624,3.641,0.697C27.415,46.983,27.926,47,32,47s4.585-0.017,6.184-0.09c1.597-0.073,2.687-0.326,3.641-0.697c0.986-0.383,1.823-0.896,2.657-1.73c0.834-0.834,1.347-1.67,1.73-2.657c0.371-0.954,0.624-2.045,0.697-3.641C46.983,36.585,47,36.074,47,32S46.983,27.415,46.91,25.816z M44.21,38.061c-0.067,1.462-0.311,2.257-0.516,2.785c-0.272,0.7-0.597,1.2-1.122,1.725c-0.525,0.525-1.025,0.85-1.725,1.122c-0.529,0.205-1.323,0.45-2.785,0.516c-1.581,0.072-2.056,0.087-6.061,0.087s-4.48-0.015-6.061-0.087c-1.462-0.067-2.257-0.311-2.785-0.516c-0.7-0.272-1.2-0.597-1.725-1.122c-0.525-0.525-0.85-1.025-1.122-1.725c-0.205-0.529-0.45-1.323-0.516-2.785c-0.072-1.582-0.087-2.056-0.087-6.061s0.015-4.48,0.087-6.061c0.067-1.462,0.311-2.257,0.516-2.785c0.272-0.7,0.597-1.2,1.122-1.725c0.525-0.525,1.025-0.85,1.725-1.122c0.529-0.205,1.323-0.45,2.785-0.516c1.582-0.072,2.056-0.087,6.061-0.087s4.48,0.015,6.061,0.087c1.462,0.067,2.257,0.311,2.785,0.516c0.7,0.272,1.2,0.597,1.725,1.122c0.525,0.525,0.85,1.025,1.122,1.725c0.205,0.529,0.45,1.323,0.516,2.785c0.072,1.582,0.087,2.056,0.087,6.061S44.282,36.48,44.21,38.061z M32,24.297c-4.254,0-7.703,3.449-7.703,7.703c0,4.254,3.449,7.703,7.703,7.703c4.254,0,7.703-3.449,7.703-7.703C39.703,27.746,36.254,24.297,32,24.297z M32,37c-2.761,0-5-2.239-5-5c0-2.761,2.239-5,5-5s5,2.239,5,5C37,34.761,34.761,37,32,37z M40.007,22.193c-0.994,0-1.8,0.806-1.8,1.8c0,0.994,0.806,1.8,1.8,1.8c0.994,0,1.8-0.806,1.8-1.8C41.807,22.999,41.001,22.193,40.007,22.193z\"/>
         </symbol>
         <symbol id=\"instagram-mask\" viewBox=\"0 0 64 64\">
            <path d=\"M43.693,23.153c-0.272-0.7-0.597-1.2-1.122-1.725c-0.525-0.525-1.025-0.85-1.725-1.122c-0.529-0.205-1.323-0.45-2.785-0.517c-1.582-0.072-2.056-0.087-6.061-0.087s-4.48,0.015-6.061,0.087c-1.462,0.067-2.257,0.311-2.785,0.517c-0.7,0.272-1.2,0.597-1.725,1.122c-0.525,0.525-0.85,1.025-1.122,1.725c-0.205,0.529-0.45,1.323-0.516,2.785c-0.072,1.582-0.087,2.056-0.087,6.061s0.015,4.48,0.087,6.061c0.067,1.462,0.311,2.257,0.516,2.785c0.272,0.7,0.597,1.2,1.122,1.725s1.025,0.85,1.725,1.122c0.529,0.205,1.323,0.45,2.785,0.516c1.581,0.072,2.056,0.087,6.061,0.087s4.48-0.015,6.061-0.087c1.462-0.067,2.257-0.311,2.785-0.516c0.7-0.272,1.2-0.597,1.725-1.122s0.85-1.025,1.122-1.725c0.205-0.529,0.45-1.323,0.516-2.785c0.072-1.582,0.087-2.056,0.087-6.061s-0.015-4.48-0.087-6.061C44.143,24.476,43.899,23.682,43.693,23.153z M32,39.703c-4.254,0-7.703-3.449-7.703-7.703s3.449-7.703,7.703-7.703s7.703,3.449,7.703,7.703S36.254,39.703,32,39.703z M40.007,25.793c-0.994,0-1.8-0.806-1.8-1.8c0-0.994,0.806-1.8,1.8-1.8c0.994,0,1.8,0.806,1.8,1.8C41.807,24.987,41.001,25.793,40.007,25.793z M0,0v64h64V0H0z M46.91,38.184c-0.073,1.597-0.326,2.687-0.697,3.641c-0.383,0.986-0.896,1.823-1.73,2.657c-0.834,0.834-1.67,1.347-2.657,1.73c-0.954,0.371-2.044,0.624-3.641,0.697C36.585,46.983,36.074,47,32,47s-4.585-0.017-6.184-0.09c-1.597-0.073-2.687-0.326-3.641-0.697c-0.986-0.383-1.823-0.896-2.657-1.73c-0.834-0.834-1.347-1.67-1.73-2.657c-0.371-0.954-0.624-2.044-0.697-3.641C17.017,36.585,17,36.074,17,32c0-4.074,0.017-4.585,0.09-6.185c0.073-1.597,0.326-2.687,0.697-3.641c0.383-0.986,0.896-1.823,1.73-2.657c0.834-0.834,1.67-1.347,2.657-1.73c0.954-0.371,2.045-0.624,3.641-0.697C27.415,17.017,27.926,17,32,17s4.585,0.017,6.184,0.09c1.597,0.073,2.687,0.326,3.641,0.697c0.986,0.383,1.823,0.896,2.657,1.73c0.834,0.834,1.347,1.67,1.73,2.657c0.371,0.954,0.624,2.044,0.697,3.641C46.983,27.415,47,27.926,47,32C47,36.074,46.983,36.585,46.91,38.184z M32,27c-2.761,0-5,2.239-5,5s2.239,5,5,5s5-2.239,5-5S34.761,27,32,27z\"/>
         </symbol>
      </svg>
   </body>
   <!-- Mirrored from www.firstchurch.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Feb 2017 03:10:19 GMT -->
</html>";
?>
