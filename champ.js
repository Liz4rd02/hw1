
function dataAttuale() {
    var oggi = new Date();
    var giorno = String(oggi.getDate()).padStart(2, '0');
    var mese = String(oggi.getMonth() + 1).padStart(2, '0'); 
    var anno = oggi.getFullYear();
    return giorno + '/' + mese + '/' + anno;
}

function orarioAttuale() {
    var oggi = new Date();
    var ore = String(oggi.getHours()).padStart(2, '0');
    var minuti = String(oggi.getMinutes()).padStart(2, '0');
    var secondi = String(oggi.getSeconds()).padStart(2, '0');
    return ore + ':' + minuti + ':' + secondi;
}

function selectAbility(event){
    const selectedAbility = event.currentTarget;
    const previous_selectedAbility = document.querySelector("#abilitiesImgs img.selected");

    const abilityName = selectedAbility.classList[0];

    const selectedDescription = document.querySelector(".abilityInfo." + abilityName)
    const previous_selectedDescription = document.querySelector(".abilityInfo.selected")

    if(!selectedAbility.classList.contains("selected")){
        previous_selectedAbility.classList.remove("selected");
        selectedAbility.classList.add("selected");

        previous_selectedDescription.classList.remove("selected");
        previous_selectedDescription.classList.add("hidden");
        
        selectedDescription.classList.remove("hidden");
        selectedDescription.classList.add("selected");
    }

}

function preventEnter(event){
    if(event.keycode === 13){
        event.preventDefault();
        event.currentTarget.value+="\n";
    }
}

async function removeComment(event){
    const comment = event.currentTarget.parentNode;

    const formData = new FormData();
    formData.append("champName", document.querySelector("#name").textContent.trim());
    formData.append("comment_date", comment.querySelector(".newCommentDate").textContent);
    formData.append("comment_time", comment.querySelector(".newCommentTime").textContent);
    console.log(comment);
    console.log(document.querySelector("#name").textContent.trim());
    console.log(comment.querySelector(".newCommentDate").textContent);
    console.log(comment.querySelector(".newCommentTime").textContent);

    const response = await fetch("http://127.0.0.1/removeComment.php", {
        method: "post",
        body: formData
    })
    const result = await response.text();
    console.log(result);
    if(result == 0)comment.remove();
    else console.log("Rimozione dal database fallita");

}

async function addComment(event){
    event.preventDefault();
    if(commentForm.comment.value.length==0 || commentForm.comment.value.length>1000) return

    const form_data = {
        method: 'post', 
        body: new FormData(commentForm)
    };

    const addCommentResponse = await fetch("http://127.0.0.1/addComment.php", form_data);
    const addCommentResult = await addCommentResponse.text();
    console.log(addCommentResponse);
    console.log(addCommentResult);
    if(addCommentResult == 0){
        const newComment = document.createElement("div");
        newComment.classList.add("newComment");

        const newCommentHeader = document.createElement("div");
        newCommentHeader.classList.add("newCommentHeader");

        const newCommentUser = document.createElement("span");
        newCommentUser.classList.add("newCommentUser");
        newCommentUser.textContent = commentForm.username.value;

        const newCommentDate = document.createElement("span");
        newCommentDate.classList.add("newCommentDate");
        newCommentDate.textContent = dataAttuale();

        const newCommentTime = document.createElement("span");
        newCommentTime.classList.add("newCommentTime");
        newCommentTime.textContent = orarioAttuale();

        const newCommentContent = document.createElement("span");
        newCommentContent.classList.add("newCommentContent");
        newCommentContent.textContent = commentForm.comment.value;

        const newCommentRemoveButton = document.createElement("span");
        newCommentRemoveButton.classList.add("newCommentRemoveButton");
        newCommentRemoveButton.textContent = "Remove comment";
        newCommentRemoveButton.addEventListener('click', removeComment);

        newCommentHeader.appendChild(newCommentUser);
        newCommentHeader.appendChild(newCommentDate);
        newCommentHeader.appendChild(newCommentTime);

        newComment.appendChild(newCommentHeader);
        newComment.appendChild(newCommentContent);
        newComment.appendChild(newCommentRemoveButton);

        document.querySelector("#commentSection").appendChild(newComment);
    }
    else {
        console.log("Errore nell'inserimento del commento nel database");
    }
}

let abilityImgs = document.querySelectorAll("#abilitiesImgs img");
if(abilityImgs !== null) {
    for(const item of abilityImgs){
        item.addEventListener('click', selectAbility);
    }
}

const textarea = document.querySelector("#comment");
textarea.addEventListener("keydown", preventEnter);


const commentForm = document.querySelector("#commentForm");
commentForm.addEventListener('submit', addComment);
console.log(commentForm);

const removeCommentButtons = document.querySelectorAll(".newCommentRemoveButton");
for(const item of removeCommentButtons){
    item.addEventListener('click', removeComment);
}