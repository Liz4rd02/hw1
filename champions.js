
function ChangeFilterVersion(event){
    const selectedDifficulty = event.currentTarget.textContent;
    const selectedRole = document.querySelector("#filterRole span.selected").textContent;
    const Menu = event.currentTarget.parentNode;
    const section = document.querySelector('#version');
    const arrow = section.querySelector('.arrow');

    section.querySelector('.selectedOptionText').textContent = selectedDifficulty;

    arrow.classList.remove('open');
    arrow.classList.add('add');

    Menu.classList.add('hidden');

    console.log("Diff: " + selectedDifficulty + " - " + selectedRole);
    const allChamps = document.querySelectorAll("#champList .champ");
    if(selectedDifficulty!=="All"){
        for(champ of allChamps){
            if(selectedRole!=="All"){
                if(!champ.classList.contains(selectedDifficulty) || !champ.classList.contains(selectedRole)) champ.classList.add("hidden");
                else champ.classList.remove("hidden");
            }
            else{
                if(!champ.classList.contains(selectedDifficulty)) champ.classList.add("hidden");
                else champ.classList.remove("hidden");
            }
        }
    } 
    else{
        for(champ of allChamps){
            if(selectedRole!=="All"){
                if(champ.classList.contains(selectedRole)) champ.classList.remove("hidden");
                else champ.classList.add("hidden");
            }
            else champ.classList.remove("hidden");
        } 
    } 
}

/*********************************************************/

function ChangeRole(event){
    if(!event.currentTarget.classList.contains('selected')){
        document.querySelector('#filterRole span.selected').classList.remove('selected');
        event.currentTarget.classList.add('selected');
    }

    const selectedRole = event.currentTarget.textContent;
    const selectedDifficulty = document.querySelector("#version span.selectedOptionText").textContent;
    console.log(selectedDifficulty + " - " + selectedRole);
    const allChamps = document.querySelectorAll("#champList .champ");
    if(selectedRole!=="All"){
        for(champ of allChamps){
            if(selectedDifficulty!=="All"){
                if(!champ.classList.contains(selectedRole) || !champ.classList.contains(selectedDifficulty)) champ.classList.add("hidden");
                else champ.classList.remove("hidden");
            }
            else{
                if(!champ.classList.contains(selectedRole)) champ.classList.add("hidden");
                else champ.classList.remove("hidden");
            }
        }
    } 
    else{
        for(champ of allChamps){
            if(selectedDifficulty!=="All"){
                if(champ.classList.contains(selectedDifficulty)) champ.classList.remove("hidden");
                else champ.classList.add("hidden");
            }
            else champ.classList.remove("hidden");
        } 
    }   
}
/*********************************************************/

function onResponse(response){
    return response.json();
}

function onJsonAllChamps(json){
    console.log(json);
    const champListObject = json["data"];
    for(champNameKey in champListObject){
        const image_url = "https://ddragon.leagueoflegends.com/cdn/img/champion/loading/" + champNameKey + "_0.jpg";
        const difficulty = champListObject[champNameKey]["info"]["difficulty"];
        let difficultyClass;
        if(difficulty<=3) difficultyClass = "Easy";
        else if(difficulty<=7) difficultyClass = "Medium";
        else difficultyClass = "Hard";

        const rolesArray = champListObject[champNameKey]["tags"];

        const champList = document.querySelector("#champList");

        const champ = document.createElement("div");
        champ.classList.add("champ");
        for(role of rolesArray){
            champ.classList.add(role);
        }
        champ.classList.add(difficultyClass);

        const span = document.createElement("span");
        span.classList.add("champName");
        span.textContent = champNameKey;
        champ.appendChild(span);
        champ.style.backgroundImage = "url('" + image_url+ "')";

        champList.appendChild(champ);
    }

    const champs = document.querySelectorAll("#champList div.champ");
    if(champs !== null) {
        for(const item of champs){
            item.addEventListener('click', selectChamp);
        }
    }
}

async function selectChamp(event){
    const champ = event.currentTarget;
    const champName = champ.querySelector("span").textContent;
    const form = document.querySelector("#champForm");

    const game_version_response = await fetch('https://ddragon.leagueoflegends.com/api/versions.json');
    const game_version_json = await game_version_response.json();
    const gameVersion = game_version_json[0];

    form.champName.value=champName;
    form.game_version.value=gameVersion;
    form.submit();
}


fetch("https://ddragon.leagueoflegends.com/cdn/14.9.1/data/en_US/champion.json").then(onResponse).then(onJsonAllChamps);

const version = document.querySelector('#version');
if(version !== null) {
    version.addEventListener('click', FilterMenu);
    const VersionOptions = document.querySelectorAll('#VersionList .VersionOption');
    for(const item of VersionOptions){
        item.addEventListener('click', ChangeFilterVersion);
    }
}

const filterRoleButtons = document.querySelectorAll("#filterRole span");
if(filterRoleButtons !== null) {
    for(const item of filterRoleButtons){
        item.addEventListener('click', ChangeRole);
    }
}


