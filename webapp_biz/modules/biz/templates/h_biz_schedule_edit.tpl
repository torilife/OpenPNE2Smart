({ext_include file="inc_header.tpl"})
({ext_include file="inc_layoutcolumn_top_720px.tpl"})
({***************************})
({**ここから：メインコンテンツ**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ********************************** -->
<!-- ******ここから：日記を編集する****** -->
({t_form _enctype=file m=biz a=do_h_biz_schedule_edit})
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="schedule_id" value="({$schedule_id})">

<table border="0" cellspacing="0" cellpadding="0" style="width:540px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:526px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：日記を編集する＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:526px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="({t_img_url_skin filename=content_header_1})" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:488px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">予定を修正する</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<!-- ここから：主内容＞＞日記表示 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:526px;" class="border_01">
({*********})
<tr>
<td style="width:524px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:60px;" class="bg_05" align="center" valign="middle">
<div style="padding:4px 3px;">

繰り返し設定

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:391px;" class="bg_02" align="left" valign="middle">

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="padding_ss" style="width:100px;">

<input type='radio' name='sc_rp' value='0' class="no_bg"({if !$is_rep}) checked({/if})>繰り返さない

</td>
<td class="padding_ss">

<select name='sc_bn'>
	({section name=i loop=$bn_num})
		<option value="({$bn_num[i]})" ({if $banner == $bn_num[i]})selected({/if})>({$bn_num[i]})日間
	({/section})
</select>

</td>
</tr>
<tr>
<td class="padding_ss">

<input type='radio' name='sc_rp' value='true'class="no_bg" ({if $is_rep}) checked({/if})>繰り返す

</td>
<td class="padding_ss">

<select name='sc_rcount'>
	({section name=i loop=$rp_count})
		<option value='({$rp_count[i]})'>({$rp_count[i]})週間
	({/section})
</select>

</td>
</tr>
<tr>
<td class="padding_ss" style="text-align:right;">

繰り返す曜日

</td>
<td class="padding_ss">

({section name=i loop=$wk})
<input type='checkbox' name="sc_rwk[]" value='({$smarty.section.i.index})' class="no_bg"({if $rep_type[i]}) checked({/if})>({$wk[i]})
({/section})
	
</td>
</tr>
({if $is_rep})
<tr>
<td class="padding_ss" style="text-align:right;" colspan="2">

<input type='checkbox' name="iskeep" value='0' checked>この予定のみを編集する

</td>
</tr>
({else})
<input type='hidden' name='iskeep' value='0'>
({/if})
</table>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">
<div style="padding:4px 3px;">

開始日

</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">
<div style="padding:4px 3px;">

<select name='sc_b_year'>
	({$years|smarty:nodefaults})
</select>
<select name='sc_b_month'>
	({$monthes|smarty:nodefaults})
</select>
<select name='sc_b_date'>
	({$days|smarty:nodefaults})
</select>

</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">
<div style="padding:4px 3px;">

時　刻

</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">
<div style="padding:4px 3px;">

<select name='sc_b_hour'>
	<option value=''({if $begin_hour == null}) selected({/if})>--時
	({section name=i loop=$hours})
		<option value="({if $hours[i] < 10 })0({/if})({$hours[i]})"({if $hours[i] == $begin_hour})({if $begin_hour != null}) selected({/if})({/if})>({$hours[i]})時
	({/section})
</select>
<select name='sc_b_minute'>
	<option value=''({if $begin_min == null}) selected({/if})>--分
	({section name=i loop=$mins})
		<option value="({if $mins[i] < 10 })0({/if})({$mins[i]})"({if $mins[i] == $begin_min}) ({if $begin_hour != null}) selected({/if})({/if})>({$mins[i]})分
	({/section})
</select>～

<select name='sc_f_hour'>
	<option value=''({if $finish_hour == null}) selected({/if})>--時
	({section name=i loop=$hours})
		<option value="({if $hours[i] < 10 })0({/if})({$hours[i]})"({if $hours[i] == $finish_hour}) ({if $begin_hour != null}) selected({/if})({/if})>({$hours[i]})時
	({/section})
</select>
<select name='sc_f_minute'>
	<option value=''({if $finish_min == null}) selected({/if})>--分
	({section name=i loop=$mins})
		<option value="({if $mins[i] < 10 })0({/if})({$mins[i]})"({if $mins[i] == $finish_min}) ({if $begin_hour != null}) selected({/if})({/if})>({$mins[i]})分
	({/section})
</select>
</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">
<div style="padding:4px 3px;">

タイトル
</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">
<div style="padding:4px 3px;">

<input class="text" type='text' name='sc_title' value="({$title})" size="60">
</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">
<div style="padding:4px 3px;">

内容

</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">
<div style="padding:4px 3px;">

<textarea class="text" name='sc_memo' cols="50" rows="5">({$value})</textarea>
</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})

({*ここから：新規予定*})

<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">
<div style="padding:4px 3px;">
参加者
</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<table border="0" cellspacing="0" cellpadding="0">
<tr>
({foreach name=i from=$members item=item})
({if $item})
<td class="padding_ss" style="width:33%;" valign="top">
<input name='sc_j_mem[]' value='({$item.c_member_id})' type='checkbox' class='no_bg'({if $item.checkflag}) checked="checked"({/if})>({$item.nickname})
</td>
({else})
<td class="padding_ss" style="width:33%;">&nbsp;</td>
({/if})

({if $smarty.foreach.i.last && ($smarty.foreach.i.iteration%3==1 || $smarty.foreach.i.iteration%3==2)})
<td class="padding_ss" style="width:33%;">&nbsp;</td>
({/if})
({if $smarty.foreach.i.last && $smarty.foreach.i.iteration%3==1 })
<td class="padding_ss" style="width:33%;">&nbsp;</td>
({/if})
({if !$smarty.foreach.i.last && $smarty.foreach.i.iteration%3==0})
</tr><tr>
({/if})
({/foreach})
</tr>
</table>

({*ここまで：新規予定*})

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})

<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="center" colspan="3">

<img src="./skin/dummy.gif" class="v_spacer_m">

<div style="padding:4px 3px;">

<input type='submit' class="submit" name='entry' value='登録する'>

</div>

<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容＞＞日記表示 -->
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：日記を編集する＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

</form>
<!-- ******ここまで：日記を編集する****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({***************************})
({**ここまで：メインコンテンツ**})
({***************************})
({ext_include file="inc_layoutcolumn_bottom_270px_165px_175px_720px.tpl"})
({ext_include file="inc_footer.tpl"})
