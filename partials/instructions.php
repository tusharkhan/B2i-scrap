<div class="wrap">
<style>
	html {  scroll-behavior: smooth; }
	body,p,td,th,div,span{font-family:arial; text-align:left; /*font-size:18px;*/}
	.b2i-instructions { margin-left:20px; background-color:#FFFFFF;}
	.b2i-instructions td { padding:3px;}
	.b2i-instructions th { padding:8px;}

	.b2iColorSample { border: 1px solid #FFFFFF; }
	.SeperationRow { cursor:pointer;  background-color:#999999;}
	.SectionHeader {font-size:18px; font-weight:500; padding:5px;color:#fff;}
	.PluginName { font-size:22px; font-weight:bold; padding: 25px 25px 25px 0px; line-height:35px;}

	.PluginTitle { padding:15px 20px; margin-top:20px; margin-bottom:0px; background-color:#e8e8e8; border-left:4px transparent solid;}
	.PluginTitle:hover {background-color:#ddd; cursor:pointer; border-left:4px #006799 solid;}

	.PluginInfoContainer { padding:15px; background-color:#fff;}
	.DataTable { border:collapse;}
	.DataTable {border:1px solid #333;}
	.DataTable td {border-bottom:1px solid #333;}

	tr:hover { background-color: #d8edff; }
	tr.ParentToTable:hover { background-color: #FFFFFF; }

	.toclink { float:right;}
	td.SubSection{ font-weight:bold; padding-top:30px!important;}
	.b2iAttribute { vertical-align: top;}
	h3{color:#0085ba;}
	.SectionContainer, .PluginInfoContainer{display:none;}

	.PluginTitle.active{background-color:#ddd; border-left:4px #006799 solid;}
	.PluginInfoContainer.active{border: 1px solid #e8e8e8;}

	#wpfooter{display:none;}

	#topbutton {
		display: none; /* Hidden by default */
		position: fixed; /* Fixed/sticky position */
		bottom: 75px; /* Place the button at the bottom of the page */
		right: 30px; /* Place the button 30px from the right */
		z-index: 99; /* Make sure it does not overlap */
		border: none; /* Remove borders */
		outline: none; /* Remove outline */
		background-color: red; /* Set a background color */
		color: white; /* Text color */
		cursor: pointer; /* Add a mouse pointer on hover */
		padding: 15px; /* Some padding */
		border-radius: 10px; /* Rounded corners */
		font-size: 18px; /* Increase font size */
	}

	#topbutton:hover {
		background-color: #555; /* Add a dark-grey background on hover */
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">

//$(document).on('click','.PluginTitle',function(){
//       $(this).next('div').toggle();
//	   $(this).toggleClass("active");
       //$(this).closest('table').find('tfoot').toggle();
//    });

if (window.addEventListener){
  window.addEventListener('load', OnLoadFunction, false);
}else if (window.attachEvent){
  window.attachEvent('onload', OnLoadFunction);
}


function OnLoadFunction(){
	AttachClickEventHandler();
	gototopbutton = document.getElementById("topbutton");
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};
}


function AttachClickEventHandler(){
	var PluginContainers = document.querySelectorAll('.PluginTitle');
		for (var i = 0; i < PluginContainers.length; i++) {
		PluginContainers[i].addEventListener('click', function(event) {
			//if (!confirm("sure u want to delete " + this.title)) {event.preventDefault();}
			ShowSection(this);
		});
	}
}


function ShowSection(obj){
	var sID = obj.id;
	var oSectionTitle=document.getElementById(sID);
	if (!oSectionTitle.classList.contains('active')) {
        oSectionTitle.classList.add('active');
        // alert("remove faq display!");
    }else{
        oSectionTitle.classList.remove('active');
	}
	
	var sSib = sID.replace("Title", "");
	var oSection=document.getElementById(sSib);
	if (oSection.style.display == "block") {
		oSection.style.display = "none";
	} else {
		oSection.style.display = "block";
	}
	
	if (!oSection.classList.contains('active')) {
        oSection.classList.add('active');
        // alert("remove faq display!");
    }else{
        oSection.classList.remove('active');
	}
	//var topPos = oSection.offsetTop;
	//document.getElementById(sID).scrollTop = topPos;
	
}


function ShowSection2(sID){
	if(sID!=''){
		var oSection=document.getElementById(sID);
		if (oSection.style.display == "block") {
			//oSection.style.display = "none";
		} else {
			oSection.style.display = "block";
		}
		
		if (!oSection.classList.contains('active')) {
			oSection.classList.add('active');
			// alert("remove faq display!");
		}
		
		var oSectionTitle=document.getElementById(sID +'Title');
		if (!oSectionTitle.classList.contains('active')) {
			oSectionTitle.classList.add('active');
			// alert("remove faq display!");
		}
		
		scrollTo(sID);
	}
}


function scrollTo(sID) {
	var sTitleItem = sID + 'Title';
	//alert(sTitleItem);
	
	/*
	var yOffset = -10; 
	var sElement = document.getElementById(sTitleItem);
	
	alert(sElement);
	
	var y = sElement.getBoundingClientRect().top + window.pageYOffset + yOffset;
	window.scrollTo({top: y, behavior: 'smooth'});
*/
	var oTitle = document.getElementById(sTitleItem);
	oTitle.scrollIntoView({ behavior: 'smooth', block: 'center' });

/*
	document.getElementById(sID).scrollIntoView(true);
	var oContain = document.getElementById(sID);
	oContain.classList.toggle("active");
	var oID = document.getElementById(sID);
	oID.style.maxHeight = oID.scrollHeight + "px";
*/

}


function ShowSection3(sID){
	var oSection=document.getElementById(sID);
	if (oSection.style.display == "block") {
		oSection.style.display = "none";
	} else {
		oSection.style.display = "block";
	}
	if (!oSection.classList.contains('active')) {
        oSection.classList.add('active');
    }
}


function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		gototopbutton.style.display = "block";
	} else {
		gototopbutton.style.display = "none";
	}
}


// When the user clicks on the button, scroll to the top of the document
function pagetop() {
	
	var oTitle = document.getElementById('toc');
	oTitle.scrollIntoView({ behavior: 'smooth', block: 'center' });
	
//	document.body.scrollTop = 200; // For Safari
//	document.documentElement.scrollTop = 200; // For Chrome, Firefox, IE and Opera
}
	
	
</script>
All ShortCodes and Customization Options / Parameters can be found below.<br>
<hr>

<form name="form1">	
	<div>
		<p id="TrialHeader" class="SectionHeader"><a href="javascript:ShowSection3('TrialText');"><h3>Want to give it a test drive before licensing?</h3></a></p>
		<div id="TrialText" class="SectionContainer">
		To begin using our Investor tools plugin, enter the following credentials:<br>
		Business ID: 2626<br>
		API Key: Sf6Ic9Gy8<br>
		Post key: this is a private key to allow automated posting into WordPress. We walk you through this and conduct a test post to verify connectivity.<br>
		Stock Symbol: OCC <br>The symbol is used in the stock detail, charts, and historical ShortCodes<br>
		<br>
		<a href="https://www.b2itech.com/Contact_Us" target="_blank">Contact us</a> to begin using data on your website today.<br>
		
		We will conduct a walk through of our "Live View" website, offer client links for implementation ideas, and provide pricing for your taylored solution.
		</div>
		
		<p id="ExampleHeader" class="SectionHeader"><a href="javascript:ShowSection3('ExampleText');"><h3>Examples of Shortcodes and Attribute usage</h3></a></p>
		<div id="ExampleText" class="SectionContainer">
		<p>Examples are only functional once we activate your data or you request a test/trial Business ID and key.</p>
		<p>We have created a Live View site with deeper understanding of using our plugin modules, parameters with shortcodes and raw API calls.<br>
		<a href="https://demo.b2itech.com/" target="_blank">Live View</a></p>
		
		Following are some Basic examples of shortcode and attribute usage:<br>
		<p>SEC Layout=1(Table), Count 4, Filings Type=10-K, ShowForm=0(Off), ShowHeader=0(Off), Navigation=0(Off):<br><code>[b2i_sec lo="1" c="4" t="10-K" sf="0" sh="0" n="0"]</code></p>
		<p>SEC Layout=3(Single SEC filing), Count 1, Filings Type=10-K, ShowForm=0(Off), Navigation=0(Off):<br><code>[b2i_sec lo="3" c="1" t="10-Konly" sf="0" n="0"]</code></p>
		<p>Press Release count 5, tools active (year and search), body excerpt of 400 characters<br>
		<code>[b2i_press_releases group="65" c="5" tl="1" su="400"]</code></p>
		<p>Stock Quote custom div name and format 6<br><code>[b2i_stock s="EAT"  sd="NYSE : Brinker | EAT" sdiv="QuoteDivTop" f="6"]</code></p>
		<p>Stock Chart 3 month default period, chart area color: 1763A9, fill alpha:0 so no fill, cursor color: 1763A9 <br><code>[b2i_chart  sd="NYSE : Brinker | EAT" p="3m" c="1763A9" fa="0" cc="1763A9"]</code></p>
		</div>
	
		<p id="GuidanceHeader" class="SectionHeader"><a href="javascript:ShowSection3('GuidanceText');"><h3>Quick Guidance for implementation</h3></a></p>
		<div id="GuidanceText" class="SectionContainer">
			<p>Each module can have parameters/attributes stacked and order does not matter. Ex. [b2i_sec c="10" sf="1" n="1" sg="1"]<br>
			Each module creates it's own Div container (with an ID) to load the content.<br>
			To customize styles, address each instance with CSS using the ID.<br>
			When using multiple instances of a module on a page, give each instance a unique sdiv value, which will be set as the ID of the Div container.<br>
			Individualize each instance by addressing CSS with the unique Div ID.<br><br>
			We are here to support you by phone, email, Skype, Zoom or web chat, and can launch a screen share and offer one-on-one guidance.<br>We understand the need for strong support and stand completely behind our products and services.<br>Don't forget, we offer installation, styling and maintenance services.</p><br><hr>
		</div>
	</div>
	
	<br><br>
	<hr>
	<br>
	<div>
		<p><h3 id="toc">ShortCode Table of Contents - TOC<a name="toc" class="HashTag"></a></h3></p>
		<table>
			<tr>
				<td>
					<select class="B2iSelect" name="pluginselect" onchange="ShowSection2(this.options[this.selectedIndex].value);" style="font-size:21px; font-weight:500; padding:10px; height:50px;">
						<option value="" selected>- Automated Tools -</option>
						<option value="SEC">SEC Filings</option>
						<option value="Financials">Financials / Fundamentals</option>
						<option value="PR">Press Releases</option>
						<option value="PRV">Press Release Viewer</option>
						<option value="Email">Email Alerts Opt-In</option>
						<option value="stockdetail">Stock Detail Quote</option>
						<option value="StockChart">Stock Chart</option>
						<option value="Historical">Stock Historical Quote</option>
						<option value="Dividends">Dividends</option>
						<!-- <option value="Insider">Insider Holders</option>
						<option value="Institutional">Institutional Holders</option> -->
						<option value="Contact">Contact-us Form</option>
						<option value="Request">Information Request</option>
						<option value="QuoteDetail">Quote Detail JSON</option>
					</select>
				</td>
				<td>
					<select class="B2iSelect" name="pluginselect2" onchange="ShowSection2(this.options[this.selectedIndex].value);" style="font-size:21px; font-weight:500; padding:10px; height:50px;">
						<option value="" selected>- Portal Driven Tools -</option>
						<option value="Events">Events Calendar</option>
						<option value="EventViewer">Event Viewer</option>
						<option value="Management">Management</option>
						<option value="Directors">Directors</option>
						<option value="Committee">Committees</option>
						<option value="Documents">Document Lists</option>
						<option value="Code">Banner Messages / Custom Code</option>
						<option value="Page">Quarterly Filings / Multi-Section Downloads</option>
						<option value="Analyst">Analyst</option>
					</select>
						<!-- <option value="Profile">Investor Profile</option> -->
				</td>
			</tr>
		</table>
	</div>
	
	
	<a onclick="pagetop()" id="topbutton" title="Go to top">TOC</a>
	<!-- Start Modules -->
	
	<!-- SEC -->
	<div id="SECTitle" class="PluginTitle">
		<span class="PluginName">SEC Filings<a name="SEC" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="SEC" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_sec] - <a href="https://demo.b2itech.com/sec2/" target="Demo">Live View</a>
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">sdiv</td><td>ID of the Div container to write content inside, default: sdiv="SecDiv" when using multiple instances on the same page, set unique sdiv for each. The target CSS with the ID</td></tr>
				
				<tr><td class="b2iAttribute">ol</td><td>Open Links: ol="1" for new tab, ol="2" for new window, ol="3" for floating div - EX. [b2i_sec ol="2"]</td></tr>
				<tr><td class="b2iAttribute">oi</td><td>Open Icons: oi="1" for new tab, oi="2" for new window, oi="3" for floating div - EX. [b2i_sec ol="2" oi="2"]</td></tr>
				<tr><td class="b2iAttribute">lo</td><td>Layout: default table, lo="2" for Div output, lo="3" for Single Filing View - EX. [b2i_sec lo="2"]</td></tr>
				<tr><td class="b2iAttribute">c</td><td>Count of filings per page, default c="20" - EX. [b2i_sec c="3" t="IRkit2" lo="4"]</td></tr>
				<tr><td class="b2iAttribute">n</td><td>Set to n="0" to hide page naviation</td></tr>
				<tr><td class="b2iAttribute">sf</td><td>Set to sf="0" to hide search/filter form</td></tr>
				<tr><td class="b2iAttribute">sh</td><td>Set to sh="0" to hide header row with column titles</td></tr>
				<tr><td class="b2iAttribute">sd</td><td>Set to sd="0" to hide the description column</td></tr>
				<tr><td class="b2iAttribute">sg</td><td>Set to sg="1" to show filing groups</td></tr>
				<tr><td class="b2iAttribute">th</td><td>TextHeader: Add div with your custom text above the SEC Filings display, after the filter tools</td></tr>
				<tr>
					<td class="b2iAttribute">y</td>
					<td>Year, ex. y="2017" to show only filings for this year</td>
				</tr>
				<tr>
					<td class="b2iAttribute">df</td><td>Date Format: 1-5, default is df="1" for list view and 5 for enhanced view <br>1 = mmm dd, yyyy <br>2 = mm/dd/yyyy <br>3 = dd/mm/yyyy <br>4 = dd mmm yyyy <br>5 = Month dd,yyyy</td>
				</tr>
				<tr class="b2iAttribute">
					<td>spdf</td>
					<td>Image URL for PDF files icon</td>
				</tr>
				<tr class="b2iAttribute">
					<td>shtm</td>
					<td>Image URL for Html files icon</td>
				</tr>
				<tr class="b2iAttribute">
					<td>sdoc</td>
					<td>Image URL for Doc files icon</td>
				</tr>
				<tr class="b2iAttribute">
					<td>sxls</td>
					<td>Image URL for Xls files icon</td>
				</tr>
				<tr class="b2iAttribute">
					<td>sxbrl</td>
					<td>Image URL for Xbrl files icon</td>
				</tr>
				<tr class="b2iAttribute">
					<td>szip</td>
					<td>Image URL for Zip files icon</td>
				</tr>
				
				<!-- <tr><td class="b2iAttribute">o</td><td>Owner: not setting this returns all filings, "1" = owner only filings, "2" = exclude owner filings</td></tr> -->
				<tr class="b2iAttribute">
					<td>t</td>
					<td>Filing Type Filter, ex. t="10-K" to show only 10-K filings ***</td>
				</tr>
				<tr class="ParentToTable">
					<td></td>
					<td>
					<div style="padding:20px 8px;">
						<b>US Filers - Form Filters</b><br>
						<table class="DataTable" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>Parameter</td>
								<td>Results Returned</tr>
							</tr>
							<tr>
								<td>t="10"</td>
								<td>Forms 10-Q or 10-K - Quarterly and Annual earnings filings</tr>
							</tr>
							<tr>
								<td>t="10-Q"</td>
								<td>Forms 10-Q or 10-Q/A - Quarterly earnings filings and amendments</tr>
							</tr>
							<tr>
								<td>t="10-Qonly"</td>
								<td>Forms 10-Q</tr>
							</tr>
							<tr>
								<td>t="10-K"</td>
								<td>Forms 10-K or 10-K/A - Annual earnings filings and amendments</tr>
							</tr>
							<tr>
								<td>t="10-Konly"</td>
								<td>Forms 10-K</tr>
							</tr>
							<tr>
								<td>t="8-K"</td>
								<td>Forms 8-K or 8-K/A - Current reports and amendments</tr>
							</tr>
							<tr>
								<td>t="8-Konly"</td>
								<td>Forms 8-K</tr>
							</tr>
							<tr>
								<td>t="defa"</td>
								<td>Forms DEF 14A - Definitive proxy statement - aka Annual meeting proxy</tr>
							</tr>
							<tr>
								<td>t="def"</td>
								<td>Forms DEF(*) wildcard</tr>
							</tr>
							<tr>
								<td>t="ircurrent3"</td>
								<td>Great for SEC Overview page - Latest Form of each 10-K, 10-Q and DEF-14A</tr>
							</tr>
							<tr>
								<td>t="ircurrent4"</td>
								<td>Great for SEC Overview page - Latest Form of each 10-K, 10-Q, 8-K and DEF-14A</tr>
							</tr>
							<tr>
								<td>t="345"</td>
								<td>Forms 3,4,5,3A,4A,5A,144 - Insider transactions (Mgt and Directors buying selling stock) </tr>
							</tr>
							<tr>
								<td>t="no345"</td>
								<td>All forms but Forms 3,4,5,3A,4A,5A,144</tr>
							</tr>
						</table>
						* Other configurations by request
						<br><br>
						<b>ADR Filers - Form Filters</b>
						<table class="DataTable" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="bold">Parameter</td>
								<td class="bold">Results Returned</tr>
							</tr>
							<tr class="DataRow">
								<td>t="20-F"</td>
								<td>Forms 20-F or 20-F/A</tr>
							</tr>
							<tr class="DataRow">
								<td>t="20-Fonly"</td>
								<td>Forms 10-F</tr>
							</tr>
							<tr class="DataRow">
								<td>t="6-K"</td>
								<td>Forms 6-K or 6-K/A</tr>
							</tr>
							<tr class="DataRow">
								<td>t="6-Konly"</td>
								<td>Forms 6-K only</tr>
							</tr>
							<tr class="DataRow">
								<td>t="ircurrent2f"</td>
								<td>Lastest Form of each Form 20-F and Form 6-K - Ordered by date</tr>
							</tr>
						</table>
						* Other configurations by request
					</div></td></tr>
				<tr><td class="b2iAttribute">Floating div options</strong></td></tr>
				<tr><td class="b2iAttribute">ismh</td><td>Content div story max height expanded - in pixels - ex. ismh="600"</td></tr>
				<tr><td class="b2iAttribute">ismw</td><td>Content div story max width expanded - in pixels - ex. ismw="600"</td></tr>
				<tr><td class="b2iAttribute">isw</td><td>Content div story width reduced - in pixels - ex. isw="400"</td></tr>
				<tr><td class="b2iAttribute">ish</td><td>Content div story height reduced - in pixels - ex. ish="400"</td></tr>
				<tr><td class="b2iAttribute">ilo</td><td>Content div left offset - in pixels - ex. ilo="100"</td></tr>
				<tr><td class="b2iAttribute">ito</td><td>Content div top offset - in pixels - ex. ito="200"</td></tr>
			</tbody>
		</table>
	</div>
	
	
	<!-- Financials -->
	<div id="FinancialsTitle" class="PluginTitle">
		<span class="PluginName">Financials / Fundamentals<a name="Financials" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Financials" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_financials s="EAT" m="1"] - <a href="https://demo.b2itech.com/financials/" target="Demo">Live View</a>
			<br>Your symbol will only retrieve data once we set up your account.
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">s</td><td>Required - Stock symbol from your account</td></tr>
				<tr><td class="b2iAttribute">m</td><td>Mode for financials type, default is m="1" for Cash Flow<br>0=Tabbed interface<br>1=Cash Flow only<br>2=Income Statement only<br>3=Balance Sheet only<br>6=Dropdown Selection<br></td></tr>
				<tr><td class="b2iAttribute">d</td><td>Show dollar sign, d="1" to enable, d="0" to disable</td></tr>
				<!-- <tr><td class="b2iAttribute">c</td><td>Count of Quarters to show, default is 5</td></tr> -->
			</tbody>
		</table>
	</div>
	
	
	
	<!-- Press -->
	<div id="PRTitle" class="PluginTitle">
		<span class="PluginName">Press Release / FAQ / Blog<a name="PR" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="PR" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_press_releases tl="1"] - <a href="https://demo.b2itech.com/press/" target="Demo">Live View</a>
			<br>A Group ID may be needed if your account does not have a default one set. [b2i_press_releases group="###" tl="1"] 
		</div>
		<div id="PluginLib" class="PluginInfoContainer">
			<strong>Alternate automation</strong> B2i's application can post press releases directly into WordPress as a post. 
			<br><br>
			<a href="https://www.b2itech.com/Press_Releases_plugin" target="Example">B2i Example page</a> | <a href="https://demo.b2itech.com/press/" target="Demo">Live View</a>
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">group</td><td> Group ID - We now set a default group as thge press releases, multiple groups are possible for other items like FAQs, Media, Newsletter or any other list of articles - can be manually added and emailed</td></tr>
				<tr><td class="b2iAttribute">sdiv</td><td>Div to write and load content - if using multiple instances on same page, must use unique sdiv for each</td></tr>
				<tr><td class="b2iAttribute">n</td><td>Paging - Set n="0" to hide, n="1" for Next/Prev, n="2" for Page numbers 1 2 3 </td></tr>
				<tr><td class="b2iAttribute">c</td><td>Count of items to show, default is 10</td></tr>
				<tr><td class="b2iAttribute">o</td><td>Output, default o="0" for table - <a href="https://demo.b2itech.com/press/" target="_blank">Display Layout Options</a></td></tr>
				<tr><td class="b2iAttribute">a</td><td>How links open, default a="0" opens in floating div<br>0 = opens in floating div<br>1 = opens in new tab<br>2 = opens in B2i CMS and uses a custom domain, URL, and template <br>3 = opens in new window <br>4 = opens as PDF<br>5 = use attachment <br>6 = open in B2i CMS page with custom domain and URLs in new window
<br>7 = open in B2i CMS page with custom domain and URLs in new tab
<br>8 = uses ViewLink parameter also able to set in B2i portal - place Press_Release_View plugin on another page to show item in full<br>9 = uses ViewLink set in B2i portal - place Press_Release_View plugin on other page to show item<br>Also see se="1" and sd="1" following</td></tr>

				<tr><td class="b2iAttribute">se</td><td>se="1" - allow the div to expand and display the story below  the headline</td></tr>
				<tr><td class="b2iAttribute">sd</td><td>sd="1" - allow press release to open in the same div / consume the PR item list div and write a back link to show the list again</td></tr>
				
				<tr><td class="b2iAttribute">d</td><td>Date Location: 0-3, default is d="1" <br>0= do not display <br>1 = display above headline  <br>2 = display on same row as headline <br>3 = display below Headline. Now that custom layouts are availble, this option will be phased out.</td></tr>
				<tr><td class="b2iAttribute">df</td><td>Date Format: 1-6, default is df="1" <br>1 = mmm dd, yyyy <br>2 = mm/dd/yyyy <br>3 = dd/mm/yyyy <br>4 = dd mmm yyyy <br>5 = Day, Month dd, yyyy <br>6 = Month dd,yyyy</td></tr>
				<tr><td class="b2iAttribute">tl</td><td>Set to tl="1" to show the year selector and text search box</td></tr>
				<tr><td class="b2iAttribute">y</td><td>Year filter - Set y="2019" to only show press releases for 2019</td></tr>
				<tr><td class="b2iAttribute">viewlink</td><td>Set to URL of your page where the Press View shortcode is installed viewlink="https://domain/pagename"</td></tr>
				<tr><td class="b2iAttribute">su</td><td>Show body excerpt - su="300" - Set to the number of characters of the body to display.</td></tr>
				<tr><td class="b2iAttribute">ut</td><td>ut="1" - Set this attribute to use a template on your press release story. Requires an HTML template to be loaded into the B2i portal.</td></tr>
				<tr><td class="b2iAttribute">ln</td><td>ln="200" - Headline length to show - Set a limited amount of characters to return for the headline</td></tr>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" - to turn off default CSS *</td></tr>
				<tr><td class="b2iAttribute">Floating div options</strong></td></tr>
				<tr><td class="b2iAttribute">ismh</td><td>Content div story max height expanded - in pixels - ex. ismh="600"</td></tr>
				<tr><td class="b2iAttribute">ismw</td><td>Content div story max width expanded - in pixels - ex. ismw="600"</td></tr>
				<tr><td class="b2iAttribute">isw</td><td>Content div story width reduced - in pixels - ex. isw="400"</td></tr>
				<tr><td class="b2iAttribute">ish</td><td>Content div story height reduced - in pixels - ex. ish="400"</td></tr>
				<tr><td class="b2iAttribute">ilo</td><td>Content div left offset - in pixels - ex. ilo="100"</td></tr>
				<tr><td class="b2iAttribute">ito</td><td>Content div top offset - in pixels - ex. ito="200"</td></tr>
				<!-- 
				<tr><td class="b2iAttribute">h</td><td>Default is "https"</td></tr>
				<tr><td class="b2iAttribute">t</td><td>Tag ID</td></tr>
				<tr><td class="b2iAttribute">f</td><td>Filter ID</td></tr>
				-->
			</tbody>
		</table>
	</div>
	
	
	<!-- Press Viewer -->
	<div id="PRVTitle" class="PluginTitle">
		<span class="PluginName">Press Release Viewer<a name="PRV" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="PRV" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> &nbsp;&nbsp;&nbsp; [b2i_press_view group="###"] - <a href="https://demo.b2itech.com/press-using-press-viewer/" target="Demo">Live View</a>
			<br>A Group ID will be created once we set up your account.
		</div>
		<div id="PluginLib" class="PluginInfoContainer">
			<strong>Usage:</strong> &nbsp;&nbsp;&nbsp;view the press releases on a separate page.<br>
			After placing the Press Releases Shortcode on your page, place this on the page you would like the press release to display.
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">group</td><td>Required - Group ID - we will provide - multiple groups are possible for other items like FAQs, Media, Newsletter or any other list of articles - can be manually added and emailed</td></tr>
				<tr><td class="b2iAttribute">sdiv</td><td>Div to write content - if using multiple instances on same page, must use unique sdiv for each</td></tr>
				<tr><td class="b2iAttribute">lo</td><td>Layout - Unlimited layouts available - We add new layouts as needed. </td></tr>
			</tbody>
		</table>
	</div>
	
	
	
	<!-- Email -->
	<div id="EmailTitle" class="PluginTitle">
		<span class="PluginName">Email Opt-In<a name="Email" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Email" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_email_optin2] - <a href="https://demo.b2itech.com/emailalerts/" target="Demo">Live View</a>
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">-</td><td>Customizable welcome emails with double Optin option can be added to your account. Endpoint can be set after verifing through email sent. Our support team helps you every step of the way in getting this configured. Date, time and IP address stored after confirmation for CASL consent verification.</td></tr>
				<tr><td class="b2iAttribute">sdiv</td><td>Div to write and load content</td></tr>
				<tr><td class="b2iAttribute">lo</td><td>Form Layout - default lo="1" avail options 1-5 (12/16/21) Adding new layouts as needed.</td></tr>
				<tr><td class="b2iAttribute">tos</td><td>Terms of service - default tos="0" disabled / to enable use tos="1"</td></tr>
				<tr><td class="b2iAttribute">tosl</td><td>Terms of service label - To use, set the value tosl="I accept the Terms of Service"</td></tr>
				<tr><td class="b2iAttribute">tosc</td><td>Terms of service control - set to tosc="1" to hide the SUBSCRIBE button until the TOS checkbox is checked</td></tr>
				
				<tr><td class="b2iAttribute">ca</td><td>Check all lists by default</td></tr>
				<tr><td class="b2iAttribute">ha</td><td>Hide all lists by default</td></tr>
				<tr><td class="b2iAttribute">it</td><td>Investor Tags - tag subscribers - used to track sign-up source when email sign-up form used in multiple locations - defined and viewed in B2i Portal</td></tr>
				<tr><td class="b2iAttribute">sep</td><td>Subscribe endpoint url - sends user to URL after subscribing</td></tr>
				<tr><td class="b2iAttribute">uep</td><td>Unsubscribe endpoint url - sends user to URL after unsubscribing</td></tr>
				<tr><td class="b2iAttribute">lang</td><td>Language ID - Default 1 for English. Requires additional languages to be added to your B2i account.</td></tr>
				<tr><td class="b2iAttribute">g</td><td>Group of opt-in list - if omitted, all opt-in lists will be displayed. Lists and Groups of Lists are maintained in the B2i portal.</td></tr>
				<tr><td class="b2iAttribute">-</td><td>Get notified when contacts subscribe to email notifications allowing you to follow-up with new contacts that are interested in your company.</td></tr>
			</tbody>
		</table>
	</div>
	
	
	
	<!-- Stock Detail -->
	<div id="stockdetailTitle" class="PluginTitle">
		<span class="PluginName">Stock Detail Quote<a name="stockdetail" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="stockdetail" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_stock s="EAT" d="1" f="1"] - <a href="https://demo.b2itech.com/stock-quote-options/" target="Demo">Live View</a>
			<br>Your symbol will only retrieve data once we set up your account.
			
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">s</td><td>Required - Enter your stock ticker symbol</td></tr>
				<tr><td class="b2iAttribute">sdiv</td><td>sdiv="QuoteDiv1" - if using multiple instances on same page, must use unique sdiv for each</td></tr>
				<tr><td class="b2iAttribute">f</td><td>f="1" - Format for stock data output. Current usage is 1-32 with more added frequently - Unlimited custom displays possible.</td></tr>
				<tr><td class="b2iAttribute">dl</td><td>Decimal places, Default is 2, dl="3" would show 3 places right of decimal</td></tr>
				<tr><td class="b2iAttribute">d</td><td>Show dollar sign, set to d="1", Default is 0 / off</td></tr>
				<tr><td class="b2iAttribute">e</td><td>Override exchange</td></tr>
				<tr><td class="b2iAttribute">ui</td><td>Custom up arrow image / character<pre>Examples:
ui="https://imageurl.com/imagename.extension";
ui="&amp;uarr;";</pre></td></tr>
				<tr><td class="b2iAttribute">di</td><td>Custom down arrow image / character
<pre>Examples:
di="https://imageurl.com/imagename.extension";
di="&amp;darr;";</pre></td></tr>
				<tr><td class="b2iAttribute">centsep</td><td>Cents seperator override - example: centsep=","</td></tr>
				<tr><td class="b2iAttribute">thoussep</td><td>Number seperator override - example: thoussep="."</td></tr>
				<tr><td class="b2iAttribute">df</td><td>Date format - example: df="1"<pre>0: 11/19/2020 2:07 PM
1: Nov 19, 2020 2:07 PM
2: 11/19/20 2:07 PM
3: 19/11/2020 2:07 PM
4: 19 Nov 2020 2:07 PM
5: Tuesday, November 19, 2020 2:07 PM
6: November 19, 2020 2:07 PM
7: Nov 19, 2020
8: 19 Nov 2020</pre></td></tr>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" to turn off default CSS</td></tr>
			</tbody>
		</table>
	</div>


	<!-- Stock Historical -->
	<div id="HistoricalTitle" class="PluginTitle">
		<span class="PluginName">Stock Historical Quote<a name="Historical" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Historical" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_HistoricalQuote s="EAT" d="1"] - <a href="https://demo.b2itech.com/historical-quote/" target="Demo">Live View</a>
			<br>Your symbol will only retrieve data once we set up your account.
			
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">s</td><td>Required - Stock symbol from your account</td></tr>
				<tr><td class="b2iAttribute">dl</td><td>Decimal places, Default is 2, dl="3" would show 3 places right of decimal</td></tr>
				<tr><td class="b2iAttribute">d</td><td>Show dollar sign, set to d="1", Default is 0 / off</td></tr>
				<tr><td class="b2iAttribute">se</td><td>Show Export - Use se="0" to turn off</td></tr>
				<tr><td class="b2iAttribute">centsep</td><td>Cents seperator override - example: centsep=","</td></tr>
				<tr><td class="b2iAttribute">thoussep</td><td>Number seperator override - example: thoussep="."</td></tr>
				<tr><td class="b2iAttribute">df</td><td>Date format - example: df="1"<pre>0: 11/19/2020
1: Nov 19, 2020
2: 11/19/20
3: 19/11/2020
4: 19 Nov 2020
5: Tuesday, November 19, 2020
6: November 19, 2020</pre></td></tr>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" to turn off default CSS</td></tr>
			</tbody>
		</table>
	</div>
	
	
	
	<!-- Stock Chart -->
	<div id="StockChartTitle" class="PluginTitle">
		<span class="PluginName">Stock Chart<a name="StockChart" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="StockChart" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> &nbsp;&nbsp;&nbsp; [b2i_chart s="EAT" e="NYSE: "] - <a href="https://demo.b2itech.com/stock-charts/" target="Demo">Live View</a> 
			<strong>Short Code</strong> &nbsp;&nbsp;&nbsp; [b2i_intrachart s="EAT" e="NYSE: "]
			<br>Your symbol will only retrieve data once we set up your account.		
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr class="DataRow">
					<td class="SubSection">Chart Container</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">sdiv</td>
					<td>Chart - Div name - sdiv="chartdiv"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">height</td>
					<td>height="400px" - Default is 500 measured in px</td>
				</tr>
				<tr>
					<td class="b2iAttribute">width</td>
					<td>width="600px" - for 600px - Default is 96%</td>
				</tr>
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Chart Type and Fill</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">c</td>
					<td>Line and Fill HTML color: default 1763A9 - no # needed - c="1763A9"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">fa</td>
					<td>Chart Area fill alpha - set fa="0" for no fill - Max value is 1 for solid - fa="0.2"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">lt</td>
					<td>Line Thickness: default is lt="2"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">ct</td>
					<td>Chart - Type: ct="line" default - options: line, smoothedLine, step, column</td>
				</tr>
				<tr class="DataRow">
					<td class="SubSection">Chart Background</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">bgc</td>
					<td>Chart Background HTML color: default f1f1f1 - no # needed - bgc="ffffff"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">bga</td>
					<td>Chart Background alpha: default 1.0 - set bga="0" for no fill</td>
				</tr>
				
				
				<tr class="DataRow">
					<td class="SubSection">Chart Grid</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">ga</td>
					<td>Chart Grid alpha: default .2 - set ga="0" for no grid</td>
				</tr>
				<tr>
					<td class="b2iAttribute">gc</td>
					<td>Chart Grid HTML color: default bbbbbb - no # needed - gc="ffffff"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">udg</td>
					<td>Chart - Use Dash Grid: udg="0" - Default is 0 - set udg="1" </td>
				</tr>
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Chart Border</td>
					<td></td>
				</tr
				<tr>
					<td class="b2iAttribute">cbc</td>
					<td>Chart Border HTML color: default 999999 - no # needed - bgc="999999"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">cba</td>
					<td>Chart Border alpha: default .5 - set cba="0" for no border</td>
				</tr>
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Label Text</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">s</td>
					<td>Required - Stock symbol from your account</td>
				</tr>
				<tr>
					<td class="b2iAttribute">sd</td>
					<td>Stock symbol display override</td>
				</tr>
				<tr>
					<td class="b2iAttribute">e</td>
					<td>Label - Text to display in front of symbol - e="Nasdaq: " or e="CompanyName : "</td>
				</tr>
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Label Formatting</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">vic</td>
					<td>Chart - Values inside chart - Default is 1 - set vic="0" for values on outside of chart, also need to adjust Left Margin lm="50"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">lm</td>
					<td>Chart - Left Margin: default is 5, need to increase if displaying values on outside of chart</td>
				<tr>
				<tr>
					<td class="b2iAttribute">sil</td>
					<td>Label Inside - Show inside label: default is "1", use sit="0" to turn off</td>
				</tr>
				<tr>
					<td class="b2iAttribute">lc3</td>
					<td>Label Inside - HTML color: default 1763A9 - no # needed - lc3="1763A9"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">ls3</td>
					<td>Label Inside - Font Size: default 15 - ls3="15"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">la3</td>
					<td>Label Inside - Label Alpha: default 0.3 - la3="0.2"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">lc</td>
					<td>Label at Top - HTML color: default 666666 - no # needed - lc="666666"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">stl</td>
					<td>Label at Top - Default is 1 - true - set stl="0" to turn off</td>
				</tr>
				<tr>
					<td class="b2iAttribute">ls</td>
					<td>Label at Top - Font Size: default 15 - ls="15"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">lc2</td>
					<td>Label on Side and Bottom - HTML color: default 666666 - no # needed - lc2="666666" - </td>
				</tr>
				<tr>
					<td class="b2iAttribute">ls2</td>
					<td>Label on Side and Bottom - Font size: default 11 - ls2="11"</td>
				</tr>
				
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Cursor</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">sc</td>
					<td>Cursor - Show cursor: default is "1", use sc="0" to turn off</td>
				</tr>
				<tr>
					<td class="b2iAttribute">cc</td>
					<td>Cursor HTML color: default 1763A9 - no # needed - cc="1763A9"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">ca</td>
					<td>Cursor Alpha - Max value is 1 - Default ca="0.1" </td>
				</tr>
				
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Period Selector</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">sp</td>
					<td>Period selector - Show period selector: default is "1", use sp="0" to turn off</td>
				</tr>
				<tr>
					<td class="b2iAttribute">ps</td>
					<td>Period Selector location: default is ps="bottom" - options: top, bottom, left, right</td>
				</tr>
				<tr>
					<td class="b2iAttribute">p</td>
					<td>Period selector - Selected time period - values are 10d, 1m, 3m, 6m, 1y, max - p="3m" default</td>
				</tr>
				
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Volume</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">sv</td>
					<td>Chart - Show Volume Chart: default is "1", use sv="0" to turn off</td>
				</tr>
				<tr>
					<td class="b2iAttribute">vct</td>
					<td>Chart - Volume Chart type: vct="column" default - options: line, smoothedLine, step, column</td>
				</tr>
				<tr>
					<td class="b2iAttribute">vfa</td>
					<td>Chart - Volume fill alpha - set vfa="0" for no fill - Max value is 1 for solid - default vfa="0.9"</td>
				</tr>
				
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Balloon</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">bc</td>
					<td>Balloon border HTML color: default 1763A9 - no # needed - bc="1763A9"</td>
				</tr>
				<tr>
					<td class="b2iAttribute">bs</td>
					<td>Balloon Font size: default 13 - bs="14"</td>
				</tr>
				
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Scroll Bar</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">ssb</td>
					<td>Chart - Show scroll bar: default is "1", use ssb="0" to turn off</td>
				</tr>
				
				
				
				
				<tr class="DataRow">
					<td class="SubSection">Data Format / Separators</td>
					<td></td>
				</tr>
				<tr>
					<td class="b2iAttribute">centsep</td>
					<td>Decimal separator: centsep="."</td>
				</tr>
				<tr>
					<td class="b2iAttribute">thoussep</td>
					<td>Thousands separator: thoussep=","</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
		
		
		
	<!-- Stock JSON -->
	<div id="QuoteDetailTitle" class="PluginTitle">
		<span class="PluginName">Quote Detail JSON object<a name="QuoteDetail" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>	
	<div id="QuoteDetail" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_quote s="EAT" dataonly="true" o="1"]
			<br>Your symbol will only retrieve data once we set up your account. 
		</div>
		<div>
			<table class="b2i-instructions">
				<thead>
					<tr>
						<th><strong>Attributes</strong></th>
						<th><strong>Detail</strong></th>
					</tr>
				</thead>
				<tbody>
					<tr><td class="b2iAttribute">s</td><td>Required - Stock symbol from your account</td></tr>
					<tr><td class="b2iAttribute">dl</td><td>Decimal places, Default is 2, dl="4" would show 4 places right of decimal</td></tr>
					<tr><td class="b2iAttribute">d</td><td>Show dollar sign, set to d="1", Default is 0 / off</td></tr>
				</tbody>
			</table>
		</div>
	</div>	



	<!-- Dividends -->
	<div id="DividendsTitle" class="PluginTitle">
		<span class="PluginName">Dividends<a name="Dividends" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Dividends" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> &nbsp;&nbsp;&nbsp; [b2i_dividends] - <a href="https://demo.b2itech.com/dividends/" target="Demo">Live View</a>
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">s</td><td>Required - Stock symbol from your account</td></tr>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" to turn off default CSS</td></tr>
				<tr><td class="b2iAttribute">sdiv</td><td>Div to write and load content, default is sdiv="DividendsDiv"</td></tr>
				<tr><td class="b2iAttribute">d</td><td>Show dollar sign d="1", Do not show dollar sign d="0"</td></tr>
			</tbody>
		</table>
	</div>
	
	
	<!-- Committee -->
	<div id="CommitteeTitle" class="PluginTitle">
		<span class="PluginName">Committees<a name="Committee" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Committee" class="PluginInfoContainer">
		<strong>Short Code</strong> - [b2i_committee] - <a href="https://demo.b2itech.com/committee/" target="Demo">Live View</a>
		<br>Requires data to be entered in the B2i CMS Portal
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">lo</td><td>Default lo="0" - Unlimited database driven layouts</td></tr>
			</tbody>
		</table>
	</div>
	
	
	
	<!-- Directors -->
	<div id="DirectorsTitle" class="PluginTitle">
		<span class="PluginName">Directors<a name="Directors" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Directors" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> &nbsp;&nbsp;&nbsp; [b2i_directors] - <a href="https://demo.b2itech.com/committee/" target="Demo">Live View</a>
			<br>Requires data to be entered in your <a href="https://www.myb2i.com/profiles/businessframed/index.asp" target="b2itech">B2i account</a>
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" to turn off default CSS *</td></tr>
				<tr><td class="b2iAttribute">so="1"</td><td>to have stay open - don't collapse</td></tr>
				<tr><td class="b2iAttribute">lo</td><td>Default lo="0" - Unlimited database driven layouts</td></tr>
			</tbody>
		</table>
	</div>
	
	

	<!-- Management -->
	<div id="ManagementTitle" class="PluginTitle">
		<span class="PluginName">Management<a name="Management" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Management" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> &nbsp;&nbsp;&nbsp; [b2i_management] - <a href="https://demo.b2itech.com/committee/" target="Demo">Live View</a>
			<br>Requires data to be entered in the B2i CMS Portal
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" to turn off default CSS *</td></tr>
				<tr><td class="b2iAttribute">so="1"</td><td>to have stay open - don't collapse</td></tr>
				<tr><td class="b2iAttribute">lo</td><td>Default lo="0" - Unlimited database driven layouts</td></tr>
			</tbody>
		</table>
	</div>
			
			
			
	<!-- Events   -->
	<div id="EventsTitle" class="PluginTitle">
		<span class="PluginName">Events Calendar<a name="Events" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Events" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_calendar m="0" c="5"] - <a href="https://demo.b2itech.com/calendar/" target="Demo">Live View</a> 
			<br>Multiple instances can be used for segregating data by future/past or year.
			<br>Requires data to be entered in the B2i CMS Portal
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">sdiv</td><td>Div name to write and load content, used to override default</td></tr>
				<tr><td class="b2iAttribute">c</td><td>Count of items to show, default is 10</td></tr>
				<tr><td class="b2iAttribute">m</td><td>Default m="", Future events, Mode set m="1" Past events, m="0" All events</td></tr>
				
				<tr><td class="b2iAttribute">lo</td><td>Layout - unlimited database driven layouts possible</td></tr>
				<tr><td class="b2iAttribute">vl</td><td>Set to URL of your page where the Calendar View shortcode is installed vl="https://domain/pagename"</td></tr>
				
				<tr><td class="b2iAttribute">y</td><td>Year to filter events for Past events ex. y="2017"</td></tr>
				<tr><td class="b2iAttribute">df</td><td>Date Format: 1-6, default is df="1" <br>1 = mmm dd, yyyy <br>2 = mm/dd/yyyy <br>3 = dd/mm/yyyy <br>4 = dd mmm yyyy <br>5 = Day, Month dd, yyyy <br>6 = Month dd,yyyy</td></tr>
				<tr><td class="b2iAttribute">dlo</td><td>Date Location ex. dlo="1" for above title, dlo="0" for under title - Phasing out as dynamic layouts are becoming available and make this setting obsolete</td></tr>
				<!-- <tr><td class="b2iAttribute">se</td><td>Show expand - set to "1" - creates a div below each item - for downloads</td></tr> -->
			</tbody>
		</table>
	</div>
	
	
			
	<!-- Events Viewer -->
	<div id="EventViewerTitle" class="PluginTitle">
		<span class="PluginName">Events Calendar Item Viewer<a name="EventViewer" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="EventViewer" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_cal_view] - <a href="https://demo.b2itech.com/calendar/" target="Demo">Live View</a> 
			<br>Requires data to be entered in the B2i CMS Portal
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">sdiv</td><td>Div name to write and load content, used to override default</td></tr>
				<tr><td class="b2iAttribute">c</td><td>Count of items to show, default is 10</td></tr>
				<tr><td class="b2iAttribute">m</td><td>Default m="", Future events, Mode set m="1" Past events, m="0" All events</td></tr>
				
				<tr><td class="b2iAttribute">lo</td><td>Layout - unlimited database driven layouts possible</td></tr>
				
				<tr><td class="b2iAttribute">y</td><td>Year to filter events for Past events ex. y="2017"</td></tr>
				<tr><td class="b2iAttribute">df</td><td>Date Format: 1-6, default is df="1" <br>1 = mmm dd, yyyy <br>2 = mm/dd/yyyy <br>3 = dd/mm/yyyy <br>4 = dd mmm yyyy <br>5 = Day, Month dd, yyyy <br>6 = Month dd,yyyy</td></tr>
				<!-- <tr><td class="b2iAttribute">se</td><td>Show expand - set to "1" - creates a div below each item - for downloads</td></tr> -->
			</tbody>
		</table>
	</div>
		
	
	
	<!-- Analyst -->
	<div id="AnalystTitle" class="PluginTitle">
		<span class="PluginName">Analyst<a name="Analyst" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Analyst" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_analyst] - <a href="https://demo.b2itech.com/analyst/" target="Demo">Live View</a> 
			<br>Requires data to be entered in the B2i CMS Portal
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">lo</td><td>Layout options</td></tr>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" to turn off default CSS</td></tr>
				<tr><td class="b2iAttribute">sdiv</td><td>Div to write and load content, default is sdiv="AnalystDiv"</td></tr>
			</tbody>
		</table>
	</div>



	<!-- Documents -->
	<div id="DocumentsTitle" class="PluginTitle">
		<span class="PluginName">Document List<a name="Documents" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Documents" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_showcase id="ID"] - <a href="https://demo.b2itech.com/documents/" target="Demo">Live View</a>
			<br>Used for items like an Online IR Webkit, Conference Calls, Presentations.
			<br>Requires data to be entered in the B2i CMS Portal
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">id</td><td>Required - Document list id - we will provide this - multiple list are possible.</td></tr>
				<tr><td class="b2iAttribute">class</td><td>Set custom classes on container</td></tr>
				<tr><td class="b2iAttribute">c</td><td>Count of items to show, default is 10</td></tr>
				<tr><td class="b2iAttribute">n</td><td>Paging - Set n="0" to hide, n="1" for Next/Prev, n="2" for Page numbers 1 2 3</td></tr>
				<tr><td class="b2iAttribute">lo</td><td>Layout: default 0 for table, 1 for unordered list, 2 for Div output, 3 for Div with Button</td></tr>
				<tr><td class="b2iAttribute">si</td><td>Show Image: "0":no, "1":left, "2":right</td></tr>
				<tr><td class="b2iAttribute">sd</td><td>Show Date: sd="0" No, sd="1" 6/18/2020, sd="2" Jun 18, 2020, sd="3" June 18, 2020, sd="4" 18 / 06, sd="5" 18/06/2020, sd="6" 18 Jun 2020</td></tr>
				<tr><td class="b2iAttribute">ds</td><td>Data Sort: ds="0" date desc, ds="1" date asc, ds="2" title</td></tr>
				<tr><td class="b2iAttribute">sh</td><td>Show Header row: sh="0" No, sh="1" displays a row with Date, Title headings</td></tr>
				<tr><td class="b2iAttribute">tl</td><td>Show Year dropdown: tl="0" No, tl="1" </td></tr>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" to turn off default CSS *</td></tr>
				<tr><td class="b2iAttribute">Floating div options</strong></td></tr>
				<tr><td class="b2iAttribute">ismh</td><td>Content div story max height expanded - in pixels - ex. ismh="600"</td></tr>
				<tr><td class="b2iAttribute">ismw</td><td>Content div story max width expanded - in pixels - ex. ismw="600"</td></tr>
				<tr><td class="b2iAttribute">isw</td><td>Content div story width reduced - in pixels - ex. isw="400"</td></tr>
				<tr><td class="b2iAttribute">ish</td><td>Content div story height reduced - in pixels - ex. ish="400"</td></tr>
				<tr><td class="b2iAttribute">ilo</td><td>Content div left offset - in pixels - ex. ilo="100"</td></tr>
				<tr><td class="b2iAttribute">ito</td><td>Content div top offset - in pixels - ex. ito="200"</td></tr>
			</tbody>
		</table>
	</div>
	
	
	
	<!-- Customizable Banner -->
	<div id="CodeTitle" class="PluginTitle">
		<span class="PluginName">Customizable Banner Message / Custom Messages or any html / CSS markup <a name="Code" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Code" class="PluginInfoContainer">
		<div>
			<strong>More Detail</strong> This is a unique offering to allow segments of code and text, that can be scheduled to display and expire on given dates/times. Clients have used this to display a notice of the quarterly conference call to alert website visitors of the call and allow the webcast link and slide presentation to easily be found.
		</div>
		<strong>Short Code</strong> - [b2i_code id=""] - <a href="https://www.b2itech.com/codeplugin" target="Example">Live View</a>
		<br>Requires data to be entered in the B2i CMS Portal
		<table class="b2i-instructions">
						<thead>
							<tr>
								<th><strong>Attributes</strong></th>
								<th><strong>Detail</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr><td class="b2iAttribute">id</td><td>Required ID - from B2i system</td></tr>
							<tr><td class="b2iAttribute">sdiv</td><td>Div to write and load content, default is sdiv="CodeDiv[id]"</td></tr>
						</tbody>
					</table>
	</div>
	
	
	
	<!-- Multi-Section -->
	<div id="PageTitle" class="PluginTitle">
		<span class="PluginName">Multi-Section Downloads / Page Code<a name="Page" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Page" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_page id="ID"] - <a href="https://demo.b2itech.com/multi-section/" target="Demo">Live View</a>
			<br>Used for items like an Earning, M&D or investor kits.
			<br>Requires data to be entered in the B2i CMS Portal 
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">id</td><td>Required - Page id - we will provide this - multiple list are possible.</td></tr>
				<tr><td class="b2iAttribute">lo</td><td>Default according - lo="2" incorporates dropdown to display headers</td></tr>
				<tr><td class="b2iAttribute">css</td><td>Use css="0" to turn off default CSS*</td></tr>
			</tbody>
		</table>
	</div>
	
	
	
	<!-- Institutional -->
	<!-- 
	<div id="InstitutionalTitle" class="PluginTitle">
		<span class="PluginName">Institutional Holders<a name="Institutional" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Institutional" class="PluginInfoContainer">
		<strong>Short Code</strong> - [b2i_institutional s="EAT"] - <a href="https://demo.b2itech.com/institutional-holders/" target="Demo">Live View</a>
		<br>Your symbol will only retrieve data once we set up your account.
	</div>
	 -->
	
	
	<!-- Insider Holdings -->
	<!-- 
	<div id="InsiderTitle" class="PluginTitle">
		<span class="PluginName">Insider Holdings<a name="Insider" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Insider" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_insiders s="EAT"] - <a href="https://demo.b2itech.com/insider-holdings/" target="Demo">Live View</a>
			<br>Your symbol will only retrieve data once we set up your account.
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">s</td><td>Required - Stock symbol from your account</td></tr>
				<tr><td class="b2iAttribute">c</td><td>Count of items to show, default is 5</td></tr>
			</tbody>
		</table>
	</div>
	 -->
	

	<!-- Contact-us Form -->
	<div id="ContactTitle" class="PluginTitle">
		<span class="PluginName">Contact-us Form 2.0<a name="Contact" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Contact" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_contactus2] - <a href="https://demo.b2itech.com/contact-us-2-0/" target="Demo">Live View</a>
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">sdiv</td><td>Div to write and load content</td></tr>
			</tbody>
		</table>
	</div>
	
	
	
	<!-- 
	Information Request 
	<div id="RequestTitle" class="PluginTitle">
		<span class="PluginName">Information Request 2.0<a name="Request" class="HashTag"></a></span>
		<span class="toclink"></span>
	</div>
	<div id="Request" class="PluginInfoContainer">
		<div>
			<strong>Short Code</strong> - [b2i_request_optin2] - <a href="https://www.b2itech.com/request_info_plugin2" target="Example">B2i Example page</a>
		</div>
		<table class="b2i-instructions">
			<thead>
				<tr>
					<th><strong>Attributes</strong></th>
					<th><strong>Detail</strong></th>
				</tr>
			</thead>
			<tbody>
				<tr><td class="b2iAttribute">sdiv</td><td>Div to write and load content</td></tr>
			</tbody>
		</table>
	</div>
	</div>
	 -->