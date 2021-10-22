@include('template/header')
    <h1 class="text-3xl text-black pb-6">Master Kota</h1>
    <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Button</button> -->
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
        @if(strlen($errors) > 2)
            <div class="alert alert-danger">
                <ul>
                    <li>{{$errors}}</li>
                </ul>
            </div>
        @endif
        <h3 class="text-2xl font-bold text-center">Input Data Kota</h3>
        <form id="loginform" action="{{ url('/kota/create')}}" method="post"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mt-4">
                <div>
                    <label class="block" for="kota">Nama Kota<label>
                    <input type="text" name="kota" placeholder="Kota" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div>
                    <label class="block">Short Description<label>
                    <textarea type="text" name="shortDescription" placeholder="Short Description" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"></textarea>
                </div>
                <div>
                    <label class="block">Description<label>
                    <textarea type="text" name="description" placeholder="Description" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"></textarea>
                </div>
                <div class="grid gap-x-8 gap-y-4 grid-cols-2">
                    <div>
                        <label class="block">Image Small<label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="imageSmallUpload" name="imageSmall">
                                <label for="imageSmallUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imageSmallPreview" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfEwRoLRsPlNT_JYV40j8c9eOPWV6YdJ4UztWm_m4b9dkm7VQt);">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block">Image Big<label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="imageBigUpload" name="imageBig">
                                <label for="imageBigUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imageBigPreview" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfEwRoLRsPlNT_JYV40j8c9eOPWV6YdJ4UztWm_m4b9dkm7VQt);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block">Video<label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="videoUpload" name="video">
                                <label for="videoUpload"></label>
                            </div>
                            <div class="avatar-preview-video">
                                <video controls id="videoPriview" class="object-fill h-72 w-full">
                                    <source type="video/webm">
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