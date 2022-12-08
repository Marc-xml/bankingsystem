$(document).ready(function(){
    $('.offcanvas').hide();
    $('.message-box').hide();
   

    $('#search').click(function(){
        $('.offcanvas').toggle('slow');
    })

    $('.message-trigger').click(function(){
        $('.message-box').toggle('slow');
    })

    $('.message-icon').click(function(){
        $('.message-box').toggle('slow');
    })
    
    $('.move-box').click(function(){
        $('.message-box').hide('slow');
    })
    $('.action').click(function(){
        $('.modal').addClass('change');
    })
})


