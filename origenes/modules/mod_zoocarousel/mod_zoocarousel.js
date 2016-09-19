/* Copyright (C) 2007 - 2010 YOOtheme GmbH, YOOtheme License (http://www.yootheme.com/license) */

var YOOcarousel=new Class({initialize:function(a,c){this.setOptions({onRotate:Class.empty,onStop:Class.empty,onAutoPlay:Class.empty,onShowSlide:Class.empty,panelSelector:".panel",slidesSelector:".slide",buttonsSelector:".button",buttonNextSelector:".button-next",buttonPrevSelector:".button-prev",slideInterval:4E3,transitionDuration:700,transitionEffect:"scroll",startIndex:0,buttonOnClass:"selected",buttonOffClass:"off",rotateAction:"none",rotateActionDuration:100,rotateActionEffect:"scroll",autoplay:"on"},
c);this.container=$(a);this.panel=this.container.getElement(this.options.panelSelector);this.slides=this.container.getElements(this.options.slidesSelector);this.buttons=this.container.getElements(this.options.buttonsSelector);this.buttonNext=this.container.getElement(this.options.buttonNextSelector);this.buttonPrev=this.container.getElement(this.options.buttonPrevSelector);this.currentSlide=null;if(this.options.transitionEffect=="crossfade"||this.options.rotateActionEffect=="crossfade"){this.fxCrossfade=
[];this.slides.each(function(d,e){this.fxCrossfade[e]=new Fx.Style(d,"opacity");e!=this.options.startIndex&&d.setStyle("opacity",0)},this);this.options.transitionEffect="crossfade";this.options.rotateActionEffect="crossfade"}else{this.fxScroll=new Fx.Scroll(this.panel,{wait:false});this.fxFade=new Fx.Style(this.panel,"opacity",{wait:false})}this.setupButtons();this.showSlide(this.options.startIndex,1);if(this.options.autoplay=="on"||this.options.autoplay=="once")this.autoplay()},setupButtons:function(){if(this.options.rotateAction!=
"none"){var a=null;this.buttons.each(function(c,d){$(c).addEvent(this.options.rotateAction,function(){if(this.options.rotateActionEffect=="scroll")this.showSlide(d,this.options.rotateActionDuration,this.options.rotateActionEffect);else{$clear(a);a=this.showSlide.delay(this.options.rotateActionDuration,this,[d,this.options.rotateActionDuration,this.options.rotateActionEffect])}this.stop()}.bind(this))},this)}if(this.buttonNext&&this.buttonPrev){this.buttonNext.addEvent("click",function(){next=this.currentSlide+
1>=this.slides.length?0:this.currentSlide+1;this.showSlide(next,this.options.rotateActionDuration,this.options.rotateActionEffect);this.stop()}.bind(this));this.buttonPrev.addEvent("click",function(){next=this.currentSlide-1<0?this.slides.length-1:this.currentSlide-1;this.showSlide(next,this.options.rotateActionDuration,this.options.rotateActionEffect);this.stop()}.bind(this))}},showSlide:function(a,c,d){if(a!=this.currentSlide){this.slides.each(function(e,b){var f=$(this.buttons[b]);if(b==a&&b!=
this.currentSlide)f&&f.removeClass(this.options.buttonOffClass).addClass(this.options.buttonOnClass);else f&&f.removeClass(this.options.buttonOnClass).addClass(this.options.buttonOffClass)},this);switch(d){case "fade":this.fxFade.setOptions({duration:c});this.fxFade.start(1,0.01).chain(function(){this.fxScroll.setOptions({duration:1});this.fxScroll.toElement(this.slides[a]);this.fxFade.start(0.01,1)}.bind(this));break;case "crossfade":this.slides.each(function(e,b){this.fxCrossfade[b].setOptions({duration:c});
if(b==a)this.fxCrossfade[b].start(1);else e.getStyle("opacity")>0&&this.fxCrossfade[b].start(0)},this);break;case "scroll":this.fxScroll.setOptions({duration:c});this.fxScroll.toElement(this.slides[a])}this.currentSlide=a;this.fireEvent("onShowSlide",a)}},rotate:function(){next=this.currentSlide+1>=this.slides.length?0:this.currentSlide+1;if(this.options.autoplay=="once"&&next==0)this.stop();else{this.showSlide(next,this.options.transitionDuration,this.options.transitionEffect);this.fireEvent("onRotate")}},
autoplay:function(){this.slideshowInt=this.rotate.periodical(this.options.slideInterval,this);this.fireEvent("onAutoPlay")},stop:function(){clearInterval(this.slideshowInt);this.fireEvent("onStop")}});YOOcarousel.implement(new Options);YOOcarousel.implement(new Events); 
