<?php

$i18n = [
	
# Basics
	'lang_Menu_Title'			=>	'Wyświetlanie wg daty 📅',
	
	'lang_Tab_Title'			=>	'Zaplanowany',
	'lang_Page_Title'			=>	'Wyświetlanie wg daty',
	'lang_Description'			=>	'Planuj wyświetlanie bloków treści w określonych przedziałach czasowych za pomocą shortcode’ów lub wywołań PHP.',
	
	'lang_Icon'					=>	' <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;" width="1.2em" height="1.2em" viewBox="0 0 14 14"><rect width="14" height="14" fill="none"/><g fill="none"><path fill="#2859c5" fill-rule="evenodd" d="M3.5 0a1 1 0 0 1 1 1v1h5V1a1 1 0 0 1 2 0v1h1A1.5 1.5 0 0 1 14 3.5v1H0v-1A1.5 1.5 0 0 1 1.5 2h1V1a1 1 0 0 1 1-1" clip-rule="evenodd"/><path fill="#8fbffa" d="M0 4.5h14v8a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 0 12.5z"/><path fill="#2859c5" fill-rule="evenodd" d="M8.563 5.823a.25.25 0 0 0-.354 0L4.086 9.955a.25.25 0 0 0-.07.142l-.264 1.868a.25.25 0 0 0 .282.283l1.868-.255a.25.25 0 0 0 .143-.07l4.132-4.132a.25.25 0 0 0 0-.354z" clip-rule="evenodd"/></g></svg> ',
	
	'lang_Icon_Menu'			=>	' <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;padding-right:5px;" width="22px" height="22px" viewBox="0 0 14 14"><rect width="14" height="14" fill="none"/><path fill="currentColor" fill-rule="evenodd" d="M3.5.25c.345 0 .625.28.625.625V2h5.75V.875a.625.625 0 1 1 1.25 0V2H12a1.625 1.625 0 0 1 1.625 1.625v8.25A1.625 1.625 0 0 1 12 13.5H2a1.625 1.625 0 0 1-1.625-1.625v-8.25A1.625 1.625 0 0 1 2 2h.875V.875c0-.345.28-.625.625-.625m6.375 3v.625a.625.625 0 1 0 1.25 0V3.25H12a.375.375 0 0 1 .375.375v8.25a.375.375 0 0 1-.375.375H2a.375.375 0 0 1-.375-.375v-8.25A.375.375 0 0 1 2 3.25h.875v.625a.625.625 0 1 0 1.25 0V3.25zM8.135 5a.5.5 0 0 1 .355.146l1.614 1.614a.5.5 0 0 1 0 .708l-3.632 3.631a.5.5 0 0 1-.286.142l-1.869.254a.5.5 0 0 1-.562-.565l.263-1.868a.5.5 0 0 1 .141-.284l3.623-3.631A.5.5 0 0 1 8.136 5" clip-rule="evenodd"/></svg> ',
	
# General
	'lang_No_blocks'			=>	'Nie utworzono jeszcze żadnych bloków. Kliknij „Dodaj nowy blok”, aby rozpocząć!',
	
	'lang_Add_New_Block'		=>	'Dodaj nowy blok',
	'lang_Key'					=>	'Klucz',
	'lang_Start_Time'			=>	'Data/godzina rozpoczęcia',
	'lang_End_Time'				=>	'Data/godzina zakończenia',
	
	'lang_Days_to_Display'		=> 'Wyświetlaj w dni tygodnia',
	'lang_All_Days'				=> 'Wszystkie dni',
	'lang_Mon'					=> 'Pon',
	'lang_Tue'					=> 'Wt',
	'lang_Wed'					=> 'Śr',
	'lang_Thu'					=> 'Czw',
	'lang_Fri'					=> 'Pt',
	'lang_Sat'					=> 'Sob',
	'lang_Sun'					=> 'Niedz',
	
	'lang_Status'				=>	'Status',
	'lang_Active'				=>	'Aktywny',
	'lang_Upcoming'				=>	'Nadchodzący',
	'lang_Expired'				=>	'Wygasły',
	
	'lang_Actions'				=>	'Akcje',
	'lang_Edit'					=>	'Edytuj',
	'lang_Delete'				=>	'Usuń',
	'lang_Are_you_sure'			=>	'Czy na pewno chcesz usunąć blok',
	'lang_Block_deleted'		=>	'Blok został pomyślnie usunięty!',
	
	'lang_Usage_Instructions'	=>	'Instrukcja użycia',
	'lang_In_page'				=>	'W treści strony (shortcode)',
	'lang_In_templates'			=>	'W szablonach (PHP)',
	
	'lang_How_it_works'			=>	'Jak to działa',
	'lang_If_current'			=>	'Jeśli aktualna data/godzina mieści się w zakresie, treść zostanie wyświetlona',
	'lang_If_a_template'		=>	'Jeśli zdefiniowano szablon, otacza on treść za pomocą znacznika <code>{{content}}</code>',
	'lang_If_no_template'		=>	'Jeśli nie zdefiniowano szablonu, treść jest wyświetlana bezpośrednio',
	'lang_Templates_support'	=>	'Szablony obsługują kod HTML i PHP',
	
	'lang_Add_New'				=>	'Dodaj nowy',
	'lang_Block'				=>	'Blok',
	'lang_Block_Key'			=>	'Klucz bloku (slug)',
	'lang_Placeholder'			=>	'np. letnia-promocja lub baner-swiateczny',
	'lang_Only_letters'			=>	'Tylko litery, cyfry, myślniki i podkreślenia. Spacje zostaną zamienione na myślniki.',
	'lang_start_not_specified'	=>	'Jeśli nie podano godziny, zostanie użyta bieżąca godzina.',
	'lang_stop_not_specified'	=>	'Jeśli nie podano godziny, zostanie użyta 23:59.',
	'lang_cannot_be_changed'	=>	'Kluczy nie można zmieniać po utworzeniu.',
	'lang_Back'					=>	'Wstecz',
	
	'lang_Content_to_Display'	=>	'Treść do wyświetlenia',
	'lang_HTML_allowed'			=>	'HTML dozwolony. Wyświetlane, gdy aktualna data/godzina mieści się w określonym zakresie. Użyj <code>{{content}}</code> w szablonie.',
	'lang_Template'				=>	'Szablon (opcjonalnie)',
	'lang_Wrap_your_content'	=>	'Owiń treść kodem HTML/PHP. Użyj <code>{{content}}</code> jako znacznika treści bloku. Jeśli puste, treść zostanie wyświetlona bezpośrednio. Kod PHP jest dozwolony.',
	
	'lang_Tpl_and_Examples'		=>	'Szablony i przykłady',
	'lang_Tpl_Examples'			=>	'Przykłady szablonów',
	'lang_Basic_HTML_wrapper'	=>	'Podstawowy wrapper HTML',
	'lang_Display_end_date'		=>	'Wyświetl datę zakończenia',
	'lang_With_PHP_logic'		=>	'Z logiką PHP',
	'lang_Advanced'				=>	'Zaawansowane – odliczanie do końca',
	'lang_Available_variables'	=>	'Dostępne zmienne w szablonach',
	
	'lang_Save'					=>	'Zapisz blok',
	'lang_Block_saved'			=>	'Blok zapisany pomyślnie!',
	'lang_Cancel'				=>	'Anuluj',
	
];
