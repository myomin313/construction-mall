 
function callbackURL(message, url) 
{ 
    Notiflix.Notify.Init({position:"center-top",width:"68%"});
    Notiflix.Notify.Success(message);
    setTimeout(function(){
        window.location = url;
      }, 2000);
}

function callbackSuccess(message) 
{ 
       
    Notiflix.Notify.Init({position:"center-top",width:"68%"});
    Notiflix.Notify.Success(message);
}

 function callbackWarning(message) 
{ 
    Notiflix.Notify.Init({position:"center-top",width:"68%"});
    Notiflix.Notify.Warning(message); 
}

 function callbackFailure(message) 
{ 
    Notiflix.Notify.Init({position:"center-top",width:"68%"});
    Notiflix.Notify.Failure(message);
}

