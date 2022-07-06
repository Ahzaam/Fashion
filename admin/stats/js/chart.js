$(document).ready(function() {
  updatechart()
  const myTimeout = setInterval(updatechart, 3000);

  let value = '';

  function updatechart(){

    $.get({
      url:'api/chart.php',
      success: function(data) {

        let jsondata = JSON.parse(data);
        if(jsondata.labels.toString() !== value){
          $('#myChart').remove();
          const canvas = document.createElement('canvas');
          $(canvas).attr('id', 'myChart');
          $('#canvas').append(canvas);

          processData(jsondata)

          let total = 0
         for(let i=0; i<jsondata.total.length; i++) {
           total += jsondata.total[i]
         }

         $('#count').html(jsondata.total.length)
         $('#total').html(addcomma(total))
        }

        value = jsondata.labels.toString();


      }
    })
  }

  function processData(jsondata) {

    let rechour
    let price = 0
    let total = []
    let labels = []
    for(let i=0; i<jsondata.labels.length; i++) {
      hour = jsondata.labels[i].split(':')[0];
      if(rechour !== hour){
        if(price !== 0){

          total.push(price)
        }
        labels.push(hour + ':00:00 - ')
        price = 0
        price += jsondata.total[i]
        rechour = hour
      }else{
        price += jsondata.total[i]
      }
    }
    total.push(price)



    chart(jsondata.name, total, labels);
  }

  function addcomma(price){
    price = price.toString()
    let lenght = price.length - 1
    let csprc = ''
    let arrlenght = 0
    for(let i = lenght ; i >= 0; i--){


      if(arrlenght % 3 == 0 && arrlenght != 0){
        csprc += ','
      }
      csprc += price[i]
      arrlenght ++
    }

    price = ''

    csprc = csprc.toString()

    for(let i = csprc.length - 1 ; i >= 0; i--){
      price += csprc[i]

    }

    return price

  }

  function chart(name, data, labels) {
    const ctx = document.getElementById('myChart').getContext('2d');

    const config = {
      type: 'line',
      data: {

        // Configration Section
        labels: labels,
        datasets: [{
          label: name,
          data: data,
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(75, 192, 192)',
            'rgb(255, 205, 86)',
            'rgb(201, 203, 207)',
            'rgb(54, 162, 235)'
          ]
        }]
      }
    };

    const myChart = new Chart(ctx,config);

  }




})
