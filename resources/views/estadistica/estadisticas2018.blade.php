@extends('template')
@section('style')

@endsection
@section('title')

@endsection
@section('content')
 <div class="row">
  <div id="paginas" class="col col-md-6 mb-4"></div>

  <div id="chart_div" class="col col-md-6"></div>

  <div id="chart_div2" class="col col-md-6"></div>

  
 </div>
@endsection
@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Trabajo final de grado', 1],
          ['Proyecto de grado', 2],
          ['Trabajo dirigido', 1],
          ['Examen de grado', 5],
          ['Titulacion directa', 1 ],
        ]);

        // Set chart options
        var options = {'title':'Estadisticas 2018',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var other = new google.visualization.DataTable();
        other.addColumn('string', 'Topping');
        other.addColumn('number', 'Slices');
        other.addRows([
          ['Trabajo final de grado(Tesis)', 1],
          ['Proyecto de grado', 0],
          ['Trabajo dirigido', 0],
          ['Examen de grado', 5],
          ['Titulacion directa', 2]
        ]);

        // Set chart options
        var options = {'title':'Estadisticas 2019',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(other, options);
      }
    </script>

    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var other = new google.visualization.DataTable();
        other.addColumn('string', 'Topping');
        other.addColumn('number', 'Slices');
        other.addRows([
          @foreach ($cus as $cu)
            ['{{ $cu->nombre }}',{{ $cu->estadistica->visto }}],
          @endforeach
        ]);

        // Set chart options
        var options = {'title':'Conteo de páginas',
                       'width': 400,
                       'height': 300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('paginas'));
        chart.draw(other, options);
      }
    </script>

@endsection