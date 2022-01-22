import { request } from "./modules/request.js";

const button = document.querySelector("button.add-favorite");

button.onclick = () => {

  const body = {
    user_id: parseInt(button.dataset.userId),
    ad_id: parseInt(button.dataset.adId)
  }

  request("/requests/favorite", "POST", body)
  .then(response => {
    if(response.status === 200 || response.stats === 400) {
      return response.json()
    }
  })
  .then(response => {
    const div = document.querySelector(".message");
    const message = document.createElement('p');
    
    div.textContent = '';
    message.innerHTML = response.message + ' ' + '<a href="/user/favorites">Veja os seus favoritos</a>';
    div.appendChild(message);
    
  });

}