(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5c172893"],{"55c3":function(t,e,n){"use strict";n.r(e);var i,o,a=n("5976"),r=n("160c"),s=n("fe2b"),c=n("a6b6"),l=n("ac0d"),h=c["a"].Meta,u={components:{AListItem:c["a"],AList:s["b"],ASwitch:r["a"],Meta:h},mixins:[l["a"]],data:function(){return{}},filters:{themeFilter:function(t){var e={dark:"暗色",light:"白色"};return e[t]}},methods:{colorFilter:function(t){var e=a["a"].filter(function(e){return e.color===t})[0];return e&&e.key},onChange:function(t){t?this.$store.dispatch("ToggleTheme","dark"):this.$store.dispatch("ToggleTheme","light")}},render:function(){var t=arguments[0];return t(s["b"],{attrs:{itemLayout:"horizontal"}},[t(c["a"],[t(h,[t("a",{slot:"title"},["风格配色"]),t("span",{slot:"description"},["整体风格配色设置"])]),t("div",{slot:"actions"},[t(r["a"],{attrs:{checkedChildren:"暗色",unCheckedChildren:"白色",defaultChecked:"dark"===this.navTheme},on:{change:this.onChange}})])]),t(c["a"],[t(h,[t("a",{slot:"title"},["主题色"]),t("span",{slot:"description"},["页面风格配色： ",t("a",{domProps:{innerHTML:this.colorFilter(this.primaryColor)}})])])])])}},d=u,f=(n("e322"),n("2877")),p=Object(f["a"])(d,i,o,!1,null,"43e63f19",null);p.options.__file="Custom.vue";e["default"]=p.exports},"988a":function(t,e,n){},e322:function(t,e,n){"use strict";var i=n("988a"),o=n.n(i);o.a}}]);
//# sourceMappingURL=chunk-5c172893.2d5593d4.js.map