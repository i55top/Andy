<?php

/**
 * 说说
 * 
 * @package custom 
 * 
 **/

?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php $this->need('public/include.php'); ?>
    <?php if ($this->options->JPrismTheme) : ?>
        <link rel="stylesheet" href="<?php $this->options->JPrismTheme() ?>">
    <?php else : ?>
        <link rel="stylesheet" href="https://lib.baomitu.com/prism/1.26.0/themes/prism.min.css">
    <?php endif; ?>
    <script src="https://lib.baomitu.com/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script src="https://lib.baomitu.com/prism/1.26.0/prism.min.js"></script>
</head>

<body>
        <?php $this->need('public/header.php'); ?>
        <?php $this->need('public/batten.php'); ?>
        <div class="joe_container">
            <div class="joe_main">
                <section class="joe_adaption">
                    <?php $this->comments()->to($comments); ?>

                    <div class="joe_cross" id="comments">
                        <h3 class="joe_cross__title">
                            <span><i class="zm zm-pinglun-1"></i> 我的<?php $this->title(); ?></span>
                            <span><?php $this->commentsNum(); ?> 条<?php $this->title(); ?>，<?php _getViews($this); ?> 次观望</span>
                        </h3>

                        <div id="<?php $this->respondId(); ?>" class="joe_cross__respond" style="display: <?php if (!$this->user->hasLogin()) : ?>none<?php endif; ?>">
                            <form method="post" class="joe_cross__respond-form" action="<?php $this->commentUrl() ?>" data-type="text">
                                <div class="body">
                                    <textarea class="text joe_owo__target" id="textarea" name="text" value="" autocomplete="new-password" placeholder="<?php if ($this->user->hasLogin()) : ?>说点儿什么吧<?php else : ?>我也说一句..<?php endif; ?>"></textarea>
                                </div>
                                <?php if ($this->user->hasLogin()) : ?>
                                <?php else : ?>
                                    <div class="head">
                                        <div class="list">
                                            <input id="author" type="text" value="<?php $this->user->hasLogin() ? $this->user->screenName() : $this->remember('author') ?>" autocomplete="off" name="author" maxlength="16" placeholder="昵称:" />
                                        </div>
                                        <div class="list">
                                            <input id="mail" type="text" value="<?php $this->user->hasLogin() ? $this->user->mail() : $this->remember('mail') ?>" autocomplete="off" name="mail" placeholder="邮箱:" />
                                        </div>
                                        <div class="list">
                                            <input type="text" autocomplete="off" name="url" placeholder="网址（非必填）" />
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="foot">
                                    <div class="owo joe_owo__contain"></div>
                                    <div class="submit">
                                        <span class="cancle joe_cross__cancle">取消</span>
                                        <button type="submit">
                                            <?php if ($this->user->hasLogin()) : ?>发表<?php else : ?>确定<?php endif; ?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php if ($comments->have()) : ?>
                            <?php $comments->listComments(); ?>
                            <?php
                            $comments->pageNav(
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
                        <?php endif; ?>
                    </div>

                    <?php
                    if ($this->user->hasLogin()) {
                        $GLOBALS['isLogin'] = true;
                    } else {
                        $GLOBALS['isLogin'] = false;
                    }
                    function threadedComments($comments, $options)
                    {
                        if ($comments->authorId) {
                            if ($comments->authorId == $comments->ownerId) {
                                $commentClass = 'comment-by-author';
                            }
                        }
                    ?>
                        <li class="comment-list__item">
                            <div class="comment-list__item-contain" id="<?php $comments->theId(); ?>">
                                <div class="term">
                                    <img width="48" height="48" class="avatar lazyload" src="<?php _getAvatarLazyload() ?>" data-src="<?php _getAvatarByMail($comments->mail); ?>" alt="头像" />
                                    <div class="content">
                                        <div class="user">
                                            <span class="author"><?php $comments->author(); ?><?php _getParentReply($comments->parent) ?></span>
                                        </div>
                                        <div class="substance">
                                            <?php _parseCommentReply($comments->content); ?>
                                            <div class="handle">
                                                <time class="date" datetime="<?php $comments->dateWord(); ?>"><?php $comments->dateWord(); ?></time>
                                                <?php $suport = _getSupport($comments->coid) ?>
                                                <a class="support <?php echo $suport['icon'] ?>" data-coid="<?php echo $comments->coid ?>" href="javascript:void (0)">
                                                    <?php echo '' . $suport['count'] . '' . $suport['text'] ?>
                                                </a>
                                                <span class="reply joe_cross__reply" data-id="<?php $comments->theId(); ?>" data-coid="<?php $comments->coid(); ?>">
                                                    <i class="zm zm-liu-yan"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php if ($comments->children) : ?>
                                <div class="comment-list__item-children">
                                    <?php $comments->threadedComments($options); ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php } ?>
                </section>
            </div>
        </div>
        <?php $this->need('public/footer.php'); ?>
    </div>
</body>

</html>