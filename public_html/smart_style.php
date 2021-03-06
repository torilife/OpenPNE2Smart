<?php
/**
 * OpenPNE2 for Smart Phone
 * @copyright 2012 OpenPNE2 Smart Phone Project
 * @author    Cake
 * @url       http://cake.github.com/OpenPNE2/
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

require_once './config.inc.php';
require_once OPENPNE_WEBAPP_DIR . '/init.inc';

header('Content-Type: text/css');

header('Cache-Control: max-age=315360000');
header('Expires: ' . gmdate('D, d M Y H:i:s', strtotime('+10 years')) . ' GMT');
?>
@charset "UTF-8";

/**=============================================================================
 * レイアウト設定
 *----------------------------------------------------------------------------*/
body {
	font-size: 14px;
	-webkit-text-size-adjust: none;
	font-family: ArialMT, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ ProN W3", メイリオ, sans-serif;  
}

/*==============================================================================
 * デフォルトスタイルシートの上書き
 *----------------------------------------------------------------------------*/
ul {
	list-style-position: outside;
	list-style-type: none;
	padding: 0;
}

/*----------------------------------------------
 * セクション
 *--------------------------------------------*/
small {
	font-size: 80% !important;
}

/*----------------------------------------------
 * ベースレイアウト
 *--------------------------------------------*/
.menu-content {
	margin-top: 51px;
}

/* ヘッダー */
div#mainHeader {
	top: 0px;
	z-index: 90;
	width: 100%; 
	height: 40px;
	opacity: 0.89;
}
div#mainHeader #headerHomeButton {
	margin-left: 48px;
}
div#mainHeader .ui-header .ui-title {
	margin-top: -0.8em;
}
h1#pageTitle {
	margin: 0.6em 36px 0.8em;
}

/* メニュー */
div#menu {
	overflow: hidden;
	position: absolute;
	top: 41px;
	width: 100%; 
	display: none;
	padding: 0;
	z-index: 99;
	font-size: 14px;
}
div#menu ul {
	margin: 0;
}

div#menu ul li a.ui-btn {
	margin: 0;
	display: block !important;
}

div#menu ul li a.ui-btn span {
	text-overflow: clip;
}

div#div#menu .ui-header .ui-btn {
	z-index: 100;
}

/* 個別ナビゲーション */
div.topNav {
	position: absolute;
	top: 42px;
	z-index: 89;
	width: 100%; 
	padding: 0;
	overflow: hidden;
}
div.topNav ul {
	margin: 0;
}
div.topNav ul li a.ui-btn {
	margin: 0;
	height: 50px;
}
div.topNav ul li a.ui-btn span {
	text-overflow: clip;
	font-size: 11.5px;
	padding: 16px 2px 16px;
}

#commonPageScrollUp {
	position: absolute;
	right: 5px;
}
#commonPageScrollDown {
	display: none;
}

.ui-dialog .ui-header, 
.ui-dialog .ui-content, 
.ui-dialog .ui-footer { 
	z-index: 200;
}

.ui-dialog .ui-header .ui-title {
	margin: 0.6em 20% 0.8em;
	white-space: normal;
}

.ui-dialog-contain .topNav,
.ui-dialog-contain #Footer {
	display: none;
}

.ui-dialog .ui-content {
	margin-top: 0;
	overflow: hidden;
}

.strong {
	font-weight: bold;
}

.required {
	color: #ff6600;
}

.required:after {
	content:" *";
}

/**=============================================================================
 * アイコン
 *----------------------------------------------------------------------------*/

#headerRight {
	float: right;
}
#headerRight a {
	position: relative;

}
a.smartIcon span.ui-icon {
	background-size: 18px !important;
	background-color: rgba(255, 255, 255, 0.6) !important;
}

.footer-icon {
    position: relative;
    top: 2px;}

<?php
foreach ($_OPENPNE_SMART_ICON_LIST['settings'] as $icon_name => $icon_settings) {
	if (!empty($icon_name) && !empty($icon_settings['url'])) {
		echo ".ui-icon-". $icon_name. " { \n".
			"\t".'background: url("'.$icon_settings['url'].'") no-repeat scroll';
		switch ($icon_name) {
			case 'smart-diary':
				echo ' 0';
				break;
			case 'smart-bbs':
				echo ' 2px';
				break;
			default:
				echo ' 3px';
			break;
		}

		echo  ' 3px transparent !important;'."\n".'}'."\n";
	}
}
?>


/*----------------------------------------------
 * リストビュー
 *--------------------------------------------*/

.ui-li-aside {
	width: 10%;
	padding-right: 5px;
}

.ui-li-desc img {
	padding : 0 10px 0 0;
}


/*----------------------------------------------
 * パーツ内上下の部分（ページャー、検索BOXなど）
 *--------------------------------------------*/
