<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-12">
            <h3>
                <span class="menu-icon">{!! getIcon(name: "notepad-edit" , class: "fs-2") !!}</span>
                {!! $data["title"] !!}
            </h3>

        </div>
    </div>

    <br/>
    <br/>

    <div class="row" dir="rtl">
        <div class="col-12">

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
                        <th scope="col"><b>نام کاربر</b></th>
                        <th scope="col"><b>شماره</b></th>
                        <th scope="col"><b>ایمیل</b></th>
                        <th scope="col"><b>عملیات</b></th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($i = 1)
                    @foreach($data["admins"] as $admin)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$admin->name.' '.$admin->las_name }}</td>
                            <td>{{ $admin->phone_number  }}</td>
                            <td>{{ $admin->email  }}</td>
                            <td>
                                <a href="{{ route("permission.index" , ["admin" => $admin->id]) }}" class="btn btn-primary">
                                    {!! getIcon(name:"fingerprint-scanning" , class: "fs-1 text-light" , type: "duotone") !!}
                                    مجوز ها
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
                {!! $data["admins"]->links() !!}
            </ul>
        </div>
    </div>

</x-default-layout>
