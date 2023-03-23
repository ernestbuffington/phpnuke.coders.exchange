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
define_once("_PREVIOUS","Páxina anterior");
define_once("_NEXT","Páxina seguinte");
define_once("_YOURNAME","O seu nome");
define_once("_CATEGORY","Categoría");
define_once("_CATEGORIES","Categorías");
define_once("_LVOTES","Votos");
define_once("_TOTALVOTES","Votos Totales:");
define_once("_LINKTITLE","Título do Enlace");
define_once("_HITS","Hits");
define_once("_THEREARE","Hai");
define_once("_NOMATCHES","Non hai rexistros para a súa consulta");
define_once("_SCOMMENTS","Comentarios");
define_once("_DESCRIPTION","Descripción");
define_once("_SUBMITONCE","Enviar un único enlace de cada vez");
define_once("_POSTPENDING","Tódo-los enlaces enviados serán verificados.");
define_once("_CHECKFORIT","Non escribiu un E-Mail. De tóda-las maneiras, revisaremos o seu enlace pronto.");
define_once("_TOTALFORLAST","Número total de novos enlaces para os últimos");
define_once("_BESTRATED","Enlaces mellor valorados - Top");
define_once("_CATNEWTODAY","Novos enlaces engadidos a esta categoría hoxe");
define_once("_CATLAST3DAYS","Novos enlaces engadidos a esta categoría nos últimos 3 días");
define_once("_CATTHISWEEK","Novos enlaces engadidos a esta categoría nesta semana");
define_once("_DATE1","Fecha (primeiro os enlaces máis antigos)");
define_once("_DATE2","Fecha (primeiro os enlaces máis novos)");
define_once("_PROMOTE02","Unha maneira de liga-lo formulario de evaluación é por este simple texto:");
define_once("_PROMOTE03","Se quere máis que un simple texto, pode utilizar un pequeno botón como:");
define_once("_PROMOTE04","Se fai trampas nisto, quitaremos o seu enlace. Isto é como aparece o formulario de valoración.");
define_once("_ONLYREGUSERSMODIFY","Somentes os usuarios rexistrados poden propor modificacións. Por favor, <a href=\"modules.php?name=Your_Account\">Rexístrese ou Conéctese</a>.");
define_once("_LETSDECIDE","A súa información permitirá a outros visitantes decidir mellor sobre que enlaces facer clic.");
define_once("_RATENOTE4","Pode ver unha lista dos <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">recursos máis valorados</a>.");
define_once("_DATE","Fecha");
define_once("_TO","Para");
define_once("_ADDLINK","Engadir enlace");
define_once("_NEW","Novo");
define_once("_POPULAR","Popular");
define_once("_TOPRATED","Mellores valorados");
define_once("_RANDOM","Aleatorio");
define_once("_LINKSMAIN","Índice");
define_once("_LINKCOMMENTS","Comentarios do enlace");
define_once("_ADDITIONALDET","Detalles adicionales");
define_once("_EDITORREVIEW","Reseña do editor");
define_once("_REPORTBROKEN","Informar dun enlace roto");
define_once("_LINKSMAINCAT","Principales Categorías de Enlaces");
define_once("_AND","e");
define_once("_INDB","na nosa base de datos");
define_once("_ADDALINK","Engadir Novo Enlace");
define_once("_INSTRUCTIONS","Instruccións");
define_once("_USERANDIP","O nome de usuario e a IP serán rexistrados, así que por favor non abuse do sistema.");
define_once("_PAGETITLE","Título da Páxina");
define_once("_PAGEURL","Páxina da URL");
define_once("_YOUREMAIL","O seu E-Mail");
define_once("_LDESCRIPTION","Descripción: (255 caracteres máx.)");
define_once("_ADDURL","Engadir esta URL");
define_once("_LINKSNOTUSER1","Vostede non é un usuario rexistrado ou non se conectou.");
define_once("_LINKSNOTUSER2","Se estivera rexistrado podería engadir enlaces a este sitio web.");
define_once("_LINKSNOTUSER3","Ser un usuario rexistrado é rápido e fácil.");
define_once("_LINKSNOTUSER4","¿Por qué se require rexistro para acceder a algunhas funcións?");
define_once("_LINKSNOTUSER5","Só lle ofrecemos o contido de maior calidade,");
define_once("_LINKSNOTUSER6","cada artigo é visto e aprobado individualmente polo noso equipo.");
define_once("_LINKSNOTUSER7","Esperamos ofrecerlle só información de valor.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Rexistrarse</a>");
define_once("_LINKALREADYEXT","ERROR: ¡Esta URL xa está listada na Base de Datos!");
define_once("_LINKNOTITLE","ERROR: ¡Necesita escribir un Título para este Enlace!");
define_once("_LINKNOURL","ERROR: ¡Necesita escribir unha URL para este Enlace!");
define_once("_LINKNODESC","ERROR: ¡Necesita escribir unha Descripción para este Enlace!");
define_once("_LINKRECEIVED","Recibímo-los datos do enlace que enviou. ¡Gracias!");
define_once("_EMAILWHENADD","Recibirá un E-Mail cando o enlace sexa aprobado.");
define_once("_NEWLINKS","Novos enlaces");
define_once("_TOTALNEWLINKS","Total Novos Enlaces");
define_once("_LASTWEEK","Última Semana");
define_once("_LAST30DAYS","Últimos 30 días");
define_once("_1WEEK","1 Semana");
define_once("_2WEEKS","2 Semanas");
define_once("_30DAYS","30 Días");
define_once("_SHOW","Ver");
define_once("_DAYS","días");
define_once("_ADDEDON","Engadido o");
define_once("_RATING","Valoración");
define_once("_RATESITE","Valore este Sitio");
define_once("_DETAILS","Detalles");
define_once("_OF","de");
define_once("_TRATEDLINKS","total enlaces Valorados");
define_once("_TVOTESREQ","mínimo de votos necesarios");
define_once("_SHOWTOP","Mostrar Top");
define_once("_MOSTPOPULAR","Máis Popular - Top");
define_once("_OFALL","de todo");
define_once("_SORTLINKSBY","Ordear enlaces por");
define_once("_SITESSORTED","Sitios clasificados por");
define_once("_POPULARITY","Popularidade");
define_once("_SELECTPAGE","Seleccionar Páxina");
define_once("_MAIN","Principal");
define_once("_NEWTODAY","Novo Hoxe");
define_once("_NEWLAST3DAYS","Novo nos últimos 3 días");
define_once("_NEWTHISWEEK","Novo esta semana");
define_once("_POPULARITY1","Popularidade (de menos a máis hits)");
define_once("_POPULARITY2","Popularidade (de máis a menos hits)");
define_once("_TITLEAZ","Título (A - Z)");
define_once("_TITLEZA","Título (Z - A)");
define_once("_RATING1","Valoración (de menor a maior)");
define_once("_RATING2","Valoración (de maior a menor)");
define_once("_SEARCHRESULTS4","Buscar resultados por");
define_once("_USUBCATEGORIES","Sub-Categorías");
define_once("_LINKS","Enlaces");
define_once("_TRY2SEARCH","Intente buscar");
define_once("_INOTHERSENGINES","noutros Motores de Búsqueda");
define_once("_EDITORIAL","Editorial");
define_once("_LINKPROFILE","Perfil do enlace");
define_once("_EDITORIALBY","Editorial por");
define_once("_NOEDITORIAL","A editorial non está actualmente dispoñible neste sitio web.");
define_once("_VISITTHISSITE","Visitar este sitio web");
define_once("_RATETHISSITE","Valorar este sitio web");
define_once("_ISTHISYOURSITE","¿É este o seu recurso?");
define_once("_ALLOWTORATE","Permita que os usuarios o valoren desde o seu sitio Web!");
define_once("_LINKRATINGDET","detalle de valoración de enlaces");
define_once("_OVERALLRATING","Valoración Xeral");
define_once("_TOTALOF","Total de");
define_once("_USER","Usuario");
define_once("_USERAVGRATING","Valoración promedio dos usuarios");
define_once("_NUMRATINGS","Num. de valoracións");
define_once("_EDITTHISLINK","Editar Enlace");
define_once("_REGISTEREDUSERS","Usuarios rexistrados");
define_once("_NUMBEROFRATINGS","Número de valoracións");
define_once("_NOREGUSERSVOTES","Non hai votos de usuarios rexistrados");
define_once("_BREAKDOWNBYVAL","Histograma por valoración");
define_once("_LTOTALVOTES","votos totales");
define_once("_LINKRATING","Enlaces valorados");
define_once("_HIGHRATING","Alta valoración");
define_once("_LOWRATING","Baixa valoración");
define_once("_NUMOFCOMMENTS","Número de comentarios");
define_once("_WEIGHNOTE","* Nota: Este sitio diferencia os votos dos usuarios rexistrados dos non rexistrados");
define_once("_NOUNREGUSERSVOTES","Non hai votos de non rexistrados");
define_once("_WEIGHOUTNOTE","** Nota: Este sitio diferencia os votos dos usuarios rexistrados dos demáis");
define_once("_NOOUTSIDEVOTES","Votos de usuarios");
define_once("_OUTSIDEVOTERS","Votos de anónimos");
define_once("_UNREGISTEREDUSERS","Usuarios non rexistrados");
define_once("_PROMOTEYOURSITE","Promove-lo seu sitio web");
define_once("_PROMOTE01","Tal vez lle interesa unha das opcións que temos para a 'Valoración de outros sitios'. Éstas permítenlle por unha imaxe (ou un formulario de votación) no seu sitio Web para incrementa-los seus votos. Por favor escolla unha destas opcións:");
define_once("_TEXTLINK","Texto do enlace");
define_once("_HTMLCODE1","O código HTML que pode usar neste caso, é o seguinte:");
define_once("_THENUMBER","O Número");
define_once("_IDREFER","no código HTML referencia o seu ID de sitio na Base de Datos de $sitename. Verifique que este número está presente.");
define_once("_BUTTONLINK","Botón de Enlace");
define_once("_RATEIT","Valore este sitio");
define_once("_HTMLCODE2","O código fuente para o botón anterior é:");
define_once("_REMOTEFORM","Formulario de valoración remota");
define_once("_VOTE4THISSITE","Votar por este sitio");
define_once("_LINKVOTE","Votar");
define_once("_HTMLCODE3","Usando este formulario permitirá ós usuarios valora-lo seu sitio directamente desde a súa páxina e será grabada aquí. O formulario anterior está desconectado, pero o seguinte código traballará se o copia e pega na súa páxina. O código é o seguinte:");
define_once("_PROMOTE05","¡Gracias!, e boa sorte coa súa valoración.");
define_once("_STAFF","Plantilla");
define_once("_THANKSBROKEN","Gracias por axudar a mante-la integridade deste directorio.");
define_once("_THANKSFORINFO","Gracias pola información.");
define_once("_LOOKTOREQUEST","Analizaremos a súa petición pronto.");
define_once("_REQUESTLINKMOD","Pedir modifiación de Enlace");
define_once("_LINKID","ID do Enlace");
define_once("_SENDREQUEST","Enviar Petición");
define_once("_THANKSTOTAKETIME","Gracias polo seu tempo na evaluación deste sitio en");
define_once("_RETURNTO","Voltar a");
define_once("_RATENOTE1","Por favor non vote ó mesmo enlace máis dunha vez");
define_once("_RATENOTE2","A escala vai de 1 a 10, sendo 1 Pobre e 10 Excelente.");
define_once("_RATENOTE3","Sexa obxetivo no seu voto, se se recibe sempre 1 ou 10, a valoración non será útil.");
define_once("_RATENOTE5","Non vote polo seu propio recurso ou o do seu competidor.");
define_once("_YOUAREREGGED","Vostede é un usuario rexistrado e está conectado.");
define_once("_FEELFREE2ADD","Síntase libre de engadir un comentario sobre este sitio.");
define_once("_YOUARENOTREGGED","Vostede non é un usuario rexistrado ou non se conectou.");
define_once("_IFYOUWEREREG","Se vostede estivera rexistrado podería ter publicado comentarios neste sitio web.");
define_once("_WEBLINKS","Enlaces");
define_once("_TITLE","Título");
define_once("_MODIFY","Modificar");
define_once("_COMPLETEVOTE1","O seu voto é tido en conta.");
define_once("_COMPLETEVOTE2","Xa votou por este recurso nos último(s) $anonwaitdays día(s).");
define_once("_COMPLETEVOTE3","Vote por un recurso só unha vez.<br>Tódo-los votos son revisados.");
define_once("_COMPLETEVOTE4","Non pode votar por un enlace que vostede enviou.<br>Tódo-los votos son revisados.");
define_once("_COMPLETEVOTE5","Se non hai ratio seleccionado, os votos non serán contados");
define_once("_COMPLETEVOTE6","Só un voto permitido por direción IP cada $outsidewaitdays día(s).");
define_once("_LINKSDATESTRING","%d-%m-%Y");

