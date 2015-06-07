/*
Copyright et règles d'utilisation: 
sous license cnx disponible à http://jpconnexion.free.fr/license/license_cnx.html
<script src="../2012_06/cnx.js"></script>
<script src="http://jpconnexion.free.fr/2012_06/cnx.js"></script>
*/

var claude = function (arg) {
	if ( window == this ){//en absence d'objet appelant this = window; si une instance de claude() existe, alors this contient cette instance
		return new claude(arg); //exit programm - this => cnx() - Copyright (c) 2006 John Resig (jquery.com) * Dual licensed under the MIT (MIT-LICENSE.txt)  * and GPL (GPL-LICENSE.txt) licenses.
	};
	if (arg != undefined){
		/* ----------------
		pour cnx(null) et cnx() arg est undefined (null <=> undefined)
		si arg == undefined ou null arg conserve la valeur précédente, mémorisation!
		--------------- */
		claude.prototype.divers.cnxArg = arg;
		this.elt = arg;
	};
};

var cnx = claude;// Map the claude namespace to the 'cnx' one - Copyright (c) 2006 John Resig (jquery.com) * Dual licensed under the MIT (MIT-LICENSE.txt)  * and GPL (GPL-LICENSE.txt) licenses.

claude.prototype = {
	a2: function(e){
		alert("fonction a2: "+e+" avec a en mem: "+this.elt+ " : debug value: "+cnx("essai").trace.debug); //noter l'appel via cnx() de trace.debug ...On peut aussi utiliser this.trace.debug
	},
	a3: "passage",
	trace: (function() { //fonction anonyme - mode debugger et traçage
		// private section
		var id_div = (this.elt) ?  this.elt : "id_print";; //récupère le premier paramètre ou si vide "id_print" - id de la div associée
		var objetDiv; //il faut le définir en dehors de la fonction init() pour être accessible dans la public section
		var init = function(){ //private section - initialise la div si elle n'existe pas déjà!
			/* -----------------
			créer la div si elle n'existe pas
			initialise objetDiv
			---------- */
			objetDiv=document.getElementById(id_div);//teste si la <div> existe
			if (objetDiv == null) { //créer la <div> si elle n'existe pas déjà
				objetDiv = document.createElement("div");
				objetDiv.id = id_div;
				objetDiv.style.position = "absolute";
				objetDiv.style.left = "900px";
				objetDiv.style.top="200px";
				objetDiv.style.width = "500px"; //dimensionne la <div>
				objetDiv.style.height= "250px"; //dimensionne la <div>
				objetDiv.style.overflow= "scroll"; //ajoute les ascenseurs
				objetDiv.style.visibility = "hidden";
				document.body.appendChild(objetDiv);
				//cnx(this.elt).dom.appendTo(document.body, objetDiv); //document.body.appendChild(objetDiv);
			}
		};
		//end of private section
		return { //public section
			print: function(str_print){
				/* ----------------------------------------
				code de la div asociée:
				<div  id="id_print" style="visibility:hidden; ">Surveillance et déboggage</div> 
	
				cnx(this.elt).trace.debug = true; //ne s'affiche que si cnx(this.elt).trace.debug = true
				cnx(this.elt).trace.print(data);
				----------------------------------------- */
				init(); //créer la div si elle n'existe pas
				if (cnx(this.elt).trace.debug){ //ne s'affiche que si debug est vrai!
					objetDiv.style.visibility="visible"; //rend visible la <div> automatiquement
					var ecriture = objetDiv.innerHTML;
					ecriture = str_print + "<BR>" + ecriture;
					objetDiv.innerHTML = ecriture;
				} else objetDiv.style.visibility = "hidden";
			},
			setTop: function(str_value){
				cnx(this.elt).trace.init(); //créer la div si elle n'existe pas
				claude.prototype.style.setTop(str_value, objetDiv);
			},
			debug: false, //cnx(this.elt).trace.debug = true;	 pour afficher; ne sert à rien ici, mémorisation du process!
			fin: "" // cnx().trace.fin
			
		}; //end of return
	})(), //end of trace - la fonction anonyme est en auto exécution, elle n'admet pas de paramètre
	fin:""
};

cnx.prototype.add = {
	b2: "voir",
	end: ""
};

claude.prototype.divers = { // this ne fonctionne pas dans ces fonctions claude.prototype.xxx = {};
	version: "cnx.divers version 2012-12-21",
	cnxArg: "vide", //mémorisation du contenu de getElt()
	cnxClassPHP: "../2012_12/cnx_class.php", //adresse de la classe php
	author: "claudecnx jpconnexion",
	arg: function(){
		return claude.prototype.divers.cnxArg;
	},
	fin: ""
};

