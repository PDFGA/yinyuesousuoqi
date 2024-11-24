<?php
/**
 *
 * 音乐搜索器 - 模版文件
 *
 * @author  MaiCong <i@maicong.me>
 * @link    https://github.com/maicong/music
 * @since   1.5.10
 *
 */

if (!defined('MC_CORE')) {
    header("Location: /");
    exit();
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>音乐搜索器 - 多站合一音乐搜索,音乐在线试听 - By 麦葱</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="author" content="maicong.me">
    <meta name="keywords" content="音乐搜索,音乐搜索器,音乐试听,音乐在线听,网易云音乐,QQ音乐,酷狗音乐,酷我音乐,虾米音乐,百度音乐,一听音乐,咪咕音乐,荔枝FM,蜻蜓FM,喜马拉雅FM,全民K歌,5sing原创翻唱音乐">
    <meta name="description" content="麦葱特制多站合一音乐搜索解决方案，可搜索试听网易云音乐、QQ音乐、酷狗音乐、酷我音乐、虾米音乐、百度音乐、一听音乐、咪咕音乐、荔枝FM、蜻蜓FM、喜马拉雅FM、全民K歌、5sing原创翻唱音乐。">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="音乐搜索器">
    <meta name="application-name" content="音乐搜索器">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="static/img/apple-touch-icon.png">
    <link rel="canonical" href="http://music.2333.me/">
    <link rel="stylesheet" href="//cdn.staticfile.org/amazeui/2.3.0/css/amazeui.min.css">
    <link rel="stylesheet" href="static/css/style.css?v<?php echo MC_VERSION; ?>">
    <link rel="stylesheet" href="static/css/modern-style.css?v<?php echo MC_VERSION; ?>">
    <link rel="stylesheet" href="static/css/modern-style.css?v<?php echo MC_VERSION; ?>">
</head>
<body>
    <!--[if lte IE 9]>
        <script type="text/javascript">
            (function(){
                var t = '你的浏览器也太挫了吧！大佬换一个噻！';
                document.body.innerHTML = t;
                document.body.style.fontSize = '66px';
                document.body.style.textAlign = 'center';
                document.body.style.background = '#000';
                document.body.style.color = '#fff';
                if (prompt('输入代号 666666 销毁此电脑: ', '') === '666666') {
                    alert('拜拜了您呢~')
                } else {
                    alert('总感觉哪里不对');
                }
                window.open('', '_self', '');
                window.close();
            })();
        </script>
    <![endif]-->
    <section class="am-g about">
        <div class="am-container am-margin-vertical-xl">
            <header class="am-padding-vertical-xl">
                <h2 class="about-title am-text-center">音乐搜索器</h2>
                <p class="am-text-center am-text-xl">寻找你喜爱的音乐</p>
            </header>
            <hr>
            <div class="am-u-lg-12 am-u-sm-centered main-container">
                <form id="j-validator" class="am-form am-margin-bottom-lg" method="post">
                    <div class="am-u-md-12 am-u-sm-centered">
                        <ul id="j-nav" class="am-nav am-nav-pills am-nav-justify am-margin-bottom music-tabs">
                            <li class="am-active" data-filter="name">
                                <a>音乐名称</a>
                            </li>
                            <li data-filter="id">
                                <a>音乐 ID</a>
                            </li>
                            <li data-filter="url">
                                <a>音乐地址</a>
                            </li>
                        </ul>
                        <div class="am-form-group">
                            <input id="j-input" data-filter="name" class="am-form-field am-input-lg am-text-center am-radius" placeholder="例如: 不要说话 陈奕迅" data-am-loading="{loadingText: ' '}" pattern="^.+$" required>
                            <div class="am-alert am-alert-danger am-animation-shake"></div>
                        </div>
                        <div class="am-form-group am-text-center">
                            <button id="j-submit" type="submit" class="am-btn am-btn-primary am-btn-lg am-btn-block am-radius">搜一下</button>
                        </div>
                        <div class="am-text-center am-margin-vertical-sm">
                            <span class="am-text-secondary">支持平台：</span>
                        </div>
                        <div id="j-type" class="am-form-group am-text-center music-type">
                        <?php foreach ($music_type_list as $key => $val) { ?>
                            <label class="am-radio-inline">
                                <input type="radio" name="music_type" value="<?php echo $key; ?>"<?php if ($key === 'netease') echo ' checked'; ?>>
                                <span class="radio-label"><?php echo $val; ?></span>
                            </label>
                            <?php if ($key === 'migu') echo '<br />'; ?>
                        <?php } ?>
                        </div>
                        <div class="music-tips">
                            <h4>帮助：</h4>
                            <p><b>标红</b> 为 <strong>音乐 ID</strong>，<u>下划线</u> 表示 <strong>音乐地址</strong></p>
                            <blockquote id="j-quote" class="music-overflow">
                                <p><span>网易：</span><u>http://music.163.com/#/song?id=<b>25906124</b></u></p>
                                <p><span>QQ音乐：</span><u>http://y.qq.com/n/yqq/song/<b>002B2EAA3brD5b</b>.html</u></p>
                                <p><span>酷狗：</span><u>http://www.kugou.com/song/#hash=<b>08228af3cb404e8a4e7e9871bf543ff6</b></u></p>
                                <p><span>酷我：</span><u>http://www.kuwo.cn/yinyue/<b>382425</b>/</u></p>
                            </blockquote>
                        </div>
                    </div>
                </form>
                <form id="j-main" class="am-form am-u-md-12 am-u-sm-centered music-main">
                    <a type="button" id="j-back" class="am-btn am-btn-success am-btn-lg am-btn-block am-radius am-margin-bottom-lg">找到咯～返回继续搜 <i class="am-icon-reply am-icon-fw"></i></a>
                    <div class="music-info-card">
                        <div class="info-item">
                            <label>音乐ID：</label>
                            <input type="text" id="j-songid" class="am-form-field" readonly>
                        </div>
                        <div class="info-item">
                            <label>歌曲名称：</label>
                            <input type="text" id="j-name" class="am-form-field" readonly>
                        </div>
                        <div class="info-item">
                            <label>歌手：</label>
                            <input type="text" id="j-author" class="am-form-field" readonly>
                        </div>
                        <div class="info-item">
                            <label>音乐链接：</label>
                            <div class="input-group">
                                <input type="text" id="j-link" class="am-form-field" readonly>
                                <a id="j-link-btn" class="copy-btn" target="_blank" title="在新窗口打开">
                                    <i class="am-icon-external-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-item">
                            <label>下载链接：</label>
                            <div class="input-group">
                                <input type="text" id="j-src" class="am-form-field" readonly>
                                <a id="j-src-btn" class="copy-btn" target="_blank" title="下载音乐">
                                    <i id="j-src-btn-icon" class="am-icon-external-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-item">
                            <label>歌词下载：</label>
                            <div class="input-group">
                                <input type="text" id="j-lrc" class="am-form-field" readonly>
                                <a id="j-lrc-btn" class="copy-btn" target="_blank" title="下载歌词">
                                    <i id="j-lrc-btn-icon" class="am-icon-external-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="j-show" class="am-margin-vertical music-show">
                        <div id="j-player" class="aplayer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer-content">
            <p class="am-text-sm">
                <span class="version">v<?php echo MC_VERSION; ?></span>
                <span class="copyright">&copy; <?php echo date('Y'); ?></span>
                <a href="https://github.com/maicong/music" target="_blank" rel="author">源码下载</a>
                <a href="https://maicong.me/msg" target="_blank">意见反馈</a>
                <a href="javascript:void(0)" data-am-modal="{target: '#copr-info'}">免责声明</a>
            </p>
        </div>
    </footer>
    <div class="am-popup" id="copr-info">
        <div class="am-popup-inner">
            <div class="am-popup-hd">
                <h4 class="am-popup-title">免责声明</h4>
                <span data-am-modal-close class="am-close">&times;</span>
            </div>
            <div class="am-popup-bd">
                <p>本站音频文件来自各网站接口，本站不会修改任何音频文件</p>
                <p>音频版权来自各网站，本站只提供数据查询服务，不提供任何音频存储和贩卖服务</p>
                <p>如有侵权或联系赞助添加微信：</p>
                <div class="am-text-center">
                    <img src="/static/img/IMG_4525.JPG" alt="微信二维码" style="max-width: 200px;">
                </div>
            </div>
        </div>
    </div>
    <div class="am-popup" id="j-verify">
        <div class="am-popup-inner">
            <div class="am-popup-hd">
                <h4 class="am-popup-title">找到咯～返回继续搜</h4>
                <span data-am-modal-close class="am-close">&times;</span>
            </div>
        </div>
    </div>
    <script src="//cdn.staticfile.org/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.staticfile.org/amazeui/2.3.0/js/amazeui.min.js"></script>
    <script src="//cdn.staticfile.org/aplayer/1.6.0/APlayer.min.js"></script>
    <script src="//cdn.staticfile.org/Base64/1.0.1/base64.min.js"></script>
    <script src="static/js/music.js?v<?php echo MC_VERSION; ?>"></script>
    <script>
        $(function() {
            var helpCard = $('#help-card');
            var helpToggle = $('#help-toggle');
            var helpVisible = false;

            helpToggle.on('click', function() {
                helpVisible = !helpVisible;
                if (helpVisible) {
                    helpCard.addClass('active');
                    helpToggle.html('<i class="am-icon-times"></i> 关闭帮助信息');
                } else {
                    helpCard.removeClass('active');
                    helpToggle.html('<i class="am-icon-question-circle"></i> 查看帮助信息');
                }
            });

            // 点击卡片外部时关闭帮助
            $(document).on('click', function(e) {
                if (helpVisible && !$(e.target).closest('#help-card, #help-toggle').length) {
                    helpVisible = false;
                    helpCard.removeClass('active');
                    helpToggle.html('<i class="am-icon-question-circle"></i> 查看帮助信息');
                }
            });
        });
    </script>
</body>
</html>
