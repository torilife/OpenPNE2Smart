<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * ã¡ãE»ã¼ã¸éä¿¡
 */
class pc_do_f_message_send_insert_c_message extends OpenPNE_Action
{
    function execute($requests)
    {
        $u = $GLOBALS['AUTH']->uid();

        // --- ãªã¯ã¨ã¹ãå¤æ°
        $c_member_id_to = $requests['c_member_id_to'];
        $subject = $requests['subject'];
        $body = $requests['body'];
        $tmpfile_1 = $requests['tmpfile_1'];
        $tmpfile_2 = $requests['tmpfile_2'];
        $tmpfile_3 = $requests['tmpfile_3'];
        // ----------

        $msg1 = "";
        $msg2 = "";

        if (null == $subject) {
            $msg1 = "ä»¶åãå¥åãã¦ãã ãã";
        }
        if (null == $body){
            $msg2 = "ã¡ãE»ã¼ã¸ãåEåãã¦ãã ãã";
        }

        if ($msg1 || $msg2) {
            $p = array(
                'target_c_member_id' => $c_member_id_to,
                'target_c_message_id' => $requests['target_c_message_id'],
                'jyusin_c_message_id' => $requests['jyusin_c_message_id'],
                'body' => $requests['body'],
                'subject' => $requests['subject'],
                'msg1' => $msg1,
                'msg2' => $msg2,
            );
            openpne_redirect('pc', 'page_f_message_send', $p);
        }

        //ä¿®æ­£
        if ($requests['no']) {
            $p = array(
                'target_c_member_id' => $c_member_id_to,
                'target_c_message_id' => $requests['target_c_message_id'],
                'jyusin_c_message_id' => $requests['jyusin_c_message_id'],
                'body' => $requests['body'],
                'subject' => $requests['subject'],
            );
            openpne_redirect('pc', 'page_f_message_send', $p);
        }

        //--- æ¨©éãã§ãE¯
        //éä¿¡åãèªåE»¥å¤E

        if ($c_member_id_to == $u) {
            handle_kengen_error();
        }

        //ã¢ã¯ã»ã¹ãã­ãE¯è¨­å®E
        if (p_common_is_access_block($u, $c_member_id_to)) {
            openpne_redirect('pc', 'page_h_access_block');
        }
        //---

        //è¿ä¿¡æ¸ã¿ã«ãã
        if ($requests['jyusin_c_message_id']) {
            do_update_is_hensin($requests['jyusin_c_message_id']);
        }

        //ä¸æ¸ãä¿å­ãå­å¨ããªãE        if ($requests['target_c_message_id'] == $requests['jyusin_c_message_id']) {
            $c_message_id = do_common_send_message($u, $c_member_id_to, $subject, $body);
        } else {
        	$c_message_id = $requests['target_c_message_id'];
            update_message_to_is_save($requests['target_c_message_id'], $subject, $body, 1);
        }
        //ç»åæ¿å¥
        $sessid = session_id();
        $filename_1 = image_insert_c_image4tmp("ms_{$c_message_id}_1", $tmpfile_1);
        $filename_2 = image_insert_c_image4tmp("ms_{$c_message_id}_2", $tmpfile_2);
        $filename_3 = image_insert_c_image4tmp("ms_{$c_message_id}_3", $tmpfile_3);
        t_image_clear_tmp($sessid);
        db_update_c_message($c_message_id, $subject, $body, $filename_1, $filename_2, $filename_3);

        // ---bizãããã
        $biz_dir = OPENPNE_MODULES_BIZ_DIR.'/biz/';  //bizã¢ã¸ã¥ã¼ã«ãE£ã¬ã¯ããªã®å®ç¾©
        include_once($biz_dir.'lib/mysql_functions.php');  //bizã¢ã¸ã¥ã¼ã«ããã©ã¤ãã©ãªãæåE

        if(biz_isKtaiMessage($c_member_id_to))
            biz_sendKtaiMessage($u, $c_member_id_to, $subject, $body);
        // ---bizããã¾ã§


        $p = array('msg' => 1);
        openpne_redirect('pc', 'page_h_reply_message', $p);
    }
}

?>