claude.prototype.dom = { // gestion du DOM et nodes éléments
	appendTo: function(parent, child){	// ajoute un enfant à un parent
		/* ----------------------------
		Ajoute un élément enfant (child) à un élément parent
		parent = (parent)? parent: document.body;
		cnx().dom.appendTo(child, document.body);
		----------------------------- */
		var parent = (parent)? cnx(parent).dom.getElt() : document.body; //document.body par défaut car parent doit exister
		if (!parent) return false; //parent n'a pas été trouvé dans cnx(parent).dom.getElt()
		parent.appendChild(child);
		return child;
	},
	
	removeElt: function (){ //détruit un élément
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (!elt) return false; // si elt n'existe pas retourne false
		var parent = cnx(elt).dom.getParent(1); //recherche le parent
		parent.removeChild(elt); //retire l'enfant, donc le détruit
		return true;
	},
	
	listeProp: function (){ //lit et affiche toutes les propriétés d'un élément HTML
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var liste;
		for (prop in elt) {
			liste += "Propriété : " + prop + " -> " + elt[prop] + "\n<br>";
		} 
		return liste;
	},
	
	changeId: function(ancienID, newID){	// modifie l'id d'un élément
		var elt = document.getElementById(ancienID);
		if (elt == null) return false; //il faut !null pour IE
		elt.id =  newID;
		return elt.id;
	},
	
	getNodeInfos: function (tagName) { //affiche des informations choisies sur un elt et ses enfants
		/* cnx(elt) est correct; claude.prototype retourne une valeur erronée! */
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var Container = "Object: "+elt.nodeName +" / "+elt;
		var Identifiant = "\n has for id : " + elt.id;
		var Parent = cnx(elt).dom.getParent() ? "\n has for Parent: "+cnx(elt).dom.getParent().nodeName + " / "+ cnx(elt).dom.getParent() : "\n #document has no Parent";
		var GrandParent = cnx(elt).dom.getParent(2) ? "\n has for Grand-Parent: "+ cnx(elt).dom.getParent(2).nodeName + " / "+ cnx(elt).dom.getParent(2) : "\n #document has not Grand-Parent";
		var Children = "\n has " + cnx(elt).dom.getChilds(false) +" children"; //cnx(elt) et prototype ne donne pas le m^me résultat !!!
		var Attributs = "\n has "+ cnx(elt).dom.getAttributes(false)+" attributes : " ;
		var Type = "\n is type : " + cnx(elt).dom.getType() + " / " + elt.nodeType;
		var Contents = "\n it's contents : " + cnx(elt).dom.getContents();
		if (!tagName)	alert(Container+Identifiant+Parent+GrandParent+Children+Attributs+Type+Contents + "\n Search Mode: all Tag"); //liste tous les elt si tagName est faux
		if( (tagName) && (tagName.toLowerCase() == elt.nodeName.toLowerCase() ) )	alert(Container+Identifiant+Parent+GrandParent+Children+Attributs+Type+Contents + "\n Search in Tag : " + elt.nodeName); //ne liste que les elt correspondant à la balise tagName

		for (var i = 0; i < elt.childNodes.length; i++) {
			var child = elt.childNodes[i];
			cnx(child).dom.getNodeInfos(tagName); //affiche les informations pour chaque enfant
		}
		return elt.childNodes.length; // retourne le nombre d'enfants
	},

	getContents: function(){// retourne le contenu d'un élément
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var contents;
		switch(elt.nodeType){
		case 1: //ELEMENT_NODE
			contents = elt.innerHTML;
			break;
		case 2:
			//contents = "ATTRIBUTE_NODE";
			break;
		case 3: //TEXT_NODE
			contents=elt.data;
			break;
		case 4:
			//contents="CDATA_SECTION_NODE";
			break;
		case 5:
			//contents="ENTITY_REFERENCE_NODE";
			break;
		case 6:
			//contents="ENTITY_NODE";
			break;
		case 7:
			//contents="PROCESSING_INSTRUCTION_NODE";
			break;
		case 8:
			//contents="COMMENT_NODE";
			break;
		case 9:
			//contents="DOCUMENT_NODE";
			break;
		case 10:
			//contents="DOCUMENT_TYPE_NODE"
			break;
		case 11:
			//contents="DOCUMENT_FRAGMENT_NODE";
			break;
		case 12:
			//contents="NOTATION_NODE";
			break;
		default:
			//contents="Undefined_Node";
			break;
		}
		return contents;
	},
	
	getType: function(){ // retourne le type d'un élément
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var type;
		switch(elt.nodeType){
		case 1:
			type = "ELEMENT_NODE";
			break;
		case 2:
			type = "ATTRIBUTE_NODE";
			break;
		case 3:
			type="TEXT_NODE";
			break;
		case 4:
			type="CDATA_SECTION_NODE";
			break;
		case 5:
			type="ENTITY_REFERENCE_NODE";
			break;
		case 6:
			type="ENTITY_NODE";
			break;
		case 7:
			type="PROCESSING_INSTRUCTION_NODE";
			break;
		case 8:
			type="COMMENT_NODE";
			break;
		case 9:
			type="DOCUMENT_NODE";
			break;
		case 10:
			type="DOCUMENT_TYPE_NODE";
			break;
		case 11:
			type="DOCUMENT_FRAGMENT_NODE";
			break;
		case 12:
			type="NOTATION_NODE";
			break;
		default:
			type="Undefined_Node";
			break;
		}
		return type;
	},
	
	getChilds: function(logique){// retourne le nombre d'enfants d'un élément HTML ou un Array() contenant les enfants 
		/*
		var n = cnx(elt).dom.getChilds(false); //retourne le nombre d'enfants
		var tab = cnx(elt).dom.getChilds(true); //retourne un Array() contenant la liste des enfants; utiliser split() pour le détail
		for (var i=0; i<tab.length; i++) {
			document.write("tableau[" + i + "] = " + tab[i] + "<BR>");
		}
		*/
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var tab = new Array();
		for (var i = 0; i < elt.childNodes.length; i++) {
			tab[i] = elt.childNodes[i]; //penser à string.split(separateur)
		}
		if (logique) return tab; //penser à string.split(separateur)
		else	return i; //retourne le nombre d'enfants d'un élément HTML; elt.childNodes.length ne retourne rien! Donc il faut i!!!
	},
		
	getAttributes: function(logique){// retourne le nombre d'attributs ou un tableau avec les attributs
		/*
		var n = cnx(elt).dom.getAttributes(false); //retourne le nombre d'attributs
		var tab = cnx(elt).dom.getAttributes(true); //retourne un Array() contenant la liste des attributs; utiliser split() pour le détail
		for (var i=0; i<tab.length; i++) {
			document.write("tableau[" + i + "] = " + tab[i] + "<BR>");
		}
		*/
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (!elt.attributes) return 0;
		if (!logique)	return elt.attributes.length; //retourne le nombre d'attributs
		else {
			var tab = new Array();
			for (var i=0; i < elt.attributes.length; i++){
				tab[i] = elt.attributes[i].nodeName + "=>" +elt.attributes[i].nodeValue; //penser à string.split(separateur)
			}
			return tab;
		}
	},
	
	getParent: function(niv){// renvoi l'élément parent quelque soit son tag, juste le parent ou grand parent - ex nodeParent()
		/*----------------------------------------------------
		Permet de récupérer l'élément parent
			- elt: élément source (this) - nota peut être un id
			- niv: niveau du parent à récupérer, optionnel permet de chercher un grand parent!
		exemple d'utilisation:
		var parent_table = cnx(elt).dom.getParent(false, objetCellule); //retourne la row
		avec nodeName retourne le nom de l'élément et "BODY" pour document.body
		---------------------------------------------------- */
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		(!niv) ? niv=1 : niv=niv;// On initialise le niveau à 1 si besoin est.
		if (elt.nodeName == "#document") return document.nodeName; // "#document" est le premier ancestre de tous les objet HTML et n'a pas de parent
		if (niv != 1 && elt.parentNode){  // Si le nombre de niveaux demandé n'est pas atteint on continue
			return cnx(elt.parentNode).dom.getParent(niv -= 1); 
		} else {
			return elt.parentNode; // retourne l'objet.
		}
	},
	
	getTagParent: function(tagName, niv){// renvoi l'élément parent correspondant à un Tag donné 
		/*----------------------------------------------------
		Author: jsgorre Jean-sébastien sur javascript codes sources
		Permet de récupérer l'élément parent correspondant à un Tag donné
			- tagName: Nom du type d'élément à récupérer: exemple TABLE
			- elt: élément source (this) - nota peut être un id
			- niv: niveau du parent à récupérer, optionnel
		exemple d'utilisation:
		var parent_table = cnx(elt).dom.getTagParent("TABLE", false, objetCellule); //retourne la <table> parent
		var parent_table = cnx(elt).dom.getTagParent("TABLE", 1, objetCellule); //retourne la <table> parent
		var parent_table = cnx.dom(objetCellule).getTagParent("TABLE"); //retourne la <table> parent
		---------------------------------------------------- */
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if(elt == false) return false; //gestion d'erreur
	
		(!niv) ? niv=1 : niv=niv;// On initialise le niveau à 1 - si false => niv=1
		var tagName = tagName.toUpperCase();
	
		if (elt.parentNode.nodeName == "#document")		return false;    // Le document a été parcouru entièrement et aucune balise n'a été trouvée        
		
		if (elt.parentNode.nodeName != tagName){ // Si la balise ne correspond pas on continue la recherche                             
			return cnx(elt.parentNode).dom.getTagParent( tagName, niv);	
		} else if (niv!=1 && elt.parentNode.parentNode.nodeName==tagName){  // Si le nombre de niveaux demandé n'est pas atteint et qu'il reste des balises correspondantes on continue
			return cnx(elt.parentNode).dom.getTagParent( tagName, niv-=1); 
		} else {
			return elt.parentNode; // Sinon on renvoie l'id de la balise correspondante
		}
	},//
	
	getFirstChild: function (tagName){ //retourne le premier tagName parmi la collection des tagName d'un elt, soit tagName[0] 
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (elt && !tagName) return elt.firstChild ? elt.firstChild :  false;
		var tagName = tagName.toUpperCase();
		var elts = elt.getElementsByTagName(tagName);
		return elts && elts.length > 0 ? elts[0] : false;
	}, 
	
	getTagName: function(){
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		return elt.tagName;
	},
	
	getElt: function (){ // retourne un objet même si id fournit 
		var elt = claude.prototype.divers.cnxArg;  //Récupère la valeur pasée en paramètre de cnx()
		var object = (typeof elt === "string") ? document.getElementById(elt) : elt; //test si String et cherche alors Object HTML lié
		// document.getElementByName(); n'existe pas!
		return object; //return null si getElementById()=null; return false si elt = false
	}, 
		
	fin:""
}; //end of dom()

