<?php
include '../access/module/db_connect.php';
?>

<!doctype html>
<html lang="vi" class="h-full">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Section</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
  <style>
    * { font-family: 'DM Sans', sans-serif; }
  </style>
  <style>body { box-sizing: border-box; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
 </head>
 <body class="h-full">
   <footer class="w-full" style="background-color: #0d4e60; border-top: 1px solid #0a3a4a;">
    <div class="max-w-6xl mx-auto px-6 py-12">
     <!-- Top Section -->
     <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-10">
      <!-- Brand -->
      <div class="md:col-span-1">
       <h2 id="platform-name" class="text-xl font-bold mb-3" style="color: #e0f7f9;">Tài Liệu Học Thuật</h2>
       <p id="tagline" class="text-sm leading-relaxed" style="color: #a8d8e0;">Chia sẻ &amp; Cộng tác tài liệu dễ dàng</p>
       <div class="flex gap-3 mt-5">
        <a href="#" class="w-9 h-9 rounded-full flex items-center justify-center transition-colors" style="background-color: #0a3a4a; color: #a8d8e0;" onmouseover="this.style.backgroundColor='#00bcd4';this.style.color='#fff'" onmouseout="this.style.backgroundColor='#0a3a4a';this.style.color='#a8d8e0'"> <i data-lucide="facebook" style="width:16px;height:16px;"></i> </a> <a href="#" class="w-9 h-9 rounded-full flex items-center justify-center transition-colors" style="background-color: #0a3a4a; color: #a8d8e0;" onmouseover="this.style.backgroundColor='#00bcd4';this.style.color='#fff'" onmouseout="this.style.backgroundColor='#0a3a4a';this.style.color='#a8d8e0'"> <i data-lucide="twitter" style="width:16px;height:16px;"></i> </a> <a href="#" class="w-9 h-9 rounded-full flex items-center justify-center transition-colors" style="background-color: #0a3a4a; color: #a8d8e0;" onmouseover="this.style.backgroundColor='#00bcd4';this.style.color='#fff'" onmouseout="this.style.backgroundColor='#0a3a4a';this.style.color='#a8d8e0'"> <i data-lucide="instagram" style="width:16px;height:16px;"></i> </a> <a href="#" class="w-9 h-9 rounded-full flex items-center justify-center transition-colors" style="background-color: #0a3a4a; color: #a8d8e0;" onmouseover="this.style.backgroundColor='#00bcd4';this.style.color='#fff'" onmouseout="this.style.backgroundColor='#0a3a4a';this.style.color='#a8d8e0'"> <i data-lucide="linkedin" style="width:16px;height:16px;"></i> </a>
       </div>
      </div><!-- Links -->
      <div>
       <h3 class="text-sm font-semibold uppercase tracking-wider mb-4" style="color: #00bcd4;">Tính năng</h3>
       <ul class="space-y-2.5">
        <li><a href="documents.php" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Tải lên &amp; lưu trữ</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Chia sẻ nhanh</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Kiểm soát quyền hạn</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Tìm kiếm nâng cao</a></li>
       </ul>
      </div>
      <div>
       <h3 class="text-sm font-semibold uppercase tracking-wider mb-4" style="color: #00bcd4;">Về chúng tôi</h3>
       <ul class="space-y-2.5">
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Trang chủ</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Blog &amp; tài nguyên</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Cơ hội việc làm</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Liên hệ</a></li>
       </ul>
      </div>
      <div>
       <h3 class="text-sm font-semibold uppercase tracking-wider mb-4" style="color: #00bcd4;">Pháp lý</h3>
       <ul class="space-y-2.5">
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Điều khoản sử dụng</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Chính sách bảo mật</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Chính sách cookie</a></li>
        <li><a href="#" class="text-sm transition-colors hover:text-white" style="color: #a8d8e0;">Liên hệ pháp lý</a></li>
       </ul>
      </div>
     </div><!-- Bottom -->
     <div class="pt-6 flex flex-col md:flex-row items-center justify-between gap-3" style="border-top: 1px solid #0a3a4a;">
      <p id="copyright-text" class="text-xs" style="color: #6eb8c1;">© 2024 DocShare. All rights reserved.</p>
      <p class="text-xs" style="color: #6eb8c1;">Made with <span style="color: #00bcd4;">♥</span> for document collaboration</p>
     </div>
    </div>
   </footer>
  </div>
  <script>
    const defaultConfig = {
      platform_name: 'DocShare',
      tagline: 'Chia sẻ & Cộng tác tài liệu dễ dàng',
      copyright_text: '© 2024 DocShare. All rights reserved.',
      background_color: '#051e28',
      surface_color: '#0d4e60',
      text_color: '#a8d8e0',
      accent_color: '#00bcd4',
      heading_color: '#e0f7f9',
      font_family: 'DM Sans',
      font_size: 14
    };

    function applyConfig(config) {
      document.getElementById('platform-name').textContent = config.platform_name || defaultConfig.platform_name;
      document.getElementById('tagline').textContent = config.tagline || defaultConfig.tagline;
      document.getElementById('copyright-text').textContent = config.copyright_text || defaultConfig.copyright_text;

      const bg = config.background_color || defaultConfig.background_color;
      const surface = config.surface_color || defaultConfig.surface_color;
      const text = config.text_color || defaultConfig.text_color;
      const accent = config.accent_color || defaultConfig.accent_color;
      const heading = config.heading_color || defaultConfig.heading_color;
      const font = config.font_family || defaultConfig.font_family;
      const size = config.font_size || defaultConfig.font_size;

      document.getElementById('app').style.backgroundColor = bg;
      const footer = document.querySelector('footer');
      footer.style.backgroundColor = surface;
      footer.style.borderTopColor = '#2a2d3a';

      document.getElementById('platform-name').style.color = heading;
      document.getElementById('platform-name').style.fontSize = `${size * 1.4}px`;
      document.getElementById('tagline').style.color = text;
      document.getElementById('tagline').style.fontSize = `${size}px`;
      document.getElementById('copyright-text').style.color = text;

      document.querySelectorAll('h3').forEach(h => { h.style.color = accent; });
      document.querySelectorAll('footer a:not(.w-9)').forEach(a => { a.style.color = text; });
      document.querySelectorAll('footer *').forEach(el => { el.style.fontFamily = `${font}, sans-serif`; });
    }

    window.elementSdk.init({
      defaultConfig,
      onConfigChange: async (config) => { applyConfig(config); },
      mapToCapabilities: (config) => ({
        recolorables: [
          { get: () => config.background_color || defaultConfig.background_color, set: (v) => { config.background_color = v; window.elementSdk.setConfig({ background_color: v }); } },
          { get: () => config.surface_color || defaultConfig.surface_color, set: (v) => { config.surface_color = v; window.elementSdk.setConfig({ surface_color: v }); } },
          { get: () => config.text_color || defaultConfig.text_color, set: (v) => { config.text_color = v; window.elementSdk.setConfig({ text_color: v }); } },
          { get: () => config.accent_color || defaultConfig.accent_color, set: (v) => { config.accent_color = v; window.elementSdk.setConfig({ accent_color: v }); } },
          { get: () => config.heading_color || defaultConfig.heading_color, set: (v) => { config.heading_color = v; window.elementSdk.setConfig({ heading_color: v }); } }
        ],
        borderables: [],
        fontEditable: { get: () => config.font_family || defaultConfig.font_family, set: (v) => { config.font_family = v; window.elementSdk.setConfig({ font_family: v }); } },
        fontSizeable: { get: () => config.font_size || defaultConfig.font_size, set: (v) => { config.font_size = v; window.elementSdk.setConfig({ font_size: v }); } }
      }),
      mapToEditPanelValues: (config) => new Map([
        ['platform_name', config.platform_name || defaultConfig.platform_name],
        ['tagline', config.tagline || defaultConfig.tagline],
        ['copyright_text', config.copyright_text || defaultConfig.copyright_text]
      ])
    });

    lucide.createIcons();
  </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9f872f6641887152',t:'MTc3ODIyOTg5NC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>