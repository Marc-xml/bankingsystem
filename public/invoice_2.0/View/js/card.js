$(document).ready(function(){
    $('.offcanvas').hide();

    $('#search').click(function(){
        $('.offcanvas').toggle('slow');
    })
    $('.message-trigger').click(function(){
        $('.modal').toggleClass("shift",1000)
    })

     //  second graph 
    
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Evolution of accoun balance',
      backgroundColor: '#2D89EF',
      borderColor: '#2D89EF',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };


  const myChart1 = new Chart(
    document.getElementById('myChart1'),
    config
  );


})

