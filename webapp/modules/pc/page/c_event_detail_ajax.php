<?php
/* 
  * イベント詳細をJSON形式で出力
  * View出力なし */
require_once OPENPNE_WEBAPP_DIR. '/lib/util/json.php';

class pc_page_c_event_detail_ajax extends OpenPNE_Action
{
    function execute($requests)
    {
        $u = $GLOBALS['AUTH']->uid();

        // --- リクエスト変数
        $c_commu_topic_id = $requests['target_c_commu_topic_id'];
        $total_num = $requests['total_num'];
        // ----------

        $c_topic = db_commu_c_topic4c_commu_topic_id_2($c_commu_topic_id);
        $c_commu_id = $c_topic['c_commu_id'];

        //--- 権限チェック
        if (!db_commu_is_c_commu_view4c_commu_idAc_member_id($c_commu_id, $u)) {
            echo array2json(array('msg' => 'このページにはアクセスすることができません。'));
            return false;
        }
        //---

        $c_commu = db_commu_c_commu4c_commu_id($c_commu_id);
        if (!$c_commu) {
            echo array2json(array('msg' => 'コミュニティが存在しません。'));
            return false;
        }
        if (!$c_topic['event_flag']) {
            $p = array('target_c_commu_topic_id' => $c_topic['c_commu_topic_id']);
            openpne_redirect('pc', 'page_c_topic_detail_ajax', $p);
        }

        //詳細部分
        $c_topic = db_commu_c_topic4c_commu_topic_id_2($c_commu_topic_id);

        //書き込み一覧部分
        $page = 1;
        $page_size = $total_num - 2;
        // 順番
        $desc = false;

        list($c_topic_write, $pager) = db_commu_c_topic_write4c_commu_topic_id($c_commu_topic_id, $page, $page_size, $desc);

        foreach ($c_topic_write as $key => $value) {
            if ($value['filename']) {
                $c_topic_write[$key]['original_filename'] = db_file_original_filename4filename($value['filename']);
            }
            /* OpenPNE2 スマートフォン対応：ここから */
            // 本文省略フラグ
            $c_topic['isShorten'] = false;
            if(substr_count($c_topic_write[$key]['body'], "\n") >= 3
                || substr_count("\n", $c_topic_write[$key]['body']) >= 3) {
                $c_topic_write[$key]['isShorten'] = "over 3 lines";
            } elseif (strlen($c_topic_write[$key]['body']) >= 118) {
                $c_topic_write[$key]['isShorten'] = "over 118 letters.";
            }
            /* OpenPNE2 スマートフォン対応：ここまで */
        }

	// テンプレート出力
	$arr = array(
        	'list' => $c_topic_write,
        	'page' => $page,
        	'pager' => $pager,
        	'total_num' => $pager["total_num"],
        	'is_c_commu_member' => db_commu_is_c_commu_member($c_commu_id, $u),
        	'c_member_id' => $u,
        	'is_writable_comment' => db_commu_is_writable_c_commu_topic_comment4c_commu_topic_id($c_commu_topic_id),
                'requests' => $requests,
        );

        $data = openpne_display_ajax($arr, 'c_topic_write_list_ajax');

	// JSON出力
        $data = array('msg' => '', 
                'comment_list' => $data,
        );

        echo array2json($data);
        return false;
    }
}
?>
