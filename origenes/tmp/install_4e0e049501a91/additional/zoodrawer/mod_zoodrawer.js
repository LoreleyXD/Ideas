/* Copyright (C) 2007 - 2010 YOOtheme GmbH, YOOtheme License (http://www.yootheme.com/license) */

var YOOdrawer=new Class({initialize:function(b,c,f){this.setOptions({layout:"vertical",itemstyle:"top",shiftSize:50,transition:Fx.Transitions.Expo.easeOut},f);this.wrapper=$(b);this.items=$$(c);this.fx=new Fx.Elements(this.items,{wait:false,duration:600,transition:this.options.transition});if(this.options.layout!="vertical")this.options.itemstyle="left";var d={};this.items.each(function(e,a){d[a]=e.getStyle(this.options.itemstyle).toInt();e.addEvent("mouseenter",this.itemFx.bind(this,[d,e,a]))},this)},
itemFx:function(b,c,f){var d={};c.addClass("active");this.items.each(function(e,a){var g=e.getStyle(this.options.itemstyle).toInt();if(a>=f){if(g!=b[a])d[a]=this.itemStyle(g,b[a])}else if(g!=b[a]-this.options.shiftSize)d[a]=this.itemStyle(g,b[a]-this.options.shiftSize);a!=f&&e.removeClass("active")},this);this.fx.start(d)},itemStyle:function(b,c){return this.options.layout=="vertical"?{top:[b,c]}:{left:[b,c]}}});YOOdrawer.implement(new Options); 
