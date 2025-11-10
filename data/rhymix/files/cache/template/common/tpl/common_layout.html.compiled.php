<?php if (!defined("RX_VERSION")) exit(); ?><?php $this->config->version = 2; ?>
<!DOCTYPE html>
<html lang="<?php echo $__Context->lang_type = Context::getLangType(); ?>"<?php if ($__Context->m): ?> class="xe-mobilelayout"<?php endif; ?>>
<head>

<!-- META -->
<meta charset="utf-8">
<meta name="generator" content="Rhymix">
<meta name="viewport" content="<?php echo $this->config->context === 'JS' ? escape_js(config('mobile.viewport') ?? HTMLDisplayHandler::DEFAULT_VIEWPORT) : htmlspecialchars(config('mobile.viewport') ?? HTMLDisplayHandler::DEFAULT_VIEWPORT, \ENT_QUOTES, 'UTF-8', false); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php $__tmp_c7be8a731b123e = Context::getMetaTag() ?? []; $__loop_c7be8a731b123e = $this->_v2_initLoopVar("c7be8a731b123e", $__tmp_c7be8a731b123e); foreach ($__tmp_c7be8a731b123e as $__Context->val): ?>
<meta<?php if ($__Context->val['is_http_equiv']): ?> http-equiv="<?php echo $this->config->context === 'JS' ? escape_js($__Context->val['name'] ?? '') : htmlspecialchars($__Context->val['name'] ?? '', \ENT_QUOTES, 'UTF-8', false); ?>"<?php endif; ?><?php if (!$__Context->val['is_http_equiv']): ?> name="<?php echo $this->config->context === 'JS' ? escape_js($__Context->val['name'] ?? '') : htmlspecialchars($__Context->val['name'] ?? '', \ENT_QUOTES, 'UTF-8', false); ?>"<?php endif; ?> content="<?php echo $this->config->context === 'JS' ? escape_js($__Context->val['content'] ?? '') : htmlspecialchars($__Context->val['content'] ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php $this->_v2_incrLoopVar($__loop_c7be8a731b123e); endforeach; $this->_v2_removeLoopVar($__loop_c7be8a731b123e); unset($__loop_c7be8a731b123e); ?>
<meta name="csrf-token" content="<?php echo \Rhymix\Framework\Session::getGenericToken(); ?>" />

<!-- TITLE -->
<title><?php echo $this->config->context === 'JS' ? escape_js(Context::getBrowserTitle()) : htmlspecialchars(Context::getBrowserTitle(), \ENT_QUOTES, 'UTF-8', false); ?></title>

<!-- CSS -->
<?php $__tmp_37e4694fbb1666 = Context::getCssFile(true) ?? []; $__loop_37e4694fbb1666 = $this->_v2_initLoopVar("37e4694fbb1666", $__tmp_37e4694fbb1666); foreach ($__tmp_37e4694fbb1666 as $__Context->css_file): ?>
<link rel="stylesheet" href="<?php echo $__Context->css_file['file'] ?? ''; ?>"<?php if ($__Context->css_file['media'] !== 'all'): ?> media="<?php echo $this->config->context === 'JS' ? escape_js($__Context->css_file['media'] ?? '') : htmlspecialchars($__Context->css_file['media'] ?? '', \ENT_QUOTES, 'UTF-8', false); ?>"<?php endif; ?> />
<?php $this->_v2_incrLoopVar($__loop_37e4694fbb1666); endforeach; $this->_v2_removeLoopVar($__loop_37e4694fbb1666); unset($__loop_37e4694fbb1666); ?>

<!-- JS -->
<?php $__tmp_ad3b22bda756ad = Context::getJsFile('head', true) ?? []; $__loop_ad3b22bda756ad = $this->_v2_initLoopVar("ad3b22bda756ad", $__tmp_ad3b22bda756ad); foreach ($__tmp_ad3b22bda756ad as $__Context->js_file): ?>
<script src="<?php echo $__Context->js_file['file'] ?? ''; ?>"<?php $this->config->context = "JS"; ?>><?php $this->config->context = "HTML"; ?></script>
<?php $this->_v2_incrLoopVar($__loop_ad3b22bda756ad); endforeach; $this->_v2_removeLoopVar($__loop_ad3b22bda756ad); unset($__loop_ad3b22bda756ad); ?>

