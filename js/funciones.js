
	function spanner(){
	document.getElementById('spanned').style.height = document.getElementById('spanner').clientHeight + "px";
	//document.getElementById('spanned2').style.height = document.getElementById('spanner').clientHeight * 0.95 + "px";
	}
	function mobile_show(){
		document.getElementById('mobile-menu').style.visibility='visible';
		document.getElementById('boton-menu1').style.visibility='hidden';
		document.getElementById('boton-menu2').style.visibility='visible';
		//document.getElementById('mobile-menu').style.top=document.getElementById('spanner').clientHeight + "px";
	}
	function mobile_hide(){
		//document.getElementById('mobile-menu').style.visibility='hidden';
		document.getElementById('boton-menu1').style.visibility='visible';
		document.getElementById('boton-menu2').style.visibility='hidden';
	}
	
	function js_animate(el,prop,val,time,tipo){
		var elem = document.getElementById(el);
		elem.style.setProperty("transition", "" + prop + " " + time + " " + tipo);
		elem.style.setProperty("-webkit-transition", "" + prop + " " + time + " " + tipo);
		elem.style.setProperty("-moz-transition", "" + prop + " " + time + " " + tipo);
		elem.style.setProperty("-o-transition", "" + prop + " " + time + " " + tipo);
		elem.style.setProperty("-ms-transition", "" + prop + " " + time + " " + tipo);
		eval('elem.style.' + prop + ' = ' + '"' + val +'"');
	}
	
	function mostrar_mensaje(men){
		mensaje = '<div class="men"><strong>Mensaje:</strong><span>'+men+'<span>';
		mensaje += '<a href="javascript:">Aceptar</a>'
		mensaje += '<a style="display: block;padding: 2px; top: 0px; right: 6px; color: #d4d4d4 !important; font-size: 22px;" href="javascript:">x</a>'
		mensaje += '</div>'
		document.getElementById('men').innerHTML=mensaje;
		document.getElementById('men').style.display='block';
		js_animate('men','opacity','1.0','0.3s','ease-in-out');
		return true;
	}
	
	function esconder_mensaje(){
		document.getElementById('men').style.display='none';
		js_animate('men','opacity','0.0','0.3s','ease-in-out');
		return false;
	}
	
	if(men!=""){men_visible = mostrar_mensaje(men);}
	
	document.onkeydown = function(evt) {
		evt = evt || window.event;
		var isEscape = false;
		if ("key" in evt) {
			isEscape = evt.key == "Escape";
			isEnter = evt.key == "Enter";
		} else {
			isEscape = evt.keyCode == 27;
			isEnter = evt.keyCode == 13;
		}
		if (isEscape) {
			if(men_visible){men_visible = esconder_mensaje();}
		}
		if (isEnter) {
			if(men_visible){men_visible = esconder_mensaje();}
		}
	};