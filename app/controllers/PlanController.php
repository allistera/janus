<?php

class PlanController extends \BaseController {
	
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
		return View::make('plan.list')->with('plans', Plan::whereuser_id(Auth::user()->id)->orderBy('created_at')->get() );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('plan.create')->with('items', Item::where('user_id', '=', Auth::user()->id)->orderBy('name')->get());
	}

	public function postCreate()
	{
		$params = [];
		parse_str($_POST['breakfast'], $params['breakfast']);
		parse_str($_POST['lunch'], $params['lunch']);
		parse_str($_POST['dinner'], $params['dinner']);

		$plan = new Plan;

		$plan->user_id = Auth::user()->id;

		$plan->breakfast = (isset($params['breakfast']['id'])) ? implode(',', $params['breakfast']['id']) : null ;
		$plan->lunch = (isset($params['lunch']['id'])) ? implode(',', $params['lunch']['id']) : null ;
		$plan->dinner = (isset($params['dinner']['id'])) ? implode(',', $params['dinner']['id']) : null ;

		$plan->calories = Input::get('calories');
		$plan->protein = Input::get('protein');
		$plan->carbohydrates = Input::get('carbohydrates');
		$plan->fat = Input::get('fat');

		$plan->save();

		return Redirect::to('plan/view/' . $plan->id )->with('success', "Successfully Created This Plan !");
	}

	public function getView($id)
	{
		// Get the current plan
		$plan = Plan::find($id);

		$breakfasts = explode(',', $plan->breakfast);
		$breakfasts = Item::wherein('id', $breakfasts)->get();

		$lunches = explode(',', $plan->lunch);
		$lunches = Item::wherein('id', $lunches)->get();

		$dinner = explode(',', $plan->dinner);
		$dinners = Item::wherein('id', $dinner)->get();

		// Check if the plan has been shared
		$share = Share::where('plan_id', '=', $id)->first();

		return View::make('plan.view')->with('breakfasts', $breakfasts )->with('lunches', $lunches )->with('dinners', $dinners )->with('plan', $plan )->with('share', $share);
	}

	public function getExport($id)
	{
		require_once(base_path()."/vendor/ensepar/html2pdf/HTML2PDF.php");

		// Get the current plan
		$plan = Plan::find($id);

		$breakfasts = explode(',', $plan->breakfast);
		$breakfasts = Item::wherein('id', $breakfasts)->get();

		$lunches = explode(',', $plan->lunch);
		$lunches = Item::wherein('id', $lunches)->get();

		$dinner = explode(',', $plan->dinner);
		$dinners = Item::wherein('id', $dinner)->get();

		$html2pdf = new HTML2PDF('P','A4','en');
		$html2pdf->WriteHTML(View::make('plan.pdf')->with('breakfasts', $breakfasts )->with('lunches', $lunches )->with('dinners', $dinners )->with('plan', $plan ));

		return Response::make($html2pdf->Output(), 200, array('Content-type' => 'application/pdf'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDelete($id)
	{
		// First delete all shares
		Share::where('plan_id', '=', $id)->delete();

		// Now delete the plan
		Plan::find($id)->delete();

		return Redirect::to('plan')->with('success', "Successfully Deleted The Plan!");
	}

	public function getShare($type, $id)
	{
		// Get the current plan
		$plan = Plan::find($id);

		$breakfasts = explode(',', $plan->breakfast);
		$breakfasts = Item::wherein('id', $breakfasts)->get();

		$lunches = explode(',', $plan->lunch);
		$lunches = Item::wherein('id', $lunches)->get();

		$dinner = explode(',', $plan->dinner);
		$dinners = Item::wherein('id', $dinner)->get();

		switch ($type) {
			case 'reddit':
				return View::make('plan.share.reddit')->with('breakfasts', $breakfasts )->with('lunches', $lunches )->with('dinners', $dinners )->with('plan', $plan );

				break;

			case 'forum':
				return View::make('plan.share.bbcode')->with('breakfasts', $breakfasts )->with('lunches', $lunches )->with('dinners', $dinners )->with('plan', $plan );

				break;

			case 'url':
				// Generate random name
				$link = md5(time() . 'allisterrandom42!');

				// Save link
				$share = new Share;
				$share->user_id = Auth::user()->id;
				$share->plan_id = $id;
				$share->hash = $link;

				$share->save();

				return url('plan/show') . '/' . $link;
				break;
			
			default:
				# code...
				break;
		}
	}

	public function getShow($hash)
	{
		// Lookup the hash
		$share = Share::where('hash', '=', $hash)->first();

		// Get the plan
		$plan = Plan::find($share->plan_id);

		$breakfasts = explode(',', $plan->breakfast);
		$breakfasts = Item::wherein('id', $breakfasts)->get();

		$lunches = explode(',', $plan->lunch);
		$lunches = Item::wherein('id', $lunches)->get();

		$dinner = explode(',', $plan->dinner);
		$dinners = Item::wherein('id', $dinner)->get();

		$dateCreated = date("dS \of F Y \- \t g:i a", strtotime($plan->created_at));

		return View::make('plan.share.html')->with('breakfasts', $breakfasts )->with('lunches', $lunches )->with('dinners', $dinners )->with('plan', $plan )->with('createDate', $dateCreated );
	}

}