.pagerRelative {
	text-align: center;
	margin-top: 25px;
	margin-bottom: 25px;
}
.pagerRelative span {
}

.moreInfo {
	text-align: center;
	margin-top: 25px;
}
.homeNineTable .moreInfo {
	padding: 10px 25px 0 10px;
}

div.operation ul {
	text-align: center;
}

.narrow-bottom {
	margin-bottom: 0;
}

.pagerAbsolute {
	width: 290px;
	height: 77px;
	overflow-x: hidden;
	overflow-y: hidden;
	margin: 10px auto 0;
	padding: 0;
}

.pagerAbsolute ul.tab {

}

.pagerAbsolute ul.tab li {
	position: relative;
	float: left;
	margin: 6px;
	width: 44px;
	height: 33px;
	padding-top: 11px;
	border: 1px solid #DDDDDD;
	cursor: pointer;
	z-index: 1;
}

.pagerAbsolute + * {
	clear: both;
}

.pagerAbsoluteButton {
	position: relative;
	width: 320px;
	margin: 0 auto;
	padding: 0;
	top: -55px;
}

.pagerAbsoluteButton a#pagerAbsoluteButtonLeft {
	left: -10px;
}
.pagerAbsoluteButton #pagerAbsoluteButtonRight {
	position: absolute;
	top: -7px;
	right: -10px;
}

/*----------------------------------------------
 * 写真＋情報バー
 *--------------------------------------------*/
.authorBar {
	width: 100%;
}

.authorBar .photo76,
.authorBar .photo48,
.authorBar .photo36 {
	width: auto;
}

.authorBar .photo76 {
	width: 81px;
}
.authorBar .photo48 {
	width: 53px;
}

.authorBar .photo36 {
	width: 41px;
}

.authorBar .itemData {
	vertical-align: top;
	width: 100%;
}

.authorBar .itemData .authorData,
.authorBar .itemData .title {
	margin: 0 3px;
	width: 90%;
}

a .itemData .title *,
.itemData .title *,
.itemData .authorData * {
	font-size: 100%;
	display: inline;
}

.photo48 + .itemData {
	margin-left: 55px !important;
}

.gallery li {
	text-align: center;
}

/*==============================================================================
 * 1. simpleBox（シンプルボックス）
 *----------------------------------------------------------------------------*/

/*==============================================================================
 * 2. descriptionBox（説明ボックス） ¶
 *----------------------------------------------------------------------------*/
.descriptionBox {
	text-align: left;
}

ul.ui-listview + .descriptionBox  {
	margin-top: 25px;
}


/*==============================================================================
 * 3. alertBox（アラートボックス）
 *----------------------------------------------------------------------------*/
.alertBox{
	border-width: 1px;
	color: #FF0000;
	margin-bottom: 15px;
	padding: 5px 10px;
}
.alertBox p {
	margin: 5px;
}

/*==============================================================================
 * 4. infoBox（案内ボックス）
 *----------------------------------------------------------------------------*/

/*==============================================================================
 * 5. infoButtonBox（ボタン付き案内ボックス）
 *----------------------------------------------------------------------------*/
.infoButtonBox {
	margin-bottom: 25px;
}

.infoButtonBox p {
	padding: 0 10px;
}

.infoButtonBox ul li.ui-li:last-child,
.infoButtonBox ul li.ui-li.ui-field-contain:last-child {
	border-bottom-width: 0;
}

/*==============================================================================
 * 6. yesNoButtonBox（はい、いいえボタン付きボックス）
 *----------------------------------------------------------------------------*/


/*==============================================================================
 * 7. searchFormBox（検索フォームボックス）
 *----------------------------------------------------------------------------*/
.searchFormBox {
	margin-bottom: 25px;
}

.searchFormBox ul#SelectBbsCategory {
	margin: 0;
}

/*==============================================================================
 * 8. diaryDetailBox（日記詳細ボックス）
 * 9. topicDetailBox（トピック詳細ボックス） 
 * 10. eventDetailBox（イベント詳細ボックス）
 * 14. messageDetailBox（メッセージ詳細ボックス）
 *----------------------------------------------------------------------------*/
.diaryDetailBox .photo48,
.topicDetailBox .photo48,
.messageDetailBox .photo48 {
	height: 53px;
	float: left;
}
.diaryDetailBox .photo48 + .itemData,
.topicDetailBox .photo48 + .itemData,
.messageDetailBox .photo48 + .itemData {
	width: 80%;
}

.diaryDetailBox .itemBody,
.topicDetailBox .itemBody,
.messageDetailBox .itemBody {
	margin: 0;
	max-height: 3.4em;
	text-overflow: ellipsis;
	overflow: hidden;
}

.detailBody {
	clear: both;
	margin-top: 10px;
}

