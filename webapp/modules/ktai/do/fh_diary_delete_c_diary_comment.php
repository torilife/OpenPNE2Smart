<?php
/**
 * @copyright 2005-2008 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

/**
 * 日記コメント削除
 */
class ktai_do_fh_diary_delete_c_diary_comment extends OpenPNE_Action
{
    function execute($requests)
    {
        $tail = $GLOBALS['KTAI_URL_TAIL'];
        $u = $GLOBALS['KTAI_C_MEMBER_ID'];

        // --- リクエスト変数
        $target_c_diary_comment_id = $requests['target_c_diary_comment_id'];
        // ----------
        $c_diary_comment = _do_c_diary_comment4c_diary_comment_id($target_c_diary_comment_id);
        $target_c_member_id = $c_diary_comment['c_member_id'];

        //--- 権限チェック
        //日記作成者 or コメント作成者

        $c_diary = db_diary_get_c_diary4id($c_diary_comment['c_diary_id']);
        if ($c_diary['c_member_id'] != $u
            && $c_diary_comment['c_member_id'] != $u) {
            handle_kengen_error();
        }
        //---


        db_diary_delete_c_diary_comment($target_c_diary_comment_id, $u);

        //コメント記入履歴削除実行
        db_diary_delete_c_diary_comment_summary($target_c_member_id,$c_diary_comment['c_diary_id']);

        $p = array('target_c_diary_id' => $c_diary['c_diary_id']);
        openpne_redirect('ktai', 'page_fh_diary', $p);
    }
}

?>
