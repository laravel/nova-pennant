(()=>{var e={873:(e,t,o)=>{var r=o(325).Symbol;e.exports=r},552:(e,t,o)=>{var r=o(873),n=o(659),a=o(350),l=r?r.toStringTag:void 0;e.exports=function(e){return null==e?void 0===e?"[object Undefined]":"[object Null]":l&&l in Object(e)?n(e):a(e)}},840:(e,t,o)=>{var r="object"==typeof o.g&&o.g&&o.g.Object===Object&&o.g;e.exports=r},659:(e,t,o)=>{var r=o(873),n=Object.prototype,a=n.hasOwnProperty,l=n.toString,c=r?r.toStringTag:void 0;e.exports=function(e){var t=a.call(e,c),o=e[c];try{e[c]=void 0;var r=!0}catch(e){}var n=l.call(e);return r&&(t?e[c]=o:delete e[c]),n}},350:e=>{var t=Object.prototype.toString;e.exports=function(e){return t.call(e)}},325:(e,t,o)=>{var r=o(840),n="object"==typeof self&&self&&self.Object===Object&&self,a=r||n||Function("return this")();e.exports=a},449:e=>{var t=Array.isArray;e.exports=t},346:e=>{e.exports=function(e){return null!=e&&"object"==typeof e}},15:(e,t,o)=>{var r=o(552),n=o(449),a=o(346);e.exports=function(e){return"string"==typeof e||!n(e)&&a(e)&&"[object String]"==r(e)}}},t={};function o(r){var n=t[r];if(void 0!==n)return n.exports;var a=t[r]={exports:{}};return e[r](a,a.exports,o),a.exports}o.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return o.d(t,{a:t}),t},o.d=(e,t)=>{for(var r in t)o.o(t,r)&&!o.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},o.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{"use strict";const e=Vue,t=LaravelNovaUi,r=LaravelNova;var n={class:"bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden"},a={class:"ml-auto"};const l={__name:"ConfiguresFeatureModal",props:{show:{type:Boolean,default:!1},feature:{type:Object,required:!0}},emits:["confirm","close"],setup:function(o,l){l.emit;var c=(0,r.useLocalization)().__,u=function(){};return function(r,l){var i=(0,e.resolveComponent)("ModalHeader"),s=(0,e.resolveComponent)("ModalContent"),d=(0,e.resolveComponent)("ModalFooter"),f=(0,e.resolveComponent)("Modal");return(0,e.openBlock)(),(0,e.createBlock)(f,{show:o.show,onCloseOnEscape:l[2]||(l[2]=function(e){return r.$emit("close")}),role:"dialog",size:"2xl","modal-style":"window"},{default:(0,e.withCtx)((function(){return[(0,e.createElementVNode)("div",n,[(0,e.createVNode)(i,{textContent:(0,e.toDisplayString)((0,e.unref)(c)("Configures Feature"))},null,8,["textContent"]),(0,e.createVNode)(s,null,{default:(0,e.withCtx)((function(){return[(0,e.createElementVNode)("form",{ref:"theForm",autocomplete:"off",onSubmit:(0,e.withModifiers)(u,["prevent","stop"]),class:"overflow-hidden space-y-6"}," THE FORM ",544)]})),_:1}),(0,e.createVNode)(d,null,{default:(0,e.withCtx)((function(){return[(0,e.createElementVNode)("div",a,[(0,e.createVNode)((0,e.unref)(t.Button),{variant:"link",state:"mellow",onClick:l[0]||(l[0]=(0,e.withModifiers)((function(e){return r.$emit("close")}),["prevent"])),class:"mr-3",dusk:"cancel-configures-feature-button"},{default:(0,e.withCtx)((function(){return[(0,e.createTextVNode)((0,e.toDisplayString)((0,e.unref)(c)("Cancel")),1)]})),_:1}),(0,e.createVNode)((0,e.unref)(t.Button),{onClick:l[1]||(l[1]=(0,e.withModifiers)((function(e){return r.$emit("confirm")}),["prevent"])),ref:"confirmButton",dusk:"confirm-configures-feature-button",loading:r.working,state:"danger",label:(0,e.unref)(c)("Delete")},null,8,["loading","label"])])]})),_:1})])]})),_:1},8,["show"])}}};var c=o(15),u=o.n(c),i={class:"group"},s={class:"pl-6 w-8 pr-2 py-2 text-gray-400 dark:text-gray-600"},d={class:"p-2"},f={class:"text-gray-500 truncate"},p={class:"text-right pr-4 py-2"},v={key:0},m={class:"text-right pr-4 py-2"},g={class:"flex justify-end items-center text-gray-400"};const y={__name:"TableRow",props:{feature:{type:Object,required:!0}},setup:function(o){var r=o,n=(0,e.ref)(!1),a=(0,e.computed)((function(){return!1!==r.feature.value})),c=(0,e.computed)((function(){return u()(r.feature.value)}));return function(r,u){var y=(0,e.resolveComponent)("IconBoolean"),b=(0,e.resolveComponent)("ConfirmsPassword");return(0,e.openBlock)(),(0,e.createElementBlock)("tr",i,[(0,e.createElementVNode)("td",s,[(0,e.createVNode)(y,{value:a.value},null,8,["value"])]),(0,e.createElementVNode)("td",d,[(0,e.createElementVNode)("p",f,(0,e.toDisplayString)(o.feature.title),1)]),(0,e.createElementVNode)("td",p,[c.value?((0,e.openBlock)(),(0,e.createElementBlock)("span",v,[(0,e.createElementVNode)("code",null,(0,e.toDisplayString)(o.feature.value),1)])):(0,e.createCommentVNode)("",!0)]),(0,e.createElementVNode)("td",m,[(0,e.createElementVNode)("div",g,[(0,e.createVNode)(b,{onConfirmed:u[0]||(u[0]=function(e){return n.value=!0}),required:""},{default:(0,e.withCtx)((function(){return[(0,e.createVNode)((0,e.unref)(t.Button),{variant:"ghost",icon:"cog-8-tooth","aria-label":r.__("Configure")},null,8,["aria-label"])]})),_:1})]),(0,e.createVNode)((0,e.unref)(l),{show:n.value,feature:o.feature,onClose:u[1]||(u[1]=function(e){return n.value=!1}),role:"dialog"},null,8,["show","feature"])])])}}};var b={class:"h-6 flex items-center px-6 mb-4"},h={class:"mr-3 leading-tight text-sm font-bold"},x={class:"mb-5 pb-4"},w={key:0,class:"overflow-hidden overflow-x-auto relative"},N={class:"w-full table-default font-normal"},k={class:"border-t border-b border-gray-100 dark:border-gray-700 divide-y divide-gray-100 dark:divide-gray-700"},C={key:1,class:"flex flex-col items-center justify-between px-6 gap-2"},V={class:"font-normal text-center py-4"};const E={__name:"Tool",props:["resource","resourceName","resourceId","panel"],setup:function(t){var o=(0,r.useLocalization)().__,n=(0,e.ref)(!0),a=(0,e.ref)([]);return(0,e.onMounted)((function(){Nova.request().get("/nova-vendor/user-pennant-features").then((function(e){a.value=e.data})).finally((function(){n.value=!1}))})),function(r,l){var c=(0,e.resolveComponent)("LoadingCard");return(0,e.openBlock)(),(0,e.createBlock)(c,{loading:n.value,class:"pt-4"},{default:(0,e.withCtx)((function(){return[(0,e.createElementVNode)("div",b,[(0,e.createElementVNode)("h3",h,(0,e.toDisplayString)(t.panel.name),1)]),(0,e.createElementVNode)("div",x,[a.value.length>0?((0,e.openBlock)(),(0,e.createElementBlock)("div",w,[(0,e.createElementVNode)("table",N,[(0,e.createElementVNode)("tbody",k,[((0,e.openBlock)(!0),(0,e.createElementBlock)(e.Fragment,null,(0,e.renderList)(a.value,(function(t,o){return(0,e.openBlock)(),(0,e.createBlock)((0,e.unref)(y),{key:o,feature:t},null,8,["feature"])})),128))])])])):((0,e.openBlock)(),(0,e.createElementBlock)("div",C,[(0,e.createElementVNode)("p",V,(0,e.toDisplayString)((0,e.unref)(o)("No :resource available at the moment.",{resource:t.panel.name})),1)]))])]})),_:1},8,["loading"])}}};Nova.booting((function(e,t){e.component("nova-pennant-tool",E)}))})()})();