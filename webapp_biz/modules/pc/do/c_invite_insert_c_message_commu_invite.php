<?php
/**
 * @copyright 2005-2006 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

class pc_do_c_invite_insert_c_message_commu_invite extends OpenPNE_Action
{
    function execute($requests)
    {
        $u = $GLOBALS['AUTH']->uid();

        // --- リクエスト変数
        $target_c_commu_id = $requests['target_c_commu_id'];
        $body = $requests['body'];
        $c_member_id_list = $requests['c_member_id_list'];
        // ----------

        if (!$c_member_id_list) {
            $p = array(
                'target_c_commu_id' => $target_c_commu_id,
                'msg' => '紹介�Eの'.WORD_MY_FRIEND.'を選択してださい',
            );
            openpne_redirect('pc', 'page_c_invite', $p);
        }

        if (is_null($body) || $body === '') {
            $p = array(
                'target_c_commu_id' => $target_c_commu_id,
                'msg' => 'メチE��ージを�E力してください',
            );
            openpne_redirect('pc', 'page_c_invite', $p);
        }

        //--- 権限チェチE��
        //フレンチE

        foreach ($c_member_id_list as $c_member_id) {
            if (!db_friend_is_friend($c_member_id, $u)) {
                handle_kengen_error();
            }
        }
        //---

        list($msg_subject, $msg_body) =
            create_message_commu_invite($u, $body, $target_c_commu_id);

        $commu = _db_c_commu4c_commu_id($target_c_commu_id);
        $c_member_id_admin = $commu['c_member_id_admin'];
        $public_flag = $commu['public_flag'];

        // ---bizここから
        $biz_dir = OPENPNE_MODULES_BIZ_DIR.'/biz/';  //bizモジュールチE��レクトリの定義
        include_once($biz_dir.'lib/mysql_functions.php');  //bizモジュールよりライブラリを拝倁E
        // ---bizここまで

        foreach ($c_member_id_list as $c_member_id) {

            // ---bizここから
            if(biz_isKtaiMessage($c_member_id))
                biz_sendKtaiMessageSyoukaiCommu($u, $c_member_id);
            // ---bizここまで

            do_common_send_message_syoukai_commu($u, $c_member_id, $msg_subject, $msg_body);
            //招征E��E��コミュニティ管琁E��E��、かつ非�E開コミュニティの場吁E
            if (($c_member_id_admin == $u)&&($public_flag != 'public')) {
                db_commu_insert_c_commu_admin_invite($target_c_commu_id, $c_member_id);
            }
        }

        $p = array('target_c_commu_id' => $target_c_commu_id);
        openpne_redirect('pc', 'page_c_home', $p);
    }
}

?>
