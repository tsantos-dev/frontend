// var input_gl = document.getElementById("geolocation");
// function getLocation()
// {
//     if (navigator.geolocation)
//         {
//         navigator.geolocation.getCurrentPosition(showPosition);
//         }
//     else{input_gl.innerHTML="O seu navegador não suporta Geolocalização.";}
// }
// function showPosition(position)
// {
//     input_gl.innerHTML= position.coords.latitude + "," + position.coords.longitude; 
// }
// function showError(error)
//   {
//   switch(error.code)
//     {
//     case error.PERMISSION_DENIED:
//       x.innerHTML="Usuário rejeitou a solicitação de Geolocalização."
//       break;
//     case error.POSITION_UNAVAILABLE:
//       x.innerHTML="Localização indisponível."
//       break;
//     case error.TIMEOUT:
//       x.innerHTML="A requisição expirou."
//       break;
//     case error.UNKNOWN_ERROR:
//       x.innerHTML="Algum erro desconhecido aconteceu."
//       break;
//     }
//   }




function do_something(coords) {
    // Do something with the coords here
    var input_gl = document.getElementById("geolocation");
    input_gl.innerHTML = position.coords.latitude + "," + position.coords.longitude; 
}


navigator.geolocation.getCurrentPosition(function(position) { 
    do_something(position.coords);
    },
    function(failure) {
        $.getJSON('https://ipinfo.io/geo', function(response) { 
            var loc = response.loc.split(',');
            var coords = {
                latitude: loc[0],
                longitude: loc[1]
            };
        do_something(coords);
        });  
    }
// }
);