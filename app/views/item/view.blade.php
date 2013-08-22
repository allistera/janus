@extends('master')

@section('title')
Viewing Item
@endsection

@section('content')
  <div class="row">
    <h1>Viewing Item</h1>



    {{ Form::open() }}

        <div class="row">
          <div class="large-4 columns @if ($errors->has('name')) error @endif" >
            <label>Name</label>
            {{ Form::text('name', Input::old('name', $item->name)) }}
            <small>
              @foreach ($errors->get('name') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-4 columns @if ($errors->has('weight')) error @endif">
            <label>Weight</label>
            {{ Form::text('weight', Input::old('weight', $item->weight)) }}
            <small>
              @foreach ($errors->get('weight') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-4 columns  @if ($errors->has('calories')) error @endif">
            <label>Calories</label>
            {{ Form::text('calories', Input::old('calories', $item->calories)) }}
            <small>
              @foreach ($errors->get('calories') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-4 columns  @if ($errors->has('protein')) error @endif">
            <label>Protein</label>
            {{ Form::text('protein', Input::old('protein', $item->protein)) }}
            <small>
              @foreach ($errors->get('protein') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-4 columns  @if ($errors->has('carbohydrates')) error @endif">
            <label>Carbohydrates</label>
            {{ Form::text('carbohydrates', Input::old('carbohydrates', $item->carbohydrates)) }}
            <small>
              @foreach ($errors->get('carbohydrates') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-4 columns  @if ($errors->has('fat')) error @endif">
            <label>Fat</label>
            {{ Form::text('fat', Input::old('fat', $item->fat)) }}
            <small>
              @foreach ($errors->get('fat') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-4 columns">
            <input type="submit" class="createButton" value="Update Item">
          </div>
        </div>

    {{ Form::close() }}
  </div>
@endsection