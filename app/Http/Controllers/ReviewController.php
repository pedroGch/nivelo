<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


  /**
   * Retorna la vista de detalle de una review
   * @param int $id
   * @return \Illuminate\View\View
   */
   public function reviewDetail(int $category_id, int $place_id, int $review_id) {

    return view('places.review-detail', [
      "review" => Review::findOrFail($review_id),
      "place" => Place::findOrFail($place_id),
      "category" => Category::findOrFail($category_id),
      "src_information" => Place::findOrFail($place_id)->srcInformation,
      "uploaded_from_id" => Place::findOrFail($place_id)->uploadedFrom,
    ]);
    }


    /**
     * Retorna la vista del formulario de carga de una nueva review
     * @param int $category_id
     * @param int $place_id
     * @return \Illuminate\View\View
     */
    public function addReviewForm(int $category_id, int $place_id)
    {

      return view('places.add-review-form', [
        "category" => Place::findOrFail($category_id),
        "place" => Place::findOrFail($place_id)]);
    }

    /**
     * Retorna la vista del formulario de carga de una nueva review
     * @param int $category_id
     * @param int $place_id
     * @return \Illuminate\View\View
     */
    public function addReviewAction(Request $request)
    {
      $userId = Auth::id();

      $place = Place::findOrFail($request->place_id);

      $request->validate(Review::$rules, Review::$errorMessages);

      Review::Create([
        "place_id" => $request->place_id,
        "user_id" => $userId,
        "review" => $request->review_text,
        "score" => $request->score,
      ]);
      return redirect()
      // ->route('categories')
      ->route('placeDetail', ['category_id' => $place->categories->category_id, 'place_id' => $request->place_id])
      ->with('status.message', 'Gracias por dejarnos tu opinión');
    }
}

