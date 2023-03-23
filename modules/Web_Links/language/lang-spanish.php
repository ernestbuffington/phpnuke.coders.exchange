<?php
global $sitename;
if(!isset($anonwaitdays)) { $anonwaitdays = 0; }
if(!isset($outsidewaitdays)) { $outsidewaitdays = 0; }


/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/*                                                                        */
/* This is the language module with all the system messages               */
/*                                                                        */
/* If you made a translation, please go to the site and send to me        */
/* the translated file. Please keep the original text order by modules,   */
/* and just one message per line, also double check your translation!     */
/*                                                                        */
/* You need to change the second quoted phrase, not the capital one!      */
/*                                                                        */
/* If you need to use double quotes (") remember to add a backslash (\),  */
/* so your entry will look like: This is \"double quoted\" text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/

define_once("_URL","URL");
define_once("_PREVIOUS","Página Anterior");
define_once("_NEXT","Página Siguiente");
define_once("_YOURNAME","Tu nombre");
define_once("_CATEGORY","Categoría");
define_once("_CATEGORIES","Categorías");
define_once("_LVOTES","Votos");
define_once("_TOTALVOTES","Votos Totales:");
define_once("_LINKTITLE","Título del Enlace");
define_once("_HITS","Hits");
define_once("_THEREARE","Hay");
define_once("_NOMATCHES","No hay registros para su consulta");
define_once("_SCOMMENTS","Comentarios");
define_once("_DESCRIPTION","Descripción");
define_once("_SUBMITONCE","Enviar un único enlace de cada vez");
define_once("_POSTPENDING","Todos los enlaces enviados serán verificados.");
define_once("_CHECKFORIT","No has escrito un E-Mail. De todas maneras, revisaremos tu enlace pronto.");
define_once("_TOTALFORLAST","Número total de nuevos enlaces para los últimos");
define_once("_BESTRATED","Enlaces mejor valorados - Top");
define_once("_CATNEWTODAY","Nuevos enlaces añadidos a esta categoría hoy");
define_once("_CATLAST3DAYS","Nuevos enlaces añadidos a esta categoría en los últimos 3 días");
define_once("_CATTHISWEEK","Nuevos enlaces añadidos a esta categoría en esta semana");
define_once("_DATE1","Fecha (primero los enlaces más antiguos)");
define_once("_DATE2","Fecha (primero los enlaces más nuevos)");
define_once("_PROMOTE02","Una manera de ligar el formulario de evaluación es poner este simple texto:");
define_once("_PROMOTE03","Si quieres más que un simple texto, puedes utilizar un pequeño botón como:");
define_once("_PROMOTE04","Si haces trampas en esto, quitaremos tu enlace. Una vez aclarado esto, así es como se ve el formulario de valoración.");
define_once("_ONLYREGUSERSMODIFY","Solamente los usuarios registrados pueden proponer modificaciones. Por favor, <a href=\"modules.php?name=Your_Account\">Regístrate o Conéctate</a>.");
define_once("_LETSDECIDE","Tu información permitirá a otros visitantes decidir mejor sobre qué enlaces escoger.");
define_once("_RATENOTE4","Puedes ver una lista de <a href=\"modules.php?name=Downloads&d_op=TopRated\">los recursos más valorados</a>.");
define_once("_DATE","Fecha");
define_once("_TO","Para");
define_once("_ADDLINK","Añadir Enlace");
define_once("_NEW","Nuevo");
define_once("_POPULAR","Popular");
define_once("_TOPRATED","Mejores valorados");
define_once("_RANDOM","Aleatorio");
define_once("_LINKSMAIN","Índice");
define_once("_LINKCOMMENTS","Comentarios del enlace");
define_once("_ADDITIONALDET","Detalles adicionales");
define_once("_EDITORREVIEW","Reseña del editor");
define_once("_REPORTBROKEN","Informar de un enlace roto");
define_once("_LINKSMAINCAT","Principales Categorías de Enlaces");
define_once("_AND","y");
define_once("_INDB","en nuestra base de datos");
define_once("_ADDALINK","Agregar Nuevo Enlace");
define_once("_INSTRUCTIONS","Instrucciones");
define_once("_USERANDIP","El nombre de usuario y el IP serán registrados, así que por favor no abuses del sistema.");
define_once("_PAGETITLE","Título de la Página");
define_once("_PAGEURL","Página del URL");
define_once("_YOUREMAIL","Tu E-Mail");
define_once("_LDESCRIPTION","Descripción: (255 caracteres máx.)");
define_once("_ADDURL","Agregar este URL");
define_once("_LINKSNOTUSER1","No eres un usuario registrado o no te has conectado.");
define_once("_LINKSNOTUSER2","Si estuvieras registrado podrías añadir enlaces a este sitio web.");
define_once("_LINKSNOTUSER3","Ser un usuario registrado es rápido y fácil.");
define_once("_LINKSNOTUSER4","¿Por qué se requiere registro para acceder a algunas funciones?");
define_once("_LINKSNOTUSER5","Sólo le ofrecemos el contenido de mayor calidad,");
define_once("_LINKSNOTUSER6","cada artículo es visto y aprobado individualmente por nuestra plantilla.");
define_once("_LINKSNOTUSER7","Esperamos ofrecerte sólo información de valor.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Registrarse</a>");
define_once("_LINKALREADYEXT","ERROR: ¡Este URL ya está listado en la Base de Datos!");
define_once("_LINKNOTITLE","ERROR: ¡Necesitas escribir un Título para este Enlace!");
define_once("_LINKNOURL","ERROR: ¡Necesitas escribir una URL para este Enlace!");
define_once("_LINKNODESC","ERROR: ¡Necesitas escribir una Descripción para este Enlace!");
define_once("_LINKRECEIVED","Hemos recibido los datos del enlace que enviaste. ¡Gracias!");
define_once("_EMAILWHENADD","Recibirás un E-Mail cuando el enlace sea aprobado.");
define_once("_NEWLINKS","Nuevos enlaces");
define_once("_TOTALNEWLINKS","Total de Nuevos Enlaces");
define_once("_LASTWEEK","Ultima Semana");
define_once("_LAST30DAYS","Ultimos 30 días");
define_once("_1WEEK","1 Semana");
define_once("_2WEEKS","2 Semanas");
define_once("_30DAYS","30 Días");
define_once("_SHOW","Ver");
define_once("_DAYS","días");
define_once("_ADDEDON","Agregado el");
define_once("_RATING","Valoración");
define_once("_RATESITE","Valore este Sitio");
define_once("_DETAILS","Detalles");
define_once("_OF","de");
define_once("_TRATEDLINKS","total enlaces Valorados");
define_once("_TVOTESREQ","mínimo de votos necesarios");
define_once("_SHOWTOP","Mostrar Top");
define_once("_MOSTPOPULAR","Más Popular - Top");
define_once("_OFALL","de todo");
define_once("_SORTLINKSBY","Ordenar enlaces por");
define_once("_SITESSORTED","Sitios clasificados por");
define_once("_POPULARITY","Popularidad");
define_once("_SELECTPAGE","Seleccionar Página");
define_once("_MAIN","Principal");
define_once("_NEWTODAY","Nuevo Hoy");
define_once("_NEWLAST3DAYS","Nuevo en los últimos 3 días");
define_once("_NEWTHISWEEK","Nuevo esta semana");
define_once("_POPULARITY1","Popularidad (de menos a más hits)");
define_once("_POPULARITY2","Popularidad (de más a menos hits)");
define_once("_TITLEAZ","Título (A - Z)");
define_once("_TITLEZA","Título (Z - A)");
define_once("_RATING1","Valoración (de menor a mayor)");
define_once("_RATING2","Valoración (de mayor a menor)");
define_once("_SEARCHRESULTS4","Buscar resultados por");
define_once("_USUBCATEGORIES","Sub-Categorías");
define_once("_LINKS","Enlaces");
define_once("_TRY2SEARCH","Intenta buscar");
define_once("_INOTHERSENGINES","en otros Motores de Búsqueda");
define_once("_EDITORIAL","Editorial");
define_once("_LINKPROFILE","Perfil del enlace");
define_once("_EDITORIALBY","Editorial por");
define_once("_NOEDITORIAL","El editorial no está actualmente disponible en este sitio web.");
define_once("_VISITTHISSITE","Visitar este sitio web");
define_once("_RATETHISSITE","Valorar este sitio web");
define_once("_ISTHISYOURSITE","¿Es este tu recurso?");
define_once("_ALLOWTORATE","Permite que los usuarios lo valoren desde tu sitio Web");
define_once("_LINKRATINGDET","detalle de valoración de enlaces");
define_once("_OVERALLRATING","Valoración General");
define_once("_TOTALOF","Total de");
define_once("_USER","Usuario");
define_once("_USERAVGRATING","Valoración promedio de los usuarios");
define_once("_NUMRATINGS","Num. de valoraciones");
define_once("_EDITTHISLINK","Editar Enlace");
define_once("_REGISTEREDUSERS","Usuarios registrados");
define_once("_NUMBEROFRATINGS","Número de valoraciones");
define_once("_NOREGUSERSVOTES","No hay votos de usuarios registrados");
define_once("_BREAKDOWNBYVAL","Histograma por valoración");
define_once("_LTOTALVOTES","votos totales");
define_once("_LINKRATING","Enlaces valorados");
define_once("_HIGHRATING","Alta valoración");
define_once("_LOWRATING","Baja valoración");
define_once("_NUMOFCOMMENTS","Número de comentarios");
define_once("_WEIGHNOTE","* Nota: Este sitio diferencia los votos de los usuarios registrados de los no registrados");
define_once("_NOUNREGUSERSVOTES","No hay votos de no registrados");
define_once("_WEIGHOUTNOTE","** Nota: Este sitio diferencia los votos de los usuarios registrados de los foráneos");
define_once("_NOOUTSIDEVOTES","Votos de usuarios");
define_once("_OUTSIDEVOTERS","Votos de anónimos");
define_once("_UNREGISTEREDUSERS","Usuarios no registrados");
define_once("_PROMOTEYOURSITE","Promover tu sitio web");
define_once("_PROMOTE01","Tal vez te interesa unas de la opciones que tenemos para la 'Valoración de otros sitios'. Estas te permiten poner una imagen (o un formulario de votación) en tu sitio Web para incrementar sus votos. Por favor elige una de estas opciones:");
define_once("_TEXTLINK","Texto del enlace");
define_once("_HTMLCODE1","El código HTML que puedes usar en este caso, es el siguiente:");
define_once("_THENUMBER","El Número");
define_once("_IDREFER","en el código HTML referencia tu ID de sitio en la Base de Datos de $sitename. Verifica que este número este presente.");
define_once("_BUTTONLINK","Botón de Enlace");
define_once("_RATEIT","Vota por este sitio");
define_once("_HTMLCODE2","El código fuente para el botón anterior es:");
define_once("_REMOTEFORM","Formulario de valoración remota");
define_once("_VOTE4THISSITE","Votar por este sitio");
define_once("_LINKVOTE","Votar");
define_once("_HTMLCODE3","Usando este formulario permitirá a los usuarios valorar tu sitio directamente desde tu página y será grabada aquí. El formulario anterior está desconectado, pero el siguiente código trabajará si lo copias y pegas en tu página. El código es el siguiente:");
define_once("_PROMOTE05","¡Gracias!, y buena suerte con tu valoración.");
define_once("_STAFF","Plantilla");
define_once("_THANKSBROKEN","Gracias por ayudar a mantener la integridad de este directorio.");
define_once("_THANKSFORINFO","Gracias por la información.");
define_once("_LOOKTOREQUEST","Analizaremos tu petición pronto.");
define_once("_REQUESTLINKMOD","Pedir modifiación de Enlace");
define_once("_LINKID","ID del Enlace");
define_once("_SENDREQUEST","Enviar Petición");
define_once("_THANKSTOTAKETIME","Gracias por tu tiempo en la evaluación de este sitio en");
define_once("_RETURNTO","Volver a");
define_once("_RATENOTE1","Por favor no votes por el mismo enlace más de una vez");
define_once("_RATENOTE2","La escala va de 1 a 10, siendo 1 Pobre y 10 Excelente.");
define_once("_RATENOTE3","Trate de ser objetivo en tu voto, si se recibe siempre 1 ó 10, la valoración no será útil.");
define_once("_RATENOTE5","No votes por tu propio recurso o el de tu competidor.");
define_once("_YOUAREREGGED","Eres un usuario registrado y estás conectado.");
define_once("_FEELFREE2ADD","Siéntete libre de agregar un comentario sobre este sitio.");
define_once("_YOUARENOTREGGED","No eres un usuario registrado o no estás conectado.");
define_once("_IFYOUWEREREG","Si estuvieras registrado podrías haber publicado comentarios en este sitio web.");
define_once("_WEBLINKS","Enlaces");
define_once("_TITLE","Título");
define_once("_MODIFY","Modificar");
define_once("_COMPLETEVOTE1","Tu vote es apreciado.");
define_once("_COMPLETEVOTE2","Tú ya has votado por este recurso en los pasados $outsidewaitdays día(s).");
define_once("_COMPLETEVOTE3","Vota por un recurso sólo una vez.<br>Todos los votos serán revisados.");
define_once("_COMPLETEVOTE4","No puedes votar por un recurso que tú enviaste.<br>Todos los votos serán revisados.");
define_once("_COMPLETEVOTE5","No has seleccionado un valor - Voto no registrado");
define_once("_COMPLETEVOTE6","Sólo se admite un voto por dirección IP cada $outsidewaitdays día(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

