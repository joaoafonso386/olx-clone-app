const button = document.querySelector("button.add-favorite");

button.onclick = () => {

  fetch("/requests/favorite", {
    method: "POST",
    mode: "same-origin",
    credentials: "same-origin",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      user_id: parseInt(button.dataset.userId),
      ad_id: parseInt(button.dataset.adId)
    })
  }).then(response => { 
    if(response.status === 200) {
      response.json()
    }
  }).then(response => {
    
    const div = document.querySelector(".message");
    const message = document.createElement('p');
    
    div.textContent = '';
    message.innerHTML = response.message + ' ' + '<a href="/user/favorites">Veja os seus favoritos</a>';
    div.appendChild(message);
    
  });

}