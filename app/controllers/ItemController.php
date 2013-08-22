<?php

class ItemController extends \BaseController {
	
	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('item.list')->with('items', Item::whereuser_id(Auth::user()->id)->orderBy('name')->paginate(20) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('item.create');
	}

	public function postCreate()
	{
		$rules = array(
		  'name' => 'required|min:2',
		  'weight' => 'max:100',
		  'calories' => 'numeric|between:0,999',
		  'protein' => 'numeric|between:0,999',
		  'carbohydrates' => 'numeric|between:0,999',
		  'fat' => 'numeric|between:0,999',
		);

		$validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	    	Input::flash();
	        return Redirect::to('item/create')->withErrors($validator);
	    }else{
	    	
			$item = new Item;

			$item->name = Input::get('name');
			$item->weight = Input::get('weight');
			$item->calories = Input::get('calories');
			$item->protein = Input::get('protein');
			$item->carbohydrates = Input::get('carbohydrates');
			$item->fat = Input::get('fat');
			$item->user_id = Auth::user()->id;

			$item->save();

			return Redirect::to('item')->with('success', "Successfully Created The {$item->name} Item !");
		}
  	}

  	public function getView($id)
  	{
  		return View::make('item.view')->with('item', Item::find($id));
  	}

  	public function postView($id)
  	{
		$rules = array(
		  'name' => 'required|min:2',
		  'weight' => 'max:100',
		  'calories' => 'numeric|between:0,999',
		  'protein' => 'numeric|between:0,999',
		  'carbohydrates' => 'numeric|between:0,999',
		  'fat' => 'numeric|between:0,999',
		);

		$validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	    	Input::flash();
	        return Redirect::to('item/view/' . $id)->withErrors($validator);
	    }else{
	    	$item = Item::find($id);
			$item->name = Input::get('name');
			$item->weight = Input::get('weight');
			$item->calories = Input::get('calories');
			$item->protein = Input::get('protein');
			$item->carbohydrates = Input::get('carbohydrates');
			$item->fat = Input::get('fat');
			$item->save();
	    	return Redirect::to('item')->with('success', "Successfully Updated The {$item->name} Item !");
	    }

  	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
		Item::destroy($id);

		return Redirect::to('item')->with('success', "Successfully Deleted The Item!");
	}

}