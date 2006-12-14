<?php
class ktai_biz_do_fh_biz_todo_add extends OpenPNE_Action
{
    function execute($requests)
    {
        $u  = $GLOBALS['KTAI_C_MEMBER_ID'];
        $tail = $GLOBALS['KTAI_URL_TAIL'];

        // --- リクエスト変数
        $value = $requests['value'];
        $due_datetime_y = $requests['due_datetime_y'];
        $due_datetime_m = $requests['due_datetime_m'];
        $due_datetime_d = $requests['due_datetime_d'];
        $is_all = $requests['is_all'];
        // ----------

		if (!biz_isPermissionTodo($u, $id)) {
		    handle_kengen_error();
		}

        if ($due_datetime_y && $due_datetime_m && $due_datetime_d) {
            $due_datetime = $due_datetime_y . '-' . $due_datetime_m . '-' . $due_datetime_d . ' 00:00:00';            
        }

        if (is_null($target_c_member_id)) {
            $target_c_member_id = $u;
        }
        biz_insertTodo($target_c_member_id, $value, $u, 0, $is_all, $due_datetime);

        $p = array('target_c_member_id' => $target_c_member_id);
        ktai_biz_openpne_redirect('ktai_biz', 'page_fh_biz_todo_list', $p);
    }
}
?>