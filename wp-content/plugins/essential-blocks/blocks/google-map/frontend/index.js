document.addEventListener("DOMContentLoaded",(function(e){var t=document.querySelectorAll(".eb-google-map-wrapper");if(!(t.length<=0))for(var o=function(){var e=t[n],o=e.getAttribute("data-map-type"),a=e.getAttribute("data-map-zoom"),i=e.getAttribute("data-latitude")||"0",g=e.getAttribute("data-longitude")||"0",l=e.getAttribute("data-image-size"),r=JSON.parse(e.getAttribute("data-marker")),d=new window.google.maps.Map(e,{center:{lat:Number(r[0].latitude)||Number(i),lng:Number(r[0].longitude)||Number(g)},gestureHandling:"cooperative",zoom:1===r.length?parseInt(a):0,mapTypeId:o,zoomControl:a});if(r&&0<r.length){var c=new google.maps.LatLngBounds;r.forEach((function(e,t){var o=new window.google.maps.LatLng(e.latitude,e.longitude),n=("true"==e.showCustomIcon?e.imageUrl:e.icon)||"https://maps.google.com/mapfiles/ms/icons/red-dot.png",a=new window.google.maps.Marker({position:o,map:d,title:e.title,icon:{url:n,scaledSize:new google.maps.Size(l,l)}});if(e.title||e.content){var i='<div class="eb-google-map-overview"><h6 class="eb-google-map-overview-title">'.concat(e.title,'</h6><div class="eb-google-map-overview-content">').concat(e.content?"<p>".concat(e.content,"</p>"):"","</div></div>");c.extend(o);var g=new window.google.maps.InfoWindow({content:i});0==t&&g.open(d,a),a.addListener("click",(function(){g.open(d,a)})),r.length>1&&d.fitBounds(c)}}))}},n=0;n<t.length;n++)o()}));