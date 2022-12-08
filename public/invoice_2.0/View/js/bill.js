$(document).ready(function(){
    $('.message-box').hide();
    $('.options').hide();
   

    $('.message-trigger').click(function(){
        $('.message-box').toggle('slow');
    })

    $('.message-icon').click(function(){
        $('.message-box').toggle('slow');
    })
    
    $('.move-box').click(function(){
        $('.message-box').hide('slow');
    })
    $('#toggle').click(function(){
        $('.options').toggle();
    })
    $('#toggle1').click(function(){
        $('.options').toggle();
    })
})