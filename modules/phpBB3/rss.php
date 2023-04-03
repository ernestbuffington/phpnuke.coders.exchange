<?php /**
    *
    * @package phpBB3
    * @version $Id: rssforum.php,v 1.2.3 2008-06-22 13:48 joerobe Exp $
    * @copyright (c) 2005 phpBB Group
    * @license http://opensource.org/licenses/gpl-license.php GNU Public License
    *
    */

    /**
    * @ignore
    */

         define( 'IN_PHPBB', true );
        $phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
        $phpEx = substr(strrchr(__FILE__, '.'), 1);
        include_once($phpbb_root_path . 'common.' . $phpEx);
        include_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
        include_once($phpbb_root_path . 'includes/bbcode.' . $phpEx);
        $postallowcount='';           
        $user->session_begin();
        $auth->acl( $user->data );
        $user->setup();
        $forum_folder = (strlen($config['script_path']) > 1) ? $config['script_path'] . '/' : '/' ;

        $bbcode = new bbcode();
      //start post count
      $postallowcount='';
        $topic_count = $config['posts_per_page']; // Change in the number of topics you want to show.
        $query = "
            SELECT distinct(p.topic_id) , p.forum_id, p.post_time, p.post_subject, p.post_text, p.bbcode_bitfield, p.bbcode_uid,
                u.user_id, u.user_email, u.username, u.user_allow_viewemail,
                t.topic_title, f.left_id, f.right_id, t.topic_replies as aantal_posts
            FROM " . PHPBB3_POSTS_TABLE . " p JOIN " . PHPBB3_USERS_TABLE . " u on p.poster_id = u.user_id JOIN " . PHPBB3_TOPICS_TABLE . " t on p.topic_id = t.topic_id JOIN ". PHPBB3_FORUMS_TABLE ." f on p.forum_id = f.forum_id
            ORDER BY p.post_time DESC";
        $result = $db->sql_query( $query );
        $rss = '';
        $rss .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?><rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">
        <channel>
        <title>".htmlspecialchars($config['sitename'])."</title>
      <atom:link href=\"".$config['server_protocol'].$config['server_name'].$forum_folder."forumrss.php\" rel=\"self\" type=\"application/rss+xml\" />
        <link>".htmlspecialchars($config['server_protocol'].$config['server_name']).$forum_folder."</link>
        <description>".htmlspecialchars($config['site_desc'])."</description>
        <language>en-us</language>
        <ttl>60</ttl>";//this is to lemmit the time in wich the feed can be updated

              while( $row = $db->sql_fetchrow($result) )
               {
            //gather extra information on each post
                 $sql_view_post ="SELECT * FROM " . PHPBB3_POSTS_TABLE . "
                 WHERE post_time = ". $row['post_time'] . "";
                 $res_views_post = $db->sql_query($sql_view_post);
                 $row_views_post = $db->sql_fetchrow($res_views_post);
                 $sql_view ="SELECT * FROM " . PHPBB3_TOPICS_TABLE . "
                 WHERE topic_id = ". $row['topic_id'] . "";
                $res_views = $db->sql_query($sql_view);
                $row_views = $db->sql_fetchrow($res_views);
                $sql_tracking ="SELECT * FROM " . PHPBB3_TOPICS_TRACK_TABLE . "
                WHERE topic_id = ". $row_views_post['topic_id'] . " AND user_id = " . $user->data['user_id'] . "";
                $tracking_views = $db->sql_query($sql_tracking);
                $tracking_row = $db->sql_fetchrow($tracking_views);
                $sql_session ="SELECT * FROM " . PHPBB3_SESSIONS_TABLE . "
                WHERE session_user_id = ". $user->data['user_id'] . "";
                $res_session = $db->sql_query($sql_session);
                $row_session = $db->sql_fetchrow($res_session);
                $forum_id = $row['forum_id'];
                $rowset = $announcement_list = $topic_list = $global_announce_list = array();

               // assume topic is read
               $unread_topic = true;
              // select information for topic from the topics_tracking table
              if (isset($tracking_row['mark_time']) && $tracking_row['mark_time'] >= $row_views_post['post_time'])
              {
                $unread_topic = false;
              }

              // select information for forum containing topic from the forums_tracking table, store in $tracking_row
             if ($row_views_post["poster_id"] == $user->data['user_id'])
             {
               $unread_topic = false;
             }
            if (!$user->data['is_registered'])$unread_topic = false;

               // if the user does not have permissions to list this forum, skip everything until next branch
             if ($auth->acl_get('f_read', $forum_id))
             {
                $postallowcount = $postallowcount+1;
               //when post count reachs board lemmit we stop listing
                if($postallowcount > $config['posts_per_page'])break;
                 // Parse the message and subject
                $message = censor_text($row['post_text']);
                $replies = ($auth->acl_get('m_approve', $forum_id)) ? $row_views['topic_replies_real'] : $row_views['topic_replies'];
                $folder_img = $folder_alt = $topic_type = '';
                topic_status($row_views, $replies, $unread_topic, $folder_img, $folder_alt, $topic_type);

                // Second parse bbcode here
                if ($row['bbcode_bitfield'])
                {
                    $bbcode->bbcode_second_pass($message, $row['bbcode_uid'], $row['bbcode_bitfield']);
                }
                $message = bbcode_nl2br($message);
                $message = smiley_text($message);
                $message = str_replace($phpbb_root_path,'./',$message);//fix for smiles
                $message = str_replace('<a href="#" onclick="selectCode(this); return false;">Select all</a>','',$message);//fix for java not allowed in xml
                $message = str_replace(']]',']',$message);//keep xml compliant
                $message = str_replace('&amp;nbsp;',' ',$message);
                $message = str_replace('./',$config['server_protocol'].$config['server_name'].$forum_folder,$message);
                $fids = $row['forum_id'];
                $ids = $row["topic_id"];
                $names = censor_text($row['post_subject']);
                $replies = $row['aantal_posts'];
                $views = $row_views['topic_views'];
                $last_post = $row_views['topic_last_post_id'];
                $last_poster = $row_views['topic_last_poster_name'];
                $last_poster_id = $row_views['topic_last_poster_id'];
                $last_poster_time = $row_views['topic_last_post_time'];
                $url_link = $config['server_protocol'].$config['server_name'].$forum_folder.'viewtopic.php?';
                $topic_read = $user->img($folder_img, $folder_alt);
                $topic_read = str_replace($phpbb_root_path,$config['server_protocol'].$config['server_name'].$forum_folder,$topic_read);//fix for smiles
                $author = ($row['username'] == 'Anonymous')? 'Anonymous@nowhere.com' : $row['user_email'];

                // Send data to output var
                $descrption = '<table cellpadding="1" cellspacing="1" style="border:1px solid #a1a1a1" width="100%" align="center"><div><tr><td><p>'. $topic_read .'<br /><font size="3"><b>Replies:</b></font> '.$replies .'<br />
                <font size="3"><b>Views:</b></font> '.$views .'<br />
                <font size="3"><b>Last Post By:</b></font> <a href="'.$config['server_protocol'].$config['server_name'].$forum_folder.'memberlist.php?mode=viewprofile&amp;u=' . $last_poster_id . '">' . $last_poster .'</a>
                <a href="'.$config['server_protocol'].$config['server_name'].$forum_folder.'viewtopic.php?f='.$row['forum_id'].'&amp;t='.$row["topic_id"].'&amp;p='.$last_post.'#p'.$last_post.'">'.str_replace('./',$config['server_protocol'].$config['server_name'].$forum_folder,$user->img('icon_topic_newest', 'VIEW_LATEST_POST')).'</a><b> ON: '.$user->format_date($last_poster_time).'</b><br />
                <font size="3"><b>Topic By:</b></font> <a href="'.$config['server_protocol'].$config['server_name'].$forum_folder.'memberlist.php?mode=viewprofile&amp;u=' . $row['user_id'] . '">' . $row['username'] .'</a><b> ON: '.$user->format_date($row['post_time']).'</b><br />'. $message .'</p></td></tr></div></table>';
header('Content-type: application/xml; charset=utf-8');
               $rss .= '
               <item>
               <title>'.htmlspecialchars($names).'</title>
               <link>'.$url_link.'f='.$fids.'&amp;t='.$ids.'&amp;p=' .$row_views_post["post_id"].'#p'.$row_views_post["post_id"].'</link>
               <description><![CDATA['. $descrption .'<hr>]]></description>
               <pubDate>' . $user->format_date($last_poster_time,"D, d M Y H:i:s T") . '</pubDate>
            <guid>'.$url_link.'f='.$fids.'&amp;t='.$ids.'&amp;p=' .$row_views_post["post_id"].'#p'.$row_views_post["post_id"].'</guid>
               </item>';
          }
       }

     $rss .='
     </channel>
     </rss>';
     echo($rss);
?>
