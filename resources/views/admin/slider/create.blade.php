<x-default-layout>
    <x-slot:title>
        {!! $data['title'] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "picture" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="post" enctype="multipart/form-data" action="{{ route("slider.store") }}">
                @csrf
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="mb-10">
                            <label for="title" class="required form-label">عنوان</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="عنوان"/>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="mb-10">
                            <label for="type" class="required form-label">نوع</label>
                            <select class="form-control" id="type" name="type">
                                <option>انتخاب کنید</option>
                                @foreach(\App\Enums\SliderEnum::allType() as $sliderType)
                                    <option value="{{ $sliderType }}">{{ $sliderType }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="mb-10">
                            <label for="priority" class="required form-label">اولویت</label>
                            <input type="number" class="form-control" name="priority" id="priority" min="1">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="mb-10">
                            <label for="category_id" class="required form-label">دسته بندی</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option>انتخاب کنید</option>
                                @foreach($data['categories'] as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="mb-10">
                            <label for="image" class="required form-label">عکس انتخابی</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary mt-10">
                            {!! trans("panel.save_btn") !!}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-default-layout>
