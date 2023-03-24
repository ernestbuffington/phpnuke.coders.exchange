<?php

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;

//use Rector\Php53\Rector\Variable\ReplaceHttpServerVarsByServerRector;

//use Rector\Php54\Rector\Array_\LongArrayToShortArrayRector; # I ONLY DO THIS FOR CERTAIN FILES #

use Rector\Php55\Rector\FuncCall\PregReplaceEModifierRector;

use Rector\Php56\Rector\FunctionLike\AddDefaultValueForUndefinedVariableRector;

use Rector\Php70\Rector\FuncCall\EregToPregMatchRector;
use Rector\Php70\Rector\List_\EmptyListRector;
use Rector\Php70\Rector\FunctionLike\ExceptionHandlerTypehintRector;
use Rector\Php70\Rector\If_\IfToSpaceshipRector;
use Rector\Php70\Rector\Assign\ListSplitStringRector;
use Rector\Php70\Rector\ClassMethod\Php4ConstructorRector;
use Rector\Php70\Rector\FuncCall\RandomFunctionRector;
use Rector\Php70\Rector\FuncCall\RenameMktimeWithoutArgsToTimeRector;
use Rector\Php70\Rector\Ternary\TernaryToNullCoalescingRector;
use Rector\Php70\Rector\Ternary\TernaryToSpaceshipRector;
use Rector\Php70\Rector\Variable\WrapVariableVariableNameInCurlyBracesRector;

use Rector\Php71\Rector\BinaryOp\BinaryOpBetweenNumberAndStringRector;
use Rector\Php71\Rector\FuncCall\CountOnNullRector;
use Rector\Php71\Rector\BooleanOr\IsIterableRector;
//use Rector\Php71\Rector\List_\ListToArrayDestructRector;
use Rector\Php71\Rector\TryCatch\MultiExceptionCatchRector;
use Rector\Php71\Rector\ClassConst\PublicConstantVisibilityRector;

use Rector\Php72\Rector\FuncCall\CreateFunctionToAnonymousFunctionRector;
use Rector\Php72\Rector\FuncCall\GetClassOnNullRector;
use Rector\Php72\Rector\Assign\ListEachRector;
use Rector\Php72\Rector\Assign\ReplaceEachAssignmentWithKeyCurrentRector;
use Rector\Php72\Rector\FuncCall\StringsAssertNakedRector;
use Rector\Php72\Rector\Unset_\UnsetCastRector;
use Rector\Php72\Rector\While_\WhileEachToForeachRector;

use Rector\Php73\Rector\FuncCall\ArrayKeyFirstLastRector;
use Rector\Php73\Rector\BooleanOr\IsCountableRector;
use Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector;
use Rector\Php73\Rector\FuncCall\RegexDashEscapeRector;
use Rector\Php73\Rector\FuncCall\SetCookieRector;
use Rector\Php73\Rector\FuncCall\StringifyStrNeedlesRector;

use Rector\Php74\Rector\FuncCall\ArrayKeyExistsOnPropertyRector;
use Rector\Php74\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector;
use Rector\Php74\Rector\MethodCall\ChangeReflectionTypeToStringToGetNameRector;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\Php74\Rector\ArrayDimFetch\CurlyToSquareBracketArrayStringRector;
use Rector\Php74\Rector\StaticCall\ExportToReflectionFunctionRector;
use Rector\Php74\Rector\FuncCall\FilterVarToAddSlashesRector;
use Rector\Php74\Rector\FuncCall\MbStrrposEncodingArgumentPositionRector;
use Rector\Php74\Rector\FuncCall\MoneyFormatToNumberFormatRector;
use Rector\Php74\Rector\Assign\NullCoalescingOperatorRector;
use Rector\Php74\Rector\Ternary\ParenthesizeNestedTernaryRector;
use Rector\Php74\Rector\Double\RealToFloatTypeCastRector;
use Rector\Php74\Rector\Property\RestoreDefaultNullToNullableTypePropertyRector;

use Rector\Php80\Rector\Identical\StrStartsWithRector;

//use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector; # I ONLY DO THIS FOR CERTAIN FILES #

use Rector\Php82\Rector\FuncCall\Utf8DecodeEncodeToMbConvertEncodingRector;

