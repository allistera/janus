@extends('master')

@section('title')
View Plan
@endsection

@section('javascript')
{{ HTML::script('js/plan.view.js') }}
@endsection

@section('content')

  <div class="row">
    <h1>View Plan</h1>

    <div class="right">

      <div class="right shareContainer" id="shareButton">
        <a href="#" class="createButton"><i class="foundicon-globe" ></i> Share</a>
      </div>

      <div class="clearfix"></div>

      <div class="right">
        <div class="clearfix"></div>
        <ul id="shareBar" class="hide right">
          <li>
            @if ($share)
              <a href="#" id="shareGetURL"><img src="/img/success-icon.png" width=32 data-tooltip class="has-tip" title="This plan has a public URL, click to view it"><br/>Shared</a>
            @else
              <a href="#" name="url" class="shareGet"><img src="/img/sharethis_32.png" alt="URL" data-tooltip class="has-tip" title="Generate a public URL to share"></a>
            @endif
          </li>
          <li><a href="#" name="forum" class="shareGet"><img src="/img/forum_32.png" alt="Forum" data-tooltip class="has-tip" title="Generate BBCode to display this plan on forums."></a></li>
          <li><a href="#" name="reddit" class="shareGet"><img src="/img/reddit_32.png" alt="Reddit" data-tooltip class="has-tip" title="Generate Reddit markdown code to display this plan on Reddit comments."></a></li></a></li>
        </ul>
      </div>
      <script type="text/javascript">
        $("#shareButton").click(function() {
          $("#shareBar").slideToggle();
          $("#shareReturn").hide();
        });
        $("#shareGetURL").click(function() {
          $("#shareReturn").toggle();
          $('#shareReturn').html("<textarea>@if ($share){{ URL::to('/plan/show', $share->hash) }}@endif</textarea>");
          $('#shareReturn textarea').select();
        });
        $(".shareGet").click(function() {

          var type = $(this).attr('name');
          var element = $(this);
          var elementParent = $(this).parent();
          var img = $(this).children();

          $(".tooltip").hide();

          jQuery.ajax({
            type: "get",
            url: '/plan/share/' + type + '/{{ $plan->id }}',
            beforeSend: function(){
              $(element).hide();
              $(elementParent).html("<img src=\"/img/ajax-loader.gif\"><br/>Generating");
            },
            success: function(data)
            {
              $(elementParent).html("<img src=\"/img/success-icon.png\" width=32><br/>Generated");
              $('#shareReturn').show();
              $('#shareReturn').html("<div class=\"arrow-up\"></div><div class=\"clearfix\"></div><textarea>" + data + "</textarea>");
              $('#shareReturn textarea').select();
            }
          });

        });
      </script>

      <div class="clearfix"></div>

      <div id="shareReturn" class="hide right"></div>

    </div>

    <div class="row">

      <div class="large-12 columns">
      <h3>Breakfast</h3>

      <table class="pjTable">
        <thead>
          <tr>
            <th style="width: 200px">Name</th>
            <th style="width: 50px">Weight</th>
            <th style="width: 50px">Calories</th>
            <th style="width: 50px">Protein</th>
            <th style="width: 50px">Carbohydrates</th>
            <th style="width: 50px">Fat</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $bCal = 0;
          $bPro = 0;
          $bCar = 0;
          $bFat = 0;
        ?>
        @foreach($breakfasts as $breakfast)
        <?php 
          $bCal = $bCal + $breakfast->calories;
          $bPro = $bPro + $breakfast->protein;
          $bCar = $bCar + $breakfast->carbohydrates; 
          $bFat = $bFat + $breakfast->fat; 
        ?>
            <tr>
              <td>{{ $breakfast->name }}</td>
              <td>{{ $breakfast->weight }}</td>
              <td>{{ $breakfast->calories }}</td>
              <td>{{ $breakfast->protein }}</td>
              <td>{{ $breakfast->carbohydrates }}</td>
              <td>{{ $breakfast->fat }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th style="width: 200px"></th>
            <th>Totals:</th>
            <th><?= $bCal ?></th>
            <th><?= $bPro ?></th>
            <th><?= $bCar ?></th>
            <th><?= $bFat ?></th>
          </tr>
        </tfoot>
      </table>


      <h3>Lunch</h3>

    <table class="pjTable">
      <thead>
        <tr>
          <th style="width: 200px">Name</th>
          <th style="width: 50px">Weight</th>
          <th style="width: 50px">Calories</th>
          <th style="width: 50px">Protein</th>
          <th style="width: 50px">Carbohydrates</th>
          <th style="width: 50px">Fat</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $lCal = 0;
        $lPro = 0;
        $lCar = 0;
        $lFat = 0;
      ?>
      @foreach($lunches as $lunch)
        <?php 
          $lCal = $lCal + $lunch->calories;
          $lPro = $lPro + $lunch->protein;
          $lCar = $lCar + $lunch->carbohydrates; 
          $lFat = $lFat + $lunch->fat; 
        ?>
          <tr>
            <td>{{ $lunch->name }}</td>
            <td>{{ $lunch->weight }}</td>
            <td>{{ $lunch->calories }}</td>
            <td>{{ $lunch->protein }}</td>
            <td>{{ $lunch->carbohydrates }}</td>
            <td>{{ $lunch->fat }}</td>
          </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th style="width: 200px"></th>
          <th>Totals:</th>
          <th><?= $lCal ?></th>
          <th><?= $lPro ?></th>
          <th><?= $lCar ?></th>
          <th><?= $lFat ?></th>
        </tr>
      </tfoot>
    </table>

      <h3>Dinner</h3>
    <table class="pjTable">
      <thead>
        <tr>
          <th style="width: 200px">Name</th>
          <th style="width: 50px">Weight</th>
          <th style="width: 50px">Calories</th>
          <th style="width: 50px">Protein</th>
          <th style="width: 50px">Carbohydrates</th>
          <th style="width: 50px">Fat</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $dCal = 0;
        $dPro = 0;
        $dCar = 0;
        $dFat = 0;
      ?>
      @foreach($dinners as $dinner)
        <?php 
          $dCal = $dCal + $dinner->calories;
          $dPro = $dPro + $dinner->protein;
          $dCar = $dCar + $dinner->carbohydrates; 
          $dFat = $dFat + $dinner->fat; 
        ?>
          <tr>
            <td>{{ $dinner->name }}</td>
            <td>{{ $dinner->weight }}</td>
            <td>{{ $dinner->calories }}</td>
            <td>{{ $dinner->protein }}</td>
            <td>{{ $dinner->carbohydrates }}</td>
            <td>{{ $dinner->fat }}</td>
          </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th style="width: 200px"></th>
          <th>Totals:</th>
          <th><?= $dCal ?></th>
          <th><?= $dPro ?></th>
          <th><?= $dCar ?></th>
          <th><?= $dFat ?></th>
        </tr>
      </tfoot>
    </table>

    <table class="pjTable">
      <thead>
        <tr>
          <th style="width: 200px">Totals</th>
          <th style="width: 50px"> </th>
          <th style="width: 50px">Calories</th>
          <th style="width: 50px">Protein</th>
          <th style="width: 50px">Carbohydrates</th>
          <th style="width: 50px">Fat</th>
        </tr>
      </thead>
      <tbody>
      <tfoot>
        <tr>
          <th style="width: 200px"></th>
          <th>Totals:</th>
          <th><?= $plan->calories ?></th>
          <th><?= $plan->protein ?></th>
          <th><?= $plan->carbohydrates ?></th>
          <th><?= $plan->fat ?></th>
        </tr>
      </tfoot>
    </table>
      </div>
      
    </div>
  </div>
@endsection