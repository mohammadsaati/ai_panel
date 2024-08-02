<div class="table-responsive">
    <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">

        <thead class="bg-secondary">
        <tr>
            <th scope="col"><b>#</b></th>
            <th scope="col"><b>عنوان</b></th>
        </tr>
        </thead>

        <tbody>

        @foreach($data["posts"] as $post)
            <tr @if(!$post->status) class="bg-danger bg-opacity-50" @endif>
                <td>
                    <input name="posts[]" value="{{ $post->id }}" type="checkbox" class="form-check-input border border-1 border-gray-300">
                </td>
                <td>
                    <h6>{{ $post->title }}</h6>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>
