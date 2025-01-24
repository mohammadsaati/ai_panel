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

            <div class="table-responsive">
                <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">

                    <thead class="bg-secondary">
                    <tr>
                        <th scope="col"><b>#</b></th>
                        <th scope="col"><b>عنوان</b></th>
                        <th scope="col"><b>عکس</b></th>
                        <th scope="col"><b>نوع</b></th>
                        <th scope="col"><b>عملیات</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php $i = 1; @endphp
                    @foreach($data["sliders"] as $slider)
                        <tr id="tr-{{ $slider->id }}">
                            <td>{{ $i }}</td>
                            <td>{{$slider->title }}</td>
                            <td>
                                <img src="{{ get_image('sliders/' . $slider->image) }}"
                                     alt="{{ $slider->title }}"
                                     class="img-thumbnail w-100px h-100px"
                                     style=""
                                >
                            </td>
                            <td>{{ $slider->type }}</td>
                            <td>
                                @php
                                    $deleteConfig = [
                                         "item" =>  $slider ,
                                         "slider_id" => $slider->id ,
                                         "ajax_url_name" =>  "slider.delete" ,
                                         'deleting_item' => '#tr-'.$slider->id,
                                     ];
                                @endphp

                                <x-deleteBtn :config="$deleteConfig"/>


                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>

        <div class="col-12 text-center">
            <ul class="pagination">
                {!! $data["sliders"]->links() !!}
            </ul>
        </div>
    </div>

</x-default-layout>