claude.prototype.event = { // gestion des évènements
	mouseWheel: function (e, fonction){ // Event handler for mouse wheel event - DOMMouseScroll
		/** --------------------
		script trouvé sur:
		http://www.switchonthecode.com/tutorials/javascript-tutorial-the-scroll-wheel
		http://www.adomas.org/javascript-mouse-wheel/
		http://ajaxian.com/archives/javascript-and-mouse-wheels
		----------------------- */
		var e = e ? e : window.event;
		var wheelData = e.detail ? e.detail * -1 : e.wheelDelta / 40; //mvt du scroll
		if (wheelData) eval("fonction(e, wheelData)"); //appel de la function associée: func(e, delta) - delta>0 scroll Up - delta<0 scroll down
		//return claude.prototype.eventcancelEvent(e); //cancelEvent() inhibbe le scroll si besoin
		//return false; //ne pas utiliser return false car sous IE cela empêche l'exécution du scroll associé à mousewheel, donc même effet que claude.prototype.eventcancelEvent()
	}, // 
	
	cancelEvent: function(e) { // arrête l'exécution d'un event ex: scroll wheel 
		var e = e ? e : window.event;
		if(e.stopPropagation)	e.stopPropagation();
		if(e.preventDefault)	e.preventDefault();
		e.cancelBubble = true;
		e.cancel = true;
		e.returnValue = false;
		return false;
	}, // 
	
	onEvent: function(eventName, func){ // affecte un event avec la méthode on...
		/* -----------------
		normalement cette fonction est appelée par claude.prototype.event.addEvent()
		mais elle peut aussi être appelée directement
		---------------------- */
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		eventName = eventName.toLowerCase(); //met en minuscule le nom de l'évènement
		if(eventName.indexOf("on") == 0) eventName = eventName.substring(2, eventName.length);//transforme onclick en click
		var oldEvent = elt["on" + eventName]; //mémorise les anciens évènements déjà appliqués: elt.onmousedown
		if (typeof oldEvent != "function")	elt["on" + eventName] = func; //applique directement la function
		else {
			elt["on" + eventName] = function() {
				if (oldEvent)	oldEvent(); //applique les anciens event
				func(); //ajoute le nouvel event
			}
		}
	}, // 
	
	addEvent: function () {//
		/*-----------------------------------
		elt est soit un objet soit un id d'un objet (donc string id)
		eventName est de type string "load" ou "onLoad" pour onload
		func est le nom de la fonction - ne pas mettre les parenthèses On écrira affiche et non pas affiche()
		
		sous Firefox mousedown nécessite un traitement spécial pour éviter les conflits avec mousemove lors des drag and drop
		
		exemple: addEvent( "load", affiche, window);
		function affiche() { alert(1); }
		--------------------------------------*/
		if(navigator.userAgent.indexOf('MSIE') > -1) { //IE
			return function(eventName, func) {
				var elt = claude.prototype.dom.getElt(); //retourne Object if exist
				var eventName = eventName.toLowerCase(); //met en minuscule le nom de l'évènement
				if(eventName.indexOf("on") == 0) eventName = eventName.substring(2, eventName.length);//transforme onclick en click
				switch(eventName) {
					case "mousewheel": //onmousewheel - transmet une fonction spécifique haut/bas 
						if (elt == window)	elt = document; //IE ne supporte pas window, seulement document
						elt.attachEvent("on" + eventName, 
							function(){
								var e = event; //var e = arguments[0] || event;
								claude.prototype.event.mouseWheel(e, func);
							}
						); //IE
						break;
						
					default:
						elt.attachEvent("on" + eventName, func); //Ne pas oublier le "on" pour IE
						break;
				};
				
			};
		} else { //other then IE => FF Chrome Opera... : elt.addEventListener
			return function(eventName, func, propagation) {
				var elt = claude.prototype.dom.getElt(); //retourne Object if exist
				var eventName = eventName.toLowerCase(); //met en minuscule le nom de l'évènement
				if(eventName.indexOf("on") == 0) eventName = eventName.substring(2, eventName.length);//transforme onclick en click
				if (! propagation)	var propagation = false; //default value
				switch(eventName) {
					case "mousedown":
						claude.prototype.event.onEvent("onmousedown", func, elt); //appelle l'event suivant la méthode onmousedown
						break;
						
					case "mousewheel": //onmousewheel - transmet une fonction spécifique haut/bas 
						elt.addEventListener('DOMMouseScroll', 
								function(){
									var e = arguments[0]; //var e = arguments[0] || event;
									claude.prototype.event.mouseWheel(e, func);
								},
								false); //FF only - name event spécifique pour FF
						elt.addEventListener(eventName, 
								function(){
									var e = arguments[0] || event;
									claude.prototype.event.mouseWheel(e, func);
								},
								false);
						break;
						
					default:
						elt.addEventListener(eventName, func, propagation);//mettre un 3ième argument pour les autres navigateurs FF - optionnel au delà de la version 6 de FF}
						break;
				};
				
			};
		};
		return false;
	}(), // fonction addEvent en auto exécution, ne s'éxécute ainsi qu'une seule fois au chargement et identifie une seule fois le navigateur - gain de temps si multiple appel
	
	removeEvent: function(eventName, func){ // retire un event d'un objet 
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (eventName == "DOMMouseScroll")	eventName = "mousewheel"; //DOMMouseScroll est spécifique FF
		if(element.removeEventListener)	{
		if(eventName == 'mousewheel')	element.removeEventListener('DOMMouseScroll', func, false); // pour FF 
		element.removeEventListener(eventName, func, false);//chrome ou opéra ou (FF si pas mousewheel)
		}
		else if(element.detachEvent)	element.detachEvent("on" + eventName, func); //pour IE

	}, // 
	
	getEvent: function(e){//retourne l'évènement 
		if (!e) e = window.event; //IE ne returne pas (e) pas offre une propriété window.event
		return e; //  e.type 	fourni le type de l'évènement: ex mousedown
	},//
	
	getTarget: function(e){ //renvoie la cible d'un évènement
		var cible;
		if (!e) var e = window.event; //IE ne returne pas (e) mais offre une propriété window.event
		if (e.target) cible = e.target;
		else if (e.srcElement) cible = e.srcElement;
		if (cible.getType == 3) 	cible = cible.parentNode; // defeat Safari bug
		return cible;
		/* ------------------------------------------
		cible.id //identificateur de l'objet si il existe
		cible.name //nom de l'objet ou undefined
		cible.tagName //type de l'objet input, body H1 p ...
		cible.object //confirme que sa nature est un objet, fourni l'objet lui-même cad cible en fait!
		--------------------------------------- */
	},// 
	
	getType: function(e){ //renvoi le type de l'Event 
		if (!e) e = window.event; //IE ne returne pas (e)
		return e.type;
	}, // 
	
	isleft: function(e){
		var isleftbutton = (window.event)? (window.event.button==1): (e.type=="mousedown")? (e.which==1): false;
		return isleftbutton; //ex si bouton.right=true alors bouton droit cliqué
	},
	
	isright: function(e){
		var isrightbutton = (window.event)?(window.event.button==2): (e.which==3); //window.event pour browser clone IEX et e.which pour browser clone FF
		return isrightbutton; //ex si bouton.right=true alors bouton droit cliqué
	},
	
	
	ismiddle: function(e){
		var ismiddlebutton = (window.event)? ((window.event.button==3) || (window.event.button==4)): (e.which==2);
		return ismiddlebutton; //ex si bouton.right=true alors bouton droit cliqué
	},
	
	clientX: function(e){
		var clientX = (window.event)?(window.event.clientX): (e.clientX);// Position horizontale sur le client
		return clientX;
	},
	
	clientY: function(e){
		var clientY = (window.event)?(window.event.clientY): (e.clientY);// Position verticale sur le client
		return clientY;
	},
	
	screenX: function(e){
		var screenX = (window.event)?(window.event.screenX): (e.screenX);// Position horizontale à l'ecran du pointeur de la souris
		return screenX;
	},
	
	screenY: function(e){
		var screenY = (window.event)? (window.event.screenY): (e.screenY);// Position verticale à l'ecran du pointeur de la souris
		return screenY;
	},
	
	pageScrollX: function(e){	//pageX avec le scroll pour IE: X correspond à left	
		var pageX = (window.event) ? (window.event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft) : (e.pageX);// Position horizontale sur la page du pointeur de la souris
		return pageX; //position par rapport à left
	},
	
	pageScrollY: function(e){	//pageY avec le scroll pour IE: Y correspond à top	
		var pageY = (window.event) ? (window.event.clientY + document.body.scrollTop + document.documentElement.scrollTop) : (e.pageY);// Position verticale sur la page du pointeur de la souris
		return pageY; //position par rapport à top
	},

	pageX: function(e){	//sous IE ne tient pas compte du scroll, utiliser pageScrollX pour coordonnées avec le scroll	
		var pageX = (window.event)?(window.event.clientX): (e.pageX);// Position horizontale sur la page du pointeur de la souris
		return pageX;
	},
	
	pageY: function(e){	//sous IE ne tient pas compte du scroll, utiliser pageScrollY pour coordonnées avec le scroll	
		var pageY = (window.event)?(window.event.clientY): (e.pageY);// Position verticale sur la page du pointeur de la souris
		return pageY;
	},

	ismousedown: function(e){
		var rep; //variable pour la réponse
		var nomEvent = claude.prototype.event.getType(e); //nom ou type du dernier Event
		(nomEvent == "mousedown")? rep=true: rep=false; //vrai si Event = mousedown
		return rep;
	},
	
	ismouseup:  function(e){
		var rep; //variable pour la réponse
		var nomEvent = claude.prototype.event.getType(e); //nom ou type du dernier Event
		(nomEvent == "mouseup")? rep=true: rep=false; //vrai si Event = mousedown
		return rep;
	},
	
	ismousemove: function(e){
		var rep; //variable pour la réponse
		var nomEvent = claude.prototype.event.getType(e); //nom ou type du dernier Event
		(nomEvent == "mousemove")? rep=true: rep=false; //vrai si Event = mousedown
		return rep;
	},

	isclick: function(e){
		var rep; //variable pour la réponse
		var nomEvent = claude.prototype.event.getType(e); //nom ou type du dernier Event
		(nomEvent == "click")? rep=true: rep=false; //vrai si Event = mousedown
		return rep;
	},
	
	isdblclick: function(e){
		var rep; //variable pour la réponse
		var nomEvent = claude.prototype.event.getType(e); //nom ou type du dernier Event
		(nomEvent == "dblclick")? rep=true: rep=false; //vrai si Event = mousedown
		return rep;
	},
	
	iscontextmenu: function(e){
		var rep; //variable pour la réponse
		var nomEvent = claude.prototype.event.getType(e); //nom ou type du dernier Event
		(nomEvent == "contextmenu")? rep=true: rep=false; //vrai si Event = mousedown
		return rep;
	},
	
	
	mousemove_afficheCoord: function(e){ //affiche les coord de la souris qui suivent le curseur de la souris	
		/* -----------------------------
		pour initialiser ce fonctionnement faire:
		cnx().event.postCoord = true; //active le mode suivi coordonnées souris
		cnx(document).event.addEvent( "mousemove", cnx().event.mousemove_afficheCoord, false); //document.onmousemove = mousemove_afficheCoord; - charge le mode suivi coordonnées souris
		------------------------------------ */
		if (!document.getElementById("cnxMouseCoordId") && claude.prototype.event.postCoord == true && document.body){ //  || ou &&
			var cnxMouseCoord = document.createElement("div");
			cnxMouseCoord.id = "cnxMouseCoordId";
			cnxMouseCoord.style.position = "absolute";
			cnxMouseCoord.style.visibility = "hidden";
			document.body.appendChild(cnxMouseCoord);
		}
		var cursor = document.getElementById("cnxMouseCoordId");
		if (claude.prototype.event.postCoord == true){
			cursor.style.visibility = "visible";
			cursor.style.backGroundColor = "Transparent";
			cursor.innerHTML = "Left: "+claude.prototype.event.pageScrollX(e) + "px"+ " Top: "+claude.prototype.event.pageScrollY(e) + "px"; //Left
			cursor.style.top = claude.prototype.event.pageScrollY(e)  + 1 + "px"; //décalage pour even mouseover et lecture
			cursor.style.left = claude.prototype.event.pageScrollX(e) + 1 + "px";
		} 
		else cursor.style.visibility = "hidden";
		return false;
	},
	
	initCoord: function(){ //initialise la lecture des coordonnées de la souris
		claude.prototype.event.postCoord = true;
		cnx(document).event.addEvent( "mousemove", cnx().event.mousemove_afficheCoord, false); //document.onmousemove = mousemove_afficheCoord;
	},
	
	postCoord: false, //cnx().event.postCoord = true; pour afficher les coordonnées de la souris
	fin:""
}; //end of event

