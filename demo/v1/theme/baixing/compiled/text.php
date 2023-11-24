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
   $data->pageId = 'text';
   $data->pageTitle = 'Text';

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
           echo '<article class="text"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('通用文本格式'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('在文本块的容器元素上加 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmText'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 类，可以令其内部的标题、列表、段落元素显示出其自身的语义格式。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('在 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<ul>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 和 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<ol>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 元素上直接应用 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmText'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 类也可以令其语义格式生效。'), 0x88)
               , '</p>'
             , '</div>'
             , '<hr'
              , '>'
             , '<section class="cmText"'
              , '>'
               , '<h1'
                , '>'
                 , htmlspecialchars(('一级标题'), 0x88)
               , '</h1>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('二级标题'), 0x88)
               , '</h2>'
               , '<p'
                , '>'
                 , htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88)
               , '</p>'
               , '<h3'
                , '>'
                 , htmlspecialchars(('三级标题'), 0x88)
               , '</h3>'
               , '<p'
                , '>'
                 , htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88)
               , '</p>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('二级标题'), 0x88)
               , '</h2>'
               , '<h3'
                , '>'
                 , htmlspecialchars(('三级标题'), 0x88)
               , '</h3>'
               , '<p'
                , '>'
                 , htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88)
               , '</p>'
             , '</section>'
             , '<hr'
              , '>'
             , '<section class="cmText"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('二级标题'), 0x88)
               , '</h2>'
               , '<ol'
                , '>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('有序列表'), 0x88)
                 , '</li>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('有序列表'), 0x88)
                 , '</li>'
               , '</ol>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('二级标题'), 0x88)
               , '</h2>'
               , '<h3'
                , '>'
                 , htmlspecialchars(('三级标题'), 0x88)
               , '</h3>'
               , '<ol'
                , '>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('有序列表'), 0x88)
                 , '</li>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('有序列表'), 0x88)
                 , '</li>'
               , '</ol>'
               , '<h3'
                , '>'
                 , htmlspecialchars(('三级标题'), 0x88)
               , '</h3>'
               , '<p'
                , '>'
                 , htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88)
               , '</p>'
               , '<ol'
                , '>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('有序列表'), 0x88)
                 , '</li>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('有序列表'), 0x88)
                 , '</li>'
               , '</ol>'
               , '<ol'
                , '>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('有序列表'), 0x88)
                 , '</li>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('有序列表'), 0x88)
                 , '</li>'
               , '</ol>'
               , '<p'
                , '>'
                 , htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88)
               , '</p>'
             , '</section>'
             , '<hr'
              , '>'
             , '<section class="cmText"'
              , '>'
               , '<ul'
                , '>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('无序列表'), 0x88)
                   , '<ul'
                    , '>'
                     , '<li'
                      , '>'
                       , htmlspecialchars(('无序列表'), 0x88)
                       , '<ul'
                        , '>'
                         , '<li'
                          , '>'
                           , htmlspecialchars(('无序列表'), 0x88)
                         , '</li>'
                         , '<li'
                          , '>'
                           , htmlspecialchars(('无序列表'), 0x88)
                         , '</li>'
                         , '<li'
                          , '>'
                           , htmlspecialchars(('无序列表'), 0x88)
                         , '</li>'
                       , '</ul>'
                     , '</li>'
                     , '<li'
                      , '>'
                       , htmlspecialchars(('无序列表'), 0x88)
                     , '</li>'
                   , '</ul>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('无序列表'), 0x88)
                 , '</li>'
               , '</ul>'
             , '</section>'
           , '</article>';
          
           echo '<article class="theme-text"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('主题专有文本格式'), 0x88)
             , '</h1>'
             , '<section class="mixin"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('预定义 Mixin'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('网站内文本内容的行高为 1.6（建议使用变量 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('$line-height-text'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 指定行高）。如果文本元素符合以下预定义格式，请使用对应的 mixin。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('绿色虚线框用于示意行高。'), 0x88)
                 , '</p>'
               , '</div>'
               , '<dl class="bx-headline"'
                , '>'
                 , '<dt'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('bx-headline()'), 0x88)
                   , '</code>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , htmlspecialchars(('大标题 （18px 常规字重）'), 0x88)
                 , '</dd>'
               , '</dl>'
               , '<dl class="bx-headline-minor"'
                , '>'
                 , '<dt'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('bx-headline-minor()'), 0x88)
                   , '</code>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , htmlspecialchars(('小标题 （16px 粗体）'), 0x88)
                 , '</dd>'
               , '</dl>'
               , '<dl class="bx-text"'
                , '>'
                 , '<dt'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('bx-text()'), 0x88)
                   , '</code>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , htmlspecialchars(('全局通用文本 （15px 常规字重）'), 0x88)
                 , '</dd>'
               , '</dl>'
               , '<dl class="bx-text-minor"'
                , '>'
                 , '<dt'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('bx-text-minor()'), 0x88)
                   , '</code>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , htmlspecialchars(('次级内容 （13px 常规字重）'), 0x88)
                 , '</dd>'
               , '</dl>'
             , '</section>';
            
             echo '<section class="link"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('链接元素'), 0x88)
               , '</h2>'
               , '<dl'
                , '>'
                 , '<dt'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('a'), 0x88)
                   , '</code>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('链接文本'), 0x88)
                   , '</a>'
                 , '</dd>'
                 , '<dd class="intro"'
                  , '>'
                   , htmlspecialchars(('文本段落中出现的链接，字号与普通文本一致。'), 0x88)
                 , '</dd>'
               , '</dl>'
             , '</section>'
           , '</article>';
          
           echo '<article class="label"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('标签'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('对行内元素使用 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmLabel'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 类名即可。'), 0x88)
               , '</p>'
             , '</div>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmLabel'), 0x88)
                 , '</code>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<span class="cmLabel"'
                  , '>'
                   , htmlspecialchars(('普通标签'), 0x88)
                 , '</span>'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmLabel.cmLabelSuccess'), 0x88)
                 , '</code>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<span class="cmLabel cmLabelSuccess"'
                  , '>'
                   , htmlspecialchars(('成功标签'), 0x88)
                 , '</span>'
               , '</dd>'
             , '</dl>'
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
