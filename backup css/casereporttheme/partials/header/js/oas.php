    <script>
      var oas_tag = oas_tag || {};
      oas_tag.url = 'oasc-eu1.247realmedia.com';
      oas_tag.sizes = function () {
        oas_tag.definePos('Top', [728,90]);
        oas_tag.definePos('Middle1', [300,250]);
        oas_tag.definePos('Bottom', [728,90]);
      };
      oas_tag.site_page = window.location.hostname + window.location.pathname;
      oas_tag.query = '';
      oas_tag.allowSizeOverride = true;
      oas_tag.analytics = true;
      oas_tag.taxonomy = '';
      (function() {
        oas_tag.version ='1'; oas_tag.loadAd = oas_tag.loadAd || function(){};
        var oas = document.createElement('script'),
            protocol = 'https:' == document.location.protocol?'https://':'http://',
            node = document.getElementsByTagName('script')[0];
        oas.type = 'text/javascript'; oas.async = true;
        oas.src = protocol + oas_tag.url + '/om/' + oas_tag.version + '.js';
        node.parentNode.insertBefore(oas, node);
      })();
    </script>
