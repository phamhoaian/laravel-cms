@if ($model->files->count())
    <ul class="gallery-files files-list">
        {{-- {{dd($model->files)}} --}}
    @foreach ($model->files as $key => $file)
        @if ($key != 0)
            <li class="mo-gallery-item">
                @if ($file->type == 'i')
                <a class="files-list-image fancybox" href="javascript:void(0)" data-fancybox-group="{{ $model->slug }}">
                    <img class="files-list-image-thumb" src="{{ asset($file->path.'/'.$file->file) }}" alt="{{ $file->alt_attribute }}">
                </a>
                @else
                <a class="files-list-document" href="{{ asset($file->path.'/'.$file->file) }}" target="_blank">
                    <span class="files-list-document-icon fa fa-file-o fa-3x"></span>
                    <span class="files-list-document-filename">{{ $file->file }}</span> <small class="files-list-document-filesize">({{ $file->present()->filesize }})</small>
                </a>
                @endif
            </li>
        @endif
    @endforeach
    </ul>
@endif
