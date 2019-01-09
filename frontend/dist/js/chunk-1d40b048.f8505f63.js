(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1d40b048"],{1759:function(e,t,a){},"185c":function(e,t,a){},2432:function(e,t,a){},2909:function(e,t,a){"use strict";function r(e){if(Array.isArray(e)){for(var t=0,a=new Array(e.length);t<e.length;t++)a[t]=e[t];return a}}function s(e){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e))return Array.from(e)}function o(){throw new TypeError("Invalid attempt to spread non-iterable instance")}function i(e){return r(e)||s(e)||o()}a.d(t,"a",function(){return i})},3802:function(e,t,a){"use strict";var r=a("185c"),s=a.n(r);s.a},"70d7":function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=this,a=t.$createElement,r=t._self._c||a;return r("div",[r("a-card",{staticClass:"card",attrs:{title:"仓库管理",bordered:!1}},[r("repository-form",{ref:"repository",attrs:{showSubmit:!1}})],1),r("a-card",{staticClass:"card",attrs:{title:"任务管理",bordered:!1}},[r("task-form",{ref:"task",attrs:{showSubmit:!1}})],1),r("a-card",[r("form",{attrs:{autoFormCreate:function(t){return e.form=t}}},[r("a-table",{attrs:{columns:t.columns,dataSource:t.data,pagination:!1},scopedSlots:t._u([t._l(["name","workId","department"],function(e,a){return{key:e,fn:function(s,o,i){return[o.editable?r("a-input",{key:e,staticStyle:{margin:"-5px 0"},attrs:{value:s,placeholder:t.columns[a].title},on:{change:function(a){return t.handleChange(a.target.value,o.key,e)}}}):[t._v(t._s(s))]]}}}),{key:"operation",fn:function(e,a,s){return[a.editable?[a.isNew?r("span",[r("a",{on:{click:function(e){t.saveRow(a.key)}}},[t._v("添加")]),r("a-divider",{attrs:{type:"vertical"}}),r("a-popconfirm",{attrs:{title:"是否要删除此行？"},on:{confirm:function(e){t.remove(a.key)}}},[r("a",[t._v("删除")])])],1):r("span",[r("a",{on:{click:function(e){t.saveRow(a.key)}}},[t._v("保存")]),r("a-divider",{attrs:{type:"vertical"}}),r("a",{on:{click:function(e){t.cancel(a.key)}}},[t._v("取消")])],1)]:r("span",[r("a",{on:{click:function(e){t.toggle(a.key)}}},[t._v("编辑")]),r("a-divider",{attrs:{type:"vertical"}}),r("a-popconfirm",{attrs:{title:"是否要删除此行？"},on:{confirm:function(e){t.remove(a.key)}}},[r("a",[t._v("删除")])])],1)]}}])}),r("a-button",{staticStyle:{width:"100%","margin-top":"16px","margin-bottom":"8px"},attrs:{type:"dashed",icon:"plus"},on:{click:t.newMember}},[t._v("新增成员")])],1)]),r("footer-tool-bar",{style:{width:t.isSideMenu()&&t.isDesktop()?"calc(100% - "+(t.sidebarOpened?256:80)+"px)":"100%"}},[r("a-button",{attrs:{type:"primary",loading:t.loading},on:{click:t.validate}},[t._v("提交")])],1)],1)},s=[],o=a("2909"),i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("a-form",{staticClass:"form",attrs:{form:e.form},on:{submit:e.handleSubmit}},[a("a-row",{staticClass:"form-row",attrs:{gutter:16}},[a("a-col",{attrs:{lg:6,md:12,sm:24}},[a("a-form-item",{attrs:{label:"仓库名"}},[a("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["repository.name",{rules:[{required:!0,message:"请输入仓库名称",whitespace:!0}]}],expression:"[\n            'repository.name',\n            {rules: [{ required: true, message: '请输入仓库名称', whitespace: true}]}\n          ]"}],attrs:{placeholder:"请输入仓库名称"}})],1)],1),a("a-col",{attrs:{xl:{span:7,offset:1},lg:{span:8},md:{span:12},sm:24}},[a("a-form-item",{attrs:{label:"仓库域名"}},[a("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["repository.domain",{rules:[{required:!0,message:"请输入仓库域名",whitespace:!0},{validator:e.validate}]}],expression:"[\n            'repository.domain',\n            {rules: [{ required: true, message: '请输入仓库域名', whitespace: true}, {validator: validate}]}\n          ]"}],attrs:{addonBefore:"http://",addonAfter:".com",placeholder:"请输入"}})],1)],1),a("a-col",{attrs:{xl:{span:9,offset:1},lg:{span:10},md:{span:24},sm:24}},[a("a-form-item",{attrs:{label:"仓库管理员"}},[a("a-select",{directives:[{name:"decorator",rawName:"v-decorator",value:["repository.manager",{rules:[{required:!0,message:"请选择管理员"}]}],expression:"[ 'repository.manager', {rules: [{ required: true, message: '请选择管理员'}]} ]"}],attrs:{placeholder:"请选择管理员"}},[a("a-select-option",{attrs:{value:"王同学"}},[e._v("王同学")]),a("a-select-option",{attrs:{value:"李同学"}},[e._v("李同学")]),a("a-select-option",{attrs:{value:"黄同学"}},[e._v("黄同学")])],1)],1)],1)],1),a("a-row",{staticClass:"form-row",attrs:{gutter:16}},[a("a-col",{attrs:{lg:6,md:12,sm:24}},[a("a-form-item",{attrs:{label:"审批人"}},[a("a-select",{directives:[{name:"decorator",rawName:"v-decorator",value:["repository.auditor",{rules:[{required:!0,message:"请选择审批员"}]}],expression:"[ 'repository.auditor', {rules: [{ required: true, message: '请选择审批员'}]} ]"}],attrs:{placeholder:"请选择审批员"}},[a("a-select-option",{attrs:{value:"王晓丽"}},[e._v("王晓丽")]),a("a-select-option",{attrs:{value:"李军"}},[e._v("李军")])],1)],1)],1),a("a-col",{attrs:{xl:{span:7,offset:1},lg:{span:8},md:{span:12},sm:24}},[a("a-form-item",{attrs:{label:"生效日期"}},[a("a-range-picker",{directives:[{name:"decorator",rawName:"v-decorator",value:["repository.effectiveDate",{rules:[{required:!0,message:"请选择生效日期"}]}],expression:"[\n            'repository.effectiveDate',\n            {rules: [{ required: true, message: '请选择生效日期'}]}\n          ]"}],staticStyle:{width:"100%"}})],1)],1),a("a-col",{attrs:{xl:{span:9,offset:1},lg:{span:10},md:{span:24},sm:24}},[a("a-form-item",{attrs:{label:"仓库类型"}},[a("a-select",{directives:[{name:"decorator",rawName:"v-decorator",value:["repository.type",{rules:[{required:!0,message:"请选择仓库类型"}]}],expression:"[\n            'repository.type',\n            {rules: [{ required: true, message: '请选择仓库类型'}]}\n          ]"}],attrs:{placeholder:"请选择仓库类型"}},[a("a-select-option",{attrs:{value:"公开"}},[e._v("公开")]),a("a-select-option",{attrs:{value:"私密"}},[e._v("私密")])],1)],1)],1)],1),e.showSubmit?a("a-form-item",[a("a-button",{attrs:{htmlType:"submit"}},[e._v("Submit")])],1):e._e()],1)},n=[],l=(a("cadf"),a("551c"),a("097d"),{name:"RepositoryForm",props:{showSubmit:{type:Boolean,default:!1}},data:function(){return{form:this.$form.createForm(this)}},methods:{handleSubmit:function(e){var t=this;e.preventDefault(),this.form.validateFields(function(e,a){e||t.$notification["error"]({message:"Received values of form:",description:a})})},validate:function(e,t,a){var r=/^user-(.*)$/;r.test(t)||a("需要以 user- 开头"),a()}}}),c=l,u=(a("7a40"),a("2877")),d=Object(u["a"])(c,i,n,!1,null,"a74860aa",null);d.options.__file="RepositoryForm.vue";var m=d.exports,p=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("a-form",{staticClass:"form",attrs:{form:e.form},on:{submit:e.handleSubmit}},[a("a-row",{staticClass:"form-row",attrs:{gutter:16}},[a("a-col",{attrs:{lg:6,md:12,sm:24}},[a("a-form-item",{attrs:{label:"任务名"}},[a("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["task.name",{rules:[{required:!0,message:"请输入任务名称",whitespace:!0}]}],expression:"[ 'task.name', {rules: [{ required: true, message: '请输入任务名称', whitespace: true}]} ]"}],attrs:{placeholder:"请输入任务名称"}})],1)],1),a("a-col",{attrs:{xl:{span:7,offset:1},lg:{span:8},md:{span:12},sm:24}},[a("a-form-item",{attrs:{label:"任务描述"}},[a("a-input",{directives:[{name:"decorator",rawName:"v-decorator",value:["task.description",{rules:[{required:!0,message:"请输入任务描述",whitespace:!0}]}],expression:"[ 'task.description', {rules: [{ required: true, message: '请输入任务描述', whitespace: true}]} ]"}],attrs:{placeholder:"请输入任务描述"}})],1)],1),a("a-col",{attrs:{xl:{span:9,offset:1},lg:{span:10},md:{span:24},sm:24}},[a("a-form-item",{attrs:{label:"执行人"}},[a("a-select",{directives:[{name:"decorator",rawName:"v-decorator",value:["task.executor",{rules:[{required:!0,message:"请选择执行人"}]}],expression:"[\n            'task.executor',\n            {rules: [{ required: true, message: '请选择执行人'}]}\n          ]"}],attrs:{placeholder:"请选择执行人"}},[a("a-select-option",{attrs:{value:"黄丽丽"}},[e._v("黄丽丽")]),a("a-select-option",{attrs:{value:"李大刀"}},[e._v("李大刀")])],1)],1)],1)],1),a("a-row",{staticClass:"form-row",attrs:{gutter:16}},[a("a-col",{attrs:{lg:6,md:12,sm:24}},[a("a-form-item",{attrs:{label:"责任人"}},[a("a-select",{directives:[{name:"decorator",rawName:"v-decorator",value:["task.manager",{rules:[{required:!0,message:"请选择责任人"}]}],expression:"[\n            'task.manager',\n            {rules: [{ required: true, message: '请选择责任人'}]}\n          ]"}],attrs:{placeholder:"请选择责任人"}},[a("a-select-option",{attrs:{value:"王伟"}},[e._v("王伟")]),a("a-select-option",{attrs:{value:"李红军"}},[e._v("李红军")])],1)],1)],1),a("a-col",{attrs:{xl:{span:7,offset:1},lg:{span:8},md:{span:12},sm:24}},[a("a-form-item",{attrs:{label:"提醒时间"}},[a("a-time-picker",{directives:[{name:"decorator",rawName:"v-decorator",value:["task.time",{rules:[{required:!0,message:"请选择提醒时间"}]}],expression:"[\n            'task.time',\n            {rules: [{ required: true, message: '请选择提醒时间'}]}\n          ]"}],staticStyle:{width:"100%"}})],1)],1),a("a-col",{attrs:{xl:{span:9,offset:1},lg:{span:10},md:{span:24},sm:24}},[a("a-form-item",{attrs:{label:"任务类型"}},[a("a-select",{directives:[{name:"decorator",rawName:"v-decorator",value:["task.type",{rules:[{required:!0,message:"请选择任务类型"}]}],expression:"[ 'task.type', {rules: [{ required: true, message: '请选择任务类型'}]} ]"}],attrs:{placeholder:"请选择任务类型"}},[a("a-select-option",{attrs:{value:"定时执行"}},[e._v("定时执行")]),a("a-select-option",{attrs:{value:"周期执行"}},[e._v("周期执行")])],1)],1)],1)],1),e.showSubmit?a("a-form-item",[a("a-button",{attrs:{htmlType:"submit"}},[e._v("Submit")])],1):e._e()],1)},f=[],v={name:"TaskForm",props:{showSubmit:{type:Boolean,default:!1}},data:function(){return{form:this.$form.createForm(this)}},methods:{handleSubmit:function(e){var t=this;e.preventDefault(),this.form.validateFields(function(e,a){e||t.$notification["error"]({message:"Received values of form:",description:a})})}}},h=v,y=(a("a441"),Object(u["a"])(h,p,f,!1,null,"7fac3af3",null));y.options.__file="TaskForm.vue";var g=y.exports,b=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{class:e.prefixCls},[a("div",{staticStyle:{float:"left"}},[e._t("extra",[e._v(e._s(e.extra))])],2),a("div",{staticStyle:{float:"right"}},[e._t("default")],2)])},w=[],k={name:"FooterToolBar",props:{prefixCls:{type:String,default:"ant-pro-footer-toolbar"},extra:{type:[String,Object],default:""}}},_=k,x=(a("3802"),Object(u["a"])(_,b,w,!1,null,"00f6048a",null));x.options.__file="FooterToolBar.vue";var S=x.exports,q=(a("2432"),S),F=a("ac0d"),N={name:"AdvancedForm",mixins:[F["a"],F["b"]],components:{FooterToolBar:q,RepositoryForm:m,TaskForm:g},data:function(){return{description:"高级表单常见于一次性输入和提交大批量数据的场景。",loading:!1,columns:[{title:"成员姓名",dataIndex:"name",key:"name",width:"20%",scopedSlots:{customRender:"name"}},{title:"工号",dataIndex:"workId",key:"workId",width:"20%",scopedSlots:{customRender:"workId"}},{title:"所属部门",dataIndex:"department",key:"department",width:"40%",scopedSlots:{customRender:"department"}},{title:"操作",key:"action",scopedSlots:{customRender:"operation"}}],data:[{key:"1",name:"小明",workId:"001",editable:!1,department:"行政部"},{key:"2",name:"李莉",workId:"002",editable:!1,department:"IT部"},{key:"3",name:"王小帅",workId:"003",editable:!1,department:"财务部"}]}},methods:{handleSubmit:function(e){e.preventDefault()},newMember:function(){this.data.push({key:"-1",name:"",workId:"",department:"",editable:!0,isNew:!0})},remove:function(e){var t=this.data.filter(function(t){return t.key!==e});this.data=t},saveRow:function(e){var t=this.data.filter(function(t){return t.key===e})[0];t.editable=!1,t.isNew=!1},toggle:function(e){var t=this.data.filter(function(t){return t.key===e})[0];t.editable=!t.editable},getRowByKey:function(e,t){var a=this.data;return(t||a).filter(function(t){return t.key===e})[0]},cancel:function(e){var t=this.data.filter(function(t){return t.key===e})[0];t.editable=!1},handleChange:function(e,t,a){var r=Object(o["a"])(this.data),s=r.filter(function(e){return t===e.key})[0];s&&(s[a]=e,this.data=r)},validate:function(){var e=this;this.$refs.repository.form.validateFields(function(t,a){t||e.$notification["error"]({message:"Received values of form:",description:a})}),this.$refs.task.form.validateFields(function(t,a){t||e.$notification["error"]({message:"Received values of form:",description:a})})}}},R=N,C=(a("9a03"),Object(u["a"])(R,r,s,!1,null,"7b399d06",null));C.options.__file="AdvancedForm.vue";t["default"]=C.exports},"7a40":function(e,t,a){"use strict";var r=a("fb22"),s=a.n(r);s.a},"9a03":function(e,t,a){"use strict";var r=a("1759"),s=a.n(r);s.a},a441:function(e,t,a){"use strict";var r=a("d427"),s=a.n(r);s.a},d427:function(e,t,a){},fb22:function(e,t,a){}}]);
//# sourceMappingURL=chunk-1d40b048.f8505f63.js.map