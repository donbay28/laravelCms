@include('template/header')
    <h1 class="text-3xl text-black pb-6">Master Culture</h1>
    <a href="{{ url('/culture/create_culture')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Create</a>
    <div class="min-h-screen py-5">
        <div class='overflow-x-auto w-full'>
            <table class='mx-auto max-w-5xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                <thead class="bg-lightblue-900">
                    <tr class="text-black text-center">
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Nama Wisata </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Short Description </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Description </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Image Small </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Image Big</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Video</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Edit</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Delete</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-center">
                    @if($culture ?? '' != null)
                        @foreach($culture ?? '' ?? '' as $row)
                            <tr>
                                <td>{{$row->namaCulture}}</td>
                                <td>{{$row->shortDescriptionCulture}}</td>
                                <td>{{$row->descriptionCulture}}</td>
                                <td><img src="{{ url('assets/img/' . $row->imageSmallCulture) }}" style="width: 100px; height:100px;"></td>
                                <td><img src="{{ url('assets/img/' . $row->imageBigCulture) }}" style="width: 100px; height:100px;"></td>
                                <td><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">See Video</button></td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{url('culture/update_culture/'.$row->idcultures)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="delete-culture" cultureName="{{$row->namaCulture}}" id="{{$row->idcultures}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                    <input type="hidden" id="idcultures" value="{{$row->idcultures}}">
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr><td>Data Not Found</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div id="myModal" hidden>
        <div class="flex justify-center">
            <button @click={show=true} type="button" class="leading-tight bg-blue-600 text-gray-200 rounded px-6 py-3 text-sm focus:outline-none focus:border-white">Show Modal</Button>
        </div>
        <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
            <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                    <button class="btnCloseModal fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                    <div id="title" class="px-6 py-3 text-xl border-b font-bold"></div>
                    <div class="p-6 flex-grow">
                        <p>Are you sure you want to delete this data?</p>
                    </div>
                    <input type="hidden" name="deleteId" id="deleteId">
                    <div class="px-6 py-3 border-t">
                        <div class="flex justify-end">
                            <button type="button" class="btnCloseModal bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Close</Button>
                            <button type="button" id="btnSubmitDelete" class="bg-blue-600 text-gray-200 rounded px-4 py-2">Submit</Button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
        </div>
    </div>    
    <script>
        $(document).on("click", ".delete-culture", function(e) {
            $('#myModal').show();
            let del_id = $(this).attr('id');
            let namaCulture = $(this).attr('cultureName');
            $('#title').text("Delete Data " + namaCulture)
            $('#deleteId').val(del_id)
        });
        $(document).on("click", ".btnCloseModal", function(e) {
            $('#myModal').hide();
        });
        $(document).on('click',"#btnSubmitDelete",function(e){
            let del_id = $('#deleteId').val()
            $.ajax({
                type: 'POST',
                url: '/culture/delete/'+del_id,
                data: {
                    "idwisatas": del_id,
                    '_token': '{{ csrf_token() }}',
                }
            })
            .done(function(response){
                location.reload(true); 
            })
        })
    </script>
@include('template/footer')