(function() {
    tinymce.create('tinymce.plugins.enjoyinstagram', {
        init: function(ed, url) {

            var t = this;
            t.url = url;

            ed.onBeforeSetContent.add(function(ed, o) {

            o.content = t._do_gallery(o.content);

        });

            ed.onPostProcess.add(function(ed, o) {
				if (o.get)
					o.content = t._get_gallery(o.content);

			});

            ed.onExecCommand.add(function(ed, cmd) {
			    if (cmd ==='mceenjoyinstagram'){
					tinyMCE.activeEditor.setContent( t._do_gallery(tinyMCE.activeEditor.getContent()) );
				}
			});

            ed.addCommand('mceenjoyinstagram', function() {
                ed.windowManager.open({
                    // call content via admin-ajax, no need to know the full plugin path 
                    file: ajaxurl + '?action=enjoyinstagram_tinymce',
                    width: 800 + ed.getLang('enjoyinstagram.delta_width', 0),
                    height: 600 + ed.getLang('enjoyinstagram.delta_height', 0),
                    inline: 1
                });
            });

             ed.addButton('enjoyinstagram', {
                title: 'enjoyinstagramshortcodes',
                cmd: 'mceenjoyinstagram',
                image: url + '/icon_enjoyinstagram.png'
            });

/*
            ed.onNodeChange.add(function(ed, cm, n) {
                cm.setActive('enjoyinstagram', n.nodeName == 'IMG');
            });   */
        },

        _do_gallery : function(co) {
			return co.replace(/\[enjoyinstagram([^\]]*)\]/g, function(a,b){
				return '<img src="http://www.mediabeta.com/wp-content/uploads/2014/07/enjoyinstagram1.png" class="wpEnjoyInstagram mceItem" title="enjoyinstagram'+tinymce.DOM.encode(b)+'" />';
			});
		},


         _get_gallery : function(co) {

			function getAttr(s, n) {
				n = new RegExp(n + '=\"([^\"]+)\"', 'g').exec(s);
				return n ? tinymce.DOM.decode(n[1]) : '';
			};

			return co.replace(/(?:<p[^>]*>)*(<img[^>]+>)(?:<\/p>)*/g, function(a,im) {
				var cls = getAttr(im, 'class');

				if ( cls.indexOf('wpEnjoyInstagram') != -1 )
					return '<p>['+tinymce.trim(getAttr(im, 'title'))+']</p>';

				return a;
			});
		},



        getInfo: function() {
            return {
                longname: 'Plugin to add Enjoy Instagram Button',
                author: 'Mediabeta Srl',
                authorurl: 'http://www.mediabeta.com/',
                infourl: 'http://www.mediabeta.com/',
                version: "1.0"
            };
        }
    });

// Register plugin
    tinymce.PluginManager.add('enjoyinstagram', tinymce.plugins.enjoyinstagram);
})();
