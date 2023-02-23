@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex justify-center mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <form action="/dashboard/articles" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary w-full md:w-1/3 md:btn-md text-white mb-3">Simpan Artikel</button type="submit">
                    <div class="form-control w-full">
                        <img src="/img/article.webp" id="img-preview" class="img-preview rounded p-3 mx-auto max-w-[300px] max-h-[300px] object-cover" alt="Current Image's">
                        <label class="label">
                          <span class="label-text">Gambar Sampul</span>
                        </label>
                        <input type="file" id="image" name="image" class="file-input file-input-bordered @error('image') file-input-error @enderror w-full" onchange="previewImage()"/>
                        @error('image')
                        <label class="label">
                            <span class="label-text text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                          <span class="label-text">Judul Artikel</span>
                        </label>
                        <input type="text" placeholder="Ketikan judul artikel disini" id="title" name="title" class="input input-bordered w-full @error('title') input-error @enderror" />
                        <input type="text" id="slug" name="slug" class="input input-bordered w-full" readonly hidden/>
                        @error('title')
                        <label class="label">
                            <span class="label-text text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                          <span class="label-text">Isi</span>
                        </label>
                        <textarea type="text" id="body-editor" name="body" class="textarea textarea-bordered w-full"></textarea>
                        @error('title')
                        <label class="label">
                            <span class="label-text text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/check/slug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection