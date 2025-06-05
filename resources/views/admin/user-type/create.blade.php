<x-default-layout>
    <x-slot:title>
        {{ trans("messages.create") . " " . $data['title']  }}
    </x-slot:title>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user-type.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-9">
                                <div class="form-group">
                                    <label for="type">user type <span class="text-danger">*</span> </label>
                                    <input type="text" name="type" id="type" class="form-control" placeholder="user type">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ trans("messages.save") }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>