/**
 * @author Flexible User Experience SL
 * @copyright 2011
 * coded with WebStorm
 */

var FLApp = {
    langCookie        : null,
    nodeSeleccionat   : 'manifest',
    langEng           : {},
    langEsp           : {},
    langCat           : {},
	nodeManifest      : {},
	nodeProjectes     : {},
	nodeBitacora      : {},
	nodePrivacitat    : {},
	nodeAvisLegal     : {},
    changeLangSelectorStatus : function (evt) {
        evt = evt || window.event;
        var target = (typeof evt.target !== 'undefined') ? evt.target : evt.srcElement;
        if (target.id == 'leng') {
            document.getElementById("leng").className = "lang-selected";
		    document.getElementById("lesp").className = "";
		    document.getElementById("lcat").className = "";
            FLApp.langCookie = 'english';
            UT.writeCookie('user-language', 'english', 1000);
        } else if (target.id == 'lesp') {
            document.getElementById("leng").className = "";
		    document.getElementById("lesp").className = "lang-selected";
		    document.getElementById("lcat").className = "";
            FLApp.langCookie = 'espanol';
            UT.writeCookie('user-language', 'espanol', 1000);
        } else {
            document.getElementById("leng").className = "";
		    document.getElementById("lesp").className = "";
		    document.getElementById("lcat").className = "lang-selected";
            FLApp.langCookie = 'catala';
            UT.writeCookie('user-language', 'catala', 1000);
        }
        FLApp.changeLanguage();
    },
    changeLanguage : function() {
        var head    = document.documentElement.childNodes[0];
        var script  = document.createElement('script');
        script.onload = FLApp.updateDetailPanel;
        script.id   = 'i18nS'
        script.type = 'text/javascript';
        switch (FLApp.langCookie) {
            case 'english': script.src  = 'i18n/english.js'; break;
            case 'espanol': script.src  = 'i18n/espanol.js'; break;
            case 'catala' : script.src  = 'i18n/catala.js';  break;
        }
        head.removeChild(document.getElementById('i18nS'));
        head.appendChild(script);
    },
	showManifestPanel : function () {
		document.getElementById("manifest").className  = "selected";
		document.getElementById("projectes").className = "";
		document.getElementById("bitacora").className  = "";
        FLApp.nodeSeleccionat = 'manifest';
		FLApp.updateDetailPanel();
	},
	showProjectesPanel : function () {
		document.getElementById("manifest").className  = "";
		document.getElementById("projectes").className = "selected";
		document.getElementById("bitacora").className  = "";
		FLApp.nodeSeleccionat = 'projectes';
        FLApp.updateDetailPanel();
	},
	showBitacoraPanel : function () {
		document.getElementById("manifest").className  = "";
		document.getElementById("projectes").className = "";
		document.getElementById("bitacora").className  = "selected";
        FLApp.nodeSeleccionat = 'bitacora';
        FLApp.updateDetailPanel();
	},
    updateDetailPanel : function () {
        switch (FLApp.nodeSeleccionat) {
            case 'manifest':
                document.getElementById("main-right").innerHTML = "<h1>" + i18n.Manifest
                        + "</h1><p><strong>FL</strong>exible <strong>U</strong>ser e<strong>X</strong>perience (FLUX) "
                        + i18n.neix_de + ":</p><ul><li>"
                        + i18n.produir_i_comercialitzar_programari_com_a_servei + " (<a href='http://en.wikipedia.org/wiki/Software_as_a_service'>SAAS</a>)</li><li>"
                        + i18n.desenvolupar_aplicacions_web_funcionals_i_senzilles + "</li><li>"
                        + i18n.crear_interficies_d_usuari_innovadores + "</li><li>"
                        + i18n.millorar_l_experiencia_d_usuari + " (<a href='http://en.wikipedia.org/wiki/User_experience'>UX</a>)</li></ul>";
                break;
            case 'projectes':
                document.getElementById("main-right").innerHTML = "<h1>" + i18n.Projectes
                        + "</h1><p><strong><a href='http://www.skaeda.com'><img src='../images/skaeda-icon-53.png' alt='Skaeda logo' style='vertical-align:middle;'/><u>Sk&aelig;da</u></a></strong></p><p>"
                        + i18n.Es_un_gestor_personal_d_enllaços_a_pagines_web_favorites + " (<em>bookmarks</em>) "
                        + i18n.amb_les_caracteristiques_seguents + ":</p><ul><li>"
                        + i18n.organitzacio_per_carpetes_intel_ligents + "</li><li>"
                        + i18n.previsualitzacio_d_enllasos_amb_miniatura + "</li><li>"
                        + i18n.etiquetatge_social_independent_de_l_idioma + "</li><li>"
                        + i18n.aplicacio_web_en_temps_real_verdadera + "</li></ul>"
                        + "</h1><p><a>Focus-<em>n</em></a></p><p>"
                        + i18n.Focus_n_descripcio_breu + "</p><ul><li>"
                        + i18n.Focus_feature_1 + "</li><li>"
                        + i18n.Focus_feature_2 + "</li><li>"
                        + i18n.Focus_feature_3 + "</li></ul>"
                break;
            case 'bitacora':document.getElementById("main-right").innerHTML  = i18n.bitacora;  break;
        }
        FLApp.updateTabSelector();
    },
    updateTabSelector : function () {
        FLApp.nodeManifest.innerHTML  = i18n.labelManifest;
        FLApp.nodeProjectes.innerHTML = i18n.labelProjectes;
        FLApp.nodeBitacora.innerHTML  = i18n.labelBitacora;
        FLApp.updateFooterText();
    },
    updateFooterText : function () {
        FLApp.nodePrivacitat.innerHTML = i18n.labelPrivacitat;
        FLApp.nodeAvisLegal.innerHTML  = i18n.labelAvisLegal;
    },
	showPrivacitatDialog : function () {
		document.getElementById("overlay-modal-dialog").innerHTML = i18n.privacitat;
		document.getElementById("warning").style.top  = ((window.innerHeight/2)-110) + 'px';
		document.getElementById("warning").style.left = ((window.innerWidth/2)-200) + 'px';
		document.getElementById("overlay-modal-dialog").style.visibility = 'visible';
	},
	showAvisLegalDialog : function () {
		console.log("[showAvisLegalDialog]");
	},
	cancelModalDialog : function () {
		document.getElementById("overlay-modal-dialog").style.visibility = 'hidden';
	},
	initViewController : function () {
        FLApp.langEng        = document.getElementById("leng");
        FLApp.langEsp        = document.getElementById("lesp");
        FLApp.langCat        = document.getElementById("lcat");
		FLApp.nodeManifest   = document.getElementById("manifest");
		FLApp.nodeProjectes  = document.getElementById("projectes");
		FLApp.nodeBitacora   = document.getElementById("bitacora");
		FLApp.nodePrivacitat = document.getElementById("privacitat");
		FLApp.nodeAvisLegal  = document.getElementById("avis-legal");
        UT.addEventHandler(FLApp.langEng,        "click", FLApp.changeLangSelectorStatus);
        UT.addEventHandler(FLApp.langEsp,        "click", FLApp.changeLangSelectorStatus);
        UT.addEventHandler(FLApp.langCat,        "click", FLApp.changeLangSelectorStatus);
		UT.addEventHandler(FLApp.nodeManifest,   "click", FLApp.showManifestPanel);
		UT.addEventHandler(FLApp.nodeProjectes,  "click", FLApp.showProjectesPanel);
		UT.addEventHandler(FLApp.nodeBitacora,   "click", FLApp.showBitacoraPanel);
		UT.addEventHandler(FLApp.nodePrivacitat, "click", FLApp.showPrivacitatDialog);
		UT.addEventHandler(FLApp.nodeAvisLegal,  "click", FLApp.showAvisLegalDialog);
        FLApp.updateDetailPanel();
	}
};

function initPage() {
    FLApp.langCookie = UT.readCookie('user-language');
    if (FLApp.langCookie == null) FLApp.langCookie = 'catala';
    var head   = document.documentElement.childNodes[0];
    var script = document.createElement('script');
    script.onload = FLApp.initViewController;
    script.id   = 'i18nS'
    script.type = 'text/javascript';
    switch (FLApp.langCookie) {
        case 'english':
            script.src  = 'i18n/english.js';
            document.getElementById("leng").className = "lang-selected";
            break;
        case 'espanol':
            script.src  = 'i18n/espanol.js';
            document.getElementById("lesp").className = "lang-selected";
            break;
        case 'catala' :
            script.src  = 'i18n/catala.js';
            document.getElementById("lcat").className = "lang-selected";
            break;
    }
    head.appendChild(script);
}

function closePage() {
    delete UT;
    delete FLApp;
}

window.onload   = initPage;
window.onunload = closePage;