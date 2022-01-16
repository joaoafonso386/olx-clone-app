const button = document.querySelector("button.remove-favorite");
console.log(button.dataset);
button.onclick = () => {

  fetch("/requests/favorite", {
    method: "DELETE",
    mode: "same-origin",
    credentials: "same-origin",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      ad_id: parseInt(button.dataset.adId),
      user_id: parseInt(button.dataset.userId)
    })
  }).then(response => response.json())
    .then(response => {
    const divMessage = document.querySelector(".message");
    const divContainer = document.querySelector(".container");
    const message = document.createElement('p');
    
    divMessage.textContent = '';
    message.innerHTML = response.message;
    divMessage.appendChild(message);
    divContainer.textContent = '';
    
  });

}