<!-- RSS -->
<?php if (!empty($__Context->rss_url)): ?>
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $this->config->context === 'JS' ? escape_js($__Context->rss_url ?? '') : htmlspecialchars($__Context->rss_url ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php endif; ?>
<?php if (!empty($__Context->general_rss_url)): ?>
<link rel="alternate" type="application/rss+xml" title="Site RSS" href="<?php echo $this->config->context === 'JS' ? escape_js($__Context->general_rss_url ?? '') : htmlspecialchars($__Context->general_rss_url ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php endif; ?>
<?php if (!empty($__Context->atom_url)): ?>
<link rel="alternate" type="application/atom+xml" title="Atom" href="<?php echo $this->config->context === 'JS' ? escape_js($__Context->atom_url ?? '') : htmlspecialchars($__Context->atom_url ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php endif; ?>
<?php if (!empty($__Context->general_atom_url)): ?>
<link rel="alternate" type="application/atom+xml" title="Site Atom" href="<?php echo $this->config->context === 'JS' ? escape_js($__Context->general_atom_url ?? '') : htmlspecialchars($__Context->general_atom_url ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php endif; ?>

<!-- ICONS AND OTHER LINKS -->
<?php if (!empty($__Context->canonical_url = Context::getCanonicalURL())): ?>
<link rel="canonical" href="<?php echo $this->config->context === 'JS' ? escape_js($__Context->canonical_url ?? '') : htmlspecialchars($__Context->canonical_url ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php endif; ?>
<?php if (!empty($__Context->favicon_url)): ?>
<link rel="shortcut icon" href="<?php echo $this->config->context === 'JS' ? escape_js($__Context->favicon_url ?? '') : htmlspecialchars($__Context->favicon_url ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php endif; ?>
<?php if (!empty($__Context->mobicon_url)): ?>
<link rel="apple-touch-icon" href="<?php echo $this->config->context === 'JS' ? escape_js($__Context->mobicon_url ?? '') : htmlspecialchars($__Context->mobicon_url ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php endif; ?>

<!-- OTHER HEADERS -->
<?php $__tmp_f048fc745541ad = Context::getOpenGraphData() ?? []; $__loop_f048fc745541ad = $this->_v2_initLoopVar("f048fc745541ad", $__tmp_f048fc745541ad); foreach ($__tmp_f048fc745541ad as $__Context->og_metadata): ?>
<meta property="<?php echo $this->config->context === 'JS' ? escape_js($__Context->og_metadata['property'] ?? '') : htmlspecialchars($__Context->og_metadata['property'] ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" content="<?php echo $this->config->context === 'JS' ? escape_js($__Context->og_metadata['content'] ?? '') : htmlspecialchars($__Context->og_metadata['content'] ?? '', \ENT_QUOTES, 'UTF-8', false); ?>" />
<?php $this->_v2_incrLoopVar($__loop_f048fc745541ad); endforeach; $this->_v2_removeLoopVar($__loop_f048fc745541ad); unset($__loop_f048fc745541ad); ?>
<?php echo Context::getHtmlHeader(); ?>
</head>

<!-- BODY START -->
<body<?php echo Context::getBodyClass(); ?>>

<!-- COMMON JS VARIABLES -->
<script<?php $this->config->context = "JS"; ?>>
	var default_url = <?php echo $this->config->context === 'JS' ? json_encode(\Rhymix\Framework\URL::encodeIdna(Context::getDefaultUrl(null, RX_SSL)), self::$_json_options) : htmlspecialchars(json_encode(\Rhymix\Framework\URL::encodeIdna(Context::getDefaultUrl(null, RX_SSL)), self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var current_url = <?php echo $this->config->context === 'JS' ? json_encode(\Rhymix\Framework\URL::encodeIdna($__Context->current_url), self::$_json_options) : htmlspecialchars(json_encode(\Rhymix\Framework\URL::encodeIdna($__Context->current_url), self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var request_uri = <?php echo $this->config->context === 'JS' ? json_encode(\Rhymix\Framework\URL::encodeIdna($__Context->request_uri), self::$_json_options) : htmlspecialchars(json_encode(\Rhymix\Framework\URL::encodeIdna($__Context->request_uri), self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var current_lang = xe.current_lang = <?php echo $this->config->context === 'JS' ? json_encode($__Context->lang_type, self::$_json_options) : htmlspecialchars(json_encode($__Context->lang_type, self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var current_mid = <?php echo $this->config->context === 'JS' ? json_encode($__Context->mid ?? null, self::$_json_options) : htmlspecialchars(json_encode($__Context->mid ?? null, self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var http_port = <?php echo $this->config->context === 'JS' ? json_encode(Context::get("_http_port") ?: null, self::$_json_options) : htmlspecialchars(json_encode(Context::get("_http_port") ?: null, self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var https_port = <?php echo $this->config->context === 'JS' ? json_encode(Context::get("_https_port") ?: null, self::$_json_options) : htmlspecialchars(json_encode(Context::get("_https_port") ?: null, self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var enforce_ssl = <?php echo $this->config->context === 'JS' ? json_encode($__Context->site_module_info->security === 'always' ? true : false, self::$_json_options) : htmlspecialchars(json_encode($__Context->site_module_info->security === 'always' ? true : false, self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var cookies_ssl = <?php echo $this->config->context === 'JS' ? json_encode(config('session.use_ssl_cookies') ? true : false, self::$_json_options) : htmlspecialchars(json_encode(config('session.use_ssl_cookies') ? true : false, self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	var rewrite_level = <?php echo $this->config->context === 'JS' ? json_encode(intval(\Rhymix\Framework\Router::getRewriteLevel()), self::$_json_options) : htmlspecialchars(json_encode(intval(\Rhymix\Framework\Router::getRewriteLevel()), self::$_json_options), \ENT_QUOTES, 'UTF-8', false); ?>;
	if (detectColorScheme) detectColorScheme();
<?php $this->config->context = "HTML"; ?></script>

<!-- PAGE CONTENT -->
<?php echo Context::getBodyHeader(); ?>
<?php echo $__Context->content ?? ''; ?>
<?php echo Context::getHtmlFooter(); ?>
<?php echo "\n\n"; ?>

<!-- ETC -->
<div id="rhymix_alert"></div>
<div id="rhymix_debug_panel"></div>
<div id="rhymix_debug_button"></div>

<!-- BODY JS -->
<?php $__tmp_806bfbb1eafd24 = Context::getJsFile('body', true) ?? []; $__loop_806bfbb1eafd24 = $this->_v2_initLoopVar("806bfbb1eafd24", $__tmp_806bfbb1eafd24); foreach ($__tmp_806bfbb1eafd24 as $__Context->js_file): ?>
<script src="<?php echo $__Context->js_file['file'] ?? ''; ?>"<?php $this->config->context = "JS"; ?>><?php $this->config->context = "HTML"; ?></script>
<?php $this->_v2_incrLoopVar($__loop_806bfbb1eafd24); endforeach; $this->_v2_removeLoopVar($__loop_806bfbb1eafd24); unset($__loop_806bfbb1eafd24); ?>

</body>
</html>
