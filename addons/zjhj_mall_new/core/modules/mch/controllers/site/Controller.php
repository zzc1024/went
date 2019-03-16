<?php
/**
 * Created by PhpStorm.
 * User: peize
 * Date: 2017/11/22
 * Time: 14:55
 */

namespace app\modules\mch\controllers\site;


class Controller extends \app\modules\mch\controllers\Controller
{
//    public function render($view, $params = [])
//    {
//        $params['is_group'] = 1;
//        return parent::render($view, $params); // TODO: Change the autogenerated stub
//    }

    protected function getW()
    {
        $_W['ishttps'] = $_SERVER['SERVER_PORT'] == 443 || (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off') ||
            strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) == 'https' ||
            strtolower($_SERVER['HTTP_X_CLIENT_SCHEME']) == 'https' ? true : false;

        $_W['sitescheme'] = $_W['ishttps'] ? 'https://' : 'http://';
        $_W['siteroot'] = htmlspecialchars($_W['sitescheme'] . $_SERVER['HTTP_HOST']);
        $urls = parse_url($_W['siteroot']);
        $urls['path'] = str_replace(array('/web', '/app', '/payment/wechat', '/payment/alipay', '/payment/jueqiymf', '/api'), '', $urls['path']);
        $_W['siteroot'] = $urls['scheme'] . '://' . $urls['host'] . ((!empty($urls['port']) && $urls['port'] != '80') ? ':' . $urls['port'] : '') . $urls['path'];
        $_W['siteurl'] = $urls['scheme'] . '://' . $urls['host'] . ((!empty($urls['port']) && $urls['port'] != '80') ? ':' . $urls['port'] : '') . $_W['script_name'] . '?' . http_build_query($_GET, '', '&');

        $_W['config']['cookie']['pre'] = 'c0a5_';
        $_W['attachurl'] = $_W['sitescheme'] . $_SERVER['HTTP_HOST'] . '/attachment/';
        $_W['attachurl_local'] = $_W['sitescheme'] . $_SERVER['HTTP_HOST'] . '/attachment/';
        $_W['attachurl_remote'] = '';

        $_W['uniacid'] = $this->store->acid;
        $_W['acid'] = $this->store->acid;
        $_W['uid'] = $admin->id;

        return $_W;
    }

    public function error($status,$msg,$data='') {
		return array(
            'status'=>$status,
            'res'=>$msg,
            'obj'=>$data
        );
    }
    
    public function success($msg, $data){
        return array(
            'status'=>200,
            'res'=>$msg,
            'obj'=>$data
        );
    }
}