<?php $this->need('public/config.php'); ?>
<meta charset="utf-8" />
<meta name="renderer" content="webkit" />
<meta name="format-detection" content="email=no" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta itemprop="image" content="<?php $this->options->JShare_QQ_Image() ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, shrink-to-fit=no, viewport-fit=cover">
<link rel="shortcut icon" href="<?php $this->options->JFavicon() ?>" />
<title><?php $this->archiveTitle(array('category' => '分类 %s 下的文章', 'search' => '包含关键字 %s 的文章', 'tag' => '标签 %s 下的文章', 'author' => '%s 发布的文章'), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php if ($this->is('single')) : ?>
	<meta name="keywords" content="<?php echo $this->fields->keywords ? $this->fields->keywords : htmlspecialchars($this->_keywords); ?>" />
	<meta name="description" content="<?php echo $this->fields->description ? $this->fields->description : htmlspecialchars($this->_description); ?>" />
	<?php $this->header('keywords=&description='); ?>
<?php else : ?>
	<?php $this->header(); ?>
<?php endif; ?>
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.mode.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.normalize.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.global.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.responsive.min.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/css/qmsg.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/css/jquery.fancybox.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/css/APlayer.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/css/font_1159885_syvp0if9gpm.css">
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/joe.scroll.js"></script>
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/lazysizes.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/APlayer.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/joe.extend.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/qmsg.js"></script>
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/joe.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/i55top/Andy@Andy1.02/Joe/assets/js/joe.short.min.js"></script>
<?php $this->options->JCustomHeadEnd() ?>
