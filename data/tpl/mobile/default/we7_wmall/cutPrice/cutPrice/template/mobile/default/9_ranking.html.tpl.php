<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <title><?php  echo $wkj['title'];?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo MON_WKJ_RES;?>css/admin.css?ver=1">
    <script type="text/javascript">var _speedMark = new Date(), _loadTime = '';</script>
</head>
<body class="paihangbang">
<div style="display:none"><img src="<?php echo MON_WKJ_RES;?>images/TB2iVEjcXXXXXXjXpXXXXXXXXXX-23432926.jpg"/></div>
<style type="text/css">
    body {
        padding-bottom: 80px;
    }
    .bottombtn {
        text-shadow: 1px 1px 0 rgba(150,33,139,.3),1px 1px 5px rgba(150,33,139,.5);
        color: #f7f7f7;
        font-weight: bold;
        display: block;
        text-align: center;
        padding: 13px 0;
        font-size: 20px;
        background-color: #D23B3E;
        border-radius: 6px;
    }
    h3 a {
        color: #FFF
    }
</style>
<div id="loading" class="loading"><img class="img-responsive" src="<?php echo MON_WKJ_RES;?>images/TB2qfh4aFXXXXatXpXXXXXXXXXX-23432926.png" alt="图片"/></div>
<div class="gerenhuodong gyStyle2">
    <div class="daijishi" id="daijishi"> 活动倒计时：<span style="margin-left:0;"></span>天<span></span>时<span></span>分<span></span>秒</div>
    <span id="wo" style="display:none">我</span>
    <h3><a href="<?php  echo $indexUrl;?>">活动首页</a></h3>
    <h3>砍价排行榜</h3>
    <?php  if($is_my==1) { ?><p class="shomingk">亲爱的<span><?php  echo $_W["member"]['nickname'];?></span>：<br/>已有<span><?php  echo $ftotal;?></span>位朋友帮忙砍价！<?php  echo $rank_tip;?></p><?php  } ?>
    <div class="kanjialist">
        <div class="listMain">
            <div class="topbiaoti clearfix">
                <a href="javascript:;">亲友团</a>
                <a class="kandiaojine1" href="javascript:;">砍掉金额</a>
                <a href="javascript:;">砍后价格</a>
            </div>
            <div class="bordery">
                <div class="listx">
                    <ul class="ul1">
                        <?php  if(is_array($firends)) { foreach($firends as $firend) { ?>
                            <li class="clearfix">
                                <div class="lefttext">
                                    <img data-src="<?php  echo $firend['headimgurl'];?>" alt="图片"/>
                                    <span><?php  echo $firend['nickname'];?></span>
                                </div>
                                <div class="kanhoujia"><span>￥<?php  echo $firend['k_price'];?></span></div>
                                <div class="szimgSize">
                                    <img src="<?php echo MON_WKJ_RES;?>images/jinbitp1.png" alt="图片"/>
                                    <span><?php  echo $firend['kh_price'];?></span>
                                </div>
                            </li>
                        <?php  } } ?>
                    </ul>
                </div>
                <div class="zhanji clearfix">
                    <div class="lefttext">砍价战绩</div>
                    <div class="kanhoujia">￥<?php  echo $wkj['y_price'];?></div>
                    <div class="zongjia">￥<span><?php  echo $user['price'];?></span></div>
                </div>
            </div>
            <img class="wenluk" src="<?php echo MON_WKJ_RES;?>images/wenlu.png" alt="图片"/>
        </div>
    </div>
    <div class="shangpink">
        <p class="spbiaoti"><strong>商品详情<span>（剩余<?php  echo $leftCount;?>件）</span></strong></p>
        <ul class="wupinList" style="color:rgb(140, 109, 109)">
            <li class="clearfix shwoWP">
                <div class="leftk"><img src="/attachment/<?php  echo $wkj['thumb'];?>" alt="图片"/></div>
                <div class="rightk">
                    <p><?php  echo $wkj['name'];?></p>
                    <p><?php  echo $wkj['introduction'];?></p>
                </div>
            </li>
        </ul>
        <div class="goumaian">
            <?php  if($is_my==1) { ?>
                <div class="daanniou clearfix">
                    <a class="jiagek" href="javascript:;">
                        <span class="yuanjia">原价：<em>￥<?php  echo $wkj['y_price'];?></em></span>
                        <span class="xianjia">现价：<strong>￥<em><?php  echo $user['price'];?></em></strong></span>
                    </a>
                    <?php  if($status==3 || $status==4) { ?>
                        <a class="zhanhuok" href="<?php  echo imurl('wmall/order/index/detail', array('id' => $orderInfo['id']));?>" id="dd">
                            <img src="<?php echo MON_WKJ_RES;?>images/gouwuche.png" alt="图片"/>
                            <span>我的订单</span>
                        </a>
                    <?php  } else { ?>
                        <?php  if($leftCount > 0) { ?>
                            <form action="<?php  echo imurl('wmall/order/create/goods', array('sid' => $sid));?>" method="post" id="goods-form">
                                <input type="hidden" name="goods" value="<?php  echo $goodsInfo;?>"/>
                            </form>
                           <a class="zhanhuok" href="javascript:;" id="goumai">
                               <img src="<?php echo MON_WKJ_RES;?>images/gouwuche.png" alt="图片"/><span>立即购买</span>
                           </a>
                        <?php  } else { ?>
                            <a class="zhanhuok" href="javascript:void(0);">
                                <span>已售完</span>
                            </a>
                        <?php  } ?>
                    <?php  } ?>
                </div>
            <?php  } ?>

            <?php  if($is_my==2 && (!$firendJoined)) { ?>
                 <div class="daanniou clearfix">
                     <?php  if($status!=2) { ?>
                         <a class="bottombtn" href="<?php  echo $indexUrl;?>" ><span>我要参与</span> </a>
                     <?php  } ?>
                     <?php  if($status==2) { ?>
                             <a class="bottombtn" href="javascript:void(0);" ><span>活动已结束</span> </a>
                     <?php  } ?>
                </div>
            <?php  } ?>

            <?php  if($is_my==2 && ($firendJoined)) { ?>
                 <div class="daanniou clearfix">
                        <a class="bottombtn" href="<?php  echo $indexUrl;?>" ><span>我的活动</span> </a>
                  </div>
            <?php  } ?>
        </div>
    </div>

    <div id="tanchuk" class="tanchuk">
        <div class="tanchukMain"><p>朋友，你这一刀已经砍到底了，商品数量有限，快让你朋友斩获吧！</p>
            <div class="anniouk clearfix"><a class="baisea quxiaok" href="javescript:;">取消</a>
                <a class="hongsea" href="javascript:;" id="passgoumai">确认</a>
            </div>
        </div>
    </div>
