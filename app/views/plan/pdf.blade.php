<!DOCTYPE html>
<html lang="en">
    <head>
        {{ HTML::style('css/pdf.css') }}
    </head>
    <body>

        <div class="page-header">
            <h1>Diet Plan <small>{{ date("l - F jS") }}</small></h1>
        </div>

        <h3>Breakfast</h3>

        <table class="table ">
            <thead>
                <tr>
                    <th style="width: 200px">Name</th>
                    <th style="width: 135px">Weight</th>
                    <th style="width: 50px">Calories</th>
                    <th style="width: 50px">Protein</th>
                    <th style="width: 80px">Carbohydrates</th>
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

        <br/><br/><br/>

        <h3>Lunch</h3>

        <table class="table">
            <thead>
                <tr>
                    <th style="width: 200px">Name</th>
                    <th style="width: 135px">Weight</th>
                    <th style="width: 50px">Calories</th>
                    <th style="width: 50px">Protein</th>
                    <th style="width: 80px">Carbohydrates</th>
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

        <br/><br/><br/>

        <h3>Dinner</h3>

        <table class="table">
            <thead>
                <tr>
                    <th style="width: 200px">Name</th>
                    <th style="width: 135px">Weight</th>
                    <th style="width: 50px">Calories</th>
                    <th style="width: 50px">Protein</th>
                    <th style="width: 80px">Carbohydrates</th>
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

        <br/><br/><br/>

        <table class="table">
            <thead>
                <tr>
                    <th style="width: 200px"></th>
                    <th style="width: 135px"></th>
                    <th style="width: 50px">Calories</th>
                    <th style="width: 50px">Protein</th>
                    <th style="width: 80px">Carbohydrates</th>
                    <th style="width: 50px">Fat</th>
                </tr>
            </thead>
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

        <page_footer>
          Created using Your Diet Planner
        </page_footer>

    </body>
</html>
