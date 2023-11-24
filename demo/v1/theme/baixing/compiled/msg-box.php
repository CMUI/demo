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
   $data->pageId = 'msg-box';
   $data->pageTitle = 'Msg Box';

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
           echo '<article class="msg-box"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('提示框'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('目前来说，提示框是静态的 UI 元素，用户无法自行关闭。开发者可通过脚本手动控制其显隐。未来可能会提供关闭按钮的功能。'), 0x88)
               , '</p>'
             , '</div>'
             , '<section class="plain-text"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('单行提示'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'div.cmMsgBox', "\n"
                     , '    "提示文本"', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<div class="cmMsgBox"'
                , '>'
                 , htmlspecialchars(('常规提示文本段落。'), 0x88)
               , '</div>';
              
               echo '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('可在提示框元素上增加额外的类名，以设置其场景样式。'), 0x88)
                 , '</p>'
                 , '<ul class="cmText"'
                  , '>'
                   , '<li'
                    , '>'
                     , '<code'
                      , '>'
                       , '.cmMsgBoxWarning'
                     , '</code>'
                   , '</li>'
                   , '<li'
                    , '>'
                     , '<code'
                      , '>'
                       , '.cmMsgBoxSuccess'
                     , '</code>'
                   , '</li>'
                   , '<li'
                    , '>'
                     , '<code'
                      , '>'
                       , '.cmMsgBoxError'
                     , '</code>'
                   , '</li>'
                   , '<li'
                    , '>'
                     , '<code'
                      , '>'
                       , '.cmMsgBoxForbidden'
                     , '</code>'
                   , '</li>'
                 , '</ul>'
               , '</div>'
               , '<div class="cmMsgBox cmMsgBoxWarning"'
                , '>'
                 , htmlspecialchars(('警告提示文本段落。'), 0x88)
               , '</div>'
               , '<div class="cmMsgBox cmMsgBoxSuccess"'
                , '>'
                 , htmlspecialchars(('成功提示文本段落。'), 0x88)
               , '</div>'
               , '<div class="cmMsgBox cmMsgBoxError"'
                , '>'
                 , htmlspecialchars(('错误提示文本段落。'), 0x88)
               , '</div>'
               , '<div class="cmMsgBox cmMsgBoxForbidden"'
                , '>'
                 , htmlspecialchars(('禁止操作提示文本段落。'), 0x88)
               , '</div>'
             , '</section>'
             , '<section class="rich-text"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('富文本提示'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('如果需要在提示框内呈现标题、段落、列表等元素的样式，需要在提示框元素上增加 '), 0x88)
                   , '<code'
                    , '>'
                     , '.cmText'
                   , '</code>'
                   , htmlspecialchars((' 类名。'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'div.cmMsgBox.cmText', "\n"
                     , '    h3 "提示框标题"', "\n"
                     , '    p "提示段落"', "\n"
                     , '    ul > li "提示列表"', "\n"
                     , '    ...', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<div class="cmMsgBox cmText"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('提示内容文本段落。'), 0x88)
                 , '</p>'
               , '</div>'
               , '<div class="cmMsgBox cmText"'
                , '>'
                 , '<h3'
                  , '>'
                   , htmlspecialchars(('提示标题'), 0x88)
                 , '</h3>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('提示内容文本段落。'), 0x88)
                 , '</p>'
               , '</div>'
               , '<div class="cmMsgBox cmText"'
                , '>'
                 , '<h3'
                  , '>'
                   , htmlspecialchars(('提示标题'), 0x88)
                 , '</h3>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('提示内容文本段落。'), 0x88)
                 , '</p>'
                 , '<ul'
                  , '>'
                   , '<li'
                    , '>'
                     , htmlspecialchars(('提示内容列表项。'), 0x88)
                   , '</li>'
                   , '<li'
                    , '>'
                     , htmlspecialchars(('提示内容列表项。'), 0x88)
                   , '</li>'
                 , '</ul>'
               , '</div>'
               , '<div class="cmMsgBox cmText"'
                , '>'
                 , '<h3'
                  , '>'
                   , htmlspecialchars(('提示标题'), 0x88)
                 , '</h3>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('提示内容文本段落。'), 0x88)
                 , '</p>'
                 , '<ul'
                  , '>'
                   , '<li'
                    , '>'
                     , htmlspecialchars(('提示内容列表项。'), 0x88)
                   , '</li>'
                   , '<li'
                    , '>'
                     , htmlspecialchars(('提示内容列表项。'), 0x88)
                   , '</li>'
                 , '</ul>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('提示内容文本段落超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长。'), 0x88)
                 , '</p>'
               , '</div>'
             , '</section>'
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
