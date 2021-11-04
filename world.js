//Kieran Jaggernauth
"use strict"
$(document).ready(function(){
  //console.log("DOM Loaded");

  /*
  AjaxCall Function
  Params : requestType
  Returns : none
  Description
  - Runs an ajex request using fetch to request the php file
  - If true is passed in then the default lookup is used
  - If false is passed in them the lookupCities request is used
  */
  function ajaxCall(requestType){

    let inputTxt = $('#country').val().trim().replace(/[^a-z0-9áéíóúñü \.,_-]/gim, "");
    $('#result').html("");
    let url = requestType ? `./world.php?country=${inputTxt}&context=countries` : `./world.php?country=${inputTxt}&context=cities`;
    fetch(url)
      .then(response => response.text())
      .then(data => {
        $('#result').append(data);
      })
      .catch(err => console.error(err))
  }

  $('#lookup').click(function(){
    ajaxCall(true);
  });
  $('#lookupCity').click(function(){
    ajaxCall(false);
  });
});
