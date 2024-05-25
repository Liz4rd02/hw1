function Menu(event){
    const menuButton = event.currentTarget;
    const menu = document.querySelector('#menu');

    if(menuButton.classList.contains('active')){
        menuButton.classList.remove('active');
        menu.classList.add('hidden');
    }
    else{
        menuButton.classList.add('active');
        menu.classList.remove('hidden');
    }
}
/*********************************************************/

function openFAQMenu(event){
    const menuButton = event.currentTarget;
    menuButton.removeEventListener('click', openFAQMenu);
    menuButton.addEventListener('click', closeFAQMenu);

    /* Creazione elementi */
    const FAQinfo = document.createElement('div');
    FAQinfo.id = "FAQ-info"; 

    const span = document.createElement('span');
    span.textContent = "Contact Us";

    const a = document.createElement('a')
    a.textContent = "Help Center";
    a.href ="https://opgg.helpscoutdocs.com/collection/1-league-of-legends";

    const headerEnding = document.querySelector("#header-ending");
    headerEnding.appendChild(FAQinfo);
    FAQinfo.appendChild(span);
    FAQinfo.appendChild(a);
}

function closeFAQMenu(event){
    const menuButton = event.currentTarget;
    menuButton.removeEventListener('click', closeFAQMenu);
    menuButton.addEventListener('click', openFAQMenu);

    const FAQinfo = document.querySelector("#FAQ-info");
    FAQinfo.remove();
}

/*********************************************************/

function changeLightMode(event){
    const colorModeButton = event.currentTarget;
    const body = document.querySelector('body');
    const colorModeInfo = document.querySelector('#colorModeInfo');
    const playeroftheweekLogo = document.querySelector('#POW-logo');

    if(body.classList.contains('light')){
        body.classList.remove('light');
        body.classList.add('dark');

        colorModeButton.src = 'https://s-lol-web.op.gg/images/icon/icon-darkmode.svg';
        colorModeInfo.textContent="Dark mode";
        if(playeroftheweekLogo) playeroftheweekLogo.src = 'https://s-lol-web.op.gg/static/images/esports/logo-pow-white.svg?v=1710914129937';
    }

    else{
        body.classList.remove('dark');
        body.classList.add('light');

        colorModeButton.src = 'https://s-lol-web.op.gg/images/icon/icon-lightmode.svg';
        colorModeInfo.textContent="Light mode"
        if(playeroftheweekLogo) playeroftheweekLogo.src = 'https://s-lol-web.op.gg/static/images/esports/logo-pow-black.svg?v=1710914129937';
    }
}

/*********************************************************/

function colorModeHover(){
    const triangle = document.querySelector('#triangle');
    triangle.classList.remove('hidden');
    const colorModeInfo = document.querySelector('#colorModeInfo');
    colorModeInfo.classList.remove('hidden');
}

function colorModeNotHover(){
    const triangle = document.querySelector('#triangle');
    triangle.classList.add('hidden');
    const colorModeInfo = document.querySelector('#colorModeInfo');
    colorModeInfo.classList.add('hidden');
}

/*********************************************************/
function changeLanguage(event) {
    const selectedLanguage = event.currentTarget.textContent;

    const languageDependantWordsList = document.querySelectorAll('.LanguageDependant');


    for (let i = 0; i < languageDependantWordsList.length; i++) {
        languageDependantWordsList[i].textContent = LanguageMap[selectedLanguage][i];
    }

    LanguageList.classList.add('hidden');
}

function LanguageMenu(){
    const LanguageList = document.querySelector('#LanguageList');
    if(LanguageList.classList.contains('hidden')){
        LanguageList.classList.remove('hidden'); 
    }
    else{
        LanguageList.classList.add('hidden');
    }
}
/*********************************************************/

function RegionMenu(event){
    const RegionList = event.currentTarget.nextSibling.nextSibling

    if(RegionList.classList.contains('hidden')){
        RegionList.classList.remove('hidden'); 
    }
    else{
        RegionList.classList.add('hidden');
    }
}


