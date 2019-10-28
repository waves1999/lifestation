<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'LAA1074353-5hx9tf');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'LAA1074353');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', '1lkmK9Lw');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql139.phy.lolipop.lan');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '#Ue-BAoW{PgNrcWp}EdheY8"d?q,FVf@e.il>!^/15|-aW8XZruy_vx{1Og[tz0/');
define('SECURE_AUTH_KEY', 'Ut`l&`vrRFZ!d:o9xGiyr/Bb6`8IM3_WB59<d4JEuiF.$_&1?v8zGqm-DK,Kfjpc');
define('LOGGED_IN_KEY', '1#sj$ud7]w3${J"X[~o^?Yu=Mhq_/#:|FDByk99kR6Uji[-A]y@-8MEu?LEZZw{)');
define('NONCE_KEY', 'wU-Yerj%cy>U,z}HQbUL&Nf[=~e=%%TB#Ts>OBr!gF~NYhHpgipPGl!QOL^Du<N*');
define('AUTH_SALT', '341|;5nM:4xIbrZ]Qj/(/uWzW3|`C1p)5z=2-2BYIo/*z{:;BUx&S7S@$TIl>rn)');
define('SECURE_AUTH_SALT', '&9hr{PK4y<&Zw[RF}C=ID%mF^_%9z>^runcpM2bTm7Jz90JzV54httjFfgZ2Dm|.');
define('LOGGED_IN_SALT', 'W78"vq5b]W>U3/`/z7Diy"*PFfjdz0<^o<8vB)?LD829XFi_UG0f{K%=?m&3Yw6I');
define('NONCE_SALT', 'ZtKm7DWZPhzI5;|~zFy]fsr3C5o%#OTzX7|?Nd%7$T6^KER5f6Yp3Kfg(22a73T(');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp1_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
