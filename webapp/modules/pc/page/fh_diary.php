<?php
/**
 * OpenPNE2 for Smart Phone
 * @copyright 2012 OpenPNE2 Smart Phone Project
 * @author    Cake
 * @url       http://cake.github.com/OpenPNE2/
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * @copyright 2005-2008 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

class pc_page_fh_diary extends OpenPNE_Action
{
    function execute($requests)
    {
        $u = $GLOBALS['AUTH']->uid();

        // --- リクエスト変数
        $target_c_diary_id = $requests['target_c_diary_id'];
        $body = $requests['body'];
        $page = $requests['page'];
        // ----------

        // target が指定されていない
        if (!$target_c_diary_id) {
            openpne_redirect('pc', 'page_h_err_fh_diary');
        }
        // target の日記が存在しない
        if (!p_common_is_active_c_diary_id($target_c_diary_id)) {
            openpne_redirect('pc', 'page_h_err_fh_diary');
        }


        $target_c_diary = db_diary_get_c_diary4id($target_c_diary_id);
        $target_c_member_id = $target_c_diary['c_member_id'];

        if ($target_c_member_id == $u) {
            $type = 'h';

            //日記を閲覧済みにする
            db_diary_update_c_diary_is_checked($target_c_diary_id, 1);

        } else {
            $type = 'f';
            $target_c_member = db_member_c_member4c_member_id($target_c_member_id);
            $is_friend = db_friend_is_friend($u, $target_c_member_id);

            // check public_flag
            if (!pne_check_diary_public_flag($target_c_diary_id, $u)) {
                openpne_redirect('pc', 'page_h_err_diary_access');
            }
            // アクセスブロック
            if (db_member_is_access_block($u, $target_c_member_id)) {
                openpne_redirect('pc', 'page_h_access_block');
            }

            // あしあとをつける
            db_ashiato_insert_c_ashiato($target_c_member_id, $u);
        }

        /* OpenPNE2 スマートフォン対応：ここから */
        $target_c_diary['isShorten'] = util_check_is_shorten($target_c_diary['body']);
        /* OpenPNE2 スマートフォン対応：ここまで */

        $this->set('type', $type);
        $this->set('inc_navi', fetch_inc_navi($type, $target_c_member_id));

        $this->set('member', db_member_c_member4c_member_id($u));

        $this->set('target_member', db_member_c_member4c_member_id($target_c_member_id));
        $this->set('target_diary', $target_c_diary);

        // 日記コメント
        if ($requests['page_size'] == 100) {
            $page_size = 100;
        } else {
            $page_size = 20;
        }
        if ($requests['order'] === 'asc') {
            $desc = false;
        } else {
            $desc = true;
        }

        /* OpenPNE2 スマートフォン対応：ここから */
        $smartPhone = new OpenPNE_SmartPhoneUA();
        if ($smartPhone->is_smart) {
             // コメント取得件数
             $page_size = 5;
            // 順番 : asc
            $desc = true;
        }
        /* OpenPNE2 スマートフォン対応：ここまで */

        list($c_diary_comment_list, $is_prev, $is_next, $total_num, $total_page_num)
            = k_p_fh_diary_c_diary_comment_list4c_diary_id($target_c_diary_id, $page_size, $page, $desc);
        if ($desc) {
            $c_diary_comment_list = array_reverse($c_diary_comment_list);
        }

        /* OpenPNE2 スマートフォン対応：ここから */
        // コメント省略フラグ
        if (!empty($c_diary_comment_list)) {
            foreach ($c_diary_comment_list as $k => $v) {
                $c_diary_comment_list[$k]['isShorten'] = util_check_is_shorten($v['body']);
            } 
        }

        /* OpenPNE2 スマートフォン対応：ここまで */

        $this->set('target_diary_comment_list', $c_diary_comment_list);
        $this->set('total_num', $total_num);
        $this->set('total_page_num', $total_page_num);
        $this->set('page_size', $page_size);
        $this->set('page', $page);

        $this->set('is_writable_comment', db_diary_is_writable_comment4c_diary_id($target_c_diary_id));

        // コメント許可設定取得
        $this->set('is_comment_input', $target_c_diary['is_comment_input']);

        $start_comment = reset($c_diary_comment_list);
        $end_comment = end($c_diary_comment_list);

        $pager = array();
        $pager['start'] = (int)$start_comment['number'];
        $pager['end'] = (int)$end_comment['number'];
        if ($is_prev) {
            if ($desc) {
                $pager['page_next'] = $page - 1;
            } else {
                $pager['page_prev'] = $page - 1;
            }
        }
        if ($is_next) {
            if ($desc) {
                $pager['page_prev'] = $page + 1;
            } else {
                $pager['page_next'] = $page + 1;
            }
        }
        $this->set('pager', $pager);

        /* OpenPNE2 スマートフォン対応：ここから */
        // コメント番号
        $this->set('comment_count', get_request_var('comment_count'));

        // メール投稿
        $this->set('is_apple', $smartPhone->is_apple);
        $mail_address = null;

        if ($smartPhone->is_apple || $smartPhone->is_smart) {
            if (MAIL_ADDRESS_HASHED) {
                $mail_address = "bc{$target_c_diary_id}-".t_get_user_hash($u).'@'.MAIL_SERVER_DOMAIN;
            } else {
                $mail_address = "bc{$target_c_diary_id}".'@'.MAIL_SERVER_DOMAIN;
            }
            $mail_address = MAIL_ADDRESS_PREFIX . $mail_address;
        }
        $this->set('mail_address', $mail_address);

        $this->set('SNS_NAME', SNS_NAME);
        /* OpenPNE2 スマートフォン対応：ここまで */

        //最近の日記を取得
        $list_set = p_fh_diary_list_diary_list4c_member_id($target_c_member_id, 7, 1, $u);
        $this->set('new_diary_list', $list_set[0]);

        $this->set('c_diary_id_prev', db_diary_c_diary_id_prev4c_diary_id($target_c_member_id, $target_c_diary_id, $u));
        $this->set('c_diary_id_next', db_diary_c_diary_id_next4c_diary_id($target_c_member_id, $target_c_diary_id, $u));

        //カレンダー関係
        //カレンダー開始用変数
        $time = strtotime($target_c_diary['r_datetime']);
        $year = date('Y', $time);
        $month= date('n', $time);
        //日記一覧、カレンダー用変数
        $date_val = array(
            'year' => $year,
            'month' => $month,
            'day' => null,
        );
        $this->set('date_val', $date_val);

        //日記のカレンダー
        $calendar = db_common_diary_monthly_calendar($year, $month, $target_c_member_id, $u);

        $this->set('calendar', $calendar['days']);
        $this->set('ym', $calendar['ym']);

        //各月の日記
        $this->set('date_list', p_fh_diary_list_date_list4c_member_id($target_c_member_id));

        if (USE_DIARY_CATEGORY) {
            //カテゴリ一覧
            $this->set('category', db_diary_category_list4c_member_id($target_c_member_id));

            //この日記のカテゴリリストを得る
            $this->set('category_list', db_diary_category_list4c_diary_id($target_c_diary_id));
        }

        return 'success';
    }
}

?>
