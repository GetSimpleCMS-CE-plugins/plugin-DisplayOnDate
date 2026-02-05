<?php
/*
Plugin Name: Display On Date
Description: Schedule content blocks to display during specified dates using shortcodes or PHP calls..
Version: 1.1
Author: risingisland
*/

$DisplayOnDate = basename(__FILE__, ".php");

// Load data
define('DISPLAYON_DATA', GSDATAOTHERPATH . 'DisplayOnDate/blocks.json');

// Load translations
i18n_merge('DisplayOnDate') || i18n_merge('DisplayOnDate', 'en_US');

register_plugin(
	$DisplayOnDate,
	i18n_r($DisplayOnDate.'/lang_Menu_Title'),
	'1.1',
	'risingisland',
	'https://getsimple-ce.ovh/plugins/',
	i18n_r($DisplayOnDate.'/lang_Description'),
	'block',
	'displayon_admin'
);

# Ensure data folder exists
if (!is_dir(dirname(DISPLAYON_DATA))) {
	mkdir(dirname(DISPLAYON_DATA), 0755, true);
}

if (!file_exists(DISPLAYON_DATA)) {
	file_put_contents(DISPLAYON_DATA, '{}');
}

# Add a link in the admin tab 'theme'
add_action('nav-tab','createNavTab',array('block',$DisplayOnDate, i18n_r($DisplayOnDate.'/lang_Icon_Menu'). i18n_r($DisplayOnDate.'/lang_Tab_Title')));

# =====================
# CORE FUNCTIONS
# =====================

function displayon_get_blocks() {
	return json_decode(file_get_contents(DISPLAYON_DATA), true) ?: [];
}

function displayon_save_blocks($blocks) {
	file_put_contents(DISPLAYON_DATA, json_encode($blocks, JSON_PRETTY_PRINT));
}

function displayon_render($key) {
	$blocks = displayon_get_blocks();
	if (!isset($blocks[$key])) {
		return '';
	}

	$block = $blocks[$key];

	$now   = time();
	$start = strtotime($block['start']);
	$end   = strtotime($block['end']);

	// Check if content should be displayed (within date range)
	if ($now < $start || $now > $end) {
		return ''; // Return empty string if outside date range
	}

	// Get the content
	$content = html_entity_decode($block['content']);

	// If template exists, use it
	if (!empty($block['template'])) {
		$template = html_entity_decode($block['template']);
		
		// Replace {{content}} placeholder with actual content
		$output = str_replace('{{content}}', $content, $template);
		
		// Make block variables available to the template
		$block_start = $block['start'];
		$block_end = $block['end'];
		$block_start_timestamp = $start;
		$block_end_timestamp = $end;
		
		// Execute any PHP code in the template
		ob_start();
		eval('?>' . $output);
		return ob_get_clean();
	}
	
	// If no template, return content directly
	return $content;
}

