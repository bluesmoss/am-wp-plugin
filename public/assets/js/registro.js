window.addEventListener("DOMContentLoaded", function(){

  console.log('Registor oki');
  let form = document.querySelector("#signup");
  let msg = document.querySelector(".msg");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    let data = new FormData(form)
    let dataParsed = new URLSearchParams(data)

    fetch('http://localhost/wordpress-plugin/wp-json/plz/registro', {
      method: "POST",
      body:  dataParsed
    })
    .then( res => res.json())
    .then(json=> {
      console.log(json);
      if(json.msg){
        msg.innerHTML = json?.msg;
      }

    })
    .catch( error => {
      console.log(`There is an error: ${error}`);
    })

  })
})