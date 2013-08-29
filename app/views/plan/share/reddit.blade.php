||Name|Weight|Calories|Protein (g)|Carbohydrates (g)|Fat (g)
:-----------|:-----------|:------------|:------------|:------------|:------------|:------------
<?php $b = 0; ?>
@foreach($breakfasts as $breakfast)
| <?php if($b == 0) echo "**Breakfast**"; ?> | {{ $breakfast->name }} | {{ $breakfast->weight }} | {{ $breakfast->calories }} | {{ $breakfast->protein }} | {{ $breakfast->carbohydrates }} | {{ $breakfast->fat }}<?php $b++; ?>
@endforeach
|  |   |  |  |  |  |
<?php $l = 0; ?>
@foreach($lunches as $lunch)
|<?php if($l == 0) echo "**Lunch**"; ?>| {{ $lunch->name }} | {{ $lunch->weight }} | {{ $lunch->calories }} | {{ $lunch->protein }} | {{ $lunch->carbohydrates }} | {{ $lunch->fat }}<?php $l++; ?>
@endforeach
|  |   |  |  |  |  |
<?php $d = 0; ?>
@foreach($dinners as $dinner)
|<?php if($d == 0) echo "**Dinner**"; ?>| {{ $dinner->name }} | {{ $dinner->weight }} | {{ $dinner->calories }} | {{ $dinner->protein }} | {{ $dinner->carbohydrates }} | {{ $dinner->fat }}    <?php $d++; ?>
@endforeach
|  |   |  |  |  |  |
|**Total**| |  | {{ $plan->calories }} | {{ $plan->protein }} | {{ $plan->carbohydrates }} | {{ $plan->fat }}    <?php $d++; ?>
Generated on [Your Diet Planner](http://yourdietplanner.net)
