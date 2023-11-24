<?php
echo '<!doctype html>', "\n";
 //  #base
   $data = new ArrayObject(array(), ArrayObject::ARRAY_AS_PROPS);
   $data->pathStatic = '/demo/v1/static/baixing';
   $data->pathCSS = $data->pathStatic . '/css/dist';
   $data->pathJS = $data->pathStatic . '/js/dist';
   $data->pageId = '';
   $data->pageTitle = '';
   $data->metaKeywords = 'CMUI, UI, Framework, CSS, Mobile, Web';
   $data->metaDescription = 'CMUI - Lightweight UI solution for mobile web. CMUI 是一个专攻移动网页的 UI 框架，它提供了丰富的组件和简洁的接口，开箱即用。CMUI 帮助开发者摆脱样式细节和兼容性困扰，从而腾出更多精力投入到业务开发中。';
 //  #base
   $data->pageId = 'page';
   $data->pageTitle = 'Page';

 echo '<html'
   , ' lang="zh-cmn-Hans"'
  , '>'
   , '<head'
    , '>'
     , '<meta'
       , ' charset="utf-8"'
      , '>'
     , '<title'
      , '>';
       //  #title
         if ($data->pageTitle) {
           echo htmlspecialchars($data->pageTitle, 0x88)
           , ' - ';
         }
         echo 'CMUI Demo'
     , '</title>';
    
     //  #head-meta
       echo '<meta'
         , ' name="viewport"'
         , ' content="initial-scale=1, user-scalable=no"'
        , '>';
     //  #head-seo
       if ($data->metaKeywords) {
         echo '<meta'
           , ' name="keywords"'
           , ' content="'
           , htmlspecialchars(($data->metaKeywords), 0x88)
           , '"'
          , '>';
       }
       if ($data->metaDescription) {
         echo '<meta'
           , ' name="description"'
           , ' content="'
           , htmlspecialchars(($data->metaDescription), 0x88)
           , '"'
          , '>';
       }
    
     //  #stylesheets
       echo '<link'
         , ' rel="stylesheet"'
         , ' href="'
         , htmlspecialchars(($data->pathCSS) . ('/demo.css'), 0x88)
         , '"'
        , '>';
     //  #head-scripts
   echo '</head>';
  
   echo '<body'
     , ' id="'
     , htmlspecialchars(($data->pageId), 0x88)
     , '"'
    , '>';
     //  #content
       echo '<div class="cmSubview cmSubviewRoot"'
        , '>';
         //  #header
           echo '<header'
            , '>'
             , '<h1'
              , '>';
               //  #heading
                 if ($data->pageTitle) {
                   echo htmlspecialchars($data->pageTitle, 0x88);
                 }
                 else {
                   echo 'CMUI Demo';
                 }
             echo '</h1>'
           , '</header>';
         //  #main
           echo '<article class="cmSubview"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('概述'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , '<strong'
                  , '>'
                   , htmlspecialchars(('本页面的 HTML 结构是为演示效果而特别编写的，不具有实际参考意义。所有元素的 HTML 结构约定请以各元素的相关描述为准。'), 0x88)
                 , '</strong>'
               , '</p>'
             , '</div>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('一个 HTML 页面可能包含多个功能页面（包括主页面及其子页面，比如 L2V）。每个功能页面都应该被放置在单独的 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('body > article.cmSubview'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 元素中。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('因此整个 HTML 文档的结构应该是这样的（以 L2V 为例）：'), 0x88)
               , '</p>'
               , '<pre'
                , '>'
                 , '<code'
                  , '>'
                   , 'html', "\n"
                   , '    head', "\n"
                   , '    body', "\n"
                   , '        article.cmSubview#listing-view  //主页面', "\n"
                   , '        article.cmSubview#vad-view      //子页面', "\n"
                   , '        article.cmSubview#other-view    //子页面', "\n"
                 , '</code>'
               , '</pre>'
             , '</div>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('每个页面内的主要结构应该是这样的：'), 0x88)
               , '</p>'
               , '<pre'
                , '>'
                 , '<code'
                  , '>'
                   , 'article.cmSubview  //页面级容器', "\n"
                   , '    header  //页头', "\n"
                   , '    main    //页面主体', "\n"
                   , '    footer  //页脚', "\n"
                 , '</code>'
               , '</pre>'
             , '</div>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('页面内的各个区块详见如下各小节。'), 0x88)
               , '</p>'
             , '</div>'
           , '</article>';
          
           echo '<article class="cmSubview header"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('页头'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('页头可以包含一个或多个导航元素。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('通常页头内唯一的导航元素就是导航栏（导航栏的具体结构和样式参见下一节）。'), 0x88)
               , '</p>'
               , '<pre'
                , '>'
                 , '<code'
                  , '>'
                   , 'header  //页头区域', "\n"
                   , '    nav.cmNavBar  //导航栏', "\n"
                 , '</code>'
               , '</pre>'
             , '</div>'
             , '<header'
              , '>'
               , '<nav class="cmNavBar"'
                , '>'
                 , '<h1'
                  , '>'
                   , htmlspecialchars(('（这里是导航栏）'), 0x88)
                 , '</h1>'
                 , '<div class="cmBtnWrapper cmNavBarLeft"'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('导航栏按钮'), 0x88)
                   , '</a>'
                 , '</div>'
                 , '<div class="cmBtnWrapper cmNavBarRight"'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('导航栏按钮'), 0x88)
                   , '</a>'
                 , '</div>'
               , '</nav>'
             , '</header>';
            
             echo '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('除了导航栏之外，你还可以在页头中添加其它导航元素。'), 0x88)
               , '</p>'
               , '<pre'
                , '>'
                 , '<code'
                  , '>'
                   , 'header  //页头区域', "\n"
                   , '    nav.cmNavBar  //导航栏', "\n"
                   , '    nav           //其它导航元素', "\n"
                 , '</code>'
               , '</pre>'
             , '</div>'
             , '<header'
              , '>'
               , '<nav class="cmNavBar"'
                , '>'
                 , '<h1'
                  , '>'
                   , htmlspecialchars(('（这里是导航栏）'), 0x88)
                 , '</h1>'
                 , '<div class="cmBtnWrapper cmNavBarLeft"'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('导航栏按钮'), 0x88)
                   , '</a>'
                 , '</div>'
                 , '<div class="cmBtnWrapper cmNavBarRight"'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('导航栏按钮'), 0x88)
                   , '</a>'
                 , '</div>'
               , '</nav>'
               , '<nav'
                , '>'
                 , htmlspecialchars(('（这里是另一个导航元素）'), 0x88)
               , '</nav>'
             , '</header>'
           , '</article>';
          
           echo '<article class="cmSubview nav-bar"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('导航栏'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('导航栏内部的结构约定如下：'), 0x88)
               , '</p>'
               , '<pre'
                , '>'
                 , '<code'
                  , '>'
                   , 'nav.cmNavBar  //导航栏', "\n"
                   , '    h1                              //导航栏标题', "\n"
                   , '    div.cmBtnWrapper.cmNavBarLeft   //左按钮容器', "\n"
                   , '        a.cmBtn.cmBtnBack           //后退按钮', "\n"
                   , '    div.cmBtnWrapper.cmNavBarRight  //右按钮容器', "\n"
                   , '        a.cmBtn                     //动作按钮', "\n"
                 , '</code>'
               , '</pre>'
             , '</div>'
             , '<header'
              , '>'
               , '<nav class="cmNavBar"'
                , '>'
                 , '<h1'
                  , '>'
                   , htmlspecialchars(('页面标题'), 0x88)
                 , '</h1>'
                 , '<div class="cmBtnWrapper cmNavBarLeft"'
                  , '>'
                   , '<a class="cmBtn cmBtnBack"'
                     , ' href="'
                     , htmlspecialchars(('#back'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('返回按钮'), 0x88)
                   , '</a>'
                 , '</div>'
                 , '<div class="cmBtnWrapper cmNavBarRight"'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('动作按钮'), 0x88)
                   , '</a>'
                 , '</div>'
               , '</nav>'
             , '</header>';
            
             echo '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('导航栏按钮可选以下样式：'), 0x88)
               , '</p>'
               , '<ul class="cmText"'
                , '>'
                 , '<li'
                  , '>'
                   , '<code'
                    , '>'
                     , '.cmBtnInfo'
                   , '</code>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<code'
                    , '>'
                     , '.cmBtnSuccess'
                   , '</code>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<code'
                    , '>'
                     , '.cmBtnDanger'
                   , '</code>'
                 , '</li>'
               , '</ul>'
             , '</div>'
             , '<header'
              , '>'
               , '<nav class="cmNavBar"'
                , '>'
                 , '<h1'
                  , '>'
                   , htmlspecialchars(('页面标题'), 0x88)
                 , '</h1>'
                 , '<div class="cmBtnWrapper cmNavBarLeft"'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('Default'), 0x88)
                   , '</a>'
                 , '</div>'
                 , '<div class="cmBtnWrapper cmNavBarRight"'
                  , '>'
                   , '<a class="cmBtn cmBtnInfo"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('Info'), 0x88)
                   , '</a>'
                 , '</div>'
               , '</nav>'
             , '</header>';
            
             echo '<header'
              , '>'
               , '<nav class="cmNavBar"'
                , '>'
                 , '<h1'
                  , '>'
                   , htmlspecialchars(('页面标题'), 0x88)
                 , '</h1>'
                 , '<div class="cmBtnWrapper cmNavBarLeft"'
                  , '>'
                   , '<a class="cmBtn cmBtnSuccess"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('Success'), 0x88)
                   , '</a>'
                 , '</div>'
                 , '<div class="cmBtnWrapper cmNavBarRight"'
                  , '>'
                   , '<a class="cmBtn cmBtnDanger"'
                     , ' href="'
                     , htmlspecialchars(('#action'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('Danger'), 0x88)
                   , '</a>'
                 , '</div>'
               , '</nav>'
             , '</header>'
           , '</article>';
          
           echo '<article class="cmSubview main"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('页面主体'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('在下面的图示中，外层的红色虚线框是 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<main>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 元素占据的范围，内层的绿色虚线框是 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<main>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 的内容区的范围。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('可以看出，由于 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<main>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 元素存在水平内边距，默认情况其内部的块级元素左右两侧距离页面边缘存在一定的空隙（见 Block 1）。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('如果需要生成一个通长的元素（见 Block 2），可以使用 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('full-width-block()'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 这个 mixin。'), 0x88)
               , '</p>'
             , '</div>'
             , '<main'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('页面主体'), 0x88)
               , '</h2>'
               , '<div class="content-range"'
                , '>'
                 , '<h3'
                  , '>'
                   , htmlspecialchars(('内容区'), 0x88)
                 , '</h3>'
                 , '<div class="block"'
                  , '>'
                   , htmlspecialchars(('Block 1'), 0x88)
                 , '</div>'
                 , '<div class="block full-width"'
                  , '>'
                   , htmlspecialchars(('Block 2'), 0x88)
                   , '<p'
                    , '>'
                     , '<code'
                      , '>'
                       , htmlspecialchars(('full-width-block()'), 0x88)
                     , '</code>'
                   , '</p>'
                 , '</div>'
               , '</div>'
             , '</main>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<main>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 元素与页头页脚之间没有设置任何垂直边距。如果页面主体内容需要与页头页尾保持距离，可以通过设置内容元素（如 Block 1、Block 2）的垂直 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('margin'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 来实现。'), 0x88)
               , '</p>'
             , '</div>'
           , '</article>';
          
           echo '<article class="cmSubview footer"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('页脚'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('未对页脚进行任何样式定义，请自定处理。'), 0x88)
               , '</p>'
             , '</div>'
           , '</article>';
        
         //  #back
           if ($data->pageTitle) {
             echo '<article class="back"'
              , '>'
               , '<a'
                 , ' href="'
                 , htmlspecialchars(('index.php'), 0x88)
                 , '"'
                , '>'
                 , htmlspecialchars(('<< 返回首页'), 0x88)
               , '</a>'
             , '</article>';
           }
         //  #footer
           echo '<footer'
            , '>'
            , '&copy; CMUI.NET'
           , '</footer>'
       , '</div>';
    
     //  #subviews
     //  #widgets
    
     //  #defer-scripts
       echo '<script'
         , ' src="'
         , htmlspecialchars(($data->pathJS) . ('/lib.js'), 0x88)
         , '"'
        , '>'
       , '</script>'
       , '<script'
         , ' src="'
         , htmlspecialchars(($data->pathJS) . ('/cmui.js'), 0x88)
         , '"'
        , '>'
       , '</script>'
       , '<script'
         , ' src="'
         , htmlspecialchars(($data->pathJS) . ('/demo.js'), 0x88)
         , '"'
        , '>'
       , '</script>'
   , '</body>'
 , '</html>';


?>
