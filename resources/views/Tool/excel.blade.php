<x-client.layout>
    <!--begin::Toolbar-->
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
                <h2>Import EXCEL BASIC</h2>
            </div>
        </div>

        <div class="card-body pt-9 pb-0">

                @if ($message)
                <div class="notice" style="color:red">{{$message}}</div>
                @endif

                <form action="{{route('BasicImport')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="myfile" class="form-label">Select files:</label>
                    <input type="file"  class="form-control"  id="myfile" name="import_basic" multiple><br><br>
                    <input type="submit" class="btn btn-primary" value="import">
                </form>
        </div>
        <div class="card mb-6 mb-xl-9">
            <div class="card-header mt-6">
                <div class="card-title flex-column">
                    <h2>Import EXCEL WITH QUEUE</h2>
                </div>
            </div>

            <div class="card-body pt-9 pb-0">
                <form action="{{route('importQueue')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="myfile" class="form-label">Select files:</label>
                    <input type="file" class="form-control" id="myfile" name="import_queue" multiple><br><br>
                    <input type="submit" class="btn btn-primary" value="import">

                </form>
            </div>
        </div>
        <div class="card mb-6 mb-xl-9">
            <div class="card-header mt-6">
                <div class="card-title flex-column">
                    <h2>EXPORT EXCEL BASIC</h2>
                </div>
            </div>
            <div class="card-body pt-9 pb-0">
                <a href="{{route('exportBasic')}}">export basic</a>
            </div>
        </div>

        <div class="card mb-6 mb-xl-9">
            <div class="card-header mt-6">
                <div class="card-title flex-column">
                    <h2>EXPORT EXCEL Queue</h2>
                </div>
            </div>
            <div class="card-body pt-9 pb-0">
                <a href="{{route('exportQueue')}}">export queue</a>
            </div>
        </div>

    </div>

    </x-client.layout>
