<?php

/**
 * 友链
 * 
 * @package custom 
 * 
 **/

?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php $this->need('public/include.php'); ?>
    <script src="<?php $this->options->themeUrl('assets/js/joe.post_page.min.js'); ?>"></script>
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
                            $mypattern = <<<eof
                            <li class="item">
                            <div class="user">
                            <a href="{url}" target="_blank">
                            <img src="{image}" />
                            <span>{name}</span>
                            </a>
                            </div>
                            </li>
eof;
                            Links_Plugin::output($mypattern, 0, "");
                            ?>
                    </ul>
                    </div>                        
                        <?php $this->need('public/article.php'); ?>
                    </div>
                    <?php $this->need('public/comment.php'); ?>
                </section>
            </div>
        </div>
        <?php $this->need('public/footer.php'); ?>
    </div>
</body>

</html>