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
/* Translated to Brazilian by: Luiz Gustavo Aleagi Nunes - tatau - aleagi */
/* Equipe PHP-Nuke Brasil - http://www.phpnuke.org.br                     */
/* Comments/suggestions: aleagi@terra.com.br - aleagi@phpnuke.org.br      */
/**************************************************************************/


define_once("_URL","Link");
define_once("_PREVIOUS","Página anterior");
define_once("_NEXT","Próxima página");
define_once("_YOURNAME","Seu nome");
define_once("_CATEGORY","Categoria");
define_once("_CATEGORIES","Categorias");
define_once("_LVOTES","votos");
define_once("_TOTALVOTES","Total de votos:");
define_once("_LINKTITLE","Título do link ");
define_once("_HITS","Cliques");
define_once("_THEREARE","Há");
define_once("_NOMATCHES","Nada encontrado para");
define_once("_SCOMMENTS","Comentários");
define_once("_DESCRIPTION","Descrição");
define_once("_DATE","Data");
define_once("_TO","Para");
define_once("_ADDLINK","Adicionar link");
define_once("_NEW","Novo");
define_once("_POPULAR","Popular");
define_once("_TOPRATED","Melhor colocado");
define_once("_RANDOM","Aleatório");
define_once("_LINKSMAIN","Índice de Links");
define_once("_LINKCOMMENTS","Link comentado");
define_once("_ADDITIONALDET","Detalhes adicionais");
define_once("_EDITORREVIEW","Editor de Revisões");
define_once("_REPORTBROKEN","Reporte Links quebrados");
define_once("_LINKSMAINCAT","Índice de Categorias de Links");
define_once("_AND","e");
define_once("_INDB","em nosso Banco de Dados");
define_once("_ADDALINK","Adicionar novo Link");
define_once("_INSTRUCTIONS","Instruções");
define_once("_SUBMITONCE","Clique no botão Enviar somente uma vez. Por favor, não envie Links repetidos!");
define_once("_POSTPENDING","Todos os Links são verificados antes de serem publicados.");
define_once("_USERANDIP","São registrados o nome do usuário bem como o endereço de IP de quem enviou o Link, então, por favor não abuse!");
define_once("_PAGETITLE","Título da página");
define_once("_PAGEURL","Endereço da página");
define_once("_YOUREMAIL","Seu e-mail");
define_once("_LDESCRIPTION","Descrição: (máximo de 255 caracteres)");
define_once("_ADDURL","Adicionar este Link");
define_once("_LINKSNOTUSER1","Você não é um Usuário cadstrado ou não efetuou seu login.");
define_once("_LINKSNOTUSER2","Se você for um Usuário cadastrado, por favor efetue o login. Se você não é nosso usuário, desculpe-nos, mas você não tem permissão para incluir links em nosso portal.");
define_once("_LINKSNOTUSER3","Para se tornar um usuário cadastrado, o processo é rápido, fácil e gratuito.");
define_once("_LINKSNOTUSER4","Por que restringimos algumas área de nosso portal somente para usuários cadastrados?!?");
define_once("_LINKSNOTUSER5","Porque só assim podemos estr sempre oferecendo um conteúdo de qualidade.");
define_once("_LINKSNOTUSER6","Cada item é revisado individualmente por nossa equipe.");
define_once("_LINKSNOTUSER7","E nós desejamos lhe oferecer somente informações importantes.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Cadastre-se</a>");
define_once("_LINKALREADYEXT","<b>ERRO</b>: Esta URL já existe em nosso Banco de Dados!");
define_once("_LINKNOTITLE","<b>ERRO</b>: Você precisa fornecer um título para seu Link!");
define_once("_LINKNOURL","<b>ERRO</b>: Você precisa digitar uma URL para seu Link!");
define_once("_LINKNODESC","<b>ERRO</b>: Você precisa descrever seu Link!");
define_once("_LINKRECEIVED","Recebemos sua contribuição. Obrigado!");
define_once("_EMAILWHENADD","Você receberá um e-mail quando sua contribuição for aprovada.");
define_once("_CHECKFORIT","Você não digitou seu endereço de e-mail. De qualquer maneira nossa equipe irá conferir sua emissão.");
define_once("_NEWLINKS","Links novos");
define_once("_TOTALNEWLINKS","Total de links novos");
define_once("_LASTWEEK","Da ultima semana");
define_once("_LAST30DAYS","Dos últimos 30 dias");
define_once("_1WEEK","1 semana");
define_once("_2WEEKS","2 semanas");
define_once("_30DAYS","30 dias");
define_once("_SHOW","Mostrar");
define_once("_TOTALFORLAST","Total de links novos nos últimos");
define_once("_DAYS","dias");
define_once("_ADDEDON","Adicionado em");
define_once("_RATING","Pódium");
define_once("_RATESITE","Avalie este Link");
define_once("_DETAILS","Detalhes");
define_once("_BESTRATED","Pódium do Melhores Links - Top");
define_once("_OF","do");
define_once("_TRATEDLINKS","Total de sites avaliados ");
define_once("_TVOTESREQ","Mínimo de votos requeridos");
define_once("_SHOWTOP","Mostrar o Top");
define_once("_MOSTPOPULAR","Os mais populares - Top");
define_once("_OFALL","de todos");
define_once("_SORTLINKSBY","Links ordenados por");
define_once("_SITESSORTED","Links atualmente ordenados por");
define_once("_POPULARITY","Popularidade");
define_once("_SELECTPAGE","Selecione a página");
define_once("_MAIN","Índice");
define_once("_NEWTODAY","Novo(s) hoje");
define_once("_NEWLAST3DAYS","Novo(s) nos últimos 3 dias");
define_once("_NEWTHISWEEK","Novo(s) desta semana");
define_once("_CATNEWTODAY","Novo(s) Link(s) adicionado(s) hoje nesta Categoria");
define_once("_CATLAST3DAYS","Novo(s) Link(s) adicionado(s) nos últimos 3 dias nesta Categoria");
define_once("_CATTHISWEEK","Novo(s) Link(s) adicionado(s) esta semana nesta Categoria");
define_once("_POPULARITY1","Popular (Mais visitados primeiro)");
define_once("_POPULARITY2","Popular (Menos visitados primeiro)");
define_once("_TITLEAZ","Título (A a Z)");
define_once("_TITLEZA","Título (Z a A)");
define_once("_DATE1","Data (Links antigos listados primeiro)");
define_once("_DATE2","Data (Links novos listados primeiro)");
define_once("_RATING1","Classificação (Da pontuação mais baixa para mais alta)");
define_once("_RATING2","Classificação (Da pontuação mais alta para mais baixa)");
define_once("_SEARCHRESULTS4","Resultado da busca por");
define_once("_USUBCATEGORIES","Sub-categorias");
define_once("_LINKS","Links");
define_once("_TRY2SEARCH","Experimente procurar");
define_once("_INOTHERSENGINES","em outros Sistemas de Busca");
define_once("_EDITORIAL","Editorial");
define_once("_LINKPROFILE","Perfil do Link");
define_once("_EDITORIALBY","Editorial por");
define_once("_NOEDITORIAL","Nenhum editorial está atualmente disponível para este site.");
define_once("_VISITTHISSITE","<b>Visite este Link</b>");
define_once("_RATETHISSITE","Classifique este Link");
define_once("_ISTHISYOURSITE","Este é o seu Link?");
define_once("_ALLOWTORATE","Permita que outros usuários classifiquem este Link apartir do seu site!");
define_once("_LINKRATINGDET","Classificação detalhada do Link");
define_once("_OVERALLRATING","Avaliação global");
define_once("_TOTALOF","Total de");
define_once("_USER","Usuários");
define_once("_USERAVGRATING","A avaliação média do usuário");
define_once("_NUMRATINGS","No. de avaliações");
define_once("_EDITTHISLINK","Editar este Link");
define_once("_REGISTEREDUSERS","Usuários cadastrados");
define_once("_NUMBEROFRATINGS","Número de avaliações");
define_once("_NOREGUSERSVOTES","Nenhum usuário anônimo vota");
define_once("_BREAKDOWNBYVAL","Desarranjo de avaliações por valor");
define_once("_LTOTALVOTES","Total de votos");
define_once("_LINKRATING","Avaliação de Links");
define_once("_HIGHRATING","Avaliação alta");
define_once("_LOWRATING","Avaliação baixa");
define_once("_NUMOFCOMMENTS","Número de comentários");
define_once("_WEIGHNOTE","<b>*Nota</b>: Este recurso conta para usuários cadastrados. Avaliação de usuários anônimos");
define_once("_NOUNREGUSERSVOTES","Nenhum usuário anônimo vota");
define_once("_WEIGHOUTNOTE","<b>*Nota</a>: Este recurso pesa para usuários cadastrados. Fora a avaliação dos eleitores");
define_once("_NOOUTSIDEVOTES","Nenhum voto anônimo");
define_once("_OUTSIDEVOTERS","Votos anônimos");
define_once("_UNREGISTEREDUSERS","Usuários anônimos");
define_once("_PROMOTEYOURSITE","Promova seu Site");
define_once("_PROMOTE01","Talvez você possa se interessar por alguns dos nossos sistemas de 'Avaliação de Sites' que possuímos. Estes sistemas permitem colocar uma imagem (ou até mesmo uma forma de avaliação) em seu site na Web de modo que possa aumentar o número de visitas que você recebe. Por favor selecione uma das opções listadas abaixo:");
define_once("_TEXTLINK","Texto do Link");
define_once("_PROMOTE02","Uma maneira de lincar com a forma de avaliação é usar um link de texto simples:");
define_once("_HTMLCODE1","O código em HTML que você deve usar neste caso, é o seguinte:");
define_once("_THENUMBER","Um número");
define_once("_IDREFER","no código HTML referente ao ID do seu site $sitename no Banco de Dados. Certifique-se que este número esteja presente.");
define_once("_BUTTONLINK","Botão do Link");
define_once("_PROMOTE03","Se você está procurando algo um pouco mais sofisticado, talvez você queira um link com um pequeno botão:");
define_once("_RATEIT","Avalie este site!");
define_once("_HTMLCODE2","O código fonte para o botão acima é:");
define_once("_REMOTEFORM","Forma de avaliação a distância");
define_once("_PROMOTE04","Se houver algum tipo de procedimento incorreto, removeremos seu Link. Isto fica claro, pois desejamos uma forma de avaliação remota séria e justa.");
define_once("_VOTE4THISSITE","Vote neste site!");
define_once("_LINKVOTE","Vote!");
define_once("_HTMLCODE3","Usando este formulário você permite que os usuários avaliem o conteúdo da sua página direto do seu site e esta avaliação será armazenada aqui. O formulário acima está desabilitado, mas o código fonte seguinte funcionará. Basta você copiar e colar este código na sua home-page. O código fonte é mostrado abaixo:");
define_once("_PROMOTE05","Obrigado! E boa sorte com suas avaliações!");
define_once("_STAFF","Equipe");
define_once("_THANKSBROKEN","Obrigado por manter a integridade deste diretório.");
define_once("_THANKSFORINFO","Obrigado pela Informação.");
define_once("_LOOKTOREQUEST","Nossa equipe olhará em breve seu pedido.");
define_once("_ONLYREGUSERSMODIFY","Somente usuários registrado podem sugerir modificações nos Links. Por favor <a href=\"modules.php?name=Your_Account\">Cadastre-se ou efetue seu login</a>.");
define_once("_REQUESTLINKMOD","Pedido para Modificação de Link");
define_once("_LINKID","ID do Link");
define_once("_SENDREQUEST","Enviar pedido");
define_once("_THANKSTOTAKETIME","Obrigado por avaliar este site aqui em");
define_once("_LETSDECIDE","Avaliação de usuários como você ajudará para que outros visitantes decidam quais links eles desejam visitar em.");
define_once("_RETURNTO","Voltar para");
define_once("_RATENOTE1","Por favor não vote por mais de uma vez na mesma avaliação.");
define_once("_RATENOTE2","A escala vai de 1 - 10, sendo <b>1</b> para <b>ruim</b> e <b>10</b> para <b>excelente</b>.");
define_once("_RATENOTE3","Por favor seja objetivo ao votar, pois se todo mundo receber somente 1 ou somente 10, as avaliações não serão úteis.");
define_once("_RATENOTE4","Você pode ver uma lista de <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">Top Links</a> avaliados.");
define_once("_RATENOTE5","Não vote em você mesmo ou em qualquer um.");
define_once("_YOUAREREGGED","Você é um usuário cadastrado e está conectado em.");
define_once("_FEELFREE2ADD","Sinta-se a vontade para adicionar comentários para este Site.");
define_once("_YOUARENOTREGGED","Você não é um usuário cadastrado ou não efetuou sue login.");
define_once("_IFYOUWEREREG","Se você fosse um usuário cadastrado poderia enviar vários comentários a este Site.");
define_once("_WEBLINKS","Links");
define_once("_TITLE","Título");
define_once("_MODIFY","Modificar");
define_once("_COMPLETEVOTE1","Seu voto é apreciado.");
define_once("_COMPLETEVOTE2","Você já votou neste Link no(s) último(s) $anonwaitdays dia(s).");
define_once("_COMPLETEVOTE3","Vote em um Link apenas uma vez.<br>TODOS os votos são logados e revistos.");
define_once("_COMPLETEVOTE4","Você não pode votar em um Link que você mesmo enviou!<br>TODOS os votos são logados e revistos.");
define_once("_COMPLETEVOTE5","Nenhuma pontuação selecionada - nenhum voto computado!");
define_once("_COMPLETEVOTE6","É permitido apenas UM voto por endereço de IP a cada $outsidewaitdays dia(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