use Rector\MysqlToMysqli\Rector\Assign\MysqlAssignToMysqliRector;
use Rector\MysqlToMysqli\Rector\FuncCall\MysqlFuncCallToMysqliRector;
use Rector\MysqlToMysqli\Rector\FuncCall\MysqlPConnectToMysqliConnectRector;
use Rector\MysqlToMysqli\Rector\FuncCall\MysqlQueryMysqlErrorWithLinkRector;

return static function (RectorConfig $rectorConfig): void {
	$rectorConfig->cacheDirectory('/home/phpnukecoders/public_html/garbage/rector_cached_files');
    $rectorConfig->containerCacheDirectory('/home/phpnukecoders/public_html/garbage');
	
	// A. run whole set
    //$rectorConfig->sets([
	//	SetList::PHP_82,
	//	LevelSetList::UP_TO_PHP_82,
    //]);

    // B. or single rule
    $rectorConfig->rule(TypedPropertyFromAssignsRector::class);

    // 53
	//$rectorConfig->rule(ReplaceHttpServerVarsByServerRector::class);
	
	//54
	//$rectorConfig->rule(LongArrayToShortArrayRector::class); # I ONLY DO THIS FOR CERTAIN FILES #

	// 55
	$rectorConfig->rule(PregReplaceEModifierRector::class);

	// 56
	$rectorConfig->rule(AddDefaultValueForUndefinedVariableRector::class);

    // 70
	$rectorConfig->rule(EmptyListRector::class);
    $rectorConfig->rule(EregToPregMatchRector::class);
	$rectorConfig->rule(ExceptionHandlerTypehintRector::class);
	$rectorConfig->rule(IfToSpaceshipRector::class);
	$rectorConfig->rule(ListSplitStringRector::class);
	$rectorConfig->rule(Php4ConstructorRector::class);
	$rectorConfig->rule(RandomFunctionRector::class);
	$rectorConfig->rule(RenameMktimeWithoutArgsToTimeRector::class);
	$rectorConfig->rule(TernaryToNullCoalescingRector::class);
	$rectorConfig->rule(TernaryToSpaceshipRector::class);
	$rectorConfig->rule(WrapVariableVariableNameInCurlyBracesRector::class);
	
	// 71
	$rectorConfig->rule(BinaryOpBetweenNumberAndStringRector::class);
	$rectorConfig->rule(CountOnNullRector::class);
	$rectorConfig->rule(IsIterableRector::class);
	//$rectorConfig->rule(ListToArrayDestructRector::class);
	$rectorConfig->rule(MultiExceptionCatchRector::class);
	$rectorConfig->rule(PublicConstantVisibilityRector::class);
	
	// 72
	$rectorConfig->rule(CreateFunctionToAnonymousFunctionRector::class);
	$rectorConfig->rule(GetClassOnNullRector::class);
	$rectorConfig->rule(ListEachRector::class);
	$rectorConfig->rule(ReplaceEachAssignmentWithKeyCurrentRector::class);
	$rectorConfig->rule(StringsAssertNakedRector::class);
	$rectorConfig->rule(UnsetCastRector::class);
	$rectorConfig->rule(WhileEachToForeachRector::class);
	
	// 73
	$rectorConfig->rule(ArrayKeyFirstLastRector::class);
	$rectorConfig->rule(IsCountableRector::class);
	$rectorConfig->rule(JsonThrowOnErrorRector::class);
	$rectorConfig->rule(RegexDashEscapeRector::class);
	$rectorConfig->rule(SetCookieRector::class);
	$rectorConfig->rule(StringifyStrNeedlesRector::class);
	
	// 74
	$rectorConfig->rule(ArrayKeyExistsOnPropertyRector::class);
	$rectorConfig->rule(ArraySpreadInsteadOfArrayMergeRector::class);
	$rectorConfig->rule(ChangeReflectionTypeToStringToGetNameRector::class);
	$rectorConfig->rule(ClosureToArrowFunctionRector::class);
	$rectorConfig->rule(CurlyToSquareBracketArrayStringRector::class);
	$rectorConfig->rule(ExportToReflectionFunctionRector::class);
	$rectorConfig->rule(FilterVarToAddSlashesRector::class);
	$rectorConfig->rule(MbStrrposEncodingArgumentPositionRector::class);
	$rectorConfig->rule(MoneyFormatToNumberFormatRector::class);
	$rectorConfig->rule(NullCoalescingOperatorRector::class);
	$rectorConfig->rule(ParenthesizeNestedTernaryRector::class);
	$rectorConfig->rule(RealToFloatTypeCastRector::class);
	$rectorConfig->rule(RestoreDefaultNullToNullableTypePropertyRector::class);
	
	// 80 
	$rectorConfig->rule(StrStartsWithRector::class);
	//$rectorConfig->rule(::class);
	//$rectorConfig->rule(::class);
	//$rectorConfig->rule(::class);
	//$rectorConfig->rule(::class);
	//$rectorConfig->rule(::class);
	//$rectorConfig->rule(::class);
	//$rectorConfig->rule(::class);
	//$rectorConfig->rule(::class);
	//$rectorConfig->rule(::class);

	// 81
	//$rectorConfig->rule(NullToStrictStringFuncCallArgRector::class);
	
	// 82
	$rectorConfig->rule(Utf8DecodeEncodeToMbConvertEncodingRector::class);
	
	$rectorConfig->rule(MysqlAssignToMysqliRector::class);
	$rectorConfig->rule(MysqlFuncCallToMysqliRector::class);
	$rectorConfig->rule(MysqlPConnectToMysqliConnectRector::class);
	$rectorConfig->rule(MysqlQueryMysqlErrorWithLinkRector::class);
		
    $rectorConfig->paths([
          #__DIR__ . '/admin',
		//////__DIR__ . '/db/mysqli.php',
		//////__DIR__ . '/install/includes/database.php',
		
		//__DIR__ . '/admin/modules/backup/backup.php',
		//__DIR__ . '/admin/modules/backup/backupdownload.php',
		//__DIR__ . '/admin/modules/modules.php',
		//__DIR__ . '/admin/modules/blocks.php',
		//__DIR__ . '/admin/modules/authors.php',
		//__DIR__ . '/admin/modules/ipban.php',
		//__DIR__ . '/admin/modules/settings.php',
        
		  #__DIR__ . '/blocks',
		//////__DIR__ . '/blocks/blocks-Modules.php',
        
		//////__DIR__ . '/install/includes/database.php',
		//////__DIR__ . '/install/install2.php',
		//////__DIR__ . '/install',
        //////__DIR__ . '/includes', BAD IDEA HAD TO REBOOT SERVER
		
		//__DIR__ . '/includes/classes/class.debugger.php',
		//////__DIR__ . '/includes/counter.php',
		//__DIR__ . '/includes/ipban.php',
          #__DIR__ . '/install',
          #__DIR__ . '/language',
          #__DIR__ . '/modules',

		//__DIR__ . '/modules/Advertising/index.php',

		//////__DIR__ . '/modules/AutoTheme/includes/php-nuke/atFuncs.php',
		//////__DIR__ . '/modules/AutoTheme/includes/php-nuke/atAdmin.php',
		//////__DIR__ . '/modules/AutoTheme/includes/php-nuke/atAPI.php',
		//////__DIR__ . '/modules/AutoTheme/includes/php-nuke/atCommands.php',
		//////__DIR__ . '/modules/AutoTheme/includes/php-nuke/atExtended.php',
		//////__DIR__ . '/modules/AutoTheme/includes/atAPI.php',
		//////__DIR__ . '/modules/AutoTheme/includes/atCommands.php',
		//////__DIR__ . '/modules/AutoTheme/includes/atExtended.php',
		//////__DIR__ . '/modules/AutoTheme/extras/atadminbar.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/autoimages.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/autolang.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/autoprint.cmd.php',
		//////__DIR__ . '/modules/AutoTheme/extras/autoprint.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/blocksbytitle.cmd.php',
		//////__DIR__ . '/modules/AutoTheme/extras/blocktitles.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/credits.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/entrypage.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/favicon.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/headcontent.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/loginpage.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/logoutpage.ext.php',
		//////__DIR__ . '/modules/AutoTheme/extras/maintenance.ext.php',
		__DIR__ . '/modules/AutoTheme/extras/modstyles.ext.php',
		//__DIR__ . '/modules/AutoTheme/extras/rendertime.ext.php',
		//__DIR__ . '/modules/AutoTheme/extras/stylefixes.ext.php',
		//__DIR__ . '/modules/AutoTheme/extras/themegroup.ext.php',
		//__DIR__ . '/modules/AutoTheme/extras/themelang.ext.php',
		//__DIR__ . '/modules/AutoTheme/extras/themesonadate.ext.php',
		//__DIR__ . '/modules/AutoTheme/extras/themetime.ext.php',
		//__DIR__ . '/modules/AutoTheme/extras/themeversion.ext.php',
		//__DIR__ . '/modules/AutoTheme/extras/transitionpages.ext.php',

		//__DIR__ . '/modules/Avantgo/index.php',

        //__DIR__ . '/modules/Content/index.php',
		//__DIR__ . '/modules/Content/copyright.php',

		//__DIR__ . '/modules/Downloads/index.php',
		//__DIR__ . '/modules/Downloads/voteinclude.php',

		//__DIR__ . '/modules/Encyclopedia/index.php',
		//__DIR__ . '/modules/Encyclopedia/search.php',
		//__DIR__ . '/modules/Encyclopedia/copyright.php',

		//__DIR__ . '/modules/FAQ/index.php',
		//__DIR__ . '/modules/FAQ/admin/index.php',

		//__DIR__ . '/modules/Feedback/index.php',

		//__DIR__ . '/modules/Forums/admin/admin_avatar.php',
		//__DIR__ . '/modules/Forums/admin/admin_board.php',
		//__DIR__ . '/modules/Forums/admin/admin_db_utilities.php',
		//__DIR__ . '/modules/Forums/admin/admin_disallow.php',
		//__DIR__ . '/modules/Forums/admin/admin_forum_prune.php',
		//__DIR__ . '/modules/Forums/admin/admin_forumauth.php',
		//__DIR__ . '/modules/Forums/admin/admin_forums.php',
		//__DIR__ . '/modules/Forums/admin/admin_groups.php',
		//__DIR__ . '/modules/Forums/admin/admin_mass_email.php',
		//__DIR__ . '/modules/Forums/admin/admin_ranks.php',
		//_DIR__ . '/modules/Forums/admin/admin_smilies.php',
		//__DIR__ . '/modules/Forums/admin/admin_styles.php',
		//__DIR__ . '/modules/Forums/admin/admin_ug_auth.php', HAD PROBLEMS
		//__DIR__ . '/modules/Forums/admin/admin_user_ban.php',
		//_DIR__ . '/modules/Forums/admin/admin_users.php',
		//__DIR__ . '/modules/Forums/admin/admin_words.php',
		//__DIR__ . '/modules/Forums/admin/case.php',
		//__DIR__ . '/modules/Forums/admin/common.php',
		//__DIR__ . '/modules/Forums/admin/forums.php',
		//__DIR__ . '/modules/Forums/admin/index.php',
		//__DIR__ . '/modules/Forums/admin/links.php',
		//__DIR__ . '/modules/Forums/admin/page_footer_admin.php',
		//__DIR__ . '/modules/Forums/admin/page_header_admin.php',
		//__DIR__ . '/modules/Forums/admin/pagestart.php',
		//__DIR__ . '/modules/Forums/includes/auth.php',
		//__DIR__ . '/modules/Forums/includes/bbcode.php', 
		//__DIR__ . '/modules/Forums/includes/constants.php',
		//__DIR__ . '/modules/Forums/includes/emailer.php',
		//__DIR__ . '/modules/Forums/includes/functions.php',
		//__DIR__ . '/modules/Forums/includes/functions_admin.php',
		//__DIR__ . '/modules/Forums/includes/functions_nuke.php',
		//__DIR__ . '/modules/Forums/includes/functions_post.php',
		//__DIR__ . '/modules/Forums/includes/functions_search.php',
		//__DIR__ . '/modules/Forums/includes/functions_selects.php',
		//__DIR__ . '/modules/Forums/includes/functions_validate.php',
		//__DIR__ . '/modules/Forums/includes/page_header.php',
		//__DIR__ . '/modules/Forums/includes/page_header_review.php',
		//__DIR__ . '/modules/Forums/includes/page_tail.php',
		//__DIR__ . '/modules/Forums/includes/page_tail_review.php',
		//__DIR__ . '/modules/Forums/includes/prune.php',
		//__DIR__ . '/modules/Forums/includes/sessions.php',
		//__DIR__ . '/modules/Forums/includes/smtp.php',
		//__DIR__ . '/modules/Forums/includes/sql_layer.php',
		//__DIR__ . '/modules/Forums/includes/sql_parse.php',
		//__DIR__ . '/modules/Forums/includes/template.php',
		//__DIR__ . '/modules/Forums/includes/topic_review.php',
		//__DIR__ . '/modules/Forums/includes/usercp_activate.php',
		//__DIR__ . '/modules/Forums/includes/usercp_avatar.php',
		//__DIR__ . '/modules/Forums/includes/usercp_email.php',
		//__DIR__ . '/modules/Forums/includes/usercp_register.php',
		//__DIR__ . '/modules/Forums/includes/usercp_sendpassword.php',
		//__DIR__ . '/modules/Forums/includes/usercp_viewprofile.php',
		//__DIR__ . '/modules/Forums/common.php',
		//__DIR__ . '/modules/Forums/config.php',
		//__DIR__ . '/modules/Forums/copyright.php',
		//__DIR__ . '/modules/Forums/extension.inc',
		//__DIR__ . '/modules/Forums/faq.php',
		//__DIR__ . '/modules/Forums/groupcp.php',
		//__DIR__ . '/modules/Forums/index.php',
		//__DIR__ . '/modules/Forums/login.php',
		//__DIR__ . '/modules/Forums/modcp.php',
		//__DIR__ . '/modules/Forums/nukebb.php',
		//__DIR__ . '/modules/Forums/posting.php',
		//__DIR__ . '/modules/Forums/profile.php',
		//__DIR__ . '/modules/Forums/search.php',
		//__DIR__ . '/modules/Forums/usercp_confirm.php',
		//__DIR__ . '/modules/Forums/viewforum.php',
		//__DIR__ . '/modules/Forums/viewonline.php',
		//__DIR__ . '/modules/Forums/viewtopic.php',
		//__DIR__ . '/modules/Forums/copyright.php',

		//__DIR__ . '/modules/Journal/index.php',

		//__DIR__ . '/modules/Member_List/index.php',
		//__DIR__ . '/modules/Member_List/copyright.php',
		
		//__DIR__ . '/modules/News/index.php',
		//__DIR__ . '/modules/News/admin/index.php',
		//__DIR__ . '/modules/News/index.php',
		//__DIR__ . '/modules/News/comments.php',
		//__DIR__ . '/modules/News/article.php',
		//__DIR__ . '/modules/News/associates.php',

		//__DIR__ . '/modules/Private_Messages/index.php',
		//__DIR__ . '/modules/Private_Messages/copyright.php',

		//__DIR__ . '/modules/Recommend_Us/index.php',

		//__DIR__ . '/modules/Reviews/admin/index.php',
		//__DIR__ . '/modules/Reviews/index.php',

		//__DIR__ . '/modules/Search/index.php',

		//__DIR__ . '/modules/Statistics/index.php',

		//__DIR__ . '/modules/Stories_Archive/index.php',

		//__DIR__ . '/modules/Submit_News/index.php',

		//__DIR__ . '/modules/Surveys/comments.php',
		//__DIR__ . '/modules/Surveys/index.php',

		//__DIR__ . '/modules/Top/index.php', 

		//__DIR__ . '/modules/Topics/admin/index.php',
		//__DIR__ . '/modules/Topics/index.php', Mucho Fuckups Here
		//__DIR__ . '/modules/Topics/copyright.php',


		//__DIR__ . '/modules/Web_Links/admin/index.php',
		//__DIR__ . '/modules/Web_Links/index.php',
		//__DIR__ . '/modules/Web_Links/l_config.php',


		//////__DIR__ . '/modules/Your_Account/index.php',
		//////__DIR__ . '/modules/Your_Account/navbar.php',

          #__DIR__ . '/themes',
		//////__DIR__ . '/admin.php',
		//__DIR__ . '/backend.php',
		//__DIR__ . '/footer.php',
		//__DIR__ . '/header.php',
		//////__DIR__ . '/index.php',
		//////__DIR__ . '/mainfile.php',
		//__DIR__ . '/modules.php',
    ]);

};
