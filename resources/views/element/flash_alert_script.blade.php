<script>
    function callbackURL(message, url)
    {
        Notiflix.Notify.Init({position:"center-top",width:"70%"});
        Notiflix.Notify.Success(message);
        setTimeout(function(){
            window.location = url;
        }, 2000);
    }

    function callbackError(message)
    {
        Notiflix.Notify.Init({position:"center-top",width:"70%"});
        Notiflix.Notify.Failure(message);
        setTimeout(function(){
            // window.location = url;
        }, 2000);
    }
     function callbackErrorURL(message, url)
    {
        Notiflix.Notify.Init({position:"center-top",width:"70%"});
        Notiflix.Notify.Failure(message);
        setTimeout(function(){
            window.location = url;
        }, 2000);
    }
    
      function callbackQuotationError(message,url)
    {
        Notiflix.Notify.Init({position:"center-top",width:"70%"});
        Notiflix.Notify.Failure(message);
        setTimeout(function(){
             window.location = url;
        }, 1000);
        
    }
</script>
