<?php

/**
 * “用博客记录生活” <br /> “ 环境要求：PHP 5.4 ~ 7.4 ”
 *“改编Andy:<a href="https://i55.top" target="_blank">https://i55.top</a>”
 *“原创Joe:<a href="https://78.al/" target="_blank">https://78.al</a>”
 * @package Andy
 * @author Andy
 * @link https://i55.top
 */
?>
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
                            <ul class="joe_archive__list joe_list">
                                <?php while ($this->next()) : ?>
                                    <?php if ($this->fields->mode === "default" || !$this->fields->mode) : ?>
                                        <li class="joe_list__item wow default">
                                            <div class="thumbnail">
                                                <img width="100%" height="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php echo _getThumbnails($this)[0] ?>" />
                                            </div>
                                            <div class="information">
                                                <a href="<?php $this->permalink() ?>" class="title" title="<?php $this->title() ?>" target="_blank" rel="noopener noreferrer">
                                                    <?php $this->title() ?>
                                                </a>
                                                <div class="abstract"><?php _getAbstract($this) ?></div>
                                                <div class="meta">
                                                    <ul class="items">
                                                        <li><?php $this->dateWord(); ?></li>
                                                    </ul>
                                                    <div class="meta-right">
                                                        <ul class="items">
                                                            <li>
                                                                <a class="like like-<?php echo $this->cid; ?>" data-cid="<?php echo $this->cid; ?>" href="javascript:;">
                                                                    <span class="like-status">
                                                                        <?php if ($this->cid) : ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                                                <path d="M14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1h3.482a1 1 0 0 0 .817-.423L11.752.85a.5.5 0 0 1 .632-.159l1.814.907a2.5 2.5 0 0 1 1.305 2.853L14.6 8zM7 10.588V19h11.16L21 12.104V10h-6.4a2 2 0 0 1-1.938-2.493l.903-3.548a.5.5 0 0 0-.261-.571l-.661-.33-4.71 6.672c-.25.354-.57.644-.933.858zM5 11H3v8h2v-8z" />
                                                                            </svg>
                                                                        <?php else : ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                                                <path d="M2 9h3v12H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1zm5.293-1.293l6.4-6.4a.5.5 0 0 1 .654-.047l.853.64a1.5 1.5 0 0 1 .553 1.57L14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H8a1 1 0 0 1-1-1V8.414a1 1 0 0 1 .293-.707z" />
                                                                            </svg>
                                                                        <?php endif; ?>
                                                                    </span>
                                                                    <span class="like-num"><?php _getAgree($this) ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php $this->permalink(); ?>#comments">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                                        <path fill="none" d="M0 0h24v24H0z" />
                                                                        <path d="M2 8.994A5.99 5.99 0 0 1 8 3h8c3.313 0 6 2.695 6 5.994V21H8c-3.313 0-6-2.695-6-5.994V8.994zM20 19V8.994A4.004 4.004 0 0 0 16 5H8a3.99 3.99 0 0 0-4 3.994v6.012A4.004 4.004 0 0 0 8 19h12zm-6-8h2v2h-2v-2zm-6 0h2v2H8v-2z" />
                                                                    </svg>
                                                                    <?php $this->commentsNum('%d'); ?>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php elseif ($this->fields->mode === "single") : ?>
                                        <li class="joe_list__item wow single">
                                            <div class="information">
                                                <a href="<?php $this->permalink() ?>" class="title" title="<?php $this->title() ?>" target="_blank" rel="noopener noreferrer">
                                                    <?php $this->title() ?>
                                                </a>
                                                <div class="abstract"><?php _getAbstract($this) ?></div>
                                            </div>
                                            <div class="thumbnail">
                                                <img width="100%" height="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php echo _getThumbnails($this)[0] ?>" />
                                            </div>
                                            <div class="meta">
                                                <ul class="items">
                                                    <li><?php $this->dateWord(); ?></li>
                                                </ul>
                                                <div class="meta-right">
                                                    <ul class="items">
                                                        <li>
                                                            <a class="like like-<?php echo $this->cid; ?>" data-cid="<?php echo $this->cid; ?>" href="javascript:;">
                                                                <span class="like-status">
                                                                    <?php if ($this->cid) : ?>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path d="M14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1h3.482a1 1 0 0 0 .817-.423L11.752.85a.5.5 0 0 1 .632-.159l1.814.907a2.5 2.5 0 0 1 1.305 2.853L14.6 8zM7 10.588V19h11.16L21 12.104V10h-6.4a2 2 0 0 1-1.938-2.493l.903-3.548a.5.5 0 0 0-.261-.571l-.661-.33-4.71 6.672c-.25.354-.57.644-.933.858zM5 11H3v8h2v-8z" />
                                                                        </svg>
                                                                    <?php else : ?>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path d="M2 9h3v12H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1zm5.293-1.293l6.4-6.4a.5.5 0 0 1 .654-.047l.853.64a1.5 1.5 0 0 1 .553 1.57L14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H8a1 1 0 0 1-1-1V8.414a1 1 0 0 1 .293-.707z" />
                                                                        </svg>
                                                                    <?php endif; ?>
                                                                </span>
                                                                <span class="like-num"><?php _getAgree($this) ?></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php $this->permalink(); ?>#comments">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                                    <path d="M2 8.994A5.99 5.99 0 0 1 8 3h8c3.313 0 6 2.695 6 5.994V21H8c-3.313 0-6-2.695-6-5.994V8.994zM20 19V8.994A4.004 4.004 0 0 0 16 5H8a3.99 3.99 0 0 0-4 3.994v6.012A4.004 4.004 0 0 0 8 19h12zm-6-8h2v2h-2v-2zm-6 0h2v2H8v-2z" />
                                                                </svg>
                                                                <?php $this->commentsNum('%d'); ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php elseif ($this->fields->mode === "multiple") : ?>
                                        <li class="joe_list__item wow multiple">
                                            <div class="information">
                                                <a href="<?php $this->permalink() ?>" class="title" title="<?php $this->title() ?>" target="_blank" rel="noopener noreferrer">
                                                    <?php $this->title() ?>
                                                </a>
                                            </div>
                                            <a href="<?php $this->permalink() ?>" class="thumbnail" title="<?php $this->title() ?>" target="_blank" rel="noopener noreferrer">
                                                <?php $image = _getThumbnails($this) ?>
                                                <?php for ($x = 0; $x < 4; $x++) : ?>
                                                    <img width="100%" height="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php echo $image[$x]; ?>" alt="<?php $this->title() ?>" />
                                                <?php endfor; ?>
                                            </a>
                                            <div class="meta">
                                                <ul class="items">
                                                    <li><?php $this->dateWord(); ?></li>
                                                </ul>
                                                <div class="meta-right">
                                                    <ul class="items">
                                                        <li>
                                                            <a class="like like-<?php echo $this->cid; ?>" data-cid="<?php echo $this->cid; ?>" href="javascript:;">
                                                                <span class="like-status">
                                                                    <?php if ($this->cid) : ?>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path d="M14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1h3.482a1 1 0 0 0 .817-.423L11.752.85a.5.5 0 0 1 .632-.159l1.814.907a2.5 2.5 0 0 1 1.305 2.853L14.6 8zM7 10.588V19h11.16L21 12.104V10h-6.4a2 2 0 0 1-1.938-2.493l.903-3.548a.5.5 0 0 0-.261-.571l-.661-.33-4.71 6.672c-.25.354-.57.644-.933.858zM5 11H3v8h2v-8z" />
                                                                        </svg>
                                                                    <?php else : ?>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path d="M2 9h3v12H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1zm5.293-1.293l6.4-6.4a.5.5 0 0 1 .654-.047l.853.64a1.5 1.5 0 0 1 .553 1.57L14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H8a1 1 0 0 1-1-1V8.414a1 1 0 0 1 .293-.707z" />
                                                                        </svg>
                                                                    <?php endif; ?>
                                                                </span>
                                                                <span class="like-num"><?php _getAgree($this) ?></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php $this->permalink(); ?>#comments">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                                    <path d="M2 8.994A5.99 5.99 0 0 1 8 3h8c3.313 0 6 2.695 6 5.994V21H8c-3.313 0-6-2.695-6-5.994V8.994zM20 19V8.994A4.004 4.004 0 0 0 16 5H8a3.99 3.99 0 0 0-4 3.994v6.012A4.004 4.004 0 0 0 8 19h12zm-6-8h2v2h-2v-2zm-6 0h2v2H8v-2z" />
                                                                </svg>
                                                                <?php $this->commentsNum('%d'); ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php elseif ($this->fields->mode === "chat") : ?>
                                        <li class="joe_list__item wow chat">
                                            <div class="information">
                                                <a href="<?php $this->author->permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                                    <img class="avatar" src="<?php _getAvatarByMail($this->author->mail) ?>" alt="<?php $this->author(); ?>" alt="">
                                                </a>
                                                <div class="desc">
                                                    <div class="title"><a href="<?php $this->permalink(); ?>" target="_blank" rel="noopener noreferrer"><?php $this->title(); ?></a></div>
                                                    <div class="time"><?php _getViews($this) ?> 人围观</div>
                                                </div>
                                            </div>
                                                <div class="content">
                                                    <div class="abstract"><?php _getAbstract($this) ?></div>
                                                </div>
                                            <div class="meta">
                                                <div class="meta-left">
                                                    <ul class="items">
                                                        <li><?php $this->dateWord(); ?></li>
                                                    </ul>
                                                </div>
                                                <div class="meta-right">
                                                    <ul class="items">
                                                        <li>
                                                            <a class="like like-<?php echo $this->cid; ?>" data-cid="<?php echo $this->cid; ?>" href="javascript:;">
                                                                <span class="like-status">
                                                                    <?php if ($this->cid) : ?>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path d="M14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1h3.482a1 1 0 0 0 .817-.423L11.752.85a.5.5 0 0 1 .632-.159l1.814.907a2.5 2.5 0 0 1 1.305 2.853L14.6 8zM7 10.588V19h11.16L21 12.104V10h-6.4a2 2 0 0 1-1.938-2.493l.903-3.548a.5.5 0 0 0-.261-.571l-.661-.33-4.71 6.672c-.25.354-.57.644-.933.858zM5 11H3v8h2v-8z" />
                                                                        </svg>
                                                                    <?php else : ?>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                            <path fill="none" d="M0 0h24v24H0z" />
                                                                            <path d="M2 9h3v12H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1zm5.293-1.293l6.4-6.4a.5.5 0 0 1 .654-.047l.853.64a1.5 1.5 0 0 1 .553 1.57L14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H8a1 1 0 0 1-1-1V8.414a1 1 0 0 1 .293-.707z" />
                                                                        </svg>
                                                                    <?php endif; ?>
                                                                </span>
                                                                <span class="like-num"><?php _getAgree($this) ?></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php $this->permalink(); ?>#comments">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                                    <path d="M2 8.994A5.99 5.99 0 0 1 8 3h8c3.313 0 6 2.695 6 5.994V21H8c-3.313 0-6-2.695-6-5.994V8.994zM20 19V8.994A4.004 4.004 0 0 0 16 5H8a3.99 3.99 0 0 0-4 3.994v6.012A4.004 4.004 0 0 0 8 19h12zm-6-8h2v2h-2v-2zm-6 0h2v2H8v-2z" />
                                                                </svg>
                                                                <?php $this->commentsNum('%d'); ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    <?php else : ?>
                                        <li class="joe_list__item wow none">
                                            <div class="information">
                                                <a href="<?php $this->permalink() ?>" class="title" title="<?php $this->title() ?>" target="_blank" rel="noopener noreferrer">
                                                    <?php $this->title() ?>
                                                </a>
                                                <div class="abstract"><?php _getAbstract($this) ?></div>
                                                <div class="meta">
                                                    <ul class="items">
                                                        <li><?php $this->dateWord(); ?></li>
                                                    </ul>
                                                    <div class="meta-right">
                                                        <ul class="items">
                                                            <li>
                                                                <a class="like like-<?php echo $this->cid; ?>" data-cid="<?php echo $this->cid; ?>" href="javascript:;">
                                                                    <span class="like-status">
                                                                        <?php if ($this->cid) : ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                                                <path d="M14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1h3.482a1 1 0 0 0 .817-.423L11.752.85a.5.5 0 0 1 .632-.159l1.814.907a2.5 2.5 0 0 1 1.305 2.853L14.6 8zM7 10.588V19h11.16L21 12.104V10h-6.4a2 2 0 0 1-1.938-2.493l.903-3.548a.5.5 0 0 0-.261-.571l-.661-.33-4.71 6.672c-.25.354-.57.644-.933.858zM5 11H3v8h2v-8z" />
                                                                            </svg>
                                                                        <?php else : ?>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                                                <path d="M2 9h3v12H2a1 1 0 0 1-1-1V10a1 1 0 0 1 1-1zm5.293-1.293l6.4-6.4a.5.5 0 0 1 .654-.047l.853.64a1.5 1.5 0 0 1 .553 1.57L14.6 8H21a2 2 0 0 1 2 2v2.104a2 2 0 0 1-.15.762l-3.095 7.515a1 1 0 0 1-.925.619H8a1 1 0 0 1-1-1V8.414a1 1 0 0 1 .293-.707z" />
                                                                            </svg>
                                                                        <?php endif; ?>
                                                                    </span>
                                                                    <span class="like-num"><?php _getAgree($this) ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php $this->permalink(); ?>#comments">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                                                                        <path fill="none" d="M0 0h24v24H0z" />
                                                                        <path d="M2 8.994A5.99 5.99 0 0 1 8 3h8c3.313 0 6 2.695 6 5.994V21H8c-3.313 0-6-2.695-6-5.994V8.994zM20 19V8.994A4.004 4.004 0 0 0 16 5H8a3.99 3.99 0 0 0-4 3.994v6.012A4.004 4.004 0 0 0 8 19h12zm-6-8h2v2h-2v-2zm-6 0h2v2H8v-2z" />
                                                                    </svg>
                                                                    <?php $this->commentsNum('%d'); ?>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                    <?php $this->pageNav(
                        '<svg class="icon icon-prev" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>',
                        '<svg class="icon icon-next" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>',
                        1,
                        '...',
                        array(
                            'wrapTag' => 'ul',
                            'wrapClass' => 'joe_pagination',
                            'itemTag' => 'li',
                            'textTag' => 'a',
                            'currentClass' => 'active',
                            'prevClass' => 'prev',
                            'nextClass' => 'next'
                        )
                    );
                    ?>
                </section>
			</div>
		</div>
		<?php $this->need('public/footer.php'); ?>
	</div>
</body>

</html>