claude.prototype.log = { // logique, reg expression, is quelquechose
	trim: function (aString) { // Supprime les espaces inutiles en début et fin de la chaîne passée en paramètre.
		/* ---------------------------------------------------
		Retourne la chaîne sans ses espaces
		Trouver sur: http://anothergeekwebsite.com/fr/2007/03/trim-en-javascript
		Trim en Javascript
		Posted 20. March 2007 - 10:28 by papy.reno
		----------------------------------------------------- */
		if (String.trim)		return aString.trim(); //new browser
		var regExpBeginning = /^\s+/;
		var regExpEnd = /\s+$/;
		return aString.replace(regExpBeginning, "").replace(regExpEnd, "");
	},//
	
	trimLeft: function (aString) { // Supprime les espaces inutiles en début de la chaîne passée en paramètre
		/* ---------------------------------------------------
		Retourne la chaîne sans ses espaces
		Trouver sur: http://anothergeekwebsite.com/fr/2007/03/trim-en-javascript
		Trim en Javascript
		Posted 20. March 2007 - 10:28 by papy.reno
		----------------------------------------------------- */
		if (String.trimLeft)		return aString.trimLeft(); //new browser
		var regExpBeginning = /^\s+/;
		return aString.replace(regExpBeginning, "");
	},//
	
	
	trimRight:function (aString) { // Supprime les espaces inutiles en fin de la chaîne passée en paramètre.
		/* ---------------------------------------------------
		Retourne la chaîne sans ses espaces
		Trouver sur: http://anothergeekwebsite.com/fr/2007/03/trim-en-javascript
		Trim en Javascript
		Posted 20. March 2007 - 10:28 by papy.reno
		----------------------------------------------------- */
		if (String.trimRight)	return aString.trimRight(); //new browser
		var regExpEnd = /\s+$/;
		return aString.replace(regExpEnd, "");
	},
	
	leftSubstring: function(chaine, strSearch){ //recherche la racine d'un élément; partie gauche d'une chaine de caractère; équivallent à search_racine 
		var leftRacine = chaine.substring(0, chaine.indexOf(strSearch)); //retourne la partie à gauche de chaine par rapport à strSearch
		return leftRacine;
	},
	
	borneSubstring: function(chaine, strDebut, strFin) { //retourne les caractères entre les caractères strDebut et strFin
		var indexDebut = chaine.indexOf(strDebut);
		if (indexDebut == -1)	return undefined;
		indexDebut += strDebut.length;
		var indexFin = chaine.indexOf(strFin, indexDebut);
		if (indexFin == -1)	return undefined;
		return chaine.slice(indexDebut, indexFin);
	},
	
	d2b: function (int_d) {return int_d.toString(2);}, //transforme un nombre décimal en une chaine binaire
	b2d: function (str_h) {return parseInt(str_h,2);}, //transforme une chaine binaire en un entierdécimal
	d2o: function (int_d) {return int_d.toString(8);}, //transforme un nombre décimal en une chaine octal
	o2d: function (str_h) {return parseInt(str_h,8);}, //transforme une chaine octal en un entier décimal
	d2h: function (int_d) {return int_d.toString(16);}, //transforme un nombre décimal en une chaine hexadécimale
	h2d: function (str_h) {return parseInt(str_h,16);}, //transforme une chaine hexadécimale en un entier décimal
	chr: function (int_ascii) {return String.fromCharCode(int_ascii);}, //retourne le caractère correspondant au code ASCII fournit en argument (type décimal)
	asc: function (str_chaine, int_pos) {return str_chaine.charCodeAt(int_pos);}, //retourne le caractère ASCII situé à int_pos dans la chaine de caractère str_chaine
	
	RGBtoHex: function(int_R,int_G,int_B) { //Conversion Couleur: fournie en RGB en un code hexa
		return claude.prototype.log.toHex(int_R)+claude.prototype.log.toHex(int_G)+claude.prototype.log.toHex(int_B); //return a string, penser à ajouter "#" pour afficher une couleur
	},//
	
	toHex: function(N) {// N est de type Integer - retourne un String contenant la valeur exadécimale de N
		if (N==null) return "00";
		N=parseInt(N);
		if (N==0 || isNaN(N)) return "00";
		N=Math.max(0,N);
		N=Math.min(N,255);
		N=Math.round(N);
		return "0123456789ABCDEF".charAt((N-N%16)/16) + "0123456789ABCDEF".charAt(N%16);
	},//
	
	hexToRGB: function(str_Hex){ //Conversion Couleur: attention il faut le # dans str_Hex; Converti une couleur fournie en hexa en un code RGB
		var colorRGB = new Object();
		colorRGB.R = claude.prototype.log.hexToRed(str_Hex);
		colorRGB.G = claude.prototype.log.hexToGreen(str_Hex);
		colorRGB.B = claude.prototype.log.hexToBlue(str_Hex);
		return colorRGB; //il faut récupérer chacune des composantes R G B de l'objet colorRGB
	}, //
	
	hexToRed: function(h) {	//Conversion Couleur	
		return parseInt((claude.prototype.log.cutHex(h)).substring(0,2),16);
	},
	hexToGreen: function(h) {	//Conversion Couleur	
		return parseInt((claude.prototype.log.cutHex(h)).substring(2,4),16);
	},
	hexToBlue: function(h) {	//Conversion Couleur	
		return parseInt((claude.prototype.log.cutHex(h)).substring(4,6),16);
	},
		
	cutHex: function(h) {	//Conversion Couleur	
		return (h.charAt(0)=="#") ? h.substring(1,7):h;
	},
	
	isNotNull: function(elt){ //
		(elt == null)?  retour = false:  retour = true;
		return retour; //renvoie true si la donnée n'est pas null
	}, //
	
	isNull: function(elt){ //
		(elt == null)?  retour = true:  retour = false;
		return retour; //renvoie true si la donnée est null
	}, //
	
	isNumber: function(elt){
		return typeof elt === "number";
	},
	
	isString: function(elt){
		return typeof elt === "string";
	},
	
	isUndefined: function(elt) {
		return typeof elt === "undefined"; //retourne true si undefined
	},
	
	isNotUndefined: function(elt) {
		var reponse = typeof elt === "undefined";
		return !reponse; //renvoie false si undefined
	},
		
	
	isArray: function(elt) {
		/* ---------------------------------------
		Array et Object avec typeof retourne "object";
		Array possède une propriété length qui peut être 0 si aucun élément dans le tableau;
		Object n'a pas de propriété length et Object.length => undefined
		-------------------------------------------- */
		return typeof elt === "object" && (elt.length > -1); 
	},
	
	isObject: function(elt) {
		/* -------------------------------------------------
		Object et Array avec typeof retourne "object";
		Object n'a pas de propriété length et Object.length => undefined;
		Array a toujours une propriété length qui peut être égale à 0 en l'absence d'élément dans le tableau
		------------------------------------------ */
		return	typeof elt === "object" && typeof elt.length === "undefined";
	},
	
	isTable: function(elt){
		/* --------------------------
		on cherche à tester un objet <table>
		<table> est un objet avec une collection rows
		-------------------------------- */
		return typeof elt === "object" && typeof elt.length === "undefined" && elt.rows != null;
	},
	
	isFunction: function(elt) {
		/* ------------------------------------------
		une classe JSON: var a={} retourne "object" et non pas "function" avec typeof;
		une classe closure retourne "function"
		les "function" ont une propriété length qui semble toujours = 0!
		----------------------------------------- */
		return typeof elt === "function"; 
	},
	
	isWhat: function(elt){ //return un "string" donnant le type de l'élément 
		if (elt == null) return "null";
		if (typeof elt === "number") return "number";
		if (typeof elt === "string") return "string";
		if (typeof elt === "undefined") return "undefined";
		if (typeof elt === "object" && (elt.length > -1)) return "array";
		if (typeof elt === "object" && typeof elt.length === "undefined") return "object";
		if (typeof elt === "function") return "function";
		if (typeof elt === "object" && typeof elt.length === "undefined" && elt.rows != null)	return "HTML <TABLE>";
		if (!!(elt && elt.nodeType == 1))	return "HTML Object";
	},
	
	isHTML: function (elt){	//elt est soit un objet soit un id: renvoie true si objet HTML; sinon false
		return !!(elt && elt.nodeType == 1); // issu de la classe Prototype: true si elt HTML autrement false
	},
	
	isDefined: function(variableAsString, defaultValue) { 
		/* ------------------------------------------------------------------
		variableAsString:  c'est à dire si data est le nom de la variable, reçoit "data"
		defaultValue: si defaultValue existe, la variable sera crée avec cette valeur
		
		Permet de tester que la variable existe, est déclarée, ce qui est différend de undefined où la variable existe mais n'est affectée d'aucune valeur
		Cela entraine donc une erreur d'où la gestion d'erreur associée à ce programme.
		----------------------------------------------- */
		var erreur = false;
		try {
			eval(variableAsString); //evalue, calcule la variable
		} 
		catch(error) {
			erreur = true; //il y a une erreur, donc la variable n'est pas définie
			//alert("catch: "+error); 
		}
		finally {
			if(erreur && defaultValue != undefined)	{eval(variableAsString + "= '" + defaultValue+"';")}; //donne une valeur par defaut à la variable testée si elle n'existe pas
			return !erreur; // false si variable non définie initialement
		}
	},
	
	isNotDefined: function(variableAsString, defaultValue) {
		/* ------------------------------------------------------------------
		variableAsString:  c'est à dire si data est le nom de la variable, reçoit "data"
		defaultValue: si defaultValue existe, la variable sera crée avec cette valeur
		
		Permet de tester que la variable existe, est déclarée, ce qui est différend de undefined où la variable existe mais n'est affectée d'aucune valeur
		Cela entraine donc une erreur d'où la gestion d'erreur associée à ce programme.
		----------------------------------------------- */
		var erreur = false; //nous supposons qu'il n'y a pas d'erreur donc que la variable existe, est définie!
		try {
			eval(variableAsString); //evalue, calcule la variable
		} 
		catch(error) {
			erreur = true; //il y a une erreur, donc la variable n'est pas définie
			//alert("catch: "+error); 
		}
		finally {
			if(erreur && defaultValue != undefined)	{eval(variableAsString + "= '" + defaultValue+"' ;")}; //donne une valeur par defaut à la variable testée si elle n'existe pas
			return erreur; // true si variable non définie initialement
		}
	},
	
	isHash: function(elt) { // fonction issu de la classe Prototype 
		return elt instanceof Hash;
	},
	
	generatePassword: function(plength){ //	
		//Un generateur de mot de passe - par lecodejava.com
		if (!plength) var plength=16; //alloue une longueur par défaut
		var keylist="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
		var password=""; //initialise le password
		for (var i=0; i<plength; i++)
			password += keylist.charAt(Math.floor(Math.random()*keylist.length)); //calcule le mot de passe rendu aléatoire pat Math.random, Math.floor retourne un entier
		return password;
	},
	
	aleatoire: function(nombreTirages, nombreMax, nombreMini){
		/* --------------------------
		PLF- http://www.jejavascript.net/
		Ce script effectue un tirage où chaque numéro ne peut être tiré qu'une seule fois.
		On tire nombreTirages nombre compris entre nombreMini et nombreMax
		si nombreMini est ommis, alors nombreMini vaut 1
		----------------------------- */
		var contenuTirage = new Array;
		var nombre;
		if (!nombreMini)	nombreMini = 1; //gestion d'erreur
		var nombreMaxTirages = nombreMax - nombreMini +1;
		if (nombreTirages > nombreMaxTirages)		nombreTirages = nombreMaxTirages; //gestion erreur
		for (i=0; i < nombreTirages ;i++){
			nombre = Math.floor(Math.random() * nombreMax)+1; //retourne un nombre au hasard entre 1 et nombreMax
			if (nombre >= nombreMini){
				contenuTirage[i]= nombre;
				for (t=0 ; t < i ;t++){
					if (contenuTirage[t]==nombre){ //si nombre existe déjà refait un tirage en décrémentant i
						i--;
					}
				}
			}
			else i--;
		}
		if (nombreTirages == 1){
			var retour = contenuTirage[0];
			return retour;
		}
		return contenuTirage;
	},
	fin: ""
};

