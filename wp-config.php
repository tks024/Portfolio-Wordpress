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
 * @link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'wp_portfolio_db');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'root');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '!IoAW:(PR`d}@M]QfhEV^!=+tUIdzlQbP-bw8;J!/TM?CL~SO4h8~m{J[3LP!<jJ');
define('SECURE_AUTH_KEY',  '-c.u1^W(yk*y!jUR3e.80%`5EdUekEVksI.gcO5b{Z$Gtjiup0{(A2,z_OV82T)H');
define('LOGGED_IN_KEY',    '1%9JewHYvkB.XQAs#txB!+p!xX/MEet /%>:S.T*1OM7YSa1>UE=(D_%!8eFdVEE');
define('NONCE_KEY',        'fUC.Np0-kY=wWzEu^x tK5?KrQ%YB<<dfg]jO4o+cm!W{)^AOS_[00ptz7dn|Z2D');
define('AUTH_SALT',        'hrK:[fb)d*;Ghb1(O6Dksp]9`?9!/njo_K3{{E$Wwh5X6@Bx9UqcKTBjP-GvNza-');
define('SECURE_AUTH_SALT', 'IJi+Q`f&qaqFTDLa%;9OL_<~P0iR{{7=6lEu`J>`xp_*&VNJOir3V(+VN>(kz5y=');
define('LOGGED_IN_SALT',   '(}D7MPRHj4?@p-Eg<=1m!H6m0FzE3,LIH^WGoO(<:Y[{w]/;dDUrFJ0, &7BikDV');
define('NONCE_SALT',       'x*O~oA0U~58ep+v]kf99H{9ru,BI;;,oC@qO8O1VdKDK%,^=[0t] k}Z:eOua7V{');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
