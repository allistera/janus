@extends('master')

@section('title') Creating Plan @endsection

@section('javascript')
{{ HTML::script('js/plan.create.js') }}
@endsection

@section('content')

<div class="row">
    <h1>Creating Plan</h1>

    {{ Form::open() }}
    <input type="hidden" id="breakfastForm" name="breakfast">
    <input type="hidden" id="lunchForm" name="lunch">
    <input type="hidden" id="dinnerForm" name="dinner">

    <input type="hidden" id="caloriesTotal" name="calories">
    <input type="hidden" id="proteinTotal" name="protein">
    <input type="hidden" id="carbohydratesTotal" name="carbohydrates">
    <input type="hidden" id="fatTotal" name="fat">

    <div class="row">

        <div class="large-9 columns">
            <h3>Breakfast</h3>

            <table class="pjTable" id="breakfastTable">
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
                <tbody class="breakfast">
                    <tr class="placeholder">
                        <td class="placeholder" >Drag your breakfast items here</td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th style="width: 200px"></th>
                        <th>Totals:</th>
                        <th class="breakfastCaloriesTotal">0</th>
                        <th class="breakfastProteinTotal">0</th>
                        <th class="breakfastCarbsTotal">0</th>
                        <th class="breakfastFatTotal">0</th>
                    </tr>
                </tfoot>
            </table>

            <h3>Lunch</h3>

            <table class="pjTable" id="lunchTable">
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
                <tbody class="lunch">
                    <tr class="placeholder" >
                        <td class="placeholder" >Drag your lunch items here</td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Totals:</th>
                        <th class="lunchCaloriesTotal">0</th>
                        <th class="lunchProteinTotal">0</th>
                        <th class="lunchCarbsTotal">0</th>
                        <th class="lunchFatTotal">0</th>
                    </tr>
                </tfoot>
            </table>

            <h3>Dinner</h3>

            <table class="pjTable" id="dinnerTable">
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
                <tbody class="dinner">
                    <tr class="placeholder">
                        <td class="placeholder" >Drag your dinner items here</td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                        <td class="placeholder" ></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Totals:</th>
                        <th class="dinnerCaloriesTotal">0</th>
                        <th class="dinnerProteinTotal">0</th>
                        <th class="dinnerCarbsTotal">0</th>
                        <th class="dinnerFatTotal">0</th>
                    </tr>
                </tfoot>
            </table>

            <table class="pjTable">
                <thead>
                    <tr>
                        <th class="placeholder" style="width: 330px; text-align:right;" >Daily Totals:</th>
                        <th class="dailyCaloriesTotal" style="text-align:left;width:  100px">0</th>
                        <th class="dailyProteinTotal" style="text-align:left;width: 90px">0</th>
                        <th class="dailyCarbsTotal" style="text-align:left;width: 160px" >0</th>
                        <th class="dailyFatTotal" style="text-align:left">0</th>
                    </tr>
                </thead>
            </table>

            <table class="pjTable">
                <thead>
                    <tr>
                        <th class="placeholder" style="width: 330px; text-align:right;" >Goals:</th>
                        <th class="" style="text-align:left;width:  100px">{{ Auth::user()->calories }}</th>
                        <th class="" style="text-align:left;width: 90px">{{ Auth::user()->protein }}</th>
                        <th class="" style="text-align:left;width: 160px" >{{ Auth::user()->carbohydrates }}</th>
                        <th class="" style="text-align:left">{{ Auth::user()->fat }}</th>
                    </tr>
                </thead>
            </table>

            <input type="submit" id="button" class="createButton" value="Save Me">

        </div>

        <div class="large-3 columns panel items">
            <h3>Items</h3>
            <div id="products">
                <div id="catalog">
                    <input type="text" id="q" placeholder="Search..."/>
                    <ul class="side-nav" id="itemsList">
                    @foreach ($items as $item)
                        <li id='id_{{ $item->id }}' weight="{{ $item->weight }}" calories="{{ $item->calories }}" protein="{{ $item->protein}}" carbohydrates="{{ $item->carbohydrates }}" fat="{{ $item->fat}}">{{ $item->name }}</li>
                    @endforeach
                    </ul>
                </div>
                @if (count($items) === 0)
                    <p>No items created yet - <a href="/item/create">Create One</a>?</p>
                @endif
            </div>
        </div>

        {{ Form::close() }}

    </div>
</div>

@endsection
