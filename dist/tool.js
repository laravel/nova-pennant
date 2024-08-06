(()=>{"use strict";var e,o={69:(e,o,n)=>{const t=Vue;var r={class:"h-6 flex items-center px-6 mb-4"},a={class:"mr-3 leading-tight text-sm font-bold"},l={class:"mb-5 pb-4"},c={key:0,class:"overflow-hidden overflow-x-auto relative"},i={class:"w-full table-default"},s={class:"border-t border-b border-gray-100 dark:border-gray-700 divide-y divide-gray-100 dark:divide-gray-700"},d={key:1,class:"flex flex-col items-center justify-between px-6 gap-2"},v={class:"font-normal text-center py-4"};const u={props:["resourceName","resourceId","panel"],data:function(){return{loading:!0,value:[]}},mounted:function(){var e=this;console.log(JSON.parse(JSON.stringify(this.panel))),this.loading=!1,Nova.request().get("/nova-vendor/user-pennant-features").then((function(o){e.value=o.data,Nova.debug(e.value)})).finally((function(){e.loading=!1}))}};const p=(0,n(262).A)(u,[["render",function(e,o,n,u,p,f){var m=(0,t.resolveComponent)("MetricTableRow"),g=(0,t.resolveComponent)("LoadingCard");return(0,t.openBlock)(),(0,t.createBlock)(g,{loading:e.loading,class:"pt-4"},{default:(0,t.withCtx)((function(){return[(0,t.createElementVNode)("div",r,[(0,t.createElementVNode)("h3",a,(0,t.toDisplayString)(n.panel.name),1)]),(0,t.createElementVNode)("div",l,[e.value.length>0?((0,t.openBlock)(),(0,t.createElementBlock)("div",c,[(0,t.createElementVNode)("table",i,[(0,t.createElementVNode)("tbody",s,[((0,t.openBlock)(!0),(0,t.createElementBlock)(t.Fragment,null,(0,t.renderList)(e.value,(function(e){return(0,t.openBlock)(),(0,t.createBlock)(m,{row:e},null,8,["row"])})),256))])])])):((0,t.openBlock)(),(0,t.createElementBlock)("div",d,[(0,t.createElementVNode)("p",v,(0,t.toDisplayString)(e.__("No :resource available at the moment.",{resource:n.panel.name})),1)]))])]})),_:1},8,["loading"])}]]);Nova.booting((function(e,o){e.component("nova-pennant-tool",p)}))},351:()=>{},262:(e,o)=>{o.A=(e,o)=>{const n=e.__vccOpts||e;for(const[e,t]of o)n[e]=t;return n}}},n={};function t(e){var r=n[e];if(void 0!==r)return r.exports;var a=n[e]={exports:{}};return o[e](a,a.exports,t),a.exports}t.m=o,e=[],t.O=(o,n,r,a)=>{if(!n){var l=1/0;for(d=0;d<e.length;d++){for(var[n,r,a]=e[d],c=!0,i=0;i<n.length;i++)(!1&a||l>=a)&&Object.keys(t.O).every((e=>t.O[e](n[i])))?n.splice(i--,1):(c=!1,a<l&&(l=a));if(c){e.splice(d--,1);var s=r();void 0!==s&&(o=s)}}return o}a=a||0;for(var d=e.length;d>0&&e[d-1][2]>a;d--)e[d]=e[d-1];e[d]=[n,r,a]},t.o=(e,o)=>Object.prototype.hasOwnProperty.call(e,o),(()=>{var e={992:0,885:0};t.O.j=o=>0===e[o];var o=(o,n)=>{var r,a,[l,c,i]=n,s=0;if(l.some((o=>0!==e[o]))){for(r in c)t.o(c,r)&&(t.m[r]=c[r]);if(i)var d=i(t)}for(o&&o(n);s<l.length;s++)a=l[s],t.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return t.O(d)},n=self.webpackChunklaravel_nova_pennant_tool=self.webpackChunklaravel_nova_pennant_tool||[];n.forEach(o.bind(null,0)),n.push=o.bind(null,n.push.bind(n))})(),t.O(void 0,[885],(()=>t(69)));var r=t.O(void 0,[885],(()=>t(351)));r=t.O(r)})();