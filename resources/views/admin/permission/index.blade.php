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
    <form method="post" action="{{ route('permission.store' , $data['admin']) }}">
        @csrf
        <div class="row">
            @foreach($data['roles'] as $role)
                <div class="col-12 my-3" dir="ltr">
                    <div class="card card-bordered border-gray-400">
                        <div class="card-header bg-secondary">
                            <h3 class="card-title">{{ $role->name }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($role->permissions as $permission)
                                    <div class="col-md-3 my-2">
                                        <div class="form-check">
                                            <input
                                                @if( in_array($role->id , $data['userRoles']) || in_array($permission->id , $data['userPermissions']) ) checked @endif
                                                class="form-check-input float-none m-0 border-gray-500" name="permissions[]"
                                                type="checkbox"
                                                value="{{ $permission->name }}"
                                                id="permission-{{ $permission->id }}" />

                                            <label class="form-check-label text-dark" for="permission-{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
            </div>
        </div>
    </form>

</x-default-layout>