function changeRegion(event){
    const selectedRegion = event.currentTarget.textContent;
    const RegionList = event.currentTarget.parentNode;

    if(RegionList.parentNode.classList.contains('little')){
        /* SE SONO NELLA PAGINA LOL CHAMPIONS*/
        /* cutSelectedRegion = cutSelectedRegion.replace(/\d/, '') */
        /* /\d/ è un meta-carattere che corrisponde a qualsiasi cifra numerica in una stringa */
        /* altrimenti avrei potuto usare il medoto replace per ogni cifra numerica con un ciclo*/
        /* Oppure mi accorgo che nei nameTag ci sono solo '1' o '2', quindi rimpiazzo solo questi*/
        let cutSelectedRegion = gameTagMap[selectedRegion];
        cutSelectedRegion = cutSelectedRegion.replace('1', '');
        cutSelectedRegion = cutSelectedRegion.replace('2', '');
        
        document.querySelector('#regionName').textContent = cutSelectedRegion;
    }

    else{
        document.querySelector('#regionName').textContent = selectedRegion;
    }
    
    const gameTag = document.querySelector('#gameTag');
    gameTag.textContent = '#'+gameTagMap[selectedRegion];


    RegionList.classList.add('hidden');
}

/*********************************************************/

function FilterMenu(event){
    const RegionList = event.currentTarget.nextSibling.nextSibling
    const arrow = event.currentTarget.querySelector('.arrow');

    if(RegionList.classList.contains('hidden')){
        RegionList.classList.remove('hidden'); 
        arrow.classList.remove('close');
        arrow.classList.add('open');
    }
    else{
        RegionList.classList.add('hidden');
        arrow.classList.remove('open');
        arrow.classList.add('add');
    }
}
/**********************************************************/

function Input(event){
    if(event.currentTarget.value.length > 0){
        event.currentTarget.classList.add('writing');
    }

    else{
        event.currentTarget.classList.remove('writing')
    }
}

/**********************************************************/


/************************************************** */
function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
 }
 

function onJsonWikipediaFeatured(json) {
      console.log(json);
  
      if(json === null || json["tfa"] === undefined){ //alcune volte non ritorna tfa per qualche ragione
        return;
      }
      let title = json['tfa']['title'];
      let desktop_url = json['tfa']['content_urls']['desktop']['page'];
      let extract = json['tfa']['extract'];
      let thumbnail_url;
      if(json['tfa']['thumbnail'] != undefined)
      thumbnail_url = json['tfa']['thumbnail']['source'];
      else thumbnail_url = null;
  
      const article = document.createElement('article');
      
      const articleTitle = document.createElement('span');
      articleTitle.textContent = title;
      articleTitle.classList.add('articleTitle');
  
      const url = document.createElement('a');
      url.href = desktop_url;
      url.textContent = "Link all'articolo completo"
      url.classList.add('url');
  
      const description = document.createElement('div'); 
      description.textContent = extract;
      description.classList.add('description');
  
      const thumbnail = document.createElement('img');
      if(thumbnail_url!= null){
      thumbnail.src = thumbnail_url;
      thumbnail.classList.add('thumbnail');
      }
      
      const OauthApi = document.querySelector('#OauthApi');
      OauthApi.appendChild(article);
      article.appendChild(articleTitle);
      article.appendChild(thumbnail);
      article.appendChild(description);
      article.appendChild(url);
  }
    
  
  function getWikipediaTFA() {
      fetch("http://127.0.0.1/wikipedia.php").then(onResponse).then(onJsonWikipediaFeatured);   
  }
    
  function openWikipediaArticleMenu(){
    const OauthApi = document.querySelector("#OauthApi");
    const modalView = document.querySelector("#modalView");
    const arrow = document.querySelector('#OauthApiMenuButton .arrow')
  
    if(OauthApi.classList.contains("hidden")) {
        modalView.classList.remove("hidden");
        OauthApi.classList.remove("hidden");
        arrow.classList.add('close');
    }
    else {
        modalView.classList.add("hidden");
        OauthApi.classList.add("hidden");
        arrow.classList.remove('close');
    }
  }

/************************************************************* */
function extractSummonerInfo(summonerName) {
    
    const tagIndex = summonerName.indexOf('#');
  
    if (tagIndex !== -1) {
      const name = summonerName.substring(0, tagIndex).trim();  //trim rimuove gli spazi iniziali
      const tag = summonerName.substring(tagIndex + 1).trim();
  
      return { name, tag };
    } else {
      // Se il carattere "#" non è presente, considera l'intera stringa come nome e inserisco il tag di default
      const name = summonerName.trim();
      const defaultGameTag = document.querySelector('#gameTag').textContent.replace('#', '');
      const tag = defaultGameTag;
  
      // Restituisci il nome e il tag
      return { name, tag };
    }
  }

