[table]
[tr]
    [td][/td]
    [td][b]Name[/b][/td]
    [td][b]Weight[/b][/td]
    [td][b]Calories[/b][/td]
    [td][b]Protein[/b][/td]
    [td][b]Carbohydrates[/b][/td]
    [td][b]Fat[/b][/td]
[/tr]
[tr]
<?php $b = 0; ?>
@foreach($breakfasts as $breakfast)
    @if($b == 0) [td][b]Breakfast[/b][/td] @endif
    [td]{{ $breakfast->name }}[/td]
    [td]{{ $breakfast->weight }}[/td]
    [td]{{ $breakfast->calories }}[/td]
    [td]{{ $breakfast->protein }}[/td]
    [td]{{ $breakfast->carbohydrates }}[/td]
    [td]{{ $breakfast->fat }}[/td]
<?php $b++; ?> 
@endforeach
[/tr]
[tr]
<?php $l = 0; ?>
@foreach($lunches as $lunch)
    @if($l == 0) [td][b]Lunch[/b][/td] @endif
    [td]{{ $lunch->name }}[/td]
    [td]{{ $lunch->weight }}[/td]
    [td]{{ $lunch->calories }}[/td]
    [td]{{ $lunch->protein }}[/td]
    [td]{{ $lunch->carbohydrates }}[/td]
    [td]{{ $lunch->fat }}[/td]
<?php $l++; ?> 
@endforeach
[/tr]
[tr]
<?php $d = 0; ?>
@foreach($dinners as $dinner)
    @if($d == 0) [td][b]Dinner[/b][/td] @endif
    [td]{{ $dinner->name }}[/td]
    [td]{{ $dinner->weight }}[/td]
    [td]{{ $dinner->calories }}[/td]
    [td]{{ $dinner->protein }}[/td]
    [td]{{ $dinner->carbohydrates }}[/td]
    [td]{{ $dinner->fat }}[/td]
<?php $d++; ?> 
@endforeach
[/tr]
[tr]
    [td][b]Totals[/b][/td]
    [td][/td]
    [td][/td]
    [td][b]{{ $plan->calories }}[/b][/td]
    [td][b]{{ $plan->protein }}[/b][/td]
    [td][b]{{ $plan->carbohydrates }}[/b][/td]
    [td][b]{{ $plan->fat }}[/b][/td]
[/tr]
[/table]
