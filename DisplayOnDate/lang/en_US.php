<?php

$i18n = [
	
# Basics
	'lang_Menu_Title'			=>	'Display On Date 📅',
	
	'lang_Tab_Title'			=>	'Scheduled',
	'lang_Page_Title'			=>	'Display On Date',
	'lang_Description'			=>	'Schedule content blocks to display during specified dates using shortcodes or PHP calls.',
	
	'lang_Icon'					=>	' <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;" width="1.2em" height="1.2em" viewBox="0 0 14 14"><rect width="14" height="14" fill="none"/><g fill="none"><path fill="#2859c5" fill-rule="evenodd" d="M3.5 0a1 1 0 0 1 1 1v1h5V1a1 1 0 0 1 2 0v1h1A1.5 1.5 0 0 1 14 3.5v1H0v-1A1.5 1.5 0 0 1 1.5 2h1V1a1 1 0 0 1 1-1" clip-rule="evenodd"/><path fill="#8fbffa" d="M0 4.5h14v8a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 0 12.5z"/><path fill="#2859c5" fill-rule="evenodd" d="M8.563 5.823a.25.25 0 0 0-.354 0L4.086 9.955a.25.25 0 0 0-.07.142l-.264 1.868a.25.25 0 0 0 .282.283l1.868-.255a.25.25 0 0 0 .143-.07l4.132-4.132a.25.25 0 0 0 0-.354z" clip-rule="evenodd"/></g></svg> ',
	
	'lang_Icon_Menu'			=>	' <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;padding-right:5px;" width="1.2em" height="1.2em" viewBox="0 0 14 14"><rect width="14" height="14" fill="none"/><path fill="currentColor" fill-rule="evenodd" d="M3.5.25c.345 0 .625.28.625.625V2h5.75V.875a.625.625 0 1 1 1.25 0V2H12a1.625 1.625 0 0 1 1.625 1.625v8.25A1.625 1.625 0 0 1 12 13.5H2a1.625 1.625 0 0 1-1.625-1.625v-8.25A1.625 1.625 0 0 1 2 2h.875V.875c0-.345.28-.625.625-.625m6.375 3v.625a.625.625 0 1 0 1.25 0V3.25H12a.375.375 0 0 1 .375.375v8.25a.375.375 0 0 1-.375.375H2a.375.375 0 0 1-.375-.375v-8.25A.375.375 0 0 1 2 3.25h.875v.625a.625.625 0 1 0 1.25 0V3.25zM8.135 5a.5.5 0 0 1 .355.146l1.614 1.614a.5.5 0 0 1 0 .708l-3.632 3.631a.5.5 0 0 1-.286.142l-1.869.254a.5.5 0 0 1-.562-.565l.263-1.868a.5.5 0 0 1 .141-.284l3.623-3.631A.5.5 0 0 1 8.136 5" clip-rule="evenodd"/></svg> ',
	
# General
	'lang_No_blocks'			=>	'No blocks created yet. Click "Add New Block" to get started!',
	
	'lang_Add_New_Block'		=>	'Add New Block',
	'lang_Key'					=>	'Key',
	'lang_Start_Time'			=>	'Start Date/Time',
	'lang_End_Time'				=>	'End Date/Time',
	
	'lang_Status'				=>	'Status',
	'lang_Active'				=>	'Active',
	'lang_Upcoming'				=>	'Upcoming',
	'lang_Expired'				=>	'Expired',
	
	'lang_Actions'				=>	'Actions',
	'lang_Edit'					=>	'Edit',
	'lang_Delete'				=>	'Delete',
	'lang_Are_you_sure'			=>	'Are you sure you want to delete block',
	'lang_Block_deleted'		=>	'Block deleted successfully!',
	
	'lang_Usage_Instructions'	=>	'Usage Instructions',
	'lang_In_page'				=>	'In page content (shortcode)',
	'lang_In_templates'			=>	'In templates (PHP)',
	
	'lang_How_it_works'			=>	'How it works',
	'lang_If_current'			=>	'If current date/time is within range, the content is shown',
	'lang_If_a_template'		=>	'If a template is defined, it wraps the content using the <code>{{content}}</code> placeholder',
	'lang_If_no_template'		=>	'If no template is defined, content displays directly',
	'lang_Templates_support'	=>	'Templates support both HTML and PHP code',
	
	'lang_Add_New'				=>	'Add New',
	'lang_Block'				=>	'Block',
	'lang_Block_Key'			=>	'Block Key (slug)',
	'lang_Placeholder'			=>	'e.g., summer-sale or holiday-banner',
	'lang_Only_letters'			=>	'Only letters, numbers, hyphens and underscores. Spaces will be converted to hyphens.',
	'lang_start_not_specified'	=>	'If time is not specified, current time will be used.',
	'lang_stop_not_specified'	=>	'If time is not specified, 23:59 will be used.',
	'lang_cannot_be_changed'	=>	'Keys cannot be changed after creation.',
	'lang_Back'					=>	'Back',
	
	'lang_Content_to_Display'	=>	'Content to Display',
	'lang_HTML_allowed'			=>	'HTML allowed. Shown when current date/time is within the specified range. Use <code>{{content}}</code> in the template to display this content.',
	'lang_Template'				=>	'Template (optional)',
	'lang_Wrap_your_content'	=>	'Wrap your content with HTML/PHP. Use <code>{{content}}</code> as a placeholder for the block content. If empty, content displays directly. PHP code is allowed.',
	
	'lang_Tpl_and_Examples'		=>	'Template & Examples',
	'lang_Tpl_Examples'			=>	'Template Examples',
	'lang_Basic_HTML_wrapper'	=>	'Basic HTML wrapper',
	'lang_Display_end_date'		=>	'Display end date',
	'lang_With_PHP_logic'		=>	'With PHP logic',
	'lang_Advanced'				=>	'Advanced - countdown to end',
	'lang_Available_variables'	=>	'Available variables in templates',
	
	'lang_Save'					=>	'Save Block',
	'lang_Block_saved'			=>	'Block saved successfully!',
	'lang_Cancel'				=>	'Cancel',
	
];
