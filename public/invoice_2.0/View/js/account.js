$(document).ready(function(){
    $('.offcanvas').hide();
    $('.message-box').hide();
    $('.options').hide();
   

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
    $('#toggle').click(function(){
        $('.options').toggle();
    })
    $('#toggle1').click(function(){
        $('.options').toggle();
    })
    // graph section 

    const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                '',
                '',
                '',
                '',
                '',
                ''
            ],
            borderColor: [
                '#2D89EF',
                '#2D89EF',
                '#2D89EF',
                '#2D89EF',
               '#2D89EF',
                '#2D89EF'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
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


