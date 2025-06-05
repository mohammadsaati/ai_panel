<x-default-layout>
    <x-slot:title>
        {!! $data["title"] !!}
    </x-slot:title>

    <div class="row" dir="rtl">
        <div class="col-9">
            <h3>
                <span class="menu-icon">{!! getIcon(name: "notepad-edit" , class: "fs-2") !!}</span>
                {!! $data["title"] !!}
            </h3>
        </div>
        <div class="col-3">
            <a href="{{ route('user-type.create') }}" class="btn btn-sm btn-primary">
                {{ trans("messages.create") . " " . $data['title']  }}
            </a>
        </div>
    </div>

    <br/>
    <br/>

    <div class="row" dir="rtl">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-secondary">
                            <tr>
                                <th>نوع کاربر</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['userTypes'] as $userType)
                                <tr id="user-type-{{ $userType->id }}">
                                    <td>{{ $userType->type }}</td>
                                    <td>
                                        <a href="{{ route('user-type.edit', $userType->id) }}" class="btn btn-icon btn-bg-light btn-color-primary">
                                            {!! getIcon(name:"notepad-edit" , class: "fs-1 text-primary" , type: "duotone") !!}
                                        </a>
                                        @php
                                            $deleteConfig = [
                                                "item" =>  $userType ,
                                                "user_type_id" => $userType->id ,
                                                "ajax_url_name" =>  "user-type.delete" ,
                                                "deleting_item" => "#user-type-" . $userType->id ,
                                            ];
                                        @endphp
                                        <x-deleteBtn :config="$deleteConfig"/>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>