function display_footer() {
	?>
	<style>
	.donateButton{box-shadow:inset 0px 1px 0px 0px #fce2c1;background:linear-gradient(to bottom, #ffc477 5%, #fb9e25 100%);background-color:#ffc477;border-radius:15px;border:1px solid #eeb44f;display:inline-block; cursor:pointer;color:#ffffff!important;font-family:Arial;font-size:15px;font-weight:bold;padding:5px 10px;text-decoration:none!important;text-shadow:0px 1px 0px #cc9f52}.donateButton:hover{background:linear-gradient(to bottom, #fb9e25 5%, #ffc477 100%);background-color:#fb9e25}.donateButton:active{position:relative;top:1px} hr{border:0;height:0;border-top:1px solid rgba(0, 0, 0, 0.1);border-bottom:1px solid rgba(255, 255, 255, 0.3)}
	</style>
	<footer id="paypal">
		<p style="margin:20px 0 0">Made with <span class="credit-icon">❤️</span> especially for "<b><?php global $USR; echo $USR; ?></b>". Is this plugin useful to you?
		<a href="https://getsimple-ce.ovh/donate" target="_blank" class="donateButton"><b>Buy Us A Coffee </b><svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-opacity="0" d="M17 14v4c0 1.66 -1.34 3 -3 3h-6c-1.66 0 -3 -1.34 -3 -3v-4Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.8s" dur="0.5s" values="0;1"/></path><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="48" stroke-dashoffset="48" d="M17 9v9c0 1.66 -1.34 3 -3 3h-6c-1.66 0 -3 -1.34 -3 -3v-9Z"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="48;0"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M17 9h3c0.55 0 1 0.45 1 1v3c0 0.55 -0.45 1 -1 1h-3"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="14;0"/></path><mask id="lineMdCoffeeHalfEmptyFilledLoop0"><path stroke="#fff" d="M8 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4M12 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4M16 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4"><animateMotion calcMode="linear" dur="3s" path="M0 0v-8" repeatCount="indefinite"/></path></mask><rect width="24" height="0" y="7" fill="currentColor" mask="url(#lineMdCoffeeHalfEmptyFilledLoop0)"><animate fill="freeze" attributeName="y" begin="0.8s" dur="0.6s" values="7;2"/><animate fill="freeze" attributeName="height" begin="0.8s" dur="0.6s" values="0;5"/></rect></g></svg></a></p>
	</footer>
	<?php
}

# =====================
# SHORTCODE
# =====================

add_filter('content', 'displayon_shortcode');

function displayon_shortcode($content) {
	return preg_replace_callback(
		'/\[display-on\s+([a-zA-Z0-9\-_]+)\]/',
		function ($m) {
			return displayon_render($m[1]);
		},
		$content
	);
}

# =====================
# TEMPLATE FUNCTION
# =====================

function display_on($key) {
	echo displayon_render($key);
}

# =====================
# ADMIN PAGE
# =====================

function displayon_admin() {
	
	// Initialize GetSimple's CKEditor globals
	global $EDTOOL, $EDLANG, $EDOPTIONS;
	// Set defaults if not defined
	if (!isset($EDTOOL)) {
		$EDTOOL = defined('GSEDITOR') ? GSEDITOR : '';
	}
	if (!isset($EDLANG)) {
		$EDLANG = defined('GSLANG') ? GSLANG : 'en';
	}
	if (!isset($EDOPTIONS)) {
		$EDOPTIONS = '';
	}
	// Process toolbar configuration
	if (function_exists('returnJsArray')) {
		$toolbar_value = returnJsArray($EDTOOL);
		$toolbar = !empty($toolbar_value) ? ",toolbar: " . trim($toolbar_value, ",") : '';
	} else {
		// Fallback if returnJsArray doesn't exist
		$toolbar = !empty($EDTOOL) ? ",toolbar: " . trim($EDTOOL, ",") : '';
	}
	// Process options
	$options = !empty($EDOPTIONS) ? ',' . trim($EDOPTIONS, ",") : '';

	$blocks = displayon_get_blocks();
	
	// Handle form submissions
	if (isset($_POST['displayon_save'])) {
		// Sanitize key: replace spaces with hyphens
		$key = sanitize_filename(str_replace(' ', '-', trim($_POST['key'])));
		
		// Handle datetime - if time is not provided, use current time
		$start_date = $_POST['start_date'];
		$start_time = !empty($_POST['start_time']) ? $_POST['start_time'] : date('H:i');
		$end_date = $_POST['end_date'];
		$end_time = !empty($_POST['end_time']) ? $_POST['end_time'] : '23:59';
		
		$blocks[$key] = [
			'start'	=> $start_date . ' ' . $start_time,
			'end'	  => $end_date . ' ' . $end_time,
			'content'  => $_POST['content'],
			'template' => $_POST['template']
		];
		displayon_save_blocks($blocks);
		echo '<div class="updated" style="padding: 10px; margin: 10px 0; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 4px; color: #155724;">✓ '.i18n_r('DisplayOnDate/lang_Block_saved').'</div>';
	}
	
	// Handle delete
	if (isset($_GET['delete'])) {
		$key = $_GET['delete'];
		if (isset($blocks[$key])) {
			unset($blocks[$key]);
			displayon_save_blocks($blocks);
			echo '<div class="updated" style="padding: 10px; margin: 10px 0; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 4px; color: #155724;">✓ '.i18n_r('DisplayOnDate/lang_Block_deleted').'</div>';
			$blocks = displayon_get_blocks(); // reload
		}
	}
	
	?>
	
	<!-- Add CSS -->
	<style>
		#sidebar {
			display: none!important;
		}
		.bodycontent {
			display: block;
		}
		.displayon-container {
			background: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
		}
		.displayon-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 20px;
			padding-bottom: 15px;
			border-bottom: 2px solid #f0f0f0;
		}
		.displayon-header h3 {
			margin: 0;
			color: #333;
			font-size: 24px;
		}
		.displayon-btn {
			display: inline-block;
			padding: 10px 20px;
			background: #2271b1;
			color: #fff !important;
			text-decoration: none;
			border-radius: 4px;
			border: none;
			cursor: pointer;
			font-size: 14px;
			transition: background 0.2s;
		}
		.displayon-btn:hover {
			background: #135e96;
			-webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(66,66,66,0); 
			box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(66,66,66,0);
		}
		.displayon-btn-success {
			background: #00a32a;
		}
		.displayon-btn-success:hover {
			background: #008a24;
		}
		.displayon-btn-cancel {
			background: #dcdcde;
			color: #2c3338 !important;
			margin-left: 10px;
		}
		.displayon-btn-cancel:hover {
			background: #c3c4c7;
		}
		.displayon-form {
			background: #f9f9f9;
			padding: 25px;
			border-radius: 6px;
			border: 1px solid #e0e0e0;
		}
		.displayon-form-group {
			margin-bottom: 20px;
		}
		.displayon-form-group label {
			display: block;
			margin-bottom: 8px;
			font-weight: 600;
			color: #333;
			font-size: 14px;
		}
		.displayon-form-group input[type="text"],
		.displayon-form-group input[type="date"],
		.displayon-form-group input[type="time"],
		.displayon-form-group textarea {
			width: 100%;
			padding: 10px;
			border: 1px solid #ddd;
			border-radius: 4px;
			font-size: 14px;
			box-sizing: border-box;
		}
		.displayon-form-group input:focus,
		.displayon-form-group textarea:focus {
			outline: none;
			border-color: #2271b1;
			box-shadow: 0 0 0 1px #2271b1;
		}
		.displayon-form-group textarea {
			font-family: 'Courier New', monospace;
			resize: vertical;
		}
		.displayon-form-hint {
			display: block;
			margin-top: 5px;
			color: #666;
			font-size: 12px;
			font-style: italic;
		}
		.displayon-datetime-group {
			display: grid;
			grid-template-columns: 2fr 1fr;
			gap: 10px;
		}
		.displayon-table {
			width: 100%;
			border-collapse: collapse;
			background: #fff;
		}
		.displayon-table th {
			background: #f9f9f9;
			padding: 12px;
			text-align: left;
			border-bottom: 2px solid #ddd;
			font-weight: 600;
			color: #333;
		}
		table.displayon-table tbody tr td{
			padding-top:12px;
		}
		.displayon-table td {
			padding: 12px;
			border-bottom: 1px solid #eee;
		}
		.displayon-table tr:hover {
			background: #f9f9f9;
		}
		.displayon-status {
			display: inline-block;
			padding: 4px 12px;
			border-radius: 12px;
			font-size: 12px;
			font-weight: 600;
		}
		.status-active {
			background: #d4edda;
			color: #155724;
		}
		.status-upcoming {
			background: #fff3cd;
			color: #856404;
		}
		.status-expired {
			background: #ffd8d8;
			color: #cc0000;
		}
		.displayon-actions a {
			color: #fff!important;
			text-decoration: none!important;
			margin-right: 10px;
			background-color: #FFAE34;
			padding: 5px 10px;
			border-radius:5px;
			font-weight:600!important;
		}
		.displayon-actions a:hover {
			-webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(66,66,66,0); 
			box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(66,66,66,0);
		}
		.displayon-actions a.delete {
			background-color: #FF3434;
		}
		.displayon-usage {
			background: #f9f9f9;
			padding: 20px;
			border-radius: 6px;
			margin-top: 30px;
			border-left: 4px solid #2271b1;
		}
		.displayon-usage h4 {
			margin-top: 0;
			color: #333;
		}
		.displayon-usage pre {
			background: #F3F3F3;
			xcolor: #f0f0f0;
			padding: 12px;
			border-radius: 4px;
			overflow-x: auto;
			font-size: 13px;
			border: 1px solid #ccc;
		}
		.displayon-empty {
			text-align: center;
			padding: 40px;
			color: #666;
			font-style: italic;
		}
		.displayon-template-example {
			background: #fff;
			border: 1px solid #ddd;
			padding: 15px;
			border-radius: 4px;
			margin-top: 10px;
		}
		.displayon-template-example h5 {
			margin-top: 0;
			color: #2271b1;
			font-size: 13px;
		}
		.displayon-template-example pre {
			background: #f5f5f5;
			padding: 10px;
			border-radius: 3px;
			font-size: 12px;
			margin: 5px 0;
			overflow-x: auto;
		}
		.wrapper a {
			text-decoration: none!important;
		}
		.displayon-accordion {
			margin-top: 10px;
			border: 1px solid #ddd;
			border-radius: 4px;
			overflow: hidden;
		}
		.displayon-accordion-header {
			background: #f5f5f5;
			padding: 12px 15px;
			cursor: pointer;
			display: flex;
			justify-content: space-between;
			align-items: center;
			transition: background 0.2s;
			user-select: none;
		}
		.displayon-accordion-header:hover {
			background: #e9e9e9;
		}
		.displayon-accordion-header strong {
			font-size: 13px;
			color: #333;
		}
		.displayon-accordion-icon {
			font-size: 12px;
			transition: transform 0.2s;
		}
		.displayon-accordion-icon.open {
			transform: rotate(180deg);
		}
		.displayon-accordion-content {
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.3s ease-out;
			background: #fff;
		}
		.displayon-accordion-content.open {
			max-height: 2000px;
			transition: max-height 0.5s ease-in;
		}
		.displayon-accordion-inner {
			padding: 15px;
		}
		
		.CodeMirror {
			border: 1px solid #ddd;
			height: auto;
			min-height: 350px;
			font-size: 14px;
			font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
		}
		.CodeMirror-scroll {
			min-height: 350px;
			max-height: 600px;
		}
		code{
			background-color:#F3F3F3;
			padding:3px;
			color:royalblue;
		}
		.cke {
			color: hotpink !important;
			visibility: visible!important;
		}
		.tpl {
			color: royalblue !important;
			visibility: visible!important;
		}
	</style>
	<?php
	
	// Show edit/add form
	if (isset($_GET['add']) || isset($_GET['edit'])) {
		$editing = isset($_GET['edit']) ? $_GET['edit'] : null;
		$block = $editing && isset($blocks[$editing]) ? $blocks[$editing] : [
			'start'	=> date('Y-m-d H:i'),
			'end'	  => date('Y-m-d') . ' 23:59',
			'content'  => '',
			'template' => ''
		];
		$key = $editing ?: '';
		
		// Parse datetime
		$start_parts = explode(' ', $block['start']);
		$start_date = $start_parts[0];
		$start_time = isset($start_parts[1]) ? $start_parts[1] : date('H:i');
		
		$end_parts = explode(' ', $block['end']);
		$end_date = $end_parts[0];
		$end_time = isset($end_parts[1]) ? $end_parts[1] : '23:59';
		
		?>
		<div class="displayon-container">
			<div class="displayon-header">
				<h3><?php echo $editing ? '✏️ ' . i18n_r('DisplayOnDate/lang_Edit') : '➕ ' . i18n_r('DisplayOnDate/lang_Add_New'); ?> <?php echo i18n_r("DisplayOnDate/lang_Block");?></h3>
				<a href="load.php?id=DisplayOnDate" class="displayon-btn"><?php echo i18n_r("DisplayOnDate/lang_Back");?></a>
			</div>
			
			<form method="post" action="load.php?id=DisplayOnDate" class="displayon-form">
				<div class="displayon-form-group">
					<label for="key"><?php echo i18n_r("DisplayOnDate/lang_Block_Key");?>:</label>
					<input type="text" id="key" name="key" value="<?php echo htmlspecialchars($key); ?>" 
						   <?php echo $editing ? 'readonly style="background: #e9ecef;"' : ''; ?> required
						   placeholder="<?php echo i18n_r("DisplayOnDate/lang_Placeholder");?>">
					<small class="displayon-form-hint">
						<?php if (!$editing): ?>
							<?php echo i18n_r("DisplayOnDate/lang_Only_letters");?>
						<?php else: ?>
							<?php echo i18n_r("DisplayOnDate/lang_cannot_be_changed");?>
						<?php endif; ?>
					</small>
				</div>
				
				<div class="displayon-form-group">
					<label for="start_date"><?php echo i18n_r("DisplayOnDate/lang_Start_Time");?>:</label>
					<div class="displayon-datetime-group">
						<input type="date" id="start_date" name="start_date" 
							   value="<?php echo htmlspecialchars($start_date); ?>" required>
						<input type="time" id="start_time" name="start_time" 
							   value="<?php echo htmlspecialchars($start_time); ?>" 
							   placeholder="HH:MM">
					</div>
					<small class="displayon-form-hint"><?php echo i18n_r("DisplayOnDate/lang_start_not_specified");?></small>
				</div>
				
				<div class="displayon-form-group">
					<label for="end_date"><?php echo i18n_r("DisplayOnDate/lang_End_Time");?>:</label>
					<div class="displayon-datetime-group">
						<input type="date" id="end_date" name="end_date" 
							   value="<?php echo htmlspecialchars($end_date); ?>" required>
						<input type="time" id="end_time" name="end_time" 
							   value="<?php echo htmlspecialchars($end_time); ?>" 
							   placeholder="HH:MM">
					</div>
					<small class="displayon-form-hint"><?php echo i18n_r("DisplayOnDate/lang_stop_not_specified");?></small>
				</div>
				
				<div class="displayon-form-group">
					<label for="content"><?php echo i18n_r("DisplayOnDate/lang_Content_to_Display");?>:</label>
					
					<textarea id="content" name="content" rows="8" required><?php echo htmlspecialchars($block['content']); ?></textarea>
					
					<small class="displayon-form-hint"><?php echo i18n_r("DisplayOnDate/lang_HTML_allowed");?></small>
				</div>
				
				<div class="displayon-form-group">
					<div class="displayon-accordion">
						<div class="displayon-accordion-header" onclick="toggleAccordion(this)">
							<strong>📝 <?php echo i18n_r("DisplayOnDate/lang_Tpl_and_Examples");?></strong>
							<span class="displayon-accordion-icon">▼</span>
						</div>
						<div class="displayon-accordion-content">
							<div class="displayon-accordion-inner">
					
								<textarea id="template" name="template" rows="10"><?php echo htmlspecialchars($block['template']); ?></textarea>
								
								<small class="displayon-form-hint">
									<?php echo i18n_r("DisplayOnDate/lang_Wrap_your_content");?>
								</small>
								
								<div class="displayon-template-example">
									<h5>📝 <?php echo i18n_r("DisplayOnDate/lang_Tpl_Examples");?>:</h5>
									
									<p><strong><?php echo i18n_r("DisplayOnDate/lang_Basic_HTML_wrapper");?>:</strong></p>
									<pre><code class="language-html">&lt;div class="announcement"&gt;
  &lt;h2&gt;Special Offer!&lt;/h2&gt;
  {{content}}
&lt;/div&gt;</code></pre>
									
									<p><strong><?php echo i18n_r("DisplayOnDate/lang_Display_end_date");?>:</strong></p>
									<pre><code class="language-html">&lt;div class="banner"&gt;
  {{content}}
  &lt;p&gt;Offer ends: &lt;?php echo date('F j, Y', $block_end_timestamp); ?&gt;&lt;/p&gt;
&lt;/div&gt;</code></pre>
									
									<p><strong><?php echo i18n_r("DisplayOnDate/lang_With_PHP_logic");?>:</strong></p>
									<pre><code class="language-html">&lt;?php if (!empty('{{content}}')): ?&gt;
  &lt;div class="banner"&gt;
	&lt;strong&gt;Limited Time:&lt;/strong&gt;
	{{content}}
  &lt;/div&gt;
&lt;?php endif; ?&gt;</code></pre>
									
									<p><strong><?php echo i18n_r("DisplayOnDate/lang_Advanced");?>:</strong></p>
									<pre><code class="language-html">&lt;div style="background: #ffeb3b; padding: 20px; border-radius: 8px;"&gt;
  &lt;div style="font-size: 18px; font-weight: bold;"&gt;
	{{content}}
  &lt;/div&gt;
  &lt;p style="margin-top: 10px; font-size: 12px;"&gt;
	&lt;?php 
	  $days_left = ceil(($block_end_timestamp - time()) / 86400);
	  echo "Ends " . date('M j', $block_end_timestamp) . " ($days_left days left)";
	?&gt;
  &lt;/p&gt;
&lt;/div&gt;</code></pre>

									<p style="margin-top: 15px;"><strong><?php echo i18n_r("DisplayOnDate/lang_Available_variables");?>:</strong></p>
									<ul style="margin-left: 20px; font-size: 12px;">
										<li><code>$block_start</code> - Start date string (e.g., "2024-12-01 09:00")</li>
										<li><code>$block_end</code> - End date string (e.g., "2024-12-31 23:59")</li>
										<li><code>$block_start_timestamp</code> - Start date Unix timestamp</li>
										<li><code>$block_end_timestamp</code> - End date Unix timestamp</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="displayon-form-group" style="margin-bottom: 0;">
					<button type="submit" name="displayon_save" class="displayon-btn displayon-btn-success">
						💾 <?php echo i18n_r("DisplayOnDate/lang_Save");?>
					</button>
					<a href="load.php?id=DisplayOnDate" class="displayon-btn displayon-btn-cancel"><?php echo i18n_r("DisplayOnDate/lang_Cancel");?></a>
				</div>
				
				<!-- ckEditor -->
				<script type="text/javascript" src="template/js/ckeditor/ckeditor.js"></script>
				<script>
				window.addEventListener("load", () => {
					if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.content === undefined) {
						CKEDITOR.replace('content', {
							skin: 'getsimple',
							forcePasteAsPlainText: true,
							defaultLanguage: '<?php echo $EDLANG; ?>',
							entities: false,
							height: '300px',
							baseHref: '',
							tabSpaces: 10,
							filebrowserBrowseUrl: 'filebrowser.php?type=all',
							filebrowserImageBrowseUrl: 'filebrowser.php?type=images',
							filebrowserWindowWidth: '730',
							filebrowserWindowHeight: '500'<?php echo $toolbar; ?><?php echo $options; ?>
						});
					}
				});
				</script>
				
				<!-- Accordion -->
				<script>
				function toggleAccordion(header) {
					const icon = header.querySelector('.displayon-accordion-icon');
					const content = header.nextElementSibling;
					
					if (content.classList.contains('open')) {
						content.classList.remove('open');
						icon.classList.remove('open');
					} else {
						content.classList.add('open');
						icon.classList.add('open');
					}
				}
				</script>
				
				<!-- CodeMirror -->
				<script>
				window.addEventListener("load", () => {
					const textarea = document.getElementById("template");
					if (textarea) {
						CodeMirror.fromTextArea(textarea, {
							theme: "blackboard",
							lineNumbers: true,
							matchBrackets: true,
							indentUnit: 4,
							indentWithTabs: true,
							lineWrapping: true,
							mode: "htmlmixed"
						});
					}
				});
				</script>
				
				<!-- Highlight.js for code examples -->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/default.min.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
				<script>hljs.highlightAll();</script>

			</form>
		</div>
		<?php
		
		display_footer();
		
		return;
	}
	
	// List view
	?>
	<div class="displayon-container">
		<div class="displayon-header">
			<h3><?php echo i18n_r("DisplayOnDate/lang_Icon") . i18n_r("DisplayOnDate/lang_Page_Title");?> <br> <span style="color:#666;font-size:.65em;font-weight:400;"><?php echo i18n_r("DisplayOnDate/lang_Description");?></span></h3>
			<a href="load.php?id=DisplayOnDate&add" class="displayon-btn">+ <?php echo i18n_r("DisplayOnDate/lang_Add_New_Block");?></a>
		</div>
		
		<?php if (empty($blocks)): ?>
			<div class="displayon-empty">
				<p>📝 <?php echo i18n_r("DisplayOnDate/lang_No_blocks");?></p>
			</div>
		<?php else: ?>
			<table class="displayon-table">
				<thead>
					<tr>
						<th><?php echo i18n_r("DisplayOnDate/lang_Key");?></th>
						<th><?php echo i18n_r("DisplayOnDate/lang_Start_Time");?></th>
						<th><?php echo i18n_r("DisplayOnDate/lang_End_Time");?></th>
						<th><?php echo i18n_r("DisplayOnDate/lang_Status");?></th>
						<th><?php echo i18n_r("DisplayOnDate/lang_Actions");?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($blocks as $key => $b): 
						$now = time();
						$start = strtotime($b['start']);
						$end = strtotime($b['end']);
						
						if ($now < $start) {
							$status = i18n_r("DisplayOnDate/lang_Upcoming");
							$status_class = 'status-upcoming';
						} elseif ($now > $end) {
							$status = i18n_r("DisplayOnDate/lang_Expired");
							$status_class = 'status-expired';
						} else {
							$status = i18n_r("DisplayOnDate/lang_Active");
							$status_class = 'status-active';
						}
					?>
					<tr>
						<td><strong><?php echo htmlspecialchars($key); ?></strong></td>
						<td><?php echo htmlspecialchars($b['start']); ?></td>
						<td><?php echo htmlspecialchars($b['end']); ?></td>
						<td><span class="displayon-status <?php echo $status_class; ?>"><?php echo $status; ?></span></td>
						<td class="displayon-actions">
							<a href="load.php?id=DisplayOnDate&edit=<?php echo urlencode($key); ?>">✏️ <?php echo i18n_r("DisplayOnDate/lang_Edit");?></a>
							<a href="load.php?id=DisplayOnDate&delete=<?php echo urlencode($key); ?>" 
							   class="delete"
							   onclick="return confirm('<?php echo i18n_r("DisplayOnDate/lang_Are_you_sure");?> \'<?php echo htmlspecialchars($key); ?>\'?')">🗑️ <?php echo i18n_r("DisplayOnDate/lang_Delete");?></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
		
		<hr>
		
		<div class="displayon-accordion">
			<div class="displayon-accordion-header" onclick="toggleAccordion(this)">
				<strong>📖 <?php echo i18n_r("DisplayOnDate/lang_Usage_Instructions");?></strong>
				<span class="displayon-accordion-icon">▼</span>
			</div>
			<div class="displayon-accordion-content">
				<div class="displayon-accordion-inner">
							
						<div class="displayon-usage">
							
							<p><strong><?php echo i18n_r("DisplayOnDate/lang_In_page");?>:</strong></p>
							<pre class="cke">[display-on <span style="font-weight:600">your-block-key</span>]</pre>
							<br>
							<p><strong><?php echo i18n_r("DisplayOnDate/lang_In_templates");?>:</strong></p>
							<pre class="tpl">&lt;?php display_on('<span style="font-weight:600">your-block-key</span>'); ?&gt;</pre>
							<br>
							<p><strong><?php echo i18n_r("DisplayOnDate/lang_How_it_works");?>:</strong></p>
							<ul style="margin-left: 20px;">
								<li><?php echo i18n_r("DisplayOnDate/lang_If_current");?></li>
								<li><?php echo i18n_r("DisplayOnDate/lang_If_a_template");?></li>
								<li><?php echo i18n_r("DisplayOnDate/lang_If_no_template");?></li>
								<li><?php echo i18n_r("DisplayOnDate/lang_Templates_support");?></li>
							</ul>
						</div>
						<!-- Accordion -->
						<script>
						function toggleAccordion(header) {
							const icon = header.querySelector('.displayon-accordion-icon');
							const content = header.nextElementSibling;
							
							if (content.classList.contains('open')) {
								content.classList.remove('open');
								icon.classList.remove('open');
							} else {
								content.classList.add('open');
								icon.classList.add('open');
							}
						}
						</script>
						
				</div>
			</div>
		</div>
		
	</div>
	
	<?php 
	
	display_footer();
}

// Sanitize filenames
if (!function_exists('sanitize_filename')) {
	function sanitize_filename($str) {
		return preg_replace('/[^a-zA-Z0-9\-_]/', '', $str);
	}
}
