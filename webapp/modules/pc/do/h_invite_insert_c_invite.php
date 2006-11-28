<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * 招待メール送信
 */
class pc_do_h_invite_insert_c_invite extends OpenPNE_Action
{
    function execute($requests)
    {
        $u = $GLOBALS['AUTH']->uid();

        if (!IS_USER_INVITE) {
            openpne_forward('pc', 'page', 'h_err_invite');
            exit;
        }

        // --- リクエスト変数
        $mail = $requests['mail'];
        $message = $requests['message'];
        // ----------

        if (empty($_SESSION['captcha_confirm']) || $requests['captcha_confirm'] != md5($_SESSION['captcha_confirm'])) {
            unset($_SESSION['captcha_confirm']);
            $msg = "確認キーワードが誤っています";
            $p = array('msg' => $msg);
            openpne_redirect('pc', 'page_h_invite', $p);
        }
        unset($_SESSION['captcha_confirm']);

        if (!db_common_is_mailaddress($mail)) {
            $msg = "メールアドレスを入力してください";
            $p = array('msg' => $msg);
            openpne_redirect('pc', 'page_h_invite', $p);
        }

        if (p_is_sns_join4mail_address($mail)) {
            $msg = "そのアドレスは既に登録済みです";
            $p = array('msg' => $msg);
            openpne_redirect('pc', 'page_h_invite', $p);
        }

        if (!db_member_is_limit_domain4mail_address($mail)) {
            $msg = "そのアドレスでは登録できません";
            $p = array('msg' => $msg);
            openpne_redirect('pc', 'page_h_invite', $p);
        }

        $session = create_hash();
        $c_member_id_invite = $u;

        if (is_ktai_mail_address($mail)) {
            //<PCKTAI
            if (defined('OPENPNE_REGIST_FROM') &&
                    !((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
                $msg = '携帯アドレスには招待を送ることができません';
                $p = array('msg' => $msg);
                openpne_redirect('pc', 'page_h_invite', $p);
            }
            //>

            // c_member_ktai_pre に追加
            if (do_common_c_member_ktai_pre4ktai_address($mail)) {
                do_update_c_member_ktai_pre($session, $mail, $c_member_id_invite);
            } else {
                do_insert_c_member_ktai_pre($session, $mail, $c_member_id_invite);
            }

            h_invite_insert_c_invite_mail_send($session, $c_member_id_invite, $mail, $message);

        } else {
            //<PCKTAI
            if (defined('OPENPNE_REGIST_FROM') &&
                    !(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
                $msg = 'PCアドレスには招待を送ることができません';
                $p = array('msg' => $msg);
                openpne_redirect('pc', 'page_h_invite', $p);
            }
            //>

            // c_member_pre に追加
            if (do_common_c_member_pre4pc_address($mail)) {
                do_h_invite_update_c_invite($c_member_id_invite, $mail, $message, $session);
            } else {
                do_h_invite_insert_c_invite($c_member_id_invite, $mail, $message, $session);
            }

            do_h_invite_insert_c_invite_mail_send($c_member_id_invite, $session, $message, $mail);
        }

        openpne_redirect('pc', 'page_h_invite_end');
    }
}

?>