claude.prototype.user = { //browser navigateur
	IE: navigator.userAgent.indexOf('MSIE') > -1,
	FF: navigator.userAgent.indexOf('Firefox') > -1,
	Opera:  Object.prototype.toString.call(window.opera) == '[object Opera]',
	WebKit:         navigator.userAgent.indexOf('AppleWebKit/') > -1,
	Gecko:          navigator.userAgent.indexOf('Gecko') > -1 && navigator.userAgent.indexOf('KHTML') === -1,
	Chrome:			navigator.userAgent.indexOf('Chrome') > -1,
	MobileSafari:   /Apple.*Mobile/.test(navigator.userAgent),
	fin: ""
};

claude.prototype.style = { //gestion des styles
	appendStyle: function (styles) {// permet ajouter un style CSS via un fichier js, le CSS est inclus dans le js
		/* -------------------------------------------
		Appending Style Nodes with Javascript by Jon Raasch
		
		Permet d'ajouter des styles directement dans un js
		Il faut définir les styles comme ceci:
		
		var styles = '#header { color: red; font-size: 40px; font-family: Verdana, sans; }';
		styles += ' .content { color: blue; text-align: left; }';
		---------------------------------------- */
		var css = document.createElement('style');
		css.type = 'text/css';
		
		if (css.styleSheet) css.styleSheet.cssText = styles;
		else css.appendChild(document.createTextNode(styles));
		
		document.getElementsByTagName("head")[0].appendChild(css); //ajoute le style
		return true;
	},//
	
	isClassName: function (sClassName){//search className
		/*
		Cherche tous les syles de type className appliqué à un objet elt
		puis recherche si le style est trouvé dans l'ensemble de ces styles
		*/
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if(elt == false || elt == null)	return null; //erreur sur elt
		var liste_className = elt.className;//retourne tous les styles de type className en une seule liste séparée par un espace
		var tab_className = liste_className.split(" ");//transforme la liste en un tableau contenant chacun des className appliqués à elt
		for(var i = 0 ; i < tab_className.length ; i++){ //parcours le tableau pour voir si l'objet est un contener
			if(tab_className[i] == sClassName){
				return true; //trouvé !
			}
		}
		return false; //non trouvé!
	}, //
	
	addClassName: function(sClassName) { //ajoute un className
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if(elt == false || elt == null)	return null; //erreur sur elt
		var s = elt.className;
		var p = s.split(" ");
		var l = p.length;
		for (var i = 0; i < l; i++) {
			if (p[i] == sClassName)
				return; //renvoie undefined la classe existe déjà!
		}
		p[p.length] = sClassName;
		elt.className = p.join(" ").replace( /(^\s+)|(\s+$)/g, "" );
		return true;
	}, //
	
	removeClassName: function(sClassName) {//retire un className
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if(elt == false || elt == null)	return null; //erreur sur elt
		var s = elt.className;
		var p = s.split(" ");
		var np = [];
		var l = p.length;
		var j = 0;
		for (var i = 0; i < l; i++) {
			if (p[i] != sClassName)
				np[j++] = p[i];
		}
		elt.className = np.join(" ").replace( /(^\s+)|(\s+$)/g, "" );
		return true;
	}, //
	
	unit: "px", //fourni l'unité de mesure: exemple: "px"
	
	getStyle: function(str_style) { //lit la valeur du style 
		/* -----------------------------------
		getstyle() renvoie la valeur du style
		id_element est l'identificateur de l'élément (div, img ...), donc String, mais gère aussi les object
		style est le nom du style dont la valeur sera retournée: width, height, top, left ...
		en fonction de la propriété testée getstyle retourne une String ou un Interger, voire #FFF ou rgb() ...
		------------------------- */
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if(elt == false || elt == null)	return null; //erreur sur elt
		var str_value = (elt).style[claude.prototype.style.toJavascriptStyleName(str_style)]; //lecture des styles intégré au code HTML
		if(!str_value){ //lecture de style dans un fichier CSS ou équivallent
			if(document.defaultView)	str_value = document.defaultView.getComputedStyle(elt, null).getPropertyValue(str_style); //FF et Opera
			else if((elt).currentStyle)	str_value = (elt).currentStyle[claude.prototype.style.toJavascriptStyleName(str_style)]; //IEX
		}
		return str_value; //String: => width: "100px",  faire:  parseInt(str_value) pour integer
	}, // 
	
		
	
	setStyle: function(str_style, str_value) {	// applique un style 
		/* ------------------------------
		setstyle() sert à définir, à appliquer une valeur à une style
		(elt) est l'identificateur de l'élément: div, img, donc String, mais gère aussi les object
		str_style est le nom du style à modifier: width, top, ... au format html avec tiret et String
		str_value est la nouvelle valeur du style à appliquer à id_element
		----------------------------- */
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if(elt == false || elt == null)	return null; //erreur sur elt
		//alert("classe style: " + elt.id);
		var op_correct = false;
		if (elt)	op_correct = (elt).style[claude.prototype.style.toJavascriptStyleName(str_style)] = str_value; //retourne str_value si opération correctement effectuée
		return op_correct;
	},	// 
	
	
	getUnit: function(str_value){ // retourne l'unité utilisée; exemple: "px" 
		if (!str_value)	str_value = claude.prototype.style.unit; //fourni une valeur par défaut
		var modele = /[0-9]/g; //recherche tous les nombres
		claude.prototype.style.unit = str_value.replace(modele, ""); //retourne la partie texte, donc l'unité utilisée
		return claude.prototype.style.unit; //String
	},	// 
	
	getWidth: function(){	// 
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var str_value = claude.prototype.style.getStyle("width");
		if (str_value == "auto"){ //gestion pour IE qui retourne auto si la table s'ajsute automatiquement à la fenetre
			var largeur = elt.offsetWidth;
			claude.prototype.style.unit = "px";
		}
		else {
			var largeur =  parseInt(str_value); 
			claude.prototype.style.unit = claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		}
		return parseInt(largeur); // c'est un integer
	},	// 
	
	setWidth: function(str_value){	//	
		str_value = (claude.prototype.log.isString(str_value)) ? str_value : str_value + "px"; //vérifie que c'est un String
		claude.prototype.style.unit = claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		claude.prototype.style.setStyle("width", str_value); //applique le style
		return parseInt(str_value); //retourne un integer
	},	//	
	
	getTruePosition: function(){ // retourne la position d'un elt par rapport à la page (y compris avec ascenseur et parent en position absolue) 
		/*----------
		script trouvé sur: http://forum.hardware.fr/hfr/Programmation/HTML-CSS-Javascript/javascript-connaitre-position-sujet_45951_1.htm
		code de Hermés le messager sur ce forum
		
		<img src="../images/back.gif" width="116" height="16" id="smile01" class="dragRelative" >
		var pos = claude.prototype.style.getpos("smile01");
		pos.x contient la position par rapport au bord gauche de la page web, soit un offsetLeft global
		pos.y contient la position par rapport au bord haut de la page web, soit un offsetTop global
		-------- */
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var objet = new Object(); //genère un objet; si objet = elt on provoque une erreur avec FF version 3, mais avec les nouvelles versions de FF ni IE
		var x = 0;
		var y = 0;
		while (elt.tagName != 'BODY'){ //tant que BODY n'est pas le parent
			x += elt.offsetLeft;
			y += elt.offsetTop;
			elt = elt.offsetParent;
		}
		objet.x = x; //offsetLeft global à la page web
		objet.y = y; //offsetTop global à la page web
		//alert("getPos: "+x+" : "+y);
		return objet; //contient l'objet HTML initial avec 2 propriétés x=left; y=top par rapport à la page web même si ascenseur
	}, // 
	 
	getTrueLeft: function(){ // position left par rapport à la page y compris si ascenseur et parent en position absolue 
		var position = claude.prototype.style.getTruePosition(); //retourne x, y postion de elt par rapport à la page y compris si ascenseur et parent en position absolue
		return position.x; // x => left: as integer
	}, // 
	
	getTrueTop: function(){ // position top par rapport à la page y compris si ascenseur et parent en position absolue 
		var position = claude.prototype.style.getTruePosition(); //retourne x, y postion de elt par rapport à la page y compris si ascenseur et parent en position absolue
		return position.y; // y => top: as integer
	}, // 
	
	getTrueHeight: function() { //taille réelle d'une image ici height
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var newImg = new Image();// Declaration d'un objet Image
		newImg.src = elt.src;// Affectation du chemin de l'image a l'objet
		var h = newImg.height;// On recupere les tailles reelles
		var w = newImg.width;// On recupere les tailles reelles
		newImg = null; //détruit image
		return h; //as integer
	}, // 
	
	getTrueWidth: function() { //taille réelle d'une image ici width
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var newImg = new Image();// Declaration d'un objet Image
		newImg.src = elt.src;// Affectation du chemin de l'image a l'objet
		var h = newImg.height;// On recupere les tailles reelles
		var w = newImg.width;// On recupere les tailles reelles
		newImg = null; //détruit image
		return w; //as integer
	}, // 
	
	
	setTop: function(str_value){	//	
		str_value = (claude.prototype.log.isString(str_value)) ? str_value : str_value + "px"; //vérifie que c'est un String
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		claude.prototype.style.setStyle("top", str_value); //applique le style
		return parseInt(str_value); //retourne un integer
	},	//	
	
	getTop: function(){	//	
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var str_value = claude.prototype.style.getStyle("top");
		if (str_value == "auto")	str_value = elt.offsetTop + "px";
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		return parseInt(str_value); //integer
	}, 	//	
	
	setLeft: function(str_value){	//	
		var str_value = (claude.prototype.log.isString(str_value)) ? str_value : str_value + "px"; //vérifie que c'est un String
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		claude.prototype.style.setStyle("left", str_value); //applique le style
		return parseInt(str_value); //retourne un integer
	},	//	
	
	getLeft: function(){	//	
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var str_value = claude.prototype.style.getStyle("left");
		if (str_value == "auto")	str_value = elt.offsetLeft + "px";
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		return parseInt(str_value); //integer
	}, 	//	
	
	setPosition: function(strPosition){ //	
		claude.prototype.style.setStyle("position", strPosition); //absolute, relative, static
		return strPosition;
	},	//	
	
	getPosition: function(){	//	
		var strPosition = claude.prototype.style.getStyle("position"); 
		return strPosition;
	},	//	
	
	getRight: function(){ //	
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var str_value = claude.prototype.style.getStyle("right");
		if (str_value == "auto")	str_value = elt.offsetRight + "px";
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		return parseInt(str_value); //integer
	}, //	
	
	setRight: function(str_value){	//	
		var str_value = (claude.prototype.log.isString(str_value)) ? str_value : str_value + "px"; //vérifie que c'est un String
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		claude.prototype.style.setStyle("right", str_value); //applique le style
		return parseInt(str_value); //retourne un integer
	}, // 
	
	getHeight: function(){ //	
		var str_value = claude.prototype.style.getStyle("height");
		if (str_value == "auto")	str_value = elt.offsetHeight + "px";
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		return parseInt(str_value); //integer
	}, //	
	
	setHeight: function(str_value){	//	
		var str_value = (claude.prototype.log.isString(str_value)) ? str_value : str_value + "px"; //vérifie que c'est un String
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		claude.prototype.style.setStyle("height", str_value); //applique le style
		return parseInt(str_value); //retourne un integer
	}, // 
	
	
	setBottom: function(str_value){	//	
		var str_value = (claude.prototype.log.isString(str_value)) ? str_value : str_value + "px"; //vérifie que c'est un String
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		claude.prototype.style.setStyle("bottom", str_value); //applique le style
		return parseInt(str_value); //retourne un integer
	},	//	
	
	getBottom: function(){	//	
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		var str_value = claude.prototype.style.getStyle("bottom");
		if (str_value == "auto")	str_value = elt.offsetBottom + "px";
		claude.prototype.style.getUnit(str_value); //unité utilisée: claude.prototype.style.unit
		return parseInt(str_value); //integer
	}, 	//	
	
	setVisibility: function(strVisibility){ //	
		if (strVisibility == true) var strVisibility = "visible";
		if (strVisibility == false) var strVisibility = "hidden";
		claude.prototype.style.setStyle("visibility", strVisibility); 
		return strVisibility;
	},	//	
	
	getVisibility: function(){	//	
		var strVisibility = claude.prototype.style.getStyle("visibility"); 
		return strVisibility;
	},	//	
	
	setMultipleStyle: function(str_style){ // 
		/* ----------------------------
		Reçoit une chaine de caractères de type : position:absolute; left: 10px; top: 20px;
		Applique alors chacun de ces styles en appelant styleExtraction()
		--------------------- */
		var table_array = claude.prototype.style.styleExtraction(str_style); //retourne la liste des styles et leur valeur décomposée en un seul array
		for (var i=0; i<table_array.length; i = i+2) { //parcours le tableau contenant le nom et la valeur des styles à appliquer
			claude.prototype.style.setStyle(table_array[i], table_array[i+1]); //i est le nom du style, i+1 sa valeur à appliquer
		}
		return str_style; //as String
	}, // 
	
	styleExtraction: function(chaine){ // 
		/* -----------------------------------------
		En HTML il est possible de définir un style comme suit:
		<img src="image.gif" style="position: absolute; border: 1px;" />
		Nous avons souhaité reproduire dans la classe style cette possibilité
		Ecrire sur une seule ligne plusieurs instructions de style
		Tout en gardant également un format similaire au HTML
		Il nous fallait alors pouvoir décomposer cette ligne en instruction pour chacun des styles employés
		Tel est le rôle de styleExtraction() qui fonctionne avec setMultipleStyle()
		------------------------------------------- */
		var chaine = claude.prototype.log.trim(chaine); //supprime les espaces en début et fin de chaine
		var reg=new RegExp("[ :;]+", "g"); //expression régulière, recherche dans toute la chaineles caractères : et ; en éliminant les espaces interne
		var tableau = chaine.split(reg); //transforme la chaine de caractères en tableau en fonction des critères de recherche de l'expression régulière
		var fin = tableau.length -1; //cherche l'indice du dernier élément du tableau
		if (tableau[fin].length == 0) tableau.pop(); //supprime le dernier élément si son contenu est null
		return tableau; //retourne un tableau à partir de la chaine de caractères passée en paramètre
	}, // 
	
	toJavascriptStyleName: function(text){ // 
		/* ----------------------------------------
		En HTML le nom de certains styles s'écrive avec un tiret comme: background-color
		Ce même style en javascript s'écrit	en supprimant le tiret: backgroundColor
		toJavascriptStyleName() permet de transformer un style composé avec tiret en un style format javascript
		sur les autres nom de style, rien ne se produit
		---------------------------- */
		var modele= /-/;
		while(modele.test(text)){
			var pos=text.search(modele);
			text=text.substring(0, pos) + text.charAt(pos+1).toUpperCase() + text.substring(pos+2, text.length);
		}
		return text;
	}, // 
	
	setOpacity: function(opacity) { // Opacité 
		/* ---------------------
		script trouvé sur: http://www.supportduweb.com/scripts_tutoriaux-code-source-32-changer-l-opacite-d-un-div-alpha-compatibles-avec-tous-les-navigateurs.html
		opacity as integer between 0 /100
		100 => opacité = 100% le texte est normal
		0 => opacité = 0% le texte est totalement transparent, donc un texte en noir sur fond blanc avec opacity=0 disparaît! => totalement transparent
		------------------------- */
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (!elt) return false;
		elt.style["filter"] = "alpha(opacity="+opacity+")"; //IE => filter:alpha(opacity=0);
		elt.style["-moz-opacity"] = opacity/100;
		elt.style["-khtml-opacity"] = opacity/100;
		elt.style["opacity"] = opacity/100;
		return opacity;
	},
	fin: ""								
}; //end of style	

