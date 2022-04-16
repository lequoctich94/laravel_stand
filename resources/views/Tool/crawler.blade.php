<x-client.layout>


    <!--merge test3-->
     <!--merge test4-->

    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Excel Tool</h1>
        </div>
    </div>
    <div class="card mb-6 mb-xl-9">
        <div class="card-header mt-6">
            <div class="card-title flex-column">
                <h2>SIMBLE CRAWLER</h2>
            </div>
        </div>

        <div class="card-body pt-9 pb-0">


                <form action="{{route('post_crawler')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">number post</label>
                        <input type="number" name="max_item" class="form-control">
                        <input type="submit" class="btn btn-primary" value="Crawler Data">
                    </div>
                </form>
        </div>
    </div>

    </x-client.layout>
