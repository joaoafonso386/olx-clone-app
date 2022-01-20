const removeButtons = document.querySelectorAll("button.remove");

for(let button of removeButtons) {
  
  button.onclick = () => { 

    let confirmDelete = confirm("Tem a certeza que quer remover este utilizador?");

    if(confirmDelete) {
      const tr = button.parentNode.parentNode;
    
      fetch("/requests/backoffice/deleteuser", {
        method: "DELETE",
        mode: "same-origin",
        credentials: "same-origin",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          user_id: parseInt(button.dataset.userId)
        })
      })
      .then(response => {
        if(response.status === 200) {
          response.json()
        }
      })
      .then(() => {
        tr.remove()
      });

    }

  }

}