<div class="page" data-role="page" id="({$INC_HEADER_page_name})">
({ext_include file="common/inc_header.tpl"})
<div class="content" data-role="content">({* {{{ content *})
({ext_include file="common/inc_msg.tpl"})

({* {{{ formTable *})<section class="formTable" id="registmailConfirmForm" data-role="collapsible" data-collapsed="false" data-content-theme="c">
<h3>メールアドレス登録</h3>
({t_form_block m=pc a=do_o_regist_mail _attr='data-ajax="false"'})
<input type="hidden" name="sid" value="({$sid})">
<input type="hidden" name="username" value="({$username})">
<p>メールアドレスの登録をおこないます。<br>パスワードを入力してください。</p>

<div data-role="fieldcontain">
<label for="pc_address" class="required">メールアドレス</label>
({$pc_address})
<p class="caution">※他のメンバーには公開されません</p>
</div>
<div data-role="fieldcontain" class="ui-hide-label">
<label for="password" class="required">パスワード</label>
<input type="password" class="input_password" name="password" placeholder="パスワード" autocapitalize="off">
</div>
<div data-role="fieldcontain">
<input type="submit" class="input_submit" value="登録">
</div>
({/t_form_block})
</section>({* formTable }}} *})

</div>({* {{{ content *})
({ext_include file="common/inc_footer.tpl"})
</div>({* page }}} *})
