<?php

/**
 * 留言
 * 
 * @package custom 
 * 
 **/

?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php $this->need('public/include.php'); ?>
</head>

<body>
        <?php $this->need('public/header.php'); ?>
        <?php $this->need('public/batten.php'); ?>
        <div class="joe_container">
            <div class="joe_main">
                <section class="joe_adaption">
                    <div class="joe_detail" data-cid="<?php echo $this->cid ?>">
                        <div class="joe_detail__leaving">
                                <ul class="joe_detail__leaving-ranking">
                                    <?php
                                    $time = time() - 60 * 60 * 24 * Helper::options()->JReader_Ranking_Time;
                                    $mail = Helper::options()->JReader_Ranking_Mail;
                                    $limit = Helper::options()->JReader_Ranking_Limit;
                                    $counts = Typecho_Db::get()->fetchAll(
                                        Typecho_Db::get()
                                            ->select('COUNT(author) AS cnt', 'author', 'max(url) url', 'max(authorId) authorId', 'max(mail) mail')
                                            ->from('table.comments')
                                            ->where('created > ?', $time)
                                            ->where('status = ?', 'approved')
                                            ->where('type = ?', 'comment')
                                            ->where('mail != ?', $mail)
                                            ->group('author')
                                            ->order('cnt', Typecho_Db::SORT_DESC)
                                            ->limit($limit)
                                    );
                                    foreach ($counts as $count) {
                                        echo '
                                        <li class="item">
                                            <div class="user">
                                                <a target="_blank" href=' . $count['url'] . '>
                                                    <i> +' . $count['cnt'] . '</i>
                                                    <img src="' . _getAvatarByMail($count['mail'], false) . '">
                                                    <span>' . $count['author'] . '</span>
                                                </a>
                                            </div> 
                                        </li>
                                    ';
                                    }
                                    ?>
                                </ul>
                        </div>
                    </div>
                    <?php $this->need('public/comment.php'); ?>
                </section>
            </div>
        </div>
        <?php $this->need('public/footer.php'); ?>
    </div>
</body>

</html>