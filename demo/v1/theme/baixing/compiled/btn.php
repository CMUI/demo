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
   $data->pageId = 'btn';
   $data->pageTitle = 'Button';

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
           echo '<article class="summary"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('概述'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('目前仅可通过预定义的类名（而不是 mixin）来设置按钮样式。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('所有按钮都应该添加 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 类名，并根据需要添加其它辅助类名，以设置其尺寸、颜色等样式。'), 0x88)
               , '</p>'
             , '</div>';
            
             echo '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('所有按钮默认显示为块级，可以按需对特定按钮指定宽度属性。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('不建议在文本段落中混入按钮。'), 0x88)
               , '</p>'
             , '</div>'
           , '</article>';
          
           echo '<article class="btn-size"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('按钮尺寸'), 0x88)
             , '</h1>'
             , '<div'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn cmBtnXSmall"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('超小按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn.cmBtnXSmall'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
             , '<div'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn cmBtnSmall"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('小按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn.cmBtnSmall'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
             , '<div'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('普通按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
             , '<div'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn cmBtnLarge"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('大按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn.cmBtnLarge'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
             , '<div'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn cmBtnXLarge"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('超大按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn.cmBtnXLarge'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
           , '</article>';
          
           echo '<article class="btn-type"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('场景类型'), 0x88)
             , '</h1>'
             , '<div class="btn-default"'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('常规按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
             , '<div class="btn-success"'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn cmBtnInfo"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('信息按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn.cmBtnInfo'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
             , '<div class="btn-success"'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn cmBtnSuccess"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('成功按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn.cmBtnSuccess'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
             , '<div class="btn-danger"'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn cmBtnDanger"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('危险按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn.cmBtnDanger'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
             , '<div class="btn-warning"'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<a class="cmBtn cmBtnWarning"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('警告按钮'), 0x88)
                 , '</a>'
               , '</p>'
               , '<p class="code"'
                , '>'
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmBtn.cmBtnWarning'), 0x88)
                 , '</code>'
               , '</p>'
             , '</div>'
           , '</article>';
          
           echo '<article class="form-btn"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('表单按钮'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('以上的各个类名除了可以用于 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<a>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 元素外，还可用于 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<input>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 和 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('<button>'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 这样的表单按钮元素。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('表单内的按钮应该优先选择表单元素来实现。'), 0x88)
               , '</p>'
             , '</div>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('表单按钮天生具备收缩包围的特性，在不指定宽度时，它们只呈现最小宽度。为使它们呈现出通长的块级效果，已对它们设置 '), 0x88)
                 , '<code'
                  , '>'
                   , 'width: 100%;'
                 , '</code>'
                 , htmlspecialchars(('。'), 0x88)
               , '</p>'
             , '</div>'
             , '<div'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<input class="cmBtn"'
                   , ' type="'
                   , htmlspecialchars(('button'), 0x88)
                   , '"'
                   , ' value="'
                   , htmlspecialchars(('input 元素'), 0x88)
                   , '"'
                  , '>'
               , '</p>'
             , '</div>'
             , '<div'
              , '>'
               , '<p class="cmBtnWrapper"'
                , '>'
                 , '<button class="cmBtn"'
                   , ' type="'
                   , htmlspecialchars(('button'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('button 元素'), 0x88)
                 , '</button>'
               , '</p>'
             , '</div>'
           , '</article>';
          
           echo '<article class="btn-status"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('按钮状态'), 0x88)
             , '</h1>'
             , '<section class="btn-status-hover"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('悬停状态'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('鼠标悬停时可见此状态，不需要修改结构。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('触屏设备不支持此状态。'), 0x88)
                 , '</p>'
               , '</div>'
             , '</section>'
             , '<section class="btn-status-active"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('按下状态'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('鼠标按下或手指触摸时可见此状态，不需要修改结构。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('Android 2.X 不支持此状态。'), 0x88)
                 , '</p>'
               , '</div>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('以下按钮可供把玩：'), 0x88)
                 , '</p>'
               , '</div>'
               , '<div'
                , '>'
                 , '<p'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('按钮'), 0x88)
                   , '</a>'
                 , '</p>'
               , '</div>'
             , '</section>';
            
             echo '<section class="btn-status-force-active"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('选中状态'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('当某个按钮具备开关状态时，可以通过添加或除移 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.active'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 类来实现效果。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('请注意，这个类和 CSS 伪类 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars((':active'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 不仅在含义上有区别，样式上也有差异。'), 0x88)
                 , '</p>'
               , '</div>'
               , '<div'
                , '>'
                 , '<p'
                  , '>'
                   , '<a class="cmBtn active"'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('.cmBtn.active'), 0x88)
                   , '</a>'
                 , '</p>'
               , '</div>'
             , '</section>';
            
             echo '<section class="btn-status-disabled"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('禁用状态'), 0x88)
               , '</h2>'
               , '<div class="intro cmText"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('表单按钮（'), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('<button>'), 0x88)
                   , '</code>'
                   , htmlspecialchars(('、'), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('<input>'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 元素）具有 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('disabled'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 属性时，可见此状态。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('对于由 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('<a>'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 元素实现的按钮，需要添加 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.disabled'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 类。（注意：此时链接仍可响应点击动作。）'), 0x88)
                 , '</p>';
                 // p
                 // "如需动态切换按钮的禁用状态，请使用以下 JavaScript API（开发中）："
                 // ul
                 // 	li > code "CMUI.btn.disable(btn)"
                 // 	li > code "CMUI.btn.enable(btn)"
               echo '</div>'
               , '<div class="intro cmText"'
                , '>'
                 , '<p'
                  , '>'
                   , '上述两种按钮禁用状态的结构和效果分别如下：'
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'a.cmBtn.disabled', "\n"
                     , 'button.cmBtn @disabled', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>';
               // 禁用
               echo '<div'
                , '>'
                 , '<p'
                  , '>'
                   , '<a class="cmBtn disabled"'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('.cmBtn.disabled'), 0x88)
                   , '</a>'
                 , '</p>'
               , '</div>'
               , '<div'
                , '>'
                 , '<p'
                  , '>'
                   , '<button class="cmBtn"'
                     , ' disabled'
                    , '>'
                     , htmlspecialchars(('.cmBtn:disabled'), 0x88)
                   , '</button>'
                 , '</p>'
               , '</div>';
               // 禁用 + 激活
               echo '<div'
                , '>'
                 , '<p'
                  , '>'
                   , '<a class="cmBtn active disabled"'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('.cmBtn.active.disabled'), 0x88)
                   , '</a>'
                 , '</p>'
               , '</div>'
               , '<div'
                , '>'
                 , '<p'
                  , '>'
                   , '<button class="cmBtn active"'
                     , ' disabled'
                    , '>'
                     , htmlspecialchars(('.cmBtn.active:disabled'), 0x88)
                   , '</button>'
                 , '</p>'
               , '</div>'
             , '</section>'
           , '</article>';
          
           echo '<article class="btn-multiple"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('按钮的排列组合'), 0x88)
             , '</h1>'
             , '<section class="btn-line"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('并排的按钮'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('如果需要呈现并排的按钮，请使用以下结构：'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , '.cmBtnLine', "\n"
                     , '    .cmBtn', "\n"
                     , '    .cmBtn', "\n"
                     , '    .cmBtn', "\n"
                   , '</code>'
                 , '</pre>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('如果需要调整各按钮的宽度，建议使用 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('max-width'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 和 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('min-width'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 属性。'), 0x88)
                 , '</p>'
               , '</div>'
               , '<div class="cmBtnLine"'
                , '>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('按钮'), 0x88)
                 , '</a>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('按钮'), 0x88)
                 , '</a>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('按钮'), 0x88)
                 , '</a>'
               , '</div>'
               , '<div class="cmBtnLine"'
                , '>'
                 , '<button class="cmBtn"'
                  , '>'
                   , htmlspecialchars(('表单按钮'), 0x88)
                 , '</button>'
                 , '<button class="cmBtn"'
                  , '>'
                   , htmlspecialchars(('表单按钮'), 0x88)
                 , '</button>'
                 , '<button class="cmBtn"'
                  , '>'
                   , htmlspecialchars(('表单按钮'), 0x88)
                 , '</button>'
               , '</div>'
             , '</section>';
            
             echo '<hr'
              , '>'
             , '<section class="btn-group"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('按钮组合'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('如果需要将多个按钮合并为一组，请使用以下结构：'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , '.cmBtnGroup', "\n"
                     , '    .cmBtn', "\n"
                     , '    .cmBtn', "\n"
                     , '    .cmBtn', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<div class="cmBtnGroup"'
                , '>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('按钮'), 0x88)
                 , '</a>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('按钮'), 0x88)
                 , '</a>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('按钮'), 0x88)
                 , '</a>'
               , '</div>'
               , '<div class="cmBtnGroup"'
                , '>'
                 , '<button class="cmBtn"'
                  , '>'
                   , htmlspecialchars(('表单按钮'), 0x88)
                 , '</button>'
                 , '<button class="cmBtn"'
                  , '>'
                   , htmlspecialchars(('表单按钮'), 0x88)
                 , '</button>'
                 , '<button class="cmBtn"'
                  , '>'
                   , htmlspecialchars(('表单按钮'), 0x88)
                 , '</button>'
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
