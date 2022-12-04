<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<?php $this->need('public/include.php'); ?>
	<link rel="stylesheet" href="https://lib.baomitu.com/Swiper/5.4.5/css/swiper.min.css">
	<script src="https://lib.baomitu.com/Swiper/5.4.5/js/swiper.min.js"></script>
	<!--<script src="https://lib.baomitu.com/wow/1.1.2/wow.min.js"></script>-->
	<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.archive.min.css?v=7.3.7@1'); ?>">
    <script src="<?php $this->options->themeUrl('assets/js/joe.archive.min.js?v=7.3.7@1'); ?>"></script>
	<script>
    document.addEventListener('DOMContentLoaded', () => {
        window.Joe.PAGE_INDEX = '<?php echo $this->_currentPage; ?>' || 1;
    });
</script>
</head>

<body>
		<?php $this->need('public/header.php'); ?>
		<?php $this->need('public/batten.php'); ?>
		<div class="joe_container">
			<div class="joe_main">
                <section class="joe_adaption">
		<h1 style="text-align: center;padding: 30px;">糟糕，网页去外太空了！</h1>
                </section>
			</div>
		</div>
		<?php $this->need('public/footer.php'); ?>
	</div>
</body>

</html>