function convertTimeStampToStringData(timeStamp) {
    const data = new Date(timeStamp);
    return data.toLocaleString();
}

function secondiAMinutiESecondi(secondi) {
  // Calcola i minuti
  const minuti = Math.floor(secondi / 60);
  // Calcola i secondi rimanenti
  const secondiRimanenti = secondi % 60;
  // Restituisci una stringa formattata
  return minuti + 'm ' + secondiRimanenti + 's';
}

function secondiAMinuti(secondi){
  return secondi/60;
}



/*************************************** */

async function onJson(json) {
    console.log("JSON->>");
    console.log(json);
    
    if (json.hasOwnProperty('status')) {
        const statusCode = json.status.status_code;
        if (statusCode === 404) {
            console.log('Si è verificato un errore con codice 404 (not found)');
            window.location.href = 'SummonerNotFound.php';
        }
        else if (statusCode === 400) {
            console.log('Si è verificato un errore con codice 400 (bad request): username non valido o tagline inesistente');
        } else if (statusCode== 403) {
            console.log('Si è verificato un errore con codice 403 (forbidden): controlla la tua api key!');
        }
        else{
            console.log('Errore imprevisto');
        }
    } 
    else {
        console.log('La richiesta è stata completata con successo!');
        const summonerPuuid = json["puuid"];
        console.log(summonerPuuid);
        //document.cookie = "opgg_currentSummoner=" + gameName;
    
        const summonerForm = document.querySelector("#summonerForm");
        console.log(summonerForm);
        summonerForm.puuid.value = summonerPuuid;
        summonerForm.gameName.value = form.summonerName.value;
        summonerForm.tagLine.value = form.summonerTag.value;
        summonerForm.submit();
    }

  

}

function searchSummoner(event) {
    // Impedisci il submit del form
    event.preventDefault();

    const fullName = form.gameName.value;
    const gameName = extractSummonerInfo(fullName).name;
    const tagLine = extractSummonerInfo(fullName).tag;

    form.summonerName.value = gameName;
    form.summonerTag.value = tagLine;

    const form_data = {
        method: 'post', 
        body: new FormData(form)
    };

    fetch("http://127.0.0.1/puuid.php", form_data).then(onResponse).then(onJson);   
}

/******************************************************** */
const menuButton = document.querySelector('#menu-img');
menuButton.addEventListener('click', Menu);

const colorModeButton = document.querySelector('#darkmode');
colorModeButton.addEventListener('click', changeLightMode);
colorModeButton.addEventListener('mouseover', colorModeHover);
colorModeButton.addEventListener('mouseout', colorModeNotHover);

const FAQ = document.querySelector('#FAQ');
FAQ.addEventListener('click', openFAQMenu);

