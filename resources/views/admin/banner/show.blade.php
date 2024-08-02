<x-default-layout>
    <x-slot:title>
        {{ $data["title"] }}
    </x-slot:title>

    <div class="row">
        <div class="col-12 bg-secondary p-3 rounded-3">
            <p>
                <span class="menu-icon">{!! getIcon(name: "row-horizontal" , class: "fs-2") !!}</span>
                &nbsp;
                {!! $data["title"] !!}
            </p>
        </div>

        <div class="col-12 mt-12">
            <form method="post" enctype="multipart/form-data" action="{{ route('banner.update' , $data["banner"]->id) }}">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="type" class="required form-label">نوع</label>
                            <select id="type" name="type" class="form-select">
                                <option value="" selected>انتخاب کنید</option>
                                <option @if($data["banner"]->type == 1) selected @endif value="1">پست</option>
                                <option @if($data["banner"]->type == 2) selected @endif value="2">دسته بندی</option>
                                <option @if($data["banner"]->type == 3) selected @endif value="3">لینک خارجی</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="post_id" class="form-label">محصول</label>
                            <select id="post_id"  class="form-select" name="post_id" @if($data["banner"]->type != 1) disabled @endif>
                                <option>انتخاب کنید</option>
                                @foreach($data["posts"] as $post)
                                    <option @if($data["banner"]->post_id == $post->id) selected @endif value="{{ $post->id }}">{{ $post->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="category_id" class="form-label">دسته بندی</label>
                            <select id="category_id" class="form-select" name="category_id" @if($data["banner"]->type != 2) disabled @endif>
                                <option>انتخاب کنید</option>
                                @foreach($data["categories"] as $category)
                                    <option @if($data["banner"]->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="link" class="form-label">لینک</label>
                            <input type="text" id="link" name="link" class="form-control" value="{{ $data["banner"]->link }}" placeholder="لینک" @if($data["banner"]->type != 3) disabled @endif>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="status" class="required form-label">وضعیت</label>
                            <select id="status" name="status" class="form-select">
                                <option @if($data["banner"]->status == 1) selected @endif value="1" >فعال</option>
                                <option @if($data["banner"]->status == 0) selected @endif value="0">غیر فعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="mb-10">
                            <label for="image" class="required form-label">عکس</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {!! trans("panel.update_btn") !!}
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <x-slot:scripts>
        <script>
            post = $("#post_id");
            link = $("#link");
            category = $("#category_id");

            $("#type").change(function (){
                let type_value = $(this).val();
                if(type_value === "1")
                {
                    post.removeAttr("disabled");
                    link.prop("disabled" , true);
                    link.val(null);
                    category.prop("disabled" , true);
                    category.val(null)

                }else if(type_value === "2"){
                    post.prop("disabled" , true);
                    post.val(null)
                    link.prop("disabled" , true);
                    link.val(null);
                    category.removeAttr("disabled");

                }else if(type_value === "3"){
                    post.prop("disabled" , true);
                    post.val(null)
                    link.removeAttr("disabled");
                    category.prop("disabled" , true);
                    category.val(null)

                }else{
                    post.prop("disabled" , true);
                    post.val(null)
                    link.prop("disabled" , true);
                    link.val(null);
                    category.prop("disabled" , true);
                    category.val(null)
                }
            })
        </script>
    </x-slot:scripts>

</x-default-layout>
