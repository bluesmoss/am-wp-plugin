window.addEventListener("DOMContentLoaded", function(){

  console.log('Registor oki');
  let form = document.querySelector("#signin");
  let msg = document.querySelector(".msg");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    let data = new FormData(form)
    let dataParsed = new URLSearchParams(data)

    fetch(`${plz.rest_url}/login`, {
      method: "POST",
      body:  dataParsed
    })
    .then( res => res.json())
    .then(json=> {
      console.log(json);
      if(!json){
        window.location.href = `${plz.home_url}`
      }

    })
    .catch( error => {
      console.log(`There is an error: ${error}`);
    })

  })
})