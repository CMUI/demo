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
   $data->pageId = 'icon';
   $data->pageTitle = 'Icon';

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
           echo '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('概述'), 0x88)
             , '</h1>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('结构约定'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('所有图标建议采用 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('i.cmIcon'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 这样的结构。'), 0x88)
                 , '</p>'
               , '</div>'
             , '</section>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('初始样式'), 0x88)
               , '</h2>'
               , '<div class="intro cmText"'
                , '>'
                 , '<p'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.cmIcon'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 类具有以下初始样式：'), 0x88)
                 , '</p>'
                 , '<ul'
                  , '>'
                   , '<li'
                    , '>'
                     , '显示为块级'
                   , '</li>'
                   , '<li'
                    , '>'
                     , '水平居中（此特性可能会取消）'
                   , '</li>'
                   , '<li'
                    , '>'
                     , '无浮动，无定位属性'
                   , '</li>'
                   , '<li'
                    , '>'
                     , '溢出隐藏'
                   , '</li>'
                   , '<li'
                    , '>'
                     , '内部文字自动隐藏（可在其内部包含文本，以增强可访问性）'
                   , '</li>'
                 , '</ul>'
               , '</div>'
             , '</section>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('图标尺寸'), 0x88)
               , '</h2>'
               , '<div class="intro cmText"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('添加以下类名来指定图标的尺寸。'), 0x88)
                 , '</p>'
                 , '<ul'
                  , '>'
                   , '<li'
                    , '>'
                     , '<code'
                      , '>'
                       , htmlspecialchars(('.cmX20'), 0x88)
                     , '</code>'
                     , htmlspecialchars((' - 20px × 20px'), 0x88)
                   , '</li>'
                   , '<li'
                    , '>'
                     , '<code'
                      , '>'
                       , htmlspecialchars(('.cmX30'), 0x88)
                     , '</code>'
                     , htmlspecialchars((' - 30px × 30px'), 0x88)
                   , '</li>'
                   , '<li'
                    , '>'
                     , '<code'
                      , '>'
                       , htmlspecialchars(('.cmX40'), 0x88)
                     , '</code>'
                     , htmlspecialchars((' - 40px × 40px'), 0x88)
                   , '</li>'
                   , '<li'
                    , '>'
                     , '<code'
                      , '>'
                       , htmlspecialchars(('.cmX50'), 0x88)
                     , '</code>'
                     , htmlspecialchars((' - 50px × 50px'), 0x88)
                   , '</li>'
                 , '</ul>'
               , '</div>'
             , '</section>'
           , '</article>'
           , '<article class="system-icon"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('系统图标'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('以下图标仅供 CMUI 组件内部使用。'), 0x88)
               , '</p>'
             , '</div>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<i class="cmIcon cmX50 loading-black-bg"'
                  , '>'
                 , '</i>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '黑底白图的 loading 标志'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<i class="cmIcon cmX20 msg-info"'
                  , '>'
                 , '</i>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '普通提示'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<i class="cmIcon cmX20 msg-success"'
                  , '>'
                 , '</i>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '成功提示'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<i class="cmIcon cmX20 msg-error"'
                  , '>'
                 , '</i>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '错误提示'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<i class="cmIcon cmX20 msg-forbidden"'
                  , '>'
                 , '</i>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '禁止提示'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<i class="cmIcon cmX20 msg-warning"'
                  , '>'
                 , '</i>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '警告提示'
               , '</dd>'
             , '</dl>'
           , '</article>';
          
           echo '<article class="custom-icon"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('自定义图标'), 0x88)
             , '</h1>'
             , '<div class="intro cmText"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('CMUI 未对图标的实现做限制，选择权完全交给业务层。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('以下图标方案都可与 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('i.cmIcon'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 正常整合：'), 0x88)
               , '</p>'
               , '<ul'
                , '>'
                 , '<li'
                  , '>'
                   , '背景图片（以及 CSS Sprites）'
                 , '</li>'
                 , '<li'
                  , '>'
                   , 'Icon Font'
                 , '</li>'
                 , '<li'
                  , '>'
                   , 'SVG Icon'
                 , '</li>'
               , '</ul>'
               , '<p'
                , '>'
                 , htmlspecialchars(('图标尺寸可自行定义，也可以采用上述 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmX20'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 等尺寸类。'), 0x88)
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
