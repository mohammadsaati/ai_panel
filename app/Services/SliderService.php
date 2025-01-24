<?php

 namespace App\Services;

 use App\Enums\SliderEnum;
 use App\Models\Category;
 use App\Models\Slider;
 use App\Services\Service;
 use Illuminate\Http\JsonResponse;
 use Illuminate\Support\Facades\DB;

 class SliderService extends Service
{

 	public function model()
	{
        $this->model = Slider::class;
	}

     /**
      * create new slider
      *
      * @param array $data
      * @return void
      */
     public function create(array $data): void
     {
         try {
             DB::beginTransaction();
             $fileName = file_name($data['image']);
             $data['image'] = $fileName;

             $slider = Slider::create($data);

             if ($data['type'] != SliderEnum::LINK->value) {
                 $model = $this->getRelatedModel(data: $data);
                 $this->saveType(model: $model, slider: $slider);
             }

             image_creator(path: 'sliders', file_name: $fileName);
             DB::commit();
         } catch (\Exception $exception) {
             DB::rollBack();
         }

     }


     /**
      * Update Given Slider
      *
      * @param Slider $slider
      * @param array $data
      * @return Slider
      */
     public function update(Slider $slider, array $data): Slider
     {
         $this->updateStorageImage(item: $slider, image_folder_name: 'slider');

         $slider->update($data);

         return $slider;
     }


     /**
      * delete given slider
      *
      * @param Slider $slider
      * @return JsonResponse
      */
     public function delete(Slider $slider): JsonResponse
     {
         try {
             DB::beginTransaction();

             delete_image(path: 'sliders', image: $slider->image);
             $slider->delete();

             DB::commit();
             return response_as_json(data: [
                 'message' => trans('panel.delete_msg')
             ]);
         } catch (\Exception $exception) {
             DB::rollBack();
             return response_as_json(data: [
                 'message' => trans('panel.error_message')
             ], code: $exception->getCode());
         }
     }


     /**
      * save type for created slider
      *
      * @param $model
      * @param Slider $slider
      * @return void
      */
     private function saveType($model, Slider $slider): void
     {
         $model->slider()->save($slider);
     }

     /**
      * Show  slider type model
      * @param array $data
      */
     private function getRelatedModel(array $data)
     {
         return match ($data['type']) {
             SliderEnum::CATEGORY->value => Category::find($data['category_id']),
             default => null
         };
     }
 }
