//Kieran Jaggernauth
"use strict"
$(document).ready(function(){
  //console.log("DOM Loaded");
  $('#lookup').click(function(){
  let inputTxt = $('#country').val().trim().replace(/[^a-z0-9áéíóúñü \.,_-]/gim, "");
  $('#result').html("");
  fetch(`./world.php?country=${inputTxt}`)
    .then(response => response.text())
    .then(data => {
      $('#result').append(data);
    })
    .catch(err => console.error(err))
  });
});
