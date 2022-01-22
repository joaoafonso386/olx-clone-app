function request (url, method, body = {})  {

  return fetch(url, {
    method: method,
    mode: "same-origin",
    credentials: "same-origin",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(body)
  })

}

export { request };