.diaryDetailBox #diaryCategory,
.topicDetailBox .attachFile {
	float: left;
}

.commentList .attachFile {
	font-size: 100%;
	padding: 15px 0 5px;
}

.diaryDetailBox #diaryCategory span {
	font-size: 80%;
	margin-left: 5px;
}

.diaryDetailBox #diaryCategory span:first-child {
	margin-left: 0;
}

.diaryDetailBox time,
.topicDetailBox time,
.messageDetailBox time {
	font-size: 80% !important;
}

.eventData dt {
	float: left;
}
#eventData1 dd {
	margin-left: 95px;
}
#eventData2 dd {
	margin-left: 75px;
}

.gatherEvent {
	clear: both;
}

.commentWriteButton {
	text-align:right;
}

/*==============================================================================
 * 11. homePhotoBox（ホーム写真ボックス）
 *----------------------------------------------------------------------------*/
.homePhotoBox {
	height: auto;
}


#f_bookmark_add .homePhotoBox {
	min-height: 135px;
	height: auto;
}

.homePhotoBox .photo76 {
	display: table-cell;
	width: 81px;
	height: 81px;
	margin: 0 auto;
	text-align: center;
	vertical-align: middle;
}

.homePhotoBox .photo76 + .itemData {
	display: table-cell;
	padding-left: 15px;
}

#f_bookmark_add .homePhotoBox .itemBody,
.homePhotoBox .prof_textarea {
	max-height: 3.4em;
	text-overflow: ellipsis;
	overflow: hidden;
}

#f_bookmark_add .homePhotoBox .itemBody {
	font-size: 80%;
	padding: 5px 0;
}

.homePhotoBox .commentListFooter {
	text-overflow: ellipsis;
	overflow: hidden;
	font-size: 80%;
	clear: both;
}

.homePhotoBox + * {
	clear: both;
}

/*==============================================================================
 * 12. homeInfoBox（ホームインフォメーションボックス）
 *----------------------------------------------------------------------------*/

/*==============================================================================
 * 13. photoUploadFormBox（プロフィール写真アップロードフォームボックス）
 *----------------------------------------------------------------------------*/

/*==============================================================================
 * 17. searchFormLine（検索フォームライン）
 *----------------------------------------------------------------------------*/
.searchFormLine {
}

/*==============================================================================
 * 18. linkLine（リンクライン）
 *----------------------------------------------------------------------------*/

/*============================================================================
 * 22. commentList（コメントリスト）
 * 23. searchResultList（検索結果リスト）
 * 25. recentList（最新書き込みリスト）
 * 26. friendIntroList（フレンド紹介文リスト）
 * 27. manageList（管理リスト）
 * 29. messageList（メッセージリスト）
 * 30. ashiatoList（あしあとリスト）
 *----------------------------------------------------------------------------*/
#diaryAuthor .photo48,
#communityInfo .photo48 {
	display: table-cell;
}

#diaryAuthor .photo48 + .itemData,
#communityInfo .photo48 + .itemData {
	display: table-cell;
	padding-left: 10px;
}

.commentListBox {
	margin-top: 30px;
	margin-bottom: 25px;
}

ul.ui-listview li.commentList {
	font-size: 14px;
	line-height: 1.4em;
	min-height: 4.2em;
	padding: 5px !important;
}

ul.ui-listview li.commentList .ui-li-thumb {
	padding: 0;
	margin-top: 7px;
}

ul.ui-listview li.commentList .itemData {
}

ul.ui-listview li.commentList .itemBody,
ul.ui-listview li.commentList .authorData,
ul.ui-listview li.commentList .commentListFooter {
	text-overflow: ellipsis;
	overflow: hidden;
	font-weight: normal;
}

ul.ui-listview li.commentList .commentListFooter {
	font-size: 80%;
}

/* リンクつき */
ul.ui-listview li.commentList a.ui-link-inherit {
	padding: 0;
}


/* 本文＋写真リスト */ 
ul.pictureList li.commentList .itemBody {
	max-height: 4.0em;
}

ul.pictureList li.commentList .photo48 + .itemData .gallery {
	padding-top: 15px;
}

/* 本文＋カメラアイコンリスト */ 
ul.pictureIconList li.commentList .itemData {
	width: 90%;
}

ul.pictureIconList li.commentList .photo48 + .itemData {
	width: 70%;
}

ul.pictureIconList li.commentList .title,
ul.pictureIconList li.commentList .authorData,
ul.pictureIconList li.commentList .itemBody {
	overflow: hidden;
	text-overflow: ellipsis;
}

ul.pictureIconList li.commentList .title {
	padding-top: 3px;
	font-size: 120%;
}

ul.pictureIconList li.commentList .authorData {
	font-weight: bold;
}

