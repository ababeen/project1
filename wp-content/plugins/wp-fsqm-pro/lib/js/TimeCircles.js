/**
 * Basic structure: TC_Class is the public class that is returned upon being called
 *
 * So, if you do
 *      var tc = $(".timer").TimeCircles();
 *
 * tc will contain an instance of the public TimeCircles class. It is important to
 * note that TimeCircles is not chained in the conventional way, check the
 * documentation for more info on how TimeCircles can be chained.
 *
 * After being called/created, the public TimerCircles class will then- for each element
 * within it's collection, either fetch or create an instance of the private class.
 * Each function called upon the public class will be forwarded to each instance
 * of the private classes within the relevant element collection
 **/
!function(a){function j(a){var b=/^#?([a-f\d])([a-f\d])([a-f\d])$/i;a=a.replace(b,function(a,b,c,d){return b+b+c+c+d+d});var c=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(a);return c?{r:parseInt(c[1],16),g:parseInt(c[2],16),b:parseInt(c[3],16)}:null}function k(){var a=document.createElement("canvas");return!(!a.getContext||!a.getContext("2d"))}function l(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1)}function m(){return l()+l()+"-"+l()+"-"+l()+"-"+l()+"-"+l()+l()+l()}function n(a){var b=a.match(/^[0-9]{4}-[0-9]{2}-[0-9]{2}\s[0-9]{1,2}:[0-9]{2}:[0-9]{2}$/);if(null!==b&&b.length>0){var c=a.split(" "),d=c[0].split("-"),e=c[1].split(":");return new Date(d[0],d[1]-1,d[2],e[0],e[1],e[2])}var f=Date.parse(a);return isNaN(f)?(f=Date.parse(a.replace(/-/g,"/").replace("T"," ")),isNaN(f)?new Date:f):f}function o(a,b,c,d,e){for(var n,o,p,q,f={},g={},h={},j={},k={},l={},m=null,r=0;r<d.length;r++)n=d[r],o=null===m?c/i[n]:i[m]/i[n],p=a/i[n],q=b/i[n],e&&(p=p>0?Math.floor(p):Math.ceil(p),q=q>0?Math.floor(q):Math.ceil(q)),"Days"!==n&&(p%=o,q%=o),f[n]=p,h[n]=Math.abs(p),g[n]=q,l[n]=Math.abs(q),j[n]=Math.abs(p)/o,k[n]=Math.abs(q)/o,m=n;return{raw_time:f,raw_old_time:g,time:h,old_time:l,pct:j,old_pct:k}}function q(){"undefined"!=typeof b.TC_Instance_List?p=b.TC_Instance_List:b.TC_Instance_List=p,r(b)}function r(a){for(var b=["webkit","moz"],c=0;c<b.length&&!a.requestAnimationFrame;++c)a.requestAnimationFrame=a[b[c]+"RequestAnimationFrame"],a.cancelAnimationFrame=a[b[c]+"CancelAnimationFrame"];a.requestAnimationFrame&&a.cancelAnimationFrame||(a.requestAnimationFrame=function(b,c,d){"undefined"==typeof d&&(d={data:{last_frame:0}});var e=(new Date).getTime(),f=Math.max(0,16-(e-d.data.last_frame)),g=a.setTimeout(function(){b(e+f)},f);return d.data.last_frame=e+f,g},a.cancelAnimationFrame=function(a){clearTimeout(a)})}var b=window;Object.keys||(Object.keys=function(){"use strict";var a=Object.prototype.hasOwnProperty,b=!{toString:null}.propertyIsEnumerable("toString"),c=["toString","toLocaleString","valueOf","hasOwnProperty","isPrototypeOf","propertyIsEnumerable","constructor"],d=c.length;return function(e){if("object"!=typeof e&&("function"!=typeof e||null===e))throw new TypeError("Object.keys called on non-object");var g,h,f=[];for(g in e)a.call(e,g)&&f.push(g);if(b)for(h=0;d>h;h++)a.call(e,c[h])&&f.push(c[h]);return f}}());var c=!1,d=200,g=("#debug"===location.hash,["Days","Hours","Minutes","Seconds"]),h={Seconds:"Minutes",Minutes:"Hours",Hours:"Days",Days:"Years"},i={Seconds:1,Minutes:60,Hours:3600,Days:86400,Months:2678400,Years:31536e3};Array.prototype.indexOf||(Array.prototype.indexOf=function(a){var b=this.length>>>0,c=Number(arguments[1])||0;for(c=0>c?Math.ceil(c):Math.floor(c),0>c&&(c+=b);b>c;c++)if(c in this&&this[c]===a)return c;return-1});var p={},s=function(a,b){this.element=a,this.container,this.listeners=null,this.data={paused:!1,last_frame:0,animation_frame:null,interval_fallback:null,timer:!1,total_duration:null,prev_time:null,drawn_units:[],text_elements:{Days:null,Hours:null,Minutes:null,Seconds:null},attributes:{canvas:null,context:null,item_size:null,line_width:null,radius:null,outer_radius:null},state:{fading:{Days:!1,Hours:!1,Minutes:!1,Seconds:!1}}},this.config=null,this.setOptions(b),this.initialize()};s.prototype.clearListeners=function(){this.listeners={all:[],visible:[]}},s.prototype.addTime=function(a){if(this.data.attributes.ref_date instanceof Date){var b=this.data.attributes.ref_date;b.setSeconds(b.getSeconds()+a)}else isNaN(this.data.attributes.ref_date)||(this.data.attributes.ref_date+=1e3*a)},s.prototype.initialize=function(d){this.data.drawn_units=[];for(var e,f=0;f<Object.keys(this.config.time).length;f++)e=Object.keys(this.config.time)[f],this.config.time[e].show&&this.data.drawn_units.push(e);a(this.element).children("div.time_circles").remove(),"undefined"==typeof d&&(d=!0),(d||null===this.listeners)&&this.clearListeners(),this.container=a("<div>"),this.container.addClass("time_circles"),this.container.appendTo(this.element);var g=this.element.offsetHeight,h=this.element.offsetWidth;0===g&&(g=a(this.element).height()),0===h&&(h=a(this.element).width()),0===g&&h>0?g=h/this.data.drawn_units.length:0===h&&g>0&&(h=g*this.data.drawn_units.length);var i=document.createElement("canvas");i.width=h,i.height=g,this.data.attributes.canvas=a(i),this.data.attributes.canvas.appendTo(this.container);var j=k();j||"undefined"==typeof G_vmlCanvasManager||(G_vmlCanvasManager.initElement(i),c=!0,j=!0),j&&(this.data.attributes.context=i.getContext("2d")),this.data.attributes.item_size=Math.min(h/this.data.drawn_units.length,g),this.data.attributes.line_width=this.data.attributes.item_size*this.config.fg_width,this.data.attributes.radius=(.8*this.data.attributes.item_size-this.data.attributes.line_width)/2,this.data.attributes.outer_radius=this.data.attributes.radius+.5*Math.max(this.data.attributes.line_width,this.data.attributes.line_width*this.config.bg_width);var l,m,n,f=0;for(var o in this.data.text_elements)this.config.time[o].show&&(l=a("<div>"),l.addClass("textDiv_"+o),l.css("top",Math.round(.35*this.data.attributes.item_size)),l.css("left",Math.round(f++*this.data.attributes.item_size)),l.css("width",this.data.attributes.item_size),l.appendTo(this.container),m=a("<h4>"),m.text(this.config.time[o].text),m.css("font-size",Math.round(this.config.text_size*this.data.attributes.item_size)),m.css("line-height",Math.round(this.config.text_size*this.data.attributes.item_size)+"px"),m.appendTo(l),n=a("<span>"),n.css("font-size",Math.round(3*this.config.text_size*this.data.attributes.item_size)),n.css("line-height",Math.round(this.config.text_size*this.data.attributes.item_size)+"px"),n.appendTo(l),this.data.text_elements[o]=n);this.start(),this.config.start||(this.data.paused=!0);var p=this;this.data.interval_fallback=b.setInterval(function(){p.update.call(p,!0)},100)},s.prototype.update=function(a){if("undefined"==typeof a)a=!1;else if(a&&this.data.paused)return;c&&this.data.attributes.context.clearRect(0,0,this.data.attributes.canvas[0].width,this.data.attributes.canvas[0].hright);var e,f,h=this.data.prev_time,j=new Date;if(this.data.prev_time=j,null===h&&(h=j),!this.config.count_past_zero&&j>this.data.attributes.ref_date){for(var k,l,m,n,p=0;p<this.data.drawn_units.length;p++)k=this.data.drawn_units[p],this.data.text_elements[k].text("0"),l=p*this.data.attributes.item_size+this.data.attributes.item_size/2,m=this.data.attributes.item_size/2,n=this.config.time[k].color,this.drawArc(l,m,n,0);return void this.stop()}e=(this.data.attributes.ref_date-j)/1e3,f=(this.data.attributes.ref_date-h)/1e3;var k,l,m,n,q="smooth"!==this.config.animation,r=o(e,f,this.data.total_duration,this.data.drawn_units,q),s=o(e,f,i.Years,g,q),p=0,t=0,u=null,v=this.data.drawn_units.slice();for(var p in g)k=g[p],Math.floor(s.raw_time[k])!==Math.floor(s.raw_old_time[k])&&this.notifyListeners(k,Math.floor(s.time[k]),Math.floor(e),"all"),v.indexOf(k)<0||(Math.floor(r.raw_time[k])!==Math.floor(r.raw_old_time[k])&&this.notifyListeners(k,Math.floor(r.time[k]),Math.floor(e),"visible"),a||(this.data.text_elements[k].text(Math.floor(Math.abs(r.time[k]))),l=t*this.data.attributes.item_size+this.data.attributes.item_size/2,m=this.data.attributes.item_size/2,n=this.config.time[k].color,"smooth"===this.config.animation?(null===u||c||(Math.floor(r.time[u])>Math.floor(r.old_time[u])?(this.radialFade(l,m,n,1,k),this.data.state.fading[k]=!0):Math.floor(r.time[u])<Math.floor(r.old_time[u])&&(this.radialFade(l,m,n,0,k),this.data.state.fading[k]=!0)),this.data.state.fading[k]||this.drawArc(l,m,n,r.pct[k])):this.animateArc(l,m,n,r.pct[k],r.old_pct[k],(new Date).getTime()+d)),u=k,t++);if(!this.data.paused&&!a){var w=this,x=function(){w.update.call(w)};if("smooth"===this.config.animation)this.data.animation_frame=b.requestAnimationFrame(x,w.element,w);else{var y=e%1*1e3;0>y&&(y=1e3+y),y+=50,w.data.animation_frame=b.setTimeout(function(){w.data.animation_frame=b.requestAnimationFrame(x,w.element,w)},y)}}},s.prototype.animateArc=function(a,c,e,f,g,h){if(null!==this.data.attributes.context){var i=g-f;if(Math.abs(i)>.5)0===f?this.radialFade(a,c,e,1):this.radialFade(a,c,e,0);else{var j=(d-(h-(new Date).getTime()))/d;j>1&&(j=1);var k=g*(1-j)+f*j;if(this.drawArc(a,c,e,k),j>=1)return;var l=this;b.requestAnimationFrame(function(){l.animateArc(a,c,e,f,g,h)},this.element)}}},s.prototype.drawArc=function(a,b,d,e){if(null!==this.data.attributes.context){var f=Math.max(this.data.attributes.outer_radius,this.data.attributes.item_size/2);c||this.data.attributes.context.clearRect(a-f,b-f,2*f,2*f),this.config.use_background&&(this.data.attributes.context.beginPath(),this.data.attributes.context.arc(a,b,this.data.attributes.radius,0,2*Math.PI,!1),this.data.attributes.context.lineWidth=this.data.attributes.line_width*this.config.bg_width,this.data.attributes.context.strokeStyle=this.config.circle_bg_color,this.data.attributes.context.stroke());var g,h,i,j=-.5*Math.PI,k=2*Math.PI;g=j+this.config.start_angle/360*k;var l=2*e*Math.PI;"Both"===this.config.direction?(i=!1,g-=l/2,h=g+l):"Clockwise"===this.config.direction?(i=!1,h=g+l):(i=!0,h=g-l),this.data.attributes.context.beginPath(),this.data.attributes.context.arc(a,b,this.data.attributes.radius,g,h,i),this.data.attributes.context.lineWidth=this.data.attributes.line_width,this.data.attributes.context.strokeStyle=d,this.data.attributes.context.stroke()}},s.prototype.radialFade=function(a,c,d,e,f){var k,l,m,g=j(d),h=this,i=.2*(1===e?-1:1);for(k=0;1>=e&&e>=0;k++)!function(){l=50*k,m="rgba("+g.r+", "+g.g+", "+g.b+", "+Math.round(10*e)/10+")",b.setTimeout(function(){h.drawArc(a,c,m,1)},l)}(),e+=i;void 0!==typeof f&&b.setTimeout(function(){h.data.state.fading[f]=!1},50*k)},s.prototype.timeLeft=function(){if(this.data.paused&&"number"==typeof this.data.timer)return this.data.timer;var a=new Date;return(this.data.attributes.ref_date-a)/1e3},s.prototype.start=function(){b.cancelAnimationFrame(this.data.animation_frame),b.clearTimeout(this.data.animation_frame);var c=a(this.element).data("date");if("undefined"==typeof c&&(c=a(this.element).attr("data-date")),"string"==typeof c)this.data.attributes.ref_date=n(c);else if("number"==typeof this.data.timer)this.data.paused&&(this.data.attributes.ref_date=(new Date).getTime()+1e3*this.data.timer);else{var d=a(this.element).data("timer");"undefined"==typeof d&&(d=a(this.element).attr("data-timer")),"string"==typeof d&&(d=parseFloat(d)),"number"==typeof d?(this.data.timer=d,this.data.attributes.ref_date=(new Date).getTime()+1e3*d):this.data.attributes.ref_date=this.config.ref_date}this.data.paused=!1,this.update.call(this)},s.prototype.restart=function(){this.data.timer=!1,this.start()},s.prototype.reset=function(){var a=new Date;this.config.ref_date=a,this.data.attributes.ref_date=this.config.ref_date},s.prototype.stop=function(){"number"==typeof this.data.timer&&(this.data.timer=this.timeLeft(this)),this.data.paused=!0,b.cancelAnimationFrame(this.data.animation_frame)},s.prototype.destroy=function(){this.clearListeners(),this.stop(),b.clearInterval(this.data.interval_fallback),this.data.interval_fallback=null,this.container.remove(),a(this.element).removeAttr("data-tc-id"),a(this.element).removeData("tc-id")},s.prototype.setOptions=function(c){if(null===this.config&&(this.default_options.ref_date=new Date,this.config=a.extend(!0,{},this.default_options)),a.extend(!0,this.config,c),b=this.config.use_top_frame?window.top:window,q(),this.data.total_duration=this.config.total_duration,"string"==typeof this.data.total_duration)if("undefined"!=typeof i[this.data.total_duration])this.data.total_duration=i[this.data.total_duration];else if("Auto"===this.data.total_duration){for(var d,e=0;e<Object.keys(this.config.time).length;e++)if(d=Object.keys(this.config.time)[e],this.config.time[d].show){this.data.total_duration=i[h[d]];break}}else this.data.total_duration=i.Years,console.error("Valid values for TimeCircles config.total_duration are either numeric, or (string) Years, Months, Days, Hours, Minutes, Auto")},s.prototype.addListener=function(a,b,c){"function"==typeof a&&("undefined"==typeof c&&(c="visible"),this.listeners[c].push({func:a,scope:b}))},s.prototype.notifyListeners=function(a,b,c,d){for(var e,f=0;f<this.listeners[d].length;f++)e=this.listeners[d][f],e.func.apply(e.scope,[a,b,c])},s.prototype.default_options={ref_date:new Date,start:!0,animation:"smooth",count_past_zero:!0,circle_bg_color:"#60686F",use_background:!0,fg_width:.1,bg_width:1.2,text_size:.07,total_duration:"Auto",direction:"Clockwise",use_top_frame:!1,start_angle:0,time:{Days:{show:!0,text:"Days",color:"#FC6"},Hours:{show:!0,text:"Hours",color:"#9CF"},Minutes:{show:!0,text:"Minutes",color:"#BFB"},Seconds:{show:!0,text:"Seconds",color:"#F99"}}};var t=function(a,b){this.elements=a,this.options=b,this.foreach()};t.prototype.getInstance=function(b){var c,d=a(b).data("tc-id");if("undefined"==typeof d&&(d=m(),a(b).attr("data-tc-id",d)),"undefined"==typeof p[d]){var e=this.options,f=a(b).data("options");"string"==typeof f&&(f=JSON.parse(f)),"object"==typeof f&&(e=a.extend(!0,{},this.options,f)),c=new s(b,e),p[d]=c}else c=p[d],"undefined"!=typeof this.options&&c.setOptions(this.options);return c},t.prototype.addTime=function(a){this.foreach(function(b){b.addTime(a)})},t.prototype.foreach=function(a){var b=this;return this.elements.each(function(){var c=b.getInstance(this);"function"==typeof a&&a(c)}),this},t.prototype.start=function(){return this.foreach(function(a){a.start()}),this},t.prototype.stop=function(){return this.foreach(function(a){a.stop()}),this},t.prototype.restart=function(){return this.foreach(function(a){a.restart()}),this},t.prototype.reset=function(){return this.foreach(function(a){a.reset()}),this},t.prototype.rebuild=function(){return this.foreach(function(a){a.initialize(!1)}),this},t.prototype.getTime=function(){return this.getInstance(this.elements[0]).timeLeft()},t.prototype.addListener=function(a,b){"undefined"==typeof b&&(b="visible");var c=this;return this.foreach(function(d){d.addListener(a,c.elements,b)}),this},t.prototype.destroy=function(){return this.foreach(function(a){a.destroy()}),this},t.prototype.end=function(){return this.elements},a.fn.TimeCircles=function(a){return new t(this,a)}}(jQuery);
