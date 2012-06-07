<?php
/**
 * @copyright 2005-2008 OpenPNE Project
 * @license   http://www.php.net/license/3_01.txt PHP License 3.01
 */

chdir(dirname(__FILE__));
require_once './config.inc.php';
require_once OPENPNE_WEBAPP_DIR . '/init.inc';

// エラー出力を抑制
ini_set('display_errors', false);
@ob_start();

/**
 * ライブラリ読み込み
 */
require_once 'Log.php';
require_once 'OpenPNE/KtaiMail.php';
require_once 'mail/sns.php';

// 標準入力からメールデータの読み込み
$stdin = fopen('php://stdin', 'rb');
$raw_mail = '';
do {
    $data = fread($stdin, 8192);
    if (strlen($data) == 0) {
        break;
    }
    $raw_mail .= $data;
} while(true);
fclose($stdin);

// メールの処理
m_process_mail($raw_mail);

// デバッグ用ログ保存
m_debug_log(ob_get_contents(), PEAR_LOG_DEBUG);

while (@ob_end_clean());


/**
 * メール処理
 */
function m_process_mail($raw_mail)
{
    $options['from_encoding']    = MAIL_FROM_ENCODING;
    $options['to_encoding']      = 'UTF-8';
    $options['img_tmp_dir']      = OPENPNE_VAR_DIR . '/tmp';
    $options['img_max_filesize'] = IMAGE_MAX_FILESIZE * 1024;
    $options['trim_doublebyte_space'] = OPENPNE_TRIM_DOUBLEBYTE_SPACE;

    $decoder =& new OpenPNE_KtaiMail($options);
    $decoder->decode($raw_mail);

    $from = $decoder->get_from();
    $to   = $decoder->get_to();

    if (!db_common_is_mailaddress($from) || !db_common_is_mailaddress($to)) {
        m_debug_log('mail.php::m_process_mail() ERROR code 3');
        return false;
    }

    /* OpenPNE2 スマートフォン対応：ここから */
    // メールログに送信者を記録
    if (MAIL_DEBUG_LOG_FROM) {
        m_debug_log('mail_sns::m_process_mail() From : '. $from. ' To '. $to);
   }

    // ドメイン制限チェック
    if (check_mail_post_limit_domain4mail_address($from)) {
        m_debug_log('mail.php::m_process_mail() ERROR LIMIT Domain');
        return false;
    }

    /* OpenPNE2 スマートフォン対応：ここまで */

    list($to_user, $to_host) = explode("@", $to, 2);

    // check prefix
    if (MAIL_ADDRESS_PREFIX) {
        if (strpos($to_user, MAIL_ADDRESS_PREFIX) !== 0) {
            m_debug_log('mail.php::m_process_mail() missing prefix');
            return false;
        }
        $to_user = substr($to_user, strlen(MAIL_ADDRESS_PREFIX));
    }

    if ($to_host === MAIL_SERVER_DOMAIN) {
        $mail_sns =& new mail_sns($decoder);
        if (!$mail_sns->main()) {
            m_debug_log('mail.php::m_process_mail() ERROR code 1');
            return false;
        }
    } else {
        m_debug_log('mail.php::m_process_mail() ERROR code 2');
        return false;
    }

    return true;
}

/**
 * デバッグ用ログ保存
 */
function m_debug_log($msg, $priority =  PEAR_LOG_WARNING)
{
    if (!MAIL_DEBUG_LOG) return;

    $log_path = OPENPNE_VAR_DIR . '/log/mail.log';
    $file =& Log::singleton('file', $log_path, 'MAIL');

    mb_convert_encoding($msg, 'JIS', 'auto');
    $file->log($msg, $priority);
}


/* OpenPNE2 スマートフォン対応：ここから */
/**
 * 制限ドメインチェック
 * 引数：$mail_address メールアドレス
 * 返り値: 制限なし = false 
 *         制限あり = true 
 */
function check_mail_post_limit_domain4mail_address($mail_address) {

    // 設定がない場合
    if (!isset($GLOBALS['MAIL_POST_LIMIT_DOMAIN']) || empty($GLOBALS['MAIL_POST_LIMIT_DOMAIN'])) {
        return false;
    }

    // 正規性はチェック済み

    $arr = explode('@', $mail_address);
    $mail_domain = $arr[1];

    foreach ($GLOBALS['MAIL_POST_LIMIT_DOMAIN'] as $domain) {
        if ($domain) {
            $regexp = str_replace('\*', '.*', preg_quote($domain, '/'));
            if (preg_match(sprintf('/%s/', $regexp), $mail_domain)) {
                return true;
            }
        }
    }

    return false;
}

/* OpenPNE2 スマートフォン対応：ここまで */

?>
