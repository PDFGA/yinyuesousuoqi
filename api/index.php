<?php
define('MC_CORE', true);

date_default_timezone_set('Asia/Shanghai');
header('Content-type: text/html; charset=UTF-8');

require_once __DIR__ . '/../include/Meting.php';
require_once __DIR__ . '/../include/function.php';
require_once __DIR__ . '/../config.php';

if ($_POST['type'] === 'url' && !empty($_POST['music'])) {
    $music_url = $_POST['music'];
    preg_match('/music\.163\.com\/#[\/]?song\?id=(\d+)/i', $music_url, $match_163);
    preg_match('/y\.qq\.com[\/]?[\w]+[\/]?[\w]+[\/]?(\w+)\.html/i', $music_url, $match_qq);
    preg_match('/www\.kugou\.com[\/]?[\w]+[\/]?[\w]+[\/]?([\w]+).html/i', $music_url, $match_kugou);
    preg_match('/www\.kuwo\.cn[\/]?[\w]+[\/]?(\d+)/i', $music_url, $match_kuwo);
    preg_match('/(www|m)\.xiami\.com[\/]?[\w]+[\/]?[\w]+[\/]?(\d+)/i', $music_url, $match_xiami);
    preg_match('/music\.migu\.cn[\/]?[\w]+[\/]?[\w]+[\/]?([\w]+)/i', $music_url, $match_migu);

    if (!empty($match_163[1])) {
        header('location:?id=' . $match_163[1] . '&type=netease');
    } elseif (!empty($match_qq[1])) {
        header('location:?id=' . $match_qq[1] . '&type=qq');
    } elseif (!empty($match_kugou[1])) {
        header('location:?id=' . $match_kugou[1] . '&type=kugou');
    } elseif (!empty($match_kuwo[1])) {
        header('location:?id=' . $match_kuwo[1] . '&type=kuwo');
    } elseif (!empty($match_xiami[2])) {
        header('location:?id=' . $match_xiami[2] . '&type=xiami');
    } elseif (!empty($match_migu[1])) {
        header('location:?id=' . $match_migu[1] . '&type=migu');
    } else {
        include __DIR__ . '/../template/index.php';
        exit;
    }
}

if ($_GET['type'] && $_GET['id']) {
    $api = new Meting($_GET['type']);
    $data = $api->format(true)->song($_GET['id']);
    if ($data) {
        $data = json_decode($data, true);
        include __DIR__ . '/../template/player.php';
    } else {
        include __DIR__ . '/../template/index.php';
    }
    exit;
}

include __DIR__ . '/../template/index.php';
