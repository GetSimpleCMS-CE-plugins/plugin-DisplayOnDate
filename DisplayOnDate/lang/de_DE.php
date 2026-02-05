<?php

$i18n = [
	
# Basics
	'lang_Menu_Title'			=>	'Anzeige nach Datum 📅',
	
	'lang_Tab_Title'			=>	'Geplant',
	'lang_Page_Title'			=>	'Anzeige nach Datum',
	'lang_Description'			=>	'Plane Inhaltsblöcke, die innerhalb bestimmter Zeiträume per Shortcode oder PHP-Aufruf angezeigt werden.',
	
	'lang_Icon'					=>	' <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;" width="1.2em" height="1.2em" viewBox="0 0 14 14"><rect width="14" height="14" fill="none"/><g fill="none"><path fill="#2859c5" fill-rule="evenodd" d="M3.5 0a1 1 0 0 1 1 1v1h5V1a1 1 0 0 1 2 0v1h1A1.5 1.5 0 0 1 14 3.5v1H0v-1A1.5 1.5 0 0 1 1.5 2h1V1a1 1 0 0 1 1-1" clip-rule="evenodd"/><path fill="#8fbffa" d="M0 4.5h14v8a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 0 12.5z"/><path fill="#2859c5" fill-rule="evenodd" d="M8.563 5.823a.25.25 0 0 0-.354 0L4.086 9.955a.25.25 0 0 0-.07.142l-.264 1.868a.25.25 0 0 0 .282.283l1.868-.255a.25.25 0 0 0 .143-.07l4.132-4.132a.25.25 0 0 0 0-.354z" clip-rule="evenodd"/></g></svg> ',
	
	'lang_Icon_Menu'			=>	' <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;padding-right:5px;" width="22px" height="22px" viewBox="0 0 14 14"><rect width="14" height="14" fill="none"/><path fill="currentColor" fill-rule="evenodd" d="M3.5.25c.345 0 .625.28.625.625V2h5.75V.875a.625.625 0 1 1 1.25 0V2H12a1.625 1.625 0 0 1 1.625 1.625v8.25A1.625 1.625 0 0 1 12 13.5H2a1.625 1.625 0 0 1-1.625-1.625v-8.25A1.625 1.625 0 0 1 2 2h.875V.875c0-.345.28-.625.625-.625m6.375 3v.625a.625.625 0 1 0 1.25 0V3.25H12a.375.375 0 0 1 .375.375v8.25a.375.375 0 0 1-.375.375H2a.375.375 0 0 1-.375-.375v-8.25A.375.375 0 0 1 2 3.25h.875v.625a.625.625 0 1 0 1.25 0V3.25zM8.135 5a.5.5 0 0 1 .355.146l1.614 1.614a.5.5 0 0 1 0 .708l-3.632 3.631a.5.5 0 0 1-.286.142l-1.869.254a.5.5 0 0 1-.562-.565l.263-1.868a.5.5 0 0 1 .141-.284l3.623-3.631A.5.5 0 0 1 8.136 5" clip-rule="evenodd"/></svg> ',
	
# General
	'lang_No_blocks'			=>	'Es wurden noch keine Blöcke erstellt. Klicke auf „Neuen Block hinzufügen“, um zu beginnen.',
	
	'lang_Add_New_Block'		=>	'Neuen Block hinzufügen',
	'lang_Key'					=>	'Schlüssel',
	'lang_Start_Time'			=>	'Startdatum/-uhrzeit',
	'lang_End_Time'				=>	'Enddatum/-uhrzeit',
	
	'lang_Status'				=>	'Status',
	'lang_Active'				=>	'Aktiv',
	'lang_Upcoming'				=>	'Bevorstehend',
	'lang_Expired'				=>	'Abgelaufen',
	
	'lang_Actions'				=>	'Aktionen',
	'lang_Edit'					=>	'Bearbeiten',
	'lang_Delete'				=>	'Löschen',
	'lang_Are_you_sure'			=>	'Möchten Sie den Block wirklich löschen',
	'lang_Block_deleted'		=>	'Block erfolgreich gelöscht!',
	
	'lang_Usage_Instructions'	=>	'Anleitung',
	'lang_In_page'				=>	'Im Seiteninhalt (Shortcode)',
	'lang_In_templates'			=>	'In templates (PHP)',
	
	'lang_How_it_works'			=>	'So funktioniert es',
	'lang_If_current'			=>	'Wenn das aktuelle Datum/die Uhrzeit im Bereich liegt, wird der Inhalt angezeigt',
	'lang_If_a_template'		=>	'Wenn ein Template definiert ist, umschließt es den Inhalt mit dem Platzhalter <code>{{content}}</code>',
	'lang_If_no_template'		=>	'Wenn kein Template definiert ist, wird der Inhalt direkt angezeigt',
	'lang_Templates_support'	=>	'Templates unterstützen HTML- und PHP-Code',
	
	'lang_Add_New'				=>	'Neu hinzufügen',
	'lang_Block'				=>	'Block',
	'lang_Block_Key'			=>	'Block-Schlüssel (Slug)',
	'lang_Placeholder'			=>	'z. B. sommer-aktion oder feiertags-banner',
	'lang_Only_letters'			=>	'Nur Buchstaben, Zahlen, Bindestriche und Unterstriche. Leerzeichen werden in Bindestriche umgewandelt.',
	'lang_start_not_specified'	=>	'Wenn keine Uhrzeit angegeben ist, wird die aktuelle Uhrzeit verwendet.',
	'lang_stop_not_specified'	=>	'Wenn keine Uhrzeit angegeben ist, wird 23:59 verwendet.',
	'lang_cannot_be_changed'	=>	'Schlüssel können nach der Erstellung nicht geändert werden.',
	'lang_Back'					=>	'Zurück',
	
	'lang_Content_to_Display'	=>	'Anzuzeigender Inhalt',
	'lang_HTML_allowed'			=>	'HTML erlaubt. Wird angezeigt, wenn das aktuelle Datum/die Uhrzeit im angegebenen Bereich liegt. Verwenden Sie <code>{{content}}</code> im Template.',
	'lang_Template'				=>	'Template (optional)',
	'lang_Wrap_your_content'	=>	'Umschließen Sie Ihren Inhalt mit HTML/PHP. Verwenden Sie <code>{{content}}</code> als Platzhalter. Wenn leer, wird der Inhalt direkt angezeigt. PHP-Code ist erlaubt.',
	
	'lang_Tpl_and_Examples'		=>	'Templates & Beispiele',
	'lang_Tpl_Examples'			=>	'Template-Beispiele',
	'lang_Basic_HTML_wrapper'	=>	'Einfacher HTML-Wrapper',
	'lang_Display_end_date'		=>	'Enddatum anzeigen',
	'lang_With_PHP_logic'		=>	'Mit PHP-Logik',
	'lang_Advanced'				=>	'Erweitert – Countdown bis zum Ende',
	'lang_Available_variables'	=>	'Verfügbare Variablen in Templates',
	
	'lang_Save'					=>	'Block speichern',
	'lang_Block_saved'			=>	'Block erfolgreich gespeichert!',
	'lang_Cancel'				=>	'Abbrechen',
	
];
