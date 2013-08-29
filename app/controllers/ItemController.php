<?php

class ItemController extends \BaseController
{

    /**
     * Validation rules for items create/view
     */
    private $validationRules = [
        'name' => 'required|min:2',
        'weight' => 'max:100',
        'calories' => 'numeric|between:0,999',
        'protein' => 'numeric|between:0,999',
        'carbohydrates' => 'numeric|between:0,999',
        'fat' => 'numeric|between:0,999',
    ];

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    /**
     * View a list of all the users items
     *
     * @return View item/list
     */
    public function getIndex()
    {
        $items = Item::whereuser_id(Auth::user()->id)->orderBy('name')->paginate(20);
        return View::make('item.list')->with('items', $items);
    }

    /**
    * Show the form for creating a new item
    *
    * @return View item/create
    */
    public function getCreate()
    {
        return View::make('item.create');
    }

    /**
     * Create a new item logic
     *
     * @return Redirect
     */
    public function postCreate()
    {
        $validator = Validator::make(Input::all(), $this->validationRules);

        if ($validator->fails()) {
            Input::flash();
            return Redirect::to('item/create')->withErrors($validator);
        } else {

            $item = new Item;

            $item->name = Input::get('name');
            $item->weight = Input::get('weight');
            $item->calories = Input::get('calories');
            $item->protein = Input::get('protein');
            $item->carbohydrates = Input::get('carbohydrates');
            $item->fat = Input::get('fat');
            $item->user_id = Auth::user()->id;

            $item->save();

            return Redirect::to('item')->with('success', "Successfully Created The {$item->name} Item!");
        }
    }

    /**
     * Display a form containing item to edit
     *
     * @param  int $id Of the item to get
     * @return View    item/view
     */
    public function getView($id)
    {
        return View::make('item.view')->with('item', Item::find($id));
    }

    /**
     * Logic to update an item
     *
     * @param  int $id Of the item to update
     * @return Redirect
     */
    public function postView($id)
    {
        $validator = Validator::make(Input::all(), $this->validationRules);

        if ($validator->fails()) {
            Input::flash();
            return Redirect::to('item/view/' . $id)->withErrors($validator);
        } else {
            $item = Item::find($id);
            $item->name = Input::get('name');
            $item->weight = Input::get('weight');
            $item->calories = Input::get('calories');
            $item->protein = Input::get('protein');
            $item->carbohydrates = Input::get('carbohydrates');
            $item->fat = Input::get('fat');
            $item->save();

            return Redirect::to('item')->with('success', "Successfully Updated The {$item->name} Item!");
        }

    }

    /**
    * Remove the specified item from the database.
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
