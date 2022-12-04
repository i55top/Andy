<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/* Joe核心文件 */
require_once("core/core.php");

function themeConfig($form)
{
    $_db = Typecho_Db::get();
    $_prefix = $_db->getPrefix();
    try {
        if (!array_key_exists('views', $_db->fetchRow($_db->select()->from('table.contents')->page(1, 1)))) {
            $_db->query('ALTER TABLE `' . $_prefix . 'contents` ADD `views` INT DEFAULT 0;');
        }
        if (!array_key_exists('agree', $_db->fetchRow($_db->select()->from('table.contents')->page(1, 1)))) {
            $_db->query('ALTER TABLE `' . $_prefix . 'contents` ADD `agree` INT DEFAULT 0;');
        }
    } catch (Exception $e) {
    }
?>
    <link rel="stylesheet" href="<?php Helper::options()->themeUrl('typecho/config/css/joe.config.min.css?1') ?>">
    <script src="<?php Helper::options()->themeUrl('typecho/config/js/joe.config.min.js') ?>"></script>
    <div class="joe_config">
        <div>
            <div class="joe_config__aside">
                <ul class="tabs">
                    <li class="item" data-current="joe_global">全局设置</li>
                    <li class="item" data-current="joe_image">图片设置</li>
                    <li class="item" data-current="joe_aside">侧栏设置</li>
                    <li class="item" data-current="joe_other">其他设置</li>
                </ul>
                <?php require_once('core/backup.php'); ?>
            </div>
        </div>
        <div class="joe_config__notice">请求数据中...</div>
    <?php
    $JFavicon = new Typecho_Widget_Helper_Form_Element_Text(
        'JFavicon',
        NULL,
        '/ico.png',
        '网站 Favicon 设置',
        '格式：图片 URL地址 或 Base64 地址 <br />
         其他：免费转换 Favicon 网站 <a target="_blank" href="//tool.lu/favicon">tool.lu/favicon</a>'
    );
    $JFavicon->setAttribute('class', 'joe_content joe_image');
    $form->addInput($JFavicon);

    $JLogo = new Typecho_Widget_Helper_Form_Element_Text(
        'JLogo',
        NULL,
        '/logo.png',
        '网站 Logo 设置',
        '格式：图片 URL地址 或 Base64 地址 <br />
         其他：免费制作 logo 网站 <a target="_blank" href="//www.uugai.com">www.uugai.com</a>'
    );
    $JLogo->setAttribute('class', 'joe_content joe_image');
    $form->addInput($JLogo);

    $JCommentStatus = new Typecho_Widget_Helper_Form_Element_Select(
        'JCommentStatus',
        array(
            'on' => '开启（默认）',
            'off' => '关闭'
        ),
        'on',
        '开启或关闭全站评论',
        '介绍：用于一键开启关闭所有页面的评论 <br>
         注意：此处的权重优先级最高 <br>
         若关闭此项而文章内开启评论，评论依旧为关闭状态'
    );
    $JCommentStatus->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JCommentStatus->multiMode());

    $JNavStatus = new Typecho_Widget_Helper_Form_Element_Select(
        'JNavStatus',
        array(
            'on' => '开启（默认）',
            'off' => '关闭'
        ),
        'on',
        '导航分类合并',
        '介绍：用于设置导航分类合并或展开'
    );
    $JNavStatus->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JNavStatus->multiMode());

    $JNavMaxNum = new Typecho_Widget_Helper_Form_Element_Select(
        'JNavMaxNum',
        array(
            '1' => '1个',
            '2' => '2个',
            '3' => '3个',
            '4' => '4个',
            '5' => '5个',
            '6' => '6个',
            '7' => '7个（默认）',
        ),
        '7',
        '选择导航栏最大显示的个数',
        '介绍：用于设置最大多少个后，以更多下拉框显示'
    );
    $JNavMaxNum->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JNavMaxNum->multiMode());

    $JCustomNavs = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JCustomNavs',
        NULL,
        NULL,
        '导航栏自定义链接（非必填）',
        '介绍：用于自定义导航栏链接 <br />
         格式：跳转文字 || 跳转链接（中间使用两个竖杠分隔）<br />
         其他：一行一个，一行代表一个超链接 <br />
         例如：<br />
            百度一下 || https://baidu.com <br />
            腾讯视频 || https://v.qq.com
         '
    );
    $JCustomNavs->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JCustomNavs);

    $JFooter_Tabbar = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JFooter_Tabbar',
        NULL,
        NULL,
        '自定义底部导航（非必填）',
        '提示：将在底部导航上显示，请参考示例填写，一行一个，为空则不显示<br />
            格式：图标 || 名称 || 链接 （中间使用 || 分隔）<br />
            示例：<br />
            zm-home2 || 首页 || index.html <br />
            zm-pinglun3 || 碎语 || cross.html <br />
            zm-guidang || 归档 || archives.html <br />
            zm-wo || 关于 || about.html <br />
            更多图标：<a href="https://www.iconfont.cn/" target="_blank">阿里巴巴矢量图标库</a>
            '
    );
    $JFooter_Tabbar->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JFooter_Tabbar);

    $JFooter_Left = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JFooter_Left',
        NULL,
        '<a href="https://beian.miit.gov.cn/" target="_blank">粤ICP备2022139877号-1</a>',
        '自定义底部栏左侧内容（非必填）',
        '介绍：用于修改全站底部左侧内容（wap端上方）'
    );
    $JFooter_Left->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JFooter_Left);

    $JFooter_Right = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JFooter_Right',
        NULL,
        '<a href="/feed/" target="_blank" rel="noopener noreferrer">RSS</a>
         <a href="/sitemap.xml" target="_blank" rel="noopener noreferrer" style="margin-left: 15px">MAP</a>',
        '自定义底部栏右侧内容（非必填）',
        '介绍：用于修改全站底部右侧内容（wap端下方） <br>
         例如：&lt;a href="/"&gt;首页&lt;/a&gt; &lt;a href="/"&gt;关于&lt;/a&gt;'
    );
    $JFooter_Right->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JFooter_Right);

    $JCustomCSS = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JCustomCSS',
        NULL,
        NULL,
        '自定义CSS（非必填）',
        '介绍：请填写自定义CSS内容，填写时无需填写style标签。<br />
         其他：如果想修改主题色、卡片透明度等，都可以通过这个实现 <br />
         例如：body { --theme: #ff6800; --background: rgba(255,255,255,0.85) }'
    );
    $JCustomCSS->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JCustomCSS);

    $JCustomScript = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JCustomScript',
        NULL,
        NULL,
        '自定义JS（非必填）',
        '介绍：请填写自定义JS内容，例如网站统计等，填写时无需填写script标签。'
    );
    $JCustomScript->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JCustomScript);

    $JCustomHeadEnd = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JCustomHeadEnd',
        NULL,
        NULL,
        '自定义增加&lt;head&gt;&lt;/head&gt;里内容（非必填）',
        '介绍：此处用于在&lt;head&gt;&lt;/head&gt;标签里增加自定义内容 <br />
         例如：可以填写引入第三方css、js等等'
    );
    $JCustomHeadEnd->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JCustomHeadEnd);

    $JCustomBodyEnd = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JCustomBodyEnd',
        NULL,
        NULL,
        '自定义&lt;body&gt;&lt;/body&gt;末尾位置内容（非必填）',
        '介绍：此处用于填写在&lt;body&gt;&lt;/body&gt;标签末尾位置的内容 <br>
         例如：可以填写引入第三方js脚本等等'
    );
    $JCustomBodyEnd->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JCustomBodyEnd);

    $JBirthDay = new Typecho_Widget_Helper_Form_Element_Text(
        'JBirthDay',
        NULL,
        '2022/6/18 00:00:00',
        '网站成立日期（非必填）',
        '注意：填写时务必保证填写正确！例如：2021/1/1 00:00:00'
    );
    $JBirthDay->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JBirthDay);

    $JCustomFont = new Typecho_Widget_Helper_Form_Element_Text(
        'JCustomFont',
        NULL,
        NULL,
        '自定义网站字体（非必填）',
        '介绍：用于修改全站字体，填写则使用引入的字体，不填写使用默认字体 <br>
         格式：字体URL链接（推荐使用woff格式的字体，网页专用字体格式） <br>
         注意：字体文件一般有几兆，建议使用cdn链接'
    );
    $JCustomFont->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JCustomFont);

    $JCustomAvatarSource = new Typecho_Widget_Helper_Form_Element_Text(
        'JCustomAvatarSource',
        NULL,
        'https://cravatar.cn/avatar/',
        '自定义头像源（非必填）',
        '介绍：用于修改全站头像源地址 <br>
         例如：https://gravatar.ihuan.me/avatar/ <br>
         其他：非必填，默认头像源为https://gravatar.helingqi.com/wavatar/ <br>
         注意：填写时，务必保证最后有一个/字符，否则不起作用！'
    );
    $JCustomAvatarSource->setAttribute('class', 'joe_content joe_global');
    $form->addInput($JCustomAvatarSource);

    $JAside_Author_Nick = new Typecho_Widget_Helper_Form_Element_Text(
        'JAside_Author_Nick',
        NULL,
        NULL,
        '博主栏博主昵称 -WAP',
        '介绍：用于修改博主栏的博主昵称 <br />
         注意：如果不填写时则显示 *个人设置* 里的昵称'
    );
    $JAside_Author_Nick->setAttribute('class', 'joe_content joe_aside');
    $form->addInput($JAside_Author_Nick);
    /* --------------------------------------- */
    $JAside_Author_Avatar = new Typecho_Widget_Helper_Form_Element_Text(
        'JAside_Author_Avatar',
        NULL,
        NULL,
        '博主栏博主头像 - WAP',
        '介绍：用于修改博主栏的博主头像 <br />
         注意：如果不填写时则显示 *个人设置* 里的头像'
    );
    $JAside_Author_Avatar->setAttribute('class', 'joe_content joe_aside');
    $form->addInput($JAside_Author_Avatar);
    /* --------------------------------------- */
    $JAside_Wap_Image = new Typecho_Widget_Helper_Form_Element_Text(
        'JAside_Wap_Image',
        NULL,
        "https://fastly.jsdelivr.net/npm/typecho-joe-next@6.0.0/assets/img/wap_aside_image.jpg",
        '博主栏背景壁纸 - WAP',
        '介绍：用于修改WAP端博主栏的背景壁纸 <br/>
         格式：图片地址 或 Base64地址'
    );
    $JAside_Wap_Image->setAttribute('class', 'joe_content joe_aside');
    $form->addInput($JAside_Wap_Image);
    /* --------------------------------------- */
    $JAside_Author_Link = new Typecho_Widget_Helper_Form_Element_Text(
        'JAside_Author_Link',
        NULL,
        NULL,
        '博主栏昵称跳转地址 - WAP',
        '介绍：用于修改博主栏点击博主昵称后的跳转地址'
    );
    $JAside_Author_Link->setAttribute('class', 'joe_content joe_aside');
    $form->addInput($JAside_Author_Link);
    /* --------------------------------------- */
    $JAside_Author_Motto = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JAside_Author_Motto',
        NULL,
        "有钱终成眷属，没钱亲眼目睹",
        '博主栏座右铭（一言）- PC/WAP',
        '介绍：用于修改博主栏的座右铭（一言） <br />
         格式：可以填写多行也可以填写一行，填写多行时，每次随机显示其中的某一条，也可以填写API地址 <br />
         其他：API和自定义的座右铭完全可以一起写（换行填写），不会影响 <br />
         注意：API需要开启跨域权限才能调取，否则会调取失败！<br />
         推荐API：https://api.vvhan.com/api/ian'
    );
    $JAside_Author_Motto->setAttribute('class', 'joe_content joe_aside');
    $form->addInput($JAside_Author_Motto);
    /* --------------------------------------- */
    $JThumbnail = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JThumbnail',
        NULL,
        NULL,
        '自定义缩略图',
        '介绍：用于修改主题默认缩略图 <br/>
         格式：图片地址，一行一个 <br />
         注意：不填写时，则使用主题内置的默认缩略图
         '
    );
    $JThumbnail->setAttribute('class', 'joe_content joe_image');
    $form->addInput($JThumbnail);

    $JLazyload = new Typecho_Widget_Helper_Form_Element_Text(
        'JLazyload',
        NULL,
        "https://fastly.jsdelivr.net/npm/typecho-joe-next@6.0.0/assets/img/lazyload.jpg",
        '自定义懒加载图',
        '介绍：用于修改主题默认懒加载图 <br/>
         格式：图片地址'
    );
    $JLazyload->setAttribute('class', 'joe_content joe_image');
    $form->addInput($JLazyload);

    $JIndex_Top_Image = new Typecho_Widget_Helper_Form_Element_Text(
        'JIndex_Top_Image',
        NULL,
        'https://bingw.jasonzeng.dev/?resolution=1366x768&index=random',
        '首页顶部壁纸(非必填)',
        '介绍：用于修改首页顶部背景壁纸 <br />
        格式：图片地址，例如：https://fastly.jsdelivr.net/npm/typecho-joe-next@6.0.0/assets/img/aside_author_image.jpg'
    );
    $JIndex_Top_Image->setAttribute('class', 'joe_content joe_image');
    $form->addInput($JIndex_Top_Image);

    $JWallpaper_Batten = new Typecho_Widget_Helper_Form_Element_Text(
        'JWallpaper_Batten',
        NULL,
        'https://bingw.jasonzeng.dev/?resolution=1366x768&index=random',
        '自定义BATTEN背景图片（非必填）',
        '介绍：自定义BATTEN背景图片，不填写时显示懒加载图片。<br />
         格式：图片URL地址 或 随机图片api 例如：https://api.btstu.cn/sjbz/?lx=fengjing <br />
         注意：如果需要显示上方动态壁纸，请不要填写此项，此项优先级最高！'
    );
    $JWallpaper_Batten->setAttribute('class', 'joe_content joe_image');
    $form->addInput($JWallpaper_Batten);

    $JWallpaper_Background_PC = new Typecho_Widget_Helper_Form_Element_Text(
        'JWallpaper_Background_PC',
        NULL,
        NULL,
        'PC端网站背景图片（非必填）',
        '介绍：PC端网站的背景图片，不填写时显示默认的灰色。<br />
         格式：图片URL地址 或 随机图片api 例如：https://api.btstu.cn/sjbz/?lx=dongman <br />
         注意：如果需要显示上方动态壁纸，请不要填写此项，此项优先级最高！'
    );
    $JWallpaper_Background_PC->setAttribute('class', 'joe_content joe_image');
    $form->addInput($JWallpaper_Background_PC);

    $JWallpaper_Background_WAP = new Typecho_Widget_Helper_Form_Element_Text(
        'JWallpaper_Background_WAP',
        NULL,
        NULL,
        'WAP端网站背景图片（非必填）',
        '介绍：WAP端网站的背景图片，不填写时显示默认的灰色。<br />
         格式：图片URL地址 或 随机图片api 例如：https://api.btstu.cn/sjbz/?lx=m_dongman'
    );
    $JWallpaper_Background_WAP->setAttribute('class', 'joe_content joe_image');
    $form->addInput($JWallpaper_Background_WAP);

    $JSensitiveWords = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JSensitiveWords',
        NULL,
        '你妈死了 || 傻逼 || 操你妈 || 射你妈一脸',
        '评论敏感词（非必填）',
        '介绍：用于设置评论敏感词汇，如果用户评论包含这些词汇，则将会把评论置为审核状态 <br />
         例如：你妈死了 || 你妈炸了 || 我是你爹 || 你妈坟头冒烟 （多个使用 || 分隔开）'
    );
    $JSensitiveWords->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JSensitiveWords);

    $JLimitOneChinese = new Typecho_Widget_Helper_Form_Element_Select(
        'JLimitOneChinese',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启评论至少包含一个中文',
        '介绍：开启后如果评论内容未包含一个中文，则将会把评论置为审核状态 <br />
         其他：用于屏蔽国外机器人刷的全英文垃圾广告信息'
    );
    $JLimitOneChinese->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JLimitOneChinese->multiMode());

    $JTextLimit = new Typecho_Widget_Helper_Form_Element_Text(
        'JTextLimit',
        NULL,
        NULL,
        '限制用户评论最大字符',
        '介绍：如果用户评论的内容超出字符限制，则将会把评论置为审核状态 <br />
         其他：请输入数字格式，不填写则不限制'
    );
    $JTextLimit->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JTextLimit->multiMode());

    $JSiteMap = new Typecho_Widget_Helper_Form_Element_Select(
        'JSiteMap',
        array(
            'off' => '关闭',
            '100' => '显示最新 100 条链接',
            '200' => '显示最新 200 条链接',
            '300' => '显示最新 300 条链接',
            '400' => '显示最新 400 条链接',
            '500' => '显示最新 500 条链接',
            '600' => '显示最新 600 条链接',
            '700' => '显示最新 700 条链接',
            '800' => '显示最新 800 条链接',
            '900' => '显示最新 900 条链接',
            '1000' => '显示最新 1000 条链接',
        ),
        '500',
        '是否开启主题自带SiteMap功能',
        '介绍：开启后博客将享有SiteMap功能 <br />
         其他：链接为博客最新实时链接 <br />
         好处：无需手动生成，无需频繁提交，提交一次即可 <br />
         开启后SiteMap访问地址：<br />
         http(s)://域名/sitemap.xml （开启了伪静态）<br />  
         http(s)://域名/index.php/sitemap.xml （未开启伪静态）
         '
    );
    $JSiteMap->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JSiteMap->multiMode());

    /* 评论发信 */
    $JCommentMail = new Typecho_Widget_Helper_Form_Element_Select(
        'JCommentMail',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启评论邮件通知',
        '介绍：开启后评论内容将会进行邮箱通知 <br />
         注意：此项需要您完整无错的填写下方的邮箱设置！！ <br />
         其他：下方例子以QQ邮箱为例，推荐使用QQ邮箱'
    );
    $JCommentMail->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JCommentMail->multiMode());

    $JCommentMailHost = new Typecho_Widget_Helper_Form_Element_Text(
        'JCommentMailHost',
        NULL,
        NULL,
        '邮箱服务器地址',
        '例如：smtp.qq.com'
    );
    $JCommentMailHost->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JCommentMailHost->multiMode());

    $JCommentSMTPSecure = new Typecho_Widget_Helper_Form_Element_Select(
        'JCommentSMTPSecure',
        array('ssl' => 'ssl（默认）', 'tsl' => 'tsl'),
        'ssl',
        '加密方式',
        '介绍：用于选择登录鉴权加密方式'
    );
    $JCommentSMTPSecure->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JCommentSMTPSecure->multiMode());

    $JCommentMailPort = new Typecho_Widget_Helper_Form_Element_Text(
        'JCommentMailPort',
        NULL,
        NULL,
        '邮箱服务器端口号',
        '例如：465'
    );
    $JCommentMailPort->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JCommentMailPort->multiMode());

    $JCommentMailFromName = new Typecho_Widget_Helper_Form_Element_Text(
        'JCommentMailFromName',
        NULL,
        NULL,
        '发件人昵称',
        '例如：帅气的象拔蚌'
    );
    $JCommentMailFromName->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JCommentMailFromName->multiMode());

    $JCommentMailAccount = new Typecho_Widget_Helper_Form_Element_Text(
        'JCommentMailAccount',
        NULL,
        NULL,
        '发件人邮箱',
        '例如：2323333339@qq.com'
    );
    $JCommentMailAccount->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JCommentMailAccount->multiMode());

    $JCommentMailPassword = new Typecho_Widget_Helper_Form_Element_Text(
        'JCommentMailPassword',
        NULL,
        NULL,
        '邮箱授权码',
        '介绍：这里填写的是邮箱生成的授权码 <br>
         获取方式（以QQ邮箱为例）：<br>
         QQ邮箱 > 设置 > 账户 > IMAP/SMTP服务 > 开启 <br>
         其他：这个可以百度一下开启教程，有图文教程'
    );
    $JCommentMailPassword->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JCommentMailPassword->multiMode());

    $JReader_Ranking_Time = new Typecho_Widget_Helper_Form_Element_Select(
        'JReader_Ranking_Time',
        array(
            '180' => '最近180天（默认）',
            '30' => '最近30天',
            '60' => '最近60天',
            '90' => '最近90天',
            '120' => '最近120天',
            '150' => '最近150天',
            '360' => '最近360天'
        ),
        '180',
        '留言读者排行时间显示范围（默认为 180 天）'
    );
    $JReader_Ranking_Time->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JReader_Ranking_Time->multiMode());

    $JReader_Ranking_Mail = new Typecho_Widget_Helper_Form_Element_Text(
        'JReader_Ranking_Mail',
        NULL,
        NULL,
        '读者排行，排除不上榜的邮箱',
        '例如：2027821710@qq.com'
    );
    $JReader_Ranking_Mail->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JReader_Ranking_Mail->multiMode());

    $JReader_Ranking_Limit = new Typecho_Widget_Helper_Form_Element_Select(
        'JReader_Ranking_Limit',
        array(
            '30' => '最近 30 个（默认）',
            '10' => '最近 10 个',
            '20' => '最近 20 个',
            '40' => '最近 40 个',
            '50' => '最近 50 个',
            '100' => '最近 100 个',
            '200' => '最近 200 个',
            '300' => '最近 300 个',
            '400' => '最近 400 个',
            '500' => '最近 500 个'
        ),
        '30',
        '最近读者个数显示（默认为 30 个）'
    );
    $JReader_Ranking_Limit->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JReader_Ranking_Limit->multiMode());

    $JBaiduToken = new Typecho_Widget_Helper_Form_Element_Text(
        'JBaiduToken',
        NULL,
        NULL,
        '百度推送Token',
        '介绍：填写此处，前台文章页如果未收录，则会自动将当前链接推送给百度加快收录 <br />
         其他：Token在百度收录平台注册账号获取'
    );
    $JBaiduToken->setAttribute('class', 'joe_content joe_other');
    $form->addInput($JBaiduToken);
} ?>