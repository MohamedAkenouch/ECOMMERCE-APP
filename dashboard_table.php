
  <script>
document.getElementById("total_incomes").innerHTML="<?php echo $total_sales ?>$";
document.getElementById("commandes").innerHTML="<?php echo $chart_commander ?>";
document.getElementById("users").innerHTML="<?php echo $users_number ?>";
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['commandé', <?php echo $chart_commander ?>],
          ['non commandé', <?php echo $chart_non_commander ?>],
       
        ]);


        var options = {'title':'Produits séléctionnés dans le panier',
                       'width':400,
                       'height':300};

        var chart = new google.visualization.PieChart(document.getElementById('cart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChart2);


function drawChart2() {

  var data2 = new google.visualization.DataTable();
  data2.addColumn('string', 'Topping');
  data2.addColumn('number', 'Slices');
  data2.addRows([
    ['refusée', <?php echo $chart_refused ?>],
    ['validée', <?php echo $chart_validate ?>],
    ['en attente de validation', <?php echo $chart_waiting ?>],
 
  ]);


  var options2 = {'title':'Stat des commandes',
                 'width':400,
                 'height':300};

  var chart2 = new google.visualization.PieChart(document.getElementById('2'));
  chart2.draw(data2, options2);
}
</script>
<script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChart3);
function drawChart3() {

var data3 = new google.visualization.DataTable();
data3.addColumn('string', 'Topping');
data3.addColumn('number', 'Slices');
data3.addRows([
  <?php
  for ($x = 0; $x < count($distinct_category); $x++) {                  
  ?>

   ['<?php echo $distinct_category[$x] ?>', <?php echo  $distinct_category_sales[$x] ; ?> ],
  
  <?php             
  }
  ?>


]);


var options3 = {'title':'Ventes par catégorie',
               'width':600,
               'height':500};

var chart3 = new google.visualization.PieChart(document.getElementById('3'));
chart3.draw(data3, options3);
}
</script>




<script>
  google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Time of Day');
      data.addColumn('number', 'Motivation Level');

      data.addRows([
        ['Janvier',<?php echo $January ?>],
        ['Février',<?php echo $February?>],
        ['Mars', <?php echo $march?>],
        ['Avril',<?php echo $april?>],
        ['Mai',<?php echo $may?>],
        ['Juin',<?php echo $june?>],
        ['Juillet',<?php echo $july?>],
        ['Août',<?php echo $august?>],
        ['Septembre',<?php echo $september?>],
        ['Octobre',<?php echo $october?>],
        ['Novembre',<?php echo $november?>],
        ['Décembre',<?php echo $december?>],
 

      ]);

      var options = {
        title: 'Ventes durant l année',
        hAxis: {
          title: 'Mois',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Profit en $'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('sales by year'));

      chart.draw(data, options);
    }
</script>
