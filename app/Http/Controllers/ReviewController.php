<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
     * Agrega una nueva review a un lugar
     * @param int $category_id
     * @param int $place_id
     * @return \Illuminate\View\View
     */
    public function addReviewAction(Request $request)
    {
        $userId = Auth::id();

        $place = Place::findOrFail($request->place_id);

        // Verificar si ya existe una review del mismo usuario para este lugar
        $existingReview = Review::where('place_id', $request->place_id)
        ->where('user_id', $userId)
        ->first();

          if ($existingReview) {

              [
                'existingReview' => $existingReview,
                'category' => $place->categories,
                'place' => $place,
              ];
              return redirect()->back()->with('status.message', '¡Ya opinaste sobre este lugar!')->with('status.type', 'danger')
              ->with('status.link', route('editReviewForm', ['review_id' => $existingReview->review_id]));
          }

        $request->validate(Review::$rules, Review::$errorMessages);

        $data = $request->only('place_id', 'user_id', 'review', 'score');

        // Procesar imágenes si están presentes
        $images = ['pic_1', 'pic_2', 'pic_3'];
        $altImages = ['alt_pic_1', 'alt_pic_2', 'alt_pic_3'];
        foreach ($images as $image) {
            if ($request->hasFile($image)) {
                $request->validate([
                    $image => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);

                $file = $request->file($image);

                // create image manager with desired driver
                $manager = new ImageManager(new Driver());

                // read image from file system
                $img = $manager->read($file->getRealPath());

                // resize image proportionally to 510px width and height
                $img->scale(width: 510, height: 510);

                $fileName = $userId . '_' . $image . '_' . time() . '.' . $file->getClientOriginalExtension();
                $img->save(public_path('storage/reviews/' . $fileName), 80); // Guarda la imagen con calidad 80

                $data[$image] = 'reviews/' . $fileName; // Guarda la ruta de la imagen en el array de datos

                // Get the index of the current image
                $index = array_search($image, $images);

                // Use the index to get the corresponding alt image
                $altImage = $altImages[$index];

                // Store the alt image in the data array, or a default value if it's not set
                $data[$altImage] = $request->input($altImage) ?? 'foto no descripta subida por el usuario';
            }
        }

        // Crear la review con las imágenes procesadas
        Review::create(array_merge($data, [
            'user_id' => $userId,
            'status' => 'pending',
        ]));

        return redirect()
            ->route('placeDetail', [
                'category_id' => $place->categories->category_id,
                'place_id' => $request->place_id
            ])
            ->with('status.message', 'Gracias por dejarnos tu opinión. Una vez aprobada por el equipo de nivelo, será visible en la página.');
    }

    /**
     * Retorna la vista del formulario de edición de una review
     * @param int $review_id
     * @return \Illuminate\View\View
     */
    public function editReviewForm(int $review_id)
    {
        return view('places.edit-review-form', [
            'review' => Review::findOrFail($review_id),
            'place' => Review::findOrFail($review_id)->place,
            'category' => Review::findOrFail($review_id)->place->categories,
        ]);
    }


    /**
     * Edita una review
     * @param int $review_id
     * @return \Illuminate\View\View
     */
    public function editReviewAction(Request $request)
    {
        $userId = Auth::id();

        $review = Review::findOrFail($request->review_id);

        $request->validate(Review::$rules, Review::$errorMessages);

        $data = $request->only('review', 'score');

        // Procesar imágenes si están presentes
        $images = ['pic_1', 'pic_2', 'pic_3'];
        $altImages = ['alt_pic_1', 'alt_pic_2', 'alt_pic_3'];
        foreach ($images as $image) {
            if ($request->hasFile($image)) {
                $request->validate([
                    $image => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);

                $file = $request->file($image);

                // create image manager with desired driver
                $manager = new ImageManager(new Driver());

                // read image from file system
                $img = $manager->read($file->getRealPath());

                // resize image proportionally to 510px width and height
                $img->scale(width: 510, height: 510);

                $fileName = $userId . '_' . $image . '_' . time() . '.' . $file->getClientOriginalExtension();
                $img->save(public_path('storage/reviews/' . $fileName), 80); // Guarda la imagen con calidad 80

                $data[$image] = 'reviews/' . $fileName; // Guarda la ruta de la imagen en el array de datos

                // Get the index of the current image
                $index = array_search($image, $images);

                // Use the index to get the corresponding alt image
                $altImage = $altImages[$index];

                // Store the alt image in the data array, or a default value if it's not set
                $data[$altImage] = $request->input($altImage) ?? 'foto no descripta subida por el usuario';
            } else {
                // Si no se subió una nueva imagen, se mantiene la imagen actual
                $data[$image] = $review->$image;

                // Obtener el nombre de la propiedad alt image como una cadena
                $altImagePropertyName = $altImages[array_search($image, $images)];

                // Usar el nombre de la propiedad para acceder a la propiedad del objeto $review
                $data[$altImagePropertyName] = $review->$altImagePropertyName;
            }
        }
        // Actualizar la review con las imágenes procesadas
        $review->update(array_merge($data, [
            'status' => 'pending',
        ]));

        return redirect()
            ->route('reviewDetail', [
                'category_id' => $review->place->categories->category_id,
                'place_id' => $review->place_id,
                'review_id' => $request->review_id
            ])
            ->with('status.message', 'Tu reseña fue correctamente editada. Una vez aprobada por el equipo de nivelo, será visible en la página.');

    }
    public function getReviewPlaces($place_id)
    {
      $reviews = Review::where('place_id', $place_id)->with('user')->get();
      return response()->json($reviews);
    }
}

