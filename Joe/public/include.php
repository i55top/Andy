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
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.mode.min.css?v=7.3.7@1'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.normalize.min.css?v=7.3.7@1'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.global.min.css?v=7.3.7@1.6.12'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.responsive.min.css?v=7.3.7@1.2.2'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/qmsg.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/jquery.fancybox.min.css'); ?>" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/font-awesome.min.css'); ?>" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/APlayer.min.css'); ?>" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/font_1159885_syvp0if9gpm.css'); ?>">
<script src="<?php $this->options->themeUrl('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/joe.scroll.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/lazysizes.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/APlayer.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/jquery.fancybox.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/joe.extend.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/qmsg.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/joe.global.min.js?v=7.3.7@1.1.2'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/joe.short.min.js?v=7.3.7@1'); ?>"></script>
<?php $this->options->JCustomHeadEnd() ?>