const italianWords = ['Italiano', 'Home', 'Champions', 'Game Mode', 'Statistiche', 'Classifiche', 'Pro Matches', 'Multi-Search', 'Usa OP.GG senza pubblicità, con funzionalità premium', 'Impostazione automatica di rune in tempo reale', 'Campioni più usati, gare a squadre e altro ancora', 'Ultime raccomandazionidi Meta e OP.GG', 'Funzionalità di sovrapposizione migliorate per maggiore praticità'];
const englishWords = ['English', 'Home', 'Champions', 'Game Mode', 'Stats', 'Leaderboards', 'Pro Matches', 'Multi-Search', 'Use OP.GG, ad-free, with premium features', 'Real-time Auto Rune Setting', 'OP Champions, Team Comps, and More', 'Latest Meta and OP.GG Recommendations', 'Enhanced Overlay Features for Better Convenience'];
const frenchWords = ['Français', 'Accueil', 'Champions', 'Game Mode', 'Statistiques', 'Classements', 'Pro Matches', 'Recherche multiple', 'Utilisez OP.GG sans publicités, avec des fonctionnalités premium', 'Paramétrage des runesauto en temps réel', "Champions OP, compos d'équipes et plus", 'Meta en courset recommandations OP.GG', 'Fonctionnalités de superposition améliorées pour le confort'];
const spanishWords = ['Español', 'Inicio', 'Análisis de Campeones', 'Game Mode', 'Estadísticas', 'Ránking', 'Partidas Pro', 'Búsqueda Multiple', 'Usa OP.GG sin anuncios, con funciones premium', 'Ajuste automático de runasen tiempo real', 'Los campeones más fuertes, composiciones de equipos y más', 'Último Meta y recomendaciones de OP.GG', 'Funciones de superposición mejoradaspara mayor comodidad'];
const germanWords = ['Deutsch', 'Home', 'Champions', 'Game Mode', 'Statistik', 'Rangliste', 'Pro Matches', 'Multi-Suche', 'Nutzen Sie OP.GG werbefrei, mit Premium-Funktionen', 'Automatische Echtzeit-Runeneinstellung', 'OP-Champions, Team-Wettbewerbe und mehr', 'Aktuelle Meta- und OP.GG-Empfehlungen', 'Verbesserte Overlay-Funktionenfür mehr Komfort'];
const nederlandsWords = ['Nederlands', 'Home', 'Champions', 'Game Mode', 'Statistieken', 'Rangen', 'Pro Matches', 'Multi-Search', 'Gebruik OP.GG zonder advertenties, met premium functies', 'Real-time auto-rune-instelling', 'OP-kampioenen, teamcomposities en meer', 'OP-kampioenen, teamcomposities en meer', 'Verbeterde overlay-functiesvoor meer gemak'];
const polishWords = ['Język polski', 'Home', 'Champions', 'Game Mode', 'Statystyki', 'Rankingi', 'Pro Matches', 'Multi-Search', 'Korzystaj z OP.GG bez reklam, z funkcjami premium', 'Automatyczne ustawianie runw czasie rzeczywistym', 'Bohaterowie OP, zawody drużynowe i nie tylko', 'Najnowsze zasady metagryoraz rekomendacje OP.GG', 'Ulepszona nakładkadla większej wygody'];
const portugueseWords = ['Português', 'Início', 'Análise de Campeões', 'Game Mode', 'Estatísticas', 'Classificações', 'Partidas Profissionais', 'Busca Múltipla', 'Use OP.GG, ad-free, with premium features', 'Ajuste automático de runasem tempo real', 'Campeões OP, competições por equipe e mais', 'Últimas recomendaçõesmeta e OP.GG', 'Recursos de sobreposição aprimoradospara sua conveniência'];
const danishWords = ['Dansk', 'Home', 'Champions', 'Game Mode', 'Statistik', 'Rang', 'Pro Matches', 'Multi-Search', 'Brug OP.GG uden reklamer, med premium funktioner', 'Automatisk runeindstillingi realtid', 'OP Champions, holdkonkurrencer m. m.', 'Nye Meta-og OP.GG-anbefalinger', 'Bedre og mere bekvemmeoverlejringsfunktioner'];

const LanguageMap = {
    'Italiano': italianWords,
    'English': englishWords,
    'Français': frenchWords,
    'Español': spanishWords,
    'Deutsch': germanWords,
    'Nederlands': nederlandsWords,
    'Język polski': polishWords,
    'Português': portugueseWords,
    'Dansk': danishWords
};

const selectLanguage = document.querySelector('#scegli');
selectLanguage.addEventListener('click', LanguageMenu);
const LanguageOptions = document.querySelectorAll('#LanguageList span');
for(const item of LanguageOptions){
    item.addEventListener('click', changeLanguage);
}

const gameTagMap = {
    'Europe West': 'EUW',
    'North America': 'NA1',
    'Europe Nordic & East': 'EUNE',
    'Oceania': 'OCE',
    'Korea': 'KR1',
    'Japan': 'JP1',
    'Brazil': 'BR1',
    'LAS': 'LAS',
    'LAN': 'LAN',
    'Russia': 'RU1',
    'Türkiye': 'TR1',
    'Singapore': 'SG2',
    'Philippines': 'PH2',
    'Taiwan': 'TW2',
    'Vietnam': 'VN2',
    'Thailand': 'TH2'
};


const Region = document.querySelector('#region');
Region.addEventListener('click', RegionMenu);
const RegionOptions = document.querySelectorAll('#RegionList .RegionOption');
for(const item of RegionOptions){
    item.addEventListener('click', changeRegion);
}

const inputs = document.querySelectorAll('input');
for(const item of inputs){
    item.addEventListener('input', Input);
}


const form = document.querySelector('form');
form.addEventListener('submit', searchSummoner)

const OauthApiMenuButton = document.querySelector("#OauthApiMenuButton");
if(OauthApiMenuButton!= null){
    getWikipediaTFA();
    OauthApiMenuButton.addEventListener('click', openWikipediaArticleMenu);
} 

