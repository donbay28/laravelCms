@include('template/header')
    <h1 class="text-3xl text-black pb-6">Update Craft</h1>
    <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Button</button> -->
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
        @if(strlen($errors) > 2)
            <div class="alert alert-danger">
                <ul>
                    <li>{{$errors}}</li>
                </ul>
            </div>
        @endif
        <h3 class="text-2xl font-bold text-center">Update Data Craft</h3>
        <form id="loginform" action="{{ url('/craft/update')}}" method="post"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mt-4">
                <input type="hidden" name="idcrafts" value="{{$craft['idcrafts']}}">
                <input type="hidden" name="old_imageSmall" value="{{$craft['imageSmallCraft']}}">
                <input type="hidden" name="old_imageBig" value="{{$craft['imageBigCraft']}}">
                <input type="hidden" name="old_video" value="{{$craft['videoCraft']}}">
                <div>
                    <label class="block">Pilih Kota<label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="idkota">
                    @foreach($kota as $val)
                    <option value="{{$val->idkotas}}" {{$val->idkotas == $craft['idkota'] ?'checked' : ''}}>{{$val->namaKota}}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <label class="block" for="craft">Nama Craft<label>
                    <input type="text" name="craft" placeholder="Nama Craft" value="{{$craft['namaCraft']}}" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div>
                    <label class="block">Short Description<label>
                    <textarea type="text" name="shortDescriptionCraft" placeholder="Short Description" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">{{$craft['shortDescriptionCraft']}}</textarea>
                </div>
                <div>
                    <label class="block">Description<label>
                    <textarea type="text" name="descriptionCraft" placeholder="Description" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">{{$craft['descriptionCraft']}}</textarea>
                </div>
                <div class="grid gap-x-8 gap-y-4 grid-cols-2">
                    <div>
                        <label class="block">Image Small<label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="imageSmallUpload" name="imageSmallCraft">
                                <label for="imageSmallUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imageSmallPreview" style="background-image: url('/assets/img/{{$craft['imageSmallCraft']}}');">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block">Image Big<label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="imageBigUpload" name="imageBigCraft">
                                <label for="imageBigUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imageBigPreview" style="background-image: url('/assets/img/{{$craft['imageBigCraft']}}');">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block">Video<label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="videoUpload" name="videoCraft">
                                <label for="videoUpload"></label>
                            </div>
                            <div class="avatar-preview-video">
                                <video controls id="videoPriview" class="object-fill h-72 w-full">
                                    <source type="video/webm" src="{{ url('assets/img/' . $craft['videoCraft']) }}">
                                </video>
                            </div>
                        </div>
                    </div>
                <div class="flex items-baseline justify-center">
                    <button class="px-4 py-2 mt-6 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function readURLImageBig(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imageBigPreview').css('background-image', 'url('+e.target.result +')');
                    $('#imageBigPreview').hide();
                    $('#imageBigPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageBigUpload").change(function() {
            readURLImageBig(this);
        });

        function readURLImageSmall(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imageSmallPreview').css('background-image', 'url('+e.target.result +')');
                    $('#imageSmallPreview').hide();
                    $('#imageSmallPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageSmallUpload").change(function() {
            readURLImageSmall(this);
        });

        function readVideo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#videoPriview').attr('src', e.target.result);
                    $('#videoPriview').hide();
                    $('#videoPriview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#videoUpload").change(function() {
            readVideo(this);
        });
    </script>
@include('template/footer')