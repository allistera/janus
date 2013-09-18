@extends('master')

@section('title') Set Goals @endsection

@section('content')
  <div class="row">
    <h1>Set Goals</h1>
    <p>By setting your personal goals you can easily see if you have matched your targets when creating new diet plans.</p>

    {{ Form::open() }}

        <div class="row">
          <div class="large-2 columns  @if ($errors->has('calories')) error @endif">
            <label>Calories</label>
            {{ Form::text('calories', Input::old('calories', Auth::user()->calories)) }}
            <small>
              @foreach ($errors->get('calories') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-2 columns  @if ($errors->has('protein')) error @endif">
            <label>Protein</label>
            {{ Form::text('protein', Input::old('protein', Auth::user()->protein)) }}
            <small>
              @foreach ($errors->get('protein') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-2 columns  @if ($errors->has('carbohydrates')) error @endif">
            <label>Carbohydrates</label>
            {{ Form::text('carbohydrates', Input::old('carbohydrates', Auth::user()->carbohydrates)) }}
            <small>
              @foreach ($errors->get('carbohydrates') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <div class="row">
          <div class="large-2 columns  @if ($errors->has('fat')) error @endif">
            <label>Fat</label>
            {{ Form::text('fat', Input::old('fat', Auth::user()->fat)) }}
            <small>
              @foreach ($errors->get('fat') as $message)
                  {{ $message }}
              @endforeach
            </small>
          </div>
        </div>

        <input type="submit" id="button" class="createButton" value="Save">
    </form>
  </div>
@endsection
