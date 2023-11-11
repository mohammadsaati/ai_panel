<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12">
            <h3>
                <span class="menu-icon">{!! getIcon(name: "category" , class: "fs-2") !!}</span>
                {!! $data["title"] !!}
            </h3>

        </div>
    </div>

    <br/>
    <br/>

    <div class="row" dir="rtl">
        <div class="col-12">
            <form method="get" action="{{ route("contentType.index") }}">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                        <input type="text" name="name" class="form-control" value="{{ request()->get("name") }}" placeholder="نام">
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-12"></div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary m-4">
                    {!! trans("panel.search_btn") !!}
                </button>
            </form>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-12">

            <div class="table-responsive">
                <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">

                    <thead class="bg-secondary">
                    <tr>
                        <th scope="col"><b>#</b></th>
                        <th scope="col"><b>نام</b></th>
                        <th scope="col"><b>ویرایش</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($i = 1)
                    @foreach($data["content_types"] as $content_type)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $content_type->name }}</td>
                            <td>
                                <a href="{{ route("contentType.show" , ["contentType" => $content_type]) }}">
                                    {!! getIcon(name:"notepad-edit" , class: "fs-1 text-primary" , type: "duotone") !!}
                                </a>
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
                {!! $data["content_types"]->links() !!}
            </ul>
        </div>
    </div>

</x-default-layout>
