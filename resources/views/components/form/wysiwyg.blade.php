<div class="mb-2">
    @push('style')
        <script src="https://cdn.tiny.cloud/1/gsntcrz8op752see2oshhijzfpgitybqubd5s0koz655r9pp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#editor',
                convert_urls: false,
                images_upload_url: '{{ route("content.upload.image") }}',
                plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
                ],
                toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
            });
        </script>
    @endpush
    <div class="col-form-label">{{ $label }}</div>
    <textarea name="{{ $name }}" id="editor" class="editor" cols="30" rows="10">{!! $value !!}</textarea>
    @push('script')
        <!--  -->
    @endpush
</div>