/**
* Tom Select v2.1.0
* Licensed under the Apache License, Version 2.0 (the "License");
*/
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e="undefined"!=typeof globalThis?globalThis:e||self).TomSelect=t()}(this,(function(){"use strict"
function e(e,t){e.split(/\s+/).forEach((e=>{t(e)}))}class t{constructor(){this._events=void 0,this._events={}}on(t,i){e(t,(e=>{this._events[e]=this._events[e]||[],this._events[e].push(i)}))}off(t,i){var s=arguments.length
0!==s?e(t,(e=>{if(1===s)return delete this._events[e]
e in this._events!=!1&&this._events[e].splice(this._events[e].indexOf(i),1)})):this._events={}}trigger(t,...i){var s=this
e(t,(e=>{if(e in s._events!=!1)for(let t of s._events[e])t.apply(s,i)}))}}var i
const s="[̀-ͯ·ʾ]",n=new RegExp(s,"gu")
var o
const r={"æ":"ae","ⱥ":"a","ø":"o"},l=new RegExp(Object.keys(r).join("|"),"gu"),a=[[0,65535]],c=e=>e.normalize("NFKD").replace(n,"").toLowerCase().replace(l,(function(e){return r[e]})),d=(e,t="|")=>{if(1==e.length)return e[0]
var i=1
return e.forEach((e=>{i=Math.max(i,e.length)})),1==i?"["+e.join("")+"]":"(?:"+e.join(t)+")"},p=e=>{const t=e.map((e=>m(e)))
return d(t)},u=e=>{if(1===e.length)return[[e]]
var t=[]
return u(e.substring(1)).forEach((function(i){var s=i.slice(0)
s[0]=e.charAt(0)+s[0],t.push(s),(s=i.slice(0)).unshift(e.charAt(0)),t.push(s)})),t},h=e=>{void 0===o&&(o=(e=>{var t={}
e.forEach((e=>{for(let s=e[0];s<=e[1];s++){let e=String.fromCharCode(s),n=c(e)
if(n!=e.toLowerCase()&&!(n.length>3)){n in t||(t[n]=[n])
var i=new RegExp(p(t[n]),"iu")
e.match(i)||t[n].push(e)}}}))
let s=Object.keys(t)
for(let e=0;e<s.length;e++){const i=s[e]
t[i].length<2&&delete t[i]}s=Object.keys(t).sort(((e,t)=>t.length-e.length)),i=new RegExp("("+p(s)+"[̀-ͯ·ʾ]*)","gu")
var n={}
return s.sort(((e,t)=>e.length-t.length)).forEach((e=>{var i=u(e).map((e=>(e=e.map((e=>t.hasOwnProperty(e)?p(t[e]):e)),d(e,""))))
n[e]=d(i)})),n})(a))
return e.normalize("NFKD").toLowerCase().split(i).map((e=>{const t=c(e)
return""==t?"":o.hasOwnProperty(t)?o[t]:e})).join("")},g=(e,t)=>{if(e)return e[t]},v=(e,t)=>{if(e){for(var i,s=t.split(".");(i=s.shift())&&(e=e[i]););return e}},f=(e,t,i)=>{var s,n
return e?-1===(n=(e+="").search(t.regex))?0:(s=t.string.length/e.length,0===n&&(s+=.5),s*i):0},m=e=>(e+"").replace(/([\$\(-\+\.\?\[-\^\{-\}])/g,"\\$1"),O=(e,t)=>{var i=e[t]
if("function"==typeof i)return i
i&&!Array.isArray(i)&&(e[t]=[i])},y=(e,t)=>{if(Array.isArray(e))e.forEach(t)
else for(var i in e)e.hasOwnProperty(i)&&t(e[i],i)},b=(e,t)=>"number"==typeof e&&"number"==typeof t?e>t?1:e<t?-1:0:(e=c(e+"").toLowerCase())>(t=c(t+"").toLowerCase())?1:t>e?-1:0
class w{constructor(e,t){this.items=void 0,this.settings=void 0,this.items=e,this.settings=t||{diacritics:!0}}tokenize(e,t,i){if(!e||!e.length)return[]
const s=[],n=e.split(/\s+/)
var o
return i&&(o=new RegExp("^("+Object.keys(i).map(m).join("|")+"):(.*)$")),n.forEach((e=>{let i,n=null,r=null
o&&(i=e.match(o))&&(n=i[1],e=i[2]),e.length>0&&(r=this.settings.diacritics?h(e):m(e),t&&(r="\\b"+r)),s.push({string:e,regex:r?new RegExp(r,"iu"):null,field:n})})),s}getScoreFunction(e,t){var i=this.prepareSearch(e,t)
return this._getScoreFunction(i)}_getScoreFunction(e){const t=e.tokens,i=t.length
if(!i)return function(){return 0}
const s=e.options.fields,n=e.weights,o=s.length,r=e.getAttrFn
if(!o)return function(){return 1}
const l=1===o?function(e,t){const i=s[0].field
return f(r(t,i),e,n[i])}:function(e,t){var i=0
if(e.field){const s=r(t,e.field)
!e.regex&&s?i+=1/o:i+=f(s,e,1)}else y(n,((s,n)=>{i+=f(r(t,n),e,s)}))
return i/o}
return 1===i?function(e){return l(t[0],e)}:"and"===e.options.conjunction?function(e){for(var s,n=0,o=0;n<i;n++){if((s=l(t[n],e))<=0)return 0
o+=s}return o/i}:function(e){var s=0
return y(t,(t=>{s+=l(t,e)})),s/i}}getSortFunction(e,t){var i=this.prepareSearch(e,t)
return this._getSortFunction(i)}_getSortFunction(e){var t,i,s
const n=this,o=e.options,r=!e.query&&o.sort_empty?o.sort_empty:o.sort,l=[],a=[]
if("function"==typeof r)return r.bind(this)
const c=function(t,i){return"$score"===t?i.score:e.getAttrFn(n.items[i.id],t)}
if(r)for(t=0,i=r.length;t<i;t++)(e.query||"$score"!==r[t].field)&&l.push(r[t])
if(e.query){for(s=!0,t=0,i=l.length;t<i;t++)if("$score"===l[t].field){s=!1
break}s&&l.unshift({field:"$score",direction:"desc"})}else for(t=0,i=l.length;t<i;t++)if("$score"===l[t].field){l.splice(t,1)
break}for(t=0,i=l.length;t<i;t++)a.push("desc"===l[t].direction?-1:1)
const d=l.length
if(d){if(1===d){const e=l[0].field,t=a[0]
return function(i,s){return t*b(c(e,i),c(e,s))}}return function(e,t){var i,s,n
for(i=0;i<d;i++)if(n=l[i].field,s=a[i]*b(c(n,e),c(n,t)))return s
return 0}}return null}prepareSearch(e,t){const i={}
var s=Object.assign({},t)
if(O(s,"sort"),O(s,"sort_empty"),s.fields){O(s,"fields")
const e=[]
s.fields.forEach((t=>{"string"==typeof t&&(t={field:t,weight:1}),e.push(t),i[t.field]="weight"in t?t.weight:1})),s.fields=e}return{options:s,query:e.toLowerCase().trim(),tokens:this.tokenize(e,s.respect_word_boundaries,i),total:0,items:[],weights:i,getAttrFn:s.nesting?v:g}}search(e,t){var i,s,n=this
s=this.prepareSearch(e,t),t=s.options,e=s.query
const o=t.score||n._getScoreFunction(s)
e.length?y(n.items,((e,n)=>{i=o(e),(!1===t.filter||i>0)&&s.items.push({score:i,id:n})})):y(n.items,((e,t)=>{s.items.push({score:1,id:t})}))
const r=n._getSortFunction(s)
return r&&s.items.sort(r),s.total=s.items.length,"number"==typeof t.limit&&(s.items=s.items.slice(0,t.limit)),s}}const _=e=>{if(e.jquery)return e[0]
if(e instanceof HTMLElement)return e
if(I(e)){let t=document.createElement("div")
return t.innerHTML=e.trim(),t.firstChild}return document.querySelector(e)},I=e=>"string"==typeof e&&e.indexOf("<")>-1,C=(e,t)=>{var i=document.createEvent("HTMLEvents")
i.initEvent(t,!0,!1),e.dispatchEvent(i)},S=(e,t)=>{Object.assign(e.style,t)},A=(e,...t)=>{var i=k(t);(e=F(e)).map((e=>{i.map((t=>{e.classList.add(t)}))}))},x=(e,...t)=>{var i=k(t);(e=F(e)).map((e=>{i.map((t=>{e.classList.remove(t)}))}))},k=e=>{var t=[]
return y(e,(e=>{"string"==typeof e&&(e=e.trim().split(/[\11\12\14\15\40]/)),Array.isArray(e)&&(t=t.concat(e))})),t.filter(Boolean)},F=e=>(Array.isArray(e)||(e=[e]),e),L=(e,t,i)=>{if(!i||i.contains(e))for(;e&&e.matches;){if(e.matches(t))return e
e=e.parentNode}},E=(e,t=0)=>t>0?e[e.length-1]:e[0],P=(e,t)=>{if(!e)return-1
t=t||e.nodeName
for(var i=0;e=e.previousElementSibling;)e.matches(t)&&i++
return i},T=(e,t)=>{y(t,((t,i)=>{null==t?e.removeAttribute(i):e.setAttribute(i,""+t)}))},j=(e,t)=>{e.parentNode&&e.parentNode.replaceChild(t,e)},V=(e,t)=>{if(null===t)return
if("string"==typeof t){if(!t.length)return
t=new RegExp(t,"i")}const i=e=>3===e.nodeType?(e=>{var i=e.data.match(t)
if(i&&e.data.length>0){var s=document.createElement("span")
s.className="highlight"
var n=e.splitText(i.index)
n.splitText(i[0].length)
var o=n.cloneNode(!0)
return s.appendChild(o),j(n,s),1}return 0})(e):((e=>{if(1===e.nodeType&&e.childNodes&&!/(script|style)/i.test(e.tagName)&&("highlight"!==e.className||"SPAN"!==e.tagName))for(var t=0;t<e.childNodes.length;++t)t+=i(e.childNodes[t])})(e),0)
i(e)},q="undefined"!=typeof navigator&&/Mac/.test(navigator.userAgent)?"metaKey":"ctrlKey"
var D={options:[],optgroups:[],plugins:[],delimiter:",",splitOn:null,persist:!0,diacritics:!0,create:null,createOnBlur:!1,createFilter:null,highlight:!0,openOnFocus:!0,shouldOpen:null,maxOptions:50,maxItems:null,hideSelected:null,duplicates:!1,addPrecedence:!1,selectOnTab:!1,preload:null,allowEmptyOption:!1,loadThrottle:300,loadingClass:"loading",dataAttr:null,optgroupField:"optgroup",valueField:"value",labelField:"text",disabledField:"disabled",optgroupLabelField:"label",optgroupValueField:"value",lockOptgroupOrder:!1,sortField:"$order",searchField:["text"],searchConjunction:"and",mode:null,wrapperClass:"ts-wrapper",controlClass:"ts-control",dropdownClass:"ts-dropdown",dropdownContentClass:"ts-dropdown-content",itemClass:"item",optionClass:"option",dropdownParent:null,controlInput:'<input type="text" autocomplete="off" size="1" />',copyClassesToDropdown:!1,placeholder:null,hidePlaceholder:null,shouldLoad:function(e){return e.length>0},render:{}}
const N=e=>null==e?null:H(e),H=e=>"boolean"==typeof e?e?"1":"0":e+"",R=e=>(e+"").replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;"),z=(e,t)=>{var i
return function(s,n){var o=this
i&&(o.loading=Math.max(o.loading-1,0),clearTimeout(i)),i=setTimeout((function(){i=null,o.loadedSearches[s]=!0,e.call(o,s,n)}),t)}},M=(e,t,i)=>{var s,n=e.trigger,o={}
for(s of(e.trigger=function(){var i=arguments[0]
if(-1===t.indexOf(i))return n.apply(e,arguments)
o[i]=arguments},i.apply(e,[]),e.trigger=n,t))s in o&&n.apply(e,o[s])},B=(e,t=!1)=>{e&&(e.preventDefault(),t&&e.stopPropagation())},K=(e,t,i,s)=>{e.addEventListener(t,i,s)},Q=(e,t)=>!!t&&(!!t[e]&&1===(t.altKey?1:0)+(t.ctrlKey?1:0)+(t.shiftKey?1:0)+(t.metaKey?1:0)),G=(e,t)=>{const i=e.getAttribute("id")
return i||(e.setAttribute("id",t),t)},U=e=>e.replace(/[\\"']/g,"\\$&"),W=(e,t)=>{t&&e.append(t)}
function J(e,t){var i=Object.assign({},D,t),s=i.dataAttr,n=i.labelField,o=i.valueField,r=i.disabledField,l=i.optgroupField,a=i.optgroupLabelField,c=i.optgroupValueField,d=e.tagName.toLowerCase(),p=e.getAttribute("placeholder")||e.getAttribute("data-placeholder")
if(!p&&!i.allowEmptyOption){let t=e.querySelector('option[value=""]')
t&&(p=t.textContent)}var u,h,g,v,f,m,O={placeholder:p,options:[],optgroups:[],items:[],maxItems:null}
return"select"===d?(h=O.options,g={},v=1,f=e=>{var t=Object.assign({},e.dataset),i=s&&t[s]
return"string"==typeof i&&i.length&&(t=Object.assign(t,JSON.parse(i))),t},m=(e,t)=>{var s=N(e.value)
if(null!=s&&(s||i.allowEmptyOption)){if(g.hasOwnProperty(s)){if(t){var a=g[s][l]
a?Array.isArray(a)?a.push(t):g[s][l]=[a,t]:g[s][l]=t}}else{var c=f(e)
c[n]=c[n]||e.textContent,c[o]=c[o]||s,c[r]=c[r]||e.disabled,c[l]=c[l]||t,c.$option=e,g[s]=c,h.push(c)}e.selected&&O.items.push(s)}},O.maxItems=e.hasAttribute("multiple")?null:1,y(e.children,(e=>{var t,i,s
"optgroup"===(u=e.tagName.toLowerCase())?((s=f(t=e))[a]=s[a]||t.getAttribute("label")||"",s[c]=s[c]||v++,s[r]=s[r]||t.disabled,O.optgroups.push(s),i=s[c],y(t.children,(e=>{m(e,i)}))):"option"===u&&m(e)}))):(()=>{const t=e.getAttribute(s)
if(t)O.options=JSON.parse(t),y(O.options,(e=>{O.items.push(e[o])}))
else{var r=e.value.trim()||""
if(!i.allowEmptyOption&&!r.length)return
const t=r.split(i.delimiter)
y(t,(e=>{const t={}
t[n]=e,t[o]=e,O.options.push(t)})),O.items=t}})(),Object.assign({},D,O,t)}var X=0
class Y extends(function(e){return e.plugins={},class extends e{constructor(...e){super(...e),this.plugins={names:[],settings:{},requested:{},loaded:{}}}static define(t,i){e.plugins[t]={name:t,fn:i}}initializePlugins(e){var t,i
const s=this,n=[]
if(Array.isArray(e))e.forEach((e=>{"string"==typeof e?n.push(e):(s.plugins.settings[e.name]=e.options,n.push(e.name))}))
else if(e)for(t in e)e.hasOwnProperty(t)&&(s.plugins.settings[t]=e[t],n.push(t))
for(;i=n.shift();)s.require(i)}loadPlugin(t){var i=this,s=i.plugins,n=e.plugins[t]
if(!e.plugins.hasOwnProperty(t))throw new Error('Unable to find "'+t+'" plugin')
s.requested[t]=!0,s.loaded[t]=n.fn.apply(i,[i.plugins.settings[t]||{}]),s.names.push(t)}require(e){var t=this,i=t.plugins
if(!t.plugins.loaded.hasOwnProperty(e)){if(i.requested[e])throw new Error('Plugin has circular dependency ("'+e+'")')
t.loadPlugin(e)}return i.loaded[e]}}}(t)){constructor(e,t){var i
super(),this.control_input=void 0,this.wrapper=void 0,this.dropdown=void 0,this.control=void 0,this.dropdown_content=void 0,this.focus_node=void 0,this.order=0,this.settings=void 0,this.input=void 0,this.tabIndex=void 0,this.is_select_tag=void 0,this.rtl=void 0,this.inputId=void 0,this._destroy=void 0,this.sifter=void 0,this.isOpen=!1,this.isDisabled=!1,this.isRequired=void 0,this.isInvalid=!1,this.isValid=!0,this.isLocked=!1,this.isFocused=!1,this.isInputHidden=!1,this.isSetup=!1,this.ignoreFocus=!1,this.ignoreHover=!1,this.hasOptions=!1,this.currentResults=void 0,this.lastValue="",this.caretPos=0,this.loading=0,this.loadedSearches={},this.activeOption=null,this.activeItems=[],this.optgroups={},this.options={},this.userOptions={},this.items=[],X++
var s=_(e)
if(s.tomselect)throw new Error("Tom Select already initialized on this element")
s.tomselect=this,i=(window.getComputedStyle&&window.getComputedStyle(s,null)).getPropertyValue("direction")
const n=J(s,t)
this.settings=n,this.input=s,this.tabIndex=s.tabIndex||0,this.is_select_tag="select"===s.tagName.toLowerCase(),this.rtl=/rtl/i.test(i),this.inputId=G(s,"tomselect-"+X),this.isRequired=s.required,this.sifter=new w(this.options,{diacritics:n.diacritics}),n.mode=n.mode||(1===n.maxItems?"single":"multi"),"boolean"!=typeof n.hideSelected&&(n.hideSelected="multi"===n.mode),"boolean"!=typeof n.hidePlaceholder&&(n.hidePlaceholder="multi"!==n.mode)
var o=n.createFilter
"function"!=typeof o&&("string"==typeof o&&(o=new RegExp(o)),o instanceof RegExp?n.createFilter=e=>o.test(e):n.createFilter=e=>this.settings.duplicates||!this.options[e]),this.initializePlugins(n.plugins),this.setupCallbacks(),this.setupTemplates()
const r=_("<div>"),l=_("<div>"),a=this._render("dropdown"),c=_('<div role="listbox" tabindex="-1">'),d=this.input.getAttribute("class")||"",p=n.mode
var u
if(A(r,n.wrapperClass,d,p),A(l,n.controlClass),W(r,l),A(a,n.dropdownClass,p),n.copyClassesToDropdown&&A(a,d),A(c,n.dropdownContentClass),W(a,c),_(n.dropdownParent||r).appendChild(a),I(n.controlInput)){u=_(n.controlInput)
y(["autocorrect","autocapitalize","autocomplete"],(e=>{s.getAttribute(e)&&T(u,{[e]:s.getAttribute(e)})})),u.tabIndex=-1,l.appendChild(u),this.focus_node=u}else n.controlInput?(u=_(n.controlInput),this.focus_node=u):(u=_("<input/>"),this.focus_node=l)
this.wrapper=r,this.dropdown=a,this.dropdown_content=c,this.control=l,this.control_input=u,this.setup()}setup(){const e=this,t=e.settings,i=e.control_input,s=e.dropdown,n=e.dropdown_content,o=e.wrapper,r=e.control,l=e.input,a=e.focus_node,c={passive:!0},d=e.inputId+"-ts-dropdown"
T(n,{id:d}),T(a,{role:"combobox","aria-haspopup":"listbox","aria-expanded":"false","aria-controls":d})
const p=G(a,e.inputId+"-ts-control"),u="label[for='"+(e=>e.replace(/['"\\]/g,"\\$&"))(e.inputId)+"']",h=document.querySelector(u),g=e.focus.bind(e)
if(h){K(h,"click",g),T(h,{for:p})
const t=G(h,e.inputId+"-ts-label")
T(a,{"aria-labelledby":t}),T(n,{"aria-labelledby":t})}if(o.style.width=l.style.width,e.plugins.names.length){const t="plugin-"+e.plugins.names.join(" plugin-")
A([o,s],t)}(null===t.maxItems||t.maxItems>1)&&e.is_select_tag&&T(l,{multiple:"multiple"}),t.placeholder&&T(i,{placeholder:t.placeholder}),!t.splitOn&&t.delimiter&&(t.splitOn=new RegExp("\\s*"+m(t.delimiter)+"+\\s*")),t.load&&t.loadThrottle&&(t.load=z(t.load,t.loadThrottle)),e.control_input.type=l.type,K(s,"mouseenter",(t=>{var i=L(t.target,"[data-selectable]",s)
i&&e.onOptionHover(t,i)}),{capture:!0}),K(s,"click",(t=>{const i=L(t.target,"[data-selectable]")
i&&(e.onOptionSelect(t,i),B(t,!0))})),K(r,"click",(t=>{var s=L(t.target,"[data-ts-item]",r)
s&&e.onItemSelect(t,s)?B(t,!0):""==i.value&&(e.onClick(),B(t,!0))})),K(a,"keydown",(t=>e.onKeyDown(t))),K(i,"keypress",(t=>e.onKeyPress(t))),K(i,"input",(t=>e.onInput(t))),K(a,"resize",(()=>e.positionDropdown()),c),K(a,"blur",(t=>e.onBlur(t))),K(a,"focus",(t=>e.onFocus(t))),K(i,"paste",(t=>e.onPaste(t)))
const v=t=>{const n=t.composedPath()[0]
if(!o.contains(n)&&!s.contains(n))return e.isFocused&&e.blur(),void e.inputState()
n==i&&e.isOpen?t.stopPropagation():B(t,!0)},f=()=>{e.isOpen&&e.positionDropdown()},O=()=>{e.ignoreHover=!1}
K(document,"mousedown",v),K(window,"scroll",f,c),K(window,"resize",f,c),K(window,"mousemove",O,c),this._destroy=()=>{document.removeEventListener("mousedown",v),window.removeEventListener("mousemove",O),window.removeEventListener("scroll",f),window.removeEventListener("resize",f),h&&h.removeEventListener("click",g)},this.revertSettings={innerHTML:l.innerHTML,tabIndex:l.tabIndex},l.tabIndex=-1,l.insertAdjacentElement("afterend",e.wrapper),e.sync(!1),t.items=[],delete t.optgroups,delete t.options,K(l,"invalid",(t=>{e.isValid&&(e.isValid=!1,e.isInvalid=!0,e.refreshState())})),e.updateOriginalInput(),e.refreshItems(),e.close(!1),e.inputState(),e.isSetup=!0,l.disabled?e.disable():e.enable(),e.on("change",this.onChange),A(l,"tomselected","ts-hidden-accessible"),e.trigger("initialize"),!0===t.preload&&e.preload()}setupOptions(e=[],t=[]){this.addOptions(e),y(t,(e=>{this.registerOptionGroup(e)}))}setupTemplates(){var e=this,t=e.settings.labelField,i=e.settings.optgroupLabelField,s={optgroup:e=>{let t=document.createElement("div")
return t.className="optgroup",t.appendChild(e.options),t},optgroup_header:(e,t)=>'<div class="optgroup-header">'+t(e[i])+"</div>",option:(e,i)=>"<div>"+i(e[t])+"</div>",item:(e,i)=>"<div>"+i(e[t])+"</div>",option_create:(e,t)=>'<div class="create">Add <strong>'+t(e.input)+"</strong>&hellip;</div>",no_results:()=>'<div class="no-results">No results found</div>',loading:()=>'<div class="spinner"></div>',not_loading:()=>{},dropdown:()=>"<div></div>"}
e.settings.render=Object.assign({},s,e.settings.render)}setupCallbacks(){var e,t,i={initialize:"onInitialize",change:"onChange",item_add:"onItemAdd",item_remove:"onItemRemove",item_select:"onItemSelect",clear:"onClear",option_add:"onOptionAdd",option_remove:"onOptionRemove",option_clear:"onOptionClear",optgroup_add:"onOptionGroupAdd",optgroup_remove:"onOptionGroupRemove",optgroup_clear:"onOptionGroupClear",dropdown_open:"onDropdownOpen",dropdown_close:"onDropdownClose",type:"onType",load:"onLoad",focus:"onFocus",blur:"onBlur"}
for(e in i)(t=this.settings[i[e]])&&this.on(e,t)}sync(e=!0){const t=this,i=e?J(t.input,{delimiter:t.settings.delimiter}):t.settings
t.setupOptions(i.options,i.optgroups),t.setValue(i.items||[],!0),t.lastQuery=null}onClick(){var e=this
if(e.activeItems.length>0)return e.clearActiveItems(),void e.focus()
e.isFocused&&e.isOpen?e.blur():e.focus()}onMouseDown(){}onChange(){C(this.input,"input"),C(this.input,"change")}onPaste(e){var t=this
t.isInputHidden||t.isLocked?B(e):t.settings.splitOn&&setTimeout((()=>{var e=t.inputValue()
if(e.match(t.settings.splitOn)){var i=e.trim().split(t.settings.splitOn)
y(i,(e=>{e=N(e),this.options[e]?t.addItem(e):t.createItem(e)}))}}),0)}onKeyPress(e){var t=this
if(!t.isLocked){var i=String.fromCharCode(e.keyCode||e.which)
return t.settings.create&&"multi"===t.settings.mode&&i===t.settings.delimiter?(t.createItem(),void B(e)):void 0}B(e)}onKeyDown(e){var t=this
if(t.ignoreHover=!0,t.isLocked)9!==e.keyCode&&B(e)
else{switch(e.keyCode){case 65:if(Q(q,e)&&""==t.control_input.value)return B(e),void t.selectAll()
break
case 27:return t.isOpen&&(B(e,!0),t.close()),void t.clearActiveItems()
case 40:if(!t.isOpen&&t.hasOptions)t.open()
else if(t.activeOption){let e=t.getAdjacent(t.activeOption,1)
e&&t.setActiveOption(e)}return void B(e)
case 38:if(t.activeOption){let e=t.getAdjacent(t.activeOption,-1)
e&&t.setActiveOption(e)}return void B(e)
case 13:return void(t.canSelect(t.activeOption)?(t.onOptionSelect(e,t.activeOption),B(e)):(t.settings.create&&t.createItem()||document.activeElement==t.control_input&&t.isOpen)&&B(e))
case 37:return void t.advanceSelection(-1,e)
case 39:return void t.advanceSelection(1,e)
case 9:return void(t.settings.selectOnTab&&(t.canSelect(t.activeOption)&&(t.onOptionSelect(e,t.activeOption),B(e)),t.settings.create&&t.createItem()&&B(e)))
case 8:case 46:return void t.deleteSelection(e)}t.isInputHidden&&!Q(q,e)&&B(e)}}onInput(e){var t=this
if(!t.isLocked){var i=t.inputValue()
t.lastValue!==i&&(t.lastValue=i,t.settings.shouldLoad.call(t,i)&&t.load(i),t.refreshOptions(),t.trigger("type",i))}}onOptionHover(e,t){this.ignoreHover||this.setActiveOption(t,!1)}onFocus(e){var t=this,i=t.isFocused
if(t.isDisabled)return t.blur(),void B(e)
t.ignoreFocus||(t.isFocused=!0,"focus"===t.settings.preload&&t.preload(),i||t.trigger("focus"),t.activeItems.length||(t.showInput(),t.refreshOptions(!!t.settings.openOnFocus)),t.refreshState())}onBlur(e){if(!1!==document.hasFocus()){var t=this
if(t.isFocused){t.isFocused=!1,t.ignoreFocus=!1
var i=()=>{t.close(),t.setActiveItem(),t.setCaret(t.items.length),t.trigger("blur")}
t.settings.create&&t.settings.createOnBlur?t.createItem(null,!1,i):i()}}}onOptionSelect(e,t){var i,s=this
t.parentElement&&t.parentElement.matches("[data-disabled]")||(t.classList.contains("create")?s.createItem(null,!0,(()=>{s.settings.closeAfterSelect&&s.close()})):void 0!==(i=t.dataset.value)&&(s.lastQuery=null,s.addItem(i),s.settings.closeAfterSelect&&s.close(),!s.settings.hideSelected&&e.type&&/click/.test(e.type)&&s.setActiveOption(t)))}canSelect(e){return!!(this.isOpen&&e&&this.dropdown_content.contains(e))}onItemSelect(e,t){var i=this
return!i.isLocked&&"multi"===i.settings.mode&&(B(e),i.setActiveItem(t,e),!0)}canLoad(e){return!!this.settings.load&&!this.loadedSearches.hasOwnProperty(e)}load(e){const t=this
if(!t.canLoad(e))return
A(t.wrapper,t.settings.loadingClass),t.loading++
const i=t.loadCallback.bind(t)
t.settings.load.call(t,e,i)}loadCallback(e,t){const i=this
i.loading=Math.max(i.loading-1,0),i.lastQuery=null,i.clearActiveOption(),i.setupOptions(e,t),i.refreshOptions(i.isFocused&&!i.isInputHidden),i.loading||x(i.wrapper,i.settings.loadingClass),i.trigger("load",e,t)}preload(){var e=this.wrapper.classList
e.contains("preloaded")||(e.add("preloaded"),this.load(""))}setTextboxValue(e=""){var t=this.control_input
t.value!==e&&(t.value=e,C(t,"update"),this.lastValue=e)}getValue(){return this.is_select_tag&&this.input.hasAttribute("multiple")?this.items:this.items.join(this.settings.delimiter)}setValue(e,t){M(this,t?[]:["change"],(()=>{this.clear(t),this.addItems(e,t)}))}setMaxItems(e){0===e&&(e=null),this.settings.maxItems=e,this.refreshState()}setActiveItem(e,t){var i,s,n,o,r,l,a=this
if("single"!==a.settings.mode){if(!e)return a.clearActiveItems(),void(a.isFocused&&a.showInput())
if("click"===(i=t&&t.type.toLowerCase())&&Q("shiftKey",t)&&a.activeItems.length){for(l=a.getLastActive(),(n=Array.prototype.indexOf.call(a.control.children,l))>(o=Array.prototype.indexOf.call(a.control.children,e))&&(r=n,n=o,o=r),s=n;s<=o;s++)e=a.control.children[s],-1===a.activeItems.indexOf(e)&&a.setActiveItemClass(e)
B(t)}else"click"===i&&Q(q,t)||"keydown"===i&&Q("shiftKey",t)?e.classList.contains("active")?a.removeActiveItem(e):a.setActiveItemClass(e):(a.clearActiveItems(),a.setActiveItemClass(e))
a.hideInput(),a.isFocused||a.focus()}}setActiveItemClass(e){const t=this,i=t.control.querySelector(".last-active")
i&&x(i,"last-active"),A(e,"active last-active"),t.trigger("item_select",e),-1==t.activeItems.indexOf(e)&&t.activeItems.push(e)}removeActiveItem(e){var t=this.activeItems.indexOf(e)
this.activeItems.splice(t,1),x(e,"active")}clearActiveItems(){x(this.activeItems,"active"),this.activeItems=[]}setActiveOption(e,t=!0){e!==this.activeOption&&(this.clearActiveOption(),e&&(this.activeOption=e,T(this.focus_node,{"aria-activedescendant":e.getAttribute("id")}),T(e,{"aria-selected":"true"}),A(e,"active"),t&&this.scrollToOption(e)))}scrollToOption(e,t){if(!e)return
const i=this.dropdown_content,s=i.clientHeight,n=i.scrollTop||0,o=e.offsetHeight,r=e.getBoundingClientRect().top-i.getBoundingClientRect().top+n
r+o>s+n?this.scroll(r-s+o,t):r<n&&this.scroll(r,t)}scroll(e,t){const i=this.dropdown_content
t&&(i.style.scrollBehavior=t),i.scrollTop=e,i.style.scrollBehavior=""}clearActiveOption(){this.activeOption&&(x(this.activeOption,"active"),T(this.activeOption,{"aria-selected":null})),this.activeOption=null,T(this.focus_node,{"aria-activedescendant":null})}selectAll(){const e=this
if("single"===e.settings.mode)return
const t=e.controlChildren()
t.length&&(e.hideInput(),e.close(),e.activeItems=t,y(t,(t=>{e.setActiveItemClass(t)})))}inputState(){var e=this
e.control.contains(e.control_input)&&(T(e.control_input,{placeholder:e.settings.placeholder}),e.activeItems.length>0||!e.isFocused&&e.settings.hidePlaceholder&&e.items.length>0?(e.setTextboxValue(),e.isInputHidden=!0):(e.settings.hidePlaceholder&&e.items.length>0&&T(e.control_input,{placeholder:""}),e.isInputHidden=!1),e.wrapper.classList.toggle("input-hidden",e.isInputHidden))}hideInput(){this.inputState()}showInput(){this.inputState()}inputValue(){return this.control_input.value.trim()}focus(){var e=this
e.isDisabled||(e.ignoreFocus=!0,e.control_input.offsetWidth?e.control_input.focus():e.focus_node.focus(),setTimeout((()=>{e.ignoreFocus=!1,e.onFocus()}),0))}blur(){this.focus_node.blur(),this.onBlur()}getScoreFunction(e){return this.sifter.getScoreFunction(e,this.getSearchOptions())}getSearchOptions(){var e=this.settings,t=e.sortField
return"string"==typeof e.sortField&&(t=[{field:e.sortField}]),{fields:e.searchField,conjunction:e.searchConjunction,sort:t,nesting:e.nesting}}search(e){var t,i,s,n=this,o=this.getSearchOptions()
if(n.settings.score&&"function"!=typeof(s=n.settings.score.call(n,e)))throw new Error('Tom Select "score" setting must be a function that returns a function')
if(e!==n.lastQuery?(n.lastQuery=e,i=n.sifter.search(e,Object.assign(o,{score:s})),n.currentResults=i):i=Object.assign({},n.currentResults),n.settings.hideSelected)for(t=i.items.length-1;t>=0;t--){let e=N(i.items[t].id)
e&&-1!==n.items.indexOf(e)&&i.items.splice(t,1)}return i}refreshOptions(e=!0){var t,i,s,n,o,r,l,a,c,d,p
const u={},h=[]
var g,v=this,f=v.inputValue(),m=v.search(f),O=null,b=v.settings.shouldOpen||!1,w=v.dropdown_content
for(v.activeOption&&(c=v.activeOption.dataset.value,d=v.activeOption.closest("[data-group]")),n=m.items.length,"number"==typeof v.settings.maxOptions&&(n=Math.min(n,v.settings.maxOptions)),n>0&&(b=!0),t=0;t<n;t++){let e=m.items[t].id,n=v.options[e],l=v.getOption(e,!0)
for(v.settings.hideSelected||l.classList.toggle("selected",v.items.includes(e)),o=n[v.settings.optgroupField]||"",i=0,s=(r=Array.isArray(o)?o:[o])&&r.length;i<s;i++)o=r[i],v.optgroups.hasOwnProperty(o)||(o=""),u.hasOwnProperty(o)||(u[o]=document.createDocumentFragment(),h.push(o)),i>0&&(l=l.cloneNode(!0),T(l,{id:n.$id+"-clone-"+i,"aria-selected":null}),l.classList.add("ts-cloned"),x(l,"active")),O||c!=e||(d?d.dataset.group===o&&(O=l):O=l),u[o].appendChild(l)}this.settings.lockOptgroupOrder&&h.sort(((e,t)=>(v.optgroups[e]&&v.optgroups[e].$order||0)-(v.optgroups[t]&&v.optgroups[t].$order||0))),l=document.createDocumentFragment(),y(h,(e=>{if(v.optgroups.hasOwnProperty(e)&&u[e].children.length){let t=document.createDocumentFragment(),i=v.render("optgroup_header",v.optgroups[e])
W(t,i),W(t,u[e])
let s=v.render("optgroup",{group:v.optgroups[e],options:t})
W(l,s)}else W(l,u[e])})),w.innerHTML="",W(w,l),v.settings.highlight&&(g=w.querySelectorAll("span.highlight"),Array.prototype.forEach.call(g,(function(e){var t=e.parentNode
t.replaceChild(e.firstChild,e),t.normalize()})),m.query.length&&m.tokens.length&&y(m.tokens,(e=>{V(w,e.regex)})))
var _=e=>{let t=v.render(e,{input:f})
return t&&(b=!0,w.insertBefore(t,w.firstChild)),t}
if(v.loading?_("loading"):v.settings.shouldLoad.call(v,f)?0===m.items.length&&_("no_results"):_("not_loading"),(a=v.canCreate(f))&&(p=_("option_create")),v.hasOptions=m.items.length>0||a,b){if(m.items.length>0){if(!O&&"single"===v.settings.mode&&v.items.length&&(O=v.getOption(v.items[0])),!w.contains(O)){let e=0
p&&!v.settings.addPrecedence&&(e=1),O=v.selectable()[e]}}else p&&(O=p)
e&&!v.isOpen&&(v.open(),v.scrollToOption(O,"auto")),v.setActiveOption(O)}else v.clearActiveOption(),e&&v.isOpen&&v.close(!1)}selectable(){return this.dropdown_content.querySelectorAll("[data-selectable]")}addOption(e,t=!1){const i=this
if(Array.isArray(e))return i.addOptions(e,t),!1
const s=N(e[i.settings.valueField])
return null!==s&&!i.options.hasOwnProperty(s)&&(e.$order=e.$order||++i.order,e.$id=i.inputId+"-opt-"+e.$order,i.options[s]=e,i.lastQuery=null,t&&(i.userOptions[s]=t,i.trigger("option_add",s,e)),s)}addOptions(e,t=!1){y(e,(e=>{this.addOption(e,t)}))}registerOption(e){return this.addOption(e)}registerOptionGroup(e){var t=N(e[this.settings.optgroupValueField])
return null!==t&&(e.$order=e.$order||++this.order,this.optgroups[t]=e,t)}addOptionGroup(e,t){var i
t[this.settings.optgroupValueField]=e,(i=this.registerOptionGroup(t))&&this.trigger("optgroup_add",i,t)}removeOptionGroup(e){this.optgroups.hasOwnProperty(e)&&(delete this.optgroups[e],this.clearCache(),this.trigger("optgroup_remove",e))}clearOptionGroups(){this.optgroups={},this.clearCache(),this.trigger("optgroup_clear")}updateOption(e,t){const i=this
var s,n
const o=N(e),r=N(t[i.settings.valueField])
if(null===o)return
if(!i.options.hasOwnProperty(o))return
if("string"!=typeof r)throw new Error("Value must be set in option data")
const l=i.getOption(o),a=i.getItem(o)
if(t.$order=t.$order||i.options[o].$order,delete i.options[o],i.uncacheValue(r),i.options[r]=t,l){if(i.dropdown_content.contains(l)){const e=i._render("option",t)
j(l,e),i.activeOption===l&&i.setActiveOption(e)}l.remove()}a&&(-1!==(n=i.items.indexOf(o))&&i.items.splice(n,1,r),s=i._render("item",t),a.classList.contains("active")&&A(s,"active"),j(a,s)),i.lastQuery=null}removeOption(e,t){const i=this
e=H(e),i.uncacheValue(e),delete i.userOptions[e],delete i.options[e],i.lastQuery=null,i.trigger("option_remove",e),i.removeItem(e,t)}clearOptions(e){const t=(e||this.clearFilter).bind(this)
this.loadedSearches={},this.userOptions={},this.clearCache()
const i={}
y(this.options,((e,s)=>{t(e,s)&&(i[s]=this.options[s])})),this.options=this.sifter.items=i,this.lastQuery=null,this.trigger("option_clear")}clearFilter(e,t){return this.items.indexOf(t)>=0}getOption(e,t=!1){const i=N(e)
if(null!==i&&this.options.hasOwnProperty(i)){const e=this.options[i]
if(e.$div)return e.$div
if(t)return this._render("option",e)}return null}getAdjacent(e,t,i="option"){var s
if(!e)return null
s="item"==i?this.controlChildren():this.dropdown_content.querySelectorAll("[data-selectable]")
for(let i=0;i<s.length;i++)if(s[i]==e)return t>0?s[i+1]:s[i-1]
return null}getItem(e){if("object"==typeof e)return e
var t=N(e)
return null!==t?this.control.querySelector(`[data-value="${U(t)}"]`):null}addItems(e,t){var i=this,s=Array.isArray(e)?e:[e]
for(let e=0,n=(s=s.filter((e=>-1===i.items.indexOf(e)))).length;e<n;e++)i.isPending=e<n-1,i.addItem(s[e],t)}addItem(e,t){M(this,t?[]:["change","dropdown_close"],(()=>{var i,s
const n=this,o=n.settings.mode,r=N(e)
if((!r||-1===n.items.indexOf(r)||("single"===o&&n.close(),"single"!==o&&n.settings.duplicates))&&null!==r&&n.options.hasOwnProperty(r)&&("single"===o&&n.clear(t),"multi"!==o||!n.isFull())){if(i=n._render("item",n.options[r]),n.control.contains(i)&&(i=i.cloneNode(!0)),s=n.isFull(),n.items.splice(n.caretPos,0,r),n.insertAtCaret(i),n.isSetup){if(!n.isPending&&n.settings.hideSelected){let e=n.getOption(r),t=n.getAdjacent(e,1)
t&&n.setActiveOption(t)}n.isPending||n.settings.closeAfterSelect||n.refreshOptions(n.isFocused&&"single"!==o),0!=n.settings.closeAfterSelect&&n.isFull()?n.close():n.isPending||n.positionDropdown(),n.trigger("item_add",r,i),n.isPending||n.updateOriginalInput({silent:t})}(!n.isPending||!s&&n.isFull())&&(n.inputState(),n.refreshState())}}))}removeItem(e=null,t){const i=this
if(!(e=i.getItem(e)))return
var s,n
const o=e.dataset.value
s=P(e),e.remove(),e.classList.contains("active")&&(n=i.activeItems.indexOf(e),i.activeItems.splice(n,1),x(e,"active")),i.items.splice(s,1),i.lastQuery=null,!i.settings.persist&&i.userOptions.hasOwnProperty(o)&&i.removeOption(o,t),s<i.caretPos&&i.setCaret(i.caretPos-1),i.updateOriginalInput({silent:t}),i.refreshState(),i.positionDropdown(),i.trigger("item_remove",o,e)}createItem(e=null,t=!0,i=(()=>{})){var s,n=this,o=n.caretPos
if(e=e||n.inputValue(),!n.canCreate(e))return i(),!1
n.lock()
var r=!1,l=e=>{if(n.unlock(),!e||"object"!=typeof e)return i()
var t=N(e[n.settings.valueField])
if("string"!=typeof t)return i()
n.setTextboxValue(),n.addOption(e,!0),n.setCaret(o),n.addItem(t),i(e),r=!0}
return s="function"==typeof n.settings.create?n.settings.create.call(this,e,l):{[n.settings.labelField]:e,[n.settings.valueField]:e},r||l(s),!0}refreshItems(){var e=this
e.lastQuery=null,e.isSetup&&e.addItems(e.items),e.updateOriginalInput(),e.refreshState()}refreshState(){const e=this
e.refreshValidityState()
const t=e.isFull(),i=e.isLocked
e.wrapper.classList.toggle("rtl",e.rtl)
const s=e.wrapper.classList
var n
s.toggle("focus",e.isFocused),s.toggle("disabled",e.isDisabled),s.toggle("required",e.isRequired),s.toggle("invalid",!e.isValid),s.toggle("locked",i),s.toggle("full",t),s.toggle("input-active",e.isFocused&&!e.isInputHidden),s.toggle("dropdown-active",e.isOpen),s.toggle("has-options",(n=e.options,0===Object.keys(n).length)),s.toggle("has-items",e.items.length>0)}refreshValidityState(){var e=this
e.input.validity&&(e.isValid=e.input.validity.valid,e.isInvalid=!e.isValid)}isFull(){return null!==this.settings.maxItems&&this.items.length>=this.settings.maxItems}updateOriginalInput(e={}){const t=this
var i,s
const n=t.input.querySelector('option[value=""]')
if(t.is_select_tag){const e=[],r=t.input.querySelectorAll("option:checked").length
function o(i,s,o){return i||(i=_('<option value="'+R(s)+'">'+R(o)+"</option>")),i!=n&&t.input.append(i),e.push(i),(i!=n||r>0)&&(i.selected=!0),i}t.input.querySelectorAll("option:checked").forEach((e=>{e.selected=!1})),0==t.items.length&&"single"==t.settings.mode?o(n,"",""):t.items.forEach((n=>{if(i=t.options[n],s=i[t.settings.labelField]||"",e.includes(i.$option)){o(t.input.querySelector(`option[value="${U(n)}"]:not(:checked)`),n,s)}else i.$option=o(i.$option,n,s)}))}else t.input.value=t.getValue()
t.isSetup&&(e.silent||t.trigger("change",t.getValue()))}open(){var e=this
e.isLocked||e.isOpen||"multi"===e.settings.mode&&e.isFull()||(e.isOpen=!0,T(e.focus_node,{"aria-expanded":"true"}),e.refreshState(),S(e.dropdown,{visibility:"hidden",display:"block"}),e.positionDropdown(),S(e.dropdown,{visibility:"visible",display:"block"}),e.focus(),e.trigger("dropdown_open",e.dropdown))}close(e=!0){var t=this,i=t.isOpen
e&&(t.setTextboxValue(),"single"===t.settings.mode&&t.items.length&&t.hideInput()),t.isOpen=!1,T(t.focus_node,{"aria-expanded":"false"}),S(t.dropdown,{display:"none"}),t.settings.hideSelected&&t.clearActiveOption(),t.refreshState(),i&&t.trigger("dropdown_close",t.dropdown)}positionDropdown(){if("body"===this.settings.dropdownParent){var e=this.control,t=e.getBoundingClientRect(),i=e.offsetHeight+t.top+window.scrollY,s=t.left+window.scrollX
S(this.dropdown,{width:t.width+"px",top:i+"px",left:s+"px"})}}clear(e){var t=this
if(t.items.length){var i=t.controlChildren()
y(i,(e=>{t.removeItem(e,!0)})),t.showInput(),e||t.updateOriginalInput(),t.trigger("clear")}}insertAtCaret(e){const t=this,i=t.caretPos,s=t.control
s.insertBefore(e,s.children[i]),t.setCaret(i+1)}deleteSelection(e){var t,i,s,n,o,r=this
t=e&&8===e.keyCode?-1:1,i={start:(o=r.control_input).selectionStart||0,length:(o.selectionEnd||0)-(o.selectionStart||0)}
const l=[]
if(r.activeItems.length)n=E(r.activeItems,t),s=P(n),t>0&&s++,y(r.activeItems,(e=>l.push(e)))
else if((r.isFocused||"single"===r.settings.mode)&&r.items.length){const e=r.controlChildren()
t<0&&0===i.start&&0===i.length?l.push(e[r.caretPos-1]):t>0&&i.start===r.inputValue().length&&l.push(e[r.caretPos])}if(!r.shouldDelete(l,e))return!1
for(B(e,!0),void 0!==s&&r.setCaret(s);l.length;)r.removeItem(l.pop())
return r.showInput(),r.positionDropdown(),r.refreshOptions(!1),!0}shouldDelete(e,t){const i=e.map((e=>e.dataset.value))
return!(!i.length||"function"==typeof this.settings.onDelete&&!1===this.settings.onDelete(i,t))}advanceSelection(e,t){var i,s,n=this
n.rtl&&(e*=-1),n.inputValue().length||(Q(q,t)||Q("shiftKey",t)?(s=(i=n.getLastActive(e))?i.classList.contains("active")?n.getAdjacent(i,e,"item"):i:e>0?n.control_input.nextElementSibling:n.control_input.previousElementSibling)&&(s.classList.contains("active")&&n.removeActiveItem(i),n.setActiveItemClass(s)):n.moveCaret(e))}moveCaret(e){}getLastActive(e){let t=this.control.querySelector(".last-active")
if(t)return t
var i=this.control.querySelectorAll(".active")
return i?E(i,e):void 0}setCaret(e){this.caretPos=this.items.length}controlChildren(){return Array.from(this.control.querySelectorAll("[data-ts-item]"))}lock(){this.isLocked=!0,this.refreshState()}unlock(){this.isLocked=!1,this.refreshState()}disable(){var e=this
e.input.disabled=!0,e.control_input.disabled=!0,e.focus_node.tabIndex=-1,e.isDisabled=!0,this.close(),e.lock()}enable(){var e=this
e.input.disabled=!1,e.control_input.disabled=!1,e.focus_node.tabIndex=e.tabIndex,e.isDisabled=!1,e.unlock()}destroy(){var e=this,t=e.revertSettings
e.trigger("destroy"),e.off(),e.wrapper.remove(),e.dropdown.remove(),e.input.innerHTML=t.innerHTML,e.input.tabIndex=t.tabIndex,x(e.input,"tomselected","ts-hidden-accessible"),e._destroy(),delete e.input.tomselect}render(e,t){return"function"!=typeof this.settings.render[e]?null:this._render(e,t)}_render(e,t){var i,s,n=""
const o=this
return"option"!==e&&"item"!=e||(n=H(t[o.settings.valueField])),null==(s=o.settings.render[e].call(this,t,R))||(s=_(s),"option"===e||"option_create"===e?t[o.settings.disabledField]?T(s,{"aria-disabled":"true"}):T(s,{"data-selectable":""}):"optgroup"===e&&(i=t.group[o.settings.optgroupValueField],T(s,{"data-group":i}),t.group[o.settings.disabledField]&&T(s,{"data-disabled":""})),"option"!==e&&"item"!==e||(T(s,{"data-value":n}),"item"===e?(A(s,o.settings.itemClass),T(s,{"data-ts-item":""})):(A(s,o.settings.optionClass),T(s,{role:"option",id:t.$id}),o.options[n].$div=s))),s}clearCache(){y(this.options,((e,t)=>{e.$div&&(e.$div.remove(),delete e.$div)}))}uncacheValue(e){const t=this.getOption(e)
t&&t.remove()}canCreate(e){return this.settings.create&&e.length>0&&this.settings.createFilter.call(this,e)}hook(e,t,i){var s=this,n=s[t]
s[t]=function(){var t,o
return"after"===e&&(t=n.apply(s,arguments)),o=i.apply(s,arguments),"instead"===e?o:("before"===e&&(t=n.apply(s,arguments)),t)}}}return Y.define("change_listener",(function(){K(this.input,"change",(()=>{this.sync()}))})),Y.define("checkbox_options",(function(){var e=this,t=e.onOptionSelect
e.settings.hideSelected=!1
var i=function(e){setTimeout((()=>{var t=e.querySelector("input")
t instanceof HTMLInputElement&&(e.classList.contains("selected")?t.checked=!0:t.checked=!1)}),1)}
e.hook("after","setupTemplates",(()=>{var t=e.settings.render.option
e.settings.render.option=(i,s)=>{var n=_(t.call(e,i,s)),o=document.createElement("input")
o.addEventListener("click",(function(e){B(e)})),o.type="checkbox"
const r=N(i[e.settings.valueField])
return r&&e.items.indexOf(r)>-1&&(o.checked=!0),n.prepend(o),n}})),e.on("item_remove",(t=>{var s=e.getOption(t)
s&&(s.classList.remove("selected"),i(s))})),e.on("item_add",(t=>{var s=e.getOption(t)
s&&i(s)})),e.hook("instead","onOptionSelect",((s,n)=>{if(n.classList.contains("selected"))return n.classList.remove("selected"),e.removeItem(n.dataset.value),e.refreshOptions(),void B(s,!0)
t.call(e,s,n),i(n)}))})),Y.define("clear_button",(function(e){const t=this,i=Object.assign({className:"clear-button",title:"Clear All",html:e=>`<div class="${e.className}" title="${e.title}">&times;</div>`},e)
t.on("initialize",(()=>{var e=_(i.html(i))
e.addEventListener("click",(e=>{t.isDisabled||(t.clear(),"single"===t.settings.mode&&t.settings.allowEmptyOption&&t.addItem(""),e.preventDefault(),e.stopPropagation())})),t.control.appendChild(e)}))})),Y.define("drag_drop",(function(){var e=this
if(!$.fn.sortable)throw new Error('The "drag_drop" plugin requires jQuery UI "sortable".')
if("multi"===e.settings.mode){var t=e.lock,i=e.unlock
e.hook("instead","lock",(()=>{var i=$(e.control).data("sortable")
return i&&i.disable(),t.call(e)})),e.hook("instead","unlock",(()=>{var t=$(e.control).data("sortable")
return t&&t.enable(),i.call(e)})),e.on("initialize",(()=>{var t=$(e.control).sortable({items:"[data-value]",forcePlaceholderSize:!0,disabled:e.isLocked,start:(e,i)=>{i.placeholder.css("width",i.helper.css("width")),t.css({overflow:"visible"})},stop:()=>{t.css({overflow:"hidden"})
var i=[]
t.children("[data-value]").each((function(){this.dataset.value&&i.push(this.dataset.value)})),e.setValue(i)}})}))}})),Y.define("dropdown_header",(function(e){const t=this,i=Object.assign({title:"Untitled",headerClass:"dropdown-header",titleRowClass:"dropdown-header-title",labelClass:"dropdown-header-label",closeClass:"dropdown-header-close",html:e=>'<div class="'+e.headerClass+'"><div class="'+e.titleRowClass+'"><span class="'+e.labelClass+'">'+e.title+'</span><a class="'+e.closeClass+'">&times;</a></div></div>'},e)
t.on("initialize",(()=>{var e=_(i.html(i)),s=e.querySelector("."+i.closeClass)
s&&s.addEventListener("click",(e=>{B(e,!0),t.close()})),t.dropdown.insertBefore(e,t.dropdown.firstChild)}))})),Y.define("caret_position",(function(){var e=this
e.hook("instead","setCaret",(t=>{"single"!==e.settings.mode&&e.control.contains(e.control_input)?(t=Math.max(0,Math.min(e.items.length,t)))==e.caretPos||e.isPending||e.controlChildren().forEach(((i,s)=>{s<t?e.control_input.insertAdjacentElement("beforebegin",i):e.control.appendChild(i)})):t=e.items.length,e.caretPos=t})),e.hook("instead","moveCaret",(t=>{if(!e.isFocused)return
const i=e.getLastActive(t)
if(i){const s=P(i)
e.setCaret(t>0?s+1:s),e.setActiveItem(),x(i,"last-active")}else e.setCaret(e.caretPos+t)}))})),Y.define("dropdown_input",(function(){const e=this
e.settings.shouldOpen=!0,e.hook("before","setup",(()=>{e.focus_node=e.control,A(e.control_input,"dropdown-input")
const t=_('<div class="dropdown-input-wrap">')
t.append(e.control_input),e.dropdown.insertBefore(t,e.dropdown.firstChild)
const i=_('<input class="items-placeholder" tabindex="-1" />')
i.placeholder=e.settings.placeholder||"",e.control.append(i)})),e.on("initialize",(()=>{e.control_input.addEventListener("keydown",(t=>{switch(t.keyCode){case 27:return e.isOpen&&(B(t,!0),e.close()),void e.clearActiveItems()
case 9:e.focus_node.tabIndex=-1}return e.onKeyDown.call(e,t)})),e.on("blur",(()=>{e.focus_node.tabIndex=e.isDisabled?-1:e.tabIndex})),e.on("dropdown_open",(()=>{e.control_input.focus()}))
const t=e.onBlur
e.hook("instead","onBlur",(i=>{if(!i||i.relatedTarget!=e.control_input)return t.call(e)})),K(e.control_input,"blur",(()=>e.onBlur())),e.hook("before","close",(()=>{e.isOpen&&e.focus_node.focus({preventScroll:!0})}))}))})),Y.define("input_autogrow",(function(){var e=this
e.on("initialize",(()=>{var t=document.createElement("span"),i=e.control_input
t.style.cssText="position:absolute; top:-99999px; left:-99999px; width:auto; padding:0; white-space:pre; ",e.wrapper.appendChild(t)
for(const e of["letterSpacing","fontSize","fontFamily","fontWeight","textTransform"])t.style[e]=i.style[e]
var s=()=>{t.textContent=i.value,i.style.width=t.clientWidth+"px"}
s(),e.on("update item_add item_remove",s),K(i,"input",s),K(i,"keyup",s),K(i,"blur",s),K(i,"update",s)}))})),Y.define("no_backspace_delete",(function(){var e=this,t=e.deleteSelection
this.hook("instead","deleteSelection",(i=>!!e.activeItems.length&&t.call(e,i)))})),Y.define("no_active_items",(function(){this.hook("instead","setActiveItem",(()=>{})),this.hook("instead","selectAll",(()=>{}))})),Y.define("optgroup_columns",(function(){var e=this,t=e.onKeyDown
e.hook("instead","onKeyDown",(i=>{var s,n,o,r
if(!e.isOpen||37!==i.keyCode&&39!==i.keyCode)return t.call(e,i)
e.ignoreHover=!0,r=L(e.activeOption,"[data-group]"),s=P(e.activeOption,"[data-selectable]"),r&&(r=37===i.keyCode?r.previousSibling:r.nextSibling)&&(n=(o=r.querySelectorAll("[data-selectable]"))[Math.min(o.length-1,s)])&&e.setActiveOption(n)}))})),Y.define("remove_button",(function(e){const t=Object.assign({label:"&times;",title:"Remove",className:"remove",append:!0},e)
var i=this
if(t.append){var s='<a href="javascript:void(0)" class="'+t.className+'" tabindex="-1" title="'+R(t.title)+'">'+t.label+"</a>"
i.hook("after","setupTemplates",(()=>{var e=i.settings.render.item
i.settings.render.item=(t,n)=>{var o=_(e.call(i,t,n)),r=_(s)
return o.appendChild(r),K(r,"mousedown",(e=>{B(e,!0)})),K(r,"click",(e=>{B(e,!0),i.isLocked||i.shouldDelete([o],e)&&(i.removeItem(o),i.refreshOptions(!1),i.inputState())})),o}}))}})),Y.define("restore_on_backspace",(function(e){const t=this,i=Object.assign({text:e=>e[t.settings.labelField]},e)
t.on("item_remove",(function(e){if(t.isFocused&&""===t.control_input.value.trim()){var s=t.options[e]
s&&t.setTextboxValue(i.text.call(t,s))}}))})),Y.define("virtual_scroll",(function(){const e=this,t=e.canLoad,i=e.clearActiveOption,s=e.loadCallback
var n,o,r={},l=!1,a=[]
if(e.settings.shouldLoadMore||(e.settings.shouldLoadMore=()=>{if(n.clientHeight/(n.scrollHeight-n.scrollTop)>.9)return!0
if(e.activeOption){var t=e.selectable()
if([...t].indexOf(e.activeOption)>=t.length-2)return!0}return!1}),!e.settings.firstUrl)throw"virtual_scroll plugin requires a firstUrl() method"
e.settings.sortField=[{field:"$order"},{field:"$score"}]
const c=t=>!("number"==typeof e.settings.maxOptions&&n.children.length>=e.settings.maxOptions)&&!(!(t in r)||!r[t]),d=(t,i)=>e.items.indexOf(i)>=0||a.indexOf(i)>=0
e.setNextUrl=(e,t)=>{r[e]=t},e.getUrl=t=>{if(t in r){const e=r[t]
return r[t]=!1,e}return r={},e.settings.firstUrl.call(e,t)},e.hook("instead","clearActiveOption",(()=>{if(!l)return i.call(e)})),e.hook("instead","canLoad",(i=>i in r?c(i):t.call(e,i))),e.hook("instead","loadCallback",((t,i)=>{l?o&&t.length>0&&(o.dataset.value=t[0][e.settings.valueField]):e.clearOptions(d),s.call(e,t,i),l=!1})),e.hook("after","refreshOptions",(()=>{const t=e.lastValue
var i
c(t)?(i=e.render("loading_more",{query:t}))&&(i.setAttribute("data-selectable",""),o=i):t in r&&!n.querySelector(".no-results")&&(i=e.render("no_more_results",{query:t})),i&&(A(i,e.settings.optionClass),n.append(i))})),e.on("initialize",(()=>{a=Object.keys(e.options),n=e.dropdown_content,e.settings.render=Object.assign({},{loading_more:()=>'<div class="loading-more-results">Loading more results ... </div>',no_more_results:()=>'<div class="no-more-results">No more results</div>'},e.settings.render),n.addEventListener("scroll",(()=>{e.settings.shouldLoadMore.call(e)&&c(e.lastValue)&&(l||(l=!0,e.load.call(e,e.lastValue)))}))}))})),Y}))
var tomSelect=function(e,t){return new TomSelect(e,t)}
