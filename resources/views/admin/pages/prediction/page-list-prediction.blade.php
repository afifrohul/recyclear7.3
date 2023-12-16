@extends('admin.layouts.app')
@section('extraCSS')
<link href="{{ asset('assets/vendor-admin/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div>
    <div class="card">
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">List Prediksi</h1>
        </div>
        <div class="card-body">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-3">
                <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gambar
                            </th>
                            <th scope="col" class="w-96 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas Gambar
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Confidence
                            </th>
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User ID
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($getAllPrediction as $item)  
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">{{$loop->iteration}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">
                                    <img class="h-16 object-cover m-auto" src="{{"https://storage.googleapis.com/recyclear-images-classification/" . $item->image}}">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">{{$item->class_image}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">{{$item->confidence . '%'}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">{{$item->user_id}}</div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    thumbnails.onchange = evt => {
        const [file] = thumbnails.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
            fileName.innerHTML = document.getElementById("thumbnails").value.split("\\").pop();
        }
    },

    $(".multi_tag").select2({
        width: 'resolve',
    });

    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
@endsection