claude.prototype.ajax = {
	/** http://www.siteduzero.com/tutoriel-3-100294-l-objet-xmlhttprequest.html */
	allResponseHeaders: false, //return un ensemble de propriétés
	server: false,	//type du serveur qui retourne la réponse
	contentType: false, //text/html; 	application/xml; 	text/plain
		
	getArgument: function (objetAppelant) { //lit et met en forme les formulaires pour transmissions des arguments
    	//liste tous les éléments du formulaire
        var argument="";
        for (var i=0;i<document.forms.length; i++){
			for(var j=0; j<document.forms[i].elements.length; j++){
				//parcours tous les champs de tous les formulaires
				id=document.forms[i].elements[j].id;
				type=document.forms[i].elements[j].type;
				switch (type) {
					case 'checkbox':
						if (document.forms[i].elements[j].checked)
								valeur=document.forms[i].elements[j].value; //renvoie value
						else valeur="false";
						if (argument)
								argument += "&"+id+"="+valeur;
						else
								argument = id+"="+valeur;
						break;
					case 'radio':
						if (document.forms[i].elements[j].checked) valeur=document.forms[i].elements[j].value;
						else valeur="false";
						if (argument)
								argument += "&"+id+"="+valeur;
						else
								argument = id+"="+valeur;
						break;
					case 'button':
						if (objetAppelant.id==id) valeur=document.forms[i].elements[j].value;
						else valeur="false";
						if (argument)
								argument += "&"+id+"="+valeur;
						else
								argument = id+"="+valeur;
						break;
					case 'select-multiple':
						valeur="false";
						nbrElement=document.forms[i].elements[j].length;
						for(var x=0; x<nbrElement; x++){
								if(document.forms[0].elements[j].options[x].selected) {
										 (valeur=="false")? valeur=document.forms[0].elements[j].options[x].value: valeur += ":"+document.forms[0].elements[j].options[x].value;
								}
						}
						if (argument)
								argument += "&"+id+"="+valeur;
					   else
								argument = id+"="+valeur;
					   break;
					default:
						//text, textarea, select-one
						valeur=document.forms[i].elements[j].value;
						if (!valeur) valeur="false";
						if (argument)
								argument += "&"+id+"="+valeur;
						else
								argument = id+"="+valeur;
						break;
				}
		   }
        }
        return argument;
    },
	
	getXMLHttpRequest: function() { //retourne un objet XHR XmlHttpRequest
		var xhr = null;
		if (window.XMLHttpRequest || window.ActiveXObject) {
			if (window.ActiveXObject) {
				try {
					xhr = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}
			} else {
				xhr = new XMLHttpRequest(); 
			}
		} else {
			alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
			return null;
		}
		return xhr;
	},
	
	request: function (callback, pagePHP, requete) { // cnx().ajax.request(readData2, "../2012_06/test_ajax.php", null);
		/*
		var synchrone = false; //le script va attendre que la requete AJAX vers le serveur soit faite pour se poursuivre: Utiliser dans xhr.open()
		var asynchrone =  true; //le script n'attend pas la fin de la requete: Utiliser dans xhr.open()
		var methode = "POST"; // GET
		*/
		var xhr = claude.prototype.ajax.getXMLHttpRequest();
		claude.prototype.ajax.contentType = false; //force à false, même avec requete = null renvoi html si exécution correcte, même en abscence de echo dans pagePHP

		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				claude.prototype.ajax.allResponseHeaders = xhr.getAllResponseHeaders(); //retourne toutes les caractéristiques
				claude.prototype.ajax.server = xhr.getResponseHeader('Server'); //type du serveur
				claude.prototype.ajax.contentType = xhr.getResponseHeader('Content-Type'); // xml; plain; html ... - type de response par le serveur
				/*Détermine si response est de type xml ou pas */
				if ( claude.prototype.ajax.contentType.indexOf("xml") == -1)	callback(xhr.responseText); //pour mémoire si (indexOf == -1) => ne contient pas
				else	callback(xhr.responseXML); // xhr.responseXML ou xhr.responseText
			}
		}
		xhr.open("POST", pagePHP, true); //Pour FF, il faut être en mode asynchrone - le script n'attend pas la fin de la requete
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Si vous utilisez la méthode POST, vous devez absolument changer le type MIME de la requête avec la méthode setRequestHeader , sinon le serveur ignorera la requête :
		xhr.send(requete);
	},
	
	postSyn: function (pagePHP, requete) { // cnx().ajax.postSynchro("../2012_06/test_ajax.php", null);
		/*
		var synchrone = false; //le script va attendre que la requete AJAX vers le serveur soit faite pour se poursuivre: Utiliser dans xhr.open()
		var asynchrone =  true; //le script n'attend pas la fin de la requete: Utiliser dans xhr.open()
		var methode = "POST"; // GET
		*/
		var xhr = claude.prototype.ajax.getXMLHttpRequest();
		claude.prototype.ajax.contentType = false; //force à false, même avec requete = null renvoi html si exécution correcte, même en abscence de echo dans pagePHP
		//pas de readystatechange avec le mode synchronisation
		xhr.open("POST", pagePHP, false); //mode synchronisation, le script attend la réponse du serveur
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Si vous utilisez la méthode POST, vous devez absolument changer le type MIME de la requête avec la méthode setRequestHeader , sinon le serveur ignorera la requête :
		xhr.send(requete);
		claude.prototype.ajax.allResponseHeaders = xhr.getAllResponseHeaders(); //retourne toutes les caractéristiques
		claude.prototype.ajax.server = xhr.getResponseHeader('Server'); //type du serveur
		claude.prototype.ajax.contentType = xhr.getResponseHeader('Content-Type'); // xml; plain; html ... - type de response par le serveur
		/*Détermine si response est de type xml ou pas */
		if ( claude.prototype.ajax.contentType.indexOf("xml") == -1)	return xhr.responseText; //pour mémoire si (indexOf == -1) => ne contient pas
		else	return xhr.responseXML; // xhr.responseXML ou xhr.responseText
	},
	
	phpPostSyn: function (){//permet d'appeler une fonction PHP depuis javascript méthode post mode synchro, admet un paramètre en retour, attente du serveur
		/* ----------------------------
		var echo = cnx().ajax.phpPostSyn(strPagePHP, strFonctionPHP, a, b);
		
		reçoit à minima 2 paramètres
		arguments[0]: type String; contient le nom de la page PHP contenant la fonction PHP à appeler, doit avoir un include read_parametre3.inc ou équivallent pour fonctionner
		arguments[1]: type String; contient le nom de la fonction PHP à appeler
		arguments[x >+ 2]: les autres arguments transmis à la fonction PHP
		----------------------- */
		var pagePHP = arguments[0]; //page PHP contenant la fonction PHP à appeler
		var fonctionPHP = arguments[1]; // nom de la fonction php à appeler
		var requete = "cnxFunc=" + fonctionPHP;
		for (x=2; x<arguments.length; x++){
			requete += "&arg"+x+"="+arguments[x];
		}
		var echo = claude.prototype.ajax.postSyn(pagePHP, requete);
		return echo;
	},
	
	phpPostAsyn: function (){//permet d'appeler une fonction PHP depuis javascript méthode post mode Asynchro, n'admet pas de paramètre en retour, pas attente du serveur
		/* ----------------------------
		var echo = cnx().ajax.phpPostAsyn(strPagePHP, strFonctionPHP, callback, a, b);
		
		reçoit à minima 3 paramètres
		arguments[0]: type String; contient le nom de la page PHP contenant la fonction PHP à appeler, doit avoir un include read_parametre3.inc ou équivallent pour fonctionner
		arguments[1]: type String; contient le nom de la fonction PHP à appeler
		argument[2]: type function; contient la fonction callback qui assure le retour en mode Asynchrone; c'est une fonction, n'est pas de type String mais de type Function !!!
		arguments[x > 2]: les autres arguments transmis à la fonction PHP
		----------------------- */
		var pagePHP = arguments[0]; //page PHP contenant la fonction PHP à appeler
		var fonctionPHP = arguments[1]; // nom de la fonction php à appeler
		var callback = arguments[2]; // fonction appelée en callback par le mode Asynchrone - pas d'attente du serveur
		var requete = "cnxFunc=" + fonctionPHP;
		for (x=3; x<arguments.length; x++){
			requete += "&arg"+x+"="+arguments[x];
		}
		var echo = claude.prototype.ajax.request(callback, pagePHP, requete);
		return echo;
		/* -----------------------
		La fonction callback est en fait une fonction d'affichage des données reçues du serveur; elle peut aussi traiter ces données pour une meilleure compréhension!
		exemple de fonction callback; ici readData(); les données data sont fournies par la réponse du serveur!
		
		function readData(data){
			var table = document.getElementById("table");
			var row = 4;
			var cellIndex = 3;
			table.rows[row].cells[cellIndex].innerHTML = data;
		}
		
		Les données data en retour du serveur peuvent être soit de type XML ou autre.
		Il vous appartient de le tester dans votre fonction callback si vous avez un doute.
		Tout code XML commence par : <?xml
		Vous pouvez donc tester data.indexOf("<?xml") qui renvoie -1 si pas trouvé, autrement la position de l'instruction recherchée.
		------------------------- */
	},
	
	fin: ""
}; //end of ajax

