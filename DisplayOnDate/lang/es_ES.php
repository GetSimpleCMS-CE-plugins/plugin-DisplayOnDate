<?php

$i18n = [
	
# Basics
	'lang_Menu_Title'			=>	'Mostrar por Fecha 📅',
	
	'lang_Tab_Title'			=>	'Programado',
	'lang_Page_Title'			=>	'Mostrar por Fecha',
	'lang_Description'			=>	'Programa bloques de contenido para que se muestren entre fechas específicas usando shortcodes o llamadas PHP.',
	
	'lang_Icon'					=>	' <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;" width="1.2em" height="1.2em" viewBox="0 0 14 14"><rect width="14" height="14" fill="none"/><g fill="none"><path fill="#2859c5" fill-rule="evenodd" d="M3.5 0a1 1 0 0 1 1 1v1h5V1a1 1 0 0 1 2 0v1h1A1.5 1.5 0 0 1 14 3.5v1H0v-1A1.5 1.5 0 0 1 1.5 2h1V1a1 1 0 0 1 1-1" clip-rule="evenodd"/><path fill="#8fbffa" d="M0 4.5h14v8a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 0 12.5z"/><path fill="#2859c5" fill-rule="evenodd" d="M8.563 5.823a.25.25 0 0 0-.354 0L4.086 9.955a.25.25 0 0 0-.07.142l-.264 1.868a.25.25 0 0 0 .282.283l1.868-.255a.25.25 0 0 0 .143-.07l4.132-4.132a.25.25 0 0 0 0-.354z" clip-rule="evenodd"/></g></svg> ',
	
	'lang_Icon_Menu'			=>	' <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;padding-right:5px;" width="22px" height="22px" viewBox="0 0 14 14"><rect width="14" height="14" fill="none"/><path fill="currentColor" fill-rule="evenodd" d="M3.5.25c.345 0 .625.28.625.625V2h5.75V.875a.625.625 0 1 1 1.25 0V2H12a1.625 1.625 0 0 1 1.625 1.625v8.25A1.625 1.625 0 0 1 12 13.5H2a1.625 1.625 0 0 1-1.625-1.625v-8.25A1.625 1.625 0 0 1 2 2h.875V.875c0-.345.28-.625.625-.625m6.375 3v.625a.625.625 0 1 0 1.25 0V3.25H12a.375.375 0 0 1 .375.375v8.25a.375.375 0 0 1-.375.375H2a.375.375 0 0 1-.375-.375v-8.25A.375.375 0 0 1 2 3.25h.875v.625a.625.625 0 1 0 1.25 0V3.25zM8.135 5a.5.5 0 0 1 .355.146l1.614 1.614a.5.5 0 0 1 0 .708l-3.632 3.631a.5.5 0 0 1-.286.142l-1.869.254a.5.5 0 0 1-.562-.565l.263-1.868a.5.5 0 0 1 .141-.284l3.623-3.631A.5.5 0 0 1 8.136 5" clip-rule="evenodd"/></svg> ',
	
# General
	'lang_No_blocks'			=>	'Aún no se han creado bloques. ¡Haz clic en "Añadir Nuevo Bloque" para empezar!',
	
	'lang_Add_New_Block'		=>	'Añadir Nuevo Bloque',
	'lang_Key'					=>	'Clave',
	'lang_Start_Time'			=>	'Fecha/hora de inicio',
	'lang_End_Time'				=>	'Fecha/hora de fin',
	
	'lang_Status'				=>	'Estado',
	'lang_Active'				=>	'Activo',
	'lang_Upcoming'				=>	'Próximo',
	'lang_Expired'				=>	'Caducado',
	
	'lang_Actions'				=>	'Acciones',
	'lang_Edit'					=>	'Editar',
	'lang_Delete'				=>	'Eliminar',
	'lang_Are_you_sure'			=>	'¿Seguro que deseas eliminar el bloque',
	'lang_Block_deleted'		=>	'¡Bloque eliminado correctamente!',
	
	'lang_Usage_Instructions'	=>	'Instrucciones de uso',
	'lang_In_page'				=>	'En el contenido de la página (shortcode)',
	'lang_In_templates'			=>	'En plantillas (PHP)',
	
	'lang_How_it_works'			=>	'Cómo funciona',
	'lang_If_current'			=>	'Si la fecha/hora actual está dentro del rango, el contenido se muestra',
	'lang_If_a_template'		=>	'Si se define una plantilla, esta envuelve el contenido usando el marcador <code>{{content}}</code>',
	'lang_If_no_template'		=>	'Si no se define ninguna plantilla, el contenido se muestra directamente',
	'lang_Templates_support'	=>	'Las plantillas admiten código HTML y PHP',
	
	'lang_Add_New'				=>	'Añadir Nuevo',
	'lang_Block'				=>	'Bloque',
	'lang_Block_Key'			=>	'Clave del bloque (slug)',
	'lang_Placeholder'			=>	'ej., oferta-verano o banner-navidad',
	'lang_Only_letters'			=>	'Solo letras, números, guiones y guiones bajos. Los espacios se convertirán en guiones.',
	'lang_start_not_specified'	=>	'Si no se especifica la hora, se usará la hora actual.',
	'lang_stop_not_specified'	=>	'Si no se especifica la hora, se usará las 23:59.',
	'lang_cannot_be_changed'	=>	'Las claves no pueden modificarse después de su creación.',
	'lang_Back'					=>	'Volver',
	
	'lang_Content_to_Display'	=>	'Contenido a mostrar',
	'lang_HTML_allowed'			=>	'HTML permitido. Se muestra cuando la fecha/hora actual está dentro del rango especificado. Usa <code>{{content}}</code> en la plantilla para mostrar este contenido.',
	'lang_Template'				=>	'Plantilla (opcional)',
	'lang_Wrap_your_content'	=>	'Envuelve tu contenido con HTML/PHP. Usa <code>{{content}}</code> como marcador para el contenido del bloque. Si se deja vacío, el contenido se muestra directamente. Se permite código PHP.',
	
	'lang_Tpl_and_Examples'		=>	'Plantillas y Ejemplos',
	'lang_Tpl_Examples'			=>	'Ejemplos de Plantillas',
	'lang_Basic_HTML_wrapper'	=>	'Envoltorio HTML básico',
	'lang_Display_end_date'		=>	'Mostrar fecha de finalización',
	'lang_With_PHP_logic'		=>	'Con lógica PHP',
	'lang_Advanced'				=>	'Avanzado – cuenta atrás hasta el final',
	'lang_Available_variables'	=>	'Variables disponibles en las plantillas',
	
	'lang_Save'					=>	'Guardar Bloque',
	'lang_Block_saved'			=>	'¡Bloque guardado correctamente!',
	'lang_Cancel'				=>	'Cancelar',
	
];
