<div class="table-responsive">
    <table class="table border table-rounded table-row-bordered table-row-gray-300 border-gray-300 gs-4 gy-4" dir="rtl">

        <thead class="bg-secondary">
        <tr>
            <th scope="col"><b>#</b></th>
            <th scope="col"><b>عنوان</b></th>
        </tr>
        </thead>

        <tbody>

        @foreach($data["section"]->posts as $section_post)
            <tr @if(!$section_post->status) class="bg-danger bg-opacity-50" @endif>
                <td>
                    <input name="posts[]" checked value="{{ $section_post->id }}" type="checkbox" class="form-check-input border border-1 border-gray-300">
                </td>
                <td>{{ str($section_post->title)->words(10 , "...") }}</td>
            </tr>
        @endforeach

        @foreach($data["posts"] as $post)
            <tr @if(!$post->status) class="bg-danger bg-opacity-50" @endif>
                <td>
                    <input name="posts[]" value="{{ $post->id }}" type="checkbox" class="form-check-input border border-1 border-gray-300">
                </td>
                <td>{{ str($post->title)->words(10 , "...") }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="col-12 text-center">
        <ul class="pagination">
            {!! $data["posts"]->links() !!}
        </ul>
    </div>
</div>