claude.prototype.xml = {
	/* ------------------------
	code source origine jsLib de Etienne CHEVILLARD
	http://jslib.sourceforge.net/index_fr.html
	--------------------- */
	getRacine: function(){ // retourne le noeud XML racine du document XML
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (elt == null)	return false; //elt n'est pas de type xml
		var elts = elt.childNodes;
		if (elts.length < 1) return false; //elt n'est pas de type xml
		for (var i=0; i < elts.length; i++) {
			if (parseInt(elts[i].nodeType) == 1)
			return(elts[i]);
		}
		return false; //elt n'est pas de type xml
	},
	
	
	getName: function() { // retourne le nom du noeud XML passe en parametre
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (elt == null)	return false; //elt n'est pas de type xml
		if (elt.nodeName) return (elt.nodeName);
		if (elt.name) return (elt.name);
		return false;
	}, // fin obtenirNomNoeud(noeud)
	
	getValue: function () { // retourne la valeur du noeud XML passe en parametre
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (elt == null)	return false; //elt n'est pas de type xml
		if ((!elt) || (!elt.firstChild)) return false;
		if (elt.firstChild.nodeValue) return (claude.prototype.log.trim(elt.firstChild.nodeValue)); //supprime les espaces en début et fin de String
		if (elt.firstChild.data) return (claude.prototype.log.trim(elt.firstChild.data));
		return false;
	}, // fin obtenirValeurNoeud(noeud)
	
	getComments: function () { // retourne les commentaires du document XML
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (elt == null)	return false; //elt n'est pas de type xml
		var elts = elt.childNodes;
		var txt="";
		if (elts.length < 1) return txt;
		for (var i=0; i<elts.length; i++) {
			if (parseInt(elts[i].nodeType) == 8) {
			  if (txt!="") txt+="\n";
			  txt+=claude.prototype.log.trim(elts[i].nodeValue);
			}
		}
		return txt;
	}, // fin obtenirCommentaires()
	
	getParent: function() { // retourne le noeud pere du noeud XML passe en parametre
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (elt == null)	return false; //elt n'est pas de type xml
		if (elt.parentNode) return (elt.parentNode);
		return false;
	}, // fin obtenirNoeudPere(noeud)
	

	getLength: function(strNomNoeud) { // compte le nombre de noeuds XML de nom specifie
		var elt = claude.prototype.dom.getElt(); //retourne Object if exist
		if (elt == null)	return false; //elt n'est pas de type xml
		var elts = elt.getElementsByTagName(strNomNoeud);
		return (parseInt(elts.length));
	}, // fin compterNoeuds(nomNoeud)
	
	fin: ""
}; //end of xml

