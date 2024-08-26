<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "notepad-edit" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="post" enctype="multipart/form-data" action="{{ route("post.update" , $data["post"]) }}">
                @csrf
                <div class="row">
                    <div class="col-10">
                        <div class="mb-10">
                            <label for="nameFormControl" class="required form-label">عنوان</label>
                            <input type="text" name="title" id="nameFormControl" class="form-control" value="{{ $data["post"]->title }}" placeholder="عنوان"/>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary mt-10 w-75">
                            {!! trans("panel.update_btn") !!}
                        </button>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-6 col-12">
                        <label for="kt-tinymce-4" class="required form-label">توضیحات</label>
                        <textarea id="kt-tinymce-4" name="description" class="tox-target" rows="10">
                            {!! $data["post"]->description !!}
                        </textarea>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">

                        <div class="p-3">
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-check form-check-custom form-check-success form-check-solid">
                                        <input id="activeStatus" class="form-check-input" type="radio" name="status" value="1" @if($data["post"]->status) checked @endif />
                                        <label class="form-check-label" for="activeStatus">
                                            فعال
                                        </label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check form-check-custom form-check-danger form-check-solid">
                                        <input id="deActiveStatus" class="form-check-input" type="radio" name="status" value="0" @if(!$data["post"]->status) checked @endif/>
                                        <label class="form-check-label" for="deActiveStatus">
                                            غیر فعال
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="p-3">
                            <label for="categoryId" class="required form-label">دسته بندی</label>
                            <select id="categoryId" name="category_id" class="form-select" data-control="select2" data-placeholder="انتخاب دسته بندی">
                                <option></option>
                                @foreach($data["categories"] as $category)
                                    <option @if($data["post"]->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="p-3">
                            <label for="contentId" class="required form-label">محتوا</label>
                            <select id="contentId" name="content_type_id" class="form-select" data-control="select2" data-placeholder="نوع محتوا">
                                <option></option>
                                @foreach($data["content_types"] as $content)
                                    <option @if($data["post"]->content_type_id = $content->id) selected @endif value="{{ $content->id }}">{{ $content->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="p-3">
                            <label for="image" class="required form-label">عکس</label>
                            <input id="image" type="file" name="image" class="form-control">
                        </div>

                        <div class="p-3">
                            <p class="bold"><b>عکس فعلی</b></p>
                            <img src="{{ get_image("posts/".$data["post"]->image) }}" class="img-fluid rounded-3" loading="lazy" alt="{{ $data["post"]->title }}">
                        </div>


                    </div>
                </div>

            </form>
        </div>
    </div>


    @section("scripts")
        <script src="{{ asset('assets/js/Tinymce.js') }}" referrerpolicy="origin"></script>

        <script type="text/javascript">

            // Class definition

            var KTTinymce = function () {
                // Private functions
                var demos = function () {
                    tinymce.init({
                        selector: '#kt-tinymce-4',
                        menubar: false,
                        toolbar: [
                            'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                            'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],
                        plugins : 'advlist autolink link image lists charmap print preview code'
                    });
                }

                return {
                    // public functions
                    init: function() {
                        demos();
                    }
                };
            }();

            // Initialization
            jQuery(document).ready(function() {
                KTTinymce.init();
            });



        </script>
    @endsection
</x-default-layout>
