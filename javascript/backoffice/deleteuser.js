import { request } from "../modules/request.js";

const removeButtons = document.querySelectorAll("button.remove");

for(let button of removeButtons) {
  
  button.onclick = () => { 

    let confirmDelete = confirm("Tem a certeza que quer remover este utilizador?");

    if(confirmDelete) {
      const tr = button.parentNode.parentNode;
    
      const body = {
        user_id: parseInt(button.dataset.userId)
      }

      request("/requests/backoffice/deleteuser", "DELETE", body)
      .then(response => {
        if(response.status === 200) {
          return response.json()
        }
      })
      .then((response) => {
        tr.remove();
        const divMessage = document.querySelector(".message");
        const message = document.createElement('p');
        
        divMessage.textContent = '';
        message.innerHTML = `<b>${response.message}</b>`;
        divMessage.appendChild(message);
      });

    }

  }

}