claude.prototype.sql = {
	/* 
	var sql = "select * from book";
	cnx().sql.sqlAsArray(sql, readData2);
	function readData2(texte){ //texte est une String contenant ce qui est affiché par la page PHP appelée par le serveur via ajax
		eval(texte); //exécute le code reçu; génère un Array nommé result[fields][rows] à deux dimensions
		alert(result[x][y] + "\n Nombre de champs: " + result.length + " \n nombre d'enregistrements: " + result[0].length);
	}
	*/
	sqlAsArray: function(sql, callback){ //retourne le résultat de la requete as Array() - result[] contient les champs de la requête
		var echo = cnx().ajax.phpPostAsyn(claude.prototype.divers.cnxClassPHP, "cnxJStoPHP->sqlAsArray", callback, sql);
	},
	
	sqlAsTable: function(sql, callback){
		var echo = cnx().ajax.phpPostAsyn(claude.prototype.divers.cnxClassPHP, "cnxJStoPHP->sqlAsTable", callback, sql);
	},
	
	sqlAsCSV: function(sql, callback, fichier){
		if (!fichier) fichier = false;
		var echo = cnx().ajax.phpPostAsyn(claude.prototype.divers.cnxClassPHP, "cnxJStoPHP->sqlAsCSV", callback, sql, fichier);
	},
	
	fin: ""
}; //end of sql