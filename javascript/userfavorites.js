import { request } from "./modules/request.js";

const button = document.querySelector("button.remove-favorite");

button.onclick = () => {

  const body = {
    ad_id: parseInt(button.dataset.adId),
    user_id: parseInt(button.dataset.userId)
  }

  request("/requests/favorite", "DELETE", body).then(response => { 
    if(response.status === 200) {
      return response.json()
    }
  }).then(response => {
    const divMessage = document.querySelector(".message");
    const divContainer = document.querySelector(".container");
    const message = document.createElement('p');
    
    divMessage.textContent = '';
    message.innerHTML = response.message;
    divMessage.appendChild(message);
    divContainer.textContent = '';
    
  });

}