ul.pictureIconList li.commentList .itemBody {
	max-height: 2.8em;
	white-space: normal;
}

ul.pictureIconList li.commentList .commentListFooter span {
	margin-left: 5px;
}


/* ブログリスト */
.blogListBox h2 {
	font-size: 120%;
	margin-bottom: 25px;
}

.blogList h3 {
	display: block !important;
}

/* メンバー一覧 */
/* コミュニティ一覧 */
#h_bookmark_list ul.pictureIconList li.commentList .itemBody,
#h_search_result ul.pictureIconList li.commentList .itemBody,
#h_com_find_all ul.pictureIconList li.commentList .itemBody {
	max-height: 1.4em;
	font-size: 80%;
	padding-left: 5px;
}

/* コメント削除確認 */
#fh_delete_comment .commentListBox {
	margin-top: 0px;
}

#fh_delete_comment .itemBody {
	max-height: none;
}

/* 承認待ち一覧 */
#h_confirm_list ul.pictureIconList li.commentList .itemBody {
	max-height: none;
}

#h_confirm_list ul.pictureIconList li.commentList .commentListFooter {
	clear: both;
}

#h_confirm_list .communityRequest .ui-li-thumb {
	position: relative;
}

.manageListAcion {
	display: none;
	width: 90%;
	margin-top: 35px;
}

#c_edit_member_delete_c_commu_member .ui-li-thumb {
	position: relative !important;
}

/*==============================================================================
 * 28. searchCategoryList（検索項目リスト）
 *----------------------------------------------------------------------------*/

/*==============================================================================
 * 36. homeNineTable（ホーム9面テーブル）
 * 37. photoTable（写真テーブル）
 *----------------------------------------------------------------------------*/
#c_event_member_list .ui-content,
#c_member_list .ui-content,
#f_com_list_common .ui-content,
#fh_com_list .ui-content,
#fh_friend_list .ui-content {
	padding: 0 5px;
	margin-bottom: 30px;
	text-align:center;
}

section.photoTableBox {
	margin: 15px auto;
	width: 300px;
	height: 405px;
}

section.photoTableBox ul {
	display: none;
}
section.photoTableBox ul:first-child {
	display: block;
}

ul.photoTable {
	margin: 0 !important;
}

ul.photoTable li {
	border: 1px solid #ddd;
	box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.2);
	float: left;
	margin: 0;
	padding: 2px;
	width: 90px;
	height: 135px;
}

ul.photoTable li.photoCell {
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	font-size: 12px;
}

ul.photoTable li.photoCell span.ui-icon {
	right: -25px;
}

ul.photoTable li.photoCell a.ui-link-inherit {
	padding: 2px;
}

ul.photoTable li.pagerTable .ui-li {
	margin-top: 25px;
}

ul.photoTable li.photoCell .ui-li .photo {
	display: table-cell;
	width: 90px;
	height: 80px;
	vertical-align: middle;
	text-align: center;
}

img.memberPhoto {
	border-radius: 0.4em;
}

ul.photoTable li.photoCell .ui-li .caption {
	width: 90px;
	overflow: hidden;
	text-overflow: ellipsis;
	line-height: 1.4em;
	height: 4.2em;
	white-space: normal;
	text-align: center;
}

section.photoTableBox + *,
ul.photoTable + * {
	clear: both;
}

/*==============================================================================
 * 38. homeMainTable（ホームメインテーブル）
 *----------------------------------------------------------------------------*/
.homeMainTable .itemBody {
	max-height: 3.4em;
	text-overflow: ellipsis;
	overflow: hidden;
}

section.homeTab ul.tab {
	margin: 10px 0 0;
	height: 44px;
}
section.homeTab ul.tab li {
	display: inline;
	height: 44px;
	margin: 0 10px 0 0;
	padding: 10px 15px;
	border: 1px solid #DDD;
	cursor: pointer;
	z-index: 1;
}

section.homeTab .homeMainTable div.recentListBox,
section.homeTab .homeMainTable div.homeNineTable {
	display: none;
}
section.homeTab .homeMainTable div:first-child {
	display: block;
}

.homeTab section.photoTableBox {
	height: 100%;
}

.homeTab .ui-collapsible-content {
/*	padding: 10px 0; */
}

/*==============================================================================
 * 39. formTable（入力フォームテーブル）
 *----------------------------------------------------------------------------*/
.formTable {
	margin-top: 15px;
}

.width_40 {
	width: 40px !important;
	display: inline !important;
}

.width_60 {
	width: 60px !important;
	display: inline !important;
}

.width_80 {
	width: 80px !important;
	display: inline !important;
}

#h_diary_add div.ui-slider-switch,
#h_diary_edit div.ui-slider-switch {
	width: 9em!important;
}

#h_config_prof div.ui-slider-switch {
	width: 9em!important;
}

