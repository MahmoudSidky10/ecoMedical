!function(){"use strict";var t=tinymce.util.Tools.resolve("tinymce.PluginManager"),o=function(t,o,n){t.dom.toggleClass(t.getBody(),"mce-visualblocks"),n.set(!n.get()),function(t,o){t.fire("VisualBlocks",{state:o})}(t,n.get())},n=function(t,o){return function(n){n.setActive(o.get());var e=function(t){return n.setActive(t.state)};return t.on("VisualBlocks",e),function(){return t.off("VisualBlocks",e)}}};t.add("visualblocks",(function(t,e){var i,c=(i=!1,{get:function(){return i},set:function(t){i=t}});!function(t,n,e){t.addCommand("mceVisualBlocks",(function(){o(t,0,e)}))}(t,0,c),function(t,o){t.ui.registry.addToggleButton("visualblocks",{icon:"visualblocks",tooltip:"Show blocks",onAction:function(){return t.execCommand("mceVisualBlocks")},onSetup:n(t,o)}),t.ui.registry.addToggleMenuItem("visualblocks",{text:"Show blocks",icon:"visualblocks",onAction:function(){return t.execCommand("mceVisualBlocks")},onSetup:n(t,o)})}(t,c),function(t,n,e){t.on("PreviewFormats AfterPreviewFormats",(function(o){e.get()&&t.dom.toggleClass(t.getBody(),"mce-visualblocks","afterpreviewformats"===o.type)})),t.on("init",(function(){(function(t){return t.getParam("visualblocks_default_state",!1,"boolean")})(t)&&o(t,0,e)}))}(t,0,c)}))}();
//# sourceMappingURL=plugin.js.map
