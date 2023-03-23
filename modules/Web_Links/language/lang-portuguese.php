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

/**************************************************************************/
/* Translation by:							  */
/*									  */
/* Rui Cristovão (ord'hor) ordhor@hotmail.com				  */
/**************************************************************************/


define_once("_URL","Link");
define_once("_PREVIOUS","Página Anterior");
define_once("_NEXT","Página Seguinte");
define_once("_YOURNAME","O seu nome");
define_once("_CATEGORY","Categoria");
define_once("_CATEGORIES","Categorias");
define_once("_LVOTES","votos");
define_once("_TOTALVOTES","Total de votos:");
define_once("_LINKTITLE","Título do Link ");
define_once("_HITS","Hits");
define_once("_THEREARE","Há");
define_once("_NOMATCHES","Nada encontrado para");
define_once("_SCOMMENTS","Comentários");
define_once("_DESCRIPTION","Descrição");
define_once("_ONLYREGUSERSMODIFY","Somente utilizadores registados podem sugerir modificações nos arquivos para Download. Por favor <a href=\"modules.php?name=Your_Account&op=new_user\"><b>registe-se</b></a> ou efectue o seu <a href=\"modules.php?name=Your_Account\">login</a>.");
define_once("_DATE","Data");
define_once("_TO","Para");
define_once("_ADDLINK","Adicionar Link");
define_once("_NEW","Novo");
define_once("_POPULAR","Popular");
define_once("_TOPRATED","Melhor Colocado");
define_once("_RANDOM","Aleatório");
define_once("_LINKSMAIN","Índice de Links");
define_once("_LINKCOMMENTS","Link Comentado");
define_once("_ADDITIONALDET","Detalhes Adicionais");
define_once("_EDITORREVIEW","Editor da Revisão");
define_once("_REPORTBROKEN","Reporte Links Inválidos");
define_once("_LINKSMAINCAT","Índice de Categorias de Links");
define_once("_AND","e");
define_once("_INDB","no nosso web site");
define_once("_ADDALINK","Adicionar Novo Link");
define_once("_INSTRUCTIONS","Instruções");
define_once("_SUBMITONCE","Envie somente uma vez um Link não envie Links iguais.");
define_once("_POSTPENDING","Todos os Links são verificados antes de serem publicados.");
define_once("_USERANDIP","O seu Nick e IP fica registado, por favor não abuse do sistema");
define_once("_PAGETITLE","Título da Página");
define_once("_PAGEURL","Endereço da Página");
define_once("_YOUREMAIL","Seu Email");
define_once("_LDESCRIPTION","Descrição: (255 máx. caracteres)");
define_once("_ADDURL","Adicionar esta URL");
define_once("_LINKSNOTUSER1","Você não é um utilizador registado ou não efectuou o seu login.");
define_once("_LINKSNOTUSER2","Se você fosse um utilizador registado poderia adicionar links neste site.");
define_once("_LINKSNOTUSER3","O processo para se tornar um utilizador registado é rápido e fácil.");
define_once("_LINKSNOTUSER4","Por que é que nós pedimos o seu registo para aceder certas áreas?");
define_once("_LINKSNOTUSER5","Porque assim poderemos-lhe oferecer somente conteúdo de qualidade,");
define_once("_LINKSNOTUSER6","pois cada item é revisto e aprovado individualmente pela nossa equipe.");
define_once("_LINKSNOTUSER7","Esperamos oferecer-lhe somente informação de grande valor.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account&op=new_user\"><b>Registe</b></a>uma conta");
define_once("_LINKALREADYEXT","ERRO: Este link já existe no nosso web site!");
define_once("_LINKNOTITLE","ERRO: Você precisa digitar um título para sua URL!");
define_once("_LINKNOURL","ERRO: Você precisa digitar um URL para sua URL!");
define_once("_LINKNODESC","ERRO: Você precisa descrever sua URL!");
define_once("_LINKRECEIVED","A sua submissão foi recebida. Obrigado!");
define_once("_EMAILWHENADD","Você receberá um Email quando este Link for aprovado.");
define_once("_CHECKFORIT","Você não nos indicou o seu Email. De qualquer maneira a nossa equipe irá conferir o seu Link");
define_once("_NEWLINKS","Novos Links");
define_once("_TOTALNEWLINKS","Total de Novos Links");
define_once("_LASTWEEK","Da última semana");
define_once("_LAST30DAYS","Dos Últimos 30 dias");
define_once("_1WEEK","1 Semana");
define_once("_2WEEKS","2 Semanas");
define_once("_30DAYS","30 Dias");
define_once("_SHOW","Mostrar");
define_once("_TOTALFORLAST","Total de novos Links por último");
define_once("_DAYS","dias");
define_once("_ADDEDON","Adicionado em");
define_once("_RATING","Avaliação");
define_once("_RATESITE","Avalie este Site");
define_once("_DETAILS","Detalhes");
define_once("_BESTRATED","Avaliação dos Melhores Links - Top");
define_once("_OF","do");
define_once("_TRATEDLINKS","total de sites avaliados ");
define_once("_TVOTESREQ","mínimo de votos necessários");
define_once("_SHOWTOP","Mostrar Top");
define_once("_MOSTPOPULAR","Os mais populares - top");
define_once("_OFALL","de todos");
define_once("_SORTLINKSBY","Links ordenados por");
define_once("_SITESSORTED","Web sites actualmente ordenados por");
define_once("_POPULARITY","Popularidade");
define_once("_SELECTPAGE","Seleccione a página");
define_once("_MAIN","Índice");
define_once("_NEWTODAY","Novo de Hoje");
define_once("_NEWLAST3DAYS","Novo dos últimos 3 dias");
define_once("_NEWTHISWEEK","Novo desta Semana");
define_once("_CATNEWTODAY","Novos Links desta categoria adicionados Hoje");
define_once("_CATLAST3DAYS","Novos Links desta categoria adicionados nos últimos 3 dias");
define_once("_CATTHISWEEK","Novos Links desta categoria adicionados esta semana");
define_once("_POPULARITY1","Popular (Mais Visitados primeiro)");
define_once("_POPULARITY2","Popular (Menos visitados primeiro)");
define_once("_TITLEAZ","Título (A a Z)");
define_once("_TITLEZA","Título (Z a A)");
define_once("_DATE1","Data (Links Antigos Listados Primeiro)");
define_once("_DATE2","Data (Links Novos Listados Primeiro)");
define_once("_RATING1","Classificação (Da Pontuação mais Baixa para Mais Alta)");
define_once("_RATING2","Classificação (Da Pontuação mais Alta para Mais Baixa)");
define_once("_SEARCHRESULTS4","Resultado da busca por");
define_once("_USUBCATEGORIES","Subcategorias");
define_once("_LINKS","Links");
define_once("_TRY2SEARCH","Experimente Procurar");
define_once("_INOTHERSENGINES","noutros sistemas de busca");
define_once("_EDITORIAL","Editorial");
define_once("_LINKPROFILE","Perfil do Link");
define_once("_EDITORIALBY","Editorial por");
define_once("_NOEDITORIAL","Nenhum editorial está actualmente disponível para este site.");
define_once("_VISITTHISSITE","Visite este Site");
define_once("_RATETHISSITE","Classifique este Recurso");
define_once("_ISTHISYOURSITE","Este é o seu Recurso?");
define_once("_ALLOWTORATE","Permita que os outros utilizadores classifiquem isto a partir do seu site !");
define_once("_LINKRATINGDET","Classificação Detalhada do Link");
define_once("_OVERALLRATING","Avaliação Global");
define_once("_TOTALOF","Total de");
define_once("_USER","Utilizadores");
define_once("_USERAVGRATING","A avaliação média do usuário");
define_once("_NUMRATINGS","# de Avaliações");
define_once("_EDITTHISLINK","Editar Este Link");
define_once("_REGISTEREDUSERS","utilizadores Registrados");
define_once("_NUMBEROFRATINGS","Número de Avaliações");
define_once("_NOREGUSERSVOTES","Nenhum utilizador anónimo vota");
define_once("_BREAKDOWNBYVAL","Desarranjo de Avaliações por valor");
define_once("_LTOTALVOTES","total de votos");
define_once("_LINKRATING","Avaliação de Links");
define_once("_HIGHRATING","Avaliação Alta");
define_once("_LOWRATING","Avaliação Baixa");
define_once("_NUMOFCOMMENTS","Número de Comentários");
define_once("_WEIGHNOTE","* Nota: Este recurso Faz o balanço entre utilizadores registados e utilizadores anónimos");
define_once("_NOUNREGUSERSVOTES","Nenhum utilizador anónimo vota");
define_once("_WEIGHOUTNOTE","* Nota: Este recurso faz o balanço entre utilizadores registados e votos fora do nosso site");
define_once("_NOOUTSIDEVOTES","Nenhum voto de fora");
define_once("_OUTSIDEVOTERS","Votos de fora");
define_once("_UNREGISTEREDUSERS","utilizadores anónimos");
define_once("_PROMOTEYOURSITE","Promova o seu web site");
define_once("_PROMOTE01","Talvez você possa se interessar por alguns dos nossos sistemas de 'Avaliação de Sites' que possuímos. Estes sistemas permitem colocar uma imagem (ou até mesmo um formulário de avaliação) no seu site na Web de modo que possa aumentar o número de votos no seu recurso que disponibilizou. Por favor seleccione uma das opções indicada de seguida:");
define_once("_TEXTLINK","Link de Texto");
define_once("_PROMOTE02","Uma maneira de fazer o link à forma de avaliação é usar um link de texto simples:");
define_once("_HTMLCODE1","O código em HTML que você deveria usar neste caso, é o seguinte:");
define_once("_THENUMBER","O número");
define_once("_IDREFER","em HTML referente ao número de identificação do seu site na database de $sitename. Certifique-se que este número esteja presente.");
define_once("_BUTTONLINK","Link de Botão");
define_once("_PROMOTE03","Se você está à procura de um pouco mais que um Link de texto simples poderá então escolher um botão pequeno como link:");
define_once("_RATEIT","Avalie este web site!");
define_once("_HTMLCODE2","O código fonte para o botão acima é:");
define_once("_REMOTEFORM","Forma de Avaliação a Distância");
define_once("_PROMOTE04","Se você nos enganar, nós removeremos seu link. Temos dito isto, aqui como uma forma de avaliação remota");
define_once("_VOTE4THISSITE","Vote neste Site!");
define_once("_LINKVOTE","Vote!");
define_once("_HTMLCODE3","Usando este formulário irá permitir que os utilizadores avaliem o conteúdo da sua página directamente do seu site ficando esta avaliação armazenada aqui. O método de votação acima é somente de demonstração, mas o código fonte seguinte, mostrado de seguida funciona, bastando que você copie e cole na sua Homepage:");
define_once("_PROMOTE05","Obrigado! E boa sorte com suas avaliações!");
define_once("_STAFF","A Equipe");
define_once("_THANKSBROKEN","Obrigado por manter a integridade deste directório.");
define_once("_THANKSFORINFO","Obrigado pela Informação.");
define_once("_LOOKTOREQUEST","Verificaremos brevemente o seu pedido.");
define_once("_REQUESTLINKMOD","Pedido de modificação de um Link");
define_once("_LINKID","ID do Link");
define_once("_SENDREQUEST","Enviar Pedido");
define_once("_THANKSTOTAKETIME","Obrigado por dispensar o seu tempo na avaliação de um site aqui em");
define_once("_LETSDECIDE","A avaliação de utilizadores, tais como você ajudará na escolha de outros visitantes em que links clicar.");
define_once("_RETURNTO","Voltar para");
define_once("_RATENOTE1","Por favor não vote por mais de uma vez na mesma avaliação.");
define_once("_RATENOTE2","A escala vai de 1 - 10, sendo 1 para fraco e 10 para excelente.");
define_once("_RATENOTE3","Por favor seja objectivo no seu voto, pois se todos votarem somente 1 ou 10, as avaliações não serão úteis.");
define_once("_RATENOTE4","Você pode ver a lista do <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">Top dos Links</a>.");
define_once("_RATENOTE5","Faça por não votar em você mesmo ou nos seus concorrentes.");
define_once("_YOUAREREGGED","Você é um utilizador registado e está ligado.");
define_once("_FEELFREE2ADD","Sinta-se à vontade em comentar este site.");
define_once("_YOUARENOTREGGED","Você não é um utilizador registado ou não efectuou o seu login.");
define_once("_IFYOUWEREREG","Se você fosse um utilizador registado poderia comentar neste site.");
define_once("_TITLE","Título");
define_once("_MODIFY","Modificar");
define_once("_COMPLETEVOTE1","Agradecemos o seu voto.");
define_once("_COMPLETEVOTE2","Já votou sobre isto há $anonwaitdays dia(s).");
define_once("_COMPLETEVOTE3","Vote apenas uma vez.<br>Todos os votos são registados e revistos.");
define_once("_COMPLETEVOTE4","Não pode votar num link que você mesmo enviou.<br>Todos os votos são registados e revistos.");
define_once("_COMPLETEVOTE5","Não preencheu correctamente. Voto inválido");
define_once("_COMPLETEVOTE6","Apenas um voto por IP permitido por cada $outsidewaitdays dia(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

