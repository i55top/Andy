<?php if ($this->is('index')) :  ?>
    <div class="joe_batten">
        <img width="100%" height="100%" class="image lazyload" src="https://i55.top/yun/bg/bg2.jpg" data-src="<?php $this->options->JIndex_Top_Image() ?>" />
        <div class="author">
            <div class="joe_container">
                <div class="author__user">
                    <img class="avatar lazyload" src="<?php _getAvatarLazyload(); ?>" data-src="<?php $this->options->JAside_Author_Avatar ? $this->options->JAside_Author_Avatar() : _getAvatarByMail($this->authorId ? $this->author->mail : $this->user->mail) ?>" alt="博主头像" />
                    <div class="author__user-item">
                        <a class="link" href="<?php $this->options->JAside_Author_Link() ?>" target="_blank" rel="noopener noreferrer nofollow"><?php $this->options->JAside_Author_Nick ? $this->options->JAside_Author_Nick() : ($this->authorId ? $this->author->screenName() : $this->user->screenName()); ?></a>
                        <p id="hitokoto">
                            <span id="hitokoto_text">花有重开日，人无再少年。</span>
                            <script>
                                fetch('https://v1.hitokoto.cn/?c=i')
                                    .then(response => response.json())
                                    .then(data => {
                                        const hitokoto = document.getElementById('hitokoto_text')
                                        hitokoto.href = 'https://hitokoto.cn/?uuid=' + data.uuid
                                        hitokoto.innerText = data.hitokoto
                                    })
                                    .catch(console.error)
                            </script>
                        </p>
                    </div>
                </div>
                <?php Typecho_Widget::widget('Widget_Stat')->to($item); ?>
                <div class="author__count">
                    <div class="author__count-item" title="总文章数">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M21 8v12.993A1 1 0 0 1 20.007 22H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8zm-2 1h-5V4H5v16h14V9zM8 7h3v2H8V7zm0 4h8v2H8v-2zm0 4h8v2H8v-2z" fill="rgba(236,240,241,1)" />
                        </svg>
                        <div class="num"><?php echo number_format($item->publishedPostsNum); ?></div>
                    </div>
                    <div class="author__count-item" title="总评论量">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M2 8.994A5.99 5.99 0 0 1 8 3h8c3.313 0 6 2.695 6 5.994V21H8c-3.313 0-6-2.695-6-5.994V8.994zM20 19V8.994A4.004 4.004 0 0 0 16 5H8a3.99 3.99 0 0 0-4 3.994v6.012A4.004 4.004 0 0 0 8 19h12zm-6-8h2v2h-2v-2zm-6 0h2v2H8v-2z" fill="rgba(236,240,241,1)" />
                        </svg>
                        <div class="num"><?php echo number_format($item->publishedCommentsNum); ?></div>
                    </div>
                    <div class="author__count-item" title="总浏览量">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9C2.121 6.88 6.608 3 12 3zm0 16a9.005 9.005 0 0 0 8.777-7 9.005 9.005 0 0 0-17.554 0A9.005 9.005 0 0 0 12 19zm0-2.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0-2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" fill="rgba(236,240,241,1)" />
                        </svg>
                        <div class="num">
                            <?php
                            $db = Typecho_Db::get();
                            $row = $db->fetchAll('SELECT SUM(VIEWS) FROM `' . $db->getPrefix() . 'contents`');
                            echo number_format($row[0]['SUM(VIEWS)']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($this->is('category')) :  ?>
    <div class="joe_batten">
        <img width="100%" height="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php $this->options->JWallpaper_Batten() ?>" />
        <div class="infomation">
            <div class="title"><?php echo $this->category(',', false); ?></div>
            <div class="desctitle">共 <?php echo $this->getTotal(); ?> 篇</div>
        </div>
    </div>
<?php elseif ($this->is('search')) :  ?>
    <div class="joe_batten">
        <img width="100%" height="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php $this->options->JWallpaper_Batten() ?>" />
        <div class="infomation">
            <div class="title">与「<?php echo $this->keywords; ?>」相关的结果</div>
            <div class="desctitle">共 <?php echo $this->getTotal(); ?> 条</div>
        </div>
    </div>
<?php elseif ($this->is('post')) :  ?>
    <div class="joe_batten">
        <img width="100%" height="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php $this->options->JWallpaper_Batten() ?>" alt="<?php $this->title() ?>" />
        <div class="infomation">
            <div class="title"><?php $this->title() ?></div>
            <div class="desctitle">
                <span class="text"><?php $this->dateWord(); ?></span>
                <span class="line"></span>
                <span class="text" id="Joe_Article_Views"><?php _getViews($this); ?> 阅读</span>
                <?php if ($this->user->hasLogin()) : ?>
                    <span class="line"></span>
                    <span class="text">
                        <?php if ($this->user->uid == $this->authorId) : ?>
                            <?php if ($this->is('post')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid; ?>">
                                    <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                        <path d="M810.667 810.667c1.046 0 0 0.93 0 4.74v-4.74z m0 0V524.463c0-23.564 19.102-42.667 42.666-42.667 23.564 0 42.667 19.103 42.667 42.667v290.944C896 861.11 856.749 896 810.667 896H213.333C167.251 896 128 861.11 128 815.407V208.593C128 162.89 167.251 128 213.333 128h390.084c23.564 0 42.666 19.103 42.666 42.667s-19.102 42.666-42.666 42.666H213.333v597.334h597.334z m-597.334 0v4.74c0-3.81-1.046-4.74 0-4.74z m0-602.074v4.74c-1.046 0 0-0.93 0-4.74zM542.17 584.837c-16.662 16.662-43.678 16.662-60.34 0-16.662-16.663-16.662-43.678 0-60.34l341.333-341.334c16.663-16.662 43.678-16.662 60.34 0 16.663 16.663 16.663 43.678 0 60.34L542.17 584.837z" p-id="2402" fill="#f3f3f3"></path>
                                    </svg>
                                </a>
                            <?php else : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid; ?>">
                                    <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                        <path d="M810.667 810.667c1.046 0 0 0.93 0 4.74v-4.74z m0 0V524.463c0-23.564 19.102-42.667 42.666-42.667 23.564 0 42.667 19.103 42.667 42.667v290.944C896 861.11 856.749 896 810.667 896H213.333C167.251 896 128 861.11 128 815.407V208.593C128 162.89 167.251 128 213.333 128h390.084c23.564 0 42.666 19.103 42.666 42.667s-19.102 42.666-42.666 42.666H213.333v597.334h597.334z m-597.334 0v4.74c0-3.81-1.046-4.74 0-4.74z m0-602.074v4.74c-1.046 0 0-0.93 0-4.74zM542.17 584.837c-16.662 16.662-43.678 16.662-60.34 0-16.662-16.663-16.662-43.678 0-60.34l341.333-341.334c16.663-16.662 43.678-16.662 60.34 0 16.663 16.663 16.663 43.678 0 60.34L542.17 584.837z" p-id="2402" fill="#f3f3f3"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="joe_batten">
        <img width="100%" height="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php $this->options->JWallpaper_Batten() ?>" alt="<?php $this->title() ?>" />
        <div class="infomation">
            <div class="title"><?php $this->title() ?></div>
            <div class="desctitle">
            <?php echo $this->fields->description() ;?>
            </div>
        </div>
    </div>
<?php endif; ?>