</div>


<!--<div class="contact" style="padding-bottom:10px;text-align:center">-->

    <!--活动热线：<a href="tel:<?php  echo $wkj['name'];?>" style="color:blue;font-size:16px"><?php  echo $wkj['name'];?></a>-->
    <!---->
<!--</div>-->

<!--<div class="xinyuemin" id="cprt"><a href="#" target="_blank"></a></div>-->
<div id="zhegaik" class="zhegaik"></div>




<div class="jizanimg">
    <div class="jiantou"></div>
    <p>分享到朋友圈就有机会获赠能量。</p></div>
<div class="fenxiangImgk"><img class="img-responsive"
                               src="<?php echo MON_WKJ_RES;?>images/TB20KOcbFXXXXXmXXXXXXXXXXXX-23432926.png"
                               alt="图片"/></div>
<script type="text/javascript">



var ajaxUrl="ajaxurl";

var orderUrl="orderurl";




var hid=1;
/*活动表 活动id*/
var kid = <?php  echo $wkj['id'];?>;
/*商品表 商品ID*/
var gid = "1";
/*活动参与记录表 参与 ID */
var jid = "492";
/* 是否 参与 过此次活动 true false */
var join = "1";
/* 是否 为 这个活动 砍过价 true false */
var bargain = "1";
/* 活动状态  已购买 已结束  */
var joinstatus = "<?php  echo $statusText;?>";


/* 活动结束时间 */
var joinendtime = "1432355143";

//1432355143 1429241661
var endTimeJieshu = <?php  echo $wkj['end_time'];?>;

var startTimeKaishi = <?php  echo time();?>;


/*结束时间 年*/
var year = <?php  echo $year;?>;
/*结束时间 月*/
var yue = <?php  echo $month;?>;
/*结束时间 日*/
var date = <?php  echo $day;?>;
/*结束时间 时*/
var shi = <?php  echo $hours;?>;
/*结束时间 分*/
var fen = <?php  echo $minutes;?>;

var kj_status = "";

</script>

<script src="<?php echo MON_WKJ_RES;?>js/jquery-1.11.2.min.js" type="text/javascript"
        charset="utf-8"></script>
<script src="<?php echo MON_WKJ_RES;?>js/kj.js?ver=1" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo MON_WKJ_RES;?>js/image-lazyload-min.js"></script>
<?php  echo register_jssdk(false);?>
<script type="text/javascript">
    // initShare();
    //
    // function initShare(){
    //     wx.ready(function () {
    //         sharedata = {
    //             title: "分享标题",
    //             desc: "分享内容",
    //             link: "",
    //             imgUrl: "图片路径",
    //             success: function(){
    //
    //             },
    //             cancel: function(){
    //                 // alert("分享失败，可能是网络问题，一会儿再试试？");
    //             }
    //         };
    //         wx.onMenuShareAppMessage(sharedata);
    //         wx.onMenuShareTimeline(sharedata);
    //     });
    // }

</script>
</body>
</html>