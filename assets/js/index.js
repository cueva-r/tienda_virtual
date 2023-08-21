$(function () {
  "use strict";

  // chart 16
  var ctx = document.getElementById("chart16").getContext('2d');

  var gradientStroke5 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke5.addColorStop(0, '#7f00ff');
  gradientStroke5.addColorStop(1, '#e100ff');

  var gradientStroke6 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke6.addColorStop(0, '#fc4a1a');
  gradientStroke6.addColorStop(1, '#f7b733');

  var gradientStroke7 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke7.addColorStop(0, '#283c86');
  gradientStroke7.addColorStop(1, '#45a247');

  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["Samsung", "Apple", "Nokia"],
      datasets: [{
        backgroundColor: [
          gradientStroke5,
          gradientStroke6,
          gradientStroke7
        ],

        hoverBackgroundColor: [
          gradientStroke5,
          gradientStroke6,
          gradientStroke7
        ],

        data: [50, 50, 50]
      }]
    },
    options: {
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
          position: 'bottom'
        }
      }
    }
  });
});